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
			$sql = "SELECT * FROM profile WHERE email = '".$_SESSION['login_user']."'";
			$result = $conn->query($sql);
            
	            if ($result->num_rows == 1) {
					// Initializing Session

					$row = $result->fetch_assoc();

					//Find  main skill
					$sql = "SELECT * FROM profileskills WHERE profileID = '".$row["ID"]."'";
					$result = $conn->query($sql);
					$skillRows = $result->fetch_assoc();

					$sql = "SELECT * FROM skills WHERE ID = '".$skillRows["skillsID"]."'";
					$result2 = $conn->query($sql);
					$skill = $result2->fetch_assoc();

					$mainSkill = $skill["skillName"];

					

				} else {
					echo $error = "An issue has occured, multiple profiles";
				}
			}
?>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
      <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   </head>
   <body>
      <div class="navbar navbar-default navbar-static-top" id="navBar">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#"><span>RISEtogether</span></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
               <ul class="nav navbar-nav navbar-right"></ul>
               <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                     <a href="#">About</a>
                  </li>
                  <li>
                     <a href="#">Contact</a>
                  </li>
                  <li>
                     <a href="#">LogOut</a>
                  </li>
               </ul>
               <ul class="nav navbar-nav navbar-right"></ul>
            </div>
         </div>
      </div>
      <div class="section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="section">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-6">
                              <img src="<?php if ($row["pic"] == '') { echo "http://pingendo.github.io/pingendo-bootstrap/assets/user_placeholder.png";
                            } else { echo $row["pic"]; }?>" class="img-circle img-responsive" id="profilePic">
                           </div>
                           <div class="col-md-6">
                              <h1 id="nameLabel">Name: <?php echo $row["firstName"]." ".$row["lastName"]; ?></h1>
                              <h3 id="mainSkill">Main skill:  <?php echo $mainSkill; ?></h3>
                              <p id="otherSkills">Other skills: 
                              </p>
                              <ul class="list-group" id="otherSkills">
                              	<?php while($skillRows = $result->fetch_assoc()) {

                              		$sql = "SELECT * FROM skills WHERE ID = '".$skillRows["skillsID"]."'";
									$result2 = $conn->query($sql);
									$skill = $result2->fetch_assoc();

									$mainSkill = $skill["skillName"];
                              		echo '<li class="list-group-item">'.$mainSkill."</li>";
                              }

                              

                              ?> 
                              </ul>

					            <form class="form-horizontal" role="form" action="addSkill.php" method="post">
					              <div class="form-group">
					                <div class="col-sm-3">
					                  <label class="control-label">New Skills</label>
					                </div>
					                <div class="col-sm-8">
					                  <select name="newSkill" class="form-control">

					                  	<?php

					                  		// Create connection
											$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
											// Check connection
											if ($conn->connect_error) {
												//header("Location: profile.php");
												$error = "Connection failed: " . $conn->connect_error;
											} else {

												$sql = "SELECT * FROM skills";
												$skillList = $conn->query($sql);
												//echo "Error updating record: " . $conn->error;
												while ($skill = $skillList->fetch_assoc()) {
													echo '<option value="'.$skill["ID"].'">'.$skill["skillName"].'</option>';
												}
											}

					                  	?>
					                  </select>
					                </div>
					                <div class="col-sm-1">
					                  <button type="submit" class="btn btn-warning">+</button>
					                </div>
					              </div>
					            </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p id="bio">
                     <br>Bio
                     <br><?php echo $row["bio"]; ?>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="modal fade" id="customizeProfile">
         <div class="modal-dialog modal-lg">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Customize profile</h4>
               </div>
               <div class="modal-body">
                  <form role="form" action="updateProfile.php" method="post">
                  	 <div class="form-group" id="pictureURL"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="fname" placeholder="First Name" name="fname" type="text" value=<?php echo '"'.$row['firstName'].'"'; ?>></div>
                     <div class="form-group" id="userDescription"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="lname" name="lname" placeholder="Last Name" type="text" value=<?php echo '"'.$row['lastName'].'"'; ?>></div>
                     <div class="form-group" id="pictureURL"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="pic" placeholder="Picture URL" name="pic" type="text" value=<?php echo '"'.$row['pic'].'"'; ?>></div>
                     <div class="form-group" id="userDescription"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="bio" name="bio" placeholder="Enter short description" type="text" value=<?php echo '"'.$row['bio'].'"'; ?>></div>
                     <div class="form-group" id="companyName"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="cproject" name="cproject" placeholder="Enter company/project name" type="text" value=<?php echo '"'.$row['cproject'].'"'; ?>></div>
                     <div class="form-group" id="websitePage"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="website" name="website" type="text" placeholder="Enter website" value=<?php echo '"'.$row['website'].'"'; ?>></div>
                     <div class="form-group" id="fbPage"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="facebook" name="facebook" placeholder="Enter facebook page" type="text" value=<?php echo '"'.$row['facebook'].'"'; ?>></div>
                     <div class="form-group" id="linkedinPage"><label class="control-label" for="exampleInputEmail1"></label><input class="form-control" id="linkedin" name="linkedin" placeholder="Enter LinkedIn page" type="text" value=<?php echo '"'.$row['linkedin'].'"'; ?>></div>
                  
               </div>
               <div class="modal-footer"><a class="btn btn-default" data-dismiss="modal">Close</a><button name="submit" type="submit" class="btn btn-default">Apply Changes</button></div>
               </form>
            </div>
         </div>
      </div>
      <div class="section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <p>User experience points</p>
               </div>
            </div>
         </div>
      </div>
      <div class="section">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="progress" id="progressBar">
                  	 <?php //Find as percentage of highest for bar length, write score on bar 
                  	 	$myXP = $row["xp"];

                  	 	$sql = "SELECT MAX(xp) AS HighestXP FROM profile";
                  	 	$result = $conn->query($sql);
                  	 	$xprow = $result->fetch_assoc();

                  	 	$maxXP = $xprow["HighestXP"];
                  	 	$conn->close();

                  	 	echo '<div class="progress-bar" role="progressbar" style="width: '. (($myXP/$maxXP) * 100).'%;">'.$myXP. ' XP</div>';

                  	 ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="section">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <a class="btn btn-block btn-lg btn-primary" contenteditable="true" id="browsePeople">Browse People</a>
               </div>
               <div class="col-md-3">
                  <a class="btn btn-block btn-lg btn-primary" id="viewConnections">View connections</a>
               </div>
               <div class="col-md-3">
                  <a class="btn btn-block btn-lg btn-primary" id="viewProjects">View my projects</a><a class="btn btn-block btn-lg btn-primary" id="viewUsersProjects">View user's projects</a>
               </div>
               <div class="col-md-3">
                  <a class="btn btn-block btn-lg btn-primary" id="customizeProfile" data-toggle="modal" data-target="#customizeProfile">Customize Profile</a><a class="btn btn-block btn-lg btn-primary" id="contactUser">Contact User</a>
               </div>
            </div>
         </div>
      </div>
      <footer class="section section-primary">
         <div class="container">
            <div class="row">
               <div class="col-sm-6">
                  <h1>Footer header</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam, quis nostrud</p>
               </div>
               <div class="col-sm-6">
                  <p class="text-info text-right"> <br><br></p>
                  <div class="row">
                     <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left"> <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 hidden-xs text-right"> <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
   </body>
</html>