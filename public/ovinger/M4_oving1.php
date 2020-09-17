<?php
/* Form submitted? */
if ( isset( $_POST['contact-send'] ) ) 
{ 
	$messages = array();
	
	if ( empty ($_POST['contact-name']) )
	{
		$messages[] = 'Du må fylle inn navn';
	}
	if ( empty ($_POST['contact-cellphone']) )
	{
		$messages[] = 'Du må fylle inn mobilnummer';
	}
	
	if ( empty ($messages) )
	{
		$messages[] = 'Takk, det er fint!';
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
		<p><?php 
			if ( !empty($messages) ) { 
				foreach( $messages as $key => $message )
				{
					echo $message . '<br>';
				}
			} 
		?>
		<p>
			<label for="contact-name">Name</label>
			<input name="contact-name" type="text" value="<?php if ( isset( $_POST['contact-name'] ) ) { echo $_POST['contact-name']; } ?>">
		</p>
		<p>
			<label for="contact-cellphone">Cellphone</label>
			<input name="contact-cellphone" type="text" value="<?php if ( isset( $_POST['contact-cellphone'] ) ) { echo $_POST['contact-cellphone']; } ?>">
		</p>
		<p>
			<button type="submit" name="contact-send">Send</button>
		</p>
	</form>
</body>
</html>