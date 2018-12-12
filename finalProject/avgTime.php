<?php
include 'inc/functions.php';
    global $dbConn;

    $sql = "SELECT AVG(runtime) AS avg FROM movie_info";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records
    //echo "<h1>".$record['avg']."</h1>";
    echo $record['avg'];
?>