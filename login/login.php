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
$UserOrEmail = stripslashes($_POST['UserOrEmail']);
$LoginPassword = stripslashes($_POST['LoginPassword']);
$UserOrEmail = $conn->real_escape_string($UserOrEmail);
$LoginPassword = $conn->real_escape_string($LoginPassword);

// Prepare the SQL query
$LoginEmailOrUser = "SELECT EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();
$user = $uResult->fetch_assoc();

// Check if user exists
if (!$user) {
    echo "Email or username does not match"; // Display error message
    exit;
}

// Check if input matches database values
if ($LoginPassword !== $user['Password']) {
    echo "Password does not match the user"; // Display error message
    exit;
}

// If result matched $UserOrMail and $LoginPassword, table row must be 1 row
if ($uResult->num_rows == 1) {
    // Register $UserOrMail, $LoginPassword and redirect to file "mainpage.php"
    $_SESSION["UserOrMail"] = $UserOrEmail;
    $_SESSION["LoginPassword"] = $LoginPassword;
    header("Location: ../mainpage/mainpage.php"); // Redirect to mainpage.php
    exit;
} else {
    echo "Something went wrong!";
}

$conn->close();
?>
