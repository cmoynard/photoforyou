<?php
include ("include/entete.inc.php");
if($_SESSION['login']!=true OR $_SESSION['type']!='photographe')
{
  header("Location:login.php");
} elseif ($_SESSION['type']!='photographe') {
  header("Location:login.php");
}
?>
<div class="container">
  <div class="jumbotron">
    <h1 class="display-4">Ajouter une photo dans la galerie</h1>
    <p class="lead">Vous touchez 80% sur chaque photo vendu !</p>
    <hr class="my-4">
  </div>

  <form method="post" id="form" enctype="multipart/form-data" novalidate>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="nomP">Nom de la Photo : </label>
        <input type="text" class= "form-control" name="nomP" id="nomP" minlength="3" maxlength="30" required>
        <div class="invalid-feedback">
          Nom obligatoire (De 3 à 30 caractères)
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="descP">Description de la photo :</label>
        <input type="text" class="form-control" id="descP" name="descP" minlength="3" maxlength="100" required>
        <div class="invalid-feedback">
        Description obligatoire (De 3 à 100 caractères)
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <label for="nomP">Prix de vente de la photo : </label>
        <input type="number" class= "form-control" name="prixP" id="prixP" required>
        <div class="invalid-feedback">
          Prix obligatoire
        </div>
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-4 mb-3">
        <input type="file" onchange="actuPhoto(this)" class="form-control mb-2" id="srcP" name="srcP" accept="image/jpeg, image/png, image/gif" required>
        <img src="" id="photo" class="img-responsive float-right" width=20%>
        <div class="invalid-feedback">
          Photo obligatoire
        </div>
      </div>
    </div>

    <input type="submit" value="Ajouter votre photo !" class="btn btn-lg btn-outline-success" name="vendre" />

  </form>
  <hr class="my-4">
  <a href="profil.php"><button type="button" class="btn btn-lg btn-outline-danger mb-2">Annuler la vente</button></a>
  <hr class="my-4">
</div>

<?php
if (isset($_POST['vendre']))
{
  $nomP =  htmlentities($_POST['nomP']);
  $descP =  htmlentities($_POST['descP']);
  $prixP =  htmlentities($_POST['prixP']);

  if (isset($_FILES))
  {
    $urlPhoto = $_FILES['srcP'];
    $nom_fichier = $urlPhoto["name"];
    if (strlen($nom_fichier)==0) 
    {
      $nom_fichier="user.png";
    }
  } else {
    echo '<script>
    alert("Photo ne marche pas.");
    location.href="vente.php";
    </script>'; 
  }

    $instruction = $db->prepare("INSERT INTO photoforyou.galerie (nomPhoto, nomCard, descCard, prixCard, id_vendeur)
    VALUES  (:nomPhoto, :nomCard, :descCard, :prixCard, :id_vendeur)");
    $instruction->bindParam(':nomPhoto', $nom_fichier, PDO::PARAM_STR);
    $instruction->bindParam(':nomCard', $nomP, PDO::PARAM_STR);
    $instruction->bindParam(':descCard', $descP, PDO::PARAM_STR);
    $instruction->bindParam(':prixCard', $prixP, PDO::PARAM_INT);
    $instruction->bindParam(':id_vendeur', $_SESSION['idUtilisateur'], PDO::PARAM_INT);

    try {
      $instruction->execute();
      move_uploaded_file($urlPhoto['tmp_name'],'images/galerie/'.$nom_fichier);
      echo '<script>
      alert("Votre photo vient d\'être publié !");
      location.href="galerie.php";
      </script>';
    } catch(PDOException $e) {
      echo "<h1>Erreur : </h1>" . $e->getMessage();
      var_dump($_POST);
      echo $nom_fichier;
      echo $urlPhoto;
    }
}
?>

<script>
function actuPhoto(element)
{
  var image=document.getElementById("srcP");
  var fReader = new FileReader();
  fReader.readAsDataURL(image.files[0]);
  fReader.onloadend = function(event)
  {
    var img = document.getElementById("photo");
    img.src = event.target.result;
  }
}

var nom=document.getElementById("nomP");
nom.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le Nom");
});

var desc=document.getElementById("descP");
desc.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour la description");
});

var prix=document.getElementById("prixP");
prix.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour le prix");
});

var srcP=document.getElementById("srcP");
srcP.addEventListener("blur", function (evt) {
  console.log("Perte de focus pour la source img");
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