<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Connect to database */
	require_once 'db.inc.php';

	/* Include required classes */
	require_once 'L7-activities.lib.php';

	/* Find members */				
	$activity = new Activity;
	$paramsSelection = array( 'ID', 'startTime', 'endTime', 'title', 'description', 'location' );
	$paramsWhere = array( '>' => array( 'endTime' => date( 'Y-m-d H:i:s') ) ); // endTime > now
	$stmt = $activity->pget( $paramsSelection, $paramsWhere, $connection );
	$resultget = $activity->get( $stmt, $paramsWhere );

	/* Check if database contains members */
	if ( count( $resultget ) > 0 )
	{
		/* Build table - begin */
		echo '<table>';
		echo '<tr>';
		echo '<th>Aktivitet</th>';
		echo '<th>Start</th>';
		echo '<th>Slutt</th>';
		echo '<th>Beskrivelse</th>';
		echo '<th>Sted</th>';
		echo '</tr>';

		/* Show activities */
		for( $i=0; $i < count( $resultget ); $i++ )
		{
			echo '<tr>';
			echo '<td>' . $resultget[$i]['title'] . '</td>';
			echo '<td>' . $resultget[$i]['startTime'] . '</td>';
			echo '<td>' . $resultget[$i]['endTime'] . '</td>';
			echo '<td>' . $resultget[$i]['description'] . '</td>';
			echo '<td>' . $resultget[$i]['location'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	else 
	{
		/* No members in database */
		echo "Databasen inneholder ingen aktiviteter. Du kan kanskje lage noen? :)";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L7-4</title>
</head>

<body>
	
</body>
</html>
