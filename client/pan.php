<?php 
session_start();
$connect = mysqli_connect("localhost", "root", "", "bdd-bib");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["nom"],
				'item_price'		=>	$_POST["prix"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["nom"],
			'item_price'		=>	$_POST["prix"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][id] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="pan.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<title></title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			html,
body {
  width: 100%;
  height: 100%;
  margin: 0;
  background-color: #7EC855;
  font-family: 'Roboto', sans-serif;
}
		</style>
		 <a href="bib.php"> <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
 </a>
	</head>
	<body>
		<br />
		<div class="container">
			<h3 align="center">panier</h3><br />
			<br /><br />
			<?php
				$query = "SELECT * FROM produits ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="pan.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="border:3px solid #5cb85c; background-color:whitesmoke; 
					border-radius:5px; padding:10px;" align="center">
						<img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />

						<h4 class="text-info"><?php echo $row["nom"]; ?></h4>

						<h4 class="text-danger"> <?php echo $row["prix"]; ?>D</h4>
                        

						<input type="number" name="quantity" min="1" value="1" class="form-control" />

						<input type="hidden" name="nom" value="<?php echo $row["nom"]; ?>" />

						<input type="hidden" name="prix" value="<?php echo $row["prix"]; ?>" />

						<input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />

					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			<h3>details d'une commande</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">nom</th>
						<th width="10%">Quantite</th>
						<th width="20%">prix</th>
						<th width="15%">Total</th>
						
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
						<td><?php echo $values["item_quantity"]; ?></td>
						<td> <?php echo $values["item_price"]; ?> D</td>
						<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> D</td>
						<td><a href="pan.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">supprimer</span></a>
						</td>
						
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right"><?php echo number_format($total, 2); ?>D</td>
						<td><a href="achter.php"><span class="text-danger">acheter</span></a></td>
						
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>
		</div>
	</div>
	<br />
	</body>
</html>