<?php
/*
	TABLICA ZMIENNYCH SESJI:
	$_SESSION['login']		-> zmienna  przechowywuj�ca login u�ytkowniaka
	$_SESSION['haslo']		-> zmienna przechowywuj�ca haslo u�ytkownika (zakodowane md5)
	$_SESSION['IDS'] 		-> zmienna przechowywuj�ca identyfikator sesji (zakodowany md5)
*/
require_once('connect.php');
connect();
session_start();
ob_start();

session_regenerate_id();
$_SESSION['IDS'] = md5(session_id());

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
			
			setcookie('IDS',$_SESSION['IDS'],Time()+5);
			exit();
		}
		else
		{
			echo 'B��d !!!<br />';
			echo 'Login lub has�o s� nieprawid�owe.' ;
		}
	}
	else
	{
		echo 'Nie wype�niono wymaganych p�l.';
	}
	mysql_close();
}
else
{
	echo 'B��d wys�ania danych.';
}
ob_end_flush();
?>
