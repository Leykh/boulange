<?php 
ob_start(); 
?>
<div class="container">
    <form method="POST" action="index.php?action=valid-creer" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label" for="titre">Denomination : </label>
        <input class="form-control" type="text" id="denomination" name="denomination">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Prix : </label>
        <input class="form-control" type="text" id="prix" name="prix">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Processeur : </label>
        <input class="form-control" type="text" id="processeur" name="processeur">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Ecran : </label>
        <input class="form-control" type="text" id="ecran" name="ecran">
      </div>
      <div class="mb-3">
        <label class="form-label" for="titre">Memoire vive : </label>
        <input class="form-control" type="text" id="vive" name="vive">
      </div>
      <div class="mb-3">
        <label class="form-label" for="image">Image : </label>
        <input class="form-control" type="file" id="image" name="image">
      </div>
      <input class="btn btn-primary" type="submit" value="ajouter" name="form_ajouter"/> 
</form>
<?php
$content = ob_get_clean();
$titre = "Ajout d'un Ordi";
require "template.php";
?>