<?php

	$requeteChanson="SELECT chanson.id, chanson.titre, chanson.interprete, niveau_chanson.texte AS nivTexte, genre_chanson.texte AS genTexte
					 FROM chanson JOIN niveau_chanson JOIN genre_chanson 
					 WHERE chanson.id_niveau=niveau_chanson.id AND chanson.id_genre=genre_chanson.id order by chanson.id desc limit 10";  
	$reponseChanson = $pdo->prepare($requeteChanson);
	$reponseChanson->execute();

	$chansonsRecentes = $reponseChanson->fetchAll();


	switch ($_GET['champ']) {
		case 'toutes':
			$requete="SELECT chanson.id, chanson.titre, chanson.interprete, niveau_chanson.texte AS nivTexte, genre_chanson.texte AS genTexte
					 FROM chanson JOIN niveau_chanson JOIN genre_chanson 
					 WHERE chanson.id_niveau=niveau_chanson.id AND chanson.id_genre=genre_chanson.id order by chanson.id asc";  // Retourner le id_personne de l'utilisateur!
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();
			break;
		case 'niveau_chanson':
			$niveau_demande = $_GET['niveau_chanson'];

			$requete="SELECT chanson.id, chanson.titre, chanson.interprete, niveau_chanson.texte AS nivTexte, genre_chanson.texte AS genTexte
					 FROM chanson JOIN niveau_chanson JOIN genre_chanson 
					 WHERE chanson.id_niveau=niveau_chanson.id AND chanson.id_genre=genre_chanson.id 
					 AND chanson.id_niveau=$niveau_demande order by chanson.id";
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();	
			break;
		case 'genre_chanson':
			$genre_demande = $_GET['genre_chanson'];

			$requete="SELECT chanson.id, chanson.titre, chanson.interprete, niveau_chanson.texte AS nivTexte, genre_chanson.texte AS genTexte
					 FROM chanson JOIN niveau_chanson JOIN genre_chanson 
					 WHERE chanson.id_niveau=niveau_chanson.id AND chanson.id_genre=genre_chanson.id 
					 AND chanson.id_genre=$genre_demande order by chanson.id";
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();
			break; 
		case 'categorie_chanson':
			$categorie_demande = $_GET['categorie_chanson'];

			$requete="SELECT chanson.id, chanson.titre, chanson.interprete, niveau_chanson.texte AS nivTexte, genre_chanson.texte AS genTexte
					 FROM chanson JOIN niveau_chanson JOIN genre_chanson 
					 WHERE chanson.id_niveau=niveau_chanson.id AND chanson.id_genre=genre_chanson.id 
					 AND chanson.id IN (SELECT id_chanson FROM chanson_par_categorie WHERE id_categorie=$categorie_demande) order by chanson.id";
			$reponse = $pdo->prepare($requete);
			$reponse->execute();

			$chansons = $reponse->fetchAll();
			break; 
		default:
			break;
	}
	

?>

