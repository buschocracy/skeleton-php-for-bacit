<?php
$tysk = array( 'en' => 'eins', 'to' => 'zwei', 'tre' => 'drei', 'fire' => 'vier' );
$engelsk = array( 'en' => 'one', 'to' => 'two', 'tre' => 'three', 'fire' => 'four' );
$spansk = array( 'en' => 'uno', 'to' => 'dos', 'tre' => 'tres', 'fire' => 'cuatro' );

$norskord = $_POST['norsk-ord'];

/* Form submitted? */
if ( isset( $_POST['oversett'] ) ) 
{ 
    $messages = array();

	if ( empty ($_POST['norsk-ord']) )
	{
		$messages[] = 'Du må fylle inn det norske ordet som skal oversettes <br />';
    }
    if ( !array_key_exists( $_POST['norsk-ord'], $tysk ) )
    {
        $messages[] = 'Dette er en svært begrenset ordbok og ordet <strong>' . $_POST['norsk-ord'] . '</strong> finnes dessverre ikke ennå i ordboka<br />';
    }

    if( empty($messages) )
    {
        echo 'Det norske ordet <strong>' . $_POST['norsk-ord'] . '</strong> blir <strong>' . $tysk[$norskord] . '</strong> på tysk <br />';
        echo 'Det norske ordet <strong>' . $_POST['norsk-ord'] . '</strong> blir <strong>' . $engelsk[$norskord] . '</strong> på engelsk <br />';
        echo 'Det norske ordet <strong>' . $_POST['norsk-ord'] . '</strong> blir <strong>' . $spansk[$norskord] . '</strong> på spansk <br />';
    }
    else
    {
        foreach( $messages as $key => $message )
        {
            echo $message . '<br>';
        }
    }
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>M4 - øving 1</title>
</head>

<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>
			<label for="norsk-ord">Det norske ordet</label>
			<input name="norsk-ord" type="text" value="<?php if ( isset( $_POST['norsk-ord'] ) ) { echo $_POST['norsk-ord']; } ?>">
		</p>
		<p>
			<button type="submit" name="oversett">Oversett</button>
		</p>
	</form>
</body>
</html>