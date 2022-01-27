<?php
	
	include 'connexionBD.php';
	
	$bdd=connexionBD();
	
	$pb = 0; // variable utilisée pour détecter un possible problème
	
	// on vérifie que le membre n'a pas déjà noté la recette dans la journée
	$req = $bdd->prepare("SELECT count(*) AS nbNoteJournee FROM notation WHERE pseudo=:pseudo AND dateNote = CURDATE() AND idRecette=:idRecette");
	$req->execute(array(
		"pseudo" => $_COOKIE['pseudo'],
		"idRecette" => $_POST['idRecette']
	));	
	$data = $req->fetch(PDO::FETCH_ASSOC);
	if ($data['nbNoteJournee'] == 1){ // si il l'a déjà noté dans la journée
		$pb=1; 
	}
	
	// insertion dans la base de la note avec le commentaire justifiant la note
	$req = $bdd->prepare("INSERT INTO notation(idRecette, pseudo, dateNote, noteDonnee, commentaireNote) VALUES (:idRecette,:pseudo, CURDATE(), :noteDonnee, :commentaireNote)");
	$req->execute(array(
		"idRecette" => $_POST['idRecette'],
		"pseudo" => $_COOKIE['pseudo'],
		"noteDonnee" => htmlspecialchars($_POST['noteDonnee']),
		"commentaireNote" => htmlspecialchars($_POST['commentaireNote'])
	));	
	
	// on récupère l'idRecette pour la redirection
	$req = $bdd->prepare("SELECT idCategorie from RECETTE WHERE idRecette=:idRecette");
	$req->execute(array(
		"idRecette" => $_POST['idRecette']
	));	
	
	$data = $req->fetch(PDO::FETCH_ASSOC);
	
	if ($data['idCategorie']==1) { // catégorie ENTREES
		if ($pb==1) { // problème détecté
			header('Location: ../entreerecette.php?idRecette='.$_POST['idRecette'].'&noterErr=2');
		}
		else { 
			header('Location: ../entreerecette.php?idRecette='.$_POST['idRecette'].'&noter=1');
		}		
	}
	elseif ($data['idCategorie']==2) { // catégorie PLATS CHAUDS
		if ($pb==1) { // problème détecté
			header('Location: ../platchaudrecette.php?idRecette='.$_POST['idRecette'].'&noterErr=2');
		}
		else {
			header('Location: ../platchaudrecette.php?idRecette='.$_POST['idRecette'].'&noter=1');
		}
	}
	else{ // catégorie DESSERTS
		if ($pb==1) { // problème détecté
			header('Location: ../dessertrecette.php?idRecette='.$_POST['idRecette'].'&noterErr=2');
		}
		else {
			header('Location: ../dessertrecette.php?idRecette='.$_POST['idRecette'].'&noter=1');
		}
	}
	
	
	
?>