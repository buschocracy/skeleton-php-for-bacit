<?php
/* Oppretter en matrise */
$minmatrise = array();

/* Laster inn verdier fra teller - kan også brukes for å endre matrisen */
for ( $i=0; $i < 10; $i++ )
{
	$minmatrise[$i] = $i;
}

/* Endring av alle indekser i matrisen */
$arrayKeys = array_keys( $minmatrise );

for ( $i=0; $i < 10; $i++ )
{
	$arrayKeys[$i] = $i + 10;
	$minmatrise =  array_combine( $arrayKeys, $minmatrise );
}

/* Skriver ut matrise */
print_r( $minmatrise );
?>