<?php

declare(strict_types=1);

namespace iutnc\deefy\audio\tracks;

class PodcastTrack extends AudioTrack
{
    protected string $auteur;
    protected string $date;

    public function __construct(
        string $titre,
        string $filename,
        string $auteur = '',
        string $date = '',
        int $duree = 0,
        string $genre = ''
    ) {
        parent::__construct($titre, $filename);
        $this->auteur = $auteur;
        $this->date = $date;
        $this->setDuree($duree);
        $this->setGenre($genre);
    }
}
