<?php

declare(strict_types=1);

namespace iutnc\deefy\action;

use iutnc\deefy\audio\lists\PlayList;
use iutnc\deefy\render\AudioListRenderer;
use iutnc\deefy\repository\DeefyRepository;

class DisplayPlaylistAction extends Action
{
    public function execute(): string
    {
        if (isset($_GET['id'])) {
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
            $pl = $id === false ? null : DeefyRepository::getInstance()->findPlaylistById($id);
            if ($pl === null) {
                return '<p>Playlist introuvable. <a href="?action=playlists">Retour à mes playlists</a></p>';
            }
            $_SESSION['playlist'] = $pl;
        } else {
            $pl = $_SESSION['playlist'] ?? null;
            if (!$pl instanceof PlayList) {
                return '<p>Aucune playlist courante. <a href="?action=playlists">Choisissez-en une</a> '
                    . 'ou <a href="?action=add-playlist">créez-en une</a>.</p>';
            }
        }
        return (new AudioListRenderer($pl))->render()
            . '<p><a href="?action=add-track">Ajouter une piste</a></p>';
    }
}
