<?php
include ('include/entete.inc.php');

if (isset($_POST['identifier']))
{ //préparation des requetes sql et bannissement
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $req_etat = "SELECT etat FROM photoforyou.users WHERE email = '$mail'";
  $r_e = $db->prepare($req_etat);
  $r_e->execute();
  $result_r_e = $r_e->fetch(\PDO::FETCH_OBJ);
  $etat =  $result_r_e->etat;

  $requete = 'SELECT id from photoforyou.users where email = :mail and mdp = :motdepasse'; //préparation requete pour verification mail et mdp
  $instructions = $db->prepare($requete);
  $instructions->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instructions->bindParam(':motdepasse', $motdepasse, PDO::PARAM_STR);
  $instructions->execute();
  $num = $instructions->fetchAll();
  try { //on vérifie que l'utilisateur a bien toute les données
    if($etat == 'banni'){ //Verification du banissement
      echo '<script>
      alert("!! VOUS ETES BANNI !!");
      location.href="index.php";
      </script>';
    }
    elseif (count($num)>0) //sinon on verifie qu'on a trouvé le user dans la bdd et on crée les données de session
    {
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
  else
  {  //il n'y as pas de user, on le redirectionne vers la page de register
      echo '<script>
      alert("Vos mots de passe ne correspondent pas.");
      location.href="register.php";
      </script>';
    }
  } catch (PDOException $e) { //si erreur on affiche le message d'erreur
    echo "<h1>Erreur : </h1>" . $e->getMessage();
    var_dump($_POST);
    echo $motdepasse;
  }

}
?>