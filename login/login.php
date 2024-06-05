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

// Prepare the SELECT statement to find the user by email or username
$UserCheck = "SELECT EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
$stmt = $conn->prepare($UserCheck);
$stmt->bind_param('ss', $UserOrEmail, $UserOrEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $hashedPassword = $user['Password'];
    
    // Validate the provided password
    if (password_verify($LoginPassword, $hashedPassword)) {
        // Password is correct, start the session
        $_SESSION['username'] = $user['Username'];
        $_SESSION['email'] = $user['EmailAdress'];
        // Redirect to the main page
        header("Location: ../mainpage/mainpage.html");
        exit();
    } else {
        // Invalid password
        $_SESSION['error'] = "Incorrect username/email or password.";
    }
} else {
    // User does not exist
    $_SESSION['error'] = "Incorrect username/email or password.";
}

// Close the connection
$conn->close();

// Redirect back to the index page with an error message
header("Location: ../index.html");
exit();
?>