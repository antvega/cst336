<?php
include 'inc/header.php';
?>

<?php
session_start();

// include '../inc/dbConnection.php';
// $dbConn = startConnection("finalProject");
include 'inc/functions.php';
validateSession();
global $title1;
global $go;
$go = false;

global $dbConn;

if (isset($_GET['movieTitle'])) {
  $productInfo = getMovieInfo($_GET['movieTitle']);   

  $info= getMovieInfo($_GET['movieTitle']); 
  //$title1= $productInfo['title'];
  //echo $productInfo['id'];
  $image = getPhoto2($productInfo['title']);
}



if (isset($_GET['updateMovie'])){  //user has submitted update form
    $title = $_GET['title'];
    $type = $_GET['type'];
    $runtime =  $_GET['runtime'];
    $rating =  $_GET['rating'];

    $sql = "UPDATE movie_info 
            SET title= :title,
               type = :type,
               runtime = :runtime,
               rating = :rating
            WHERE id = " . $_GET['id'];
            
    $np = array();
    $np[':title'] = $title;
    $np[':type'] = $type;
    $np[':runtime'] = $runtime;
    $np[':rating'] = $rating;

    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    // global $info;
    // echo $info['title'];
    // $sql="";
    // $sql = "UPDATE film_posters 
    //         SET posters= :image
    //         WHERE title = " . $info['title'];
    // unset($np);     
    // $np = array();
    // $np[':image'] = $_GET['image'];
    // $stmt = $dbConn->prepare($sql);
    // $stmt->execute($np);
    
    echo "<script>alert('Updated')</script>";
    //$record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
    //$_SESSION['adminFullName'] = $record['firstName'] .  "   "  . $record['lastName'];
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title> Update Movies! </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
    </head>
    <body>

        <h1> Updating a Movie </h1>
        
        <form>
            <input type="hidden" name="id" value="<?=$productInfo['id']?>">
           Movie title: <input type="text" name="title" value="<?=$productInfo['title']?>"><br>
           Movie runtime: <input type="text" name="runtime" value="<?=$productInfo['runtime']?>"> <br>
           Type: <input type="text" name="type" value="<?=$productInfo['type']?>"><br>
           Rating: <input type="text" name="rating" value="<?=$productInfo['rating']?>"><br>
           <!--Image:  <input type="text" name="image" value=""><br>  -->
           </select> <br />
           <input type="submit" name="updateMovie" value="Update Product">
        </form>
        <form action="admin.php">
           <input type="submit" value="Back">     
        </form>

        
    </body>
</html>