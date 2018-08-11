<?php require_once 'includes/header.php'; ?>

<?php 

$sql = "SELECT * FROM product WHERE status = 1";
$query = $connect->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders WHERE order_status = 1";
$orderQuery = $connect->query($orderSql);
$countOrder = $orderQuery->num_rows;

$totalRevenue = "";
while ($orderResult = $orderQuery->fetch_assoc()) {
	$totalRevenue += $orderResult['paid'];
}

$lowStockSql = "SELECT * FROM product WHERE quantity <= 3 AND status = 1";
$lowStockQuery = $connect->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

$connect->close();

?>
<html>
<head>

<style type="text/css">
	.ui-datepicker-calendar {
		display: none;
	}
	body{
	background-color:#f1f1f1;
}

			#chart-container {
				width: 640px;
				height: auto;
			}
		</style>
</head>
<body>

<!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">

<div class="card">
		  <div class="cardHeader">
		    <h1>KMS General Merchandise</h1>
		  </div>
		  <br>
		  <br>
		  <br>

		  <div class="cardContainer">
		  
		  </div>
<div class="row">
	
	<div class="col-md-4">
	
		<div class="panel panel-success">
		<a href="product.php"><img src="img/product.png" style="height: 40px; width: 40px;" /></a>
			<div class="panel-heading">
				
				<a href="product.php" style="text-decoration:none;color:black;">
					Total Product
					<span class="badge pull pull-right"><?php echo $countProduct; ?></span>	
				</a>
				
			</div> <!--/panel-hdeaing-->
		
		</div> <!--/panel-->
	</div> <!--/col-md-4-->

		<div class="col-md-4">
		
			<div class="panel panel-danger">
			<img src="img/date.png" style="height: 40px; width: 40px;" />
			<div class="panel-heading">
				<p style="text-decoration:none;color:black;">
					<?php echo date('l') .' '.date('d').', '.date('Y'); ?>
				</p>
					
			</div> <!--/panel-hdeaing-->
			

		</div> <!--/panel-->
		</div> <!--/col-md-4-->


		
		<br/>
	     <br/>
		<br/>
	</div> <!--/col-md-4-->

	<div class="col-md-4">
	<div id="chart-container">
			<canvas id="mycanvas"></canvas>
		</div>

	</div>

	<br/>
	     <br/>
		<br/>
	
</div> <!--/row-->

<!-- fullCalendar 2.2.5 -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="newjs/jquery.min.js"></script>
		<script type="text/javascript" src="js/Chart.min.js"></script>
	

		
		
		
<script type="text/javascript">

	$(function () {
			// top bar active
	$('#navDashboard').addClass('active');

      //Date for the calendar events (dummy data)
      var date = new Date();
      var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();

      $('#calendar').fullCalendar({
        header: {
          left: '',
          center: 'title'
        },
        buttonText: {
          today: 'today',
          month: 'month'          
        }        
      });


    });
</script>


<?php require_once 'includes/footer.php'; ?>

