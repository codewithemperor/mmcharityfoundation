<?php
$servername = "localhost:3306"; 
$username = "mmchytli"; 
$password = "wAPEt1Igbekq"; 
$dbname = "mmchytli_mmcharity";

// $servername = "localhost"; 
// $username = "root"; 
// $password = ""; 
// $dbname = "mmcharity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
