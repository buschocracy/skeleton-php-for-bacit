<?php
/* *********************************************
Class: Auth
Library: IS115
Author: PAB
Version: 1.0.0
Last Update: Aug 14, 2020
************************************************/

/* Defining constants for this library */
define('AUTH_TABLE', 'is115_users');

/**
 * The Auth class provides shared functionality used for the handling of authorization.
 *
 */
class Auth extends User {

   /**
    * Check if user is authenticated.
    *
    * @return mixed				Returns boolean true (authorized) and boolean false (unauthorized).

    */
    function isAuthenticated( )
    {
		/* Checking $_SESSION variable */
		if ( isset( $_SESSION['user']['id'] ) && 
			 isset( $_SESSION['user']['username'] ) && 
			 isset( $_SESSION['user']['firstname'] ) )
		{
			return true;
		}
		else
		{
			return false;
		}
    }
}


?>