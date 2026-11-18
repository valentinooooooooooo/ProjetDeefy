<?php

declare(strict_types=1);

namespace iutnc\deefy\render;

use iutnc\deefy\audio\tracks\PodcastTrack;

class PodcastRenderer extends AudioTrackRenderer
{
    private PodcastTrack $track;

    public function __construct(PodcastTrack $track)
    {
        $this->track = $track;
    }

    protected function renderCompact(): string
    {
        $t = $this->track;
        return '<div class="track"><span>' . $this->e($t->titre) . ' - ' . $this->e($t->auteur)
            . '</span> ' . $this->audioTag($t->filename) . '</div>';
    }

    protected function renderLong(): string
    {
        $t = $this->track;
        return '<div class="track-long"><h3>' . $this->e($t->titre) . '</h3><ul>'
            . '<li>Auteur : ' . $this->e($t->auteur) . '</li>'
            . '<li>Date : ' . $this->e($t->date) . '</li>'
            . '<li>Genre : ' . $this->e($t->genre) . '</li>'
            . '<li>Durée : ' . $t->duree . ' s</li></ul>' . $this->audioTag($t->filename) . '</div>';
    }
}
