<?php

	include 'database_info.php';
   	session_start(); // Start Session

   	$skillID = $_POST['newSkill'];
   	$userID = $_SESSION['userID'];

   	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	if ($conn->connect_error) {
		//header("Location: profile.php");
		$error = "Connection failed: " . $conn->connect_error;
	} else {

		$sql = "SELECT * FROM profileskills WHERE profileID = $userID AND skillsID = $skillID";
		$result = $conn->query($sql);

		if ($result->num_rows >= 1) {

		} else {

			$sql = "INSERT INTO profileskills(profileID, skillsID) VALUES ('".$userID."','".$skillID."')";
			$conn->query($sql);
		}

		$conn->close();
		header("location: profile.php");
	}


?>