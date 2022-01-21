<?php
header("location: ./match.html");
$conn = mysqli_connect('127.0.0.1','application','access','love_calculator','3306');

$fname= $_GET['fname'];
$fage= $_GET['fage'];
$fconstellation= $_GET['fconstellation'];
$fbloodtype= $_GET['fbloodtype'];
$sname= $_GET['sname'];
$sage= $_GET['sage'];
$sconstellation= $_GET['sconstellation'];
$sbloodtype= $_GET['sbloodtype'];

$sql1= "INSERT INTO candidate1 (name1, age1, constellation1, bloodtype1)VALUES ('$fname','$fage','$fconstellation','$fbloodtype')";
$sql2= "INSERT INTO candidate2 (name2, age2, constellation2, bloodtype2)VALUES ('$sname','$sage','$sconstellation','$sbloodtype')";

 
if (mysqli_query($conn, $sql1))
{
	echo "New record of candidate1 has been added to table successfully!";
}else{
	echo "Error:".$sql1."".mysqli_error($conn);
}


if (mysqli_query($conn, $sql2))
{
	echo "New record of candidate2 has been added to table successfully!";
}else{
	echo "Error:".$sql2."".mysqli_error($conn);
}
$conn->close();
exit;

?>