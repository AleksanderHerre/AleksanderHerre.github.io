<?php
session_start();

// Database connection details
$database = "LoginSystem";
$servername = "localhost";
$username = "bruker12";
$password = "passord";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);
echo"connected "


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


echo " test" 

$conn->close();
?>