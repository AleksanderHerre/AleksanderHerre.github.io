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
{	//hvis tilkoblingen mislykkes, vis feilmelding og avslutt
	die("Connection failed: " . $conn->connect_error);
}
echo "Good";

// Henter brukerdata fra et skjema ved hjelp av POST-metoden  og sikrer mot SQL - injeksjoner
$mail = $conn->real_escape_string($_POST['mail']);
$username = $conn->real_escape_string($_POST['username']);
$password = $conn->real_escape_string($_POST['password']);

echo " good job ";
$MailCheck = "SELECT EmailAdress FROM user WHERE EmailAdress ='$mail'";
$MailResult =  $conn->query($MailCheck);

$UsernameCheck = "SELECT Username FROM user WHERE Username ='$username'";
$UsernameResult =  $conn->query($UsernameCheck);
	
if ($UsernameResult->num_rows != 0 and $MailResult ->num_rows != 0){
	die ( "Brukernavn og Mail er allerede i bruk!") ;
}elseif($MailResult->num_rows != 0){
	die( "Dette er allerede en eksisterende mail" )	;	
} elseif ($UsernameResult-> num_rows != 0)
	die( "Dette brukernavnet er allerede i bruk") ;
 else {
	// Lager en SQL setning som settes inn som brukerdata i databasen 
	$sql = "INSERT INTO user (EmailAdress, Username, Password) VALUES ('$mail', '$username', '$password');";
          
	// Utfører SQL-setning  og gir tilbakemelding 
	if ($conn->query($sql) === TRUE){
		echo " it went well ";
	} else { 
		echo "error:" . $sql. "<br>" .$conn->error;
	}
	("Location: ../mainpage/mainpage.html");
}

// tester om alt funker
echo "test";

$conn->close();


?>
