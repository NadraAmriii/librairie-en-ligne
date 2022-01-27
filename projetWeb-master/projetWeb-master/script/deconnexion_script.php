<?php
	include 'GestionCookies.php';
	$pseudo = $_COOKIE["pseudo"];
	deconnexion($pseudo); // déconnexion du membre
	
	header('Location:../EspaceMembre.php'); // redirection vers la page de connexion
	exit();
?>