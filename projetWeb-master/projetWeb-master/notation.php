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
		
		<?php
		$bdd=connexionBD();
		//$bdd->exec("SET CHARACTER SET utf8");
		
		// on récupère le nom de la recette à noter pour affichage
		$requete = $bdd->prepare("SELECT nomRecette FROM recette WHERE idRecette=:idRecette"); 
		$requete -> execute(array("idRecette" => $_GET['idRecette']));
		$nb_lignes = $requete->rowCount();
		$data = $requete->fetch(PDO::FETCH_ASSOC);
		?>
		
		<!-- Titre -->		
		<header id="header" class="hero-unit">
			<h1> Noter / Commenter </h1>
			<h2> <?php echo $data['nomRecette']; ?> </h2>
			<i><a href="entreerecette.php?idRecette=<?php echo $_GET['idRecette']; ?>">Retour à la recette</a></i> <br>
			<i><a href="entrees.php">Aller consulter les entrées</a></i><br>
			<i><a href="platschauds">Aller consulter les plats chauds</a></i><br>
			<i><a href="desserts.php">Aller consulter les desserts</a></i>
		</header>
		
		
		<section>		
								
			<?php
			if($nb_lignes == 1) { 	// s'il l'id de la recette présent dans l'URL correspond bien à une recette dans la BD				
			?>
				
				<div class="row-fluid">	
					<form method="post" action="script/noter.php">
						<!-- Notation -->				
						<h2>Note : </h2><br>
						<div class="noteInput">
							<input type="radio" name="noteDonnee" value="1"/> 1 / 5 <br><br>
							<input type="radio" name="noteDonnee" value="2"/> 2 / 5 <br><br>
							<input type="radio" name="noteDonnee" value="3" checked/> 3 / 5 <br><br>
							<input type="radio" name="noteDonnee" value="4"/> 4 / 5 <br><br>
							<input type="radio" name="noteDonnee" value="5"/> 5 / 5 <br> <br>						
						</div>
						<input name="idRecette" type="hidden" value="<?php echo $_GET['idRecette']; ?>" />
						<br>
						
						<!-- Commentaire justifiant la note -->
						<h2>Commentaires :</h2> <br>											
						<textarea class="span12" rows="9" name="commentaireNote" required></textarea>
						<br> <br>
						<p class="text-center">
							<button class="btn btn-info" type="submit" />Noter et commenter</button>				
						</p>
					</form>				
				</div>
				
			<?php
			}
			else // l'id de la recette présent dans l'URL ne correspond à aucune recette dans la BD
			{			
			?>			
			<div class="alert alert-danger">
				 <p class="text-center"> 
					Recette inexistante.
				</p>
			 </div>			
			<?php			
			}
			?>		
		</section>
				
		<!-- Footer -->		
		<footer class="navbar navbar-inverse navbar-static-bottom">
			<div id="footer" class="navbar-inner">
				<p> 2015 © LeCuistot </p>	 
			</div>
		</footer>
		 
	</div>
	
	
		
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

		
 </body>
</html>