<?php ob_start() ?>
<?php require_once "model/ordiManager.php"; ?>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr class="align-middle">
        <th scope="col">Admin Table</th>
      </tr>
    </thead>
    <tbody>
      <tr class="align-middle">
        <td><a href="index.php?action=createOrdiBD" class="btn btn-info">Créer table ordi</a></td>
        <td><a href="index.php?action=init" class="btn btn-info">Remplit ordi</a></td>
        <td><a href="index.php?action=delAll" class="btn btn-danger">Supprimer tous les ordis</a></td>
        <td><a href="index.php?action=dropOrdi" class="btn btn-danger">Supprimer la table</a></td>
      </tr>
    </tbody>
  </table>
</div>

<div class="container">
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Image</th>
        <th scope="col">Denomination</th>
        <th scope="col">Prix</th>
        <th scope="col">Processeur</th>
        <th scope="col">Ecran</th>
        <th scope="col">Memoire vive</th>
        <th scope="col" colspan="3">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tabOrdis as $Ordi) { ?>
        <tr class="align-middle">
          <td scope="row"><?php echo $Ordi['id'] ?></td>
          <td><img width="80" src="public/images/<?php echo $Ordi['image']; ?>"></td>
          <td><?php echo $Ordi['denomination']; ?></td>
          <td><?php echo $Ordi['prix']; ?></td>
          <td><?php echo $Ordi['processeur']; ?></td>
          <td><?php echo $Ordi['ecran']; ?></td>
          <td><?php echo $Ordi['vive']; ?></td>
          <td><a href="index.php?action=lire&id=<?= $Ordi['id']; ?>" class="btn btn-info">Lire</a></td>
          <td><a href="index.php?action=modifier&id=<?= $Ordi['id']; ?>" class="btn btn-warning">Modifier</a></td>
          <td><a href="index.php?action=suppr&id=<?= $Ordi['id']; ?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
<?php
$content = ob_get_clean();
$titre = "Liste des Ordis de la bibliothéque";
require "template.php";
?>