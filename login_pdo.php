<?php
include ('include/entete.inc.php');

if (isset($_POST['identifier']))
{ //Preparation de la verification du banissement
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $req_etat = "SELECT etat FROM photoforyou.users WHERE email = '$mail'";
  $r_e = $db->prepare($req_etat);
  $r_e->execute();
  $result_r_e = $r_e->fetch(\PDO::FETCH_OBJ);
  $etat =  $result_r_e->etat;

  $requete = 'SELECT id from photoforyou.users where email = :mail and mdp = :motdepasse';
  $instructions = $db->prepare($requete);
  $instructions->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instructions->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR);
  $instructions->execute();
  $num = $instructions->fetchAll();
  try {
    if (count($num)>0)
    {
      if($etat == 'banni'){ //Verification du baniisement
        header('register.php');
      } else {
      // On recupère les données dans les variables SESSION
      $_SESSION['login'] = true;
      $query = "SELECT * from photoforyou.users where email = '$mail';";
      $requete = $db->query($query);
      $result = $requete->fetch();
      $_SESSION['idUtilisateur'] = htmlentities($result['id']);
      $_SESSION['prenomUtilisateur'] = htmlentities($result['prenom']);
      $_SESSION['nomUtilisateur'] = htmlentities($result['nom']);
      $_SESSION['emailUtilisateur'] = htmlentities($result['email']);
      $_SESSION['credit'] = htmlentities($result['credit']);
      $_SESSION['photo'] = "images/".htmlentities($result['photo']);
      $_SESSION['type'] = htmlentities ($result['type']);
      unset($result);
      header('Location: membre.php');
    }
  }
  else
  {
      echo '<script>
      alert("Vos mots de passe ne correspondent pas.");
      location.href="register.php";
      </script>';
    }
  } catch (PDOException $e) {
    echo "<h1>Erreur : </h1>" . $e->getMessage();
    var_dump($_POST);
    echo $motdepasse;
  }

}
?>