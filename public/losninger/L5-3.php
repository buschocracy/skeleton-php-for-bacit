<?php
/* Hent etternavn via GET */
if ( isset( $_GET['etternavn'] ) )
{
	echo strip_tags( $_GET['etternavn'] );
}
else
{
	echo "Du må oppgi etternavn via en GET-variabel";
}
?>