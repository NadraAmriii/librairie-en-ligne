<?php
require_once("Mysql.php");
class Produit extends Mysql
{
   
       private $id;
       private $image;
        private $nom;
        private $prix;
        private $description;

    

        

    public function getId()
    {
        return $this->id;
    }

    public function getimage()
    {
        return $this->image;
    }

    public function setType(string $image)
    {
        $this->image = $image;

        return $this;
    }

    public function getnom()
    {
        return $this->nom;
    }

    public function setnom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function getprix()
    {
        return $this->prix;
    }

    public function setprix($prix)
    {
        $this->prix= $prix;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;

        return $this;
    }
    public function editAll(){  
    $res =$this->connexion()->query("SELECT * from produits");
    // Extraire (fetch) toutes les lignes (enregistrement, rows)
        $les_produits = $res->fetchAll(); //return matrice 
 
        return $les_produits;
    }
  
//function editBy($id)
    public function editBy($id){
        $res =$this->connexion()->query("SELECT * from produits where id=$id");
        // Extraire (fetch) toutes les lignes (enregistrement, rows)
        $le_produit = $res->fetch(); 
        
            return $le_produit;  

    }
}