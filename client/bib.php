


<?php
require_once("Produit.php");

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
<div style="text-align: center;background-color: blue;color:white; display:table; margin:auto;">

</div>

     <table class="table_cat th_produits table table-striped">
    
    <tr>
        <th>Id</th>
        <th>image</th>
        <th>nom</th>
        <th>prix</th>
        <th>description</th>
        <th></th>
        
    </tr>
  
    
    <?php
$bdd = new PDO('mysql:host=localhost;dbname=bdd-bib;charset=utf8', 'root', '');


$reponse = $bdd->query('SELECT * FROM produits');

// On affiche chaque entrée une à une
while ($produits = $reponse->fetch())
{
?>
    <tr>
      <th><?php echo $produits['id'];?></th>
      <th><img width="200px" height="200px" src="<?php echo $produits['image'];?>"/></th>
    <th ><span style="color:orange"><?php echo $produits['nom']; ?></span>
   
  <th style="color:#0404B4"><?php echo $produits['prix']; ?>  Dinars</th>

    
    <th><?php echo $produits['description']; ?></th>
    <th><a href="loginC.php" class="btn btn-info" role="button">panier</a>
</th>

   </tr>
<?php
}

$reponse->closeCursor(); 

?>
<caption>
<a href="acceuill.php"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></caption>
</body>
</html>

