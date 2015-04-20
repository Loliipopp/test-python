<?php
	session_start();
	require_once("connexion_base.php");

	$donnees['menu'] = "Index";
	$donnees['titre'] = "Bienvenue à Lessong!";
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link href="telechargements/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/index.css" rel="stylesheet" media="all" type="text/css" media="all" />

		<script src="js/index.js" type="text/javascript"> </script> 

		<title> Bienvenue à Lessong! </title>
	</head>
	<body>
	    <div class="container">
	    	<div class='boite-boite'>
		    	<div class='boite'>
			      <form action="connexion.php" method="post" id="connection" class="form-signin">
					<div class="champs-login">
						<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
						<input class ="form-control" type="text" id="identifiant" name="identifiant" placeholder="Identifiant ou Email"/>
					</div> 
					<div> 
						<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span>
						<input class="form-control" type="password" id="motDePasse" name="motdepasse" placeholder="Mot de passe"/>
					</div class="champs-login">
					<div class="soumettre">
						<button class="btn btn-primary"  onclick="soumettreConnection()" id="validation"> Se connecter </button>
					</div>
					<input type="hidden" name="type" value="connexion">
			      </form>
			      <form action="creercompte.php" class='form-signin' id='inscription-form'>
			    	<input type="submit" id='inscription' class='btn btn-info' value="S'inscrire">
				  </form>	
		 	    </div>
		 	</div>
	    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>