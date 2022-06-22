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

//chech if variable exist, set, declared and not NULL.

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//set variable with post
		$username=mysqli_real_escape_string($connection,$_POST['user_id']);
		$password=mysqli_real_escape_string($connection,$_POST['user_pass']);
		
		
		//if admin login
		if($_POST['user_pass'] == "admin" && $_POST['user_pass'] == "admin"){
			$sqladmin="SELECT id FROM admin WHERE username='$username' and password='$password'";
			
			if($sqladmin){			
				$resultadmin = mysqli_query($connection, $sqladmin);
				$rowadmin=mysqli_fetch_array($resultadmin);
				$countadmin=mysqli_num_rows($resultadmin);
				
				if($countadmin==1) {
					$_SESSION['admin']=$username;
					header("location: display.php");
				}
				else 
				{
					$message = "Login Failed!, Please try again. \\nPlease login.";
					echo "<script type='text/javascript'>alert('$message');</script>";
				}
				
			}
		}
		
		//if user login 
		else {
			$sqluser="SELECT id FROM user WHERE username='$username' and password='$password'";
			
			if($sqluser) {
				$resultuser = mysqli_query($connection, $sqluser);
				$rowuser=mysqli_fetch_array($resultuser);			
				$countuser=mysqli_num_rows($resultuser);
					
				//check if user data stored or not
				$c_rows = mysqli_num_rows($resultuser);
				if ($c_rows!=$username) {
					$message = "Login Failed!, Please try again. \\nPlease login.";
					echo "<script type='text/javascript'>alert('$message');</script>";
					header("location: index.php?");
				}

				if($countuser==1) {
					$_SESSION['user']=$username;
						header("location: profile.php");
				}	
			}
			
		}
	}
		
		


?>