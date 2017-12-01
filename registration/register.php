<?php
session_start();

include('server.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery-3.2.1.min"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="valid.js"></script>
</head>
<body>
<div class="container text-center centered mycenter">

<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
        <center>
		<form action='register.php' method='post'>
            <?php include("errors.php") ?>
        <hr>
			<h2>Veuillez vous s'inscrire </h2>
			<hr>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="form-group">
                        <input type="text" name="nom" id="nom" class="form-control input-lg" placeholder="Nom" tabindex="1">
					</div>
				</div>
				<div class="col-sm-4 col-sm-offset-4">
					<div class="form-group">
						<input type="text" name="prenom" id="prenom" class="form-control input-lg" placeholder="Prénom" tabindex="2">
					</div>
				</div>
			</div>
            <div class="form-group">
				<input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email" tabindex="4">
			</div>
			<div class="form-group">
				<input type="text" name="login" id="login" class="form-control input-lg" placeholder="Login" tabindex="3">
			</div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5">
					</div>
				</div>
                <div class="col-xs-8 col-sm-9 col-md-9">
					 <p>Vous avez déjà un compte ? Veuillez vous connecter en cliquant sur "S'authentifier" </p>
				</div>
                </div>
			
			<hr>
			<div class="row">
				<div class="col-xs-12 col-md-6"><button name="register" value="S'inscrire" type="submit"  class="btn btn-primary btn-block btn-lg">S'inscrire</button>      </div>
				<div class="col-xs-12 col-md-6"><a href="login.php" class="btn btn-success btn-block btn-lg">S'authentifier</a></div>
			</div>
		</form>
        </center>
	</div>
</div>

</div>
    
</body>
</html>