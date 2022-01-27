
<?php

require("../config/user.php");
session_start();
error_reporting(0);
if(strlen($_SESSION['username'])==0)
	{	
header('location:../client/login.php');
}


?>

<!DOCTYPE html>
<html>
<head>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
 
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <title></title>
</head>
<body>

<div class="album py-5 bg-light">
  <div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        
<form method="post">
<div class="mb-3">

 <div class="mb-3">
  <label for="exampleInputPassword1" class="form-label">Id</label>

  <input type="number" class="form-control" min="1" name="idutilisateur" required>
</div>

<button type="submit" name="valider" class="btn btn-primary">Supprimer</button>
</form>
</div>
</div></div>

</body>
</html>

<?php

if(isset($_POST['valider']))
{
  if(isset($_POST['idutilisateur']))
  {
  if(!empty($_POST['idutilisateur']) AND is_numeric($_POST['idutilisateur']))
      {
          $idutilisateur = htmlspecialchars(strip_tags($_POST['idutilisateur']));

        try 
        {
          supprimer($idutilisateur);
        } 
        catch (Exception $e) 
        {
            $e->getMessage();
        }
          


      }
  }
}

?>