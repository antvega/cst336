<?php
include 'inc/header.php';
?>

<?php
session_start();

include 'inc/functions.php';
validateSession();

if (isset($_GET['addMovie'])) { //checks whether the form was submitted
    
    $title = $_GET['title'];
    $type =  $_GET['type'];
    $runtime =  $_GET['runtime'];
    $rating =  $_GET['rating'];
    
    
    $sql = "INSERT INTO movie_info (title, type, runtime, rating) 
            VALUES (:title, :type, :runtime, :rating);";
    $np = array();
    $np[":title"] = $title;
    $np[":type"] = $type;
    $np[":runtime"] = $runtime;
    $np[":rating"] = $rating;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    echo "New Movie was added!";
    
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Add New Movie </title>
                
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
            
    </head>

    <body>
        
        <h1> Adding New Movie </h1>
        
        <form>
           Movie name: <input type="text" name="title"><br>
           Type: <input name="type" ><br>
           Runtime: <input type="text" name="runtime"><br>
           Rating: <input type="text" name="rating"><br>
         
           <input type="submit" name="addMovie" value="Add Movie">
        </form>
        <form action="admin.php">
           <input type="submit" value="Back">     
        </form>

    </body>
</html>