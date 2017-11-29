<?php
session_start();
session_destroy();
$path=$_SERVER['DOCUMENT_ROOT'];
echo "<hr><center><h2>Logged out you gonna be redireicted to the main page in 3 seconds ..</h2> </center>";
header("refresh:3;url=../index.php");


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
        <form>
        <center>
        <div class="col-xs-12 col-md-6"><a href="../index.php" class="btn btn-success btn-block btn-md">Retour vers la page d'accueil</a></div>
        </center>
		</form>
      
	</div>
</div>

</div>
    
</body>
</html>