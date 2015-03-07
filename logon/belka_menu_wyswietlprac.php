<?php
	if(isset($_SEESION['rola']))
	{
		if($_SEESION['rola'] == 'admin')
			echo '<li><a href="index.php?site=dodajprac"><i class="fa fa-cogs"></i>Dodaj pracownika</a></li>';
		else
			echo '<li><a href="index.php?site=edytuj"><i class="fa fa-cogs"></i>Edytuj konto</a></li>';
	}
	//echo '<li><a href="index.php?site="><i class="fa fa-cogs"></i> Element menu 2</a></li>';
	//echo '<li><a href="index.php?site="><i class="fa fa-cogs"></i> Element menu 3</a></li>';
?>