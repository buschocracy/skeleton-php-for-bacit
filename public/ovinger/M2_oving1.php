<?php
$radius = 5;
define('PI', 3.14159);
$navn = 'silje';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>M2 - øving 1</title>
</head>	

<body>
<p>Øving 1: Vi skal til matematikkens verden (frykt ikke!) og regne ut omkrets og areal av en sirkel. Sett radius som en variabel. Sett pi som en konstant. Programmet skal skrive ut både omkrets og areal.</p>
<p>
<?php
$omkrets = 2 * PI * $radius;
$areal = PI * $radius * $radius;
$test = $omkrets - PI;
	
echo 'Omkretsen av sirkelen er ' . $omkrets . ' og arealet av sirkelen er ' . $areal;
?>
</p>
	
</body>
</html>