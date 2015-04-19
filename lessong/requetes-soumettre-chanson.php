<?php 
	$id_membre = $_SESSION['id_personne'];

	if (!empty($_POST)) {
		$chanson = $_POST['chanson'];
		$artiste = $_POST['artiste'];			
		$paroles = $_POST['paroles'];
		$niveau = $_POST['niveau'];
		$genre = $_POST['genre'];
		$lien = $_POST['lien'];
		$categories = $_POST['categories'];

		$paroles = nl2br($paroles);

		$requete3="INSERT INTO chanson (titre, interprete, paroles, id_niveau, id_genre, lien, id_membre, date_soumise) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";
		$response3=$pdo->prepare($requete3);
		$response3->execute(array($chanson, $artiste, $paroles, $niveau, $genre, $lien, $id_membre));

		$id_chanson = $pdo->lastInsertId();

		foreach ($categories as $id_cat) {
			$requete4="INSERT INTO chanson_par_categorie (id_categorie, id_chanson) VALUES (?, ?)";
			$reponse4 =$pdo->prepare($requete4);
			$reponse4->execute(array($id_cat, $id_chanson));
		}

		header('Location: http://localhost:8888/lessong/accueil.php');   // Diriger l'utilisateur vers la page d'accueil

	}
?>