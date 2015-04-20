<?php 
	session_start();
	require_once("connexion_base.php");
	require_once("verifier-connexion.php");
	require_once("requetes-generales-forum.php");
	require_once("requetes-forum.php");

	$donnees['menu'] = "Forum";
	$donnees['titre'] = "Discuter avec ...";
?>

<?php include("entete.php"); ?>
	<div class="container">
      <div class="row">
		<!-- sidebar -->
		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
		  <div data-spy="affix" data-offset-top="45" data-offset-bottom="90">
		    <div class="well"> <!-- encadrement -->
			  <ul class="nav" id="sidebar-nav">
				<form action="forum.php" method="get">
			  		<ul class="nav" id="sidebar-nav">
					<li><strong>Afficher des sujets sur </strong></li>
					<?php
					
						for ($i=0; $i < count($categories); $i++) {
							echo "<li><button class='btn btn-primary btn-special' type='submit' name='categorie' value='".$categories[$i]['id']."'>".$categories[$i]['texte']."</button></li>";
						}
					?>
					</ul>
					</form>
		      </ul>
			</div>
			<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>

		   </div>
		</div>
	<!-- main area -->
        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
        	<div class="boite-centrale">

				<div class='page-soumettre'>
					<a href='soumettre-sujet.php'><button class='btn btn-info'> Soumettre un sujet </button></a>
				</div>
				<?php 
				if ($sujets){
					echo "<h4> Vos résultats: </h4>"; 
					echo "<table class='table table-condensed table-bordered table-hover'>
						<tr>
							<th> </th>
							<th> Sujet </th>
							<th> Catégorie </th>
							<th> Soumis par</th>
						</tr>";
					  for ($i=0; $i<count($sujets); $i++) {
					  	  echo "<tr>
									<td class='icon'> <form action='sujet.php' method='get'>
											<input type='hidden' name='id_sujet' value='".$sujets[$i]['sujID']."'/>
											<button type='submit'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></button>
										</form>
									</td> 
					  	  			<td>".$sujets[$i]['sujTexte']."</td>
					  	  			<td>".$sujets[$i]['catTexte']."</td>
					  	  			<td>".$sujets[$i]['pseudo']."</td>
					  	  		</tr>";
					  }
					  echo "<table><hr>";
				}
				else {
					echo "<p> Recherchez des sujets selon vos préférences!</p><hr>";
				} 
				?>
				<div class="favoris">
					<h4> Derniers sujets ajoutés </h4> 
					<table class="table-condensed table-bordered table-hover table-striped table sortable">
						<tr>
							<th> </th>
							<th> Sujet </th>
							<th> Catégorie </th>
							<th> Soumis par </th>

						</tr>
						<?php
							for ($i = count($sujetsRecents)-1; $i >= 0; $i--) {
								echo "<tr>
										<td class='icon'> <form action='sujet.php' method='get'>
												<input type='hidden' name='id_sujet' value='".$sujetsRecents[$i]['sujID']."'/>
												<button type='submit'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></button>
											</form>
										</td> 
										<td>".$sujetsRecents[$i]['sujTexte']."</td>
										<td>".$sujetsRecents[$i]['catTexte']."</td>
										<td>".$sujetsRecents[$i]['pseudo']."</td>

									  </tr>";
							}
							echo "</table>";
						?>
					</div>
				</div> 
	        </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->
<?php include("pied.php"); ?>
