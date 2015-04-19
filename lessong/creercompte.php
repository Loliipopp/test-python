<?php 
	session_start();
	require_once("connexion_base.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
		<script src="js/index.js" type="text/javascript"> </script> 
		<title> UnBergerAllemand </title>
	</head>
	<body>
		<header>
			<h1> BergerAllemand </h1>
		</header>
		<div>
			<div class="boite-centrale">
				<h3> Créer votre compte! </h3>
				<hl> 
				<form action="connexion.php" method="post" id="inscription">
					<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
					<input type="text" class="form-control" id="email" name="email" placeholder="Addresse Email">
					<input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de Passe">
					<input type="password" class="form-control" id="confirmer" name="cfmmotdepasse" placeholder="Confirmer le Mot de Passe">
					<input type="hidden" name="type" value="inscription">
					<div class="soumettre">
						<input class="btn btn-primary"  onclick="soumettreInscription()" id="validation"/>
					</div>
				</form>
			</div>


		</div>
		<footer>
			<a href="http://www.yahoo.fr"> Contactez-nous! </a>
		</footer> 
	</body>
</html>