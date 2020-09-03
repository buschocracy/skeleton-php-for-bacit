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
		}
		else 
		{
			/* Kaller opp siden på nytt igjen og tvinger ny innlogging */
			header("Location: M8_oving2.php?message=error");
			exit();
		}
	}

	/* Ønsker brukeren å logge ut? */
	if ( $_GET['message'] == 'loggut' )
	{
		/* Fjern alle session-variabler */
		session_unset();

		/* Ta knekken på session */
		session_destroy();
	}

	/* Sjekke meldinger ift. utskrift */
	switch ( $_GET['message'] ) 
	{
		case 'loggut':
			echo "Du er nå logget ut! Takk for besøket ;) <br />";
			break;
		case 'error':
			echo "Noe gikk skeis her <br />"; // Forbedre gjerne dette slik at det viser hva som gikk galt
			break;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Logg inn</title>
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
	<button onclick="document.location='M8_oving2.php?message=loggut'">Logg ut</button>
	<?php } ?>
</body>
</html>
