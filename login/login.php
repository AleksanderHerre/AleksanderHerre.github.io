<?php
session_start();

// Database connection details
$database = "LoginSystem";
$servername = "localhost";
$username = "bruker12";
$password = "passord";

// Connect to the database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve and sanitize user input
$UserOrEmail = $conn->real_escape_string($_POST['UserOrEmail']);
$LoginPassword = $conn->real_escape_string($_POST['LoginPassword']);

$LoginEmailOrUser = "SELECT EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();

if($uResult->num_rows == 0){
    header("Location: ../index.html"); // Redirect to index.html
    exit;
}

$LoginCheckPassword = "SELECT Password FROM user WHERE EmailAdress = ? OR Username = ?";
$stmt = $conn->prepare($LoginCheckPassword);
$stmt->bind_param("s", $UserOrEmail);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();
if(!$user || !password_verify($LoginPassword, $user['Password'])){
    header("Location: ../index.html"); // Redirect to index.html
    exit;
}

// Successful login
header("Location: ../mainpage/mainpage.html"); // Redirect to mainpage.html
exit;
?> 