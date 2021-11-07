<?php

$host = 'localhost';
$dbname = 'photoforyou';
$username = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username", "$password");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $exc) {
  die("Erreur : ".$exc->getMessage());
}

if (isset($_POST['insert'])) {

  //On récupère les variables.
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $type = $_POST['choixType'];
  $mdp1 = md5($_POST['mdp']);
  $mdpconf = md5($_POST['mdpconf']);

  if (isset($_FILES) && count($_FILES)>0)
  {
    $urlPhoto = $_FILES['photoUser'];
    $nom_fichier = $urlPhoto['name'];
    if (strlen($nom_fichier)==0) 
    {
      $nom_fichier="user.png";
    }
  }

  if($mdp1 == $mdpconf) {
    $instruction = $pdo->prepare("INSERT INTO users (nom, prenom, email, type, mdp)
    VALUES  (:nom, :prenom, :email, :type, :mdp1)");
    $instruction->bindParam(':nom', $nom, PDO::PARAM_STR);
    $instruction->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $instruction->bindParam(':email', $email, PDO::PARAM_STR);
    $instruction->bindParam(':type', $type, PDO::PARAM_STR);
    $instruction->bindParam(':mdp1', $mdp1, PDO::PARAM_STR);

    try {
      $instruction->execute();
      move_uploaded_file($urlPhoto['tmp_name'],'images/'.$nom_fichier);
      echo '<script>
      alert("Vous êtes bien inscrit !");
      location.href="index.php";
      </script>';
    } catch(PDOException $e) {
      echo "<h1>Erreur : </h1>" . $e->getMessage();
      var_dump($_POST);
    }

  } else {
    echo '<script>
      alert("Vos mots de passe ne correspondent pas.");
      location.href="register.php";
      </script>';
  }
}

?>