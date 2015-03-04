<div id="tresc">
	<div class="formularz">
		<h1>Edytuj klienta</h1>
		<form id="form">
		<table>
			<tr><td>Imię</td><td><input type="text" class="input" id="imie"/></td></tr>
			<tr><td>Nazwisko</td><td><input type="text" class="input" id="nazwisko"/></td></tr>
			<tr><td>Data urodzenia</td><td><input type="text" class="input" id="data_ur" /></td></tr>
			<tr><td>Data zatrudnienia</td><td><input type="text" class="input" id="data_zat" /></td></tr>
			<tr><td>Kod pocztowy</td><td><input type="text" class="input" id="kod"/></td></tr>
			<tr><td>Miejscowość</td><td><input type="text" class="input" id="miej"/></td></tr>
			<tr><td>Ulica</td><td><input type="text" class="input" id="ulica"/></td></tr>
			<tr><td><button class="submit" >Dodaj!</button></td></tr>
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
				function loging()
				{
					$( ".form-login" ).fadeOut( "slow", function() {
						$("#komunikat_login").fadeIn( "slow").delay(800).fadeOut("slow",function(){window.location='logon/index.php?site=przeglad';});
					});
				}
			});
	</script>