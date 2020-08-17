<?php
	/* Er skjemaet sendt? Vi ønsker kun å kjøre koden etter at skjemaet er sendt. */
	if ( isset( $_POST['reg-send'] ) )
	{
		/* Sjekker om obligatoriske felt er utfylte */
		if ( empty( $_POST['navn'] ) )
		{
			echo "Navn er ikke utfylt! <br />";
		}
		if ( empty( $_POST['adresse'] ) )
		{
			echo "Adresse er ikke utfylt! <br />";
		}
		if ( empty( $_POST['tlfnr'] ) )
		{
			echo "Telefonnummer er ikke utfylt! <br />";
		}
		
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L3-4</title>
</head>

<body>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<div>
				<input type="text" name="navn" placeholder="Navn" />
			</div>
			<div>
				<input type="text" name="adresse" placeholder="Adresse" />
			</div>
			<div>
				<input type="number" name="tlfnr" placeholder="Telefonnummer" min="40000000" max="99999999"> <!-- Sjekk w3schools for å se hvordan input type number fungerer -->
			</div>
		</div>
		<div class="row">
			<input type="submit" name="reg-send" class="button" value="Send informasjon">
		</div>
	</form>
</body>
</html>
