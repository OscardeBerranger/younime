<?php foreach ($animes as $anime) : ?>

    <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="images/<?=$anime->getImage()?>" alt="Card image cap">
        <div class="card-body">
            <h5 class="card-title"><?=$anime->getName()?></h5>
            <h6 class="card-subtitle mb-2 <?=$anime->getColor() ?> "><?=$anime->getNote()?></h6>
            <p class="card-text"><?=$anime->getSynopsis()?></p>
            <a href="?type=anime&action=show&id=<?=$anime->getId()?>"class="btn btn-primary">More</a>
            <a href="?type=anime&action=delete&id=<?=$anime->getId()?>" class="btn btn-danger">Delete</a>
        </div>
    </div>

<?php endforeach;?>
