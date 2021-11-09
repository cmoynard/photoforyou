<?php
  include ('include/entete.inc.php');
?>
<div class="container text-center">
<div class="py-5 text-center">
    <img class="d-block mx-auto mb-2" src="images/logo.png" alt="logo photoforyou" width="170" height="115">
  	<h1 class="display-5">PhotoForYou</h1>
    <p class="lead">Des pros au service des professionnels de la communication.</p>
  </div>
        <?php
          if ($_SESSION['login']=true AND $_SESSION['type']=='client') {
           echo '<button type="button" class="btn btn-lg btn-outline-dark">Acheter des photos</button><br><br>';
          }
          elseif ($_SESSION['login']=true AND $_SESSION['type']=='photographe') {
            echo '<button type="button" class="btn btn-lg btn-outline-dark">Publier des photos</button><br><br>';
          } else {
            echo '<h1>Vous n\'êtes pas connecté !</h1><br><br>';
          }
        ?>
</div>


      <?php 
      include ('include/piedpage.inc.php'); ?>