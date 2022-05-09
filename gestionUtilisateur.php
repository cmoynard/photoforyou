<?php
include "include/entete_gestuser.inc.php";

if(!isset($_SESSION['login'])){ //double vérification, redirection si on est pas admin ou si pas de session
    header('location:index.php');
    exit();
}
if($_SESSION['type'] != 'admin'){ 
	header('location:index.php');
	exit();
}
?>
		<div class="container">
		<div class="jumbotron">
		<h1 class="text-center mt-4">Gestion Utilisateur</h1>
		<hr class="my-4">
        <div class="row justify-content-center mt-4">
				<table class="table table-bordered table-striped table-responsive-md">
					<tr>
						<td>Id</td>
						<td>Nom</td>
						<td>Prenom</td>
						<td>Mail</td>
						<td>Grade</td>
						<td>Credits</td>
						<td>Etat</td>
						<td>Supprimer</td>
					</tr>
					<?php
        			    $req = $db->query("SELECT * FROM photoforyou.users WHERE type != 'admin'"); // tableau qui affiche tout les utilisateur du site (saufs admins)
        			    $data = $req->fetchAll();
        			    echo '';
        			    foreach ($data as $li){ //on affiche les données de chaque utilisateur
        			        echo '<tr>';
        			        echo '<td>'.$li['id'].'</td>';
        			        echo '<td>'.$li['nom'].'</td>';
        			        echo '<td>'.$li['prenom'].'</td>';
        			        echo '<td>'.$li['email'].'</td>';
        			        echo '<td>'.$li['type'].'</td>';
        			        echo '<td>'.$li['credit'].'</td>';
          				
							if($li['etat'] == 'banni'){ //si l'utilisateur est banni
								echo '<td><a href="gestion_pdo.php?id='.$li['id'].'&etat='.$li['etat'].'"><button class="h-100 w-100 btn btn-danger">'.$li['etat'].'</td>';
								echo '<td><a href="gestion_pdo.php?id='.$li['id'].'&etat=suppr" class="h-100 w-100 btn btn-outline-danger">Supprimer</a></td>';
							}
						
							if($li['etat'] == 'valid'){ //si l'utilisateur est validé
								echo '<td><a href="gestion_pdo.php?id='.$li['id'].'&etat='.$li['etat'].'"><button class="h-100 w-100 btn btn-success">'.$li['etat'].'</td>';
								echo '<td><a class="h-100 w-100 btn btn-outline-secondary disabled">Supprimer</a></td>';
							} //bouton qui affiche l'état de l'utilisateur et qui le change quand cliqué (gestion_pdo.php)
        			        echo '</tr/>';
        			    }
        			?>
				</table>
			</div>
			<hr class="my-4"><br><br><br><br><br><br><br>
		</div>
		</div>

    
		<?php include "include/piedpage.inc.php"; ?>