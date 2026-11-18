<?php

declare(strict_types=1);

namespace iutnc\deefy\render;

use iutnc\deefy\audio\lists\AudioList;
use iutnc\deefy\audio\tracks\AlbumTrack;

class AudioListRenderer implements Renderer
{
    private AudioList $list;

    public function __construct(AudioList $list)
    {
        $this->list = $list;
    }

    public function render(int $selector = self::COMPACT): string
    {
        $html = '<div class="playlist"><h2>' . htmlspecialchars($this->list->nom, ENT_QUOTES, 'UTF-8') . '</h2>';
        if ($this->list->nbPistes === 0) {
            $html .= '<p>Cette liste ne contient aucune piste.</p>';
        } else {
            $html .= '<ol>';
            foreach ($this->list->pistes as $piste) {
                $renderer = $piste instanceof AlbumTrack
                    ? new AlbumTrackRenderer($piste)
                    : new PodcastRenderer($piste);
                $html .= '<li>' . $renderer->render(self::COMPACT) . '</li>';
            }
            $html .= '</ol>';
        }
        return $html . '<p>' . $this->list->nbPistes . ' piste(s), durée totale : '
            . $this->list->dureeTotale . ' s</p></div>';
    }
}
