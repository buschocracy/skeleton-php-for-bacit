<?php
/* Oppretter en matrise */
$minmatrise = array( 0 => 'Eple', 3 => 'Appelsin', 5 => 'Banan', 7 => 'Kiwi', 8 => 'Plomme', 15 => 'Druer' );

/* Skriver ut matrise - print_r */
print_r( $minmatrise ); 
echo "<br />"; // av estetiske grunner

/* Skriver ut matrise - løkke */
foreach ( $minmatrise as $key => $value )
{
	echo $key . ": " . $value . " <br />";
}
?>