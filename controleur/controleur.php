<?php
        require_once "model/ordiManager.php";
        require_once "./outil/outils.php";
        function afficherAccueil(){
            require "vue/accueil.php";
        }
        function afficherOrdis(){
            $tabOrdis=lireOrdiBd();
            require "vue/afficherOrdis.php";
        }
        function afficherOrdi($id){
            $Ordi=lireOrdiById($id);
            require "vue/afficherOrdi.php";
        }
        function supprimerOrdi($id){
            supprimerOrdiBD($id);
            $Ordi=lireOrdiById($id);
            header("Location: index.php?action=tab");
        }
        function creerOrdi(){
            require "vue/formulaireOrdi.php";
        }
        function creerValidationOrdi(){
            $file = $_FILES['image'];
            $repertoire = "public/images/";
            $nomImageAjoute = ajouterImage($file,$repertoire);
            $random = rand(0,99999);
            ajouterOrdiBd($_POST['denomination'],$_POST['prix'],$_POST['processeur'],$_POST['ecran'],$_POST['vive'],$nomImageAjoute,'https://www.boulanger.com/ref/'.$random);
            header("Location: index.php?action=tab");
        }
        function afficherCardOrdi(){
            $tabOrdis=lireOrdi();
            require "vue/cardOrdi.php";
        }
        function modifierOrdi($id){
            echo "Modifier Ordi id=".$id."<br>";
            $Ordi=lireOrdiById($id);
            require "vue/modifierOrdi.php";
        }
        function modifiervalidationOrdi(){
            afficherTableau($_POST,"POST");
            echo "Modifier VALIDATION Ordi id<br>";
            modificationOrdiBD($_POST['id'],$_POST['denomination'],$_POST['prix'],$_POST['processeur'],$_POST['ecran'],$_POST['vive'],$_POST['image'],$_POST['lien']);
            header("Location: index.php?action=tab");
        }
        function ajouerterOrdiPanier($id){
            echo "controleur ajouerterOrdiPanier id=".$id;
            if(!isset($_SESSION['Ordis'])){
                $_SESSION['Ordis'] = array();
            }
            if(in_array($id, $_SESSION['Ordis'])){
                echo $id." est déjà commander<br>";
            }
            else {
                $_SESSION['Ordis'][]=$id;
            }
            afficherTableau($_SESSION['Ordis'],"SESSION['Ordis']");
            header("Location: index.php?action=card");
        }
        function afficherCommande(){
            foreach($_SESSION['Ordis'] as $id){
                $Ordis[]=lireOrdiById($id);
            }
            if(isset($Ordis)){
                if(count($Ordis) > 0)
                    require "vue/afficherCommande.php";
            }
            else //echo "La commande est vide<br>";
                header("Location: index.php?action=card");
        }
        function supprimerCommande(){
            $_SESSION['Ordis'] = array();
            afficherTableau($_SESSION,"controleur - supprimerCommand _SESSION");
            header("Location: index.php?action=card");
        }
?>