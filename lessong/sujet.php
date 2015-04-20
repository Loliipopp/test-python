<?php 
	session_start();
	require_once("connexion_base.php");
	require_once("verifier-connexion.php");
	require_once("requetes-sujet.php");

	$donnees['menu'] = "Sujet";
	$donnees['titre'] = $sujet_titre[0]['texte'];
?>

<?php include("entete.php"); ?>
<div class="container">
	      <div class="row">
			<!-- sidebar -->
			<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
				<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
				<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
				<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
			</div>


	        <!-- main area -->
	        <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">



				<div class='boite-centrale'>
					<div class='page-soumettre'>
						<a href='soumettre-sujet.php'><button class='btn btn-info'> Soumettre un sujet </button></a>
					</div>
					<div class='boite'>
						<div class='sujet'>
							<div class='titre'>
								<?php echo "<h3> ".$sujet_titre[0]['texte']." </h3>";?>
							</div>
							<table class='table table-condensed table-bordered table-hover sortable'>
								<?php 
									for ($i=0; $i<count($commentaires); $i++) {
										echo "<tr><td class='tete'><strong>".$commentaires[$i]['pseudo']."</strong> --- ".date_format(date_create($commentaires[$i]['date_soumise']), 'g:ia \o\n l jS F Y')."</div></td></tr>
										<tr><td>".$commentaires[$i]['texte']."</div></td></tr>";
									}
								?>
							</table>
								<form action='sujet.php' method='post' id='reponse'>
									<textarea class='form-control' id='texte' name='texte'> </textarea>
									<?php echo "<input type='hidden' name='sujet' value='$sujet'>"; ?>
									<div class='bouton'>
										<button class='btn btn-info' onclick="verifierReponse(); return false;"> Répondre</button>
									</div>
								</form>
							</table>
						</div>
					</div>
				</div>

		    </div><!-- /.col-xs-12 main -->
	    </div><!--/.row-->
	  </div><!--/.container-->




<?php include("pied.php"); ?>
