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
						<li class="active"><a href="EspaceMembre.php">Espace Membre</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
		 
			</div>
		  </div>
		</div>		
		
		<!-- Titre -->		
		<header id="header" class="hero-unit">
			<h1>Espace Membre</h1><br>
			<i><a href="entrees.php">Aller consulter les entrées</a></i><br>
			<i><a href="platschauds.php">Aller consulter les plats chauds</a></i><br>
			<i><a href="desserts.php">Aller consulter les desserts</a></i>
		</header>
		
		
		<section class="espaceMembre"> 
			
			<p>Bonjour <strong><?php echo $_COOKIE['pseudo']; ?></strong> !</p> <br>

			<?php
			if(isset($_GET['ajout'])) { 
				if ($_GET['ajout'] == 1) { // si un membre viens d'ajouter une recette, on le remercie pour cela
			?> 			
					<p class="alert alert-info alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 Nous vous remercions pour l'ajout de votre recette !
					</p>				
			<?php
				}
			}
			?>
			<br>
			
			<p> Que souhaitez-vous faire ? </p>			
			<br>			
			<ul>
				<li><a class="btn btn-info" href="ajouter.php">Ajouter une recette </a></li>
				<br>
				<li><a class="btn btn-info" href="changerInfos.php"> Changer mes informations</a></li>
				<br>
				<li><a class="btn btn-info" href="script/deconnexion_script.php">Me déconnecter</a></li>
				<br>
			</ul>
			<br><br><br>
			
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