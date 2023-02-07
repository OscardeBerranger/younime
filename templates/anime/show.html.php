<img width="300px" src="images/<?=$anime->getImage()?>" alt="anime-thumbnail">
<h1><?=$anime->getName()?></h1>
<h3 class="<?=$anime->getColor()?>"></h3>
<h3 class="<?=$anime->getColor()?>"><?=$anime->getNote() ?></h3>
<form action="?type=anime&action=rate" method="post">
    <input type="hidden" name="id" value="<?=$anime->getId()?>">
    <input type="number" name="userGrade" value="<?=$anime->getNote()?>" min="0" max="10">
    <button type="submit" class="btn btn-primary">Rate</button>
</form>
<p><?=$anime->getSynopsis()?></p>
<a href="?=type=anime&action=index" class="btn btn-success">Retour</a>