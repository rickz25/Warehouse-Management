<?php require_once 'includes/header.php'; ?>
<?php
$db_host = 'localhost'; // Server Name
$db_user = 'root'; // Username
$db_pass = ''; // Password
$db_name = 'stock'; // Database Name

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
if (!$conn) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
}

$sql = "SELECT name, address, contact, image FROM users WHERE account_type='supplier' ";
		
		
$query = mysqli_query($conn, $sql);

if (!$query) {
	die ('SQL Error: ' . mysqli_error($conn));
}
?>

</body>
</html>
<html>
<head>
<style>
body{
	background-color:#f1f1f1;
}
</style>
 <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>

      <link rel="stylesheet" href="css/style.css">
<head>
<body>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Supplier</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Supplier</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

						
				
				
				
				
				
				 <div class="form-group pull-right">
    <input type="text" class="search form-control" placeholder="Search...">
</div>
<span class="counter pull-right"></span>
<table class="table table-hover table-bordered results" class="table" id="manageBrandTable">
  <thead>
    <tr>
	  <th>#</th>
	  <th >Image</th>
      <th class="col-md-5 col-xs-5">Name</th>
      <th class="col-md-4 col-xs-4">Address</th>
      <th class="col-md-3 col-xs-3">Contact No.</th>
    </tr>
    <tr class="warning no-result">
      <td colspan="4"><i class="fa fa-warning"></i> No result</td>
    </tr>
  </thead>
  <tbody>
    <?php
		$no 	= 1;
		while ($row = mysqli_fetch_array($query))
			
		{
	if($row["image"] != '')
	{
		$image = '<img src="../admin/upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
			echo '<tr>
					<th scope="row">'.$no.'</th>
					<td>'.$image.'</td>
					<td>'.$row['name'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['contact'].'</td>
					
				
				</tr>';
			$no++;
		}?>
  </tbody>
</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>



<?php require_once 'includes/footer.php'; ?>
