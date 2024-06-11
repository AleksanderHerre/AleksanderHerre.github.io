<?php
session_start();

// Database detaljer
$database = "LoginSystem";
$servername = "localhost";
$username = "bruker12";
$password = "passord";

// Kobler til database
$conn = new mysqli($servername, $username, $password, $database);

// Sjekker kobling
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}
echo"hei";
// Får tak i inputs
$UserOrEmail = $conn->real_escape_string($_POST['UserOrEmail']);
$LoginPassword = $conn->real_escape_string($_POST['LoginPassword']);
echo"2.1";
// Gjør klar SQL_query
$LoginEmailOrUser = "SELECT userID, EmailAdress, Username, Password FROM user WHERE EmailAdress = ? OR Username = ?";
$uStmt = $conn->prepare($LoginEmailOrUser);
$uStmt->bind_param("ss", $UserOrEmail, $UserOrEmail);
$uStmt->execute();
$uResult = $uStmt->get_result();
$user = $uResult->fetch_assoc();
echo"2.2";
// Ser om bruker allerede eksiterer. 
if (!$user) {
    echo "Email or username does not match"; // Erro melding
    exit;
}
echo"2.3";

if (!password_verify($LoginPassword, $user['Password'])) {
    echo "Password does not match";
    exit;
}
echo"2.4";
// Hvis resultat passer $UserOrMail og $LoginPassword, skru på SESSION variabler og send til mainpage.php
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
header("Location: ../mainpage/mainpage.php"); // Hvis alt funker send til Mainpage.php
exit;

$conn->close();
?>
