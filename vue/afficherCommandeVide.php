<?php 
ob_start(); 
?>
<br>
    <a href="index.php?action=card">Pas d'article dans le panier</a><br><br>
<?php
$content = ob_get_clean();
$titre = "Commande" ;
require "template.php";
?>