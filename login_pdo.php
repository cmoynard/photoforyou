<?php
if (isset($_POST['identifier']))
{
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $requete = 'SELECT id_user from PhotoForYou2.users where email = :mail and mdp = :motDePasse';
  $instruction = $db->prepare($requete);
  $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instruction->bindParam(':motDePasse', $motdepasse, PDO::PARAM_STR);
  $instruction->execute();
  $num = $instruction->fetchAll();
  if (count($num)>0)
  {
      // On récupère le prénom pour le message d'acceuil
      $_SESSION['login'] = true;
      $query = "SELECT * from photoforyou.users where email = '$mail';";
      $requete = $db->query($query);
      $result = $requete->fetch();
      $_SESSION['prenomUtilisateur'] = htmlentities($result['Prenom']);
      $_SESSION['nomUtilisateur'] = htmlentities($result['Nom']);
      $_SESSION['emailUtilisateur'] = htmlentities($result['Mail']);
      $_SESSION['credit'] = htmlentities($result['Credit']);
      $_SESSION['photo'] = "images/".htmlentities($result['Photo']);
      $_SESSION['type'] = htmlentities ($result['Type']);
      unset($result);
      header('Location: membres.php');
  }
  else
  {
      echo "<p class='lead'>Utilisateur inconnu</p>";
  }

}
?>