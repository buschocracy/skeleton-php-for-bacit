<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L2-2</title>
</head>

<body>
	
<?php
$tall1 = 7;
$tall2 = 8;
	
/* Regner ut sum */
$sum = $tall1 + $tall2;
	
/* Regner ut differansen mellom tallene */
$diff = $tall2 - $tall1;
	
/* Regner ut gjennomsnitt av tallene */
$gjsnitt = $sum / 2;
	
/* Skriver ut de kraftige kalkulasjonene på skjermen */
echo "Tallene vi bruker er " . $tall1 . " og " . $tall2 . ".<br />";
echo "Summen av tallene er " . $sum . ", differansen er " . $diff . " og gjennomsnittet blir " . $gjsnitt . ".";
?>
	
</body>
</html>