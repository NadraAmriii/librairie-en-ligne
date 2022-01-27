<?php 
  $db = mysqli_connect('localhost', 'root', '', 'bdd-bib');
  if (isset($_POST['username_check'])) {
  	$nom = $_POST['nom'];
  	$sql = "SELECT * FROM utilisateur WHERE nom='$nom'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }
  if (isset($_POST['email_check'])) {
  	$email = $_POST['email'];
  	$sql = "SELECT * FROM utilisateur WHERE email='$email'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "taken";	
  	}else{
  	  echo 'not_taken';
  	}
  	exit();
  }
  if (isset($_POST['save'])) {
  	$nom = $_POST['nom'];
      $nom = $_POST['prenon'];
  	$email = $_POST['email'];
  	$pass = $_POST['pass'];
  	$sql = "SELECT * FROM utilisateur WHERE nom='$nom'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "exists";	
  	  exit();
  	}else{
  	  $query = "INSERT INTO utilisateur (nom, prenon,email, pass) 
  	       	VALUES ('$nom', '$email', '$prenon','$pass')";
  	  $results = mysqli_query($db, $query);
  	  echo 'Saved!';
  	  exit();
  	}
  }
?>