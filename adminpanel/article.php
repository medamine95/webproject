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
$getarticle = $db->prepare("SELECT * FROM article Order by id desc");
$getarticle->execute();
$article = $getarticle->fetchAll();
 
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

<!-- Ajax bibliography && toster library -->
<script src="../js/ajax.js"></script>  
        <script src="../js/jquery.min.js"></script> 
    
       <!-- <script type="text/javascript" src="toastr.min.js"></script>
        <link rel="stylesheet" href="toastr.min.css">-->
   <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <style>

#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 10px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 10px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>

<!-- Search box supresser -->
<script>
    $(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "searchbox article.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
     // alert(data);
     
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
  });
  $("#search-box").on("keyup", function() {
    
    var value = $(this).val().toLowerCase();
    $("#btid tr").filter(function() {
     
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});
//select change to get click



});
//To select country name
function selectname(val) {

$("#search-box").val(val);
$("#suggesstion-box").hide();

    var value = $("#search-box").val().toLowerCase();
   
  $("#btid tr").filter(function() {
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
  });


}

</script>
    <?php
        include($_SERVER['DOCUMENT_ROOT'].'/webproject/adminpanel/searchbox article.php');
        ?>
        
<!-- Search box supresser end -->


</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>PANEL</span>
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
              <img src="dist/img/avatar5.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"> <?php echo $_SESSION['logina']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
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
          <img src="dist/img/avatar5.png" class="img-circle" alt="User Image">
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

   <!--search bar container -->
 

    <!-- Main content -->
    <section class="content container-fluid">
    
 <div class="frmSearch" >
	<input type="text" id="search-box" placeholder="Saisir le nom d'un article" size="25" />
	<div id="suggesstion-box"></div>
</div>
    <br>
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
      <tbody id="btid">
      <?php 
               $atid=0;//variable for the id of tr and approve
                 foreach ($article as $article) {  
			
       echo "<tr id=atid".$atid.">"; ?>
        <td><?php echo $article['id']; ?></td>
         <td><?php echo $article['nom']; ?></td>
         <td> <?php echo $article['description']; ?> </td>
          <td><?php echo $article['categorie']; ?></td>
         <td><?php echo $article['prix']; ?></td> 
         <td><?php echo $article['qte']; ?> </td>
         
         <td>
         <button type="button"  class="btn  btn-info " data-toggle="modal" data-target="#edit-item"  onclick="ini(<?php echo $article['id'] ?>,<?php ++$atid; echo $atid; ?>)"><i class="fa fa-check fa-1x" aria-hidden="true"   > </i> EDIT </button>
          <button type="button" class="btn  btn-danger"  onclick="ini(<?php echo $article['id'] ?>,<?php echo $atid; ?>);Ajaxrmarticle();"><i class="fa fa-trash-o fa-1x " aria-hidden="true"  ></i>DELETE </button> 
          </td>
        </tr>
			
                 <?php } ?>
                 </tbody>
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
<!-- Edit Item Modal -->
<div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Edit Item</h4>
		      </div>

		      <div class="modal-body">
		      		<form data-toggle="validator">
		      			<input type="hidden" name="id" class="edit-id">

		      			<div class="form-group">
							<label class="control-label" for="title">Title:</label>
							<input type="text" id="itt" name="title" class="form-control" data-error="Please enter title." required />
							<div class="help-block with-errors"></div>
              </div>

						<div class="form-group">
							<label class="control-label" for="description">Description:</label>
							<textarea id="sed" name="description" class="form-control" data-error="Please enter description." required></textarea>
							<div class="help-block with-errors"></div>
						</div>
            <div class="form-group">
							<label class="control-label" for="categorie">Entrez une catégorie:</label>
							<input type="text" id="tac" name="categorie" class="form-control" data-error="Please enter a category." required />
							<div class="help-block with-errors"></div>
						</div>
						<div class="form-group">
							<button type="button" onclick="Ajaxaddarticle();"  class="btn btn-success">Submit</button>
						</div>

		      		</form>

		      </div>
		    </div>
		  </div>
		</div>
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