<?php

session_start();

//db connection
$connection = mysqli_connect('localhost', 'root', 'passwordbaru123');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'projectweb');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

// assigning POST values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
$reenter = $_POST['reenterpwd'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$package = $_POST['package'];   

//check admin session
$admin_check=$_SESSION['admin'];
	
$sqladmin=mysqli_query($connection,"select username,id from admin where username='$admin_check'");
$row=mysqli_fetch_array($sqladmin,MYSQLI_BOTH);
		
$loggedin_session=$row['username'];
$loggedin_id=$row['id'];
		
if(!isset($loggedin_session) || $loggedin_session==NULL) {
	echo "Go back";
	header("Location: display.php");


//check if user exist or not, prevent duplicate data
$sql_check = "SELECT * from user WHERE username = '$username' and password = '$password'";
$result = mysqli_query($connection, $sql_check) or die(mysqli_error($connection));

$row_check = mysqli_num_rows($result);
if($row_check) {
	$message = "Add Participant Failed!, Username exists. \\nPlease try again.";
	echo "<script type='text/javascript'>alert('$message');</script>";
			
}
else if ($_POST['password'] != $_POST['reenterpwd']) {
	$message = "Re-enter password is not same!";
	echo "<script type='text/javascript'>alert('$message');</script>";
	
}
}
//if not exist, then insert data
else {
	$query ="INSERT INTO user VALUES(null, '$username', '$password', '$name', '$email', '$phone', '$address', '$package')";
	$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
	
	if($result){
		header("Location: display.php");	
	}
	else{
		$message = "Registration Failed! \\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
		
?>