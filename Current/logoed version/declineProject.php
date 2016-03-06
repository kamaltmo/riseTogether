<?php

	include 'database_info.php';
   	session_start(); // Start Session

   	$projID = $_POST['projectID'];
   	$userID = $_SESSION['login_user'];

   	// Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	// Check connection
	if ($conn->connect_error) {
		//header("Location: profile.php");
		$error = "Connection failed: " . $conn->connect_error;
	} else {

    $sql = "DELETE FROM `projects` WHERE projectID = $projID";
    $conn->query($sql);

		$conn->close();
		header("location: ownProjects.php");
	}


?>
