<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	/* Include required classes */
	require_once 'L10-log.lib.php';
	require_once 'L10-validation.lib.php';

	/* Create new validation object */
	$validation = new Validation;

	/* Validate phone number - will return false */
	$x = $validation->validate_pn( 2987744 );
	var_dump( $x );

	/* Log this error - omitted for all other examples in this file */
	

	/* Validate email - will return false */
	$x = $validation->validate_pn( 'programmereren@is115' );
	var_dump( $x );

	/* Sanitize input - will return allowed text */
	$var = '<strong><?php echo "yohoo!"; ?>Bare </strong>lovlig tekst';
	$x = $validation->clean_input( $var );
	var_dump( $x );
?>