<?php
// Definerer database informasjonen.
$database = "LoginSystem";
$servername = "localhost";
$username = "bruker12";
$password = "passord";

// lager en kobling til databsen min 

$conn = new mysqli($servername, $username, $password, $database);

// Denne funksjonen sjekker om koblingen feilet og hvis ikke "good"	
if ($conn->connect_error)
{
	die("Connection falure: " . $conn->connect_error);
}
echo "Good";

// Henter brukerdata fra et skjema ved hjelp av POST-metoden  og sikrer mot SQL - injeksjoner
$mail = $conn->real_escape_string($_POST['mail']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

// Lager en SQL setning som settes inn som brukerdata i databasen 
$sql = "INSERT INTO user (EmailAdress, Username, Password) VALUES ('$mail', '$username', '$password');";


// Utfører SQL-setning  og gir tilbakemelding 
if ($conn->query($sql) === TRUE){
	echo " it went well ";
} else { 
	echo "error:" . $sql. "<br>" .$conn->error;
}
// tester om alt funker
echo "test";
$conn->close();
//sender deg automatisk til framsiden etter sign up 
("Location: ../mainpage/mainpage.html");

?>
