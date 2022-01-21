<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>result</title>
	<style type="text/css">
		body{background: url(./bg.jpg) no-repeat center center; background-size: cover; background-attachment: fixed; }
		#image {width: 300px; height: 200px; background-image:"./image1.jpg"; background-repeat: repeat; background-size: 300px 200px;animation: haha 4s linear 0s infinite alternate;}
		@keyframes haha{0%{position: relative; left: 0px; top: 0px;}
						100%{position: relative; left: 88%; top: 0px;}}
	</style>
</head>
<body>
	<h1 align="center", style="color: hotpink;">Matching index</h1>
	<br>	<div id="image">
		<img src="./image1.jpg" />
	</div>
	<br>

	<table align="center" border="1px" cellspacing="0px" width="800px">
		<tr>
			<th>candidate 1</th>
			<th>candidate 2</th>
			<th>percentage</th>
			<th>result</th>
		</tr>
		<?php
			$conn = mysqli_connect('127.0.0.1','application','access','love_calculator','3306');
		if(!$conn){
			die("Connection failed:".mysqli_connect_error());
		}
		$sql = "SELECT name1, name2, percentage, result from calculation";
		$result = $conn-> query($sql);
		if ($result-> num_rows>0){
			while ($row = $result-> fetch_assoc()){
				echo "<tr><td>". $row["name1"]."</td><td>".$row["name2"]."</td><td>".$row["percentage"]."</td><td>".$row["result"]."</td></tr>";
			}
			echo "</table>";
		}
		else{
			echo "0 result";
		}

		$conn-> close();
		?>




</table>
	
</body>
</html>