<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	/* Form submit? */
	if ( isset( $_POST['reg-send'] ) )
	{
		if ( $_FILES['photo']['type'] )
		{
			/* Finding suffix */
			switch ( $_FILES['photo']['type'] ) {
				case 'image/jpeg':
					$suffix = 'jpg';
					break;
				case 'image/jpg':
					$suffix = 'jpg';
					break;
				case 'image/png':
					$suffix = 'png';
					break;
			}
			
			/* File upload */
			if ( is_uploaded_file( $_FILES['photo']['tmp_name'] ) )
			{
				$fileType = $_FILES['photo']['type'];
				$fileSize = $_FILES['photo']['size'];
				
				$contentTypes = array( 
									  'image/jpeg',
									  'image/jpg',
									  'image/png' );
				$maxFileSize = 2048000; // in bytes (bytes / 1024 = KB)
				
				$directory = $_SERVER['DOCUMENT_ROOT'] . '/site/images/photos/';
				
				/* Constructing file name based on member's primary key in db */
				// Find PK
				$pk = 1;
				$fileName  = $pk . '.' . $suffix;
				
				/* If file exists for some reason */
				while ( file_exists( $directory . $fileName ) )
				{ 
					$fileName  = $pk . '_' . date( 'YmdHis' ) . '.' . $suffix; // Bildet blir lastet opp uansett om filnavn eksisterer. Alternativer er overskrivning, sletting, brukervarsling.
				}
				
				/* File type accepted? */
				if ( !in_array( $fileType, $contentTypes ) )
				{
					$opMessage = 'Ugyldig filtype.'; // opMessage = output message
				} 
				elseif ( $fileSize > $maxFileSize )
				{
					$opMessage = 'Filen du forsøker å laste opp er for stor.';
				}
				else
				{
					/* Moving uploaded file to it's new home */
					$newDirectory  = $directory . $fileName;
					$uploadedFile = move_uploaded_file( $_FILES['photo']['tmp_name'], $newDirectory );
					
					if ( !$uploadedFile )
					{
						$opMessage = 'Filen kunne ikke lastes opp.';
					}
					else
					{
						/* Alt OK */
						$opMessage = 'Filen ble lastet opp.';
					}
				}
			}
			else
			{
				/* Something went wrong */
				$opMessage = 'Noe gikk galt med opplastingen.';
			}
		}
	}
	else
	{
		/* Something went wrong */
		$opMessage = 'Last opp foto her.';
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Løsningsforslag L9-1</title>
</head>

<body>
	<p><?php if ( isset( $opMessage ) ) { echo $opMessage; } ?></p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
		<div>
			<div>
				<input name="photo" type="file" size="20">
			</div>
		</div>
		<div class="row">
			<input type="submit" name="reg-send" class="button" value="Last opp foto">
		</div>
	</form>
</body>
</html>
