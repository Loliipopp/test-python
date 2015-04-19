<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title><?php echo $donnees['titre']; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="telechargements/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>

    <!-- CSS crée par nous -->

    <?php 
    switch ($donnees['menu']) {
      case 'Accueil': 
        echo "<link href='css/accueil.css' rel='stylesheet' media='all' type='text/css' media='all' />";
        break;
      case 'Chanson':
        echo "<link href='css/chanson.css' rel='stylesheet' media='all' type='text/css' media='all' />";
        break;
      case 'Forum':
        echo "<link href='css/forum.css' rel='stylesheet' media='all' type='text/css' media='all' />";
        break;      
      case 'Soumettre-Chanson':
        echo "<link href='css/soumettre-chanson.css' rel='stylesheet' media='all' type='text/css' media='all' />";
        break;
      }
    ?>
    <link href="css/style.css" rel="stylesheet" media="all" type="text/css" media="all" />
    <link href="telechargements/awesome-bootstrap-checkbox-master/awesome-bootstrap-checkbox.css" rel="stylesheet" media="all" type="text/css" media="all" />
    <link rel="stylesheet" href="telechargements/awesome-bootstrap-checkbox-master/bower_components/Font-Awesome/css/font-awesome.css"/>


    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <script src="js/script.js" type="text/javascript"> </script> 
    <script src="js/sortable.js" type="text/javascript"> </script> 
  </head>

  <!-- navbar -->
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
          </button>
      
          <a class="navbar-brand" href="accueil.php"><img src="images/Lessong-petit.png" alt="Logo Lessong" width="94" height="44" ></img></a>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
      			<li <?php if ($donnees['menu']=="Accueil") echo 'class="active"'; ?> >
      				<a href="accueil.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Accueil</a>
      			</li>  
            <li <?php if ($donnees['menu']=="Forum") echo 'class="active"'; ?> >
              <a href="forum.php"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Forum </a>
            </li>
    		  </ul>
    		  
    		  <ul class="nav navbar-nav navbar-right">
    			<li <?php if ($donnees['menu']=="Perso") echo 'class="active"'; ?> >
    				<a href="espace-perso.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo $_SESSION['pseudo']; ?></a>
    			</li>
    			<li>
    				<a href="deconnexion.php"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Déconnexion</a>
    			</li> 
    		  </ul>
        </div><!--/.navbar -->
      </div>
    </nav>
    	
