<?php
	include 'script/GestionCookies.php';
	
	if(estConnecte() == true) {
		header('Location:espaceMembre.php'); // redirection vers l'espace membre si le membre est connecté
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
			<h1>Espace Membre</h1>
		</header>
		
		
		<section> 
		
			<!-- formulaire d'inscription -->
			<form class="form-inscription" method="post" action="script/inscription_script.php">
					
				<label for="pseudo">Pseudo (au moins 4 caractères) :</label>
				<input type="text" name="pseudo" id="pseudo"  pattern=".{4,}"required /> 
				<br><br>
				
				<?php
				if(isset($_GET['err'])) 
				{ 
					if ($_GET['err'] == 1) // si le pseudo renseigné par l'utilisateur est déjà un pseudo utilisé par un autre membre
					{
				?> 				
						<p class="alert alert-danger alert-dismissable">
							 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							 Le pseudo est déjà utilisé, veuillez trouver un autre pseudo
						</p>					
				<?php
					}
				}
				?>
				
				<label for="password">Mot de passe (au moins 6 caractères) :</label>
				<input type="password" name="password" id="password" pattern=".{6,}" required /> 
				<br><br>
				
				<label for="repeatpassword">Répéter le mot de passe :</label>
				<input type="password" name="repeatpassword" id="repeatpassword" oninput="verifPassword(this)" required />
				<br><br>
				
				<?php
				if(isset($_GET['err'])) 
				{ 
					if ($_GET['err'] == 2)  // si les deux mots de passes saisis ne sont pas identiques (si le js est désactivé)
					{
				?> 				
						<p class="alert alert-danger alert-dismissable">
							 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							 Les mots de passes saisis ne sont pas identiques
						</p>					
				<?php
					}
				}
				?>
				
				
				<label for="email">Adresse mail :</label>
				<input type="email" name="email" id="email" required />
				
				<?php
				if(isset($_GET['err'])) 
				{ 
					if ($_GET['err'] == 3) // l'adresse mail renseignée par l'utilisateur est déjà utilisée par un autre membre
					{
				?> 				
						<p class="alert alert-danger alert-dismissable">
							 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							 Cette adresse mail est déjà utilisée
						</p>					
				<?php
						}
					}
				?>
				<br><br>
				
				<input class="btn btn-info" type="submit" value="S'inscrire" />

				<br><br><br><br>
								
			</form>
			
		</section>
				
		<!-- Footer -->		
		<footer class="navbar navbar-inverse navbar-static-bottom">
			<div id="footer" class="navbar-inner">
				<p> 2015 © LeCuistot </p>	 
			</div>
		</footer>
		 
	</div>
	
	
	<!-- vérification de l'égalité des deux mots de passe saisis -->
	<script type = "text/javascript" src="script/checkPassword.js"></script>
	
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	
		
 </body>
</html>