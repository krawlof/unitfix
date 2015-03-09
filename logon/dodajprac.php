<?php
require_once('../connect.php');
$link=connect();
session_start();
ob_start();

	$imie=$_POST['imie'];
	$nazwisko=$_POST['nazwisko'];
	$data_urodzenia=$_POST['data_ur'];
	$data_zatrudnienia=$_POST['data_zat'];
	$kod_pocztowy=$_POST['kod'];
	$miejscowosc=$_POST['miej'];
	$ulica=$_POST['ulica'];

	$login=$_POST['login'];
	$haslo=md5('H@sl0');
	$data=date('Y-m-d H:i:s');
	$dodal=$_SESSION['login'];

	$query1="INSERT	INTO pracownicy (imie, nazwisko, data-urodzenia, data-zatrudnienia, kod-pocztowy, miejscowosc, ulica) 
									VALUES ('$imie', '$nazwisko', '$data_urodzenia', '$data_zatrudnienia', '$kod_pocztowy', '$miejscowosc', '$ulica')"; // DODAWANIE WPISU DO TABELI  PRACOWNICY
	mysqli_query($link,$query1) or die ("Zapytanie: $query1 <br> Mysql: ".mysqli_error($link));
	$prac_id=mysqli_insert_id($link); //pobera id osttniego dadanego rekordu do bazy danych

	$query2="INSERT INTO logowania (data) VALUES ('$data')"; // DODANIE WPISU DO TEBELI LOGOWANIA
	mysqli_query($link,$query2)or die ("Zapytanie: $query2 <br> Mysql: ".mysqli_error($link));
	$log_id=mysqli_insert_id($link); //pobera id osttniego dadanego rekordu do bazy danych

	$query3="INSERT 	INTO uzytkownicy (login, haslo, data_utworzenia, kto_utworzyl, logowania_id, pracownicy_id) 
									VALUES ('$login','$haslo','$data','$dodal','$log_id','$prac_id')"; // DODANIE WPISU DO TEBELI U¯YTKOWNICY
	mysqli_query($link,$query3)or die ("Zapytanie: $query3 <br> Mysql: ".mysqli_error($link));

	exit();
	
if(isset($_POST['submit']))
{
}
else
{
	echo 'B³¹d wys³ania danych.';
}

mysqli_close($link);
ob_end_flush();
?>