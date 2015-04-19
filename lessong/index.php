<?php
	session_start();
	require_once("connexion_base.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link href="telechargements/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>

		<script src="js/index.js" type="text/javascript"> </script> 

		<title> UnBergerAllemand </title>
	</head>
	<body>
		<header>
		</header>
		<div>
			<div class="boite-centrale">
				<form action="connexion.php" method="post" id="connection">
					<p> Pour vous connecter, veuillez remplir les champs au-dessous! </p> 
					<div class="champs-login">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<input class ="form-control" type="text" id="identifiant" name="identifiant" placeholder="Identifiant ou Email"/>
					</div> 
					<div> 
						<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
						<input class="form-control" type="password" id="motDePasse" name="motdepasse" placeholder="Mot de passe"/>
					</div class="champs-login">
					<div class="soumettre">
						<input class="btn btn-primary"  onclick="soumettreConnection()" id="validation"/>
					</div>
					<input type="hidden" name="type" value="connexion">

					<hr>
					<a href="creercompte.php"> Vous n'avez pas de compte? Vous pouvez vous inscrire en cliquant au-dessous! </a> 
				</form>
			</div>
		</div>
		<footer>
			<a href="http://www.yahoo.fr"> Contactez-nous! </a>
		</footer> 
	</body>
</html>