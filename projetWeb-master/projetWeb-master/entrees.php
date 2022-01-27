<?php include 'script/connexionBD.php'; ?>
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
			<h1>Entrées</h1> <br>
			<i><a href="platschauds.php">Aller consulter les plats chauds</a></i><br>
			<i><a href="desserts.php">Aller consulter les desserts</a></i>
		</header>
		
		
		<section>
			<ul>
				<?php
				$bdd=connexionBD();
				
				// on va récupérer la liste des recettes de la catégorie concernée
				$reponse = $bdd->prepare("SELECT * FROM recette WHERE idCategorie=1 ORDER BY noteGlobale DESC");
				$reponse->execute();
				
				while ($data = $reponse->fetch(PDO::FETCH_ASSOC))
				{ 
				?>
				
				<div class="row-fluid">					
					<div class="cadre_liste_recettes">								
						
						<p class="nomRecette">
							<a href="entreerecette.php?idRecette=<?php echo $data['idRecette']; ?>" >
									<u><?php echo $data['nomRecette']; ?></u>
							</a> 
						</p>	 
						
						<br>
						
						<!-- s'il y a une image pour la recette, on l'affiche -->
						<?php if ($data['imageRecette']!="") { ?>
						<div class="divImageListeRecette">
							<a href="entreerecette.php?idRecette=<?php echo $data['idRecette']; ?>" > 
								<img class="imageListeRecette"src="<?php echo "imagesRecettes/".$data['imageRecette']; ?>" height="190" alt="<?php echo $data['nomRecette']; ?>" title="<?php echo $data['nomRecette']; ?>" />
							</a>
						</div>
						<?php } ?>
						
						<p>	
							<strong> Temps de préparation : </strong><?php echo $data['tempsPreparation']; ?> minutes   <br> <br> <br>
							<strong> Temps de cuisson : </strong><?php echo $data['tempsCuisson']; ?> minutes <br> <br> <br>
							<?php 
								// si la noteGlobale de la recette est non nulle, on l'affiche
								if ($data['noteGlobale']!=null) { 
							?>
								<strong> Note : </strong><?php  echo round($data['noteGlobale'],1); ?> /5  <br> <br>
							<?php
								}
							?>							
						</p>				
						
					</div>					
				</div>			
				
				<?php
				}					
				?>
			</ul>		
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