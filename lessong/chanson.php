<?php 
	session_start();
	require_once("connexion_base.php");
	require_once("verifier-connexion.php");
	require_once("requetes-chanson.php");

	$donnees['menu'] = "Chanson";
	$donnees['titre'] = "$titre de $interprete";

?>


<?php include("entete.php"); ?>

<div class="row">
    
    <div class="col-sm-3">
	<?php
		echo "<iframe id='iframe' width='280' height='158' alt='Rechercher sur Youtube!' src='".$lien."' frameborder='0' allowfullscreen></iframe>";
	?>
		<div>
			<p> Écoutez ces autres chansons à ce niveau:</p>
			<table class='table table-condensed table-hover table-striped table-bordered'>

				<?php
				for ($i=0; $i<count($chansonsMemeNiveau); $i++) {
					
					if (strlen($chansonsMemeNiveau[$i]['titre']) > 14) {
						$tit = substr($chansonsMemeNiveau[$i]['titre'], 0, 14);
						$tit = $tit."...";
					}
					else {
						$tit = $chansonsMemeNiveau[$i]['titre'];
					}

					if (strlen($chansonsMemeNiveau[$i]['interprete']) > 14) {
						$int = substr($chansonsMemeNiveau[$i]['interprete'], 0, 14);
						$int = $int."...";
					}
					else {
						$int = $chansonsMemeNiveau[$i]['interprete'];
					}
					echo "<form action='chanson.php' method='get' id='form'><input type='hidden' name='id_chanson' value='".$chansonsMemeNiveau[$i]['id']."'/>
						<tr>
						<td class='icon'><button type='submit'><span class='glyphicon glyphicon-headphones' aria-hidden='true'></span></button></td>
						</td>
						<td> <p>".$tit." <strong> de </strong> ".$int." </p></td>
						</tr>
						</form>";

				}
				?>
			</table>
		</div>
		<div>
			<p> Aimez-vous ce genre? Écoutez ces autres chansons:</p>
			<table class='table table-condensed table-hover table-striped table-bordered'>
				<?php

				for ($i=0; $i<count($chansonsMemeGenre); $i++) {

					if (strlen($chansonsMemeGenre[$i]['titre']) > 14) {
						$tit1 = substr($chansonsMemeGenre[$i]['titre'], 0, 14);
						$tit1 = $tit1."...";
					}
					else {
						$tit1 = $chansonsMemeGenre[$i]['titre'];
					}

					if (strlen($chansonsMemeGenre[$i]['interprete']) > 14) {
						$int1 = substr($chansonsMemeGenre[$i]['interprete'], 0, 14);
						$int1 = $int1."...";
					}
					else {
						$int1 = $chansonsMemeGenre[$i]['interprete'];
					}

					echo "<form action='chanson.php' method='get' id='form'><input type='hidden' name='id_chanson' value='".$chansonsMemeGenre[$i]['id']."'/>
						<tr>
						<td class='icon'><button type='submit'><span class='glyphicon glyphicon-headphones' aria-hidden='true'></span></button></td>
						<td> <p>".$tit1." <strong> de </strong>".$int1." </p></td>
						</tr>
						</form>";
				}
				?>
			</table>

		</div>
		<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
    </div><!-- sidebar -->
    <div class="col-sm-8">

	<div class='boite-centrale'>
		 <div class='page-soumettre'>
			<a href='soumettre-chanson.php'><button class='btn btn-info'> Soumettre une Chanson </button></a>
		</div>
	    	<div>
			<?php
				echo "<p> <strong>\"".$titre."\"</strong> de ".$interprete."</p>";
				echo "<form method='get' action='accueil.php'>
				      <label for='gen'> Genre: </label><input id='gen' type='hidden' name='champ' value='genre_chanson'>
				      <button class='btn btn-primary btn-xs' type='submit' name='genre_chanson' value='".$genreChanson[0]['id']."'>".$genreChanson[0]['texte']."</button>
					  </form>";
				echo "<form method='get' action='accueil.php'><label for='cat'>Catégories: </label>";
					for ($i=0; $i<count($categories); $i++) {
					echo "<input id='cat' type='hidden' name='champ' value='categorie_chanson'><button class='btn btn-primary btn-xs' type='submit' name='categorie_chanson' value='".$categories[$i]['id']."'>".$categories[$i]['texte']."</button>";
					}
				echo "</form>";
				?> 
			</div>
			<div class="boite-paroles">
				<div class='paroles'>
					<?php echo "<p>".$paroles."</p>"; ?>
				</div>
			</div>
		</div>  <!-- Boite Centrale --> 
		<div class='boite-commentaires'>
			<div class='titre'>
				<h3> Commentaires </h3>
			</div>
			<div>
				<?php 
					for ($i=0; $i<count($commentaires); $i++) {
					echo "<div class='commentaire'> 
							<p> <strong>".$pseudo[$i]['pseudo']."</strong> à écrit le ".date_format(date_create($commentaires[$i]['date_soumise']), 'g:ia \o\n l jS F Y')."</p>
							<p>".$commentaires[$i]['texte']."</p>
						</div>";  
					} 
				?>
			</div>
			<div>
				<form action='chanson.php' method='post'>
					<textarea name='commentaire' class='form-control'> </textarea>
					<div class='bouton'>
						<button type='submit' class='btn btn-primary' name='submit' value='commentaire_soumis'> Soumettre le Commentaire</button>
					</div>
					<?php echo"<input type='hidden' name='id_chanson' value='".$id_chanson."'>"; ?>
					<?php echo"<input type='hidden' name='id_membre' value='".$id_membre."'>"; ?>
				</form>
			</div>
		</div>
    </div>
</div>



<?php include("pied.php"); ?>
