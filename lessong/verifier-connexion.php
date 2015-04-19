<?php
	if (empty($_SESSION['id_personne'])) {
		header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
	}
?>