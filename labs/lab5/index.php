<!--
Mac Doussias
CST 336 Homework CSUMB LAB5
-->




<?php
	include 'dbConnection.php';
	
	//Creates a connection object using function and stores it in the $conn variable
	$conn = getDatabaseConnection("ottermart");
	
	
	function displayCategories(){
		global $conn;
		
		$sql = "SELECT catID, catName FROM om_category ORDER BY catName";
		
		$stmt = $conn->prepare($sql); //This sends the sql statement in $sql variable to the database
		$stmt->execute(); //This executes the sql statement
		$records = $stmt->fetchAll(PDO::FETCH_ASSOC); //saves the results from the sql statement.  After this, the results of the SQL statement query can be used

		foreach($records as $record){
			echo "<option value='".$record["catID"]."'>".$record["catName"]."</option>";
		}
	} // End of function
	
	function displaySearchResults(){
		global $conn;

		if(isset($_GET['searchForm'])){
 
			echo "<h3>Products Found: </h3>";
			
			// Query below prevents SQL Injection attacks
			$namedParameters = array();	

			$sql = "SELECT * FROM om_product WHERE 1";
		
			if (!empty($_GET['product'])){ //Checks whether user has typed something in the "Product" text box
				$sql.= " AND productName LIKE :productName";
				$namedParameters[":productName"] = "%".$_GET['product']."%";
			}
			
			if (!empty($_GET['category'])){ //Checks whether user has selected a category
				$sql.=" AND catId = :categoryId";
				$namedParameters[":categoryId"] = $_GET['category'];
			}
			
			if(!empty($_GET['priceFrom'])){
				$sql.= " AND price >= :priceFrom";
				$namedParameters[":priceFrom"] = $_GET['priceFrom'];
			}
						
			if(!empty($_GET['priceTo'])){  // Checks whether user has typed something into the "Priced to field"
				$sql.= " AND price <= :priceTo";
				$namedParameters[":priceTo"] = $_GET['priceTo'];
			}			
			
			if(isset($_GET['orderBy'])){
				if($_GET['orderBy'] == "price"){
					
					$sql.= " ORDER BY price";
				}else{
					
					$sql.=" ORDER BY productName";
				}
			}
						
			$stmt=$conn->prepare($sql);
			$stmt->execute($namedParameters);
			$records=$stmt->fetchAll(PDO::FETCH_ASSOC);
		
			foreach($records as $record){
				
				echo "<a href=\"purchaseHistory.php?productId=".$record["productId"]."\"> History </a>";
				
				echo $record["productName"]." ".$record["productDescription"]." $".$record['price']."<br /><br />";
			}
		}
	}// End of function

	
	
?>


<!DOCTYPE HTML>
<html>
	<head>
		<title> OtterMart Product Search </title>
		<style>
			@import url("css/style.css");
		</style> 	
	</head>
	<body>
		
		<div>	
			<h1> OtterMart Product Search </h1>
			
			<form>
				
				Product: input<input type="text" name="product" />
				<br />
				Category:
					<select name="category">
						<option value="">Select One</option>
						<?=displayCategories()?>
					</select>
				<br />
            	Price: From <input type="text" name="priceFrom" size="7" />
                 To   <input type="text" name="priceTo" size="7" />
                   
            	<br />
				<br />
				
				<input type="submit" value="Search" name="searchForm" />
								
			</form>
			<br />
		</div>	
		<hr>
		<?= displaySearchResults() ?>
	</body>
</html>
