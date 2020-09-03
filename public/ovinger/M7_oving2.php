<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Connect to database */
	require_once $_SERVER['DOCUMENT_ROOT'] . '/site/inc/db.inc.php'; // kjørt på delphi.science

	/* Defining constants for this library */
	define('CLASS_TABLE', 'ds_logentries');

	/* Building query */
	$query  = "INSERT INTO " . CLASS_TABLE . " (logcode, logentry, ip, host) ";
	$query .= "VALUES (?, ?, ?, ?)";

	/* Prepare statement */
	$stmt = $connection->prepare( $query );

	/* Check if this went alright */
	if ( !$stmt )
	{
		echo "Dette gikk ikke bra :-( " . $connection->error;
	}

	/* Data to be inserted */
	$logcode = 1;
	$logentry = 'Dette er en test i IS-115';
	$ip = $_SERVER['REMOTE_ADDR'];
	$host = gethostbyaddr( $ip );

	echo "IP: " . $ip . "<br>";

	/* Bind parameters */
	$stmt->bind_param( "isss", $logcode, $logentry, $ip, $host );

	/* Execute statement */
	$stmt->execute();

	if ( $stmt->affected_rows == 1 )
	{
		echo "ID for entry: " . $stmt->insert_id;
		$stmt->close();
	}
	else
	{
		echo $stmt->error;
	}
?>