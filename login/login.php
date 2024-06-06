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

$LoginEmailOrUser = "SELECT EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();

if ($uResult === false) {
    echo "Error: " . $conn->error; // Print any error message
    exit;
}

if ($uResult->num_rows == 0) {
    header("Location: ../index.html"); // Redirect to index.html
    exit;
}

echo "2";

$LoginCheckPassword = "SELECT Password FROM user WHERE Password = '$LoginPassword' ";
echo"2.5";
$pResult = $conn->query($LoginCheckPassword)
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
