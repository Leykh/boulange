<?php 
ob_start(); 
?>
<br>
<div class="row">
    <div class="col-4">
        <img  style="width:80%; height:auto" src="public/images/<?= $Ordi['image']; ?>">
    </div>
    <div class="col-8">
        <br>
        <h3>Prix :</h3>
        <p><?= $Ordi['prix']; ?> euros</p>
        <br>
        <h3>Processeur :</h3>
        <p><?= $Ordi['processeur']; ?></p>
        <br>
        <h3>Ecran :</h3>
        <p><?= $Ordi['ecran']; ?></p>
        <br>
        <h3>Memoire vive :</h3> 
        <p><?= $Ordi['vive']; ?></p>
    </div>
</div>

<?php
$content = ob_get_clean();
$titre = $Ordi['denomination'];
require "template.php";
?>