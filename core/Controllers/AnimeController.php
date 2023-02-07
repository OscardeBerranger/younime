<?php

namespace Controllers;
use App\File;
use Attributes\DefaultEntity;
use Entity\Anime;


#[DefaultEntity(entityName: Anime::class)]
class AnimeController extends AbstractController
{
    public function index()
    {
        return $this->render("anime/index", [
            "pageTitle"=>"anime",
            "animes"=>$this->repository->findAll("titre")
        ]);
    }

    public function show(){
        $id = null;

        if (!empty($_GET['id'])&&ctype_digit($_GET['id'])){$id = $_GET['id'];}

        if (!$id){return $this->redirect();}

        $anime = $this->repository->findById($id);

        if (!$anime){return $this->redirect();}

        return $this->render("anime/show", [
            "anime"=>$anime,
            "pageTitle"=>$anime->getName()
        ]);
    }
    public function delete(){
        $id = null;

        if (!empty($_GET['id'])){$id = $_GET['id'];}

        $anime = $this->repository->findById($id);

        if ($anime){
            $this->repository->delete($anime);
            return $this->redirect();
        }
        return $this->render("anime/index", ["pageTitle"=>"home"]);
    }
    public function create(){
        $name = null;
        $synopsis = null;
        $note = 10;
        $genre = null;

        if (!empty($_POST['name'])){$name = $_POST['name'];}
        if (!empty($_POST['synopsis'])){$synopsis = $_POST['synopsis'];}
        if (!empty($_POST['genre'])){$genre = $_POST['genre'];}

        if ($name && $genre && $synopsis){
            $image = new File("imageAnime");

            $anime = new Anime();

            $anime->setName($name);
            $anime->setSynopsis($synopsis);
            $anime->setGenre($genre);
            $anime->setNote($note);

            if ($image->isImage()){$image->upload();}

            $anime->setImage($image->getName());
            $this->repository->insert($anime);

            return $this->redirect();
        }
        return $this->render("anime/create", ["pageTitle"=>"nouveau animé"]);
    }
    public function rate(){
        $id = null;
        $userGrade = null;

        if (!empty($_POST['id'])){$id = $_POST['id'];}
        if (!empty($_POST['userGrade'])){$userGrade = $_POST['userGrade'];}
        if (!$id){return$this->redirect();}
        $anime = $this->repository->findById($id);

        if (!$anime){$this->redirect();}

        $anime->setNote($userGrade);

        $this->repository->update($anime);

        return $this->render("anime/show", [
            "anime"=>$anime,
            "pageTitle"=>$anime->getName()
        ]);
    }
}