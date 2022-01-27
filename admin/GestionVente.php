 <?php 
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
	{	
header('location:../client/login.php');
}
else{

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdd-bib";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
} 
// if ($conn){ // Les codes sont corrects
//    // Ouvrir une session
//    // session_start();
//    // Créer une variable de session appelée 'id_etudiant' initialisée
//    // à l'identifiant de l'étudiant connecté
//    // $_SESSION['id_etudiant'] = $response['id'];
//    // Redirection vers le tableau de bord "dashboard.php"
//    header("location:GestionVente.php");
//   }
//   else{ // Les codes sont faux
//    echo "Erreur de connexion ! Veuillez vérifier vos code d'accès";
//   }
  

?>
<?php 
//ajout
$mess="";
$id=@$_POST['id'];
$image=@$_POST['image'];
$nom=@$_POST['nom'];
$prix=@$_POST['prix'];
$description=@$_POST['description'];
if(isset($_POST['bajout'])){
$exe1=mysqli_query($conn,"insert into produits values('$id','$image','$nom','$prix','$description')");
if($exe1){
   $mess="Ajout réussie !!";
}
else
   $mess="Echec ajout !!";
}

?>

<?php 
//suppréssion
if(isset($_POST['bsupp'])){
$exe2=mysqli_query($conn,"delete from produits where id='$id'");
if($exe2){
   $mess="Suppréssion réussie !!";
}
else
   $mess="Echec suppréssion !!";
}

?>

<?php 
//modifier
if(isset($_POST['bmodif'])){
$exe3=mysqli_query($conn,"update produits set  nom='$nom',prix='$prix' where id='$id'");
if($exe3){
   $mess="Modification réussie !!";
}
else
   $mess="Echec modification !!";
}

?>

<!-- Created by TopStyle Trial - www.topstyle4.com -->
<!DOCTYPE html>
<html>
<head>
	<title>gestion de vente </title>
	<meta charset="utf8">
	<style>
	
body{
	margin: 0px;
	padding: 0px;
	background-color: #7EC855;
}
#tbfich td,th{
	background-color: white;
}
#tbfich{
	width: 60%;
	margin-bottom: 30px;
}
.bouton{
	margin-top:10px;
}
#bt{
	margin-left: 20px;
}
	</style>
</head>

<body>
	<h3 align="center">gestion de vente</h3>
	<div align="center">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST"  >
  <table align="">
    <tr><td></td><td><?php echo $mess; ?></td></tr>
    <tr><td></td><td><strong >Identifiant</strong></td></tr>
   <tr><td></td><td><input type="text" name="id" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong >nom</strong></td></tr>
   <tr><td></td><td><input type="text" name="nom" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong >image</strong></td></tr>
   <tr><td></td><td><input type="text" name="image" class="champ" size="25"  ></td></tr>
   <tr><td></td><td><strong>prix</strong></td></tr>
   <tr><td></td><td><input type="text" name="prix" class="champ" size="25"></td></tr>
   <tr><td></td><td><strong>description</strong></td></tr>
   <tr><td></td><td><input type="text" name="description" class="champ" size="25" >
  
  </table>
  
  <input type="submit" name="bajout" value="Ajouter" class="bouton" >
  <input type="submit" name="bsupp" value="Supprimer" class="bouton" >
  <input type="submit" name="bmodif" value="Modifier" class="bouton" >
  

  </form>
  
   
<div>	
<button onclick="document.location = '../client/bib.php'" id="bt">Produits</button>
<button onclick="document.location = 'GestionUser.php' "id="bt">utilisateur</button>
<button onclick="document.location = 'GestionMsg.php' "id="bt">Message</button>
<button onclick="document.location = '../client/logout.php' "id="bt">deconnexion</button> 
</div>

	</div>
</body>
</html>
<?php } ?>