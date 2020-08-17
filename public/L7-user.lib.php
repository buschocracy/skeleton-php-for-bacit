<?php
/* *********************************************
Class: User
Library: IS115
Author: PAB
Version: 1.0.0
Last Update: Aug 13, 2020
************************************************/

/* Defining constants for this class */
define('CLASS_TABLE', 'neo_users');

/**
 * The User class provides shared functionality used for handling of users.
 *
 */
class User {
	
    /**
     * User id.
     * @var int
     */
    public $id					= "";

    /**
     * Revoke status for user.
     * @var int
     */
    public $rvkd				= "";

	/**
     * Timestamp.
     * @var UNIX timestamp
     */
    private $dateCreated		= "";

	/**
     * Timestamp.
     * @var UNIX timestamp
     */
    private $dateEdited			= "";
	
    /**
     * Username.
     * @var string
     */
    public $username			= "";

    /**
     * User password.
     * @var string
     */
    public $passw				= "";

    /**
     * User firstname.
     * @var string
     */
    public $firstname			= "";

    /**
     * User lastname.
     * @var text
     */
    public $lastname			= "";

    /**
     * User fullname.
     * @var string
     */
    public $fullname			= "";

    /**
     * User title.
     * @var string
     */
    public $title				= "";

    /**
     * User affiliation department.
     * @var string
     */
    public $affiliation_dep		= "";

    /**
     * User affiliation organization.
     * @var string
     */
    public $affiliation_org		= "";

    /**
     * User region.
     * @var string
     */
    public $region				= "";

    /**
     * User country.
     * @var string
     */
    public $country				= "";

    /**
     * User email.
     * @var string
     */
    public $email				= "";

    /**
     * User cellphone.
     * @var string
     */
    public $cellphone			= "";

    /**
     * User registration code.
     * @var string
     */
    public $regcode				= "";
	
    /**
     * User ORCID_ID.
     * @var string
     */
    public $ORCID_ID			= "";

    /**
     * User ORCID_access_token.
     * @var string
     */
    public $ORCID_access_token	= "";

    /**
     * User ORCID_refresh_token.
     * @var string
     */
    public $ORCID_refresh_token	= "";

    /**
     * User ORCID_address.
     * @var string
     */
    public $ORCID_address		= "";

    /**
     * User ORCID_keywords.
     * @var string
     */
    public $ORCID_keywords		= "";

    /**
     * User ORCID_researcher-urls.
     * @var string
     */
    public $ORCID_researcher_urls = "";

    /**
     * User ORCID_employments.
     * @var string
     */
    public $ORCID_employments	= "";

    /**
     * User ORCID_peer-reviews.
     * @var string
     */
    public $ORCID_peer_reviews	= "";

    /**
     * User ORCID_works.
     * @var string
     */
    public $ORCID_works			= "";

	
   /**
    * Prepare add user to database.
    *
    * @return mixed					Returns boolean true (success) and string (error).

    */
	public function padd( $fields, $connection )
	{
		if ( $fields && $connection )
		{
			/* INSERT query template */
			unset( $query ); unset( $values );
			$query  = "INSERT INTO " . CLASS_TABLE . " (";
				$values ="";
			
			/* Iterate fields array to identify fields to add info into */
			for( $i=0; $i < count( $fields ); $i++ )
			{
				$query  .= $fields[$i] . ", ";
				$values .= "?, ";
			}
			$query  = substr($query, 0, -2);
			$values = substr($values, 0, -2);
			$query .= ") VALUES (" . $values . ")";
			
			/* Prepare statement */
			$stmt = $connection->prepare( $query );

			/* Return statement variable if successful */
			if ( $stmt ) 
			{
				return $stmt;
			} 
			else 
			{
				return $connection->error;
			}
		}
		else
		{
			return false;
		}
	}
	
	
   /**
    * Add user to database.
    *
    * @return mixed					Returns boolean true (success) and string (error).

    */
	public function add( $fields, $stmt )
	{
		if ( $fields && $stmt )
		{
			/* Define array and types */
			$types = "";
			$fields2 = array();
				
			/* Iterating object for set properties */
			foreach ( $this as $parameter => $value )
			{
				/* Fields2 array must contain values in the correct order */
				$key = array_search( $parameter, $fields );
				
				/* Filling fields2 array with set object values in the correct order for bind_param */
				if ( $key || is_numeric( $key ) )
				{
					$fields2[$key] = $value;
				}
			}
			
			/* Filling array and types with values */
			for ( $i = 0; $i < count( $fields2 ); $i++ )
			{
				/* Check type of value */
				if ( is_numeric( $fields2[$i] ) ) 
				{
					$types .= "i";
				} 
				elseif ( is_double( $fields2[$i] ) ) 
				{
					$types .= "d";
				} 
				elseif ( is_string( $fields2[$i] ) ) 
				{
					$types .= "s";
				}					
			}
			ksort( $fields2 );
			
			/* Bind parameters */
			$stmt->bind_param( $types, ...$fields2 );

			/* Checking bind result */
			if ( $stmt )
			{
				/* Checking execution result */
				if ( $stmt->execute() && $stmt->affected_rows == 1 )
				{
					return $stmt->insert_id;
					$stmt->close();
				}
				else
				{
					return $stmt->error;
				}
			}
			else
			{
				return $stmt->error;
			}
		}
		else
		{
			return false;
		}
	}

	
   /**
    * Prepare edit user.
    *
    * @return mixed					Returns boolean true (success) and string (error).

    */
	public function pedit( $fields, $connection )
	{
		if ( $fields && $connection )
		{
			/* UPDATE query template */
			$query  = "UPDATE " . CLASS_TABLE . " SET ";
			
			for($i=0; $i < count( $fields ); $i++)
			{
				$query .= $fields[$i] . "= ?, ";
			}
			$query = substr($query, 0, -2);
			$query .= " WHERE ID = ? LIMIT 1";
			
			/* Prepare statement */
			$stmt = $connection->prepare( $query );

			/* Return statement variable if successful */
			if ( $stmt ) 
			{
				return $stmt;
			} 
			else 
			{
				return $connection->error;
			}
		}
		else
		{
			return false;
		}
	}
	

    /**
	 * OK-
     * Update user profile.
	 *
     * @return boolean				Returns true on success and false on failure.
     */
    function edit( $fields, $stmt )
    {
		if ( $fields && $stmt )
		{
			/* Define array and types */
			$types = "";
			$fields2 = array();
			
			/* Iterating object for set properties */
			foreach ( $this as $parameter => $value )
			{
				/* Fields2 array must contain values in the correct order */
				$key = array_search( $parameter, $fields );
				
				/* Filling fields2 array with set object values in the correct order for bind_param */
				if ( $key )
				{
					$fields2[$key] = $value;
				}
				elseif ( is_numeric( $key ) )
				{
					$fields2[$key] = $value;
				}
			}
			$fields2[] = $this->id; // adding id to the end as it will always be in the end
			
			/* Filling array and types with values */
			for ( $i = 0; $i < count( $fields2 ); $i++ )
			{
				/* Check type of value */
				if ( is_numeric( $fields2[$i] ) ) 
				{
					$types .= "i";
				} 
				elseif ( is_double( $fields2[$i] ) ) 
				{
					$types .= "d";
				} 
				elseif ( is_string( $fields2[$i] ) ) 
				{
					$types .= "s";
				}					
			}
			ksort( $fields2 );
			
			/* Bind parameters */
			$stmt->bind_param( $types, ...$fields2 );

			/* Checking bind result */
			if ( $stmt )
			{
				/* Checking execution result */
				if ( $stmt->execute() && $stmt->affected_rows == 1 )
				{
					return true;
					$stmt->close();
				}
				else
				{
					return $stmt->error;
				}
			}
			else
			{
				return $stmt->error;
			}
		}
		else
		{
			return false;
		}
    }
	
	
	/**
	 * OK-
     * Prepare get list of users.
     *
     * @param array $paramsSelection      The non-associative array with all neccessary data for the selection part of the query.
     * @param array $paramsWhere          The multidimensional associative array with all neccessary data for the where part of the query.
     * @param string $sort                Indicates sort order - default ASC.
	 * @param string $sortBy          	  Indicates sort by - default lastname, firstname.
	 *
     * @return mixed                      Returns result on success and false on failure.
     */
    function pget($paramsSelection, $paramsWhere, $connection, $limit = 0, $sort = 'DESC', $sortBy = 'ID')
    {
		if ( $paramsSelection && $paramsWhere && $connection )
		{
			/* SELECT query template */
			$query = "SELECT ";

			/* Building selection */
			$query .= implode(", ", $paramsSelection);

			/* Building middle section of query */
			$query .= " FROM " . CLASS_TABLE . " WHERE ";

			/* Building where clause */
			reset( $paramsWhere );
			foreach ( $paramsWhere as $operator => $nestedarray )
			{
				foreach ( $nestedarray as $key => $val )
				{
					$query .= "$key " . $operator . " ? && ";
				}
			}
			$query = substr($query, 0, -4);

			/* End of SELECT query */
			$query .= " ORDER BY " . $sortBy .  " " . $sort;
			
			/* LIMIT results? */
			if ( $limit )
			{
				$query .= " LIMIT " . $limit;
			}
			
			//echo $query;
			
			/* Prepare statement */
			$stmt = $connection->prepare( $query );

			/* Return statement variable if successful */
			if ( $stmt ) 
			{
				return $stmt;
			} 
			else 
			{
				return $connection->error;
			}
		}
		else
		{
			return false;
		}
	}
			
			
	/**
	 * OK-
     * Get a list of users.
     *
     * @param array $paramsWhere          The multidimensional associative array with all neccessary data for the where part of the query.
	 *
     * @return mixed                      Returns result on success and false on failure.
     */
    function get($stmt, $paramsWhere)
    {
		if ( $stmt && $paramsWhere )
		{
			/* Define arrays and types */
			$bind_array = array();
			$types = "";
			$result = array();
			
			/* Filling array and types with values */
			reset( $paramsWhere );
			foreach ( $paramsWhere as $operator => $nestedarray )
			{
				foreach ( $nestedarray as $key => $val )
				{
					$bind_array[] = $val;
					
					/* Check type of value */
					if ( is_numeric( $val ) ) 
					{
						$types .= "i";
					} 
					elseif ( is_double( $val ) ) 
					{
						$types .= "d";
					} 
					elseif ( is_string( $val ) ) 
					{
						$types .= "s";
					}					
				}
			}
			
			//echo '<br>' . $types . ' '; var_dump( $bind_array );
			
			/* Bind parameters */
			$stmt->bind_param( $types, ...$bind_array );
			
			/* Checking bind params */
			if ( $stmt )
			{
				/* Checking execute stmt and store result */
				if ( $stmt->execute() && $stmt->store_result() )
				{
					/* Which fields have been fetched */
					$meta = $stmt->result_metadata();
					while ( $field = $meta->fetch_field() )
					{
						$params[] = &$row[$field->name];
					}

					call_user_func_array( array( $stmt, 'bind_result' ), $params );						
					
					while ( $stmt->fetch() ) 
					{
						foreach( $row as $key => $val )
						{
							$c[$key] = $val;
						}
						$result[] = $c;
					}
				
					return $result;
					$stmt->close();
				}
				else
				{
					return $stmt->error;
				}
			}
			else
			{
				return $stmt->error;
			}
		}
		else
		{
			return false;
		}
    }


    /**
     * Validate password.
     *
     * @param string pwd  				Password to be validated.
	 *
     * @return boolean        			Returns true on success and false on failure.
     */
    function validatePassword( $pwd )
    {
		/* Define array */
		$opMessage = array();
		
		/* Preg match string */
		$uppercase 		= preg_match( '@[A-Z]@', $pwd );
		$lowercase 		= preg_match( '@[a-z]@', $pwd );
		$number    		= preg_match( '@[0-9]@', $pwd );
		$specialChars 	= preg_match( '@[^\w]@', $pwd );
		
		if ( !$uppercase )
		{
			$opMessage[] = "Password must include at least one upper case letter";
		}
		if ( !$lowercase )
		{
			$opMessage[] = "Password must include at least one lower case letter";
		}
		if ( !$number )
		{
			$opMessage[] = "Password must include at least one number";
		}
		if ( !$specialChars )
		{
			$opMessage[] = "Password must include at least one special character.";
		}
		if ( strlen( $pwd ) < 8 )
		{
			$opMessage[] = "Password must be at least 8 characters in length.";
		}
		
		if ( $opMessage )
		{
			return $opMessage;
		}
		else
		{
			return true;
		}
    }

	
}