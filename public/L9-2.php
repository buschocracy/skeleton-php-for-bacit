<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	/* Define directory */
	$dir = './'; // current directory is shown as ./
	$dirRef = opendir( $dir );

	/* Creating table */
	echo "<table>";
    echo "<tr>";
    echo "<th>Filnavn</th>";
    echo "<th>Filtype</th>";
    echo "<th>Filstr.</th>";
	echo "<th>Sist endret</th>";
	echo "<th>X</th>";
	echo "<th>R</th>";
	echo "<th>W</th>";
    echo "</tr>";
	  
	/* Iterate through directory */
	while ( ( $next = readdir( $dirRef ) ) )
	{
		echo "<tr>";
		echo "<td><a href='$next'>" . $next . "</a></td>";
		echo "<td>" . filetype( $next ) . "</td>";
		echo "<td>" . filesize( $next ) . "</td>";
		echo "<td>" . date( "d.m.Y \k\l. H:i", filemtime( $next ) ) . "</td>";
		echo "<td>" . ( is_executable( $next ) ? "Y" : "N" ) . "</td>";
		echo "<td>" . ( is_readable( $next ) ? "Y" : "N" ) . "</td>";
		echo "<td>" . ( is_writeable( $next ) ? "Y" : "N" ) . "</td>";
		echo "</tr>";
	}
	
	/* Close directory */
	closedir( $dirRef );
?>