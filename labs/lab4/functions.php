
<?php


function displayCart(){
    //If there are items in the session, display them
    if(isset($_SESSION['cart'])){
        echo"<table class='table'>";
        foreach($_SESSION['cart'] as $item){
            $itemId = $item['id'];
            $itemQuant = $item['quantity'];
            
            echo '<tr>';
            
            // Display data for the item
            echo "<td><img src='".$item['img']."'></td>";
            echo "<td><h4>".$item['name']."</h4></td>";
            echo "<td><h4>$".$item['price']."</h4></td>";
            
            // Update form for this item
            echo "<form method='post'>";
            echo "<input type='hidden' name='itemId' value='$itemId'>";
            echo "<td><input type='text' name='update' class='form-control' placeHolder='$itemQuant'></td>";
            echo "<td><button class='btn btn-danger'>Update</button></td>";
            echo "</form>";            
            
            //Create a sparate form for the delete
            echo "<form method='post'>";
            echo "<input type='hidden' name='removeId' value='$itemId'>"; //Hidden itemId to update correct item
            echo "<td><button class='btn btn-danger'>Remove</button></td>";
            echo "</form>";
            echo "</tr>";            
        }
        echo"</table>";
    }
} //end of function


function displayCartCount(){
    echo count($_SESSION['cart']);
}//End of function

function displayResults(){
	global $items; // Necessary to get the global items array

	if(isset($items)){
		echo "<table class='table'>";
		foreach($items as $item){
			$itemName = $item['name'];
			$itemPrice = $item['salePrice'];
			$itemImage = $item['thumbnailImage'];   
			$itemId = $item['itemId'];

            // Display items as table row
            echo '<tr>';
            echo "<td><img src='$itemImage'</td>";
            echo "<td><h4>$itemName</h4></td>";
            echo "<td><h4>$itemPrice</h4></td>";
            
            //Create 'hidden' fields to send item data via POSt
            echo "<form method='post'>";
            echo"<input type = 'hidden' name='itemName' value='$itemName'>";
            echo"<input type = 'hidden' name='itemPrice' value='$itemPrice'>";
            echo"<input type = 'hidden' name='itemImg' value='$itemImage'>";            
            echo"<input type = 'hidden' name='itemId' value='$itemId'>";

            // Check to see if the most recent POST request has the same itemID
            // If so, this item was just added to the cart.  Dispaly different button.
            if($_POST['itemId'] == $itemId){
                echo "<td><button class='btn btn-success'>Added</button></td>";
            }else{
                echo "<td><button class='btn btn-warning'>Add</button></td>";               
            }
            echo "</tr>";
            echo "</form>";
		}
		echo"</table>";
	}
}//End of Function

?>