<?php

declare(strict_types=1);

namespace iutnc\deefy\audio\tracks;

class AlbumTrack extends AudioTrack
{
    protected string $album;
    protected int $numero;
    protected string $artiste = '';
    protected int $annee = 0;

    public function __construct(string $titre, string $filename, string $album, int $numero)
    {
        parent::__construct($titre, $filename);
        $this->album = $album;
        $this->numero = $numero;
    }

    public function setArtiste(string $artiste): void
    {
        $this->artiste = $artiste;
    }

    public function setAnnee(int $annee): void
    {
        $this->annee = $annee;
    }
}
