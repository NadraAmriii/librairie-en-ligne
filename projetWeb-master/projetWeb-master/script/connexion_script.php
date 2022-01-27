<?php
	
	include 'GestionCookies.php'; 	
	
	require '/home/lecuistot/www/bin/params.php'; // paramètres de connexion à la BD
	//require 'C:\wamp\www\projetWeb\bin\paramsLocal.php';
	
	try {
		$bdd = new PDO('mysql:host='.$sql_host.';dbname='.$sql_base, $sql_user, $sql_password);
	}
	catch (Exception $e) {
		die('Erreur : '.$e->getMessage());
	}	
	
	$pass_hache = sha1($_POST['password']); // cryptage du mot de passe saisis
	$pseudo = htmlspecialchars($_POST['pseudo']);

	// Vérification des identifiants
	$req = $bdd->prepare('SELECT pseudo FROM membre WHERE pseudo = :pseudo AND mdp = :password');
	$req->execute(array(
		'pseudo' => $pseudo,
		'password' => $pass_hache));

	$resultat = $req->fetch();

	if (!$resultat) // si le pseudo et le mot de passe saisis ne correspondent à aucun membre de la BD
	{
		header('Location: ../connexion.php?err=1'); 
	}
	else // connexion du membre
	{
		connexion($pseudo);
		header('Location: ../EspaceMembre.php'); // redirection vers l'espace membre
	}

?>