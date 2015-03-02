<?php
session_start();
if(!isset($_COOKIE['IDS']))
{
	echo'Twoja sesja wygasła!!!';
	exit();
}
if(md5(session_id()) == $_COOKIE['IDS'] )
{
	if(!empty($_GET))
	{
		require_once('../connect.php');
		$link=connect();
		//echo "ok </br>";
		$site = $_GET['site'];
		$access = false;
		//domyślnie będzie wyświetlana strona o braku dostępu
		$access_site = "brak_dostępu.php";
		//lista dostępnych stron, dokładna nazwa pliku ze stroną to unitfix_..._.php - gdzie w miejscu ... wstawiasz wrtość z tablicy
		$available_site = array("przeglad","logout");
		
		foreach ($available_site as $iter)
		{
			if($iter == $site)
				$access = true;
		}
		
		if($access)
		{
			if($site == "logout")
				$access_site = "../".$site.".php";
			else
				$access_site = "unitfix_".$site.".php";
			require_once('naglowek.php');
			require_once($access_site);
			require_once('stopka.php');
		}
		else
		{
			require_once($access_site);
		}
	}
	else
	{
		echo "no";
	}
}
else
{
	echo'Twoja sesja wygasła!!!';
	exit();
}
?>