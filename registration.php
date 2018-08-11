
		<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "stock";

// Create connection


$conn = mysqli_connect($localhost, $username, $password, $dbname);

if (isset($_POST['register'])){
		$username=$_POST['email'];
		$password=md5($_POST['cpassword']);
		$name=$_POST['name'];
		$account=$_POST['optradio'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];

// Check connection

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
 
echo "Connected successfully";
$sql = "INSERT INTO users(username,password,name,account_type,address,contact) VALUES('$username','$password','$name','$account','$address','$contact')";
 
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
}

?>
<?php $_SESSION['userId'] = $user_id; ?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="warehouse.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>KMS</title>

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
<style>
	.button {
    background-color: #6351CE;
    color: white;
    padding: 8px 302px;
    margin: 10px 0;
    border: none;
    cursor: pointer;
    width: 150px;
	border-radius: 4px;
	text-align: center;

}
.button:hover {
    opacity: 0.8;
}
.logo{
	width:200px;
	height: 200px;
}

	</style>
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('assets/img/background.jpg')">
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
                        	   <a href="dashboard.php"><small>Goods Warehouse Management</small></a>
                        	</h3>
                    	</div>

						<div class="wizard-navigation">
							<ul>
							   
	                            <li><a href="#account" data-toggle="tab">Account List</a></li>
								  <li><a href="#about" data-toggle="tab">registration</a></li>
	                        
	                        </ul>

						</div>

                        <div class="tab-content">
                            <div class="tab-pane" id="about">
                              <div class="row">
							  <form action="registration.php" method="post">
                                     <div class="col-sm-10 col-sm-offset-1">
                                      <div class="form-group">
                                        <label>Name * <small>(required)</small></label>
                                        <input name="name" type="text" class="form-control" placeholder="First last...">
                                      </div>

                                      <div class="form-group">
                                          <label>Email * <small>(required)</small></label>
                                          <input name="email" type="email" class="form-control" placeholder="kmswarehouse@gmail.com">
                                      </div>
									   <div class="form-group">
                                        <label>Password * <small>(required)</small></label>
                                        <input  name="npassword" type="password" class="form-control" placeholder="password">
                                      </div>
									   <div class="form-group">
                                        <label>Confirm Password * <small>(required)</small></label>
                                        <input  name="cpassword" type="password" class="form-control" placeholder="confirm password">
                                      </div>
									  
									     <div class="form-group">
										  <label><b>Account type :</b></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<label><input type="radio" name="optradio" value="manager"> Manager</label>&nbsp;&nbsp;&nbsp;
								
								<label><input type="radio" name="optradio" value="dispatcher"> Dispatcher</label>
								
								</div>
								
								<div class="form-group">
                                        <label>Address * <small>(required)</small></label>
                                        <input name="address" type="text" class="form-control" placeholder="address">
                                      </div>
									  <div class="form-group">
                                        <label>Contact * <small>(required)</small></label>
                                        <input name="contact" type="number" class="form-control" placeholder="contact">
                                      </div>
									  <div class="form-group">
                                          <input type='submit' class="button" name='register' value='REGISTER' />
                                      </div>
						         </form>
								
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
