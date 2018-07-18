<!--
Mac Doussias
CST 336 Homework CSUMB
Lab 6
-->
<?php 
	session_start();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> OtterMart - Admin Site</title>
		       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    
		<style>
			@import url("css/style.css");
		</style> 	
	</head>
	<body>
		<h1> OtterMart - Admin Site </h1>
		
		<form method="POST" action="loginProcess.php">
			Username: <input type="text" name="username" /> <br />
			Password: <input type="password" name="password" /><br />
			
			<input type="submit" name="submitForm" value="Login!" /> <br />
		</form>
		
		<?php 
			if($_SESSION['incorrect']){
				echo "<p class='lead' id='error' style='color:red'>";
				echo "<strong>Incorrect Username or Password!</strong></p>";
			}
		?>		


			
	</body>
</html>
