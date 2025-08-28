<?php
$host = "localhost";
$user = "YOUR_DB_USER";
$pass = "YOUR_DB_PASSWORD";
$dbname = "YOUR_DB_NAME";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>