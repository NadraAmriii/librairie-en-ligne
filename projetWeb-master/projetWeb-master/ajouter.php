<?php
	include 'script/GestionCookies.php';

	if(estConnecte() == false) {
		header('Location:connexion.php'); // redirection vers la page de connexion
	}
?>
<!DOCTYPE html>
<html>
 <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />	
        <title>LeCuistot</title>		
		<link rel="icon" type="image/jpg" href="imagesDesign/favicon.ico" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="css/style.css" />		
 </head>
 <body>         
	<div class="container-fluid">	
	
		<!-- Menu -->	 
		<div class="navbar navbar-inverse">
		  <div class="navbar-inner">
			<div id="menu" class="container">
			 
				<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<!-- Be sure to leave the brand out there if you want it shown -->
				<a class="brand" href="index.php"><img id="logo" src="imagesDesign/logo.png"/></a>				
			
				<!-- Everything you want hidden at 940px or less, place within here -->
				<div class="nav-collapse collapse" role="navigation">
					<ul class="nav">
						<li><a href="index.php">Accueil</a></li>
						<li><a href="EspaceMembre.php">Espace Membre</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
		 
			</div>
		  </div>
		</div>		
		
		<!-- Titre -->		
		<header id="header" class="hero-unit">
			<h1>Ajouter une recette</h1>
		</header>
		
		
		<section>
			
			<?php					
			if ((isset($_GET['erreurImg'])) && ($_GET['erreurImg']) == 0) // si l'image à uploader n'est pas des types ou taille spécifiés on dit au membre de mettre une image de type et taille spécifiés
			{					
			?>			
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p class="text-center">
						L'image doit être de type .gif, .jpeg, .jpg ou .png et ne doit pas dépasser 2 Mo.
					</p>
				</div>			
			<?php					
			}		
			?>
			<!-- toque -->	
			<img class="toque"src="imagesDesign/toque.png" alt="toque"/>
			
			<!-- formulaire pour ajout de la recette -->
			<form method="post" action="script/ajouter_script.php" enctype="multipart/form-data">
				<p> <strong>Catégorie de recette : </strong></p>
				<select name="idCategorie">							
							<option value="1">Entrée</option>
							<option value="2">Plat Chaud</option>
							<option value="3">Dessert</option>							
				</select><br><br>
						
				<label for="nomRecette"><strong>Nom de la recette :</strong> </label>
				<input type="text" name="nomRecette" required /><br><br>				
				
				<p> <strong> Photo de la recette : </strong> </p>
				<input type="file" name="file" id="file"><br><br>
				
				<label for="tempsPreparation"><strong>Temps de préparation : </strong></label> 
				<input type="number" name="tempsPreparation" required /> minutes <br><br>
				
				<label for="tempsCuisson"><strong>Temps de cuisson : </strong></label>
				<input type="number" name="tempsCuisson" required /> minutes  <br><br>
				
				<p> <strong> Ingrédients : </strong> </p>
				<div class="listeIngredients">
					<?php
					$bdd = connexionBD();
					
					// récupération des ingrédients possibles pour affichage
					$reponse = $bdd->prepare("SELECT * FROM ingredient ORDER BY nomIngredient;");
					$reponse->execute();
					
					while ($data = $reponse->fetch(PDO::FETCH_ASSOC))
					{ 
					?>
						
						<input name="idIngredient" type="hidden" value="<?php echo $data['idIngredient']; ?>" />
						<li> <?php echo $data['nomIngredient']; ?> : </li>
						<input type="number" name="<?php echo $data['idIngredient'] ?>"/>
						<?php echo $data['mesureIngredient']; ?>   <br> <br> <br>
					<?php
					}
					?>
					<br>
					<p> S'il y a des ingrédients nécessaires qui ne sont pas mentionnés, renseignez-les ici, puis cliquez sur le bouton "<u>Ajout ingrédient</u>": </p><br>
					<div id="ligneIngredient">	
						<input type="text" name="ingredientAjoute" placeholder="ingredient"/> 
						<input type="number" name="quantiteAjoute" placeholder="quantité" /> 
						 <input type="text" name="mesureAjoute"  placeholder="mesure physique (facultatif)" size="4" /> <br> <br>
						<input onclick="ajouterLigne(this.form);" class="btn btn-info" type="button" value="Ajout ingrédient" /> <br><br>
					</div>
				</div><br><br>
				<label for="nbPersonnes"><strong>Nombre de personnes :</strong></label>
				<input type="number" name="nbPersonnes" required /> <br> <br> <br>
				
				<p> <u> <strong>Ecrivez la recette ci-dessous</u> : </strong></p>
				<textarea class="span12" rows="9" name="descriptif" required></textarea>
				<br> <br> <br>
				
				
				<div class="text-center">
					<button class="btn btn-info" type="submit" />Ajouter cette recette</button><br><br>				
				</div>
			</form>
		</section>
				
		<!-- Footer -->		
		<footer class="navbar navbar-inverse navbar-static-bottom">
			<div id="footer" class="navbar-inner">
				<p> 2015 © LeCuistot </p>	 
			</div>
		</footer>
		 
	</div>
	
	<script type="text/javascript" src="script/ajoutLigne.js"></script>
	
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
		
 </body>
</html>