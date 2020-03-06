<!doctype html>

<?php

	/*
		Columns: User
		ID
		Password
		User_type
		Name
		email
		Contact_No
		Birthdate
		National_ID
		Student_ID
		BussPass_ID
	*/
	
	if(isset($_POST["signing_up"])){
		
		$user_type = refine_data($_POST["user_type"]);
		$user_name = refine_data($_POST["user_name"]);
		$user_mail = refine_data($_POST["user_mail"]);
		$user_id = refine_data($_POST["user_id"]);
		$user_pass1 = refine_data($_POST["user_pass1"]);
		$user_pass2 = refine_data($_POST["user_pass2"]);
		$contact = refine_data($_POST["contact_num"]);
		$birth_date = refine_data($_POST["dob"]);
		$nat_id = refine_data($_POST["national_id"]);
		$std_id = refine_data($_POST["student_id"]);
		//$buss_id = refine_data($_POST["busspass"]);
		$user_gender = refine_data($_POST["gender"]);
		
		//echo "<script>window.alert('$user_name $user_pass1')</script>";
		
		if($user_pass1 == $user_pass2)
			$pass_final = $user_pass1;
		else
			echo "<script>window.location.assign('sign_up.php?status=missmatchpass')</script>";
			
		
		$host="localhost";
		$default_username="root";
		$default_password="";
		$database="transport_system";
		
		try{
			$connection = new PDO("mysql:host=$host;dbname=$database", $default_username, $default_password);
			//$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql_query = "INSERT INTO user (ID, Password, User_type, Name, email, Contact_No, Birthdate, National_ID, Student_ID) VALUES ('$user_id', '$pass_final', '$user_type', '$user_name', '$user_mail', '$contact', '$birth_date', '$nat_id', '$std_id');";
			
			$connection->exec($sql_query);
			
			//$connection->exec("INSERT INTO user (ID, Password) VALUES ('somethghfhfvhfving', 'pass');");
			
			echo "<script>window.alert('Succesfully Inserted')</script>";
			
			/*$sql_query = "INSERT INTO user (ID, Password, User_type, Name, email, Contact_No, Birthdate, National_ID, Student_ID, BussPass_ID) 
						   VALUES ('$user_id', '$pass_final', '$user_type', '$user_name', '$user_mail', '$contact', '$birth_date', '$nat_id', '$std_id', '$buss_id');";
			
			
			if($connection->query($sql_query) == true){
				//echo "<script>window.location.assign('sign_up.php?status=succesful_insert')</script>";
				echo "<script>window.alert('succesful_insert')</script>";
			}
			else
				echo "<script>window.location.assign('login_page.php?status=unsuccesful_insert')</script>";*/
			
			//die($connection);
		}catch(PDOException $exp){
			echo "<script>window.location.assign('sign_up.php?status=dberror')</script>";
		}
		
		
		
	}

	function refine_data($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
    	return $data;
	}

?>



<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
</body>
</html>