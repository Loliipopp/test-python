<?php
	session_start();
	require_once("connexion_base.php");
	include_once("verifier-connexion.php"); 

	$donnees['menu'] = "Contact";
	$donnees['titre'] = "Contactez Nous!";
?>


<?php include('entete.php');?>

	<div class='boite-centrale'>
		<h1> Contactez nous! </h1>
		<p>Tristan Campbell : tcampbel@ucsd.edu <br>
		   Mélody Labarchède : labarchedes@live <br>
		   Léa Lafon : lea.lafon@gmx.fr</p>
	</div>
		
<?php include('pied.php');?>
