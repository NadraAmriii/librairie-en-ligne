<?php
class Mysql
{
	private $_serveur = "127.0.0.1";
	private $_login = "root";
	private $_mdp	= "";
	private $_bdd	= "bdd-bib";
	
	

	//public function get_cnx()
	//{
		//return $this->_cnx;
	//}
	
	public function connexion(){
	try{
$_cnx = new PDO("mysql: host=$this->_serveur; dbname=$this->_bdd", $this->_login, $this->_mdp);

}catch (PDOException $e) {
   echo 'Échec lors de la connexion : ' . $e->getMessage();
}
return $_cnx;
}
	
	
	public function requete($q)
	{
		$res = $this->_cnx->query($q); //comme query() mais permet d'exécuter plusieurs requêtes séparées par ;
		if (!$res)
			 echo('echec insertion'.$_cnx->errorInfo());
		return $res;
	}
}

?>
