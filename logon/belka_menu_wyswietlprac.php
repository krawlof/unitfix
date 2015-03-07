<?php
	if(isset($_SESSION['rola']))
	{
		if($_SESSION['rola'] == 'admin')
			echo '<li><a href="index.php?site=dodajprac"><i class="fa fa-user-plus"></i>Dodaj pracownika</a></li>';
		else
			echo '<li><a href="index.php?site=edytuj"><i class="fa fa-cogs"></i>Edytuj konto</a></li>';
	}
	//echo '<li><a href="index.php?site="><i class="fa fa-cogs"></i> Element menu 2</a></li>';
	//echo '<li><a href="index.php?site="><i class="fa fa-cogs"></i> Element menu 3</a></li>';
?>