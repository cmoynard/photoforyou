<?php
include ('include/entete.inc.php');

if (isset($_POST['identifier']))
{
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $requete = 'SELECT id from photoforyou.users where email = :mail and mdp = :motdepasse';
  $instruction = $db->prepare($requete);
  $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instruction->bindParam(':motDePasse', $motdepasse, PDO::PARAM_STR);
  $instruction->execute();
  $num = $instruction->fetchAll();
  try {
    if (count($num)>0)
    {
      // On récupère le prénom pour le message d'accueil
      $_SESSION['login'] = true;
      $query = "SELECT * from photoforyou.users where email = '$mail';";
      $requete = $db->query($query);
      $result = $requete->fetch();
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
    echo $num;
  }

}
?>