<?php
	include ("include/entete.inc.php");
	if($_SESSION['login']!=true )
  {
    header("Location:login.php");
  }
  ?>
	<div class="container">
    	<div class="jumbotron">
      		<h1 class="display-4">Page des utilisateurs de PhotoForYou</h1>
      		<?php echo '<p class="lead">Bonjour '.htmlentities($_SESSION['nomUtilisateur']).' comment allez vous ?</p>'?>
      		<hr class="my-4">
    </div>
  </div>
  <?php
    include ("include/piedpage.inc.php");
?>