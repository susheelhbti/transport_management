<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>Dhaka Transport System|Welcome-LogIn</title>
<link rel="stylesheet" href="login_styler.css">

</head>

<body>
	
	<div class="title_text">
		<h1>Welcome to Dhaka Transport System</h1>
	</div>
	
		<form action="login_check.php" method="POST">
			<div class="login_form">
				<h2>Log In</h2>
				
				<div class="text_box">
					<input type="text" placeholder="UserID" name="UserID">
				</div>

				<div class="text_box">
					<input type="password" placeholder="Password" name="Password">
				</div>
				
				<input class="btn" type="submit" name="log_in" value="Submit">			
				
				<div class="submit_button">
					<h5>Don't have an account?</h5>
					<input type="submit" name="sign_up" value="Sign Up" formaction="sign_up.php">
				</div>
				

			</div>
		</form>
		
		<?php
			
			if(isset($_GET['status'])){
				$status=$_GET['status'];
				if($status=='empty_data'){
					echo "<script>window.alert('invalid input')</script>";
				}
				else if($status=='dberror'){
					echo "<script>window.alert('Database Connection Error')</script>";
				}
				else if($status=='wrongdata'){
					echo "<script>window.alert('Wrong Username or Password')</script>";
				}
				else if($status=='unsuccesful_insert'){
					echo "<script>window.alert('Unable to Sign Up')</script>";
				}
			}
		
		?>
	

</body>
</html>