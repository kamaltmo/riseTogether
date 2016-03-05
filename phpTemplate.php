<?php
	//Always include the database info at the beginning of a a file
	include 'database_info.php';
	//Starting a session will give you access to the cookies of the current user
	/*
	 * $_SESSION['name'] //first name
	 * $_SESSION['lname'] //last name
	 * $_SESSION['login_user'] //email
	 * $_SESSION['userID'] //User Id
	 */
	session_start(); // Start Session

	//If a page requires a user to be logged in add the following code and redirect to the home page
	if(!isset($_SESSION['userID'])){
        header("location: index.php");
    }

    //To access the database you must first connect using the following code and insure that you have connect succesfully

    // Create connection
	$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	// Check connection
	if ($conn->connect_error) {
		//Print our connection errors to debug
		echo $error = "Connection failed: " . $conn->connect_error;
		
		//header("Location: index.php"); or redirect to another page
	} else {

		//Perform the sql you would like to execute here
		//Query
		$sql = "SELECT * FROM profile WHERE email = '$uEmail' AND password = '$pWord'";
		$result = $conn->query($sql); //array of rows

		//You can check the number of rows in a result using
		$result->num_rows

		//You can loop through the rows like this
		while ($row = $result->fetch_assoc()) { 

			//And call for a specific atribute using its name
			$name = $row['firstName']
		}


		//INSERT
		$sql = "INSERT INTO profileskills(profileID, skillsID) VALUES (1, 2)";
		$conn->query($sql);

		//UPDATE

		$sql = "UPDATE profile SET firstName='$fname' WHERE email = 'g@g.com'";
		$conn->query($sql);

		//Error Cheacking
		echo "Error updating record: " . $conn->error;

		//Redirect if need be and all the code has passed
		header("location: profile.php");

		//Always close a connection when done
		$conn->close();
	}
?>

<!--Connecting a form to a php script 
Set the action to your php script and the method to post -->

 <form class="form-horizontal" role="form" action="addSkill.php" method="post">
  <div class="form-group">

     <button type="submit" class="btn btn-warning">+</button>

 </form>

<!--
/* PHP is evaluated server side and then the new html page is past to the user when done
 * This means php can be directly embeded into HTML and print html code, it also means that users
 * can not see PHP code
 *
 */ -->

//PHP inline in a html statment
 <h3 id="mainSkill">Main skill:  <?php echo $mainSkill; ?></h3>



