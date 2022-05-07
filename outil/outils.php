<?php

function afficherTableau($tab,$titre){
    echo "<hr>";
    echo "<p>Tableau ".$titre."</p>";
    echo "<pre>";
    print_r($tab);
    echo "</pre>";
    echo "<hr>";
}

function ajouterImage($file, $dir){
    $random = rand(0,99999);
    $target_file = $dir.$random."_".$file['name'];
    move_uploaded_file($file['tmp_name'], $target_file);
    return $random."_".$file['name'];
}
function afficherChaine($chaine, $titre){
    echo "<p>".$titre."</p>";
    echo "Chaine = ". $chaine . "<br>";
    echo "<hr>";
}

function sousChaineTaille($chaine,$taille){
    if(strlen($chaine) >= $taille)
        $sousChaine = substr($chaine, 0, $taille)."...";
    else {
        $bouchon = str_repeat(" ", $taille-strlen($chaine));
        $sousChaine = $chaine;
    }
    return $sousChaine;
}
?>