<!DOCTYPE html >
<html>
<head>
	<title>Login page</title>
	<link rel="stylesheet" type="text/css" href="login.css">
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet">
		
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
		
</head>
<body>
	<form id="login-form" method="post" action="authen_login.php" >
		
		<div class= "field-box">
		
			<div class="signin-title">
				<p class="signin-title">Sign In</p>
			</div>
		
			<!--username-->
			<div class= "form-field username">				
				<input name=user_id type=text placeholder="Username" maxlength=30 size=30 required>				
			</div>
			
			
			<!--pwd-->
			<div class= "form-field pwd">				
				<input name=user_pass type=password placeholder="Password" minlength=1 maxlength=30 size=30 required>
			</div>
			
			<!--login button-->
			<div class="form-field">			
				<button type="submit">Login</button>
			</div>
			
			<!--register-->
			<div class="container">
				<span class="register"> <a href="registeracc.php">Register</a></span>
				<span class="forgot-pwd"><a href="#">Forgot password?</a></span>
			</div>
			
				
	
		</div>
	</form>
</html>