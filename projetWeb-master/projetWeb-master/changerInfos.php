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
			<h1>Espace Membre</h1>
		</header>
		
		
		<section class="formChangerInfos"> 

			<!-- Changement de pseudo -->
			<h2>Changer mon pseudo</h2>
			<br>
			
			<?php
			if(isset($_GET['err'])) { 
				if ($_GET['err'] == 1) { // // si le pseudo renseigné par l'utilisateur est déjà un pseudo utilisé par un autre membre
			?>			
					<p class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 Ce pseudo est déjà utilisé, veuillez en choisir un autre.
					</p>				
			<?php
				}
			}
			?>
			
			<!-- formulaire nouveau pseudo -->
			<form class="formChangerPseudo" method="post" action="script/changerPseudo.php">
				<label for="pseudo"> Nouveau pseudo (4 caractères minimum): </label>  <br> <input type="text" name="pseudo" id="pseudo" pattern=".{4,}"required /> <br><br>
				<input class="btn btn-info" type="submit" name="submit" value="Changer mon pseudo" />				
			</form>			 
			 <br><br><br>
			 
			 <hr>
			 
			 <br>			
			
			<!-- Changement de mot de passe -->
			<h2>Changer mon mot de passe</h2>
			<br>
			
			<?php
			if(isset($_GET['err'])) { 
				if ($_GET['err'] == 2) { // les mots de passes saisis ne sont pas les mêmes
			?> 			
					<p class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 Les nouveaux mots de passe ne sont pas identiques !
					</p>				
			<?php
				}
			}
			?>
			
			<?php
			if(isset($_GET['err'])) { 
				if ($_GET['err'] == 3) { // l'ancien mot de passe renseigné par l'utilisateur est incorrect
			?> 			
					<p class="alert alert-danger alert-dismissable">
						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 L'ancien mot de passe est incorrect !
					</p>				
			<?php
				}
			}
			?>
			
			<!-- formulaire pour changer de mot de passe -->
			<form class="formChangerMdp" method="post" action="script/changerMdp.php">
				<label for="oldpassword"> Ancien mot de passe : </label>                    <input type="password" name="oldpassword" id="oldpassword" required /> <br> <br>
				<label for="newpassword"> Nouveau mot de passe : </label>                  	<input type="password" name="newpassword" id="password" required/> <br> <br>
				<label for="repeatpassword"> Répéter le nouveau mot de passe : </label>  <input type="password" name="repeatpassword" id="repeatpassword" oninput="verifPassword(this)" required/> <br> <br>
				<input class="btn btn-info" type="submit" name="subpass" value="Changer mon mot de passe"/>
			</form><br><br><br><br><br>			
			
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