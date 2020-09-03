<?php
	/* Er skjemaet sendt? Vi ønsker kun å kjøre koden etter at skjemaet er sendt. */
	if ( isset( $_POST['reg-send'] ) )
	{
		/* Sjekker om vedkommende er myndig */
		if ( $_POST['alder'] >= 18 )
		{
			echo $_POST['navn'] . " er " . $_POST['alder'] . " og dermed myndig <br />";
		}
		else
		{
			echo $_POST['navn'] . " er " . $_POST['alder'] . " og dermed ikke myndig <br />";
		}
		
		/* Sjekker aldersgruppe */
		switch ( $_POST['alder'] ) 
		{
			case $_POST['alder'] > 66:
				echo $_POST['navn'] . " er pensjonist";
				break;
			case $_POST['alder'] > 44:
				echo $_POST['navn'] . " er middelaldrende";
				break;
			case $_POST['alder'] > 19:
				echo $_POST['navn'] . " er ung voksen";
				break;
			case $_POST['alder'] > 12:
				echo $_POST['navn'] . " er tenåring";
				break;
			default:
			   echo $_POST['navn'] . " er et barn";
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L3-1</title>
</head>

<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<div>
				<input type="text" name="navn" placeholder="Navn" />
			</div>
			<div>
				<input type="text" name="alder" placeholder="Alder" />
			</div>
		</div>
		<div class="row">
			<input type="submit" name="reg-send" class="button" value="Send informasjon">
		</div>
	</form>
</body>
</html>
