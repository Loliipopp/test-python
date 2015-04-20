<?php 
	session_start(); //toujours au tout début
	require_once("connexion_base.php");
	require_once("verifier-connexion.php");
	require_once("requetes-perso.php");


	$donnees['titre_page']="Espace Perso" ;
	$donnees['menu']="Espace-Perso";
?>

<?php include "entete.php";?>
<div class="container">
  <div class="row">
	<!-- sidebar -->
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="leftCol">
	  <div data-spy="affix" data-offset-top="45" data-offset-bottom="90">
	    <div class="well"> <!-- encadrement -->  
		</div>
		<?php echo "<img src='images/fille.jpg' height='200px' width='200px'>"; ?>
	  </div>
	</div>

    <!-- main area -->
    <div class="col-xs-12 col-sm-9" data-spy="scroll" data-target="#sidebar-nav">
		<div class="boite-centrale">
			<div class='boite-boite'>
				<div class='boite'>
					<?php
					if ($chansonsSoumises) {
						echo "<p> Chansons que j'ai soumis </p>
							<table class='table table-hover table-bordered table-condensed sortable'>
							<tr> 
							<th> </th>
							<th>Chanson</th>
							<th>Interprète</th>
							</tr>";

							for ($i=0; $i<count($chansonsSoumises); $i++) {
								echo "<tr>
										<td class='icon'> <form action='chanson.php' method='get'>
												<input type='hidden' name='id_chanson' value='".$chansonsSoumises[$i]['id']."'/>
												<button type='submit'><span class='glyphicon glyphicon-headphones' aria-hidden='true'></span></button>
											</form>
										</td> 
									<td>".$chansonsSoumises[$i]['titre']."</td>
									<td>".$chansonsSoumises[$i]['interprete']."</td>
									</tr>";
							}
								echo "</table>";
						}
						else {
							echo "<p> Vous n'avez pas encore soumis des chansons </p>";
						}
						if ($chansonsCommentees) {

						echo "<p> Chansons que j'ai commenté </p>
						<table class='table table-hover table-bordered table-condensed sortable'>
							<tr> 
								<th> </th>
								<th>Chanson</th>
								<th>Interprète</th>
							</tr>";
					
							for ($i=0; $i<count($chansonsCommentees); $i++) {
								echo "<tr>
										<td class='icon'> <form action='chanson.php' method='get'>
												<input type='hidden' name='id_chanson' value='".$chansonsCommentees[$i]['id']."'/>
												<button type='submit'><span class='glyphicon glyphicon-headphones' aria-hidden='true'></span></button>
											</form>
										</td> 
									<td>".$chansonsCommentees[$i]['titre']."</td>
									<td>".$chansonsCommentees[$i]['interprete']."</td>
									</tr>";
							}
								echo "</table>";
						}
						else {
							echo "<p> Vous n'avez pas encore commenté sur des chansons </p>";
						}
					?>
				</div>
			</div>
			<br>
			<div class='boite-boite'>
				<div class='boite'>
					<?php
					if ($sujetsSoumis) {
						echo "<p> Sujets que j'ai soumis </p>
						<table class='table table-hover table-bordered table-condensed sortable'>
							<tr> 
								<th> </th>
								<th>Sujet</th>
							</tr>";

								for ($i=0; $i<count($sujetsSoumis); $i++) {
									echo "<tr>
											<td class='icon'> <form action='sujet.php' method='get'>
													<input type='hidden' name='id_sujet' value='".$sujetsSoumis[$i]['id']."'/>
													<button type='submit'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></button>
												</form>
											</td> 
										<td>".$sujetsSoumis[$i]['texte']."</td>
										</tr>";
								}
								echo "</table>";
					}
					else {
						echo "<p> Vous n'avez pas encore soumis de sujet dans le forum </p>";
					} 
					if ($sujetsCommentes) {
						echo "<p> Sujets auquel j'ai répondu </p>
						<table class='table table-hover  table-bordered table-condensed sortable'>
							<tr> 
								<th> </th>
								<th>Sujet</th>
							</tr>";

								for ($i=0; $i<count($sujetsCommentes); $i++) {
									echo "<tr>
											<td class='icon'> <form action='sujet.php' method='get'>
													<input type='hidden' name='id_sujet' value='".$sujetsCommentes[$i]['id']."'/>
													<button type='submit'><span class='glyphicon glyphicon-comment' aria-hidden='true'></span></button>
												</form>
											</td> 
										<td>".$sujetsCommentes[$i]['texte']."</td>
										</tr>";
								}
								echo "</table>";
						}
						else {
							echo "<p> Vous n'avez pas encore commenté dans le forum </p>";
						}
					?>		

				</div>
			</div>
		</div>
     </div><!-- /.col-xs-12 main -->
   </div><!--/.row-->
</div><!--/.container-->


<?php include "pied.php"; ?>