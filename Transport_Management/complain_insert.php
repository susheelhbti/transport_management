<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Bus Complain Maker</title>
</head>

<body>

	<form action="complain_insert_logic.php" method="GET">
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
		<br>
		<textarea name="description" placeholder="Write Your Complain Here..."></textarea>
		<input type="submit" name="Submit" value="Submit Complain">
	</form>
</body>
</html>