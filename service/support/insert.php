<?php
	require_once('../db/connect.php');

	
	$stmt = $conn->prepare("INSERT INTO support (fname, email, message, messagedate) 
										VALUES (?, ?, ?, now())");
	
	$stmt->bind_param("ss", $fname, $email, $message);
	$fname = $_POST["fname"];
	$email = $_POST["email"];
	$message = $_POST["message"];
	// set parameters and execute
	if ($stmt->execute()) { 
		echo "OK";
		header('Location: /index.php');
	} else {
	   echo $stmt->error;
	}
	
	$stmt->close();
	
	require_once('../db/disconnect.php');
	
	// Nukreipiame á kità svetainæ
	//header('Location: /LAYOUT/asmeninis/index.php');
?>