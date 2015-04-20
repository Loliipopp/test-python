<?php
	session_start();
	require_once("connexion_base.php");
	include_once("verifier-connexion.php"); 

	$donnees['menu'] = "A-Propos";
	$donnees['titre'] = "À Propos";
?>


<?php include('entete.php'); ?>

	<div class='boite-centrale'>
		<h1> A propos! </h1>
		<p>Des études scientifiques ont montré que la musique peut aider dans l’acquisition d’une langue
		étrangère. La musique peut aider la personne qui apprend une langue à améliorer sa prononciation, 
		sa grammaire, son vocabulaire, et ses compétences à l’écoute. 
		Nous vous proposons Lessong, un site web qui aide ceux qui apprennent le français en organisant
		les chansons par ses components grammaticaux pour que les personnes puissent approfondir leur
		connaissance du français familier en s’immergeant dans la musique francophone.</p>
	</div>
<?php include('pied.php'); ?>
