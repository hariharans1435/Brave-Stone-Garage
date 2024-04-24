<?php 
include ("config.php");
$id=$_GET['id'];
$detail_qry=$conn->query("select * from register where id='$id'");
if($detail_qry->rowCount()==1)
{
	$detail_qry_arr=$detail_qry->fetch();
}
if(isset($_POST['update']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$password=$_POST['password'];

	$up_qry=$conn->query("update register set fname='$fname',lname='$lname',username='$username',email='$email',gender='$gender',password='$password',cpassword='$password' where id='$id'");
	if($up_qry)
	{
		echo("<script>alert('Data Updated Successfully')</script>");
	    header("Location: dashboard.php");
	}
	
	
}

	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LoginForm</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/registration.css">
		<style>
			.form{
                margin: auto;
			}
			/* input[type="file"] 
			{
    		display: none;
		    }
			.fileupload{
				transition: background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out, color 0.2s ease-in-out;


  display: inline-block;
  font-family: Open Sans ,sans-serif;
  text-transform: uppercase;
  padding: 10px 11px;
  
  
  font-weight: 400;
  letter-spacing: 0.125em;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 0.75rem;
  max-width: 20rem;
  height: 1.75em;
  font-size: 0.75rem;
  max-width: 20rem;
  line-height: .2em;
  background-color: #455d7a;
  border: 1px solid #455d7a;
  border-radius: 5px;
  color: #ffffff;


			} */
		</style>
	</head>

	<body>

		<div class="wrapper" > <!--  style="background-image: url('images/bg-registration-form-1.jpg');" -->
			<div class="inner">
				<div class="image-holder">
					<img src="images/infoformcopy.png" alt="">
				</div>
				<form class="form" method="post" action="">
					<h3>User Information</h3>
					<!-- <div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" required>
						<input type="text" placeholder="Last Name" class="form-control" required>
					</div> -->
					<div class="form-group">
						<input type="text" name="fname" value="<?=$detail_qry_arr['fname']?>" placeholder="First Name" value="<?=$detail_qry_arr['fname']?>" class="form-control" required>
						<input type="text" name="lname" value="<?=$detail_qry_arr['lname']?>" placeholder="Last Name" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="text" name="username" value="<?=$detail_qry_arr['username']?>" placeholder="Username" class="form-control" required>
						<!-- <i class="zmdi zmdi-account"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" value="<?=$detail_qry_arr['email']?>" placeholder="Email Address" class="form-control" required>
						<!-- <i class="zmdi zmdi-email"></i> -->
					</div>
					<div class="form-wrapper">
						<select name="gender" id="" class="form-control" required>
							<option value="" disabled selected><?=$detail_qry_arr['gender']?></option>
							<option value="male">Male</option>
							<option value="femal">Female</option>
							<option value="other">Other</option>
						</select>
						<!-- <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="password" value="" name="password" placeholder="Password" class="form-control" required>
						<!-- <i class="zmdi zmdi-lock"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="password" value="" name="cpassword" placeholder="Confirm Password" class="form-control" required>
						<!-- <i class="zmdi zmdi-lock"></i> -->
					</div>
					<button name="update" href="account.php" class="button" onclick="redirectToAccount()">Update
					</button>
				
				</form>
			</div>
		</div>
		
		<script >
			function redirectToAccount() {
			window.location.href = 'account.php';
		}
		</script>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>