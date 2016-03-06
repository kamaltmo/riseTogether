<?php

	$error=''; //Store error messages
	if (isset($_POST['submitSignup'])) {

		$uEmail = $_POST['email'];
		$pWord = $_POST['password'];
		$skill = $_POST['mainSkill'];

	if(isset($uEmail) && isset($pWord) && isset($skill)) {

		if(strlen($pWord) > 5) {
		// Create connection
		$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		// Check connection
		if ($conn->connect_error) {
			header("Location: index.php");
			$error = "Connection failed: " . $conn->connect_error;
		} else {
			$sql = "SELECT * FROM profile WHERE email = '$uEmail'";
			$result = $conn->query($sql);

			if ($result->num_rows >= 1) {
				echo $error = "Account already exists for this email";
			} else {

				$sql = "INSERT INTO profile(email, password) VALUES ('".$uEmail."','".$pWord."')";
				$conn->query($sql);

				$sql = "SELECT * FROM profile WHERE email = '$uEmail'";
				$result = $conn->query($sql);

				while ($row = $result->fetch_assoc()) { 
					$id = $row['ID']; 
				}

				$sql = "INSERT INTO profileskills(profileID, skillID) VALUES ('".$id."','".$skill."')";
				$conn->query($sql);

				header("location: index.php");
				$conn->close();
			}
		}
		} else {
			echo $error = "Password is too short";
		}
	}

}


?>