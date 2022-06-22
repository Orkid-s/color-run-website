<html> 
	<head> 
     <title>Profile Page</title>
     <!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet">
		
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
	
	<style>
		body {
			background-image: url(gradient.jpg);
			background-position: center;
			background-repeat: no-repeat;
			background-size: 1920px 1080px;
		}
		p {
			margin-left: 34em;
			margin-top: 20em;
			font-size: 15px;
			font-family: 'Spartan', sans-serif;
			color: black
		}
	</style>
	</head>
  
	<body>
	<?php
	   session_start();
	   if(session_destroy()){
		   echo '<p>You will be redirect to login page...</p>';
		   header('Refresh: 2; URL = login.php');
	   }
	?>
		
	</body>

</html>


