<?php
require_once("Mysql.php");
class Utilisateur extends Mysql
{
       private $id;

       private $nom;

        private $prenon;

        private $email;

       private $pass;

       

    public function getId()
    {
        return $this->id;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom(string $nom)
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenon()
    {
        return $this->prenon;
    }

    public function setPrenon(string $prenon)
    {
        $this->prenon = $prenon;

        return $this;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPass(string $pass)
    {
        $this->pass = $pass;

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
    $res =$this->connexion()->query("SELECT * from utilisateur");
 // Extraire (fetch) toutes les lignes (enregistrement, rows)
 $les_utilisateurs = $res->fetchAll(); //return matrice 
 
        return $les_utilisateurs;
    }
    public function supprimer($id){
        $q="delete from utilisateur where id =$id";
        $stmt = $this->connexion()->exec($q);
        if(!$stmt)
        echo('echec de suppression'.$this->connexion()->erreurInfo());
        else
        return $stmt;
    }
   
}
