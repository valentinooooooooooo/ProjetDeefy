<?php

declare(strict_types=1);

namespace iutnc\deefy\render;

use iutnc\deefy\audio\tracks\AlbumTrack;

class AlbumTrackRenderer extends AudioTrackRenderer
{
    private AlbumTrack $track;

    public function __construct(AlbumTrack $track)
    {
        $this->track = $track;
    }

    protected function renderCompact(): string
    {
        $t = $this->track;
        return '<div class="track"><span>' . $this->e($t->titre) . ' - ' . $this->e($t->artiste)
            . ' (' . $this->e($t->album) . ')</span> ' . $this->audioTag($t->filename) . '</div>';
    }

    protected function renderLong(): string
    {
        $t = $this->track;
        return '<div class="track-long"><h3>' . $this->e($t->titre) . '</h3><ul>'
            . '<li>Artiste : ' . $this->e($t->artiste) . '</li>'
            . '<li>Album : ' . $this->e($t->album) . ' (' . $t->annee . '), piste ' . $t->numero . '</li>'
            . '<li>Genre : ' . $this->e($t->genre) . '</li>'
            . '<li>Durée : ' . $t->duree . ' s</li></ul>' . $this->audioTag($t->filename) . '</div>';
    }
}
