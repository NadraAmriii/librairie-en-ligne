<?php

$extensionsAutorisees = array("jpg", "bmp", "jpeg", "gif", "png");

$extensionFichierexploded = explode(".", $_FILES["file"]["name"]); // tableau de chaine contenant nom de l'image et l'extension

$extensionFichier = end($extensionFichierexploded); // récupère la dernière valeur (donc l'extension) du tableau qui contient le nom de l'image et extension ($extensionFichierexploded)

// verification que le fichier uploader respecte les extensions autorisées et ne dépasse pas 2Mo
if (is_uploaded_file($_FILES['file']['tmp_name'])) {
	if ((($_FILES["file"]["type"] == "image/gif")
		|| ($_FILES["file"]["type"] == "image/jpeg")
		|| ($_FILES["file"]["type"] == "image/png")
		|| ($_FILES["file"]["type"] == "image/jpg"))
		&& ($_FILES["file"]["size"] < 2000000) // 2Mo maximum
		&& in_array($extensionFichier, $extensionsAutorisees)) // indique si l'extension fait partie du tableau de chaine (contenant les extensions autorisées)
	{		
		$etat = "upload"; // le fichier uploader respecte bien les conditions requises
		
		//move_uploaded_file($_FILES["file"]["tmp_name"], "c:\wamp\www\projetWeb\ImagesRecettes\image".$idRecette['max(idRecette)'].".".$extensionFichier); // upload en localhost
		move_uploaded_file($_FILES["file"]["tmp_name"], "/home/lecuistot/www/imagesRecettes/image".$idRecette['max(idRecette)'].".".$extensionFichier);
	}
	else {
		$etat = "error"; // l'extension ne fais pas partie des extensions autorisées ou la taille est supérieur à 2Mo
	}
}
?>


