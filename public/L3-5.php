<?php
/* Klokken er nå */
$klokketime = date( 'H' ); // Sjekk php.net for å finne de ulike parametrene som brukes

/* Vår gjest heter */
$navn = "Silje";

/* Sjekker tidspunkt */
switch ( $klokketime ) 
{
	case $klokketime > 17:
		echo "God kveld " . $navn . "!";
		break;
	case $klokketime > 13:
		echo "God ettermiddag " . $navn . "!";
		break;
	case $klokketime > 11:
		echo "God dag " . $navn . "!";
		break;
	case $klokketime > 9:
		echo "God formiddag " . $navn . "!";
		break;
	case $klokketime > 5:
		echo "God morgen " . $navn . "!";
		break;
	default:
	   echo "God natt " . $navn . "!";
}

/* Litt informasjon til gjesten */
echo " Klokka er nå " . date( 'H:i' );
?>