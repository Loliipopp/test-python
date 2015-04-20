<?php
		if (isset($_GET['categorie'])) {
			$categorie = $_GET['categorie'];

			$requete3=" SELECT sujet.id AS sujID, sujet.texte AS sujTexte, categorie_forum.texte AS catTexte, membre.pseudo AS pseudo 
			  FROM sujet JOIN categorie_forum JOIN membre 
			  WHERE sujet.id_categorie=categorie_forum.id AND sujet.id_membre=membre.id AND sujet.id_categorie='$categorie' order by sujet.id desc"; 
			$response3 = $pdo->prepare($requete3);
			$response3->execute();

			$sujets = $response3->fetchAll();			
		}


	$requete="SELECT sujet.id AS sujID, sujet.texte AS sujTexte, categorie_forum.texte AS catTexte, membre.pseudo AS pseudo 
			  FROM sujet JOIN categorie_forum JOIN membre 
			  WHERE sujet.id_categorie=categorie_forum.id AND sujet.id_membre=membre.id order by sujet.id desc limit 10";  
	$reponse = $pdo->prepare($requete);
	$reponse->execute();

	$sujetsRecents = $reponse->fetchAll();
?>