<?php

 function ajouter($vnom, $vprenon, $vemail, $vpass)
{
   if(require("connexion.php"))
   {
     $req = $access->prepare("INSERT INTO utilisateur (nom, prenon, email, pass) VALUES ('$vnom', '$vprenon', '$vemail', '$vpass')");

     $req->execute(array($vnom, $vprenon, $vemail, $vpass));

     $req->closeCursor();
   }
}
function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM utilisateur ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function supprimer($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM utilisateur WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}

?>