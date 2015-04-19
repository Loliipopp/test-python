<?php
	$requete="SELECT * FROM categorie_forum";
	$response = $pdo->prepare($requete);
	$response->execute();

	$categories = $response->fetchAll();
?>