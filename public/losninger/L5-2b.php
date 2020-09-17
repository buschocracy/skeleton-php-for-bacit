<?php
/* Hent etternavn via GET */
if ( isset( $_GET['lastname'] ) )
{
    /* Split string into array */
    $array = str_split( $_GET['lastname'] );

    /* Ensures that the password will be at eight chars long */
    while( count( $array ) < 8 )
    {
        $array[] = chr( rand( 97,122 ) );
    }

    /* Shuffle array */
    shuffle( $array );

    /* Ensures at least one capital letter */
    $letter = chr( rand( 65,90 ) );
    $posc = rand( 0, count( $array ) - 1 );
    $array[$posc] = $letter;

    /* Ensures at least one number */
    $number = rand( 0, 9 );
    
    do
    {
        $posi = rand( 0, count( $array ) - 1 );
    }
    while( $posi == $posc );
    
    $array[$posi] = $number;

    /* Show generated password */
    echo '<strong>' . $_GET['lastname'] . '</strong> became <strong>' . implode( '', $array ) . '</strong>';
}