<?php

require_once("../config/msg.php");
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
	{	
header('location:../client/login.php');
}




//$Produits=afficher();

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
  caption {
    padding: 10px;
    caption-side: bottom;
}



  </style>


</head>
<body>



     <table class="table_cat th_produits table table-striped">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Message</th>
        <th></th>
        
    </tr>
    
    <?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd-bib;charset=utf8', 'root', '');


$reponse = $bdd->query('SELECT * FROM contact');

// On affiche chaque entrée une à une
while ($contact = $reponse->fetch())
{
?>
    <tr>
      <th><?php echo $contact['id'];?></th>
      <th><?php echo $contact['nom'];?></th>
    <th ><span style="color:orange"><?php echo $contact['prenom']; ?></span>
   
  <th style="color:#0404B4"><?php echo $contact['email']; ?></th>

    
    <th><?php echo $contact['msg']; ?></th>
    <th><a class='btn btn-primary' href='supprim.php'>supprimer</th>
 
   </tr>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête

?>
<caption>
<a href="GestionVente.php"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
<br><br>
<button onclick="document.location = '../client/logout.php' "id="bt">deconnexion</button>
</caption>

</body>
</html>

