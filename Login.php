<?php
include ("config.php");

$_SESSION['last_page'] = $_SERVER['REQUEST_URI'];
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
	$password=$_POST['password'];

	if($email!='' && $password!='')
	{
		$lg_qry=$conn->query("select * from register where email='$email' and password='$password'");

		if($lg_qry->rowCount()==1)
		{
			$lg_qry_arr=$lg_qry->fetch();
			$_SESSION['email']=$lg_qry_arr['email'];
			$_SESSION['usertype']=$lg_qry_arr['usertype'];
			// $_SESSION['uname']=$lg_qry_arr['uname'];
			if($_SESSION['usertype']==0){
				header("Location:clientside/account.php");
			}
			else{
				header("Location:adminside/dashboard.php");
			}
			

			$ud_qry=$conn->query("select username from register where email='$email' and password='$password'");
			if($ud_qry->rowCount()==1)
			{
				$ud_qry_arr=$ud_qry->fetch();
				$_SESSION['username']=$ud_qry_arr['username'];

			}
		}
		else
		{
			echo("<script>alert('Invalid id or Password')</script>");
		}
	}
}


?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/login.css">
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
			
				<form method="post"  action="Login.php">
					<div class="formfield">
					<h3>Login Form</h3>

						<div class="form-wrapper">
							<input type="text" placeholder="Email Address" name="email" class="form-control" required>
							<!-- <i class="zmdi zmdi-email"></i> -->
						</div>
						
	
						<div class="form-wrapper">
							<input type="password" placeholder="Password" name="password" class="form-control" required>
							<!-- <i class="zmdi zmdi-lock"></i> -->
						</div>

					<button onclick="redirectToIndex()" class="button" id="submitButton" name="submit">Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					
					<p class="reg">Don't have a account?&nbsp;<a href="registration.php"> Register</a></p>
				</div>
				</form>

				<div class="image-holder">
					<img src="images/registration-form-1.jpg" alt="">
				</div>
			</div>
		</div>
	</body>
	
</html>