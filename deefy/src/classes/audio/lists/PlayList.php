<?php

declare(strict_types=1);

namespace iutnc\deefy\audio\lists;

use iutnc\deefy\audio\tracks\AudioTrack;
use iutnc\deefy\exception\InvalidPropertyValueException;

class PlayList extends AudioList
{
    public function addTrack(AudioTrack $track): void
    {
        $this->pistes[] = $track;
        $this->recalculer();
    }

    public function removeTrack(int $index): void
    {
        if (!isset($this->pistes[$index])) {
            throw new InvalidPropertyValueException("invalid track index : $index");
        }
        array_splice($this->pistes, $index, 1);
        $this->recalculer();
    }

    /** Ajoute plusieurs pistes en ignorant celles déjà présentes (même fichier audio). */
    public function addTracks(array $tracks): void
    {
        foreach ($tracks as $track) {
            if ($track instanceof AudioTrack && !$this->contains($track)) {
                $this->pistes[] = $track;
            }
        }
        $this->recalculer();
    }

    private function contains(AudioTrack $track): bool
    {
        foreach ($this->pistes as $piste) {
            if ($piste->filename === $track->filename) {
                return true;
            }
        }
        return false;
    }
}
