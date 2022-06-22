<?php

	//db connection
	$connection = mysqli_connect('localhost', 'root', 'passwordbaru123');
	if (!$connection){
		die("Database Connection Failed" . mysqli_error($connection));
	}
	$select_db = mysqli_select_db($connection, 'projectweb');
	if (!$select_db){
		die("Database Selection Failed" . mysqli_error($connection));
	}
	
	//start session
	session_start();	
		
	// assigning POST values to variables.
	$username = $_POST['username'];
	$password = $_POST['password'];
	$reenter = $_POST['reenterpwd'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	$package = $_POST['package'];
	//$package = $_POST['package'];  
	
	//check session user	
	$user_check=$_SESSION['user'];
	
	$sqluser=mysqli_query($connection,"select username,id from user where username='$user_check'");
	$row=mysqli_fetch_array($sqluser,MYSQLI_BOTH);
		
	$loggedin_session=$row['username'];
	$loggedin_id=$row['id'];
	
	$update_sql = "UPDATE user SET username = '$username', password = '$password', name = '$name', email = '$email', phone = '$phone', address = '$address', package = '$package' WHERE id = '$loggedin_id' ";	
	$result = mysqli_query($connection, $update_sql) or die(mysqli_error($connection));
	
	if($result){
		header("Location: profile.php");	
	}
	else{
		$message = "Update Failed! \\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		header("Location: profile.php");	
	}
	

?>