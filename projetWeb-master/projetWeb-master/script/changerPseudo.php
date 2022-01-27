<?php
	include 'connexionBD.php'; 
	
	$bdd=connexionBD();
					
	$pseudo = htmlspecialchars($_POST['pseudo']); 
	$oldPseudo = $_COOKIE['pseudo'];
	
	$req = $bdd->prepare("SELECT pseudo FROM membre WHERE pseudo = :pseudo");
	$req->execute(array('pseudo' => $pseudo));
		
	if($req->rowcount() == 0) { // si le pseudo entré par l'utilisateur n'est pas déjà utilisé par un autre membre
				
		// on met à jour le champ pseudo correspondant au membre qui a souhaité changer son pseudo
		$requete = $bdd->prepare("UPDATE membre SET pseudo=:pseudo WHERE pseudo=:oldPseudo");
		$requete->execute(array(
			"pseudo" => $pseudo,
			"oldPseudo" => $oldPseudo
		));
		
		setcookie('pseudo',$pseudo, 0, '/'); // mise à jour du pseudo dans le cookie
		header('Location: ../EspaceMembre.php'); 
	}
	else {
		header('Location: ../changerInfos.php?err=1'); // redirection pour informer l'utilisateur que le nouveau pseudo souhaité est déjà utilisé par un autre membre
	}
?>
