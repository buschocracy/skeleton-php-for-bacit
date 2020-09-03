<?php
/* *********************************************
Class: Log
Library: IS115
Author: PAB
Version: 1.0.0
Last Update: Aug 14, 2020
************************************************/

/**
 * The Validation class provides shared functionality used for validation of various inputs.
 *
 */
class Validation {

    /**
     * Validate email.
     *
     * @param string $email   			Email to be validated.
	 *
     * @return boolean        			Returns true on success and false on failure.
     */
    function validate_email( $email )
    {
		/* Preg match string */
		return preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email);

		/* Or using filter_var */
		//return filter_var( $email, FILTER_VALIDATE_EMAIL );
    }


    /**
     * Validate norwegian cellphone number.
     *
     * @param string $pn     			Norwegian cellphone number (8 digits) to be validated.
	 *
     * @return boolean        			Returns true on success and false on failure.
     */
    function validate_pn( $pn )
    {
		/* Check length */
		if ( strlen( $pn ) !== 8 )
		{
			return false;
		}
		/* Check range */
		elseif ( ( $pn < 40000000 ) || ( $pn < 90000000 && $pn > 49999999 ) )
		{
			return false;
		}
		/* Check numeric */
		elseif ( !is_integer( $pn ) )
		{
			return false;
		}
		/* All tests passed */
		else
		{
			return true;
		}
    }
	
	
    /**
     * Clean input.
     *
     * @param string $pn     			Norwegian cellphone number (8 digits) to be validated.
	 *
     * @return boolean        			Returns true on success and false on failure.
     */
	function clean_input( $user_input )
	{
		/* Use filter_var to strip var */
		return filter_var( $user_input, FILTER_SANITIZE_STRIPPED );
	}

}

?>