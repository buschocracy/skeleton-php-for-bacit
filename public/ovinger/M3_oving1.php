<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>M3 - øving 1</title>
</head>

<body>
	<p>Oppg. 1: Lag et program som skriver ut tallene fra og med 20 til og med 49 med linjeskift mellom hvert tall.</p>
	<p>
		<?php
		for( $i=20; $i <= 49; $i++ )
		{
			echo $i . '<br />';
		}
		?>
	</p>
</body>
</html>