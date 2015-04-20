<?php
	if (!empty($_POST) or !empty($_GET)) {
		if (!empty($_POST)) {
			$id_membre = $_SESSION['id_personne'];
			$texte = $_POST['texte'];
			$sujet=$_POST['sujet'];

			$texte = nl2br($texte);

			/* Enregistrer le commentaire */
			$requete5="INSERT INTO commentaire_forum (texte, id_membre, id_sujet, date_soumise) VALUES (?, ?, ?, NOW())";
			$response5=$pdo->prepare($requete5);
			$response5->execute(array($texte, $id_membre, $sujet));

			$id_commentaire = $pdo->lastInsertId();
		}
		else if (!empty($_GET)) {
			$sujet = $_GET['id_sujet'];
	 	}

		$requete="SELECT * FROM membre JOIN commentaire_forum 
				  WHERE membre.id=commentaire_forum.id_membre AND commentaire_forum.id_sujet=$sujet";
		$response = $pdo->prepare($requete);
		$response->execute();

		$commentaires = $response->fetchAll();

		$requete2="SELECT * FROM sujet WHERE id=$sujet";
		$reponse2 = $pdo->prepare($requete2);
		$reponse2->execute();

		$sujet_titre = $reponse2->fetchAll();

		
	} 
	else {
		header('Location: http://localhost:8888/lessong/forum.php');   // Diriger l'utilisateur vers la page de connexion
	}
?>
