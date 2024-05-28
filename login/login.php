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

// Function to log in the user
function loginUser($conn, $usernameOrEmail, $password) {
    // Sanitize input to prevent SQL injection
    $usernameOrEmail = $conn->real_escape_string($usernameOrEmail);
    $password = $conn->real_escape_string($password);

    // SQL query to fetch user data
    $sql = "SELECT * FROM user WHERE Username = '$usernameOrEmail' OR EmailAdress = '$usernameOrEmail'";
    $result = $conn->query($sql);

    // Check if user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['Password'])) {
            // Start a session and set session variables
            $_SESSION['username'] = $row['Username'];
            $_SESSION['mail'] = $row['EmailAdress'];
            header("Location: ../mainpage/mainpage.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that username or email.";
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameOrEmail = $_POST['usernameOrEmail'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($usernameOrEmail && $password) {
        loginUser($conn, $usernameOrEmail, $password);
    } else {
        echo "Please fill in both fields.";
    }
}

$conn->close();
?>