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
		$sql = "SELECT * FROM requests WHERE status = '1'";
		$result = $conn->query($sql); //array of rows

		//You can check the number of rows in a result using
		if ($result->num_rows >= 1)
			$result->num_rows;
		else echo $error = "No requests for user";
	}
?>
<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head><body>
<div class="navbar navbar-default navbar-static-top">
	<div class="container"><div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar">
			</span>
			<span class="icon-bar">
			</span>
			<span class="icon-bar">
			</span>
		</button>
			<a class="navbar-brand" href="#">
				<span>Brand</span>
			</a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-ex-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li class="active">
					<a href="#">Home</a>
				</li>
				<li>
					<a href="#">Contact</a>
				</li>
				<li>
					<a href="#">LogOut</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php while ($row = $result->fetch_assoc()) { 

			//And call for a specific atribute using its name
			$reqID = $row['ID'];

			$sql = "SELECT * FROM profilerequests where requestID = '$reqID'";
			$resultReq = $conn->query($sql);
			$profilerequestsRows = $resultReq->fetch_assoc();

			$receiver = $profilerequestsRows["receiverID"];
			
			$sql = "SELECT * FROM profile where ID = '$receiver'";
			$resultRec = $conn->query($sql);
			$recInfo = $resultRec->fetch_assoc();

			$name = $recInfo["firstName"];
			$surname = $recInfo["lastName"];
			$company = $recInfo["cproject"];
			$bio = $recInfo["bio"];
			$pic = $recInfo["pic"];
			$email = $recInfo["email"];

			$sql = "SELECT * FROM profileskills where profileID = '$receiver'";
			$resultSkill = $conn->query($sql);
			$skillRows = $resultSkill->fetch_assoc();

			$skillID = $skillRows["skillsID"];

			$sql = "SELECT * FROM skills where ID = '$skillID'";
			$resultSkillID = $conn->query($sql);
			$skillIDRows = $resultSkillID->fetch_assoc();

			$skillName = $skillIDRows["skillName"];

			echo '<div class="section"> 
	<div class="container"> 
		<div class="row"> 
			<div class="col-md-6">
				<div class="section">
					<div class="container">
						<div class="row" id="contact">
							<div class="col-md-4">
                        <img src='.$pic.' class="center-block img-circle img-responsive" id="contactPic">
                        <h3 class="text-center" id="contactName">'.$name.' '.$surname.'</h3>
                        <p class="text-center" id="contactPosition">'.$skillName.'</p>
                    </div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                		<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><a style="text-decoration: none;" href="mailto:'.$email.'">Send Message</a><br></h3>
					</div>
				</div>
                	</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6"> 
    	<h1 id="contactCompany">'.$company.'</h1> 
    	<h3>Description:</h3> 
    	<p id="contactBio">'.$bio.'
    	</p>
    </div>
</div>
</div>
</div>
';
		}
		$conn->close();
		?>
</body>
</html>


