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
	
	$user_check=$_SESSION['user'];
	
	$sqluser=mysqli_query($connection,"select username,id from user where username='$user_check'");
	$row=mysqli_fetch_array($sqluser,MYSQLI_BOTH);
		
	$loggedin_session=$row['username'];
	$loggedin_id=$row['id'];
		
	if(!isset($loggedin_session) || $loggedin_session==NULL) {
		echo "Go back";
		header("Location: login.php");
	}
?>

<html> 
	<head> 
		<title>Profile Page</title>
		
		<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<meta charset="utf-8">
			
		<!-- External CSS -->
		<link rel = "stylesheet" type = "text/css" href = "profilestyles.css"/>
		
	   
		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet"> 
		
	</head>
	  
	<body>
		<?php
			$sql= "SELECT * FROM user where id = $loggedin_id";
			$result=mysqli_query($connection,$sql);	
		?>
		
		<?php 
			while($row = mysqli_fetch_array($result)){
		?>
		
		<button class="logout" type="submit"><a href="logout.php">Logout</a></button>	
		<div class="t-1">
			<p>Welcome, <?php echo $loggedin_session?>!</p>
			
		</div>
		
		<hr>
		<div class="box-form">
			<div class="m-t">
				Profile 
			</div>
			<hr>
			<div class="t-2">
				Username :
				<?php echo $row['username'] ?>
			</div>
			<div class="t-2">
				Password : 
				<?php echo preg_replace("|.|","*",$row['password']) ?>
			</div>
			<div class="t-2">
				Name :
				<?php echo $row['name'] ?>
			</div>
			<div class="t-2">
				Email :
				<?php echo $row['email'] ?>
			</div>
			<div class="t-2">
				Phone Number :
				<?php echo $row['phone'] ?>
			</div>
			<div class="t-2">
				Address :
				<?php echo $row['address'] ?>
			</div>
			<div class="t-2">
				Package :
				<?php echo $row['package'] ?>
			</div>
			
			<!--edit and save button-->
			<div class="btn">	
				<button type="submit"><a href="userupdate.php">Edit</a></button>
			</div>
		</div>	
		<?php 
			//close while-loop
			}  
		?>
	</body>

</html>