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
          <?php echo "<img src=".$_SESSION['photo']." id='photo'  width=12% class='img-responsive float-left' >" ?>
      		<?php echo '<p class="lead">Bonjour '.$_SESSION['nomUtilisateur'].' !</p>'?>
      		<hr class="my-4">
          <?php echo "<p class='lead'>Nom : ".$_SESSION['nomUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Prénom : ".$_SESSION['prenomUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Courriel : ".$_SESSION['emailUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Vos crédit(s) : ".$_SESSION['credit']."</p>" ?>
          <hr class="my-4">
          <a href="rajcredit.php"><button type="button" class="btn btn-lg btn-outline-dark">Rajouter des crédits.</button></a>
          <hr class="my-4">
          <p class="lead">Photos acheté : </p>
          <?php if (isset($_SESSION['photoAchat'])) 
          {
            echo "<img src=".$_SESSION['photoAchat']." id='photo'  width=12% class='img-responsive float-left' >" ;
            echo "<hr class='my-4'>";
          } ?>
          <a href="supprUser.php"><button type="button" class="btn btn-lg btn-outline-danger mb-2">! Supprimer votre compte !</button></a>
          <hr class="my-4">
    </div>
  </div>
  <?php
    include ("include/piedpage.inc.php");
?>