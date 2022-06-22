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
		header("Location: profile.php");
	}
?>


<html> 

  <head> 
    <title>Profile Page</title>
	
		<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<meta charset="utf-8">
			
		<!-- External CSS -->
		<link rel = "stylesheet" type = "text/css" href = "userupdatestyles.css"/>
		
		
	   
		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet"> 
		
			
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@400;700&display=swap" rel="stylesheet">
		
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
			
			<form action = "validateupdateprofile.php" method="post">
				<div class="m-t">
					Update Profile 
				</div>
				<hr>
				
				<!--form input email-->
				<div class= "form-field">
					<p>Username</p>
					<input name="username" type=text value="<?php echo"$row[1]"; ?>" maxlength=30 size=30 required>	
				</div>
				
				<!--form input pwd-->
				<div class="form-field">
					<p>Password</p>
					<input name="password" type="password" value="<?php echo"$row[2]"; ?>"  maxlength=30 size=30 required>
				</div>
				
				<!--form input re-enter pwd-->
				<div class="form-field">
					<p>Re-enter Password</p>
					<input name="reenterpwd" type="password" maxlength=30 size=30 >
				</div>
				
				<!--form input name-->
				<div class= "form-field">
					<p>Name</p>
					<input name="name" type=text value="<?php echo"$row[3]"; ?>" maxlength=30 size=30 required>	
				</div>
				
				<!--form input email-->
				<div class="form-field">
					<p>Email</p>
					<input name="email" type="email" value="<?php echo"$row[4]"; ?>" maxlength=30 size=30 required>
				</div>
				
				<!--form input phone-->
					
				<div class="form-field">
					<p>Phone Number</p>
					<input name="phone" type="tel" value="<?php echo"$row[5]"; ?>" maxlength=30 size=30 required>
				</div>
				
				<!--form input address-->
				<div class="form-field">
					<p>Address</p>
					<input name="address" type=text value="<?php echo"$row[6]"; ?>" maxlength=100 size=100 required>
				</div>
				
				<!--select menu package-->
				<div class="custom-select" style="width:200px;">
				<div class="pkg">Package</div>
					<select name="package">
						<option class="ch"><?php echo"$row[7]"; ?></option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
					</select>
				</div>
		
		<!--select menu script-->
			<script>
			var x, i, j, l, ll, selElmnt, a, b, c;
			/*look for any elements with the class "custom-select":*/
			x = document.getElementsByClassName("custom-select");
			l = x.length;
			for (i = 0; i < l; i++) {
			  selElmnt = x[i].getElementsByTagName("select")[0];
			  ll = selElmnt.length;
			  /*for each element, create a new DIV that will act as the selected item:*/
			  a = document.createElement("DIV");
			  a.setAttribute("class", "select-selected");
			  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
			  x[i].appendChild(a);
			  /*for each element, create a new DIV that will contain the option list:*/
			  b = document.createElement("DIV");
			  b.setAttribute("class", "select-items select-hide");
			  for (j = 1; j < ll; j++) {
				/*for each option in the original select element,
				create a new DIV that will act as an option item:*/
				c = document.createElement("DIV");
				c.innerHTML = selElmnt.options[j].innerHTML;
				c.addEventListener("click", function(e) {
					/*when an item is clicked, update the original select box,
					and the selected item:*/
					var y, i, k, s, h, sl, yl;
					s = this.parentNode.parentNode.getElementsByTagName("select")[0];
					sl = s.length;
					h = this.parentNode.previousSibling;
					for (i = 0; i < sl; i++) {
					  if (s.options[i].innerHTML == this.innerHTML) {
						s.selectedIndex = i;
						h.innerHTML = this.innerHTML;
						y = this.parentNode.getElementsByClassName("same-as-selected");
						yl = y.length;
						for (k = 0; k < yl; k++) {
						  y[k].removeAttribute("class");
						}
						this.setAttribute("class", "same-as-selected");
						break;
					  }
					}
					h.click();
				});
				b.appendChild(c);
			  }
			  x[i].appendChild(b);
			  a.addEventListener("click", function(e) {
				  /*when the select box is clicked, close any other select boxes,
				  and open/close the current select box:*/
				  e.stopPropagation();
				  closeAllSelect(this);
				  this.nextSibling.classList.toggle("select-hide");
				  this.classList.toggle("select-arrow-active");
				});
			}
			function closeAllSelect(elmnt) {
			  /*a function that will close all select boxes in the document,
			  except the current select box:*/
			  var x, y, i, xl, yl, arrNo = [];
			  x = document.getElementsByClassName("select-items");
			  y = document.getElementsByClassName("select-selected");
			  xl = x.length;
			  yl = y.length;
			  for (i = 0; i < yl; i++) {
				if (elmnt == y[i]) {
				  arrNo.push(i)
				} else {
				  y[i].classList.remove("select-arrow-active");
				}
			  }
			  for (i = 0; i < xl; i++) {
				if (arrNo.indexOf(i)) {
				  x[i].classList.add("select-hide");
				}
			  }
			}
			/*if the user clicks anywhere outside the select box,
			then close all select boxes:*/
			document.addEventListener("click", closeAllSelect);
		</script>
				
				<!--edit and save button-->
				<div class="btn">	
					<button type="submit" href="profile.php">Save</button>		
				</div>
				
				
		</form>
		
		<?php
			}
		?>
		
  </body>

</html>