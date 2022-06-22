<html> 
	<head> 
		<title>Add Participant</title>
		<!-- Meta-Tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">  
		<meta charset="utf-8">
			
		<!-- External CSS -->
		<link rel = "stylesheet" type = "text/css" href = "adminaddstyles.css"/>
		
	   
		</script<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Spartan&display=swap" rel="stylesheet">
	</head>
  
	<body>
		<form action="validateadminadd.php" method="post">
	<div class="box-form">
	
		<!--title-->
		<div class="register-title">
			Add Participant
			<div class="fill">Please fill in this form to add participant.
				<hr style= "height:2px;border-width:0;color:gray;background-color:pink; margin-right: 30px;" >
			</div>				
		</div>
		
		<!--form input email-->
		<div class= "form-field">
			<input name="username" type=text placeholder="Username" maxlength=30 size=30 required>	
		</div>
		
		<!--form input pwd-->
		<div class="form-field">
			<input name="password" type="password" placeholder="Password"  maxlength=30 size=30 required>
		</div>
		
		<!--form input re-enter pwd-->
		<div class="form-field">
			<input name="reenterpwd" type="password" placeholder="Re-enter Password"  maxlength=30 size=30 required>
		</div>
		
		<!--form input name-->
		<div class= "form-field">
			<input name="name" type=text placeholder="Name" maxlength=30 size=30 required>	
		</div>
		
		<!--form input email-->
		<div class="form-field">
			<input name="email" type="email" placeholder="Email" maxlength=30 size=30 required>
		</div>
		
		<!--form input phone-->
		<div class="form-field">
			<input name="phone" type="tel" placeholder="Phone Number" maxlength=30 size=30 required>
		</div>
		
		<!--form input address-->
		<div class="form-field">
			<input name="address" type=text placeholder="Address" maxlength=100 size=100 required>
		</div>
		
		<!--select menu package-->
		<div class="custom-select" style="width:200px;">
		<div class="pkg">Package</div>
			<select name="package">
				<option class="ch">Choose</option>
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
		
		
		
		<!--register button-->
		<div class="form-field">			
			<button type="submit">Add</button>
		</div>
		
		
		
	</div>
	</form>
	</body>

</html>