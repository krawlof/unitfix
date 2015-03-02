<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>UnitFix - Logowanie</title>
		<link rel="Stylesheet" type="text/css" href="css/style.css" />
		<link rel="Stylesheet" type="text/css" href="css/font-awesome.min.css">
		<script type="text/javascript" src="js/jquery-2.1.3.min.js"></script>
	</head>
	<body>
		<form class="form-login">
				<ul>
					<li class="tytul">Logowanie</li>
					<li class="form__content__input-container">
						<span class="form__content__input-addon"><i class=" fa fa-user"></i></span>
						<input class="form__content__input" type="text" name="user-login" id="user-login" autocomplete="off" placeholder="Login">
					</li>
					<li class="form__content__input-container">
						<span class="form__content__input-addon"><i class=" fa fa-key"></i></span>
						<input class="form__content__input" type="password" name="user-pass" id="user-pass" placeholder="Hasło">
					</li>
					<span class="form__content__submit"><i class="fa fa2 fa-unlock-alt"></i></span>
				</ul>
		</form>
		<div id="error">
			<p>Błąd! Nie wypełniono wszystkich pól!</p>
		</div>
		<div id="komunikat_login">
			Logowanie powiodło się!
		</div>
		<script type="text/javascript">
			jQuery(document).ready(function() {
				$(".form__content__submit").click(function() {
					if(valid())
					{
						var login = $('#user-login').val();
						var haslo = $('#user-pass').val();
						$.ajax({
							url: "logon/login.php",
							type: "POST",
							data: "login="+login+"&haslo="+haslo,
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
	</body>
</html>