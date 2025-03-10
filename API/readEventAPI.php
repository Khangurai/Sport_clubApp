<?php 
require_once '../conf/dbinfo.php'; 
$conn = new mysqli($host, $user, $pass, $database);
if ($conn->connect_error) die($conn->connect_error);
$query = "SELECT * FROM event;"; // Modify your querry to be from current and next 6 months 
$results = $conn->query($query);
$all_rows = $results->fetch_all(MYSQLI_ASSOC);
$json_response = json_encode($all_rows, JSON_UNESCAPED_UNICODE);
echo $json_response;