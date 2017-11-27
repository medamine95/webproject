<?php
try{
  session_start();
  //control de panel admin avec login obligatoire (pas de session pas d'accés)
  if (empty($_SESSION["logina"]))
  {
    header("location:../index.php");
    exit;
  }
    
  }
  catch(Exception $e){
      echo "Session expired. " . $e->getMessage();
  }
  

$db = new PDO('mysql:host=localhost;dbname=registartion;charset=utf8','root','');
$getarticle = $db->prepare("SELECT * FROM article");
$getarticle->execute();
$article = $getarticle->fetchAll();
  //  echo $user['nom'] . $user['prenom']. '<br />';


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminPanel </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
        
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"> <?php echo $_SESSION['logina']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                <p>
                  Admin
                  <small>Member since Nov. 2017</small>
                </p>
              </li>
                 <!-- Menu Footer-->
              <li class="user-footer">
          
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['logina']; ?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="index.php"><i class="fa fa-link"></i> <span>Users</span></a></li>
        <li class="active"><a href="article.php"><i class="fa fa-link"></i> <span>Article</span></a></li>
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Articles
        <small>Articles Table</small>
      </h1>
     
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
    <button type="button" class="btn  btn-primary btn-lg" data-toggle="modal" data-target="#create-item"> Ajouter Un Article <i class="fa fa-plus" aria-hidden="true"></i></button>
    <hr>
    <div class="box-body table-responsive no-padding"> 
    <table border="2px" class="table table-striped ">
			<thead>
			    <tr>
        <th>Id</th>  
				<th>Nom</th>
				<th>Description</th>
				<th>Catégorie</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Action</th>
			    </tr>
			</thead>
      <?php 
               
                 foreach ($article as $article) {   ?>
			<tbody>
        <tr>
        <td><?php echo $article['id']; ?></td>
         <td><?php echo $article['nom']; ?></td>
         <td> <?php echo $article['description']; ?> </td>
          <td><?php echo $article['categorie']; ?></td>
         <td><?php echo $article['prix']; ?></td> 
         <td><?php echo $article['qte']; ?> </td>
         <td> EDIT / DELETE </td>
          
        </tr>
			</tbody>
                 <?php } ?>
    </table>
     </div>
      <!-- Create Item Modal -->
		<div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Ajouter Un Article</h4>
		      </div>
		      <div class="modal-body">
		      		<form data-toggle="validator" action="../database/CRUD/addarticle.php" method="POST">
		      			<div class="form-group">
							<label class="control-label" for="title">Nom:</label>
							<input type="text" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
						</div>

						<div class="form-group">
							<label class="control-label" for="title">Description:</label>
							<textarea name="description" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
            <div class="form-group">
							<label class="control-label" for="title">Entrez une catégorie:</label>
							<input type="text" name="categorie" class="form-control" data-error="Please enter a category." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn crud-submit btn-success">Submit</button>
						</div>
		      		</form>
		      </div>
		    </div>

		  </div>
		</div>
          <!-- end  Create Item Modal -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="#">LFSI3B</a>.</strong> All rights reserved.
  </footer>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>