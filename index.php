<?php

include($_SERVER['DOCUMENT_ROOT'].'/webproject/registration/server.php');
//aladin


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Home</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="style.css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
</head>
<body>
<h1>HOME</h1>

<div>
  
  <?php

  if (!empty($_SESSION['sucess']) || !empty($_SESSION['login']))
{  
  echo 'Welcome '. $_SESSION['login'];
  ?>
  <a href="registration/logout.php" class="btn btn-default btn-flat">Sign out</a>
  <?php } else { ?>  <a href="registration/login.php" class="btn btn-default btn-flat">Login</a>
  <a href="registration/register.php" class="btn btn-default btn-flat">Register</a> <?php }?>
</div>
</body>
</html>



