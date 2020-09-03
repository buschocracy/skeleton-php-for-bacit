<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Including required classes */
	require_once '../site/lib/SimpleImage.php';

	/* Form submit? */
	if ( isset( $_POST['upload-send'] ) )
	{
		echo 'this script: ' . $_SERVER['SCRIPT_FILENAME'] . '<br>';
		echo 'name: ' . $_FILES['upload-file']['name'] . '<br>';
		echo 'tmpname: ' . $_FILES['upload-file']['tmp_name'] . '<br>';
		echo 'type: ' . $_FILES['upload-file']['type'] . '<br>';
		echo 'size: ' . $_FILES['upload-file']['size'] . '<br><br>';
		
		/* Define array for output messages */
		$opMessage = array();
		
		/* File upload */
		if ( is_uploaded_file( $_FILES['upload-file']['tmp_name'] ) )
		{
			/* Collecting information about file */
			$fileType = $_FILES['upload-file']['type'];
			$fileSize = $_FILES['upload-file']['size'];
			
			/* Configurations */
			$acceptedTypes = array( 
								  'image/jpeg',
								  'image/jpg',
								  'image/gif',
								  'image/png' );
			$maxFileSize = 1536000; // in bytes (bytes / 1024 = KB)
			$directory = $_SERVER['DOCUMENT_ROOT'] . '/is115/filer/';
			
			/* Constructing file name */
			$pos = strrpos( $_FILES['upload-file']['type'], "/" ) + 1;
			$suffix = substr( $_FILES['upload-file']['type'], $pos );
			$fileName  = date( 'YmdHis', time() ) . '.' . $suffix;
			
			/* If file exists for some reason */
			while ( file_exists( $directory . $fileName ) )
			{ 
				$fileName  = date( 'YmdHis', time() ) . '_(1).' . $suffix;
			}
			
			/* Errors? */
			if ( !in_array( $fileType, $acceptedTypes ) )
			{
				$opMessage[] = 'Ugyldig filtype.';
			}
			if ( $fileSize > $maxFileSize )
			{
				$opMessage[] = 'Filen du forsøker å laste opp er for stor.';
			}
			
			/* If everything is fine */
			if ( count( $opMessage ) < 1 )
			{
				/* Moving uploaded file to its new home */
				$filePath = $directory . $fileName;
				$uploadedFile = move_uploaded_file( $_FILES['upload-file']['tmp_name'], $filePath );
				
				if ( !$uploadedFile )
				{
					$opMessage[] = 'Filen kunne ikke lastes opp.';
				}
				else
				{
					/* All is well */
					$opMessage[] = 'Filen ble lastet opp og finnes her: ' . $filePath;
					
					/* Resize and make thumbnail */
					$image = new SimpleImage();
					$image->load( $filePath );
					$image->resize( 285,180 );
					$image->save( $directory . str_replace( '.', '_thumb.', $fileName ) );
				}
			}
		}
		else
		{
			$opMessage[] = 'Ingen fil ble valgt.';
		}

		/* Output messages to user */
		echo '<strong>Beskjeder til bruker: </strong>';
		foreach( $opMessage as $message )
		{
			echo $message . '<br>';
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>M9 - øving 1</title>
</head>

<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?> " enctype="multipart/form-data">
		<p>
			<label for="upload-file">Fil</label>
			<input name="upload-file" id="upload-file" type="file">
		</p>
		<p>
			<button type="submit" name="upload-send">Last opp fil</button>
		</p>
	</form>
</body>
</html>