<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Stops Details</title>
	<link rel="stylesheet" href="table_styler_common.css">
	<link rel="stylesheet" href="bus_stop_styler.css">
	<link rel="stylesheet" href="navigation.css">
	
</head>

<body>

<div class="topnav">
		  <a href="home.php">Home</a>
		  <a href="bus_tracker.php">Locate Buses</a>
		  <a href="user_details.php">User Details</a>
		  <a href="staff_details.php">Staff Details</a>
		  <a class="active" href="bus_stops_details.php">Bus Stops</a>
		  <a href="route_details.php">Routes</a>
		  <a href="complain_box.php">Complains</a>
	</div>
	<br>
	<br>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Stop Name</th>
				<th>Latitude</th>
				<th>Longitude</th>
				<th>Route_No</th>
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
				$stop_id = array();
				$stop_name = array();
				$lat = array();
				$lon = array();
				$route_no = array();

				$bus_stop_detail = "SELECT * FROM stops";
				$result = mysqli_query($link, $bus_stop_detail) or die(mysqli_error($link));
				$num_data = mysqli_num_rows($result);
				//echo "$num_data";

				while($row = mysqli_fetch_row($result)){
					$stop_id[] = $row[0];
					$stop_name[] = $row[1];
					$lat[] = $row[2];
					$lon[] = $row[3];
					$route_no[] = $row[4];
				}
			?>
			
			<?php for($i = 0; $i < $num_data; $i++){ ?>
				<tr>
					<td><?php echo "$stop_id[$i]"; ?></td> 
					<td><?php echo "$stop_name[$i]"; ?></td>
					<td><?php echo "$lat[$i]"; ?></td>
					<td><?php echo "$lon[$i]"; ?></td>
					<td><?php echo "$route_no[$i]"; ?></td>	
				</tr> 
			<?php } ?>
		</tbody>
	</table>
	
	<script>
		function editing_page(){
			window.location.assign('bus_stop_detail_update.php');
		} 
	</script>
	
</body>
</html>