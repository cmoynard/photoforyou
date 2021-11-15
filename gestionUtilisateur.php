<?php
include "include/entete.inc.php";

if(!isset($_SESSION['login'])){
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
					</tr>
					<?php
        			    $req = $db->query("SELECT * FROM photoforyou.users WHERE type != 'admin'");
        			    $data = $req->fetchAll();
        			    echo '';
        			    foreach ($data as $li){
        			        echo '<tr>';
        			        echo '<td>'.$li['id'].'</td>';
        			        echo '<td>'.$li['nom'].'</td>';
        			        echo '<td>'.$li['prenom'].'</td>';
        			        echo '<td>'.$li['email'].'</td>';
        			        echo '<td>'.$li['type'].'</td>';
        			        echo '<td>'.$li['credit'].'</td>';
								// * Affichage en fonction l'état, et renvoit vers modif-etat-user.php avec $_GET['id'] && $_GET['etat']
          				
							if($li['etat'] == 'banni'){
								echo '<td><a href="gestion_pdo.php?id='.$li['id'].'&etat='.$li['etat'].'"><button class="h-100 w-100 btn btn-danger">'.$li['etat'].'</td>';
							}
						
							if($li['etat'] == 'valid'){
								echo '<td><a href="gestion_pdo.php?id='.$li['id'].'&etat='.$li['etat'].'"><button class="h-100 w-100 btn btn-success">'.$li['etat'].'</td>';
							}
        			        echo '</tr/>';
        			    }
        			?>
				</table>
			</div>
			<hr class="my-4"><br><br><br><br><br><br><br>
		</div>
		</div>
		<?php include "include/piedpage.inc.php"; ?>