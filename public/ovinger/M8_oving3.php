<?php
	/* Start session */
	session_start();

	/* Er session satt? */
	if ( !isset( $_SESSION['brukernavn'] ) )
	{
		/* Kaller opp siden på nytt igjen og tvinger ny innlogging */
		header("Location: M8_oving2.php?message=error");
		exit();
	}
	else
	{
		echo "Du er innlogget som " . $_SESSION['brukernavn'];
	}
?>