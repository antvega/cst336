<?php
include '../../inc/dbConnection.php';
$conn = startConnection("ottermart");


function displayCategories() {
    global $conn;
    $sql = "SELECT catId, catName FROM om_category ORDER BY catName";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $record){
        echo "<option value='".$record['catId']."' >". $record['catName'] . "</option>";
    }
}

function displaySearchResults(){
    global $conn;
    if(isset($_GET['searchForm'])){
        echo "<h3>Products Found: </h3>";
        $sql = "SELECT * FROM om_product WHERE 1";
        
        
        // ======== IT IS MY TURN ========== //
        if(!empty($_GET['product'])){
            // SELECT * FROM `om_product` WHERE productDescription LIKE '%Sony%' << test code from phpmyadmin
            $sql .= " AND productName LIKE :productName
                    OR productDescription LIKE :productDescription";// This also looks for input within product description.
            $namedParameters[":productName"] = "%" .$_GET['product'] . "%";
            $namedParameters[":productDescription"] = "%" .$_GET['product'] . "%";
        }// This works as specified. Enter in 'black' to test. A soccer ball containing the world 'black' within the description will appear!
        ///////////////////////////////////////
        
        if(!empty($_GET['category'])){
            $sql .= " AND catId = :categoryId";
            $namedParameters[":categoryId"] = $_GET['category'];
        }
        
        if(!empty($_GET['priceFrom'])){
            $sql .= " AND price >= :priceFrom";
            $namedParameters[":priceFrom"] = $_GET['priceFrom'];
        }
        
        if(!empty($_GET['priceTo'])){
            $sql .= " AND price <= :priceTo";
            $namedParameters[":priceTo"] = $_GET['priceTo'];
        }  
        
        if(isset($_GET['orderBy'])){
            if($_GET['orderBy']=="price"){
                $sql .= " ORDER BY price";
            } else {
                $sql .= " ORDER BY productName";
            }
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($records as $record){
            echo "<a href=\"purchaseHistory.php?productId=".$record['productId']. "\">History </a>";
            echo $record['productName']. " " .$record['productDescription']. " $".$record['price'] . "<br /><br />";
        }
    }
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Otter Mart Product Search</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div>
            <h1>Otter Mart Product Search</h1>
        
        <form>
            Product: <input type="text" name="product"/>
            <br /><br />
            Category:
                <select name="category">
                    <option value="">Select One</option>
                    <?php displayCategories() ?>
                </select>
            <br>
            Price: From <input type="text" name="priceFrom" size="7"/>
                   To   <input type="text" name = "priceTo" size="7"/>
            <br>
            Order result by:
            <br>
            
            <input type="radio" name="orderBy" value="price"/>Price <br>
            <input type="radio" name="orderBy" value="name"/>Name 
            
            <br><br>
            <input type="submit" value="Search" name="searchForm"/>
            
        </form>
        <br>
        </div>
        <hr>
        <?= displaySearchResults() ?>
    </body>
</html>