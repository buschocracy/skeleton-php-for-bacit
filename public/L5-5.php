<?php
/* Hent etternavn via GET */
if ( $_GET['send'] == 'ja' )
{
	$to      = 'peter.a.busch@uia.no';
	$subject = 'E-post til meg selv';
	$message = 'Dette er en test som en del av skrivekurset IS-115';
	$headers = array(
		'From' => 'hostmaster@pox.no',
		'Reply-To' => 'hostmaster@pox.no',
		'X-Mailer' => 'PHP/' . phpversion()
	);

	mail( $to, $subject, $message, $headers );
}
else
{
	echo "Du må oppgi om du vil sende e-post via en GET-variabel (send=ja)";
}
?>