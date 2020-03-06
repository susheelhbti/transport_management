<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>User Details</title>
	<link rel="stylesheet" href="user_details_styler.css">
	<link rel="stylesheet" href="navigation.css">
	
</head>

<body>

	<div class="topnav">
		  <a href="home.php">Home</a>
		  <a href="bus_tracker.php">Locate Buses</a>
		  <a class="active" href="user_details.php">User Details</a>
		  <a href="staff_details.php">Staff Details</a>
		  <a href="bus_stops_details.php">Bus Stops</a>
		  <a href="route_details.php">Routes</a>
		  <a href="complain_box.php">Complains</a>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>User ID</th>
				<th>Full Name</th>
				<th>User Type</th>
				<th>Email Address</th>
				<th>Contact</th>
				<th>BirthDate</th>
				<th>National ID</th>
				<th>Student ID</th>
				<th>Buspass ID</th>				
			</tr>
		</thead>
		
		<tbody>
			
			<?php
				$host="localhost";
				$user="root";
				$password="";
				$db="transport_system";

				$link = mysqli_connect($host,$user,$password,$db);

				//User Details Variable Declaration
				$user_id = array();
				$user_name = array();
				$user_type = array();
				$user_email = array();
				$user_contact = array();
				$user_dob = array();
				$user_national_id = array();
				$user_student_id = array();
				$user_buspass_id = array();

				$user_details_query = "SELECT * FROM user";
				$result = mysqli_query($link, $user_details_query) or die(mysqli_error($link));
				$num_data = mysqli_num_rows($result);
				//echo "$num_data";

				while($row = mysqli_fetch_row($result)){
					$user_id[] = $row[0];
					$user_name[] = $row[3];
					$user_type[] = $row[2];
					$user_email[] = $row[4];
					$user_contact[] = $row[5];
					$user_dob[] = $row[6];
					$user_national_id[] = $row[7];
					$user_student_id[] = $row[8];
					$user_buspass_id[] = $row[9];
				}
			?>
				<?php for($i = 0; $i < $num_data; $i++){ ?>
					<tr>
						<td><?php echo "$user_id[$i]"; ?></td>
						<td><?php echo "$user_name[$i]"; ?></td>
						<td><?php echo "$user_type[$i]"; ?></td>
						<td><?php echo "$user_email[$i]"; ?></td>
						<td><?php echo "$user_contact[$i]"; ?></td>
						<td><?php echo "$user_dob[$i]"; ?></td>
						<td><?php echo "$user_national_id[$i]"; ?></td>
						<td><?php echo "$user_student_id[$i]"; ?></td>
						<td><?php echo "$user_buspass_id[$i]"; ?></td>	
					</tr>
				<?php } ?>
			
		</tbody>
	
	</table>

	
</body>
</html>