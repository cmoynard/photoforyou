<?php
include ('include/entete.inc.php');

if (isset($_POST['insert'])) {

  //On récupère les variables.
  $nom = htmlspecialchars($_POST('nom'));
  $prenom = htmlspecialchars($_POST('prenom'));
  $email = htmlspecialchars($_POST('email'));
  $type = htmlspecialchars($_POST('choixType'));
  $mdp1 = md5($_POST['mdp']);
  $mdpconf = md5($_POST['mdpconf']);

  if (isset($_FILES))
  {
    $urlPhoto = $_FILES['photoUser'];
    $nom_fichier = $urlPhoto["name"];
    if (strlen($nom_fichier)==0) 
    {
      $nom_fichier="user.png";
    }
  } else {
    echo '<script>
    alert("Photo ne marche pas.");
    location.href="register.php";
    </script>'; 
  }

  if($mdp1 == $mdpconf) {
    $instruction = $db->prepare("INSERT INTO photoforyou.users (nom, prenom, email, type, mdp, credit, photo, etat)
    VALUES  (:nom, :prenom, :email, :type, :mdp1, 0, :photoUser, 'valid')");
    $instruction->bindParam(':nom', $nom, PDO::PARAM_STR);
    $instruction->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $instruction->bindParam(':email', $email, PDO::PARAM_STR);
    $instruction->bindParam(':type', $type, PDO::PARAM_STR);
    $instruction->bindParam(':mdp1', $mdp1, PDO::PARAM_STR);
    $instruction->bindParam(':photoUser', $nom_fichier, PDO::PARAM_STR);

    try {
      $instruction->execute();
      move_uploaded_file($urlPhoto['tmp_name'],'images/'.$nom_fichier);
      echo '<script>
      alert("Vous êtes bien inscrit ! - Vous pouvez vous connecter.");
      location.href="index.php";
      </script>';
    } catch(PDOException $e) {
      echo "<h1>Erreur : </h1>" . $e->getMessage();
      var_dump($_POST);
      echo $nom_fichier;
      echo $urlPhoto;
    }

  } else {
    echo '<script>
      alert("Vos mots de passe ne correspondent pas.");
      location.href="register.php";
      </script>';
  }
}

?>