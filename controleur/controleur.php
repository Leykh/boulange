<?php
        require_once "model/ordiManager.php";
        require_once "./outil/outils.php";
        require_once "model/initdonnees.php";
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
        function afficherOrdiSeul($id){
            $Ordi=lireOrdiById($id);
            require "vue/afficherOrdiSeul.php";
        }
        function supprimerOrdi($id){
            supprimerOrdiBD($id);
            $Ordi=lireOrdiById($id);
            header("Location: index.php?action=tab");
        }
        function supprimerTousOrdi(){
            supprimerTousOrdiBD();
            header("Location: index.php?action=tab");
        }
        function createOrdiBD(){
            creerOrdiBD();
            header("Location: index.php?action=tab");
        }
        function initOrdi(){
            init();
            header("Location: index.php?action=tab");
        }
        function dropTable(){
            deleteOrdiBD();
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
        function ajouterOrdiPanier($id){
            echo "controleur ajouterOrdiPanier id=".$id;
            if(!isset($_SESSION['Ordis'])){
                $_SESSION['Ordis'] = array();
            }
            if(in_array($id, $_SESSION['Ordis'])){
                echo $id." est d??j?? commander<br>";
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
            else
                   require "vue/afficherCommandeVide.php";
        }
        function afficherCommandeVide(){
            require "vue/afficherCommandeVide.php";
        }
        function supprimerCommande(){
            $_SESSION['Ordis'] = array();
            afficherTableau($_SESSION,"controleur - supprimerCommand _SESSION");
            header("Location: index.php?action=card");
        }
?>
