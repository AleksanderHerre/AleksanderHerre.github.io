<?php
session_start();

// Database connection details
$database = "LoginSystem";
$servername = "localhost";
$username = "bruker12";
$password = "passord";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);
echo"connected ";


// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo " test";

$UserOrEmail = $conn->real_escape_string($_POST['UserOrEmail']);
$LoginPassword = $conn->real_escape_string($_POST['LoginPassword']);

$LoginEmailorUser = "SELECT EmailAdress, Username FROM user WHERE EmailAdress or Username = '$UserOrEmail'"
echo "woho!"
$conn->close();
?>