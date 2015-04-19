<?php
	/**
     * Attraper tous les niveaux
     */
	$requete="SELECT * FROM niveau_chanson";  // Retourner le id_personne de l'utilisateur!
	$response = $pdo->prepare($requete);
	$response->execute();

	$niveaux = $response->fetchAll();


    /**
     * Attraper toutes les catégories
     */
	$requeteCategorie="SELECT * FROM categorie_chanson"; 
	$responseCategorie = $pdo->prepare($requeteCategorie);
	$responseCategorie->execute();

	$categories = $responseCategorie->fetchAll();

    /**
     * Attraper tous les genres
     */
	$requeteStyle="SELECT * FROM genre_chanson"; 
	$responseStyle = $pdo->prepare($requeteStyle);
	$responseStyle->execute();

	$genres = $responseStyle->fetchAll();
?>