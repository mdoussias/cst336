<!DOCTYPE html>

<?php
    session_start();
    include "dbConnection.php";
    $conn = getDatabaseConnection('ottermart');
    
    function getCategories(){
        global $conn;
        
        $sql = "SELECT catId, catName
                FROM om_category
                ORDER BY catName";
                
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($records as $record){
            echo "<option value='".$record['catId']."'>".$record['catName']."</option>";
        }
    }
    
    
    if(isset($_GET['submitProduct'])){
        $productName = $_GET['productName'];
        $productDescription = $_GET['description'];  
        $productImage = $_GET['productImage'];
        $productPrice = $_GET['price'];
        $catId = $_GET['catId'];    
        
        //Make sure to use named parameters variables to prevent injection attacks
        $sql = "INSERT INTO om_product
        ( productName, productDescription, productImage, price, catId)
        VALUES( :productName, :productDescription, :productImage, :price, :catId)";
        
        $np = array(); //create a named parameters array
        $np[':productName'] = $productName;
        $np[':productDescription'] = $productDescription;
        $np[':productImage'] = $productImage;
        $np[':price'] = $productPrice;
        $np[':catId'] = $catId;        
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($np);
    }
    
?>

<html>
    <head>
        <title>ADD PRODUCT</title>
               <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    
    </head> 
    <body>
        <form>
            <strong>Product Name</strong> <input type='text' class='form-control' name='productName'><br />
            <strong>Description</strong><textarea name="description" class='form-control' cols=50 rows=4></textarea><br />
            <strong>Price</strong><input type='text' class='form-control' name='price'><br />        
            <strong>Category</strong><select name='catId' class='form-control'>
                <option value="" >Select One</option>
                <?php getCategories(); ?>
            </select><br />
            <strong>Set Img Url</strong><input type='text' name='productImage' class='form-control'><br />
            <input type='submit' name='submitProduct' class='btn btn-primary' value='Add Product'>
        </form>
    </body>
</html>    