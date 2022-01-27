<?php

	function connexionBD() {
		require '/home/lecuistot/www/bin/params.php'; // paramètres de connexion à la BD
		//require 'C:\wamp\www\projetWeb\bin\paramsLocal.php';
	
		try {
			$bdd = new PDO('mysql:host='.$sql_host.';dbname='.$sql_base, $sql_user, $sql_password);
		}
		catch (Exception $e) {
			die('Erreur : '.$e->getMessage());
		}
		return $bdd;
	}
	

?>