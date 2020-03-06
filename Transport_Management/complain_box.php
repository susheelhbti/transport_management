<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Complain</title>
	<link rel="stylesheet" href="table_styler_common.css">
	<link rel="stylesheet" href="complain_box_styler.css">
	
		
</head>

<body>

	 <div class="topnav">
		  <a href="home.php">Home</a>
		  <a href="bus_tracker.php">Locate Buses</a>
		  <a href="user_details.php">User Details</a>
		  <a href="staff_details.php">Staff Details</a>
		  <a href="bus_stops_details.php">Bus Stops</a>
		  <a href="route_details.php">Routes</a>
		  <a class="active" href="complain_box.php">Complains</a>
	</div>
	<br><br>
	
	<button onClick="document.getElementById('modal-wrapper').style.display = 'block'" style="width: 200px; margin-top: 200px; margin-left: 50%;">Make Complain</button>
		<div id="modal-wrapper" class="modal">
			<form class="modal-content animate" action="complain_insert_logic.php" method="GET">
				<span onClick="document.getElementById('modal-wrapper').style.display = 'none'" class="close" title="Close PopUp">&times;</span>
				<div id="mainselection">
					<select name="sel_index" id="des">

						<?php
							$host="localhost";
							$user="root";
							$password="";
							$db="transport_system";

							$link = mysqli_connect($host,$user,$password,$db);

							$bus=array();

							$bus_reg_sql="SELECT Registration_no FROM bus";

							$result = mysqli_query($link,$bus_reg_sql) or die(mysqli_error($link));

							$noOfData = mysqli_num_rows($result);
							while($row = mysqli_fetch_row($result)){
								$bus[]=$row[0];


							}
						?>

							<?php for($i=0;$i<$noOfData;$i++){ ?>
								<option selected><?php echo $bus[$i]?></option>
							<?php } ?>
					</select>					
					
				</div>
				
				<textarea name="description" placeholder="Write Your Complain Here..."></textarea>
				<input type="submit" name="Submit" value="Submit Complain">
			</form>
		
		</div>
		
		<script>
			var modal = document.getElementById('modal-wrapper');
			window.onclick = function(event){
				if(event.target == modal){
					modal.style.display = "none";
				}
			}
		</script>
	
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Bus Registration No</th>
				<th>Complain Description</th>
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
				$complain_id = array();
				$bus_registration = array();
				$complain_des = array();

				$complain_detail = "SELECT * FROM complain_box";
				$result = mysqli_query($link, $complain_detail) or die(mysqli_error($link));
				$num_data = mysqli_num_rows($result);
				//echo "$num_data";

				while($row = mysqli_fetch_row($result)){
					$complain_id[] = $row[0];
					$bus_registration[] = $row[1];
					$complain_des[] = $row[2];
				}
			?>
			
			<?php for($i = 0; $i < $num_data; $i++){ ?>
				<tr>
					<td><?php echo "$complain_id[$i]"; ?></td>
					<td><?php echo "$bus_registration[$i]"; ?></td>
					<td><?php echo "$complain_des[$i]"; ?></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
</body>
</html>