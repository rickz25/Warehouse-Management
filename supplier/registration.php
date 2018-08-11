

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="warehouse.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>KMS Warehouse</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
		<!-- DataTables -->

</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets/img/stock.jpg')">
    <!--   Creative Tim Branding   -->
    

	<!--  Made With Get Shit Done Kit  -->

    <!--   Big container   -->
    <div class="container">
        <div class="row">
        <div class="col-sm-8 col-sm-offset-2">

            <!--      Wizard container        -->
            <div class="wizard-container">

                <div class="card wizard-card" data-color="orange" id="wizardProfile">
                    <form action="" method="">
                <!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->

                    	<div class="wizard-header">
                        	<h3>
                        	   <b>KMS</b> General Merchandise <br>
                        	   <small>Goods Warehouse Management</small>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
							    <li><a href="#address" data-toggle="tab">Report</a></li>
	                            <li><a href="#account" data-toggle="tab">Account List</a></li>
								  <li><a href="#about" data-toggle="tab">registration</a></li>
	                        
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
							  <form>
                                     <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>First Name * <small>(required)</small></label>
                                        <input name="firstname" type="text" class="form-control" placeholder="Firstname...">
                                      </div>
                                      <div class="form-group">
                                        <label>Last Name * <small>(required)</small></label>
                                        <input name="lastname" type="text" class="form-control" placeholder="Lastname...">
                                      </div>							  
                                 
                              
                                      <div class="form-group">
                                          <label>Email * <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="kmswarehouse@gmail.com">
                                      </div>
									   <div class="form-group">
                                        <label>Password * <small>(required)</small></label>
                                        <input name="pass" type="password" class="form-control" placeholder="password...">
                                      </div>
									   <div class="form-group">
                                        <label>Confirm Password * <small>(required)</small></label>
                                        <input name="con" type="password" class="form-control" placeholder="confirm password...">
                                      </div>
									  
									     <div class="form-group">
										  <label>Account type :</label>
								<label><input type="radio" name="optradio"> Manager</label>&nbsp;&nbsp;&nbsp;
								
								<label><input type="radio" name="optradio"> Despatcher</label>&nbsp;&nbsp;&nbsp;
								
								<label><input type="radio" name="optradio"> Delivery</label>
								</div>
								
								<div class="form-group">
                                        <label>Address * <small>(required)</small></label>
                                        <input name="con" type="text" class="form-control" placeholder="address...">
                                      </div>
						         </form>
								 <?php
		if (isset($_POST['register'])){
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		
		mysql_query("insert into user (username,password) values('$username','$password')")or die(mysql_error());
		header('location:index.php');
		}
		?>
                                  </div>
                              </div>
							  <div class="wizard-footer height-wizard">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Next' />

                            </div>

                            <div class="pull-left">
                               
                            </div>
                            <div class="clearfix"></div>
                        </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <h4 class="info-text"> account list </h4>
                                <div class="row">
                               
							   
							   
							   
							   <?php
mysql_select_db('stock',mysql_connect('localhost','root',''))or die(mysql_error());

?>
							   <table class="table table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Account_type</th>
				<th>Address</th>
				<th>Contact</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$query=mysql_query("select * from users")or die(mysql_error());
			while($row=mysql_fetch_array($query)){
			?>
			<tr>
				<td style="color:blue; font-weight:bold;"><?php echo $row['name']; ?></td>
				<td><?php echo $row['account_type']; ?></td>
				<td><?php echo $row['address']; ?></td>
				<td><?php echo $row['contact']; ?></td>
			</tr>
			<?php } ?>
		</tbody>
		</table>
							   
							   
							   
							   
							   
							   
							   
							   
							   
							   
                                </div>
                            </div>
                            <div class="tab-pane" id="address">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h4 class="info-text"> Report </h4>
                                    </div>
									
                                    

			<!-- /panel-heading -->
			
				
				<form class="form-horizontal" action="php_action/getOrderReport.php" method="post" id="getOrderReportForm">
				  <div class="form-group">
				    <label for="startDate" class="col-sm-2 control-label">Start Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="startDate" name="startDate" placeholder="Start Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="endDate" class="col-sm-2 control-label">End Date</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="endDate" name="endDate" placeholder="End Date" />
				    </div>
				  </div>
				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" id="generateReportBtn"> <i class="glyphicon glyphicon-ok-sign"></i> Get Report</button>
				    </div>
				  </div>
				</form>


<script src="custom/js/report.js"></script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                    </form>
                </div>
            </div> <!-- wizard container -->
        </div>
        </div><!-- end row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container">
             
        </div>
    </div>

</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

</html>
