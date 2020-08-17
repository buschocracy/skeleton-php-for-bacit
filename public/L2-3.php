<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L2-3</title>
</head>

<body>
<?php
    $sek = 4400;
    echo "<p>Hvor lenge er $sek sekunder? </p>";

    $temp = $sek / 60;
	echo "Slik ser delingstallet ut: " . $temp . "<br />";
    
	/* Runder ned et desimaltall ved å konvertere til integer */
    $antall_minutter = (int) $temp;

    /* Modulo-operatoren brukes for å finne resten */
    $rest_sekunder = $sek % 60;

    /* Skriver ut svaret */
    echo "<p>Det er $antall_minutter minutter og ";
    echo "$rest_sekunder sekunder i $sek sekunder</p>";
?>	
</body>
</html>
