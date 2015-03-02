<?php
session_start();
?>
<HTML>
<body>
<?php
if(!isset($_COOKIE['IDS']))
{
echo'Twoja sesja wygasla!!!';
exit();
}
if(md5(session_id()) == $_COOKIE['IDS'])
	{
echo'id sesji: '.md5(session_id()).'</br>
		Ciasteczko: '.$_COOKIE['IDS'].'</br>';
	}
	else
	{
		echo'Twoja sesja wygasła!!!';
	}
	
?>
<a href="login.php">dsds</a>
</body>
</HTML>