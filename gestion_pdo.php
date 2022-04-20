<?php
include 'include/entete.inc.php';

if(empty($_SESSION['type'])){
    header('location:index.php');
    exit();
}
if($_SESSION['type'] != 'admin'){ //double vérification, redirection si on est pas admin ou si pas de session
    header('location:index.php');
    exit();
}else{
    
        if (isset($_GET["id"])) {
            if (isset($_GET["etat"])) { //on vérifie que l'utilisateur a bien toute les données
    
                $id = $_GET["id"];
                $etat = $_GET["etat"];
                if($etat == 'valid'){
                    // Valid devient banni
                    $req = $db->prepare("UPDATE photoforyou.users SET etat='banni' WHERE id = '$id'");
                    $req->execute();
                }

                if($etat == 'banni'){
                    // Banni devient valid
                    $req = $db->prepare("UPDATE photoforyou.users SET etat='valid' WHERE id = '$id'");
                    $req->execute();
                }
                header("location:gestionUtilisateur.php");
            }
        }
    }
?>