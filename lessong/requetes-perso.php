<?php 
	$id_membre = $_SESSION['id_personne'];
	
	$requete="SELECT * FROM chanson WHERE id_membre = $id_membre";
	$response = $pdo->prepare($requete);
	$response->execute();

	$chansonsSoumises = $response->fetchAll();


	$requete="SELECT * FROM sujet WHERE id_membre = $id_membre"; 
	$response = $pdo->prepare($requete);
	$response->execute();

	$sujetsSoumis = $response->fetchAll();


	$requete="SELECT * FROM sujet WHERE id IN (SELECT id_sujet FROM commentaire_forum WHERE id_membre = $id_membre)";
	$response = $pdo->prepare($requete);
	$response->execute();

	$sujetsCommentes = $response->fetchAll();



	$requete="SELECT * FROM chanson WHERE id IN (SELECT id_chanson FROM commentaire_chanson WHERE id_membre = $id_membre)";
	$response = $pdo->prepare($requete);
	$response->execute();

	$chansonsCommentees = $response->fetchAll();
?> 