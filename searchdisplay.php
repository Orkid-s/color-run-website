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
	
	$admin_check=$_SESSION['admin'];
	
	$sqladmin=mysqli_query($connection,"select username,id from admin where username='$admin_check'");
	$row=mysqli_fetch_array($sqladmin,MYSQLI_BOTH);
		
	$loggedin_session=$row['username'];
	$loggedin_id=$row['id'];
		
	if(!isset($loggedin_session) || $loggedin_session==NULL) {
		echo "Go back";
		header("Location: login.php");
	}
?>

<html> 
  <head> 
    <title>Participants Data</title>
    <link rel="stylesheet" type="text/css" href="display.css">
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet">
		
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
	 
  </head>
  
  <body>
  <button class="logout" type="submit"><a href="logout.php">Logout</a></button>
	<div class="t-1">
		<p>Welcome, <?php echo $loggedin_session?>!</p>
	</div>
	
	<!--search button-->
	<div>
		<form class= "form-field" method="post" action="searchdisplay.php">
			<input name="search" type="text" placeholder="Search..." maxlength=30 size=30>			
			<button type="submit" class="src-btn">Search</a></button>
			
		</form>
	</div>
	<table border= "10px">
		<tr>
			<th>Username</th>
			<th>Password</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Package</th>
		</tr>
		
		<?php 
		$search = $_POST['search'];
		$sql="SELECT * FROM user  WHERE name LIKE '$search%'";
		$result=mysqli_query($connection,$sql) or die("Cannot execute sql.");
		
		//Creates a loop to loop through results
		while($row = mysqli_fetch_array($result)){   
			echo "<tr><td>" .$row['username']."</td><td>" .$row['password']."</td><td>" .$row['name']."</td><td> ".$row['email']."</td><td>" .$row['phone']."</td><td>" .$row['address']."</td><td>" .$row['package']."</td></tr>"  ; 
		} 
		?>
		
		</table>
		<div class="btn-dsp">			
			<button type="submit" class="mg"><a href="adminadd.php">Add</a></button>
			<button type="submit"><a href="display.php">Display All</a></button>
		</div>

  </body>

</html>
