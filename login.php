<?php
require_once('connect.php');
connect();
session_start();
ob_start();

session_regenerate_id();
$_SESSION['ID'] = md5(session_id());

if(isset($_POST['login']))
{
	$login=$_POST['login'];
	$haslo= md5($_POST['haslo']);
	if($login&&$haslo)
	{
		$query="SELECT * FROM uzytkownicy WHERE (login ='$login' AND haslo='$haslo')";
		$result= mysql_query($query) or die ("Zapytanie: $query <br> Mysql: ".mysql_error());
		if(@mysql_num_rows($result)==1)
		{
			$row=mysql_fetch_array($result, MYSQL_NUM);
			mysql_free_result($result);
			$_SESSION['login']=$row[1];
			$_SESSION['id']=$row[0];
			
			setcookie('ID',$_SESSION['ID'],Time()+5);
			exit();
		}
		else
		{
			echo 'B³¹d !!!<br />';
			echo 'Login lub has³o s¹ nieprawid³owe.' ;
		}
	}
	else
	{
		echo 'Nie wype³niono wymaganych pól.';
	}
	mysql_close();
}
else
{
	echo 'B³¹d wys³ania danych.';
}
echo'
<HTML>
	<body>
		<a href="nowa.php">dsds</a>
	</body>
</HTML>';
ob_end_flush();
?>
