<?php
	include 'connexionBD.php'; 
	
	$bdd=connexionBD();
	
	
	
	// insertion de la recette dans la BD
	$req = $bdd->prepare("INSERT INTO recette (nomRecette,descriptif,tempsPreparation, tempsCuisson, nbPersonnes, idCategorie, pseudo) VALUES (:nomRecette,:descriptif,:tempsPreparation,:tempsCuisson,:nbPersonnes,:idCategorie,:pseudo)");	
	$req->execute(array(
		"nomRecette" => htmlspecialchars($_POST['nomRecette']),
		"descriptif" => htmlspecialchars($_POST['descriptif']),
		"tempsPreparation" => htmlspecialchars($_POST['tempsPreparation']),
		"tempsCuisson" => htmlspecialchars($_POST['tempsCuisson']),
		"nbPersonnes" => htmlspecialchars($_POST['nbPersonnes']),
		"idCategorie" => htmlspecialchars($_POST['idCategorie']),
		"pseudo" => $_COOKIE['pseudo']
	));
	
	$req = $bdd->prepare("SELECT max(idRecette) FROM recette");	
	$req->execute();
	
	$idRecette = $req->fetch(PDO::FETCH_ASSOC); 
	
	// on récupère la liste des ingredients de la table ingredient
	$req = $bdd->prepare("SELECT idIngredient FROM ingredient");
	$req->execute();
	
	// insertion des ingredients spécifiés (ceux qui existaient déjà dans la table ingredient) dans la table composer de la BD
	while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
		if($_POST[$data['idIngredient']]!="") {
			$requete = $bdd->prepare("INSERT INTO composer(idRecette,idIngredient,quantite) VALUES(:idRecette,:idIngredient,:quantite)");
			$requete->execute(array(
				"idRecette" => $idRecette['max(idRecette)'],
				"idIngredient" => $data['idIngredient'],
				"quantite" => $_POST[$data['idIngredient']]
			));
		}		
	}
	
	
	// insertion des ingrédients n'existant pas encore dans la BD
	if(!empty($_POST['ingredient'])) {
		foreach($_POST['ingredient'] as $key => $ingredient) {
			if(!empty($ingredient)) {
				
				$requete = $bdd->prepare("INSERT INTO ingredient(nomIngredient, mesureIngredient) VALUES(:nomIngredient,:mesureIngredient)");
				$requete->execute(array(
					"nomIngredient" => $ingredient,
					"mesureIngredient" => $_POST['mesure'][$key]
				));	

				$req = $bdd->prepare("SELECT max(idIngredient) FROM ingredient");	
				$req->execute();
				$idIngredient = $req->fetch(PDO::FETCH_ASSOC); 
				
				if($_POST['quantite'][$key] == 0) {
					$_POST['quantite'][$key] = null;
				}
				// insertion des ingrédients qui n'existaient pas encore dans la table composer
				$requete = $bdd->prepare("INSERT INTO composer(idRecette, idIngredient, quantite) VALUES(:idRecette,:idIngredient,:quantite)");
				$requete->execute(array(
					"idRecette" => $idRecette['max(idRecette)'],
					"idIngredient" => $idIngredient['max(idIngredient)'],
					"quantite" => $_POST['quantite'][$key]
				));
				
			}
		}
	}	
	
	
	include('upload.php');
	
	// insertion de l'image	correspondant à la recette 	
	if ($etat == "upload") {
		$req = $bdd->prepare("UPDATE recette SET imageRecette = :imageRecette WHERE idRecette = :idRecette");	
		$req->execute(array(
			"imageRecette" => "image".$idRecette['max(idRecette)'].".".$extensionFichier,
			"idRecette" => $idRecette['max(idRecette)']
		));
	}
	
	
	
	if ($etat == "error") { // si erreur lors de l'upload
		header('Location: ../ajouter.php?erreurImg=0'); 
	}
	else { // succès
		header('Location: ../index.php?ajout=1'); 
	}	
	
?>