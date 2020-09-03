<?php
function sirkel( $radius )
{
	define('PI', 3.14159);
	
	$omkrets = 2 * PI * $radius;
	$areal = PI * $radius * $radius;

	echo 'Omkretsen av sirkelen er ' . round( $omkrets, 2 ) . ' og arealet av sirkelen er ' . round( $areal, 2 );
}

sirkel( $_GET['radius'] );
?>