<?php

declare(strict_types=1);

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\PlayList;
use iutnc\deefy\audio\tracks\PodcastTrack;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\repository\DeefyRepository;

class AddPodcastTrackAction extends Action
{
    public function execute(): string
    {
        $pl = $_SESSION['playlist'] ?? null;
        if (!$pl instanceof PlayList) {
            return '<p>Aucune playlist courante. <a href="?action=playlists">Choisissez-en une</a> '
                . 'ou <a href="?action=add-playlist">créez-en une</a>.</p>';
        }
        return $this->http_method === 'POST' ? $this->post($pl) : $this->form();
    }

    private function post(PlayList $pl): string
    {
        $titre = trim((string) ($_POST['titre'] ?? ''));
        $auteur = trim((string) ($_POST['auteur'] ?? ''));
        $genre = trim((string) ($_POST['genre'] ?? ''));
        $date = trim((string) ($_POST['date'] ?? ''));
        $duree = filter_var($_POST['duree'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 0]]);

        $error = '';
        if ($titre === '' || $this->length($titre) > 100) {
            $error = 'Titre obligatoire (100 caractères maximum).';
        } elseif ($this->length($auteur) > 100 || $this->length($genre) > 30) {
            $error = 'Auteur (100 caractères max) ou genre (30 caractères max) trop long.';
        } elseif ($duree === false) {
            $error = 'La durée doit être un entier positif (secondes).';
        } elseif ($date !== '' && !$this->isValidDate($date)) {
            $error = 'Date invalide.';
        }

        $file = $_FILES['userfile'] ?? null;
        if ($error === '') {
            if (!is_array($file) || $file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
                $error = 'Le fichier audio est obligatoire (envoi échoué).';
            } elseif (strtolower(substr($file['name'], -4)) !== '.mp3'
                || $file['type'] !== 'audio/mpeg'
                || !$this->isMp3Content($file['tmp_name'])) {
                $error = 'Seuls les fichiers .mp3 (audio/mpeg) sont acceptés.';
            }
        }
        if ($error !== '') {
            return $this->form($error);
        }

        $newName = bin2hex(random_bytes(16)) . '.mp3';
        $dest = dirname(__DIR__, 3) . '/audio/' . $newName;
        if (!move_uploaded_file($file['tmp_name'], $dest)) {
            return $this->form("Impossible d'enregistrer le fichier.");
        }

        try {
            $repo = DeefyRepository::getInstance();
            $track = $repo->savePodcastTrack(new PodcastTrack($titre, $newName, $auteur, $date, $duree, $genre));
            $repo->addTrackToPlaylist($pl->id, $track->id);
        } catch (\Throwable $e) {
            unlink($dest);
            throw $e;
        }
        $pl->addTrack($track);
        $_SESSION['playlist'] = $pl;

        return (new AudioListRenderer($pl))->render()
            . '<p><a href="?action=add-track">Ajouter encore une piste</a></p>';
    }

    private function isMp3Content(string $path): bool
    {
        $head = (string) file_get_contents($path, false, null, 0, 3);
        if (strlen($head) < 3) {
            return false;
        }
        return $head === 'ID3' || (ord($head[0]) === 0xFF && (ord($head[1]) & 0xE0) === 0xE0);
    }

    private function isValidDate(string $date): bool
    {
        $d = \DateTime::createFromFormat('Y-m-d', $date);
        return $d !== false && $d->format('Y-m-d') === $date;
    }

    private function form(string $error = ''): string
    {
        $msg = $error === '' ? '' : '<p class="error">' . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . '</p>';
        return <<<HTML
<h2>Ajouter une piste</h2>
{$msg}
<form method="post" action="?action=add-track" enctype="multipart/form-data">
  <p><label for="titre">Titre</label> <input type="text" id="titre" name="titre" maxlength="100" required></p>
  <p><label for="auteur">Auteur</label> <input type="text" id="auteur" name="auteur" maxlength="100"></p>
  <p><label for="date">Date</label> <input type="date" id="date" name="date"></p>
  <p><label for="genre">Genre</label> <input type="text" id="genre" name="genre" maxlength="30"></p>
  <p><label for="duree">Durée (secondes)</label> <input type="number" id="duree" name="duree" min="0" value="0" required></p>
  <p><label for="userfile">Fichier audio (.mp3)</label> <input type="file" id="userfile" name="userfile" accept=".mp3,audio/mpeg" required></p>
  <p><button type="submit">Ajouter</button></p>
</form>
HTML;
    }
}
