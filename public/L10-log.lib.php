<?php
/* *********************************************
Class: Log
Library: IS115
Author: PAB
Version: 1.0.0
Last Update: Aug 14, 2020
************************************************/

/* Defining constants for this library */
define('LOG_TABLE', 'is115_logentries');

/**
 * The Log::class provides shared functionality used for handling of log entries.
 *
 */
class Log {
	
    /**
     * Log id.
     * @var int
     */
    public $id					= "";

	/**
     * Timestamp.
     * @var UNIX timestamp
     */
    private $addedDate			= "";

	/**
     * Timestamp.
     * @var UNIX timestamp
     */
    private $editedDate			= "";

    /**
     * User id.
     * @var int
     */
    public $userid				= "";

    /**
     * Log category.
     * @var int
     */
    public $cat					= "";

    /**
     * Log code.
     * @var int
     */
    public $logcode				= "";

    /**
     * Log entry.
     * @var string
     */
    public $logentry			= "";

    /**
     * Affected file.
     * @var string
     */
    public $filename			= "";

    /**
     * Log entry from IP address.
     * @var string
     */
    public $ip					= "";
	
    /**
     * Log entry from host.
     * @var string
     */
    public $host				= "";
	
    /**
     * User came from referer.
     * @var string
     */
    public $referer				= "";

	
   /**
    * Prepare add log entry to database.
    *
    * @return mixed					Returns boolean true (success) and string (error).

    */
	public function padd( $fields, $connection )
	{
		if ( $fields && $connection )
		{
			/* INSERT query template */
			unset( $query ); unset( $values );
			$query  = "INSERT INTO " . LOG_TABLE . " (";
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
    * Add log entry to database.
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
    * Prepare edit log entry.
    *
    * @return mixed					Returns boolean true (success) and string (error).

    */
	public function pedit( $fields, $connection )
	{
		if ( $fields && $connection )
		{
			/* UPDATE query template */
			$query  = "UPDATE " . LOG_TABLE . " SET ";
			
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
     * Update log entry.
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
     * Prepare get list of log entries.
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
			$query .= " FROM " . LOG_TABLE . " WHERE ";

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
     * Get a list of log entries.
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

	
}