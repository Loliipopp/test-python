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
	<div>
		<div class="container">
		      <div class="row">
				<!-- sidebar -->
				<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
					<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
					<?php echo "<img src='images/fille-rotation.jpg' height='200px' width='200px'>"; ?>
					<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
				</div>

		        <!-- main area -->
		        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
		        	<div class='boite'>
					<div class="boite-centrale">
						<form action="soumettre-chanson.php" method="post" id="soumettrechanson" >
							<div class='titre'>
								<h3> Soumettre une Chanson </h3>
							</div>
							<input type="text" class="form-control" name="chanson" placeholder="Titre de Chanson" required/>
							<input type="text" class="form-control" name="artiste" placeholder="Artiste" required />
							<p> Sélectionnez tous les catégories correspondent à cette chanson: </p>
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
							<select id='le-niveau' name='niveau' class='form-control' required>
								<option value="" selected disabled>Selectez un niveau</option>
								<?php
									for ($i=0; $i<count($niveaux); $i++) {
										echo " <option value='".$niveaux[$i]['id']."'>".$niveaux[$i]['texte']."</option>";
									}
									
								?>
								</select>
							</div>
							<div class="genre">
								<select id='le-genre' name='genre' class='form-control' required>
									<option value="" selected disabled>Selectez un genre</option>
									<?php
										for ($i=0; $i<count($genres); $i++) {
											echo "<option value='".$genres[$i]['id']."'>".$genres[$i]['texte']."</option>";
										}
									?>
								</select>
							</div>
							<p> Après avoir trouvé un lien pour cette chanson sur YouTube, appuyez sur "Partager" et puis sur "Intégrer".
								Copiez le lien suivant le texte entre guillemets et collez-le dans la boite ci-dessous: 
							</p>
							<div class="lien" required>
								<input type="text" class="form-control" name="lien" placeholder="Mettre un lien ici!" required/>
							</div>
							<div class='bouton'>
								<button class='btn btn-primary' type="submit" name="submit"> Soumettre la chanson </button>
							</div>
						</form>
					</div>
				</div>
		    </div><!-- /.col-xs-12 main -->
	    </div><!--/.row-->
	  </div><!--/.container-->





	
</div> 
<?php include("pied.php"); ?>