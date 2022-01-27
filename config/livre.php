<?php
require_once("connexion.php");

 function ajouter($image, $nom, $prix, $desc)
{
   if(require("connexion.php"))
   {
     $req = $access->prepare("INSERT INTO produits (image, nom, prix, description) VALUES ('$image', '$nom', $prix, '$desc')");

     $req->execute(array($image, $nom, $prix, $desc));

     $req->closeCursor();
   }
}

function afficher()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM produits ORDER BY
       id DESC");

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
		$req=$access->prepare("DELETE FROM produits WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}
//public function modifier($id){
    //if(require("connexion.php"))
 //  {
    // $req = $access->prepare("update produits SET '$this->image' ,
     //'$this->nom' ,'$this->prix', $this->desc WHERE id=$id";);

    // $req->closeCursor();
   // $req->execute(array($image, $nom, $prix, $desc));
  // }//

?>