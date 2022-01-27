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
		
		<?php
		
		$bdd = connexionBD();
		//$bdd->exec("SET CHARACTER SET utf8");
		
		// on récupère les informations concernant la recette sur laquelle l'utilisateur a cliqué
		$requete = $bdd->prepare("SELECT * FROM recette WHERE idRecette=:idRecette"); 
		$requete -> execute(array("idRecette" => $_GET['idRecette']));
		$nb_lignes = $requete->rowCount();
		$data = $requete->fetch(PDO::FETCH_ASSOC);
		?>
		
		<!-- Titre -->		
		<header id="header" class="hero-unit">
			<h1><?php echo $data['nomRecette']; ?></h1> <br>
			<i><a href="entrees.php">Retour aux entrées</a></i><br>
			<i><a href="platschauds.php">Aller consulter les plats chauds</a></i><br>
			<i><a href="desserts.php">Aller consulter les desserts</a></i>
		</header>
		
		
		<section>
			<?php		
			if ((isset($_GET['noter'])) && ($_GET['noter']) == 1) // si l'utilisateur viens de noter la recette
			{				
			?>		
				<div class="alert alert-info alert-dismissable">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <p class="text-center">
						Votre notation a bien été pris en compte.
					</p>
				 </div>
			
			<?php 					
			}
			if ((isset($_GET['noterErr'])) && ($_GET['noterErr']) == 2) // si l'utilisateur tente de noter une recette qu'il a déjà noté dans la même journée		
			{	
			?>		
				<div class="alert alert-danger alert-dismissable">
					 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					 <p class="text-center">
						Vous ne pouvez noter une recette qu'une fois dans la journée.
					</p>
				 </div>			
			<?php 					
			}
			if($nb_lignes == 1) // s'il l'id de la recette présent dans l'URL correspond bien à une recette dans la BD, alors on affiche les informations sur cette recette
			{ 					
			?>					
				<div class="row-fluid">	
					
					<?php if ($data['imageRecette']!="") { ?>
					<div class="pageRecette">
						<img class="imageRecette" src="<?php echo "imagesRecettes/".$data['imageRecette']; ?>" alt="<?php echo $data['nomRecette']; ?>" title="<?php echo $data['nomRecette']; ?>" />
					</div>
					<?php } ?>
					
					<img class="toque"src="imagesDesign/toque.png" alt="toque"/>
							
					<br> <br>
					<p class="enTeteRecette">	
						<strong> Temps de préparation : </strong><?php echo $data['tempsPreparation']; ?> minutes   <br> <br> <br>
						<strong> Temps de cuisson : </strong><?php echo $data['tempsCuisson']; ?> minutes <br> <br> <br>					
						<?php 
							if ($data['noteGlobale']!=null) { 
						?>
							<strong> Note : </strong><?php  echo round($data['noteGlobale'],1); ?> /5  <br> <br> <br>
						<?php
							}
						?>					
						<strong> Ingrédients (pour <?php echo $data['nbPersonnes']; ?> personnes) :</strong> 
					</p>
					
					<?php
						// on récupère les ingrédients composant la recette consultée
						$req = $bdd->prepare("SELECT I.nomIngredient, I.mesureIngredient, C.quantite FROM ingredient I, composer C WHERE I.idIngredient=C.idIngredient AND C.idRecette=:idRecette"); 
						$req -> execute(array("idRecette" => $_GET['idRecette']));
						
						while($ingredients = $req->fetch(PDO::FETCH_ASSOC)) {						
					?>
						
						<ul>
							<li><?php echo $ingredients['nomIngredient']; ?>  
								<?php if($ingredients['quantite']!= NULL) {
										echo ' : '.$ingredients['quantite'];   
										if ($ingredients['mesureIngredient'] !=NULL) { 
											echo ' '.$ingredients['mesureIngredient'];
											}
									  } ?> 
							</li>
						</ul>
					<?php		
						} 
					?> 
					<br>
					<strong> <u> Préparation de la recette :</u> </strong> <br> <br> <?php echo nl2br($data['descriptif']); ?>   <br> <br> <br> <br>
					
					
					
					<?php							
					$requete = $bdd->prepare("SELECT *,COUNT(*) as nbComentaires FROM notation WHERE idRecette=:idRecette AND commentaireNote <> ''");
					$requete->execute(array("idRecette" => $_GET['idRecette']));
					$data = $requete->fetch();				
					
					if ($data['nbComentaires'] > 0) // s'il y a des commentaires sur cette recette alors on les affiche
					{
					?>
						<h2>Commentaires :</h2>
						<div class="commentaires">
						<?php
						$requete = $bdd->prepare("SELECT * FROM notation WHERE idRecette=:idRecette AND commentaireNote <> '' ORDER BY dateNote");
						$requete->execute(array("idRecette" => $_GET['idRecette']));
						while($data = $requete->fetch(PDO::FETCH_ASSOC))  
						{							
					?>								
							<p>
								<span class="muted">Posté par <strong><?php echo $data['pseudo']?></strong>, le <strong><?php echo $data['dateNote']?></strong> :</span> <?php echo $data['commentaireNote']; ?> <br/>
							</p>										
					<?php
						}
					}
					?>			
					</div><br><br>
					
					<!-- bouton pour noter/commenter la recette consultée -->
					<div class="text-center">
						<a href="notation.php?idRecette=<?php echo $_GET['idRecette']; ?>"><button class="btn btn-info">Noter / Commenter cette recette</button></a> (*)
					</div>
					<br><br>
					<p class="text-right"> (*) Vous devez être connecté en tant que membre pour pouvoir noter et commenter ce parcours </p>
				</div>
				
				
			<?php
			}
			else // l'id de la recette présent dans l'URL ne correspond à aucune recette dans la BD
			{			
			?>			
			<div class="alert alert-danger">
				 <p class="text-center"> 
					Recette inexistante.
					<a href="entrees.php">Retour aux entrées</a>
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