<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
   //  $db_username = 'root';
   //  $db_password = '';
   //  $db_name     = 'bdd-bib';
   //  $db_host     = 'localhost';
   //  $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
   //         or die('could not connect to database');

   // DB Mysql.
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','bdd-bib');
// Establish database connection.
try
{
$db = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = trim($_POST['username']); 
    $password = trim($_POST['password']);

   $stm="SELECT * FROM admin where nom=:nom and pass=:pass";
   $query=$db->prepare($stm);
   $query->bindparam(':nom',$username);
   $query->bindparam(':pass',$password);
   $query->execute();
   
   if($query->rowCount() > 0)
   {
      // create session for login
      $_SESSION['username'] = $username;
      header('Location: GestionVente.php'); 
   }else
   {
      header('Location: login.php?erreur=2');
   }









    
//     if($username !== "" && $password !== "") 
//     {
//         $requete = "SELECT count(*) FROM utilisateur where 
//               nom_utilisateur = '".$username."' and mot_de_passe = '".$password."' ";
//         $exec_requete = mysqli_query($db,$requete);
//         $reponse      = mysqli_fetch_array($exec_requete);
//         $count = $reponse['count(*)'];
//         if($count!=0) // nom d'utilisateur et mot de passe correctes
//         {
//            $_SESSION['username'] = $username;
//            header('Location: login.php?erreur=2');
//         }
//         else
//         {
//            header('Location: GestionVente.php'); // utilisateur ou mot de passe incorrect
//         }
//     }
//     else
//     {
//        header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
//     }
// }
// else
// {
//    header('Location: login.php');
 }
?>