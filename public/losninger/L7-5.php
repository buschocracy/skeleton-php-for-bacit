<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Connect to database */
	require_once 'db.inc.php';

	/* Create query without using a class */
	$sql  = 'SELECT is115_interests.interest, is115_userinterests.UID, is115_users.firstname ';
	$sql .= 'FROM is115_interests ';
	$sql .= 'INNER JOIN is115_userinterests ';
	$sql .= 'ON is115_interests.ID=is115_userinterests.IID ';
	$sql .= 'INNER JOIN is115_users ';
	$sql .= 'ON is115_userinterests.UID=is115_users.ID ';
	$sql .= 'ORDER BY is115_interests.interest, is115_users.firstname ASC';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L7-5</title>
</head>

<body>
<?php
	if ( $result = mysqli_query( $connection, $sql ) )
	{
		/* Return the number of rows in result set */
		echo 'Databasesøket ga ' . mysqli_num_rows($result) . ' treff. <br />';
		
		/* Build table - begin */
		echo '<table>';
		echo '<tr>';
		echo '<th>Interesse</th>';
		echo '<th>Medlemsnr</th>';
		echo '<th>Fornavn</th>';
		echo '</tr>';
		
		$last_interest = '';
		while ( $row = $result->fetch_array( MYSQLI_ASSOC ) )
		{			
			/* Continue table */
			echo '<tr>';
			echo '<td>'; if ( $row['interest'] !== $last_interest ) { echo $row['interest']; } echo '</td>';
			echo '<td>' . $row['UID'] . '</td>';
			echo '<td>' . $row['firstname'] . '</td>';
			echo '</tr>';
			
			/* List interest once only */
			$last_interest = $row['interest']; // Just for cosmetic reasons listing interest once
		}
		
		/* Free result set */
		mysqli_free_result($result);
	}
	else 
	{
		/* No members in database */
		echo "Databasen inneholder ingen oversikt over interesser. Du kan kanskje legge til noen? :)";
	}
	
	/* Close connection */
	mysqli_close( $connection );
?>
</body>
</html>