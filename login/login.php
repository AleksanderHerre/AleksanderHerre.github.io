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

// Prepare the SQL query
$LoginEmailOrUser = "SELECT id, EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
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

// Verify password
if ($LoginPassword !== $user['Password']) {
    echo "Password does not match the user"; // Display error message
    exit;
}

// If result matched $UserOrMail and $LoginPassword, set session variables and redirect to mainpage.php
$_SESSION["userID"] = $user['id'];
$_SESSION["UserOrMail"] = $UserOrEmail;

// Debug: Check if session variables are set
if (isset($_SESSION["userID"])) {
    echo "Session userID set: " . $_SESSION["userID"];
} else {
    echo "Failed to set session userID.";
    exit;
}

header("Location: ../mainpage/mainpage.php"); // Redirect to mainpage.php
exit;

$conn->close();
?>
