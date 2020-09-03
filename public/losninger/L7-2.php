<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Connect to database */
	require_once 'db.inc.php';

	/* Include required classes */
	require_once 'L7-user.lib.php';

	/* Find members */				
	$user = new User;
	$paramsSelection = array( 'ID', 'firstname', 'lastname', 'email', 'cellphone', 'age' );
	$paramsWhere = array( '=' => array( 'rvkd' => 0 ) ); // revoked=1 means that the member is deleted
	$stmt = $user->pget( $paramsSelection, $paramsWhere, $connection );
	$resultget = $user->get( $stmt, $paramsWhere );

	/* Check if database contains members */
	if ( count( $resultget ) > 0 )
	{
		/* Build table - begin */
		echo '<table>';
		echo '<tr>';
		echo '<th>Fornavn</th>';
		echo '<th>Etternavn</th>';
		echo '<th>E-post</th>';
		echo '<th>Mobil</th>';
		echo '<th>Alder</th>';
		echo '</tr>';

		/* Show members */
		for( $i=0; $i < count( $resultget ); $i++ )
		{
			echo '<tr>';
			echo '<td>' . $resultget[$i]['firstname'] . '</td>';
			echo '<td>' . $resultget[$i]['lastname'] . '</td>';
			echo '<td>' . $resultget[$i]['email'] . '</td>';
			echo '<td>' . $resultget[$i]['cellphone'] . '</td>';
			echo '<td>' . $resultget[$i]['age'] . '</td>';
			echo '</tr>';
		}
		echo '</table>';
	}
	else 
	{
		/* No members in database */
		echo "Databasen inneholder ingen medlemmer. Du kan kanskje verve noen? :)";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L7-2</title>
</head>

<body>
	
</body>
</html>