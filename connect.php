<?php
function connect()
{

	$server="mysql.hostinger.pl";
	$username="u132993786_root";
	$password="Ek2JMj1EvJ";
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