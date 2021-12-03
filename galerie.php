<?php
	include ("include/entete.inc.php");
  if ($_SESSION['login']!=true OR $_SESSION['type']=='visiteur')
  {
    header("Location:login.php");
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
        $req= "SELECT * FROM photoforyou.galerie";
        $ins=$db->prepare($req);
        $ins->execute();
        $num = $ins->fetchAll();

    
        foreach ($num as $value) {
        $query = "SELECT * from photoforyou.galerie where idPhoto = ".$value['idPhoto'].";";
        $requete = $db->query($query);
        $result = $requete->fetch();
        $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);

        echo "
        <div class='col-sm-3 mb-3'>
          <form action='achat.php' method='POST'>
            <div class='card'>
              <input type='number' name='nbCredit' value=".$value['prixCard']." style='display: none;'/> 
              <input type='hidden' name='idAchat' value='".$value['idPhoto']." ?>' />
              <img src=".$galPhoto." class='card-img-top' alt='".$value['idPhoto']."'/>
              <div class='card-body'>
                <h5 class='card-title'>".$value['nomCard']."</h5>
                <p class='card-text'>
                  ".$value['descCard']."
                </p>
                <button type='submit' value='acheter' name='acheter' class='btn btn-success'>Acheter pour ".$value['prixCard']." crédits</button>
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