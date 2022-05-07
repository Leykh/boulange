<?php 
ob_start(); 
?>
<br>
<div class="row">
    <div class="col-4">
        <img  style="width:80%; height:auto" src="public/images/<?= $livre['image']; ?>">
    </div>
    <div class="col-8">
        <br>
        <h3>Nombre de pages : <?= $livre['nbPages']; ?></h3>
        <br>
        <h3>Prix : <?= $livre['prix']; ?> euros</h3>
        <br>
        <h3>Description :</h3> 
        <p><?= $livre['description']; ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $livre['titre'];
require "template.php";
?>