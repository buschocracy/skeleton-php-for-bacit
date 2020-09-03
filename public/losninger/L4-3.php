<?php
/* Oppretter en matrise med deltakere som alle har 0 poeng pr. nå */
$minmatrise = array( 
	'Sara' => 0, 
	'Lisbeth' => 0,  
	'Johanne' => 0,  
	'Therese' => 0, 
	'Inger' => 0,  
	'Nils' => 0,
	'Karl' => 0, 
	'Lars' => 0, 
	'Anders' => 0, 
	'Hans' => 0
);

/* Annonserer deltakere */
echo "Deltakerne i denne konkurransen er: <br />";
foreach( $minmatrise as $key => $value )
{
	echo " | " . $key;
}
echo " | <br />";

/* Kjører rundene så lenge det er flere enn én deltaker */
$runde = 0;
while( count( $minmatrise ) > 1 )
{
	/* Øker rundenummer */
	$runde++;	
	
	/* Genererer rundens tall for hver deltaker */
	foreach( $minmatrise as $key => $value )
	{
		$deltakertall = rand( 1, 50 );
		$minmatrise[$key] = $deltakertall;
	}
	
	/* Sortér matrise basert på tall */
	asort( $minmatrise );
	
	/* Skriver ut poengene i denne runden */
	echo "<br /> Denne rundens tall: ";
	foreach( $minmatrise as $navn => $poengsum )
	{
		echo $navn . ": " . $poengsum . " | ";
	}
	echo "<br />";
	
	/* Fjern den med lavest verdi */
	$lavesteverdi = min( $minmatrise );
	
	do 
	{
		$fjernet = array_splice( $minmatrise, 0, 1 );

		/* Skriv ut navnet på den som ble fjernet */
		foreach( $fjernet as $navn => $poengsum )
		{
			echo "Ute av konkurransen i runde <strong>" . $runde . "</strong>: " . $navn . " med " . $poengsum . " poeng. <br />";
		}
	} 
	while( min( $minmatrise ) == $lavesteverdi );		
}

/* Annonserer vinneren */
if( count( $minmatrise ) > 0 )
{
	/* Får du en feilmelding for array_key_first? Det skyldes at php-versjonen i Docker er 7.2.33, mens array_key_first er tilgjengelig for >=7.3.0. */
	echo "<p>Hvis feilmelding pga. PHP-versjon: Vinneren av konkurransen etter " . $runde . " runder er: "; print_r( $minmatrise ) . "</p>";

	echo "<p>*** Vinneren av konkurransen etter " . $runde . " runder er: <strong>" . array_key_first( $minmatrise ) . "</strong></p>";
}
else
{
	echo "Det ble ingen vinner denne gangen: i runde " . $runde . " hadde de to gjenværende deltakerne samme poengsum!";
}
?>