<?PHP
/* *********************************************
Author: PAB
Version: 1.0.0
Last Update: Aug 17, 2020
************************************************/

	/* Defining some constants to be used for connecting to host */
	define('MYSQL_HOST', 'db');
	define('MYSQL_USER', 'dbuser');
	define('MYSQL_PASS', 'BACIT2020');
	define('MYSQL_DB', 'maindb');
	
	/* Connecting to host with data as previously defined */
	$connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DB);
	if ( !$connection )
	{
		die('The connection to the database failed. Please try again later.');
		exit();
	}
	return $connection;
?>