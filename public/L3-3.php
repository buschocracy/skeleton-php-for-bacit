<?php
$tall1 = 7;
$tall2 = 8;

for ( $i=0; $i < 10; $i++ )
{
	/* Regner ut sum */
	$sum = $tall1 + $tall2;

	/* Regner ut differansen mellom tallene */
	$diff = abs( $tall2 - $tall1 ); // Slå opp på php.net for å se hva abs gjør

	/* Regner ut gjennomsnitt av tallene */
	$gjsnitt = $sum / 2;

	/* Skriver ut de kraftige kalkulasjonene på skjermen */
	echo "<p>Tallene vi bruker er " . $tall1 . " og " . $tall2 . ".<br />";
	echo "Summen av tallene er " . $sum . ", differansen er " . $diff . " og gjennomsnittet blir " . $gjsnitt . ".</p>";
	
	/* Øker verdien på tall 1 */
	$tall1++;
}
?>