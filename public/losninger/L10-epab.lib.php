<?php
/* *********************************************
Class: User
Library: IS115
Author: PAB
Version: 1.0.0
Last Update: Aug 13, 2020
************************************************/

/* Defining constants for this class */
define('EPAB_TABLE', 'epab');

/**
 * The City class provides shared functionality used for handling of postage information.
 *
 */
class City {
	
    /**
     * User id.
     * @var int
     */
    public $id					= "";

    /**
     * Postno.
     * @var int
     */
    public $postno				= "";
	
    /**
     * City.
     * @var string
     */
    public $city			= "";

    /**
     * Municipality no.
     * @var int
     */
    public $munino				= "";

    /**
     * Municipality name.
     * @var string
     */
    public $muni				= "";

    /**
     * Category.
     * @var text
     */
    public $category			= "";

	
	
	/**
	 * OK-
     * Prepare get list of cities.
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
			$query .= " FROM " . EPAB_TABLE . " WHERE ";

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
			
			echo $query . "<br />";
			
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
     * Get a list of cities.
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
			
			echo '<br>' . $types . ' '; var_dump( $bind_array );
			
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