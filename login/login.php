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
echo "hei";

$LoginEmailOrUser = "SELECT EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();

echo "test";

$user = $uResult->fetch_assoc();

// Check if input matches database values
if ($UserOrEmail !== $user['EmailAdress'] && $UserOrEmail !== $user['Username']) {
    echo " Email or username does not match"; // Redirect or handle error
    exit;
}

if ($LoginPassword !== $user['Password']) {
    echo " Password does not match the user"; // Redirect or handle error
    exit;
}

echo "4";
 

// Successful login
header("Location: ../mainpage/mainpage.html"); // Redirect to mainpage.html
exit;

?>
