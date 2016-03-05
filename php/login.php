<?php

	$error=''; //Store error messages
	if (isset($_POST['submitLogin'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) {
			$error = "Email or Password is invalid";
		} else {

		//grab email and password
		$uEmail = $_POST['email'];
		$pWord = $_POST['password'];

		// Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
			header("Location: index.php");
			echo $error = "Connection failed: " . $conn->connect_error;
		} else {
			$sql = "SELECT * FROM profile WHERE email = '$uEmail' AND password = '$pWord'";
			$result = $conn->query($sql);
            $conn->close(); 

	            if ($result->num_rows == 1) {
					// Initializing Session

					while ($row = $result->fetch_assoc()) { 
						$_SESSION['name'] = $row['firstName'];
						$_SESSION['lname'] = $row['lastName'];
						$_SESSION['login_user'] = $row['email'];
						$_SESSION['userID'] = $row['ID'];    
					}

					header("location: profile.php");
    				//Redirect to page on login success

				} else {
					echo $error = "email or Password is invalid";
				}
			}
		}
	}