<?php
  include ('include/entete.inc.php');
?>
<div class="container text-center">
<div class="py-5 text-center">
    <img class="d-block mx-auto mb-2" src="images/logo.png" alt="logo photoforyou" width="170" height="115">
  	<h1 class="display-5">PhotoForYou</h1>
    <p class="lead">Des pros au service des professionnels de la communication.</p>
    <hr class="my-4">
  </div>
        <?php
          if ($_SESSION['login']=true AND $_SESSION['type']=='client') {
           echo '<a href="galerie.php"><button type="button" class="btn btn-lg btn-outline-dark">Acheter des photos</button></a>
                <hr class="my-4">';
          }
          elseif ($_SESSION['login']=true AND $_SESSION['type']=='photographe') {
            echo '<a href="galerie.php"><button type="button" class="btn btn-lg btn-outline-dark">Acheter des photos</button></a> <button type="button" class="btn btn-lg btn-outline-dark">Publier des photos</button>
                <hr class="my-4">';
          } else {
            echo '<h1>Vous n\'êtes pas connecté !</h1>
                <hr class="my-4">';
          }
        ?>
  </div>
  <div class="py-1 text-center">
    <img class="d-block mx-auto mb-2" src="images/logo.png" alt="logo photoforyou" width="170" height="115">
  	<h1 class="display-5">PhotoForYou</h1>
    <p class="lead">Crée par des pros, et pour des pros, PhotoForYou est le site de référence de banque d'image en ligne pour particuliers et professionnels.</p>
    <hr class="my-4">
  </div>


      <?php 
      include ('include/piedpage.inc.php'); ?>