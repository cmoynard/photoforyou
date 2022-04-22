<?php  
  $host="localhost";
  $database="photoforyou";
  $user="gestion_user";
  $password="gestion_user123";
  // connection à la base de données avec test si il y a une erreur
  try
  {
      $db = new PDO("mysql:host=$host;dbname=$database;charset=utf8",$user,$password);
      // Si il y a une erreur lors de la création de l'objet PDO
      // Les lignes suivantes ne sont pas executées 
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch (Exception $e)
  {
      // Cette instruction n'est executée que si le bloc try génère une exception de type Exception. 
      die('Erreur : ' . $e->getMessage());
  }
?> 