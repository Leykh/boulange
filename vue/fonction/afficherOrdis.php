<?php ob_start()?>
<?php require_once "model/ordiManager.php"; ?>
<?php require_once "template.php"; ?>
<?php //afficherTableau($tabOrdis,"tabOrdis"); ?>

<div class="container">
    <table class="table table-striped">
      <thead>
        <tr>
        <th scope="col">Id</th>
          <th scope="col">Image</th>
          <th scope="col">Titre</th>
          <th scope="col">Prix</th>
          <th scope="col">Nombre de pages</th>
          <th scope="col" colspan="3">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($tabOrdis as $Ordi) { ?>
          <tr class="align-middle">
            <td scope="row"><?php echo $Ordi['id'] ?></td>
            <td><img width="80" src="public/images/<?php echo $Ordi['image']; ?>"></td>
            <td><?php echo $Ordi['titre']; ?></td>
            <td><?php echo $Ordi['prix']; ?></td>
            <td><?php echo $Ordi['nbPages']; ?></td>
            <td><a href="index.php?action=lire&id=<?= $Ordi['id']; ?>" class="btn btn-info">Lire</a></td>
            <td><a href="index.php?action=modifier&id=<?= $Ordi['id']; ?>" class="btn btn-warning">Modifier</a></td>
            <td><a href="index.php?action=suppr&id=<?= $Ordi['id']; ?>" class="btn btn-danger">Supprimer</a></td>
          </tr>
        <?php } ?>
      </tbody>
    </table> 
</div> 
<?php
    $content=ob_get_clean();
    $titre = "Liste des Ordis de la bibliothéque";
    require "template.php";
?>