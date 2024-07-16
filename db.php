<?php
// Database configuration
$servername = "mysql.hk.openbullet.store";
$username = "ayoubbr";
$password = "eA7mfZ19U6";
$database = "op_openbullet";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
