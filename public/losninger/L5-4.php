<?php
/* Hent fødselsdato via GET */
if ( isset( $_GET['fdato'] ) )
{
	/* Setter fødselsdato og dagens dato */
	$fdato = substr( $_GET['fdato'], 6, 4 ) . '-' . substr( $_GET['fdato'], 3, 2 ) . '-' . substr( $_GET['fdato'], 0, 2 );
	$ddato = date( 'Y-m-d' );
	
	$date1 = new DateTime( $fdato );
	$date2 = $date1->diff( new DateTime( $ddato ) );
	
	/* Skriver ut alder */
	echo "Denne personen er ";
	echo $date2->days . ' dager gammel hvilket tilsvarer: ';
	echo $date2->y . ' år, ';
	echo $date2->m . ' måneder og ';
	echo $date2->d . ' dager ';
	
	/* Kan brukes om man tar med tidspunkt også */
	//echo $date2->h.' timer ';
	//echo $date2->i.' minutter ';
	//echo $date2->s.' sekunder ';	
}
else
{
	echo "Du må oppgi fdato via en GET-variabel";
}
?>