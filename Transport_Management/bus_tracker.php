<?php
	
	$host="localhost";
	$user="root";
	$password="";
	$db="transport_system";
	$bus_positions_lat = array();
	$bus_positions_lng = array();
	$ultimate_position = array();
				
	$link = mysqli_connect($host,$user,$password,$db);
	$coord_query = "SELECT * FROM bus";
	$result = mysqli_query($link,$coord_query) or die(mysqli_error($link));

	
	
	while($row = mysqli_fetch_row($result)){
		$bus_positions_lat[] = (float)$row[4];
		$bus_positions_lng[] = (float)$row[5];
	}
	//echo "$bus_positions_lng[0]";
	
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Marker Clustering</title>
    <link rel="stylesheet" href="home_styler.css">
		<link rel="stylesheet" href="table_styler_common.css">
		<link rel="stylesheet" href="navigation.css"> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head>

<body>

	<div class="topnav">
		  <a href="home.php">Home</a>
		  <a class="active" href="bus_tracker.php">Locate Buses</a>
		  <a href="user_details.php">User Details</a>
		  <a href="staff_details.php">Staff Details</a>
		  <a href="bus_stops_details.php">Bus Stops</a>
		  <a href="route_details.php">Routes</a>
		  <a href="complain_box.php">Complains</a>
	</div>
  	<br>
  	
  	<table>
		<thead>
			<tr>
				<th>Registration No</th>
				<th>Route No</th>
				<th>Company Name</th>
				<th>Latitude</th>
				<th>Longitude</th>
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
				$reg_no = array();
				$route_no = array();
				$company_names = array();
				$latt = array();
				$lngg = array();

				$bus_detail = "SELECT * FROM bus AS b JOIN bus_company AS bcmp ON b.Company_ID=bcmp.Company_ID;";
				$result = mysqli_query($link, $bus_detail) or die(mysqli_error($link));
				$num_data = mysqli_num_rows($result);
				//echo "$num_data";

				while($row = mysqli_fetch_row($result)){
					$reg_no[] = $row[0];
					$route_no[] = $row[1];
					$company_names[] = $row[7];
					$latt[] = $row[4];
					$lngg[] = $row[5];
				}
			?>
			
			<?php for($i = 0; $i < $num_data; $i++){ ?>
				<tr>
					<td><?php echo "$reg_no[$i]"; ?></td>
					<td><?php echo "$route_no[$i]"; ?></td>
					<td><?php echo "$company_names[$i]"; ?></td>
					<td><?php echo "$latt[$i]"; ?></td>
					<td><?php echo "$lngg[$i]"; ?></td>
					<td><button type="button" onClick="takeme()">Edit</button></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<br>
	
	<div id="map"></div>
	<script type="text/javascript">
    var locations = [
      ['0ABC', 23.744693, 90.372314, 6],
      ['1BCD', 23.742572, 90.373816, 5],
      ['3CNF', 23.739034, 90.387398, 4],
      ['4MLF', 23.739152, 90.381079, 3],
      ['5DPK', 23.761953, 90.371927, 2],
      ['6TNM', 23.774346, 90.36613, 1]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 16,
      center: new google.maps.LatLng(23.7593572, 90.3788136),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>

</body>
</html>