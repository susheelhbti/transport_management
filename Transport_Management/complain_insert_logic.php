<?php
	if(isset($_GET['Submit'])){
		$bus_reg = $_GET['sel_index'];
		$desc = $_GET['description'];
		
		$host="localhost";
		$default_username="root";
		$default_password="";
		$database="transport_system";
		
		try{
			$connection = new PDO("mysql:host=$host;dbname=$database", $default_username, $default_password);
			//$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
			$sql_query = "INSERT INTO complain_box (Bus_regNo, Complain_Description) VALUES ('$bus_reg', '$desc');";
			
			$connection->exec($sql_query);
			
			echo "<script>window.alert('Succesfully Inserted')</script>";
			header("complain_box.php");
			
		}catch(PDOException $exp){
			echo "<script>window.location.assign('sign_up.php?status=dberror')</script>";
		}
		
	}

?>