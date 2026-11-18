<?php

declare(strict_types=1);

namespace iutnc\deefy\action;

use iutnc\deefy\repository\DeefyRepository;

class ListPlaylistsAction extends Action
{
    public function execute(): string
    {
        $playlists = DeefyRepository::getInstance()->findAllPlaylists();
        if ($playlists === []) {
            return '<h2>Mes playlists</h2><p>Aucune playlist enregistrée. '
                . '<a href="?action=add-playlist">Créer une playlist</a></p>';
        }
        $html = '<h2>Mes playlists</h2><ul>';
        foreach ($playlists as $pl) {
            $html .= '<li><a href="?action=playlist&amp;id=' . $pl->id . '">'
                . htmlspecialchars($pl->nom, ENT_QUOTES, 'UTF-8') . '</a></li>';
        }
        return $html . '</ul>';
    }
}
