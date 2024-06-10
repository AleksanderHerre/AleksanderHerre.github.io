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
echo"2.1";
// Prepare the SQL query
$LoginEmailOrUser = "SELECT userID, EmailAdress, Username FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();
$user = $uResult->fetch_assoc();
echo"2.2";
// Check if user exists
if (!$user) {
    echo "Email or username does not match"; // Display error message
    exit;
}
echo"2.3";
$sql = "SELECT userId, password FROM user WHERE username = ?";
$pstmt = $conn->prepare($sql);
$pstmt->bind_param("s", $username);
$pstmt->execute();
$presult = $pstmt->get_result();


// Verify password
$user = $result->fetch_assoc();
if(!$user || !password_verify($password, $user['password'])){
	echo "Wrong username or password";
	$stmt->close();
	$conn->close();
	exit;
}
echo"2.4";
// If result matched $UserOrMail and $LoginPassword, set session variables and redirect to mainpage.php
$_SESSION["userID"] = $user['userID'];
$_SESSION["UserOrMail"] = $UserOrEmail;
$_SESSION["username"] = $user['Username'];
echo"2.5";
// Debug: Check if session variables are set
if (isset($_SESSION["userID"])) {
    echo "Session userID set: " . $_SESSION["userID"];
} else {
    echo "Failed to set session userID.";
    exit;
}
echo"2.6";
header("Location: ../mainpage/mainpage.php"); // Redirect to mainpage.php
exit;

$conn->close();
?>
