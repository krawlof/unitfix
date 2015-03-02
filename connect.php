<?php
function connect()
{

	$server="mysql.hostinger.pl";
	$username="u132993786_root";
	$password="Ek2JMj1EvJ";
	$database="u132993786_unitf";
	
	mysql_connect($server, $username, $password) or die ('B³¹d przy po³¹czeniu z serwerem');
	mysql_select_db($database) or die ('B³¹d przy po³¹czeniu z baz¹ danych');
	mysql_query("SET NAMES 'utf8'");
	return true;
}
?>