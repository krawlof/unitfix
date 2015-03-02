<?php
/*
	TABLICA ZMIENNYCH SESJI:
	$_SESSION['login']		-> zmienna  przechowywująca login użytkowniaka
	$_SESSION['haslo']		-> zmienna przechowywująca haslo użytkownika (zakodowane md5)
	$_SESSION['IDS'] 		-> zmienna przechowywująca identyfikator sesji (zakodowany md5)
*/
require_once('../connect.php');
$link=connect();
session_start();
ob_start();

session_regenerate_id();
//$_SESSION['IDS'] = md5(session_id());

if(isset($_POST['login']))
{
	$login=$_POST['login'];
	$haslo= md5($_POST['haslo']);
	if($login&&$haslo)
	{
		$query="SELECT * FROM uzytkownicy WHERE (login ='$login' AND haslo='$haslo')";
		$result= mysqli_query($link,$query) or die ("Zapytanie: $query <br> Mysql: ".mysqli_error());
		if(@mysqli_num_rows($result)==1)
		{
			echo 'ok';
			$row=mysqli_fetch_array($result, MYSQL_NUM);
			mysqli_free_result($result);
			$_SESSION['login']=$row[1];
			$_SESSION['id']=$row[0];
			
			setcookie("IDS",md5(session_id()),Time()+(1*3600));
			exit();
		}
		else
		{
			echo 'Błąd !!!<br />';
			echo 'Login lub hasło są nieprawidłowe.' ;
		}
	}
	else
	{
		echo 'Nie wypełniono wymaganych pól.';
	}
	mysqli_close();
}
else
{
	echo 'Błąd wysłania danych.';
}
ob_end_flush();
?>
