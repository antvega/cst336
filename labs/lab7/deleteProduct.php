<?php
include '../../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

$sql = "DELETE FROM om_product WHERE productId = " .$_GET['productId'];
$stmt=$dbConn->prepare($sql);
$stmt->execute();

header("Location: admin.php");



?>