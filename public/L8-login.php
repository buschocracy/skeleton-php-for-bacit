<?php
	/* Start session */
	session_start();

	/* Er skjemaet sendt? Vi ønsker kun å kjøre koden etter at skjemaet er sendt. */
	if ( isset( $_POST['reg-send'] ) )
	{
		/* Sjekk om brukernavn og passord er riktig */
		if ( $_POST['brukernavn'] == "jens" && $_POST['passord'] == "1234" ) 
		{
			/* Denne bruker vi for å sjekke om noen er pålogget */
			$_SESSION['brukernavn'] = $_POST['brukernavn'];
			$_SESSION['fornavn'] = $fornavn;
			header("Location: L8-innsia.php");
			exit();
		}
		else 
		{
			/* Kaller opp siden på nytt igjen og tvinger ny innlogging */
			header("Location: L8-login.php?em=2");
			exit();
		}
	}

	/* Sjekke meldinger ift. utskrift */
	switch ( $_GET['em'] ) 
	{
		case 1:
			session_unset(); // Fjern alle session-variabler
			session_destroy(); // Ta knekken på session
			echo "Du er nå logget ut! Takk for besøket ;) <br />";
			break;
		case 2:
			echo "Brukernavn og/eller passord er galt <br />";
			break;
		case 3:
			echo "Du må logge inn for å få tilgang til denne siden <br />";
			break;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L8 - innlogging</title>
</head>

<body>
	<?php if ( !isset( $_SESSION['brukernavn'] ) )  { ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<div>
				<input type="text" name="brukernavn" placeholder="Brukernavn" />
			</div>
			<div>
				<input type="password" name="passord" placeholder="Passord" />
			</div>
		</div>
		<div>
			<input type="submit" name="reg-send" class="button" value="Logg inn">
		</div>
	</form>
	<?php } else { ?>
	<p>Du er innlogget som <?php echo $_SESSION['brukernavn']; ?> </p>
	<button onclick="document.location='L8_login.php?em=1'">Logg ut</button>
	<?php } ?>
</body>
</html>
