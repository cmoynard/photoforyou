<?php
  include ('include/entete.inc.php');
?>

<div class="container text-center">
<div class="py-5 text-center">
    <img class="d-block mx-auto mb-2" src="images/logo.png" alt="logo photoforyou" width="170" height="115">
  	<h1 class="display-5">PhotoForYou</h1>
    <p class="lead">Des pros au service des professionnels de la communication.</p>
    <hr class="my-2">
  </div>
        <?php
          if ($_SESSION['login']=true AND $_SESSION['type']=='client') { //bouton pour le client
           echo '<a href="galerie.php"><button type="button" class="btn btn-lg btn-outline-dark">Acheter des photos</button></a>
                <hr class="my-4">';
          }
          elseif ($_SESSION['login']=true AND $_SESSION['type']=='photographe') { //boutons pour le photographe
            echo '<a href="galerie.php"><button type="button" class="btn btn-lg btn-outline-dark">Acheter des photos</button></a> <a href="vente.php"><button type="button" class="btn btn-lg btn-outline-dark">Publier des photos</button></a>
                <hr class="my-4">';

          } elseif ($_SESSION['login']=true AND $_SESSION['type']=='admin') { //bouton pour l'admin
            echo '<h1>Vous êtes bien connecté en tant qu\'admin !</h1>
                <hr class="my-4">';
          }
          
          else {  //rien si on est pas login
            echo '<h1>Vous n\'êtes pas connecté !</h1>';
            echo '<hr class="mb-2">';
          }
        ?>
  </div>

    <div class="fixed-bottom">
      <?php 
      include ('include/piedpage.inc.php'); ?>
    </div>