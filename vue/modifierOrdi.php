<?php 
ob_start(); 
?>
<!-- form method="POST" action="index.php?page=Ordis&action=valid-modifier">
        <label for="titre">Titre : </label><br>
        <input type="text" id="titre" name="titre" value="<?= $Ordi['titre'] ?>"><br>
    
        <label for="nbPages">Nombre de pages : </label><br>
        <input type="number" id="nbPages" name="nbPages" value="<?= $Ordi['nbPages'] ?>"><br>
   
        <label for="descr">Description : </label><br>
        <input type="text" id="descr" name="descr" value="<?= $Ordi['description'] ?>"><br>
        <input type="hidden" name="id" value="<?= $Ordi['id'] ?>">
        <input type="hidden" name="image" value="<?= $Ordi['image'] ?>">
    
    <button type="submit">Valider</button>
</form -->
<div class="container">
    <form method="POST" action="index.php?page=Ordis&action=valid-modifier" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label" for="titre">Denomination : </label>
        <input class="form-control" type="text" id="denomination" name="denomination" value="<?= $Ordi['denomination'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Prix : </label>
        <input class="form-control" type="text" id="prix" name="prix" value="<?= $Ordi['prix'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Processeur : </label>
        <input class="form-control" type="text" id="processeur" name="processeur" value="<?= $Ordi['processeur'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Ecran : </label>
        <input class="form-control" type="text" id="ecran" name="ecran" value="<?= $Ordi['ecran'] ?>">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Memoire vive : </label>
        <input class="form-control" type="text" id="vive" name="vive" value="<?= $Ordi['vive'] ?>">
      </div>
      <input type="hidden" name="id" value="<?= $Ordi['id'] ?>">
      <input type="hidden" name="image" value="<?= $Ordi['image'] ?>">
      <input class="btn btn-primary" type="submit" value="modifier" name="form_ajouter"/> 
</form>
<?php
$content = ob_get_clean();
$titre = "Modifier le Ordi";
require "template.php";
?>