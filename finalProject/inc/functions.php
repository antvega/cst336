<?php
include '../inc/dbConnection.php';
$dbConn = startConnection("finalProject");
// function validateSession(){
//     if (!isset($_SESSION['adminFullName'])) {
//         header("Location: index.php");  //redirects users who haven't logged in 
//         exit;
//     }
// }
function validateSession(){
    if (!isset($_SESSION['adminFullName'])) {
        header("Location: index.php");  //redirects users who haven't logged in 
        exit;
    }
}
?>
<?php

    function getEverything(){
        global $dbConn;
        $sql = "SELECT * FROM movie_info WHERE 1";
        $stmt = $dbConn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records
        return $records;
    }

    function displayAllMovies(){
    global $dbConn;
    
    $sql = "SELECT * FROM movie_info ORDER BY title";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC); //we're expecting multiple records

    foreach ($records as $record) {
        //echo $record['title'];
        $recor = (string)$record['title'];
        
        echo "<a class='btn btn-primary' role='button' href='updateMovie.php?movieTitle=".$recor."'>Update</a>";
        //echo "[<a href='deleteMovie.php?movieTitle=".$record['title']."'>Delete</a>]";
        echo "<form action='deleteMovie.php' onsubmit='return confirmDelete()'>";
        echo "   <input type='hidden' name='movieTitle' value='".$record['title']."'>";
        echo "   <button class='btn btn-outline-danger' type='submit'>Delete</button>";
        echo "</form>";
        echo $record['title'];
        echo "<br>";
        // echo "[<a 
        
        // onclick='openModal()' target='productModal'
        // href='productInfo.php?productId=".$record['productId']."'>".$record['productName']."</a>]  ";
        // echo " $" . $record[price]   . "<br><br>";
        
    }
}
    
function getResults() {
    global $dbConn;
    if(!isset($_POST['submit'])) return;
    
    $title = $_POST['title'];
    $genreSort = $_POST['genreSort'];
    $order = $_POST['order'];

    $np = array();

    $sql = "SELECT * FROM movie_info WHERE 1";
    // $sql.=" WHERE "
    if(!empty($_POST['title'])) {
      $sql .= " AND title LIKE :title";
      $np[':title'] = "%$title%";
    }
    
    if (!empty($_POST['genreSort'])) {
        if($genreSort=="titles"){
            $genreSort="title";
        } else if ($genreSort=="genres"){ 
            $genreSort="type";
        } else {
            $genreSort="rating";
        }
      $sql .= " ORDER BY " . $genreSort;
      switch ($order) {
        case "asc":
          $sql .= " ASC";
          break;
        case "desc":
          $sql .= " DESC";
          break;
      }
    }
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
  }
  
  function getPhoto($title){
    global $dbConn;
    if(!isset($_POST['submit'])) return;
    
    //$title = $_POST['title'];
    $sql = "SELECT * FROM film_posters WHERE title = :title";
    
    $np = array();
    $np[':title'] = $title;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
    if (empty($record)) {
        return false;
    } else {
        return $record;
    }
  }
  
    
  function getPhoto2($title){
    global $dbConn;
    
    //$title = $_POST['title'];
    $sql = "SELECT * FROM film_posters WHERE title = :title";
    
    $np = array();
    $np[':title'] = $title;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record

//print_r($record);
    if (empty($record)) {
        return false;
    } else {
        return $record;
    }
  }
  
  function getMovieInfo($title){
    global $dbConn;
    
    //$title = $_POST['title'];
    $sql = "SELECT * FROM movie_info WHERE title = :title";
    
    $np = array();
    $np[':title'] = $title;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting just one record
    return $record;
  }  
?>