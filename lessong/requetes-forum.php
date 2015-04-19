<?php
		if (isset($_GET['categorie'])) {
			$categorie = $_GET['categorie'];

			$requete3="SELECT * FROM sujet WHERE id_categorie='$categorie'"; 
			$response3 = $pdo->prepare($requete3);
			$response3->execute();

			$sujets = $response3->fetchAll();			
		}
?>