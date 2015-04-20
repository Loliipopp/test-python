<?php 
	session_start();
	require_once("connexion_base.php");
	include_once("verifier-connexion.php");
	include_once("requetes-generales-forum.php"); // Les catégories
	include_once("requetes-soumettre-sujet.php"); // Requetes liées avec les chansons (niveaux, categories, etc)

	$donnees['menu'] = "Soumettre-Sujet";
	$donnees['titre'] = "Soumettre un sujet!";
?>

<?php include("entete.php"); ?>

   <div class="container">
      <div class="row">
		<!-- sidebar -->
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
			<?php echo "<img src='images/fille-rotation.jpg' height='200px' width='200px'>"; ?>
			<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
			<?php echo "<img src='images/fille-rotation.jpg' height='200px' width='200px'>"; ?>
		</div>


        <!-- main area -->
        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
		    <div class ='boite'>
				<div class="boite-centrale">
					<h3> Soumettre un sujet </h3>
					<form action="soumettre-sujet.php" method="post" id="soumettresujet" >
						<input type="text" class="form-control" name="titre" placeholder="Titre du fil" required/>
						<textarea class="form-control" name="texte" placeholder="Écrivez ici!" required></textarea>
						<select class='form-control' name='categorie' required>
							<option value='' selected disabled>Selectez un genre</option>
							<?php
								for ($i=0; $i<count($categories); $i++) {
									echo "<option value='".$categories[$i]['id']."'>".$categories[$i]['texte']."</option>";
								}
							?>
						</select>
						<div class='bouton'>
							<button class='btn btn-primary' type="submit" name="submit"> Soumettre le sujet </button>
						</div>
					</form>
				</div>
			</div>

	    </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->

</div>
<?php include("pied.php"); ?>
