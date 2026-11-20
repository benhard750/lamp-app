<?php
$host = "localhost";
$user = "appuser";
$pass = "YourStrongPass123!";
$db   = "appdb";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
