<?php 
ob_start(); 
?>
<br>
    <a href="index.php?action=supprpanier">Supprimer/payer commande</a><br><br>
    <?php $prixTotal = 0 ?>
    <?php foreach($Ordis as $Ordi) { ?>  
        <p><?= $Ordi['denomination']; ?> X 1 = <?= $Ordi['prix']; ?></p>
        <hr>
        <?php $prixTotal += $Ordi['prix']; ?>
    <?php } ?>   
    <?php echo "<b>prix total=".$prixTotal."<b>"; ?>

<?php
$content = ob_get_clean();
$titre = "Commande" ;
require "template.php";
?>