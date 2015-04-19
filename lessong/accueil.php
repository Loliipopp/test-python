<?php 
	session_start();
	require_once("connexion_base.php");
	include_once("verifier-connexion.php");
	include_once("requetes-generales-chanson.php"); // Requetes liées avec les chansons (niveaux, categories, etc)
	include_once("requetes_accueil.php"); // Requetes spécifiques à cette page

	$donnees['menu'] = "Accueil";
	$donnees['titre'] = "Rechercher des chansons!";
  
?>


<?php include("entete.php"); ?>

	<div class="jumbotron">
      <div class="container">
      </div>
    </div>

	<div class="container">
      <div class="row">
		<!-- sidebar -->
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
		  <div data-spy="affix" data-offset-top="45" data-offset-bottom="90">
		    <div class="well"> <!-- encadrement -->
			  <ul class="nav" id="sidebar-nav">
				<li><strong>Afficher des chansons françaises par</strong></li>
				<li><form action="accueil.php" method="get">
					<button class='btn btn-info' type='submit' name='champ' value='niveau'> Niveau </button>
				</form></li>
				<li><form action="accueil.php" method="get">
					<button class='btn btn-info' type='submit' name='champ' value='categories'> Catégories </button>
				</form></li>
				<li><form action="accueil.php" method="get">
					<button class='btn btn-info' type='submit' name='champ' value='style'> Style de Musique </button>
				</form></li>
				<li><form action="accueil.php" method="get">
					<button class='btn btn-info' type='submit' name='champ' value='toutes'> Toutes </button>
				</form></li>
		      </ul>
			</div>
			<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>

		   </div>
		</div>


        <!-- main area -->
        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">

			

<div class="boite-centrale">
	<div class='page-soumettre'>
		<a href='soumettre-chanson.php'><button class='btn btn-info'> Soumettre une Chanson </button></a>
	</div>

	<?php 
		if ($_GET['champ'] == 'niveau' || $_GET['champ'] == 'niveau_chanson') {
			echo "<form method='get' action='accueil.php'>";
				for ($i=0; $i<count($niveaux); $i++) {
					echo "<input type='hidden' name='champ' value='niveau_chanson'><button class='btn btn-primary' type='submit' name='niveau_chanson' value='".$niveaux[$i]['id']."'>".$niveaux[$i]['texte']."</button>";
				}
			echo "</form>";
		}
		else if ($_GET['champ'] == 'categories' || $_GET['champ'] == 'categorie_chanson') {
			echo "<form method='get' action='accueil.php'>";
				for ($i=0; $i<count($categories); $i++) {
					echo "<input type='hidden' name='champ' value='categorie_chanson'><button class='btn btn-primary' type='submit' name='categorie_chanson' value='".$categories[$i]['id']."'>".$categories[$i]['texte']."</button>";
				}
			echo "</form>";
		}
		else if ($_GET['champ'] == 'style' || $_GET['champ'] == 'genre_chanson') {
			echo "<form method='get' action='accueil.php'>";
				for ($i=0; $i<count($genres); $i++) {
					echo "<input type='hidden' name='champ' value='genre_chanson'><button class='btn btn-primary' type='submit' name='genre_chanson' value='".$genres[$i]['id']."'>".$genres[$i]['texte']."</button>";
				}
			echo "</form>";
		}		
		if (count($chansons)) {
		echo "<div class='resultats'> 
				<table class=' table table-condensed table-bordered table-hover table-striped sortable'>
					<tr>
						<th></th>
						<th> Chanson </th>
						<th> Interpète </th>
						<th> Niveau </th>
						<th> Genre </th> 
					</tr>";
			for ($i=0; $i<count($chansons); $i++) {
				echo "<tr>
						<td> <form action='chanson.php' method='get'>
							<input type='hidden' name='id_chanson' value='".$chansons[$i]['id']."'/>
							<button type='submit'><span class='glyphicon glyphicon-headphones' aria-hidden='true'></span></button>
						</form>
						</td>  
						<td>".$chansons[$i]['titre']."</td>
						<td>".$chansons[$i]['interprete']."</td>
						<td>".$chansons[$i]['id_niveau']."</td>
						<td>".$chansons[$i]['id_genre']."</td> 

				  </tr> ";
			}		
		echo "</table>
			</div> ";
		}
		else {

			echo "<h5> Veuillez essayer à nouveau! </h5>";
		}
	?>

	<!-- Afficher les dernières chasons publiées -->
	<div class="favoris">
			<h4> Dernières ajoutées </h4> 
		<table class="table-condensed table-bordered table-hover table-striped table sortable">
			<tr>
				<th> </th>
				<th> Chanson </th>
				<th> Interpète </th>
				<th> Niveau </th>
				<th> Genre </th>
			</tr>
			<?php
				for ($i = count($chansonsRecentes)-1; $i >= 0; $i--) {
					echo "<tr>
							<td> <form action='chanson.php' method='get'>
									<input type='hidden' name='id_chanson' value='".$chansonsRecentes[$i]['id']."'/>
									<button type='submit'><span class='glyphicon glyphicon-headphones' aria-hidden='true'></span></button>
								</form>
							</td> 
							<td>".$chansonsRecentes[$i]['titre']."</td>
							<td>".$chansonsRecentes[$i]['interprete']."</td>
							<td>".$chansonsRecentes[$i]['id_niveau']."</td>
							<td>".$chansonsRecentes[$i]['id_genre']."</td> 
						  </tr>";
				}
			?>
		</table>
	</div>

	        </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->
</div>
<?php include("pied.php"); ?>