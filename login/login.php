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

echo "1";

// Retrieve and sanitize user input
$UserOrEmail = $conn->real_escape_string($_POST['UserOrEmail']);
$LoginPassword = $conn->real_escape_string($_POST['LoginPassword']);

$LoginEmailOrUser = "SELECT EmailAdress, Username FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();

$LoginCheckPassword = "SELECT Password FROM user WHERE Password = ? ";
echo"2.5";
$pStmt = $conn->prepare($LoginCheckPassword);
echo"2.6";
$uStmt->bind_param("s", $LoginPassword);
$pStmt->execute();
echo"2.7";
$pResult = $pStmt->get_result();
echo "3";

$user = $pResult->fetch_assoc();
if (!$user || !password_verify($LoginPassword, $user['Password'])) {
    header("Location: ../index.html"); // Redirect to index.html
    exit;
}

echo "4";

// Successful login
header("Location: ../mainpage/mainpage.html"); // Redirect to mainpage.html
exit;
?>
