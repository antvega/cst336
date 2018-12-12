<?php
session_start();

// include '../inc/dbConnection.php';
// $dbConn = startConnection("finalProject");
include 'inc/functions.php';
validateSession();
echo $_GET['movieTitle'];

$sql = "DELETE FROM movie_info WHERE title = '" . $_GET['movieTitle']."'";
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");

?>