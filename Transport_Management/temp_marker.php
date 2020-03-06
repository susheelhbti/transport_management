<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Home</title>
		<link rel="stylesheet" href="home_styler.css">
		<link rel="stylesheet" href="table_styler_common.css">
		<link rel="stylesheet" href="navigation.css"> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
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
					<option value='<?php echo $stop_name[$i]?>'><?php echo $stop_name[$i]?></option>

				<?php } ?>
			</select>
			  <?php
				if(isset($_GET['selval'])){
					$selval=$_GET['selval'];
					echo "<script>document.getElementById('des').value='$selval';</script>";
				}
				else{
					echo "<script>document.getElementById('des').value='Mirpur10';</script>";
				}
			  ?>
			
		</div>
		
		<script>
				function admSelectCheck(){
					window.location.assign("home.php?selval="+document.getElementById('des').value);
				}
		</script>
		
		<div id="bus_names">
			<script>
				var e = document.getElementById("des").value;
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
 
  <div id="map"></div>

  <script type="text/javascript">
    var locations = [
      ['Mohammadpur', 23.757204, 90.361744, 13],
      ['Shankar', 23.750663, 90.368149, 12],
      ['Jhigatola', 23.739081, 90.375490, 11],
      ['Science Lab', 23.738903, 90.383915, 10],
      ['Shahbag', 23.739179, 90.395862, 9],
      ['Paltan', 23.729984, 90.410088, 8],
      ['Gulisthan', 23.724980, 90.411835, 7],
      ['Motijheel', 23.735396, 90.416730, 6],
      ['Asad Gate', 23.760186, 90.372668, 5],
      ['Shishu Mela', 23.773095, 90.367367, 4],
      ['Shyamoli', 23.774914, 90.365370, 3],
      ['Mirpur1', 23.798784, 90.353494, 2],
      ['Mirpur10', 23.807068, 90.368201, 1]
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