<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Route Details</title>
	<link rel="stylesheet" href="table_styler_common.css">
	<link rel="stylesheet" href="route_details_styler.css">
	<link rel="stylesheet" href="navigation.css">
	

</head>

<body>

	<div class="topnav">
		  <a href="home.php">Home</a>
		  <a href="bus_tracker.php">Locate Buses</a>
		  <a href="user_details.php">User Details</a>
		  <a href="staff_details.php">Staff Details</a>
		  <a href="bus_stops_details.php">Bus Stops</a>
		  <a class="active" href="route_details.php">Routes</a>
		  <a href="complain_box.php">Complains</a>
	</div>
	<br>
	<br>
	
	<table>
		<thead>
			<tr>
				<th>Route No</th>
				<th>Bus Count</th>
				<th>Bus Company Name</th>
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
				$route_num = array();
				$bus_num = array();
				$company_names = array();

				$route_detail = "SELECT * FROM route";
				$result = mysqli_query($link, $route_detail) or die(mysqli_error($link));
				$num_data = mysqli_num_rows($result);
				//echo "$num_data";

				while($row = mysqli_fetch_row($result)){
					$route_num[] = $row[0];
					$bus_num[] = $row[1];
					$company_names[] = $row[2];
				}
			?>
			
			<?php for($i = 0; $i < $num_data; $i++){ ?>
				<tr>
					<td><?php echo "$route_num[$i]"; ?></td>
					<td><?php echo "$bus_num[$i]"; ?></td>
					<td><?php echo "$company_names[$i]"; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
</body>
</html>