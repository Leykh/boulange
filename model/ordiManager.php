<?php
require_once "connexion.php";

function creerOrdiBD()
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
function deleteOrdiBD()
{
    $pdo = getPdo();
    $sql = "DROP TABLE `ordi`";
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
    $req = "
    INSERT INTO ordi (denomination, prix , processeur, ecran, vive, image, lien)
    values (:denomination, :prix, :processeur, :ecran, :vive, :image, :lien)";
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


function lireOrdiById($id){
    $pdo = getPdo();
    $req = "SELECT * FROM ordi WHERE id=:id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_STR);
    $cpt = $stmt->execute();
    $Ordi = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();  
    return $Ordi;
}

function supprimerOrdiBD($id){
    $pdo = getPdo();
    $req = "Delete from ordi where id = :idOrdi";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":idOrdi",$id,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0){
        echo "Ordi supprimer id=".$id."<br>";
    }
}

function supprimerTousOrdiBD(){
    $pdo = getPdo();
    $req = "Delete from ordi";
    $stmt = $pdo->prepare($req);
    $nbr = $stmt->execute();
    return $nbr;
}

function lireOrdi(){
    $pdo = getPdo();
    $sql = "SELECT * FROM ordi";
    $req = $pdo->prepare($sql);
    $req->execute();
    $ordi = $req->fetchAll(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $ordi;
}
function modificationOrdiBD($id,$denomination, $prix, $processeur, $ecran, $vive, $image, $lien){
    $pdo = getPdo();
    $req = "
    update ordi 
    set denomination = :denomination, prix = :prix, processeur = :processeur, ecran = :ecran, vive = :vive, image = :image, lien = :lien
    where id = :id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->bindValue(":denomination", $denomination, PDO::PARAM_STR);
    $stmt->bindValue(":prix", $prix, PDO::PARAM_STR);
    $stmt->bindValue(":processeur", $processeur, PDO::PARAM_STR);
    $stmt->bindValue(":ecran", $ecran, PDO::PARAM_STR);
    $stmt->bindValue(":vive", $vive, PDO::PARAM_STR);
    $stmt->bindValue(":image", $image, PDO::PARAM_STR);
    $stmt->bindValue(":lien", $lien, PDO::PARAM_STR);
    $resultat = $stmt->execute();
    $stmt->closeCursor();

    if($resultat > 0){
        echo "Ordi modifier id=".$id."<br>";
    }
}