<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Start session */
	session_start();

	/* Connect to database */
	require_once 'db.inc.php';

	/* Include required classes */
	require_once 'L7-user.lib.php';
	require_once 'L8-auth.lib.php';

	/* Form sent? Submit this code only if form is sent. */
	if ( isset( $_POST['reg-send'] ) )
	{	
		/* Find user */				
		$user = new User;
		$paramsSelection = array( 'ID', 'firstname', 'passw' );
		$paramsWhere = array( '=' => array( 'username' => $_POST['brukernavn'] ) );
		$stmt = $user->pget( $paramsSelection, $paramsWhere, $connection );

		if ( !is_object( $stmt ) )
		{
			die('prepare() feilet: ' . $stmt );
		}
		else
		{		
			$resultget = $user->get( $stmt, $paramsWhere );

			if ( is_array( $resultget ) )
			{
				/* Check if username and password is correct. */
				if ( count( $resultget ) == 1 ) // One user has this combination (all other results are incorrect)
				{
					/* Verify password */
					if ( password_verify( $_POST['passord'], $resultget[0]['passw'] ) )
					{
						/* Set SESSION variables to check if someone is logged in */
						$_SESSION['user']['id'] = $resultget[0]['ID'];
						$_SESSION['user']['username'] = $_POST['brukernavn'];
						$_SESSION['user']['firstname'] = $resultget[0]['firstname'];
						
						header("Location: L8-innsia.php");
						exit();
					}
					else
					{
						/* Loads login page again with error message forcing new login */
						header("Location: L10-login.php?em=2");
						exit();
					}
				}
				else 
				{
					/* Loads login page again with error message forcing new login */
					header("Location: L10-login.php?em=2");
					exit();
				}
			}
			elseif ( is_string( $resultget ) )
			{
				/* Sluttbeskjed */
				echo "<br /> Kan ikke hente medlemmer fra databasen: " . $resultget;
			}
			else
			{
				/* Sluttbeskjed */
				echo "<br /> Noe gikk åt skogen her.";
			}
		}
	}

	/* Output error message */
	if ( isset( $_GET['em'] ) )
	{
		switch ( $_GET['em'] ) 
		{
			case 1:
				session_unset(); // Fjern alle session-variabler
				session_destroy(); // Ta knekken på session
				echo "Du er nå logget ut! Takk for besøket ;) <br />";
				break;
			case 2:
				echo "Brukernavn og/eller passord er galt <br />";
				break;
			case 3:
				echo "Du må logge inn for å få tilgang til denne siden <br />";
				break;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L8 - innlogging</title>
</head>

<body>
	<?php if ( !isset( $_SESSION['brukernavn'] ) )  { ?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<div>
			<div>
				<input type="text" name="brukernavn" placeholder="Brukernavn" />
			</div>
			<div>
				<input type="password" name="passord" placeholder="Passord" />
			</div>
		</div>
		<div>
			<input type="submit" name="reg-send" class="button" value="Logg inn">
		</div>
	</form>
	<?php } else { ?>
	<p>Du er innlogget som <?php echo $_SESSION['brukernavn']; ?> </p>
	<button onclick="document.location='L10-login.php?em=1'">Logg ut</button>
	<?php } ?>
</body>
</html>
