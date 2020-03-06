<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link rel="stylesheet" href="table_styler_common.css">
	<link rel="stylesheet" href="staff_details_styler.css">
	<link rel="stylesheet" href="navigation.css">
	

</head>

<body>
	
	<div class="topnav">
		  <a href="home.php">Home</a>
		  <a href="bus_tracker.php">Locate Buses</a>
		  <a href="user_details.php">User Details</a>
		  <a class="active" href="staff_details.php">Staff Details</a>
		  <a href="bus_stops_details.php">Bus Stops</a>
		  <a href="route_details.php">Routes</a>
		  <a href="complain_box.php">Complains</a>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Full Name</th>
				<th>Job Type</th>
				<th>National ID</th>
				<th>Contact</th>
				<th>Join Date</th>
				<th>Previously Worked</th>
				<th>Current Employer</th>
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
				$staff_id = array();
				$staff_name = array();
				$staff_type = array();
				$staff_national_id = array();
				$staff_contact = array();
				$staff_join_date = array();
				$previous_employer = array();
				$currently_working = array();

				$staff_details_query = "SELECT s.Staff_ID, s.Name, s.Job_type, s.National_ID, s.Contact_no, s.Started_Working, s.Previous_Job, cmp.Company_name
										FROM staff AS s JOIN bus_company AS cmp ON s.Company_ID = cmp.Company_ID;";
				$result = mysqli_query($link, $staff_details_query) or die(mysqli_error($link));
				$num_data = mysqli_num_rows($result);
				//echo "$num_data";

				while($row = mysqli_fetch_row($result)){
					$staff_id[] = $row[0];
					$staff_name[] = $row[1];
					$staff_type[] = $row[2];
					$staff_national_id[] = $row[3];
					$staff_contact[] = $row[4];
					$staff_join_date[] = $row[5];
					$previous_employer[] = $row[6];
					$currently_working[] = $row[7];
				}
			?>
			
			<?php for($i = 0; $i < $num_data; $i++){ ?>
				<tr>
					<td><?php echo "$staff_id[$i]"; ?></td>
					<td><?php echo "$staff_name[$i]"; ?></td>
					<td><?php echo "$staff_type[$i]"; ?></td>
					<td><?php echo "$staff_national_id[$i]"; ?></td>
					<td><?php echo "$staff_contact[$i]"; ?></td>
					<td><?php echo "$staff_join_date[$i]"; ?></td>
					<td><?php echo "$previous_employer[$i]"; ?></td>
					<td><?php echo "$currently_working[$i]"; ?></td>	
				</tr>
			<?php } ?>
			
		</tbody>
	</table>
	
</body>
</html>