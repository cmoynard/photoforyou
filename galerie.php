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
    <form action="achat.php" method="POST">
      <div class="card">
        <?php 
          $idPhoto = 1;
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          ?> 
          <input type="number" name="nbCredit" value=45 style="display: none;"/> 
          <input type="hidden" name="idAchat" value="<?php echo $idPhoto; ?>" />
          <?php echo "<img src=$galPhoto class='card-img-top' alt='...'/>";
          $idPhoto++;?>

        <div class="card-body">
          <h5 class="card-title">Jolie fleure</h5>
          <p class="card-text">
            Une belle fleure prise en photo par le talentueux
            Sungondese-Jr.
          </p>
          <button type="submit" value="acheter" name="acheter" class="btn btn-success">Acheter pour 45 crédits</button>
        </div>
      </div>
    </form>
    </div>
    <div class="col-sm-3">
    <form action="achat.php" method="POST">
      <div class="card">
      <?php
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          ?> 
          <input type="number" name="nbCredit" value=45 style="display: none;"/> 
          <input type="hidden" name="idAchat" value="<?php echo $idPhoto; ?>" />
          <?php echo "<img src=$galPhoto class='card-img-top' alt='...'/>";
          $idPhoto++;?>

        <div class="card-body">
          <h5 class="card-title">Paysage stylé</h5>
          <p class="card-text">
            Un paysage féérique qui donne envie de voyager.
          </p>
          <button type="submit" value="acheter" name="acheter" class="btn btn-success">Acheter pour 45 crédits</button>
        </div>
      </div>
    </form>
    </div>
    <div class="col-sm-3">
    <form action="achat.php" method="POST">
      <div class="card">
      <?php
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          ?> 
          <input type="number" name="nbCredit" value=45 style="display: none;"/> 
          <input type="hidden" name="idAchat" value="<?php echo $idPhoto; ?>" />
          <?php echo "<img src=$galPhoto class='card-img-top' alt='...'/>";
          $idPhoto++;?>
          
        <div class="card-body">
          <h5 class="card-title">Roches</h5>
          <p class="card-text">
            Des rochers qui font plaisir #moumou.
          </p>
          <button type="submit" value="acheter" name="acheter" class="btn btn-success">Acheter pour 45 crédits</button>
        </div>
      </div>
    </form>
    </div>
    <div class="col-sm-3">
    <form action="achat.php" method="POST">
      <div class="card">
      <?php
          $query = "SELECT * from photoforyou.galerie where idPhoto = $idPhoto;";
          $requete = $db->query($query);
          $result = $requete->fetch();
          $galPhoto = "images/galerie/".htmlentities($result['nomPhoto']);
          ?> 
          <input type="number" name="nbCredit" value=45 style="display: none;"/> 
          <input type="hidden" name="idAchat" value="<?php echo $idPhoto; ?>" />
          <?php echo "<img src=$galPhoto class='card-img-top' alt='...'/>";
          $idPhoto++;?>
          
        <div class="card-body">
          <h5 class="card-title">Fortnite</h5>
          <p class="card-text">
            Un lieu emblématique du jeu populaire Fortnite Battle royale.
          </p>
          <button type="submit" value="acheter" name="acheter" class="btn btn-success">Acheter pour 45 crédits</button>
        </div>
      </div>
    </form>
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