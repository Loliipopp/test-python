<?php 
	session_start();
	require_once("connexion_base.php");
?>

<!DOCTYPE HTML>
<html>
	<head>
		<link href="telechargements/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/inscription.css" rel="stylesheet" media="all" type="text/css" media="all" />
		<script src="js/index.js" type="text/javascript"> </script> 
		<title> Lessong -- Créer un compte </title>
	</head>


	<body>
	    <div class="container">
	    	<div class='boite-boite'>
		    	<div class='boite'>
				<form action="connexion.php" method="post" id="inscription" class='form-signin'>
					<h3><strong> Inscription </strong></h3>
					<input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
					<input type="text" class="form-control" id="email" name="email" placeholder="Addresse Email">
					<input type="password" class="form-control" id="motdepasse" name="motdepasse" placeholder="Mot de Passe">
					<input type="password" class="form-control" id="confirmer" name="cfmmotdepasse" placeholder="Confirmer le Mot de Passe">
					<input type="hidden" name="type" value="inscription">
					<div class="soumettre">
						<button class="btn btn-primary"  onclick="soumettreInscription()" id="validation"> Envoyer </button>
					</div>
				  </form>	
		 	    </div>
		 	</div>
	    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>