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
	
	if (isset($_COOKIE[session_name()])) 
	{ 
		setcookie(session_name(), '', time()-42000, '/'); 
		setcookie ("IDS", "", time() - 3600);
		echo "<div id='tresc'><div id='kol_lewa'><div class='okno'>ok1</div></div></div>";
	}
	header('Location: /unitfix/unitfix/index.php');
	exit();
	session_destroy();
	session_commit();
}
ob_end_flush();
?>
