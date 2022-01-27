<?php	

	function connexion($pseudo) {
		$token = sha1(uniqid()); // cryptage du token (qui est unique)
		
		// on fixe les cookies pseudo et token qui seront supprimé lorsque le membre se déconnecte ou ferme son navigateur
		setcookie('pseudo',$pseudo, 0, '/');
		setcookie('token',$token, 0, '/');	
		
		include 'connexionBD.php'; 
		$bdd = connexionBD();		
		
		// mise à jour du token dans la BD
		$requete = $bdd->prepare("UPDATE membre SET token=:token WHERE pseudo=:pseudo");
		$requete->execute(array(
			"token" => $token,
			"pseudo" => $pseudo	
		));		
	}
	
	
	function deconnexion($pseudo) {
		
		include 'connexionBD.php'; 
		$bdd = connexionBD();
		
		// on met le token a NULL dans la BD
		$requete = $bdd->prepare("UPDATE membre SET token=:token WHERE pseudo=:pseudo");
		$requete->execute(array(
			"token" => NULL,
			"pseudo" => $pseudo	
		));
		
		// destruction des cookies
		setcookie('pseudo','',-1,'/');
		setcookie('token','',-1, '/');
	}
	
	
	// fonction pour vérifier si l'utilisateur est connecté	
	function estConnecte(){
		
		if (isset($_COOKIE['pseudo']) and isset($_COOKIE['token'])){
			$pseudo = $_COOKIE['pseudo'];
			$token = $_COOKIE['token'];
			
			include 'connexionBD.php'; 
			$bdd = connexionBD();
			// on vérifie si les cookies pseudo et token correspondent à une ligne dans la table membre de la BD
			$req = $bdd->prepare("SELECT pseudo FROM membre WHERE token=:token AND pseudo=:pseudo"); 
			$req -> execute(array(
				"token" => $token,
				"pseudo" => $pseudo
			));
			$nb_lignes = $req->rowCount();	
			if($nb_lignes == 1) {
				return true;
			}
			else {
				return false;
			}
		}
		else {
			return false;
		}
		
	}
?>