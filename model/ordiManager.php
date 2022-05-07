<?php
require_once "connexion.php";

function creerOrdiBd()
{
    $pdo = getPdo();
    $sql = "CREATE TABLE IF NOT EXISTS `ordi` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `denomination` varchar(150) NOT NULL,
        `prix` varchar(150) NOT NULL,
        `processeur` varchar(150) NOT NULL,
        `ecran` varchar(150) NOT NULL,
        `vive` varchar(150) NOT NULL,
        `image` varchar(150) NOT NULL,
        `lien` varchar(150) NOT NULL,
        PRIMARY KEY (`id`)
        );";
    $req = $pdo->prepare($sql);
    $req->execute();
    $req->closeCursor();
}

function lireOrdiBd()
{
    $pdo = getPdo();
    $sql = "SELECT * FROM ordi";
    $req = $pdo->prepare($sql);
    $req->execute();
    $ordi = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $ordi;
}

function ajouterOrdiBd($denomination, $prix, $processeur, $ecran, $vive, $image, $lien)
{
    $pdo = getPdo();
    $req = "INSERT INTO ordi (denomination, prix , processeur, ecran, vive, image, lien) values (:denomination, :prix, :processeur, :ecran, :vive, :image, :lien)";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":denomination", $denomination, PDO::PARAM_STR);
    $stmt->bindValue(":prix", $prix, PDO::PARAM_STR);
    $stmt->bindValue(":processeur", $processeur, PDO::PARAM_STR);
    $stmt->bindValue(":ecran", $ecran, PDO::PARAM_STR);
    $stmt->bindValue(":vive", $vive, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":lien", $lien, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if ($resultat > 0) {
        echo "ordi insérer id=" . $pdo->lastInsertId() . "<br>";
    }
}
