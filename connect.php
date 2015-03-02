<?php
function connect()
{

	$server="localhost";
	$username="root";
	$password="";
	$database="u132993786_unitf";
	
	$conn=mysqli_connect($server, $username, $password,$database); 
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	mysqli_query($conn,"SET NAMES 'utf8'");
	return $conn;
}
?>