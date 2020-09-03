<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>M3 - øving 2</title>
</head>

<body>
	<p>Oppg. 2: Lag en velkomsthilsen ved å endre farge utifra sekunddelen av gjeldende tidspunkt.</p>
	<p>
	<?php
	$sekund = date('s');
		
	echo "<strong style='color:";
	if ( $sekund < 10 )
		echo "blue;'";
	elseif( $sekund < 20 )
		echo "pink;'";
    elseif( $sekund < 30 )
        echo "yellow;'";
    elseif( $sekund < 40 )
        echo "black;'";
    elseif( $sekund < 50 )
        echo "silver;'";
    elseif( $sekund < 60 )
		echo "red;'";
		
	/* Finnes det andre måter å løse dette på? */
    	
	echo ">Velkommen hit </strong> Sekund-delen er nå: " . $sekund . ". Oppdater siden ofte og se resultatet";
	?>
	</p>
</body>
</html>