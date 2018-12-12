<?php
include 'inc/functions.php';
    global $dbConn;

// SELECT MIN(volume) AS min_volume,
//       MAX(volume) AS max_volume
//   FROM tutorial.aapl_historical_stock_price
    $sql = "SELECT MAX(runtime) AS max FROM movie_info";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC); //we're expecting multiple records
    //echo "<h1>".$record['avg']."</h1>";
    echo $record['max'];
?>