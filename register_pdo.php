<?php
include ('include/entete.inc.php');

if (isset($_POST['insert'])) {

  //On récupère les variables.
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $email = htmlspecialchars($_POST['email']);
  $type = htmlspecialchars($_POST['choixType']);
  $mdp1 = md5($_POST['mdp']);
  $mdpconf = md5($_POST['mdpconf']);

  if (isset($_FILES)) //si une photo est détecté
  {
    $urlPhoto = $_FILES['photoUser'];
    $nom_fichier = $urlPhoto["name"];
    if (strlen($nom_fichier)==0) 
    {
      $nom_fichier="user.png"; 
    }
  } else { //si pas de photo
    echo '<script>
    alert("Photo ne marche pas.");
    location.href="register.php";
    </script>'; 
  }

  if($mdp1 == $mdpconf) { //si les mdp sont identiques
    $instruction = $db->prepare("INSERT INTO photoforyou.users (nom, prenom, email, type, mdp, credit, photo, etat)
    VALUES  (:nom, :prenom, :email, :type, :mdp1, 0, :photoUser, 'valid')");
    $instruction->bindParam(':nom', $nom, PDO::PARAM_STR);
    $instruction->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $instruction->bindParam(':email', $email, PDO::PARAM_STR);
    $instruction->bindParam(':type', $type, PDO::PARAM_STR);
    $instruction->bindParam(':mdp1', $mdp1, PDO::PARAM_STR);
    $instruction->bindParam(':photoUser', $nom_fichier, PDO::PARAM_STR);

    try { //on vérifie que l'utilisateur a bien toute les données
      $instruction->execute(); //on execute la requete
      move_uploaded_file($urlPhoto['tmp_name'],'images/'.$nom_fichier); //on déplace la photo dans le dossier images
      echo '<script>
      alert("Vous êtes bien inscrit ! - Vous pouvez vous connecter.");
      location.href="index.php";
      </script>';
    } catch(PDOException $e) { //si erreur
      echo "<h1>Erreur : </h1>" . $e->getMessage();
      var_dump($_POST);
      var_dump($nom_fichier);
      echo $urlPhoto;
    }

  } else { //si les mdp ne sont pas identiques
    echo '<script>
      alert("Vos mots de passe ne correspondent pas.");
      location.href="register.php";
      </script>';
  }
}

?>