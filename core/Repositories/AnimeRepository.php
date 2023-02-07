<?php

namespace Repositories;

use Attributes\TargetEntity;
use Entity\Anime;

#[TargetEntity(entityName: Anime::class)]
class AnimeRepository extends AbstractRepository
{
    public function insert(Anime $anime){
        $request = $this->pdo->prepare("INSERT INTO {$this->tableName} SET nom = :nom, synopsis = :synopsis, image = :image, note = :note, genre = :genre");

        $request->execute([
            "nom"=>$anime->getName(),
            "synopsis"=>$anime->getSynopsis(),
            "image"=>$anime->getImage(),
            "note"=>10,
            "genre"=>$anime->getGenre()
        ]);
    }

    public function update(Anime $anime){
        $request = $this->pdo->prepare("UPDATE animes SET nom = :nom, synopsis = :synopsis, image = :image, note = :note, genre = :genre WHERE animes.id = {$anime->getId()}");

        $request->execute([
            "nom"=>$anime->getName(),
            "synopsis"=>$anime->getSynopsis(),
            "image"=>$anime->getImage(),
            "note"=>$anime->getNote(),
            "genre"=>$anime->getGenre()
        ]);
    }
}

