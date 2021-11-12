<?php
include ('include/entete.inc.php');
if (isset($_POST['rajouter'])) {

    //On récupère les variables.
    $credit = filter_input(INPUT_POST, 'cred', FILTER_SANITIZE_NUMBER_INT);

      $instruction = $db->prepare("UPDATE users SET credit = credit + :credit WHERE id = ".$_SESSION['idUtilisateur'].";");
      $instruction->bindParam(':credit', $credit, PDO::PARAM_INT);
  
      try {
        $instruction->execute();
        $query = "SELECT * from photoforyou.users where id = ".$_SESSION['idUtilisateur'].";";
        $requete = $db->query($query);
        $result = $requete->fetch();
        $_SESSION['credit'] = htmlentities($result['credit']);
        echo '<script>
        alert("Vous avez bien rajouter des crédits !");
        location.href="profil.php";
        </script>';
      } catch(PDOException $e) {
        echo "<h1>Erreur : </h1>" . $e->getMessage();
        var_dump($_POST);
      }
  
    } else {
      echo '<script>
        alert("bug");
        location.href="register.php";
        </script>';
    }
?>