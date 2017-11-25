<?php

include($_SERVER['DOCUMENT_ROOT'].'/webproject/registration/server.php');

if (isset($_POST['loginabtn'])){

$logina=$_POST['logina'];
$passworda=md5($_POST['passworda']);

if(empty($logina))
{
    array_push($errors,"Entrez votre login d'admin !");

}
if(empty($passworda))
{
    array_push($errors,"Entrez votre mot de passe d'admin!");

}

if(count($errors)==0){
    $records = $db->prepare('SELECT login,pwd FROM  admin WHERE login =? and pwd=?');
    $records->execute(array($logina,$passworda));
    $results = $records->fetch(PDO::FETCH_ASSOC);
    if(count($results) > 0 && $passworda==$results['pwd']){
        $_SESSION['logina'] = $results['login'];
        header('location:index.php');
        exit;
    }else{
       echo 'Username and Password are not found<br>';
    }


}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
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
        <?php include($_SERVER['DOCUMENT_ROOT'].'/webproject/registration/errors.php') ?>
        <hr>
			<h2>S'authentifier</h2>
			<hr>
			<div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
				<div class="form-group">
				<input type="text" name="logina" id="login" class="form-control input-lg" placeholder="Login admin " tabindex="3">
            </div>
            </div>
            </div>
			
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6">
					<div class="form-group">
						<input type="password" name="passworda" id="password" class="form-control input-lg" placeholder="Mot de passe d'admin" tabindex="5">
					</div>
				</div>
                <div class="col-xs-8 col-sm-9 col-md-9">
           </div>
				</div>
                </div>
			
            <hr>
</div>
            
			<div class="row">
                <div class="col-xs-12 col-md-6"><button name="loginabtn" type="submit" class="btn btn-success btn-block  btn-md ">S'authentifier</button></div>
               

		</form>
        </center>
	</div>
</div>

</div>
    
</body>
</html>