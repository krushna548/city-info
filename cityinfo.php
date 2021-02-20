<!DOCTYPE html>
<html>
	<head>
		<title>City Information</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		
		<form action="" method="POST" enctype="multipart/form-data">
			
			<input type="text" name="city_name" placeholder="Enter city name to visit"/><br><br>
			
			<button class="button" name="search">Find City</button>
						
		</form>
			
		<?php
			$connection = mysqli_connect("localhost", "root","");
			$db = mysqli_select_db($connection, 'cityinfo');
			
			if(isset($_POST['search']))
			{
				$city_name = $_POST['city_name'];
				$query = "select * from city where city_name='$city_name'";
				$query_run = mysqli_query($connection,$query);
				while($row = mysqli_fetch_array($query_run))
				{
					?>
						
						<h1><?php echo $row['city_name'];?></h1>
						
						<?php echo "<br>"?>		
						
						<label id="info">Information of city</label>
						<div class="info">
							<p><?php echo $row['description'];?></p>
							<?php echo "<br>"?>
						</div>
						
						<label id="places">Best places to visit in city</label>
						<div class="places">
							<?php echo "<br>"?>
							<?php echo $row['place_for_vacation'];?>
						</div>
						
						<?php echo "<br>"?>
						
						<label id="hotels">Best Hotels in the city</label>
						<div class="hotels">
							<?php echo "<br>"?>
							<?php echo $row['hotels'];?>
						</div>
						
						<?php echo "<br>"?>
						
						<label id="visittime">Best time to visit in the city</label>
						<div class="visittime">
							<?php echo "<br>"?>
							<?php echo $row['best_time_to_visit'];?>
						</div>
						<?php echo "<br>"?>
						
						<h1 style="text-align: center;"><?php echo "Images of ". $row['city_name']. " city";?></h1>
						
						<div class="image" style="text-align: center;">
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imageOne']).'" alt="image1" width="300px" height="200px">';?>	
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imageTwo']).'" alt="image2" width="300px" height="200px">';?>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imageThree']).'" alt="image3" width="300px" height="200px">';?>
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row['imageFour']).'" alt="image4" width="300px" height="200px">';?>
						</div>
					<?php
				}
			}
			
		?>
	</body>
</html>
