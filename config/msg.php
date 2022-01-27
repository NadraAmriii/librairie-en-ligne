<?php
require_once("connexion.php");

 function ajouter($nom, $prenom, $email, $msg)
{
   if(require("connexion.php"))
   {
     $req = $access->prepare("INSERT INTO contact (nom, prenom, email,msg) VALUES ('$nom', '$prenom', '$email', '$msg')");

     $req->execute(array($nom, $prenom, $email, $msg));

     $req->closeCursor();
   }
}

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM contact ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
?>