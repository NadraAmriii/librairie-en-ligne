<?php				
	include 'connexionBD.php'; 
	
	$bdd=connexionBD();

	$oldpassword=htmlspecialchars($_POST['oldpassword']);
	$newpassword=htmlspecialchars($_POST['newpassword']);
	$repeatpassword=htmlspecialchars($_POST['repeatpassword']);
	
	$oldpassword = sha1($oldpassword); // cryptage du mot de passe pour la sécurité
	
	$req = $bdd->prepare("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp=:oldpassword");
	$req->execute(array(
		'pseudo' => $_COOKIE['pseudo'],
		'oldpassword' => $oldpassword
	));
	$resultat=$req->fetch();
	
	
	if ($newpassword != $repeatpassword)
	{
		header('Location:../changerInfos.php?err=2');
	}
	
	else if (!$resultat)  // s'il n'a pas trouvé de ligne avec le pseudo et le password
	{
		header('Location:../changerInfos.php?err=3');
	}
	
	else // s'il n'y a pas d'erreur
	{
		$newpassword = sha1($newpassword);
		
		$requete = $bdd->prepare("UPDATE membre SET mdp=:newpassword WHERE pseudo=:pseudo");
		$requete->execute(array(
			"newpassword" => $newpassword,
			"pseudo" => $_COOKIE['pseudo']	
		));
		
		header('Location:../EspaceMembre.php');
	}
	
?>