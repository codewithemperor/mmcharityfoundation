<?php
$servername = "localhost:3306"; // or your server name
$username = "mmchytli"; // or your database username
$password = "wAPEt1Igbekq"; // or your database password
$dbname = "mmchytli_mmcharity";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
