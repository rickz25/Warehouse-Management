<?php

session_start();

require_once '../php_action/db_connect.php';

// echo $_SESSION['userId'];

if (!$_SESSION['userId']) {
    header('location: ../login.php');
}

?>
<html>
	<head>
		<title>KMS Merchandise</title>
		<link rel="icon" type="image/png" href="../warehouse.png">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./css/style1.css">
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
		 <script type="text/javascript">
        var specialKeys = new Array();
        specialKeys.push(8); //Backspace
        specialKeys.push(9); //Tab
        specialKeys.push(46); //Delete
        specialKeys.push(36); //Home
        specialKeys.push(35); //End
        specialKeys.push(37); //Left
        specialKeys.push(39); //Right
        function IsAlphaNumeric(e) {
            var keyCode = e.keyCode == 0 ? e.charCode : e.keyCode;
            var ret = ((keyCode > 31 && keyCode < 33) || (keyCode >= 65 && keyCode <= 90) || (keyCode >= 97 && keyCode <= 122) || (specialKeys.indexOf(e.keyCode) != -1 && e.charCode != e.keyCode));
            document.getElementById("error").style.display = ret ? "none" : "inline";
            return ret;
        }
    </script>
	<script>
document.onkeydown = function(e) {
        if (e.ctrlKey &&
            (e.keyCode === 67 ||
             e.keyCode === 86 ||
             e.keyCode === 85 ||
             e.keyCode === 117)) {
            return false;
        } else {
            return true;
        }
};
$(document).keypress("u",function(e) {
  if(e.ctrlKey)
  {
return false;
}
else
{
return true;
}
});
</script>
<script>
$(document).keydown(function(event){
    if(event.keyCode==123){
        return false;
    }
    else if (event.ctrlKey && event.shiftKey && event.keyCode==73){
             return false;
    }
});

$(document).on("contextmenu",function(e){
   e.preventDefault();
});

</script>
<script>
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

	</script>
	</script>

<script type="text/javascript">
function validate(form) {

  var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/;
  if (!re.test(form.username.value)) {
    alert('Please enter the valid email');
    return false;
  }
   var re = /^[0-9]+$/;
   if (!re.test(form.contact.value)) {
    alert('Please enter only letters from a to z');
    return false;
  }

  if (!re.test(form.contact.value)) {
    alert('Please enter only numbers from 0 to 9');
    return false;
  }
}
</script>

	</head>
	<body>
	 <header style="background-color:#6351CE;">
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">KMS</span> Warehouse Management.</h1>
        </div>
        <nav>
          <ul>
            <li><a href="../dashboard.php">Home</a></li>
            <li><a href="#" id="add_button" data-toggle="modal" data-target="#userModal" >Add User</a></li>

			 <li><a href="../logout.php" onclick="return confirm('Are you sure you want to logout?');">Sign out</a><p> </li>
			 <li><?php echo htmlspecialchars($_SESSION['userId']); ?></p>	</li>

          </ul>
        </nav>
      </div>
    </header>

		<div class="container box">

			<br />
			<div class="table-responsive">

				<center><h1>User Information</h1></center>
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">Image</th>
							<th width="15%">Name</th>
							<th width="15%">Email</th>
							<th width="15%">Account Type</th>
						    <th width="15%">Address</th>
							<th width="15%">Contact</th>

							<th width="10%">Edit</th>
							<th width="10%">Delete</th>
						</tr>
					</thead>
				</table>

			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data" onsubmit="return validate(this);">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">
					<label>Enter Name</label>
					<input type="text" name="name" id="name" class="form-control" id="text1" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;"
        onpaste="return false;" /><span id="error" style="color: Red; display: none">* Special Characters and Numbers not allowed</span>
					<br />
					<label>Email</label>.
					<input type="email" name="username" id="username" class="form-control" maxlength="50" />
					<br />
					<label>Password</label>
					<input type="text" name="password" id="password" class="form-control" maxlength="20" />
					<br />
					<label>Address</label>
					<input type="text" name="address" id="address" class="form-control"maxlength="200" />
					<br />
					<label>Contact</label>
					<input type="text" onkeypress="return isNumber(event)" name="contact" id="contact" class="form-control" maxlength="11" />
					<br />

					<label>Account type :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="radio" style="width: 20px; height: 20px; color: blue; " name="account_type" id="account_type" value="manager" required> Manager &nbsp;&nbsp;&nbsp;
					<input type="radio" style="width: 20px; height: 20px; color: blue;" name="account_type" id="account_type" value="dispatcher" required> Dispatcher &nbsp;&nbsp;&nbsp;
					<input type="radio" style="width: 20px; height: 20px; color: blue;" name="account_type" id="account_type" value="supplier" required> Supplier &nbsp;&nbsp;&nbsp;
					<br /><br />
					<label>Select User Image</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Add User");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});

	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var name = $('#name').val();
		var username = $('#username').val();
			var password = $('#password').val();

			var address = $('#address').val();
		var contact = $('#contact').val();
		var account_type = $('#account_type').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}
		if(name != '' && username != '' && address != '' && contact != '' && account_type != '')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});

	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("user_id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#name').val(data.name);
				$('#username').val(data.username);
				$('#password').val(data.password);
				$('#address').val(data.address);
				$('#contact').val(data.contact);
				$('#account_type').val(data.account_type);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});

	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("user_id");
		if(confirm("Are you sure you want to delete this?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;
		}
	});


});
</script>