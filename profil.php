<?php
	include ("include/entete.inc.php");
  if ($_SESSION['login']!=true OR $_SESSION['type']=='visiteur')
  {
    header("Location:login.php"); //redirect si pas login
  }
  ?>
	<div class="container">
    	<div class="jumbotron"> <!-- Affichage du profil et rajout crédit -->
      		<h1 class="display-4">Votre profil de <?php echo $_SESSION['type'] ?></h1>
          <?php echo "<img src=".$_SESSION['photo']." id='photo'  width=15% class='img-responsive float-left' >" ?>
      		<?php echo '<p class="lead">Bonjour '.$_SESSION['nomUtilisateur'].' !</p>'?>
      		<hr class="my-4">
          <?php echo "<p class='lead'>Nom : ".$_SESSION['nomUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Prénom : ".$_SESSION['prenomUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Courriel : ".$_SESSION['emailUtilisateur']."</p>" ?>
          <?php echo "<p class='lead'>Vos crédit(s) : ".$_SESSION['credit']."</p>" ?>
          <hr class="my-4">
          <a href="rajcredit.php"><button type="button" class="btn btn-lg btn-outline-dark">Rajouter des crédits.</button></a>
          <?php
            if ($_SESSION['type'] == 'photographe') {
            
              $query = "SELECT * from photoforyou.galerie where id_vendeur = ".$_SESSION['idUtilisateur'].";";
              $requete = $db->query($query);
              $result = $requete->fetchAll();
              $photos_vendus = [];

              if (!empty($result)) {
                echo '<hr class="my-4">';
                echo '<p class="lead">Photos en vente : </p>';
                echo '<div class="row row-cols-6">';

                foreach ($result as $ligne) {
                  if ($ligne['id_acheteur'] == NULL) {
                    echo '<div class="col">';
                    echo "<img src='images/galerie/".htmlentities($ligne['nomPhoto'])."' id='photo' class='img-responsive float-left h-100 w-100' >" ;
                    echo '</div>';
                  } else {
                    array_push($photos_vendus, $ligne);
                  }
                } echo '</div>';
              }
              if (!empty($photos_vendus)) {
                
                echo '<hr class="my-4">';
                echo '<p class="lead">Photos vendus : </p>';
                echo '<div class="row row-cols-6">';
                
                foreach ($photos_vendus as $ligne) {
                  echo '<div class="col">';
                  echo "<img src='images/galerie/".htmlentities($ligne['nomPhoto'])."' id='photo' class='img-responsive float-left h-100 w-100' >" ;
                  echo '</div>';

                } echo '</div>';
              }
            } else {

              $query = "SELECT * from photoforyou.galerie where id_acheteur = ".$_SESSION['idUtilisateur'].";";
              $requete = $db->query($query);
              $result = $requete->fetchAll();
              
              if (!empty($result)) {
                echo '<hr class="my-4">';
                echo '<p class="lead">Photos achetées : </p>';
                echo '<div class="row row-cols-6">';

                $query = "SELECT * from photoforyou.galerie where id_acheteur = ".$_SESSION['idUtilisateur'].";";
                $requete = $db->query($query);
                $result = $requete->fetchAll();
                foreach ($result as $ligne) {
                  echo '<div class="col">';
                  echo "<img src='images/galerie/".htmlentities($ligne['nomPhoto'])."' id='photo' class='img-responsive float-left h-100 w-100' >" ;
                  echo '</div>';
                }
              }  
            }
          ?>
          </div>
          <hr class='my-4'>
            
          <a href="supprUser.php"><button type="button" class="btn btn-lg btn-outline-danger mb-2">! Supprimer votre compte !</button></a>
          <hr class="my-4">
    </div>
  </div>
  <?php
    include ("include/piedpage.inc.php");
  ?>