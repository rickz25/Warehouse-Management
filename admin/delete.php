<?php

include('db.php');
include("function.php");

if(isset($_POST["user_id"]))
{
	$image = get_image_name($_POST["user_id"]);
	if($image != '')
	{
		unlink("upload/" . $image);
	}
	$statement = $connection->prepare(
		"DELETE FROM users WHERE user_id = :user_id"
	);
	$result = $statement->execute(
		array(
			':user_id'	=>	$_POST["user_id"]
		)
	);
	
	if(!empty($result))
	{
		echo 'User Deleted Successfully';
	}
}



?>