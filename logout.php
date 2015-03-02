<?php
//session_start();
ob_start();

if(isset($_SESSION['login']) && isset($_SESSION['id']))
{
	/*unset($_SESSION['login']);
	unset($_SESSION['id']);
	unset($_SESSION['IDS']);
	//$_SESSION = array();
	setcookie(session_name(), '', time()-42000, '/'); 
	session_destroy();*/
	$_SESSION = array();
	
	if (isset($_COOKIE[session_name()])) { 
		
		setcookie('IDS','',Time()-3600);
		setcookie(session_name(), '', time()-42000, '/'); 
	}
	echo "<div id='tresc'><div id='kol_lewa'><div class='okno'>ok</div></div></div>";
	exit();
	session_destroy();
	session_commit();
}
ob_end_flush();
?>
