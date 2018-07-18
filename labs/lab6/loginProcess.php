<!--
LOGIN PROCESS
-->

<?php 
	session_start();
	include 'dbConnection.php';
	
	$conn = getDatabaseConnection('ottermart');
	
	$username = $_POST['username'];
	$password = sha1($_POST['password']);

/*
NOTE below will create a connection, however, it could be thwarted by malicious actors using injection attacks
This is the bad way, and that is why it is commented out:
	$sql = "SELECT *
			FROM om_admin
			WHERE username = '$username'
			AND password = '$password'";
*/	
// This is the good way to connect, by indirectly using variables to avoid injection attacks
	$sql = "SELECT *
			FROM om_admin
			WHERE username = :username
			AND password = :password";
	$np = array(); //create a named parameters array
	$np[":username"] = $username; 
	$np[":password"] = $password;
	
	$stmt = $conn->prepare($sql); //prepare the sql statement
	$stmt->execute($np); //execute the sql statement
	$record = $stmt->fetch(PDO::FETCH_ASSOC); // store results in variable record
	
	//Makes sure that the user input correct information that matches the db
	if(empty($record)){
		$_SESSION['incorrect'] = true;
		header("Location:login.php");
	}else{
		$_SESSION['incorrect'] = false;
		$_SESSION['adminName'] = $record['firstName']." ".$record['lastName'];
		header('Location:admin.php');
	}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<title> </title>
	
	</head>
	<body>
	


			
	</body>
</html>
