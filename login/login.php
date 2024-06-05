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
echo "Connected to the database.<br>";

// Retrieve and sanitize user input
$UserOrEmail = $conn->real_escape_string($_POST['UserOrEmail']);
$LoginPassword = $conn->real_escape_string($_POST['LoginPassword']);

echo "UserOrEmail: $UserOrEmail<br>";
echo "LoginPassword: $LoginPassword<br>";

// Prepare the SELECT statement to find the user by email or username
$UserCheck = "SELECT EmailAdress, Username, Password FROM user WHERE EmailAdress = '$UserOrEmail' OR Username = '$UserOrEmail'";
$UserResult = $conn->query($UserCheck);

if ($UserResult === false) {
    die("Query failed: " . $conn->error);
}

if ($UserResult->num_rows > 0) {
    $user = $UserResult->fetch_assoc();
    $hashedPassword = $user['Password'];
    
    echo "User found. Username: " . $user['Username'] . ", Email: " . $user['EmailAdress'] . "<br>";

    // Validate the provided password
    if (password_verify($LoginPassword, $hashedPassword)) {
        // Password is correct, start the session
        $_SESSION['username'] = $user['Username'];
        $_SESSION['email'] = $user['EmailAdress'];
        echo "Password is correct. Redirecting to the main page...<br>";
        // Redirect to the main page
        header("Location: ../mainpage/mainpage.html");
        exit();
    } else {
        // Invalid password
        echo "Invalid password.<br>";
        $_SESSION['error'] = "Invalid password";
    }
} else {
    // User does not exist
    echo "User not found.<br>";
    $_SESSION['error'] = "User not found";
}

// Close the connection
$conn->close();
echo "Connection closed.<br>";

// Redirect back to the index page with an error message
header("Location: ../index.html");
exit();
?>