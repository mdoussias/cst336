<?php

	/* This function has all the essentials to create a connection to a database */
	function getDatabaseConnection($dbname = 'ottermart'){ /*Note here that default value of $dbname parameter is 'ottermart' */
		
		//Create variables and populate them
		$host = 'localhost'; //cloud 9
		//$dbname = 'tcp';
		$username = 'root';
		$password = '';
		
		//when connecting from Heroku
		if (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) { 
			$url = parse_url(getenv("CLEARDB_DATABASE_URL")); $host = $url["host"];
			$dbname = substr($url["path"], 1);
			$username = $url["user"];
			$password = $url["pass"]; 
			
		}
	
		//Creates a db connection
		$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		
		//Display errors when accessing tables
		$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		return $dbConn; //Returns a connection object
	}

?>
