<div id="tresc">
	<div class="formularz">
		<h1>Dodaj pracownika</h1>
		<form id="form">
		<table>
			<tr><td>Imię</td><td><input type="text" class="input" id="imie"/></td></tr>
			<tr><td>Nazwisko</td><td><input type="text" class="input" id="nazwisko"/></td></tr>
			<tr><td>Data urodzenia</td><td><input type="text" class="input" id="data_ur" /></td></tr>
			<tr><td>Data zatrudnienia</td><td><input type="text" class="input" id="data_zat" /></td></tr>
			<tr><td>Kod pocztowy</td><td><input type="text" class="input" id="kod"/></td></tr>
			<tr><td>Miejscowość</td><td><input type="text" class="input" id="miej"/></td></tr>
			<tr><td>Ulica</td><td><input type="text" class="input" id="ulica"/></td></tr>
			<tr><td>Login</td><td><input type="text" class="input" id="login"/></td></tr>
			<tr><td><span class="submit" >Dodaj!</span></td></tr>
		</table>
		</form>
		<div id="error">
			<p>Dodano nowego pracownika</p>
		</div>
	</div>
</div>
<script>
			jQuery(document).ready(function() 
			{
				$(".submit").click(function() {
					//if(valid())
					//{
						var imie = $('#imie').val();
						var nazwisko = $('#nazwisko').val();
						var data_ur = $('#data_ur').val();
						var data_zat = $('#data_zat').val();
						var kod = $('#kod').val();
						var miej = $('#miej').val();
						var ulica = $('#ulica').val();
						var login = $('#login').val();
						$.ajax({
							url: "dodajprac.php",
							type: "POST",
							data: "imie="+imie+"&nazwisko="+nazwisko+"&data_ur="+data_ur+"&data_zat="+data_zat+"&kod="+kod+"&miej="+miej+"&ulica="+ulica+"&login="+login,
							success: function(msg)
							{
								$("#error").html(msg);
								if(msg != 'ok')
									$("#error").css('visibility','visible');
								else
								{
									$("#error").css('visibility','hidden');
								}
							},
							error: function()
							{
								$("#error").html("<p>Błąd dodawaniu użytkownika!<p>");
								$("#error").css('visibility','visible');
							}
						});
					//}
					/*else
					{
						$("#error").html("<p>Błąd! Nie wypełniono wszystkich pól!</p>");
						$("#error").css('visibility','visible');
					}*/
				});
			});
	</script>