<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<html>
<head>
<style>
body{
	background-color:#f1f1f1;
}
</style>
<head>
<body>
<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb" >
		  <li ><a href="dashboard.php">Home</a></li>		  
		  <li class="active" >Product</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

						
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>							
							<th>Product Name</th>
							<th>Price</th>							
							<th>Quantity</th>
							<th>Brand</th>
							<th>Category</th>
							<th>Status</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->

<!-- /add categories -->



<!-- /categories brand -->

<!-- categories brand -->



<script src="custom/js/product.js"></script>

<?php require_once 'includes/footer.php'; ?>

