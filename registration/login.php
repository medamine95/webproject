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
		<form method="post" action="login.php">
        <hr>
			<h2>S'authentifier</h2>
			<hr>
			<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group">
				<input type="text" name="login" id="login" class="form-control input-lg" placeholder="Login" tabindex="3">
            </div>
            </div>
            </div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="password" id="password" class="form-control input-lg" placeholder="Mot de passe" tabindex="5">
					</div>
				</div>
                <div class="col-xs-8 col-sm-9 col-md-9">
                <p>Vous n'avez pas encore de compte  ? Créez-en un en cliquant sur "S'inscrire" </p>
           </div>
				</div>
                </div>
			
            <hr>
</div>
            
			<div class="row">
                <div class="col-xs-12 col-md-6"><a href="#" class="btn btn-success btn-block  btn-md ">S'authentifier</a></div>
                <div class="col-xs-12 col-md-6"><a href="register.php" class="btn btn-primary btn-block btn-md">S'inscrire</a></div>

			</div>
		</form>
        </center>
	</div>
</div>

</div>
    
</body>
</html>