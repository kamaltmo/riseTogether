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

    $sql = "UPDATE `projects` SET `projectStatus`= 1 ,`acceptetdStatus`= 1 WHERE projectID = $projID";
    $conn->query($sql);

		//increase XP

		$sql1 = "SELECT `xp` FROM `profile` WHERE `email` = $userID ";
		$currentXP = $conn->query($sql1);

		$XP = $currentXP["xp"];

		$sql2 = "UPDATE `profile` SET `xp` = 10 WHERE `email` = $userID ";
		$conn->query($sql2);

		$conn->close();
		header("location: ownProjects.php");
	}


?>
