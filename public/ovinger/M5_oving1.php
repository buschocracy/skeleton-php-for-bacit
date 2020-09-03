<?php

function encrypt_string ( $estring, $ekey )
{
	/* Define array for encrypted value */
	$carr = array();
	
	/* Define string */
	$cstring = '';
	
	/* Convert string into array */
	$arr = str_split( $estring );
	
	/* Iterate array */
	for( $i=0; $i<count($arr); $i++ )
	{
		/* Convert byte */
		$cchunk = ord( $arr[$i] );
		$schunk = $cchunk + $ekey;
		
		/* Add to array - new encrypted array */
		$carr[] = $schunk;
	}
	
	/* Iterate encrypted array */
	for( $i=0; $i<count($carr); $i++ )
	{
		$echunk = chr( $carr[$i] );
		$cstring = $cstring . $echunk;
	}
	
	return $cstring;
}

$estring = encrypt_string ( 'Dette er en hemmelig beskjed!', 2 );
echo $estring;
?>