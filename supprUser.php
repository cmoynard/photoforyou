<?php
include ("include/entete.inc.php");
if($_SESSION['login']!=true)
{
  header("Location:login.php");
}
?>
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Suppression d'un utilisateur</h1>
    <p class="lead">!!! Attention suppression !!!</p>
    <hr class="my-4">
  </div>

  <form method="post" id="form" novalidate>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="email">Email : </label>
        <input type="text" class= "form-control" name="mail" id="email" required>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
        <div class="invalid-feedback">
          Vous devez fournir un mot de passe.
        </div>
      </div>
    </div>
    <input type="submit" value="! Supprimer son compte !" class="btn btn-lg btn-outline-danger" name="identifier" />
  </form>
  <hr class="my-4">
  <a href="profil.php"><button type="button" class="btn btn-lg btn-outline-primary mb-2">Retourner au profil</button></a>
  <hr class="my-4"><br><br><br><br>
</div>

<?php
if (isset($_POST['identifier']))
{
  $mail =  htmlentities($_POST['mail']);
  $motdepasse = md5($_POST['motdepasse']);
  $requete = 'DELETE  FROM  photoforyou.users where email = :mail and mdp = :motDePasse';
  $instruction = $db->prepare($requete);
  $instruction->bindParam(':mail', $mail, PDO::PARAM_STR);
  $instruction->bindParam(':motDePasse', $motdepasse, PDO::PARAM_STR);
  try
  {
    $instruction->execute();
    session_destroy();
    echo '<script>
    alert("Votre compte à été supprimé définitivement.");
    location.href="register.php";
    </script>'; 
  }
  catch(PDOException $e) {
    echo "<h1>Erreur : </h1>" . $e->getMessage();
    var_dump($_POST); 
  }
}
?>

<script>
var mail=document.getElementById("email");
mail.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le mail");
});

var motDePasse=document.getElementById("motdepasse");
motDePasse.addEventListener("blur", function (evt) {
  validationMotDePasse();
});

(function() {
  "use strict"
  window.addEventListener("load", function() {
    var form = document.getElementById("form")
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault()
        event.stopPropagation()
      }
      form.classList.add("was-validated")
    }, false)
  }, false)

}())
</script>

<?php
  include ("include/piedpage.inc.php");
?>