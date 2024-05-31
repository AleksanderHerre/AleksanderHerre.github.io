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

$LoginEmailOrUser = "SELECT EmailAdress, Username FROM user WHERE EmailAdress = '$UserOrEmail' OR Username = '$UserOrEmail'";
$LoginCheckPassword = "SELECT Password FROM user WHERE Password = '$LoginPassword'";
echo "woho!"
$conn->close();
?>