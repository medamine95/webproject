<?php
session_start();
$errors = array();
$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');


if (isset($_POST['loginabtnusr'])){

$login=$_POST['login'];
$password=$_POST['password'];

if(empty($login))
{
    array_push($errors,"Entrez votre login !");

}
if(empty($password))
{
    array_push($errors,"Entrez votre mot de passe!");

}


if(count($errors)==0){

    try {
        $records= $db->prepare('SELECT login,pwd,state FROM users WHERE login = :login');
        $records->execute(array(
            ':login' => $login
            ));
        $data = $records->fetch(PDO::FETCH_ASSOC);
        if($data == false){
            
            echo 'user '.$_POST['login'].' not found';
            
        }
        else {
            if(md5($password) == $data['pwd']) {
                $_SESSION['login'] = $_POST['login'];  
                $_SESSION['state'] = $data['state'];
                header('Location:../index.php');
                exit;
            }
            else 
                echo 'Password not match.';
        }
    }
    catch(PDOException $e) {
        $errMsg = $e->getMessage();
        echo $errMsg;
    }
 
}}


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
		<form method="post" action="login.php">
        <?php include("errors.php") ?>
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
            <div class="col-xs-12 col-md-6"><button name="loginabtnusr" type="submit" class="btn btn-success btn-block  btn-md ">S'authentifier</button></div>
                <div class="col-xs-12 col-md-6"><a href="register.php" class="btn btn-primary btn-block btn-md">S'inscrire</a></div>

			</div>
		</form>
        </center>
	</div>
</div>

</div>
    
</body>
</html>