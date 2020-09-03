<?php
/* Hent etternavn via GET */
if ( isset( $_GET['etternavn'] ) )
{
	/* Definerer variabler som skal brukes */
	$maxpos = strlen( $_GET['etternavn'] ) - 1;
	$passord = "";
	
	/* Passordet skal være åtte tegn langt */
	for( $i=1; $i<=8; $i++ )
	{
		/* Finn tegn i etternavn */
		$tegnpos = rand( 0, $maxpos );
		$upper = rand( 1, 2 );
		
		/* Lager store bokstaver tilfeldig */
		if ( $upper == 1 )
		{
			/* Lager stor bokstav */
			$tegn = substr( strtoupper( $_GET['etternavn'] ), $tegnpos, 1 );
			$passord .= $tegn;
		}
		else
		{
			/* Hent vilkårlig bokstav fra etternavn */
			$tegn = substr( strtolower( $_GET['etternavn'] ), $tegnpos, 1 );
			$passord .= $tegn;
		}
	}
	
	/* Gjør minst en av bokstavene om til siffer */
	if ( ctype_upper( $passord ) )
	{
		$pos = rand( 0, 7 );
		$passord = substr_replace( $passord, rand( 0, 9 ), $pos, 1 );
	}
	else
	{
		for( $pos=0; $pos<8; $pos++ )
		{
			/* Sjekker at stor bokstav ikke overskrives */
			if ( !ctype_upper( substr( $passord, $pos, 1 ) ) )
			{
				/* Lager tall */
				$passord = substr_replace( $passord, rand( 0, 9 ), $pos, 1 );
				break;
			}
		}
	}
	
	/* Skriv ut passord */
	echo "Følgende passord er generert: " . $passord;
}
else
{
	echo "Du må oppgi etternavn via en GET-variabel";
}
?>