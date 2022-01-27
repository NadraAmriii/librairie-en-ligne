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
						<li class="active"><a href="contact.php">Contact</a></li>
					</ul>
				</div>
		 
			</div>
		  </div>
		</div>		
		
		<!-- Titre -->		
		<header id="header" class="hero-unit">
			<h1>Contact</h1>
		</header>
		
		<section>		
			<?php					
			if ((isset($_GET['mail'])) && ($_GET['mail']) == 0) // si une erreur est survenue pendant l'envoi du mail, on le signale à l'utilisateur 
			{					
			?>			
				<div class="alert alert-danger alert-dismissable">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <p class="text-center">
						Une erreur est survenue lors de l'envoi de votre message.
					</p>
				</div>			
			<?php					
			}		
			?>
			
			<?php			
			if ((isset($_GET['mail'])) && ($_GET['mail']) == 1) // si le mail a bien été envoyé, on confirme le bon envoi du mail à l'utilisateur
			{					
			?>	
				<div class="alert alert-info alert-dismissable">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <p class="text-center">
						Votre message a bien été envoyé, nous répondrons à votre requête dans les plus brefs délais.
					</p>
				</div>			
			<?php					
			}		
			?>
				
			<!-- formulaire de contact -->
			<form class="contact" method="post" action="script/contact_script.php">
					<label for="sujet"> Sujet : </label>  <input type="text" id="sujet" name="sujet" required /> <br>
					<label for="email"> Email : </label>  <input type="email" id="email" name="email" required /> <br>
					<label for="message"> Message :</label>
					<textarea id="message" name="message" rows="17" cols="120" required></textarea> <br> <br> <br>
					<input class="btn btn-info" type="submit" value="Envoyer votre message"/> <br> <br> <br> <br>
					<br>
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