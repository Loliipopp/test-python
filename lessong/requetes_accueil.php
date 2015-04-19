<?php

	$requeteChanson="SELECT * FROM chanson order by id desc limit 10";  
	$reponseChanson = $pdo->prepare($requeteChanson);
	$reponseChanson->execute();

	$chansonsRecentes = $reponseChanson->fetchAll();

	switch ($_GET['champ']) {
		case 'toutes':
			$requete="SELECT * FROM chanson";  // Retourner le id_personne de l'utilisateur!
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();
			break;
		case 'niveau_chanson':
			$niveau_demande = $_GET['niveau_chanson'];

			$requete="SELECT * FROM chanson WHERE id_niveau=$niveau_demande";
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();	
			break;
		case 'genre_chanson':
			$genre_demande = $_GET['genre_chanson'];

			$requete="SELECT * FROM chanson WHERE id_genre=$genre_demande";
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();
			break; 
		case 'categorie_chanson':
			$categorie_demande = $_GET['categorie_chanson'];

			$requete="SELECT * FROM chanson WHERE id IN (SELECT id_chanson FROM chanson_par_categorie WHERE id_categorie=$categorie_demande)";
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();
			break; 
		default:
			break;
	}
	

?>

