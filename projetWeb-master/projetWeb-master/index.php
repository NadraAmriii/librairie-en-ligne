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
						<li class="active"><a href="">Accueil</a></li>
						<li><a href="EspaceMembre.php">Espace Membre</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
		 
			</div>
		  </div>
		</div>		
		
		<!-- Titre -->		
		<header id="header" class="hero-unit">
			<h1>LeCuistot</h1>
			<p> Le site pour vos meilleures recettes de cuisine ! </p>
		</header>
		
		<section class="categories"> 
			<?php	
			if ((isset($_GET['ajout'])) && ($_GET['ajout']) == 1) //si un membre viens d'ajouter une recette
			{				
			?>		
				<div class="alert alert-info alert-dismissable">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <p class="text-center">
						Nous vous remercions pour l'ajout de votre recette !
					</p>
				 </div>			
			<?php 					
			}
			?>
			<h2> Catégories : <a href="entrees.php">Entrées</a>, <a href="platschauds.php">Plats chauds</a>, <a href="desserts.php">Desserts</a></h2> <br>
			<p> Cliquez sur l'image correspondant à la catégorie souhaitée </p> <br>
			
			<br> <p> <a href="entrees.php"> <img src="imagesDesign/imageEntrees.png" alt="ENTREES" title="ENTREES" width="450" height="300"/> </a> </p> <br> <br>
			<br> <p> <a href="platschauds.php">   <img src="imagesDesign/imagePlatsChauds.png" alt="PLATS CHAUDS" title="PLATS CHAUDS" width="600" height="300"/> </a> </p>
			<br> <p> <a href="desserts.php"> <img src="imagesDesign/imageDesserts.png" alt="DESSERTS" title="DESSERTS" width="600" height="300"/></a> </p>	<br> <br>
			
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