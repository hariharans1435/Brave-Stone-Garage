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
	$username=$_POST['uname'];
	$email=$_POST['email'];
	$gender=$_POST['gender'];
	$oldpassword=$_POST['oldpassword'];
	$newpassword=$_POST['newpassword'];

	$up_qry=$conn->query("update register set fname='$fname',lname='$lname',username='$username',email='$email',gender='$gender',password='$newpassword',cpassword='$newpassword' where id='$id'");
	
	if($up_qry)
	{
		header("Location: dashboard.php");
	}	
}

	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>User Information</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/registration.css">
		<style>
			.form{
                margin: auto;
			}
			.buttom{
				margin: auto;
  margin-top: 40px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  font-family: Open Sans ,sans-serif;
  text-transform: uppercase;
  padding: 10px 45px;
  font-weight: 400;
  letter-spacing: 0.125em;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 0.75rem;
  max-width: 20rem;
  height: 3.75em;
  line-height: 1.9em;
  background-color: #455d7a;
  border: 1px solid #455d7a;
  border-radius: 5px;
  color: #ffffff;
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
					<img src="images/infoformcopy.png" alt="">
				</div>
				<form method="post" class="form">
					<h3>User Information</h3>
					<!-- <div class="form-group">
						<input type="text" placeholder="First Name" class="form-control" required>
						<input type="text" placeholder="Last Name" class="form-control" required>
					</div> -->
					<div class="form-group">
						<input type="text" name="fname" placeholder="First Name" value="<?=$detail_qry_arr['fname']?>" class="form-control" required>
						<input type="text" name="lname" placeholder="Last Name" value="<?=$detail_qry_arr['lname']?>" class="form-control" required>
					</div>
					<div class="form-wrapper">
						<input type="text" name="uname" placeholder="Username" value="<?=$detail_qry_arr['username']?>" class="form-control" required>
						<!-- <i class="zmdi zmdi-account"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="text" name="email" placeholder="Email Address" value="<?=$detail_qry_arr['email']?>" class="form-control" required>
						<!-- <i class="zmdi zmdi-email"></i> -->
					</div>
					<div class="form-wrapper">
						<select name="gender"  id="" class="form-control" required>
							<option value="" disabled selected><?=$detail_qry_arr['gender']?></option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
						<!-- <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="password" name="oldpassword" placeholder="Old Password" class="form-control" required>
						<!-- <i class="zmdi zmdi-lock"></i> -->
					</div>
					<div class="form-wrapper">
						<input type="password" name="newpassword" placeholder="New Password" class="form-control" required>
						<!-- <i class="zmdi zmdi-lock"></i> -->
					</div>
					<button name="update" href="account.php" class="button btns">Update
					</button>
				
				</form>
			</div>
		</div>
		
		<!-- <script >
			function redirectToAccount() {
			window.location.href = 'account.php';
		}
		</script> -->
	</body>
</html>