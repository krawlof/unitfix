<?php
function connect()
{

	$server="mysql.hostinger.pl";
	$username="u132993786_root";
	$password="Ek2JMj1EvJ";
	$database="u132993786_unitf";
	
	mysql_connect($server, $username, $password) or die ('B��d przy po��czeniu z serwerem');
	mysql_select_db($database) or die ('B��d przy po��czeniu z baz� danych');
	mysql_query("SET NAMES 'utf8'");
	return true;
}
?>