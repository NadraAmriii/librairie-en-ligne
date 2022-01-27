<?php

  require("..\config\user.php");
  require("config.php");


?>
<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
<style>
body {
    background:green;
}
#login {
	-webkit-perspective: 1000px;
	-moz-perspective: 1000px;
	perspective: 1000px;
	margin-top:50px;
	margin-left:30%;
}
.login {
	font-family: 'Josefin Sans', sans-serif;
	-webkit-transition: .3s;
	-moz-transition: .3s;
	transition: .3s;
	-webkit-transform: rotateY(40deg);
	-moz-transform: rotateY(40deg);
	transform: rotateY(40deg);
}
.login:hover {
	-webkit-transform: rotate(0);
	-moz-transform: rotate(0);
	transform: rotate(0);
}
.login article {
	
}
.login .form-group {
	margin-bottom:17px;
}
.login .form-control,
.login .btn {
	border-radius:0;
}
.login .btn {
	text-transform:uppercase;
	letter-spacing:3px;
}
.input-group-addon {
	border-radius:0;
	color:#fff;
	background:#f3aa0c;
	border:#f3aa0c;
}
.forgot {
	font-size:16px;
}
.forgot a {
	color:#333;
}
.forgot a:hover {
	color:#5cb85c;
}

#inner-wrapper, #contact-us .contact-form, #contact-us .our-address {
    color: #1d1d1d;
    font-size: 19px;
    line-height: 1.7em;
    font-weight: 300;
    padding: 50px;
    background: #fff;
    box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
    margin-bottom: 100px;
}
.input-group-addon {
    border-radius: 0;
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
    color: #fff;
    background: #f3aa0c;
    border: #f3aa0c;
        border-right-color: rgb(243, 170, 12);
        border-right-style: none;
        border-right-width: medium;
}
</style>
</head>
<body>


	<div class="col-md-4 col-md-offset-4" id="login">
	<section id="inner-wrapper" class="login">
	
		<article>
			<form method="POST">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"> </i></span>
						<input type="text" class="form-control" placeholder="nom" name="vnom">
					</div>
					</div>
					<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-user"> </i></span>
						<input type="text" class="form-control" placeholder="prenon" name="vprenon">
					</div>
				</div>
				
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
						<input type="email" class="form-control" placeholder="Email" name="vemail">
					</div>
				</div>
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-key"> </i></span>
						<input type="password" class="form-control" placeholder="Password" name="vpass">
					</div>
				</div>
				
					<button type="submit" name="valider" class="btn btn-success btn-block">Submit</button>
			</form>
		</article>
	</section></div>
	<?php
if (isset($_POST["valider"])) {

  $nom = trim($_POST["vnom"]);
  $prenon = trim($_POST["vprenon"]);

  $pass = trim($_POST["vpass"]);
  $email = trim($_POST["vemail"]);
  $sql = "SELECT COUNT(*) AS count from utilisateur where email = :v_email";
  try {
    $stmt = $DB->prepare($sql);
    $stmt->bindValue(":v_email", $email);
    $stmt->execute();
    $result = $stmt->fetchAll();

    if ($result[0]["count"] > 0) {
      $msg = "Email already exist";
	  echo ' <div class="alert alert-warning" style="width: 30%;position: absolute;top: 0;right: 0;left: 0;margin: 10px 10px 10px 20px;">Email already exist </strong></div>';
      $msgType = "warning";
    } else {
      $sql = "INSERT INTO `utilisateur` (`nom`,`prenon`, `email`, `pass`) VALUES "
	   . "( :vname,:vprenon,:vemail,:vpass)";
      $stmt = $DB->prepare($sql);
      $stmt->bindValue(":vname", $nom);
	  $stmt->bindValue(":vprenon", $prenon);
      $stmt->bindValue(":vpass", md5($pass));
      $stmt->bindValue(":vemail", $email);
      $stmt->execute();
      $result = $stmt->rowCount();

      if ($result > 0) {

        $lastID =  $DB->lastInsertId();
        $msg = "User registered successfully";
        $msgType = "success";
		echo ' <div class="alert alert-success" style="width: 30%;position: absolute;top: 0;right: 0;left: 0;margin: 10px 10px 10px 20px;">User registered successfully </strong></div>';

      } else {
        $msg = "Failed to create User";
        $msgType = "warning";
		echo ' <div class="alert alert-danger" style="width: 30%;position: absolute;top: 0;right: 0;left: 0;margin: 10px 10px 10px 20px;">Failed to create User </strong></div>';
      }
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }
}

?>
</body>
</html>