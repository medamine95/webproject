<?php
include($_SERVER['DOCUMENT_ROOT'].'/webproject/registration/server.php');
include($_SERVER['DOCUMENT_ROOT'].'/webproject/searchar.php');



$getarticle = $db->prepare("SELECT * FROM article");
$getarticle->execute();
$article = $getarticle->fetchAll();
 
?>   

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Page d'accueil </title>
    <!-- add to cart -->
    <link rel="stylesheet" href="css/reset.css"> 
	<link rel="stylesheet" href="css/style.css"> 
  	
    <link rel="shortcut icon" type="image/x-icon" href="img/shopping-cart.ico" />
    <link href="css/custom.css" rel="stylesheet">
    <!-- toaster -->
    <link href="css/toastr.min.css" rel="stylesheet">
     <script src="js/toastr.min.js"> </script>
     <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <style>
  
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>
<script>

$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "searchar.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(img/LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});
//To select country name
function selectname(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


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
          <a class="navbar-brand supressed" href="#"> 
 
  
    <a href="registration/login.php" class="btn btn-default btn-flat btn-primary btn-space ">Login</a>
  <a href="registration/register.php" class="btn btn-default btn-flat btn-success btn-space">Register</a> </a>
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
         

          <div class="frmSearch">
          <input type="text" id="search-box" placeholder="Article Search" />
          <div id="suggesstion-box"></div>
        </div>
              <button class="btn btn-outline-success my-1 my-sm-0 " type="submit">Search</button>


  </form>
         
        </div>
      </div>
    </nav>

   
      <!-- Page Content -->
    <div class="container">
             <h1 class="my-4">Shop Name</h1>
       
        <!-- /.col-lg-3 -->

        <div class="col-lg-12">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src="img/slide1.png" alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/slide2.png" alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="img/slide3.png" alt="Third slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

          <div class="row">
          <?php foreach($article as $article){ ?>

            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card h-150">
                <a href="#"><img class="card-img-top" src="http://placehold.it/700x400" alt=""></a>
                <div class="card-body card-block">
                  <h4 class="card-title">
                    <a href="#"><?php echo $article['nom'];?></a>
                  </h4>
                  <h5>$24.99</h5>
                  <a href="#0" class="cd-add-to-cart" data-price="24.99">Add To Cart</a>
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
    <div class="cd-cart-container empty">
	<a href="#0" class="cd-cart-trigger">
		Cart
		<ul class="count"> <!-- cart items count -->
			<li>0</li>
			<li>0</li>
		</ul> <!-- .count -->
	</a>
 
	<div class="cd-cart">
		<div class="wrapper">
			<header>
				<h2>Cart</h2>
				<span class="undo">Item removed. <a href="#0">Undo</a></span>
			</header>
			
			<div class="body">
				<ul>
					<!-- products added to the cart will be inserted here using JavaScript -->
				</ul>
			</div>
 
			<footer>
				<a href="#0" class="checkout btn"><em>Checkout - $<span>0</span></em></a>
			</footer>
		</div>
	</div> <!-- .cd-cart -->
</div> <!-- cd-cart-container -->
    <!-- /.container -->
    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/cart.js"></script>

  </body>

</html>

