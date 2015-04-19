<?php 
	session_start();
	require_once("connexion_base.php");
	include_once("verifier-connexion.php");
	include_once("requetes-generales-forum.php"); // Les catégories
	include_once("requetes-soumettre-sujet.php"); // Requetes liées avec les chansons (niveaux, categories, etc)

	$donnees['menu'] = "Forum";
	$donnees['titre'] = "Soumettre une sujet de conversation";
?>

<?php include("entete.php"); ?>


	<div class="jumbotron">
      <div class="container">
      </div>
    </div>
<div>

   <div class="container">
      <div class="row">
		<!-- sidebar -->
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
			<p> Je ne sais pas encore que mettre là </p> 
		</div>


        <!-- main area -->
        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">

		<div class="boite-centrale">
			<form action="soumettre-sujet.php" method="post" id="soumettresujet" >
				<input type="text" class="form-control" name="titre" placeholder="Titre du fil" required/>
				<textarea class="form-control" name="texte" placeholder="Écrivez ici!" required></textarea>
				<?php
					for ($i=0; $i<count($categories); $i++) {
						echo "<div class='radio radio-primary'>
							<input type='radio' id='radio".$categories[$i]['id']."' name='categorie' value='".$categories[$i]['id']."'>
							<label for='radio".$categories[$i]['id']."'>".$categories[$i]['texte']."</label>
						</div>";
					}
				?>
				<button class='btn btn-primary' type="submit" name="submit"> Soumettre le sujet </button>
			</form>
		</div>

	    </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->

</div>
<?php include("pied.php"); ?>
