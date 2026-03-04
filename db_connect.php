<?php
$servername = "localhost"; // Change this if your database is on another server
$username = "arhan"; // Your database username
$password = "@Arhan1234#!"; // Your database password
$database = "trade_buddy"; // Replace with your actual database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character encoding to avoid issues with special characters
$conn->set_charset("utf8");
?>
