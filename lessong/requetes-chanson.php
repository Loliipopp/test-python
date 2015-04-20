<?php
	switch ($_POST['submit']) {
		case 'commentaire_soumis':
			$nouveau_commentaire = $_POST['commentaire'];
			$id_membre = $_SESSION['id_personne'];
			$id_chanson = $_POST['id_chanson'];

			$nouveau_commentaire = nl2br($nouveau_commentaire);

			$requete3="INSERT INTO commentaire_chanson (texte, id_membre, id_chanson, date_soumise) VALUES (?, ?, ?, NOW())";
			$response3=$pdo->prepare($requete3);
			$response3->execute(array($nouveau_commentaire, $id_membre, $id_chanson));			
			break;
	}

	if (isset($_GET['id_chanson'])) {
		$id_chanson = $_GET['id_chanson'];
	}

	$requeteChanson="SELECT * FROM chanson WHERE id = $id_chanson";  
	$responseChanson = $pdo->prepare($requeteChanson);
	$responseChanson->execute();

	$chanson = $responseChanson->fetchAll();
	$titre = $chanson[0]['titre'];
	$id_niveau = $chanson[0]['id_niveau'];
	$id_genre = $chanson[0]['id_genre'];
	$interprete = $chanson[0]['interprete'];
	$paroles = $chanson[0]['paroles'];
	$lien = $chanson[0]['lien'];




	/**
	 * Trouver les commentaires liés avec cette chanson
	 **/
	$requete="SELECT * FROM commentaire_chanson WHERE id_chanson = $id_chanson";  // Retourner les commentaires pour une chanson
	$response = $pdo->prepare($requete);
	$response->execute();
	$commentaires = $response->fetchAll();

	/**
	 * Trouver les pseudos liés avec les commentaires
	 **/
	$requete2="SELECT pseudo FROM membre INNER JOIN commentaire_chanson  WHERE membre.id = commentaire_chanson.id_membre AND commentaire_chanson.id_chanson = $id_chanson";
	$response2 = $pdo->prepare($requete2);
	$response2->execute();
	$pseudo = $response2->fetchAll();



	$requete3="SELECT texte FROM categorie_chanson WHERE id IN (SELECT id_categorie FROM chanson_par_categorie WHERE id_chanson=$id_chanson)";
	$response3 = $pdo->prepare($requete3);
	$response3->execute();
	$categories = $response3->fetchAll();

	$requete3="SELECT * FROM genre_chanson WHERE id=$id_genre";
	$response3 = $pdo->prepare($requete3);
	$response3->execute();
	$genreChanson = $response3->fetchAll();

	/**
	 * Des autres chansons au même niveau
	 **/

	$requete7="SELECT * FROM chanson WHERE id_niveau = $id_niveau ORDER BY RAND() LIMIT 5";
	$response7 = $pdo->prepare($requete7);
	$response7->execute();
	$chansonsMemeNiveau = $response7->fetchAll();

	$requete8="SELECT * FROM chanson WHERE id_genre = $id_genre ORDER BY RAND() LIMIT 5";
	$response8 = $pdo->prepare($requete8);
	$response8->execute();
	$chansonsMemeGenre = $response8->fetchAll();

	?>