<?php
	include 'connexionBD.php';
	
	$pseudo = htmlspecialchars($_POST['pseudo']); 
	$password = htmlspecialchars($_POST['password']); 
	$repeatpassword = htmlspecialchars($_POST['repeatpassword']); 
	$email = htmlspecialchars($_POST['email']);  
	
	if($password == $repeatpassword) // on vérifie que les 2 mots de passe saisis sont bien identiques (au cas où le javascript serait désactivé)     
	{					 
		$bdd = connexionBD();
			
		$req = $bdd->prepare("SELECT pseudo FROM membre WHERE pseudo = :pseudo");
		$req->execute(array('pseudo' => $pseudo));
		
		if($req->rowcount() == 0) // il ne faut pas que le pseudo soit déjà utilisé
		{			
			$req = $bdd->prepare("SELECT email FROM membre WHERE email = :email");
			$req->execute(array('email' => $email));
			
			if($req->rowcount() == 0) // il ne faut pas que le mail soit déjà utilisé
			{			
				$pass_hache = sha1($password); // cryptage du mot de passe avec sha1
				
				// insertion des données du nouveau membre dans la BD
				$req = $bdd->prepare("INSERT INTO membre(pseudo, mdp, email) VALUES (:pseudo, :mdp, :email)");
				$req->execute(array(
					'pseudo' => $pseudo,
					'mdp' => $pass_hache,
					'email' => $email	
					));
					
				header('Location: ../connexion.php'); 				
			} 
			else // mail déjà utilisé par un autre membre
			{ 
				header('Location: ../inscription.php?err=3'); 
			}			
		} 
		else // pseudo déjà utilisé par un autre membre
		{ 
			header('Location: ../inscription.php?err=1'); 
		}
		
	} 
	else // les mots de passes saisis ne sont pas identiques
	{ 
		header('Location: ../inscription.php?err=2'); 
	}  
?>