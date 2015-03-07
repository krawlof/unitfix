<div id="tresc">
	<div class="formularz">
		<h1>Edytuj pracownika</h1>
		<form id="form">
		<table>
			<?php
				if(isset($_SESSION['rola']))
				{
					if($_SESSION['rola'] == 'admin')
					{
						$id = $_GET['id'];
						$query="SELECT * FROM pracownicy JOIN uzytkownicy ON pracownicy.id = uzytkownicy.pracownicy_id WHERE pracownicy.id = '".$id."'" ;
						$result=mysqli_query($link,$query) or trigger_error ("Zapytanie: $query\n<br /> Błąd MySQL: " .mysql_error());
						while ($row = mysqli_fetch_array($result,MYSQL_ASSOC))
						{
							echo '<tr><td>Login</td><td><input type="text" class="input" id="imie" value="'.$row['login'].'"/></td></tr>';
							//echo '<tr><td>Nazwisko</td><td><input type="text" class="input" id="nazwisko" /></td></tr>';
							echo '<tr><td>Imię</td><td><input type="text" class="input" id="imie" value="'.$row['imie'].'"/></td></tr>';
							echo '<tr><td>Nazwisko</td><td><input type="text" class="input" id="nazwisko" value="'.$row['nazwisko'].'"/></td></tr>';
							echo '<tr><td>Data urodzenia</td><td><input type="text" class="input" id="data_ur" value="'.$row['data-urodzenia'].'"/></td></tr>';
							echo '<tr><td>Data zatrudnienia</td><td><input type="text" class="input" id="data_zat" value="'.$row['data-zatrudnienia'].'"/></td></tr>';
							echo '<tr><td>Kod pocztowy</td><td><input type="text" class="input" id="kod" value="'.$row['kod-pocztowy'].'"/></td></tr>';
							echo '<tr><td>Miejscowość</td><td><input type="text" class="input" id="miej" value="'.$row['miejscowosc'].'"/></td></tr>';
							echo '<tr><td>Ulica</td><td><input type="text" class="input" id="ulica" value="'.$row['ulica'].'"/></td></tr>';
							echo '<tr><td><button class="submit" >Dodaj!</button></td></tr>';
						}
					}
					else
					{
							echo '<tr><td>hasło</td><td><input type="password" class="input" id="password"/></td></tr>';
							echo '<tr><td><button class="submit" >Dodaj!</button></td></tr>';
					}
				}
			?>
		</table>
		</form>
	</div>
</div>
<script>
			jQuery(document).ready(function() 
			{
				$(".form__content__submit").click(function() {
					if(valid())
					{
						var imie = $('imie').val();
						var nazwisko = $('nazwisko').val();
						var data_ur = $('data_ur').val();
						var data_zat = $('data_zat').val();
						var kod = $('kod').val();
						var miej = $('miej').val();
						var ulica = $('ulica').val();
						$.ajax({
							url: "edytuj_prac.php",
							type: "POST",
							data: "imie="+imie+"&nazwisko="+nazwisko+"&data_ur="+data_ur+"&data_zat="+data_zat+"&kod="+kod+"&miej="+miej+"&ulica="+ulica,
							success: function(msg)
							{
								$("#error").html(msg);
								if(msg != 'ok')
									$("#error").css('visibility','visible');
								else
								{
									$("#error").css('visibility','hidden');
									loging();
								}
							},
							error: function()
							{
								$("#error").html("<p>Nie mogę zalogować!</br>Spróbuj później, lub skontaktuj się z administratorem<p>");
								$("#error").css('visibility','visible');
							}
						});
					}
					else
					{
						$("#error").html("<p>Błąd! Nie wypełniono wszystkich pól!</p>");
						$("#error").css('visibility','visible');
					}
				});
				function valid()
				{
					if($('#user-login').val() && $('#user-pass').val())
						return true;
					else
						return false;
				}
			});
	</script>