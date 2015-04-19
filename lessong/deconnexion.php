<?php
	session_start();
	require_once("connexion_base.php");
	session_destroy();

	header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page d'accueil
?>