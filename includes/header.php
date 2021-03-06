<?php
require_once 'php_action/db_connect.php';

session_start();

if (!isset($_SESSION['userId']) || empty($_SESSION['userId'])) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

	  <title>KMS</title>
<link rel="shortcut icon" href="warehouse.png" />

	<!-- bootstrap -->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap.min.css">
	<!-- bootstrap theme-->
	<link rel="stylesheet" href="assests/bootstrap/css/bootstrap-theme.min.css">
	<!-- font awesome -->
	<link rel="stylesheet" href="assests/font-awesome/css/font-awesome.min.css">

  <!-- custom css -->
  <link rel="stylesheet" href="custom/css/custom.css">

	<!-- DataTables -->
  <link rel="stylesheet" href="assests/plugins/datatables/jquery.dataTables.min.css">

  <!-- file input -->
  <link rel="stylesheet" href="assests/plugins/fileinput/css/fileinput.min.css">

  <!-- jquery -->
	<script src="assests/jquery/jquery.min.js"></script>
  <!-- jquery ui -->
  <link rel="stylesheet" href="assests/jquery-ui/jquery-ui.min.css">
  <script src="assests/jquery-ui/jquery-ui.min.js"></script>

  <!-- bootstrap js -->
	<script src="assests/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/style2.css">
<style>
.nav{
color:black;
width: 70%;

}
#nav{
	color: black;
background-color: #6351CE;
width: auto;

}
.nav.navbar-nav.navbar-right li a {
    color: white;
}
.navbar-nav > li > .dropdown-menu { background-color: #6351CE; }


</style>
</head>
<body>


	<nav class="navbar navbar-default navbar-static-top">
		<div class="container" id="nav">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="#">Brand</a> -->
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-right">

      	<li id="navDashboard"><a href="dashboard.php"><i class="glyphicon glyphicon-list-alt"></i> Dashboard</a></li>

        <li id="navBrand"><a href="brand.php"><i  class="glyphicon glyphicon-btc"></i> Brand</a></li>

        <li id="navCategories"><a href="categories.php"> <i i class="glyphicon glyphicon-th-list"></i> Category</a></li>

        <li id="navProduct"><a href="product.php"> <i class="glyphicon glyphicon-ruble"></i> Product </a></li>

        <li class="dropdown" id="navOrder">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-shopping-cart"></i> Delivery<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavAddOrder"><a href="orders.php?o=add"> <i class="glyphicon glyphicon-plus"></i> Add Delivery</a></li>
            <li id="topNavManageOrder"><a href="orders.php?o=manord"> <i class="glyphicon glyphicon-edit"></i> Manage Delivery</a></li>
          </ul>
        </li>

        <li id="navReport"><a href="report.php"> <i class="glyphicon glyphicon-check"></i> Report </a></li>

        <li class="dropdown" id="navSetting">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="topNavSetting"><a href="#"> <b><?php echo htmlspecialchars($_SESSION['userId']); ?></b></a></li>
            <li id="topNavLogout"><a href="logout.php" onclick="return confirm('Are you sure you want to logout?');"> <i class="glyphicon glyphicon-log-out"></i> Sign out</a></li>
          </ul>
        </li>

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
	</nav>

	<div class="container">