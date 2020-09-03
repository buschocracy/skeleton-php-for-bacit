<?php
/* Definerer variabel for sum */
$sum = 0;

/* For-løkke som kjører så lenge vilkårene er oppfylte */
for ( $teller=0; $teller<10; $teller++ ) 
{
	echo "Telleren er nå " . $teller . "<br />";
	
	/* Sum er nå */
	$sum = $sum + $teller;
}

/* Vi er ferdige å telle og kan skrive ut en sluttbeskjed */
echo "Juhuu, ferdig å telle! Summen av tallene ble " . $sum;
?>