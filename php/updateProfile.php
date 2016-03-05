<?php
	
	include 'database_info.php';
   	session_start(); // Start Session

   	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$pic = $_POST['pic'];
	$bio = $_POST['bio'];
	$cproject = $_POST['cproject'];
	$website = $_POST['website'];
	$facebook = $_POST['facebook'];
	$linkedin = $_POST['linkedin'];


		// Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
			//header("Location: profile.php");
			$error = "Connection failed: " . $conn->connect_error;
		} else {

			$sql = "UPDATE profile SET firstName='$fname',lastName='$lname',pic='$pic',website='$website',cproject='$cproject',bio='$bio',facebook='$facebook',linkedin='$linkedin' WHERE email = 'g@g.com'";
			$conn->query($sql);
			//echo "Error updating record: " . $conn->error;
			$conn->close();
			header("location: profile.php");
		}

?>