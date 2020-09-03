<?php
$lodd = array();
for ( $i=1; $i<=15; $i++ )
{
	do
	{
		$dl = rand(1, 100);
	}
	while( in_array( $dl, $lodd ) );
	
	$lodd[] = $dl;
}
sort( $lodd );

echo 'Ditt lodd er: ' . implode( ' ', $lodd ) . '<br>';

$vinnerlodd = rand(1, 100);

echo 'Vinnerloddet er: ' . $vinnerlodd . '<br>';

if ( in_array( $vinnerlodd, $lodd ) )
{
	echo 'Jippi! Du har vunnet!!';
}
else
{
	echo 'Du har dessverre ikke vunnet denne gang, men du kan prøve igjen';
}
?>