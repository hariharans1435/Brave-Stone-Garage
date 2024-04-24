<?php
include ("config.php");
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $uname=$_POST['uname'];
  $email=$_POST['email'];
  $gender=$_POST['gender']; 
  $password=$_POST['password'];
  $cpassword=$_POST['cpassword'];


  $reg_qry=$conn->query("insert into register(fname,lname,username,email,gender,password,cpassword) values('$fname','$lname','$uname','$email','$gender','$password','$cpassword')");
  
  if($reg_qry)
  {
	echo("<script>alert('Register Successfully')</script>");
	header('Location:Login.php');
  }
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegisterForm</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/registration.css">
		<style>
			.reg{
				margin: auto;
                margin-top: 5px;
				font-size: 10px;
  				cursor: pointer;
  				display: flex;
  				align-items: center;
  				justify-content: center;
  				padding: 0;
  				font-family: Open Sans ,sans-serif;
			}
			a{
				text-decoration: none;
			}
			.button:hover {
  color: #455d7a;
  background-color: transparent;
  border: 1px solid #455d7a;
}
		</style>
	</head>

	<body>

		<div class="wrapper" > <!--  style="background-image: url('images/bg-registration-form-1.jpg');" -->
			<div class="inner">
				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
				<form method="post" action="registration.php">
					<h3>Registration Form</h3>
					<div class="form-group">
						<input type="text" name="fname" placeholder="First Name" class="form-control" required>
						<input type="text" name="lname" placeholder="Last Name" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="text" name="uname" placeholder="Username" class="form-control" required>
						<!-- <i class="zmdi zmdi-account"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" placeholder="Email Address" class="form-control" required>
						<!-- <i class="zmdi zmdi-email"></i> -->
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control" required>
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<!-- <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="password" name="password" placeholder="Password" class="form-control" required>
						<!-- <i class="zmdi zmdi-lock"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="password" name="cpassword" placeholder="Confirm Password" class="form-control" required>
						<!-- <i class="zmdi zmdi-lock"></i> -->
					</div>
					<button href="clientside/index.php" class="button" name="submit" onclick="navigateToPage2()">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					
						<p class="reg">Already have a account?&nbsp;<a href="Login.php">Login</a></p>
		</form>
			</div>
		</div>
		<!-- <script>function navigateToPage2() 
		{
			window.location.replace("clientside/index.php");
	    }   
		</script> -->
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
	<style>
		.popup{
			box-sizing: border-box;
			width:300px;
			overflow: hidden;
			background-color: #FCF6F5;
			border-radius: 10px;
			position: absolute;
			top:250;
			left: 500;
			display: none;
		}
		.h2{
			font-size: 15px;
			font-weight: 600;
			padding-top: 15px;
		}
		.popt{
			text-align: center;
			align-items:center;
			justify-content: center;
		}
		.login{
			padding-bottom: 15px;
		}
		.loginbtn:hover{
			color: #455d7a;
  background-color: transparent;
  border: 1px solid #455d7a;
		}
	</style>
	<form method="post" action="registration.php"></form>
	<div id="popup" class="popup">
		<div class="popt">
		<p class="h2">Registration successfully completed</p>
		<div class="login">
			<button class="loginbtn" name="login">Login</button>	
		</div>
				
		</div>
	</div>
</html>
