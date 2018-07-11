<?php

	/* This function has all the essentials to create a connection to a database */
	function getDatabaseConnection($dbname = 'ottermart'){ /*Note here that default value of $dbname parameter is 'ottermart' */
		
		//Create variables and populate them
		$host = 'localhost'; //cloud 9
		//$dbname = 'tcp';
		$username = 'root';
		$password = '';
		
		//Creates a db connection
		$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		
		//Display errors when accessing tables
		$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $dbConn; //Returns a connection object
	}

?>
