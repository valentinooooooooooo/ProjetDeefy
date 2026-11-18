<?php

declare(strict_types=1);

namespace iutnc\deefy\audio\tracks;

use iutnc\deefy\exception\InvalidPropertyNameException;
use iutnc\deefy\exception\InvalidPropertyValueException;

abstract class AudioTrack
{
    protected ?int $id = null;
    protected string $titre;
    protected string $filename;
    protected string $genre = '';
    protected int $duree = 0;

    public function __construct(string $titre, string $filename)
    {
        $this->titre = $titre;
        $this->filename = $filename;
    }

    public function __get(string $name): mixed
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        throw new InvalidPropertyNameException("invalid property : $name");
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function setDuree(int $duree): void
    {
        if ($duree < 0) {
            throw new InvalidPropertyValueException("invalid value for duree : $duree");
        }
        $this->duree = $duree;
    }

    public function __toString(): string
    {
        return json_encode(get_object_vars($this));
    }
}
