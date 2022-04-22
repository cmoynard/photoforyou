<?php
include ('include/entete.inc.php');

if (isset($_POST['acheter']))
{
  $creditAchat = intval($_POST['nbCredit']);
  $idAchat = $_POST['idAchat'];
  $requete = 'SELECT * from photoforyou.galerie where idPhoto = :idPhoto';
  $instructions = $db->prepare($requete);
  $instructions->bindParam(':idPhoto', $idAchat, PDO::PARAM_INT);
  $instructions->execute();
  $num = $instructions->fetchAll();
  try {
    if ($_SESSION['credit']>= $creditAchat AND count($num)>0)
    {
      $query = "SELECT * from photoforyou.galerie where idPhoto = '$idAchat';";
      $requete = $db->query($query);
      $result = $requete->fetch();
      $_SESSION['photoAchat'] ="images/galerie/".htmlentities($result['nomPhoto']);
      unset($result);
      $instruction = $db->prepare("UPDATE users SET credit = credit - :credit WHERE id = ".$_SESSION['idUtilisateur'].";");
      $instruction->bindParam(':credit', $creditAchat, PDO::PARAM_INT);
      $instruction->execute();

      $instruction = $db->prepare("UPDATE galerie SET id_acheteur = :id_acheteur WHERE idPhoto = :idAchat;");
      $instruction->bindParam(':id_acheteur', $_SESSION['idUtilisateur'], PDO::PARAM_INT);
      $instruction->bindParam(':idAchat', $idAchat, PDO::PARAM_INT);
      $instruction->execute();
      
      $query = "SELECT * from photoforyou.users where id = ".$_SESSION['idUtilisateur'].";";
      $requete = $db->query($query);
      $result = $requete->fetch();
      $_SESSION['credit'] = htmlentities($result['credit']);
      unset($result);
      echo '<script>
      alert("Votre achat a été effectué !");
      location.href="profil.php";
      </script>';
  }
  else
  {
      echo '<script>
      alert("Vous n\'avez pas assez de crédits. Vous pouvez en rajouter sur votre profil !");
      location.href="galerie.php";
      </script>';
    }
  } catch (PDOException $e) {
    echo "<h1>Erreur : </h1>" . $e->getMessage();
    var_dump($_POST);
  }

}
?>