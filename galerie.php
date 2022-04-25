<?php
	include ("include/entete.inc.php");
  if ($_SESSION['login']!=true OR $_SESSION['type']=='visiteur')
  {
    header("Location:login.php"); //Redirection si l'utilisateur n'est pas connecté
  }

  ?>
	<div class="container"> 
    <div class="jumbotron">
      <h1 class="display-4">Parcourir la galerie</h1>
      <?php echo '<p class="lead">Connecté en tant que '.$_SESSION['nomUtilisateur'].' '.$_SESSION['prenomUtilisateur'].'</p>'?>
      <?php echo "<p class='lead'>Vos crédit(s) : ".$_SESSION['credit']."</p>" ?>
      <hr class="my-4">
    </div>
  </div>
  
  <div class="container">
  <div class="row row-cols-1 row-cols-md-3">
  <?php
        $query = "SELECT * from photoforyou.galerie where id_acheteur IS NULL;";
        $requete = $db->query($query);
        $result = $requete->fetchAll();
        foreach ($result as $ligne) { //affichage des photos non achetées
          $galPhoto = "images/galerie/".htmlentities($ligne['nomPhoto']); //pour chaque élement dans le tableau, on récupre chaque info et on recupère la photo dans le dossier d'image
            
          echo //on génère la card de la photo, avec toute les infos de cette dernière dans la bdd
            "<div class='col-sm-3 mb-3'>
              <form action='achat.php' method='POST'>
                <div class='card'>
                  <input type='number' name='nbCredit' value=".$ligne['prixCard']." style='display: none;'/> 
                  <input type='hidden' name='idAchat' value='".$ligne['idPhoto']." ?>' />
                  <img src=".$galPhoto." class='card-img-top' alt='".$ligne['idPhoto']."'/>
                  <div class='card-body'>
                    <h5 class='card-title'>".$ligne['nomCard']."</h5>
                    <p class='card-text'>
                      ".$ligne['descCard']."
                    </p>
                    <button type='submit' value='acheter' name='acheter' class='btn btn-success'>Acheter pour ".$ligne['prixCard']." crédits</button>
                  </div>
                </div>
              </form>
            </div>";

        } ?>

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