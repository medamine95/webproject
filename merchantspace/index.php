<?php
include($_SERVER['DOCUMENT_ROOT'].'/webproject/registration/server.php');


$getarticle = $db->prepare("SELECT * FROM article");
$getarticle->execute();
$article = $getarticle->fetchAll();
 
?>
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Page d'accueil </title>
    <link rel="shortcut icon" type="image/x-icon" href="../img/shopping-cart.ico" />
    <link href="../css/custom.css" rel="stylesheet">
    <!-- toaster -->
    <link href="../css/toastr.min.css" rel="stylesheet">
     <script src="../js/toastr.min.js"> </script>
     <script src="../js/bootstrap.min.js"></script>
      <script src="../js/jquery-3.2.1.min"></script>
      <link href="style.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../css/shop-homepage.css" rel="stylesheet">
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
      
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        
          <ul class="navbar-nav ml-auto">
          <a class="navbar-brand supressed" href="#"> <?php

  if (!empty($_SESSION['sucess']) || !empty($_SESSION['login']))
{  
  echo 'Welcome <strong>'. $_SESSION['login'].'</strong> -'.$_SESSION['state'].'-';
  ?> <a href="../registration/logout.php" class="btn btn-default btn-flat btn-danger">Sign out</a>
  <?php } else { ?>  <a href="registration/login.php" class="btn btn-default btn-flat btn-primary btn-space ">Login</a>
  <a href="registration/register.php" class="btn btn-default btn-flat btn-success btn-space">Register</a> <?php }?> </a>
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
          <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-outline-success my-1 my-sm-0 " type="submit">Search</button>
  </form>
         
        </div>
      </div>
    </nav>
      <!-- Page Content -->
    <div class="container">
             <h1 class="my-4">Atricles Disponibles</h1>
               <!-- /.col-lg-3 -->
        <div class="col-lg-12">
         <div class="row">
          <?php foreach($article as $article){ ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-150">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body card-block">
                  <h4 class="card-title">
                    <a href="#"><?php echo $article['nom'];?></a> <button type="button" class="btn spacing  btn-primary btn-md" data-toggle="modal" data-target="#create-item"> Ajouter Prix/Qte <i class="fa fa-plus" aria-hidden="true"></i></button>
                  </h4>
                  <h5>$Price</h5>
                  <p class="card-text"><?php echo $article['description'];?></p>
                </div>
                <div class="card-footer">
                  <small class="text-muted"><?php echo $article['categorie'];?></small>
                </div>
              </div>
            </div>
          <?php } ?>
          </div>
          <!-- /.row -->
           </div>
        <!-- /.col-lg-9 -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
     <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Ajout Prix/qte</h4>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        
		      </div>
		      <div class="modal-body">
		      		<form data-toggle="validator" >
		      			<div class="form-group">
							<label class="control-label" for="title">Nom:</label>
							<input type="text" id="tit" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="description">Description:</label>
							<textarea  id="des" name="description" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
            <div class="form-group">
							<label class="control-label" for="categorie">Entrez une catégorie:</label>
							<input type="text" id="cat" name="categorie" class="form-control" data-error="Please enter a category." required />
							<div class="help-block with-errors"></div>
						</div>
          		<div class="form-group">
							<button type="button" class="btn btn-success" onclick="Ajaxarticle();">Submit</button></div>
		      		</form>
		      </div>
		    </div>

		  </div>
		</div>
          <!-- end  Create Item Modal -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
  </body>

</html>

