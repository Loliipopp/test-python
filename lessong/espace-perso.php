<?php 
	session_start(); //toujours au tout début
	require_once("connexion_base.php");
	$donnees['titre_page']="Espace perso" ;
	$donnees['menu']="Perso";


	include "entete.php";

	if ($_SESSION['membre']>=0)
	{
		echo '<hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 col-md-push-5">
          <h2 class="featurette-heading">Votre espace perso. <span class="text-muted"><?php echo $enregistrements["pseudo"] ?> </span></h2>
          <p class="lead">Quelques informations sur vous.</p>
        </div>
        <div class="col-md-5 col-md-pull-7">
          <img class="featurette-image img-responsive center-block" alt="Image perso" src="images/erreur-moche.jpg" data-holder-rendered="true" >
        </div>
      </div>';
	}
	else
	{
		echo "<img src='images/failed.jpg' /><p class='lead'><br>Accès interdit !<br>Veuillez vous <a href='connexion.php'>connecter.</a></p>";
	} 

	include "pied.php"; 
?>