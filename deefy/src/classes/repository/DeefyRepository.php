<?php

declare(strict_types=1);

namespace iutnc\deefy\repository;

use iutnc\deefy\audio\lists\PlayList;
use iutnc\deefy\audio\tracks\AlbumTrack;
use iutnc\deefy\audio\tracks\AudioTrack;
use iutnc\deefy\audio\tracks\PodcastTrack;
use PDO;

class DeefyRepository
{
    private static ?DeefyRepository $instance = null;
    private static array $config = [];
    private PDO $pdo;

    private function __construct(array $conf)
    {
        $this->pdo = new PDO($conf['dsn'], $conf['username'], $conf['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]);
    }

    public static function setConfig(string $file): void
    {
        $conf = parse_ini_file($file);
        if ($conf === false) {
            throw new \Exception("Erreur de lecture du fichier de configuration : $file");
        }
        self::$config = [
            'dsn' => $conf['driver'] . ':host=' . $conf['host'] . ';dbname=' . $conf['database'] . ';charset=utf8',
            'username' => $conf['username'],
            'password' => $conf['password'],
        ];
        self::$instance = null;
    }

    public static function getInstance(): DeefyRepository
    {
        if (self::$instance === null) {
            if (self::$config === []) {
                throw new \Exception('Configuration de la base de données non définie (setConfig)');
            }
            self::$instance = new DeefyRepository(self::$config);
        }
        return self::$instance;
    }

    /** @return PlayList[] playlists sans leurs pistes */
    public function findAllPlaylists(): array
    {
        $playlists = [];
        foreach ($this->pdo->query('SELECT id, nom FROM playlist ORDER BY nom') as $row) {
            $pl = new PlayList($row['nom']);
            $pl->setId((int) $row['id']);
            $playlists[] = $pl;
        }
        return $playlists;
    }

    /** Retourne la playlist avec ses pistes, ou null si elle n'existe pas. */
    public function findPlaylistById(int $id): ?PlayList
    {
        $st = $this->pdo->prepare('SELECT id, nom FROM playlist WHERE id = ?');
        $st->execute([$id]);
        $row = $st->fetch();
        if ($row === false) {
            return null;
        }
        $pl = new PlayList($row['nom']);
        $pl->setId((int) $row['id']);

        $st = $this->pdo->prepare(
            'SELECT t.* FROM track t INNER JOIN playlist2track p ON p.id_track = t.id
             WHERE p.id_pl = ? ORDER BY p.no_piste_dans_liste'
        );
        $st->execute([$id]);
        foreach ($st->fetchAll() as $trackRow) {
            $pl->addTrack($this->rowToTrack($trackRow));
        }
        return $pl;
    }

    public function saveEmptyPlaylist(PlayList $pl): PlayList
    {
        $st = $this->pdo->prepare('INSERT INTO playlist (nom) VALUES (?)');
        $st->execute([$pl->nom]);
        $pl->setId((int) $this->pdo->lastInsertId());
        return $pl;
    }

    public function savePodcastTrack(PodcastTrack $track): PodcastTrack
    {
        $st = $this->pdo->prepare(
            "INSERT INTO track (titre, genre, duree, filename, type, auteur_podcast, date_posdcast)
             VALUES (?, ?, ?, ?, 'P', ?, ?)"
        );
        $st->execute([
            $track->titre,
            $track->genre,
            $track->duree,
            $track->filename,
            $track->auteur,
            $track->date === '' ? null : $track->date,
        ]);
        $track->setId((int) $this->pdo->lastInsertId());
        return $track;
    }

    public function addTrackToPlaylist(int $idPlaylist, int $idTrack): void
    {
        $st = $this->pdo->prepare(
            'SELECT COALESCE(MAX(no_piste_dans_liste), 0) + 1 FROM playlist2track WHERE id_pl = ?'
        );
        $st->execute([$idPlaylist]);
        $no = (int) $st->fetchColumn();

        $st = $this->pdo->prepare(
            'INSERT INTO playlist2track (id_pl, id_track, no_piste_dans_liste) VALUES (?, ?, ?)'
        );
        $st->execute([$idPlaylist, $idTrack, $no]);
    }

    private function rowToTrack(array $row): AudioTrack
    {
        if ($row['type'] === 'A') {
            $track = new AlbumTrack($row['titre'], (string) $row['filename'], (string) $row['titre_album'], (int) $row['numero_album']);
            $track->setArtiste((string) $row['artiste_album']);
            $track->setAnnee((int) $row['annee_album']);
            $track->setGenre((string) $row['genre']);
            $track->setDuree((int) $row['duree']);
        } else {
            $track = new PodcastTrack(
                $row['titre'],
                (string) $row['filename'],
                (string) $row['auteur_podcast'],
                (string) $row['date_posdcast'],
                (int) $row['duree'],
                (string) $row['genre']
            );
        }
        $track->setId((int) $row['id']);
        return $track;
    }
}
