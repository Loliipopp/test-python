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
				<form action="forum.php" method="get">
					<?php
					
						for ($i=0; $i < count($categories); $i++) {
							echo "<button class='btn btn-primary' type='submit' name='categorie' value='".$categories[$i]['id']."'>".$categories[$i]['texte']."</button>";
						}
					?>
					</form>
		      </ul>
			</div>
			<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>

		   </div>
		</div>
	<!-- main area -->
        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
			<div class='page-soumettre'>
				<a href='soumettre-sujet.php'><button class='btn btn-info'> Soumettre un sujet </button></a>
			</div>
			<table class='table table-condensed table-bordered table-hover'>
				<tr>
					<th> Sujet </th>
					<th> Soumis par</th>
					<th> Date Soumise</th>
					<th> Allez-y!</th>
				</tr>
			<?php 
			if ($sujets){
			  for ($i=0; $i<count($sujets); $i++) {
			  	  echo "<tr>
			  	  			<td>".$sujets[$i]['texte']."</td>
			  	  			<td>".$sujets[$i]['id_membre']."</td>
			  	  			<td>".date_format(date_create($sujets[$i]['date_soumise']), 'g:ia \o\n l jS F Y')."</td>
							<td> <form action='sujet.php' method='get'><input type='hidden' name='id_sujet' value='".$sujets[$i]['id']."'/><button type='submit' class='btn btn-primary btn-xs'> Cliquez pour en discuter! </button></form></td>  
			  	  		</tr>";
			  }
			} ?>

			</table>
			<div class="boite-centrale">
			</div> 

	        </div><!-- /.col-xs-12 main -->
    </div><!--/.row-->
  </div><!--/.container-->
<?php include("pied.php"); ?>
