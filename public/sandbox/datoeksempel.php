<?php
date_default_timezone_set( 'Europe/Oslo' );
echo date( 'd.m.Y k\l. H:i' ) . '<br />';

$navn = 'Silje';

if( date( 'G' ) >= 9 )
{
    echo 'God formiddag ' . $navn . '!';
}
else
{
    echo 'Jaja, så var du her igjen ' . $navn;
}

?>