<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>New User-Sign Up</title>
	<link rel="stylesheet" href="signup_styler.css">
</head>

<body>

	<form action="signup_user.php" method="POST">
			<div class="signup_form">

			<div class="radio_button">
			<input type="radio" name="user_type" value="admin" checked> Admin
			<input type="radio" name="user_type" value="company_representative"> Company Representative
			<input type="radio" name="user_type" value="passenger"> Passenger<br>
			</div>

			<div class="text_box">
				<input type="text" placeholder="Full Name" name="user_name"> <br> 
			</div>

			<div class="text_box">
				<input type="email" placeholder="email" name="user_mail"> <br>
			</div>

			<div class="text_box">
				<input type="text" placeholder="User Name" name="user_id"> <br> 
			</div>

			<div class="text_box">
				<input type=password placeholder="Type Your Password" name="user_pass1"> <br>
			</div>

			<div class="text_box">
				<input type=password placeholder="Confirm Password" name="user_pass2"> <br> 
			</div>

			<div class="text_box">
				<input type="text" placeholder="Cell Number" name="contact_num"> <br>
			</div>
			
			<div class="birth_date">
				Date OF Birth: <input type="date" placeholder="Date Of Birth" name="dob"> <br>
			</div>

			<div class="text_box">
				<input type="text" placeholder="National ID" name="national_id"> <br>
			</div>

			<div class="text_box">
				<input type="text" placeholder="Student ID" name="student_id"><br>
			</div>

			<!-- <div class="text_box">
				<input type="text" placeholder="Buss Pass" name="busspass"> <br>
			</div> -->

			<div class="radio_button">
				<input type="radio" name="gender" value="male" checked> Male
				<input type="radio" name="gender" value="female"> Female
				<input type="radio" name="gender" value="other"> Other<br>
			</div>
			
			<input class="button" type="submit" name="signing_up" value="Sign Up">

		</div>
	</form>
	
	<?php
		if(isset($_GET['status'])){
				$status=$_GET['status'];
				if($status=='succesful_insert'){
					echo "<script>window.alert('Succesfully Signed Up')</script>";
					echo "<script>window.location.assign('login_page.php')";
				}
				else if($status=='unsuccesful_insert'){
					echo "<script>window.alert('There was a problem signing up! Please try again!')</script>";
				}
				else if($status=='dberror'){
					echo "<script>window.alert('Server Error')</script>";
				}
				else if($status=='missmatchpass'){
					echo "<script>window.alert('Password Doesn't match!)</script>";
				}
			}
	?>
	
</body>
</html>