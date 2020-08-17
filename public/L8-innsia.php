<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Start session */
	session_start();

	/* Include required classes */
	require_once 'L7-user.lib.php';
	require_once 'L8-auth.lib.php';

	/* Authorized? */
	header( 'Location: ' . ( isAuthenticated() ? '/members/index.php' : 'L8-login.php?em=3' ) ); exit();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Innsia</title>
</head>

<body>
	<p>Hei <?php echo $_SESSION['fornavn']; ?>! Du er innlogget som <?php echo $_SESSION['brukernavn']; ?> her på Innsia :)</p>
</body>
</html>