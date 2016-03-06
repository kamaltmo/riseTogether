<?php

   include 'database_info.php';
	session_start();

	if(!isset($_SESSION['login_user']))
    //Redirect if not logged in
        header("location: index.php");

    // Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
			header("Location: index.php");
			echo $error = "Connection failed: " . $conn->connect_error;
		} else {
			$sql = "UPDATE profile SET onSite='0' WHERE email = '".$_SESSION['login_user']."'";
			$conn->query($sql);
			$conn->close(); 
			//Clear user cache
			session_destroy();
			header("location: index.php");
		}

?>
