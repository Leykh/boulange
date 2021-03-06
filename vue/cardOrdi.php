<?php 
  require_once "outil/outils.php"; 
  ob_start(); 
?>
  <div class="row">
    <?php foreach($tabOrdis as $Ordi) { ?>
      <?php $i=0; ?>
      <div class="col">
        <div class="card p-1 m-1" style="width: 18rem;">
          <img height="300px" src="public/images/<?php echo $Ordi['image']; ?>" class="card-img-top" alt="image">
          <div class="card-body">
            <h5 class="card-title"><?php echo sousChaineTaille($Ordi['denomination'], 18); ?></h5>
            <p class="card-text"><?php echo sousChaineTaille($Ordi['prix'] . " €",50); ?></p>
            <p class="card-text"><?php echo sousChaineTaille($Ordi['processeur'],50); ?></p>
            <p class="card-text"><?php echo sousChaineTaille($Ordi['ecran'],50); ?></p>
            <p class="card-text"><?php echo sousChaineTaille($Ordi['vive'],50); ?></p>
            <p class="card-text"><?php echo sousChaineTaille($Ordi['lien'],50); ?></p>
            <a href="index.php?action=lire&id=<?php echo $Ordi['id']; ?>" class="btn btn-primary">Détail</a>
            <a href="index.php?action=addpanier&id=<?php echo $Ordi['id']; ?>" class="btn btn-success">Panier</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
<?php
$content = ob_get_clean();
$titre = "Catalogue";
require "template.php";
?>  