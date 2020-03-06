 <!-- Code Samples For future use
 
-->
 
 
 <!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="home_styler.css">
		<link rel="stylesheet" href="table_styler_common.css">
		<style>
			body {
			  margin: 0;
			  font-family: Arial, Helvetica, sans-serif;
			}

			.topnav {
			  overflow: hidden;
			  background-color: #333;
			}

			.topnav a {
			  float: left;
			  color: #f2f2f2;
			  text-align: center;
			  padding: 14px 16px;
			  text-decoration: none;
			  font-size: 17px;
			}

			.topnav a:hover {
			  background-color: #ddd;
			  color: black;
			}

			.topnav a.active {
			  background-color: #4CAF50;
			  color: white;
			}
		</style>
		
	</head>

	<body>
		<div class="header">
			<h1>Welcome</h1>
		</div>
		
       <div class="topnav">
		  <a class="active" href="home.php">Home</a>
		  <a href="bus_tracker.php">Locate Buses</a>
		  <a href="user_details.php">User Details</a>
		  <a href="staff_details.php">Staff Details</a>
		  <a href="bus_stops_details.php">Bus Stops</a>
		  <a href="route_details.php">Routes</a>
		  <a href="complain_box.php">Complains</a>
	</div>
        <div id="main">
        	<label >Destination </label>

			<select name="Des" id="des" class="form-control" onChange="admSelectCheck()">

			<?php
				$host="localhost";
				$user="root";
				$password="";
				$db="transport_system";

				$link = mysqli_connect($host,$user,$password,$db);

				$stop_name=array();

				$bus_name_sql="SELECT Stop_name FROM stops";

				$result = mysqli_query($link,$bus_name_sql) or die(mysqli_error($link));

				$noOfData = mysqli_num_rows($result);
				while($row = mysqli_fetch_row($result)){
					$stop_name[]=$row[0];


				}
			?>

				<?php for($i=0;$i<$noOfData;$i++){ ?>
					<option selected><?php echo $stop_name[$i]?></option>

				<?php } ?>
			</select>
			  
			
		</div>
		
		<script>
				function admSelectCheck(){
					var e = document.getElementById("des");
					var selected_stop = e.options[e.selectedIndex].text;
					//document.getElementById("bus_names").style.display = "block";
					<?php
						//$sel_dest = "<script>document.write(selected_stop)</script>";
						//echo "$sel_dest";
					?>
				}
		</script>
		
		<div id="bus_names">
			<script>
				var e = document.getElementById("des");
				var selected_stop = e.options[e.selectedIndex].text;
			</script>
			<table>
				<thead>
				  <tr>
					<th>Route_No</th>
					<th>Bus_Name</th>
					<th>Fare</th>
					
				  </tr>
				</thead>
				<tbody>
				<?php
						$host="localhost";
		                $user="root";
		                $password="";
	                 	$db="transport_system";
					
				
					$link = mysqli_connect($host,$user,$password,$db);
					//echo "Before Assigning: <script>document.write(selected_stop)</script><br>";
					$sel_dest = (string)"<script>document.write(selected_stop)</script>";
					//$r = "route";
					//$sl_dest = (string)$sel_dest;
					//echo "$sel_dest";
					$sel_dest = "Mirpur10";
					
					$route_no=array();
					$bus_names=array();
					$bus_name_sql="SELECT * FROM route AS r JOIN stops AS s ON r.Route_No=s.Route_no WHERE s.Stop_name='$sel_dest';";

					$result = mysqli_query($link,$bus_name_sql) or die(mysqli_error($link));

					$noOfData = mysqli_num_rows($result);
					//echo "$noOfData";
					while($row = mysqli_fetch_row($result)){
						$route_no[]=$row[0];
						$bus_names[]=$row[2];
						//echo "$row[2]";

					}
					
					//-------------------Convertng array to string here-----------------
					$mega_holder = implode("|", $bus_names);
					$chunks = explode("," , $mega_holder);
					//echo "$chunks[0]";
					//echo "$chunks[1]";
					
				?>
				
				<?php foreach($chunks as $x){ ?>
					<tr>
						<td><?php echo $route_no[0]?></td>
						<td><?php echo $x?></td>
						<td><?php
								
								//$link = mysqli_connect($host,$user,$password,$db);
								$temp_arr = array();
								$fare_query = "SELECT * FROM bus_company WHERE Company_name LIKE '$x';";
								$fare_result = mysqli_query($link, $fare_query) or die(mysqli_error($link));
								$query_row = mysqli_num_rows($fare_result);
								//echo "$query_row";
								while($row = mysqli_fetch_row($fare_result)){
									$temp_arr[]=$row[2];									
								}
								//echo "$temp_arr[0]";
								$fare_str = implode("|", $temp_arr);
								$fare_chunks = explode(",", $fare_str);
								//echo "$fare_str";
								
								$total = 0;
								foreach($fare_chunks as $x){
									$temp = (int)$x;
									$total = $total + $temp;
									//echo "$total";
								}
								echo "$total";
								
							?></td>
					
				  	</tr>
				<?php } ?>
				
				</tbody>
			</table>
		</div>
		
		
			
		
		<br>
		<button onclick="getLocation()">Show Me</button>
		<p id="demo"></p>
		<div id="map"></div>

		<script>
			
			var x = document.getElementById("demo");
			var pos;

			function getLocation() {
			  if (navigator.geolocation) {
				pos = navigator.geolocation.getCurrentPosition(showPosition);
			  } else { 
				x.innerHTML = "Geolocation is not supported by this browser.";
			  }
			  myMap();
			}
			
			var latt = 0;
			var lngg = 0;
			
			function showPosition(position) {
				 //x.innerHTML = "Latitude: " + position.coords.latitude + 
				 //"<br>Longitude: " + position.coords.longitude;
				 latt = position.coords.latitude;
				lngg = position.coords.longitude;
			}
			
			function myMap(){
				var coord = {lat: latt, lng: lngg};
				var maps = new google.maps.Map(
								document.getElementById('map'), {zoom: 20, center: coord});
				var marker = new google.maps.Marker({position: coord, map: maps});
				
				var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

				var markerss = locations.map(function(location, i) {
				  return new google.maps.Marker({
					position: location,
					label: labels[i % labels.length]
				  });
				});

				// Add a marker clusterer to manage the markers.
				var markerCluster = new MarkerClusterer(map, markerss,
					{imagePath: 'Map\markerclustere\m'});
				
			}
			
			var locations = [
        {lat: 23.757204, lng: 90.361744},
        {lat: 23.750663, lng: 90.373816},
        {lat: 23.739081, lng: 90.375490},
        {lat: 23.739152, lng: 90.383915},
        {lat: 23.739179, lng: 90.395862},
        {lat: 23.729984, lng: 90.410088},
        {lat: 23.724980, lng: 90.411835},
        {lat: 23.735396, lng: 90.416730},
        {lat: 23.760186, lng: 90.372668},
        {lat: 23.773095, lng: 90.367367},
        {lat: 23.774914, lng: 90.365370},
        {lat: 90.365370, lng: 90.351917},
        {lat: 23.798784, lng: 90.353494},
        {lat: 23.807068, lng: 90.368201}
        /*{lat: -37.774785, lng: 145.137978},
        {lat: -37.819616, lng: 144.968119},
        {lat: -38.330766, lng: 144.695692},
        {lat: -39.927193, lng: 175.053218},
        {lat: -41.330162, lng: 174.865694},
        {lat: -42.734358, lng: 147.439506},
        {lat: -42.734358, lng: 147.501315},
        {lat: -42.735258, lng: 147.438000},
        {lat: -43.999792, lng: 170.463352}*/
      ]

		</script>
		
		<script src="Map\markerclusterer.js"></script>
		<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcDsETweOQXJQhrjLN3GUYMCHedGA893U&callback=myMap">
		</script>


	</body>
</html>