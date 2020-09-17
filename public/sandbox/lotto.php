<?php
setlocale(LC_ALL, "nb_NO");

/* Informasjon om premier */
echo "<strong>Vi kjører fast premiepott i hver trekning:</strong><br />";
echo "1. premie: 4 mill. kr. <br />";
echo "2. premie: 250.000 kr. <br />";
echo "3. premie: 6.000 kr. <br />";
echo "4. premie: 500 kr. <br />";
echo "5. premie: 50 kr. <br /><br />";

/* Antall trekninger */
echo "Din kupong trekkes i " . $_GET['trekninger'] . " trekninger. <br /><br />";

/* Lage lottokupong */
echo "<strong>Din lottokupong er automatisk generert og ser slik ut:</strong><br />";

$lottokupong = array();
$premie = array(1=>0, 2=>0, 3=>0, 4=>0, 5=>0);

/* Ti rekker */
for ( $i=1; $i<=10; $i++)
{
	/* Syv tall i hver rekke */
	$rekke = array();
	for ( $n=1; $n<=7; $n++)
	{
		do 
		{
			$tt = rand(1, 34);
		} 
		while( in_array( $tt, $rekke ) );		

		$rekke[] = $tt;
	}
	sort( $rekke );
	$lottokupong[$i] = $rekke;
	unset( $rekke );
	unset( $n );
}

/* Printing array */
for ( $i=1; $i<=10; $i++ )
{
	echo "Rekke " . $i . ": " . implode( " ", $lottokupong[$i] ) . "<br />";
}

/* Trekning i X antall trekninger */
for ( $u=1; $u<=$_GET['trekninger']; $u++)
{
	$trekning = array();
	/* Trekker syv tall */
	for ( $n=1; $n<=7; $n++)
	{
		do 
		{
			$tn = rand(1, 34);
		} 
		while( in_array( $tn, $trekning ) );		
		
		$trekning[] = $tn;
	}
	/* Trekker ekstratall */
	do 
	{
		$te = rand(1, 34);
	} 
	while( in_array( $te, $trekning ) );		

	$ekstra = $te;
	
	//echo "<br /><br />Trekning: <br />";
	//echo "<pre>";
	//sort ( $trekning );
	//print_r( $trekning );
	//echo "</pre>";
	//echo "<br />Ekstratall: " . $ekstra . "<br />";
	
	
	/* Sjekker premier */
	for ( $lk=1; $lk<=10; $lk++)
	{
		$resultat = array_diff( $lottokupong[$lk], $trekning );
		$riktige = 7-count( $resultat );
		
		/* Premie? */
		switch ( $riktige ) 
		{
			case 7:
				$premie[1] = $premie[1] + 1;
				//echo "<br />I trekning " . $u . " fikk du " . $riktige . " riktige tall (1. premie!!)";
				break;
			case 6:
				if ( in_array( $ekstra, $lottokupong[$lk] ) )
				{
					$premie[2] = $premie[2] + 1;
					//echo "<br />I trekning " . $u . " fikk du " . $riktige . " riktige tall + 1 tilleggstall (2. premie)";
				}
				else
				{
					$premie[3] = $premie[3] + 1;
					//echo "<br />I trekning " . $u . " fikk du " . $riktige . " riktige tall (3. premie)";
				}
				break;
			case 5:
				$premie[4] = $premie[4] + 1;
				//echo "<br />I trekning " . $u . " fikk du " . $riktige . " riktige tall (4. premie)";
				break;
			case 4:
				$premie[5] = $premie[5] + 1;
				//echo "<br />I trekning " . $u . " fikk du " . $riktige . " riktige tall (5. premie)";
				break;
			default:
			   //echo "<br />Riktige: " . $riktige . "<br />";
		}		
	}	
}

	echo "<br /><strong>Antall rekker som har gått inn:</strong><br />";
	echo "1. premie: " . $premie[1] . " <br />";
	echo "2. premie: " . $premie[2] . " <br />";
	echo "3. premie: " . $premie[3] . " <br />";
	echo "4. premie: " . $premie[4] . " <br />";
	echo "5. premie: " . $premie[5] . " <br /><br />";
	
	$kostnad = $_GET['trekninger'] * 50;
	$vunnet = 	($premie[1] * 4000000) + 
				($premie[2] * 250000) + 
				($premie[3] * 6000) + 
				($premie[4] * 500) + 
				($premie[5] * 50);

	echo "<strong>Økonomi:</strong><br />";
	echo "Du har brukt " . utf8_encode( money_format( '%n', $kostnad ) ) . ",- på å tippe. <br />";
	echo "Du har vunnet eventyrlige " . utf8_encode( money_format( '%n', $vunnet ) ) . ",- på å tippe. <br />";
	
	if ( $vunnet > $kostnad )
	{
		echo "Dette var en god investering!";
	}
	else
	{
		echo "Ohoi! Du er dessverre en dårlig gambler :(";
	}
?>