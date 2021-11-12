<?php
	include ("include/entete.inc.php");
  if ($_SESSION['login']!=true OR $_SESSION['type']=='visiteur')
  {
    header("Location:login.php");
  }

  ?>
	<div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Votre profil de <?php echo $_SESSION['type'] ?></h1>
      <?php echo '<p class="lead">Bonjour '.$_SESSION['nomUtilisateur'].' !</p>'?>
      <?php echo "<p class='lead'>Vos crédit(s) : ".$_SESSION['credit']."</p>" ?>
      <hr class="my-4">
    </div>
  </div>
  <div class="container">
  <div class="row">
    <div class="col-sm-3">
      <div class="card">
        <?php $idPhoto = 1;
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          echo "<img src=$galPhoto class='card-img-top' alt='...'/>";
          $idPhoto++;?>

        <div class="card-body">
          <h5 class="card-title">Jolie fleure</h5>
          <p class="card-text">
            Une belle fleure prise en photo par le talentueux
            Sungondese-Jr.
          </p>
          <a href="achat.php" class="btn btn-primary">Acheter pour 40 crédits</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
      <?php
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          echo "<img src=$galPhoto class='card-img-top' alt='...' />";
          $idPhoto++;?>

        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p>
          <a href="#!" class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <?php
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          echo "<img src='https://mdbootstrap.com/img/new/standard/nature/184.jpg' class='card-img-top' alt='...'/>";
          $idPhoto++;?>
          
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p>
          <a href="#!" class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
    <div class="col-sm-3">
      <div class="card">
        <?php
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          echo "<img src='https://mdbootstrap.com/img/new/standard/nature/184.jpg' class='card-img-top' alt='...'/>";
          $idPhoto++;?>
          
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">
            Some quick example text to build on the card title and make up the bulk of the
            card's content.
          </p>
          <a href="#!" class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="container">
    <div class="jumbotron">
      <hr class="my-4"><br>
    </div>
  </div>
  <?php
    include ("include/piedpage.inc.php");
?>