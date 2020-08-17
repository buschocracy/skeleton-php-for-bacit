<?php
/* Hent etternavn via GET */
if ( isset( $_GET['etternavn'] ) )
{
	$etternavn = strtolower( $_GET['etternavn'] );
	$etternavn = ucfirst( $etternavn );
	
	echo "Etternavnet " . $etternavn . " er " . strlen( $etternavn ) . " tegn langt.";
}
else
{
	echo "Du må oppgi etternavn via en GET-variabel";
}
?>