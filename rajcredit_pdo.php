<?php
include ('include/entete.inc.php');
if (isset($_POST['rajouter'])) {

    //On récupère les variables.
    $credit = filter_input(INPUT_POST, 'cred', FILTER_SANITIZE_NUMBER_INT);

      $instruction = $db->prepare("UPDATE users SET credit = credit + :credit WHERE id = ".$_SESSION['idUtilisateur'].";");
      $instruction->bindParam(':credit', $credit, PDO::PARAM_INT);
  
      try {   //on essaye les commandes, si y a erreur, alors catch se lance
        $instruction->execute();
        $query = "SELECT * from photoforyou.users where id = ".$_SESSION['idUtilisateur'].";";
        $requete = $db->query($query);
        $result = $requete->fetch();
        $_SESSION['credit'] = htmlentities($result['credit']); //on met à jour le credit de l'utilisateur
        echo //sinon script et redirection
        '<script>
        alert("Vous avez bien rajouter des crédits !");
        location.href="profil.php";
        </script>';
      } catch(PDOException $e) {
        echo "<h1>Erreur : </h1>" . $e->getMessage(); //erreur recupéré dans le try
        var_dump($_POST);
      }
  
    } else { //mesure de sécurité si jamais le formulaire n'as pas été activé
      echo '<script>
        alert("bug");
        location.href="register.php";
        </script>';
    }
?>