<?php 
	session_start();
	require_once("connexion_base.php");
	require_once("verifier-connexion.php");
	require_once("requetes-generales-chanson.php"); // Requetes liées avec les chansons (niveaux, categories, etc)
	require_once("requetes-soumettre-chanson.php"); // Requetes liées specifiquement avec cette page

	$donnees['menu'] = "Soumettre-Chanson";
	$donnees['titre'] = "Soumettre une chanson";
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
					<form action="soumettre-chanson.php" method="post" id="soumettrechanson" >
						<input type="text" class="form-control" name="chanson" placeholder="Titre de Chanson" required/>
						<input type="text" class="form-control" name="artiste" placeholder="Artiste" required />

						<table class='table table-condensed table-bordered tabled-striped'>

					    <?php
						    $r = 0;  // Rangée
						    for ($i=0; $i<count($categories); $i++) {
						    	if ($r == 0) {
						    		echo "<tr>";
						    	}

								echo "<td><div class='checkbox checkbox-primary'>
									<input type='checkbox' name='categories[]' id='checkbox".$categories[$i]['id']." 'value='".$categories[$i]['id']."'>
									<label for=checkbox".$categories[$i]['id']."'>".$categories[$i]['texte']."</label>
								</div></td>";

						    	$r = $r+1;

								if ($r == 5) {
									echo "</tr>";
									$r = 0;
								}
						    }
						 ?>

						</table> 
						<div class="paroles">
							<textarea class="form-control" name="paroles" placeholder="Mettez les paroles ici" required></textarea>
						</div>
						<div class="niveau">
							<table class='table table-condensed table-bordered tabled-striped'>

							<?php
						 	   $r = 0;  // Rangée
								for ($i=0; $i<count($niveaux); $i++) {
									if ($r == 0) {
						    			echo "<tr>";
						    		}
									echo "<td><div class='radio radio-warning'>
										<input type='radio' id='radio-niv".$niveaux[$i]['id']."' name='niveau' value='".$niveaux[$i]['id']."'>
										<label for='radio-niv".$niveaux[$i]['id']."'>".$niveaux[$i]['texte']."</label></td>
									</div>";

									$r = $r+1;

									if ($r == 5) {
										echo "</tr>";
										$r = 0;
									}
								}
							?>
						</table>
						</div>
						<div class="genre">
							<?php
								for ($i=0; $i<count($genres); $i++) {
									echo "<div class='radio radio-primary'>
										<input type='radio' id='radio-gen".$genres[$i]['id']."' name='genre' value='".$genres[$i]['id']."'>
										<label for='radio-gen".$genres[$i]['id']."'>".$genres[$i]['texte']."</label>
									</div>";
								}
							?>
						</div>

						<div class="lien">
							<input type="text" class="form-control" name="lien" placeholder="Mettre un lien ici!" required/>
						</div>
						<button class='btn btn-primary' type="submit" name="submit"> Soumettre la chanson </button>
					</form>
				</div>

		    </div><!-- /.col-xs-12 main -->
	    </div><!--/.row-->
	  </div><!--/.container-->





	
</div> 
<?php include("pied.php"); ?>