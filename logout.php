<?php
require_once('connect.php');
session_start();
ob_start();

if(isset($_SESSION['login'])&&isset($_SESSION['id']))
{
	unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['IDS']);
	setcookie('ID','',0);
	session_destroy();
	exit();
}
ob_end_flush();
?>
