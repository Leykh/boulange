<?php
    require_once "controleur/controleur.php";
    require_once "outil/outils.php";
    session_start();
    $id_session = session_id();
    echo "id_session : ". $id_session;
    if(empty($_GET['action'])){
        afficherAccueil();
    }
    elseif(isset($_GET['action'])) {
            if($_GET['action']=="tab"){
                afficherOrdis();
            }
            elseif($_GET['action'] == 'suppr'){
                supprimerOrdi($_GET['id']);
            }
            else if($_GET['action'] == 'lire'){
                afficherOrdi($_GET['id']);
            }
            elseif($_GET['action'] == 'creer'){
                creerOrdi();
            }
            elseif($_GET['action'] == 'valid-creer'){
                creerValidationOrdi();
            }
            elseif($_GET['action']=="card"){
                afficherCardOrdi();
            }
            elseif($_GET['action'] == 'modifier'){
                modifierOrdi($_GET['id']);
            }
            elseif($_GET['action'] == 'valid-modifier'){
                echo "Modifier validation";
                modifierValidationOrdi();
            }
            elseif($_GET['action'] == 'addpanier'){
                echo "Ajouter panier id=".$_GET['id'];
                ajouterOrdiPanier($_GET['id']);
            }
            elseif($_GET['action'] == 'panier'){
                echo "Voir commande";
                if(isset($_SESSION['Ordis']))
                    afficherCommande();
                else afficherCommandeVide();
            }
            elseif($_GET['action']=="supprpanier"){ 
                echo "Supprimer commande";
                supprimerCommande();
            }
            elseif($_GET['action'] == 'addpanier'){
                echo "Ajouter panier id=".$_GET['id'];
                ajouterOrdiPanier($_GET['id']);
            }
            elseif($_GET['action'] == 'delAll'){
                supprimerTousOrdi();
            }
            elseif($_GET['action'] == 'init'){
                initOrdi();
            }
            elseif($_GET['action'] == 'dropOrdi'){
                dropTable();
            }
            elseif($_GET['action'] == 'createOrdiBD'){
                createOrdiBD();
            }
            else {
                echo "La page n'existe pas";
            } 
    }
    else {
        echo "La page n'existe pas";
    } 
?>
