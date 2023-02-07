<?php

namespace Entity;

use Attributes\Table;
use Attributes\TargetRepository;
use Repositories\AnimeRepository;

#[Table(name: "animes")]
#[TargetRepository(repositoryName: AnimeRepository::class)]
class Anime extends AbstractEntity
{
    private int $id;
    private string $nom;
    private string $synopsis;
    private string $genre;
    private int $note;
    private string $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setName(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    /**
     * @param string $synopsis
     */
    public function setSynopsis(string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return string
     */
    public function getGenre(): string
    {
        return $this->genre;
    }

    /**
     * @param string $genre
     */
    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return int
     */
    public function getNote(): int
    {
        return $this->note;
    }

    /**
     * @param int $note
     */
    public function setNote(int $note): void
    {
        $this->note = $note;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    public function getColor()
    {
        if ($this->note>=0 && $this->note<4){return "text-danger";}
        if ($this->note>=4 && $this->note<6){return "text-warning";}
        if ($this->note>=6){return "text-success";}
    }
}