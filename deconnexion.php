<?php
include ("include/entete.inc.php");
session_destroy(); //on détruit la session
header('Location: index.php');
// Libération de la mémoire
$result->close(); 
$conn->close(); //fermeture de la connexion
?>