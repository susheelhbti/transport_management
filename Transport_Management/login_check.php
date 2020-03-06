<!doctype html>

<?php
	#session_start();
	
	/*if($_SERVER['REQUEST_METHOD'] == "POST"){
		/*if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
			header("Location: home.php");
		}*/
		
		/*if(isset($_POST["UserID"]) && isset($_POST["Password"])){
			if($_POST["UserID"] == $user_name && $_POST["Password"] == $user_pass){
				header("Location: home.php");
			}
		}	
		
	}*/
	
	if(isset($_POST["log_in"])){
		
		$user_name = $_POST["UserID"];
		$user_pass  = $_POST["Password"];
		//echo "<script>window.alert('$user_name $user_pass')</script>";
		
		if(empty($user_name) && empty($user_pass)){
			echo "<script>window.location.assign('login_page.php?status=empty_data')</script>";
		}
		else{
			$host="localhost";
			$default_username="root";
			$default_password="";
			$database="transport_system";

			try{
				$connection = new PDO("mysql:host=$host;dbname=$database", $default_username, $default_password);
				$sql_statement = "SELECT * FROM user WHERE ID LIKE '$user_name' and Password LIKE '$user_pass';";
				$result = $connection->query($sql_statement);
				
				
				if($result->rowCount() == 1){
					echo "<script>window.location.assign('home.php?status=wrongdata')</script>";
				}
				else{
					echo "<script>window.location.assign('login_page.php?status=wrongdata')</script>";
				}
				
				die($connection);
			}
			catch(PDOException $exp){
				echo "<script>window.location.assign('login_page.php?status=dberror')</script>";
			}
		}
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