<?php 
	$id_membre = $_SESSION['id_personne'];

	if (!empty($_POST)) {
		$titre = $_POST['titre'];
		$texte = $_POST['texte'];			
		$categorie = $_POST['categorie']; 

		/* Enregistrer le sujet */
		$requete3="INSERT INTO sujet (texte, id_membre, id_categorie, date_soumise) VALUES (?, ?, ?, NOW())";
		$response3=$pdo->prepare($requete3);
		$response3->execute(array($titre, $id_membre, $categorie));

		$id_sujet = $pdo->lastInsertId();

		/* Enregistrer le commentaire */
		$requete5="INSERT INTO commentaire_forum (texte, id_membre, id_sujet, date_soumise) VALUES (?, ?, NOW())";
		$response5=$pdo->prepare($requete5);
		$response5->execute(array($texte, $id_membre, $id_sujet));

		$id_commentaire = $pdo->lastInsertId();

		header('Location: http://localhost:8888/lessong/forum.php');   // Diriger l'utilisateur vers la page du forum
	}  


?>