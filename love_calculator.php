
<?php
header("location: ./result.php");
$conn = mysqli_connect('127.0.0.1','application','access','love_calculator','3306');
if(!$conn){
	die("Connection failed:".mysqli_connect_error());
}

$fname= $_GET['fname'];
$sname= $_GET['sname'];

$query1 = "SELECT * FROM candidate1 WHERE name1 LIKE '%$fname%'
 ";
$result1 = mysqli_query($conn, $query1); //result checksum from search box
while ($row1 = mysqli_fetch_array($result1)) 
{
	
		echo"First Name:".$row1[0]."<br>";     
		echo"Age:".$row1[1]."<br>";     
		echo"Constellation".$row1[2]."<br>";     
		echo"Blood Type".$row1[3]."<br>";  
	echo"<br>";
	
}
$query2 = "SELECT * FROM candidate2 WHERE name2 LIKE '%$sname%'
 ";
$result2 = mysqli_query($conn, $query2); //result checksum from search box
while ($row2 = mysqli_fetch_array($result2)) 
{
	
		echo"Second Name:".$row2[0]."<br>";     
		echo"Age:".$row2[1]."<br>";     
		echo"Constellation".$row2[2]."<br>";     
		echo"Blood Type".$row2[3]."<br>";  
	echo"<br>";
	
}
//show information about the two candidates


$curl = curl_init();
$sname = $_GET['sname'];
$fname = $_GET['fname'];

curl_setopt_array($curl, [
	CURLOPT_URL => "https://love-calculator.p.rapidapi.com/getPercentage?sname=$sname&fname=$fname",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: love-calculator.p.rapidapi.com",
		"x-rapidapi-key: 5b4d198996mshd4dd3a55ac6da4fp19bee6jsn28c1d2c4a9ca"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
//public API, show the result



$obj=json_decode($response,TRUE);
foreach ($obj as $k => $v) {
	$$k = $v;
}
echo "fname=$fname;sname=$sname;percentage=$percentage;result=$result;";
//analize Json data



$sql3= "INSERT INTO calculation (name1, name2, percentage, result)VALUES ('$fname','$sname','$percentage','$result')";
if (mysqli_query($conn, $sql3))
{
	echo "New record of result has been added to table successfully!";
}else{
	echo "Error:".$sql3."".mysqli_error($conn);
}
//insert result into database



$conn->close();
exit;
?>