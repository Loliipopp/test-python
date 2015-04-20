<?php 
	session_start();
	require_once("connexion_base.php");
	if (!empty($_POST)) {
		switch ($_POST['type']) {
			  
			// L'utilisateur veut se connecter. 
			case 'connexion':
				$pseudo = $_POST['identifiant'];
				$motdepasse = $_POST['motdepasse'];

				$requete="SELECT * FROM membre WHERE pseudo = '$pseudo'";  // Retourner le id_personne de l'utilisateur!
				$response = $pdo->prepare($requete);
				$response->execute();

				$pseudoArray = $response->fetchAll();

				/** Si le pseudo existe et le mot de passe et juste, dirigier l'utilisateur vers la page d'acceuil
				 * et affecter les variables de session.  
				 */
				if (count($pseudoArray)) {
					if ($pseudoArray[0]['mot_de_passe'] == $motdepasse) {
						$_SESSION['pseudo'] = $pseudoArray[0]['pseudo'];
						$_SESSION['id_personne'] = $pseudoArray[0]['id'];

						header('Location: http://localhost:8888/lessong/accueil.php'); 
						exit();
					}
					
					// Le mot de passe n'est pas juste
					else  {
						header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
					}
				}
				// Le pseudo n'existe pas
				else  {
					header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
				}
				header('Location: http://localhost:8888/lessong/accueil.php');   // Diriger l'utilisateur vers la page d'accueil
				break; 
			
			//L'utilisateur veut s'inscire.  
			case 'inscription': 
				$pseudo = $_POST['pseudo'];
				$email = $_POST['email'];			
				$motdepasse = $_POST['motdepasse'];
				$confirmmdp = $_POST['cfmmotdepasse'];


				// L'utilisateur n'a pas mis le même mot de passe dans chaque champs.  
				if (!($motdepasse === $confirmmdp)) 
					header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
				/**
				 * Si les deux mots de passe sont equivalents et valides,
				 * verifier que le pseudo n'est pas déjà pris.  
				 */
				else {
					$requete="SELECT id FROM membre WHERE pseudo = '$pseudo'";
					$response = $pdo->prepare($requete);
					$response->execute();

					$pseudoExistes = $response->fetchAll();

					// Si le pseudo n'existe pas, ajouter l'utilisateur à la base de données.  
					if (!count($pseudoExistes)) {  
						$requete="INSERT INTO membre (pseudo, mot_de_passe, email, date_inscrit) VALUES (?, ?, ?, NOW())";
						$response=$pdo->prepare($requete);
						$response->execute(array($pseudo, $motdepasse, $email));
						
						// Récuperer l'ID du dernier membre ajouté
						$id_membre = $pdo->lastInsertId();  

						$_SESSION['pseudo'] = $pseudo; 
						$_SESSION['id_personne'] = $id_membre;

						header('Location: http://localhost:8888/lessong/accueil.php');   // Diriger l'utilisateur vers la page d'accueil
					} else 
						header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
				}			
				break;
			default: 
				header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
		}
	}
	/**
	 * S'il n'y pas de POST, diriger l'utilisateur vers la page de connexion
	 * pour qu'il puisse se connecter.
	 */
	else {
		header('Location: http://localhost:8888/lessong/index.php');   // Diriger l'utilisateur vers la page de connexion
	}


?> 