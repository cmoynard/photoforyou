<?php
  session_start();
  if (!isset($_SESSION['type']))
  {
    $_SESSION['type']="visiteur";
  }
  require_once ('accessbase.php');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
  <html lang="fr">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">


      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
      <title>PhotoForYou</title>
    </head>
    <body>

    <?php
    if (!isset($_SESSION['login'])) {
      echo '
    <header class="p-3 bg-dark text-white">
        <div class="container">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href=""></use></svg>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
              <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
              <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
            </form>
    
            <div class="text-end">
              <a href="login.php"><button type="button" class="btn btn-outline-light me-2">Connexion</button>
              <a href="register.php"><button type="button" class="btn btn-warning">S\'inscrire</button></a>
            </div>
          </div>
        </div>
      </header>'; } 
      
      else {
        echo '
        <header class="p-3 bg-dark text-white">
            <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href=""></use></svg>
        
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                  <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
                  <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                  <li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>
        
                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                  <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>
        
                <div class="text-end">
                  <a href="profil.php"><button type="button" class="btn btn-outline-light me-2">Mon profil</button>
                  <a href="deconnexion.php"><button type="button" class="btn btn-warning">Déconnexion</button></a>
                </div>
              </div>
            </div>
          </header>';
        }
      ?>
