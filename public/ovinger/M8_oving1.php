<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Start session */
	session_start();

	/* Check if session variable is set */
	if ( isset( $_SESSION['teller'] ) )
	{
		$_SESSION['teller']++;
	}
	else
	{
		$_SESSION['teller'] = 1;
	}

	/* Print information */
	$gangerord = ( $_SESSION['teller'] == 1 ) ? "gang" : "ganger";
	echo "Vi har telt og telt og kommet frem til at du har vært her " . $_SESSION['teller'] . " " . $gangerord;
?>