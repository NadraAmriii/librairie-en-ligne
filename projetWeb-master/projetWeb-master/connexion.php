<?php
	include 'script/GestionCookies.php';
	
	if(estConnecte() == true) {
		header('Location:EspaceMembre.php'); // redirection vers l'espace membre si le membre est déjà connecté
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
			<h1>Connexion</h1>
		</header>
		
		
		<section> 
		
			<?php
			if(isset($_GET['err'])) { 
				if ($_GET['err'] == 1) { // si le pseudo ou le mot de passe rentré est incorrect, on préviens l'utilisateur
			?> 			
					<p class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 Pseudo ou mot de passe incorrect
					</p>				
			<?php
				}
			}
			?>
			
			<!-- formulaire de connexion -->
			<form class="formConnexion" method="post" action="script/connexion_script.php">
				<br>
				<label for="pseudo"> Pseudo : </label>      	<input type="text" name="pseudo" id="pseudo" required /> <br><br>
				<label for="password"> Mot de passe : </label> 	<input type="password" name="password" id="password" required /> <br><br><br>
				
				<input class="btn btn-info" type="submit" value="Se connecter" /> <br/> <br/>
				
				<br><br>
				
				<p> Si vous n'êtes pas encore inscrit, <a href="inscription.php">cliquez ici</a> !</p>			
				<br> <br>			
			</form>
			
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