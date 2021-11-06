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
  $mdp1 = md5($_POST['mdp']);
  $mdpconf = md5($_POST['mdpconf']);

  if($mdp1 == $mdpconf) {
    $instruction = $pdo->prepare("INSERT INTO users (nom, prenom, email, mdp)
    VALUES  (:nom, :prenom, :email, :mdp1)");
    $instruction->bindParam(':nom', $nom, PDO::PARAM_STR);
    $instruction->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $instruction->bindParam(':email', $email, PDO::PARAM_STR);
    $instruction->bindParam(':mdp1', $mdp1, PDO::PARAM_STR);

    try {
      $instruction->execute();
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