<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Start session */
	session_start();

	/* Include required classes */
	require_once 'L7-user.lib.php';
	require_once 'L8-auth.lib.php';
	// Is it necessary with a class 'auth'? Maybe not, but now we can expand it if we need more auth functions.

	/* Initiate object */
	$user = new Auth();

	/* Authorized? */
	if ( !$user->isAuthenticated() ) { header("Location: L8-login.php?em=3"); exit(); }

	/* Authorized - show values in SESSION array */
	echo "Innhold i SESSION-matrise: "; print_r( $_SESSION ); // Just for educational purposes
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Innsia</title>
</head>

<body>
	<p>Hei <?php echo $_SESSION['user']['firstname']; ?>! Du er innlogget som <strong><?php echo $_SESSION['user']['username']; ?></strong> her på Innsia :)</p>
	<button onclick="document.location='L8-login.php?em=1'">Logg ut</button>
</body>
</html>