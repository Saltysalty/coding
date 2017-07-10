<?php
	// Apsiraðome parametrus
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "codingchicken";

	// Sukuriamas prisijungimas
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Patikriname prisijungimà
	if($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$stmt = $conn->prepare("INSERT INTO messages (name, email, text, date) 
										VALUES (?, ?, ?, now())");
	
	$stmt->bind_param("sss", $name, $email, $text); // "sss" nurodome elementu tipa kiekvienam elementui
	$name = $_POST["fname"];
	$email = $_POST["email"];
	$text = $_POST["message"];
	// set parameters and execute
	if ($stmt->execute()) { 
		header('Location: /contact.php');
	} else {
	   echo $stmt->error;
	}
	
	$stmt->close();
	
	$conn->close();
	
	// Nukreipiame á kità svetainæ
	//header('Location: /LAYOUT/asmeninis/index.php');
?>