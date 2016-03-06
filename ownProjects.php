<?php

  include 'database_info.php';

  //$_SESSION['name'] //first name
  //$_SESSION['lname'] //last name
  //$_SESSION['login_user'] //email
  //$_SESSION['userID'] //User Id

  session_start();

  //make sure user is logged in
  if(!isset($_SESSION['userID'])){
        header("location: index.php");
    }

  //connect to database
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check connection
  if ($conn->connect_error) {
    //Print our connection errors to debug
    echo $error = "Connection failed: " . $conn->connect_error;

    //header("Location: index.php"); or redirect to another page
  } else {

    //Perform the sql you would like to execute here
    //Query
    $uEmail = $_SESSION['login_user'];
    $sql = "SELECT * FROM projects WHERE aimedUser = '$uEmail' AND acceptetdStatus = 0 ";
    $requestProj = $conn->query($sql);

    $sql1 = "SELECT * FROM projects WHERE aimedUser = '$uEmail' AND projectStatus = 0 AND acceptetdStatus = 1";
    $inprocessProject = $conn->query($sql1);

    $sql2 = "SELECT * FROM projects WHERE aimedUser = '$uEmail' AND projectStatus = 1 AND acceptetdStatus = 1";
    $finishedProject = $conn->query($sql2);

}
$conn->close();
?>

<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="bootstrap.min.css">
  </head><body>
    <div class="navbar navbar-default navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><span>Logo</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-ex-collapse">
          <a class="btn btn-default navbar-right">Sign Out</a>
          <ul class="nav navbar-nav navbar-right">
            <li class="active">
              <a href="#">Home</a>
            </li>
            <li class="active">
              <a href="#">Contacts</a>
            </li>
          </ul>
        </div>
      </div>
    </div>


    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1><?php if (count($requestProj) < 1) { echo "Project requests - Sorry, you have no project requests.";}
                                             else { echo "Project requests";} ?><br></h1>
  <?php
    while ($row = $requestProj -> fetch_assoc() ) {

      echo '<div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">'.$row["projectName"].'</h3>
              </div>
              <div class="panel-body">
                <p>'.$row["projectDescription"].'</p>

                <form class="form" role="form" action="updateProject.php" method="post">
                  <div class="form-group">
                    <input id="accProj" name="projectID" type="hidden" value="'.$row["projectID"].'"></input>
                    <button type="submit" class="btn btn-primary btn-sm">Accept</button>
                </form>
                <form class="form" role="form" action="declineProject.php" method="post">
                  <div class="form-group">
                    <input id="accProj" name="projectID" type="hidden" value="'.$row["projectID"].'"></input>
                    <button type="submit" class="btn btn-default btn-sm">Decline</button>
                </form>
              </div>
            </div>
            </div>
            </div>';
          }
    ?>
          </div>
        </div>
      </div>
    </div>
    <div class="section">



    <footer class="section section-primary">
      <div class="container">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-md-12">
            <h1>Projects in Progress</h1>

      <?php
        while ($row = $inprocessProject -> fetch_assoc() ) {

          echo  '<div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">'.$row["projectName"].'</h3>
              </div>
              <div class="panel-body">
                <p>'.$row["projectDescription"].'</p>
                <form class="form" role="form" action="completeProject.php" method="post">
                  <div class="form-group">
                    <input id="accProj" name="projectID" type="hidden" value="'.$row["projectID"].'"></input>
                    <button type="submit" class="btn btn-default btn-sm">Project completed!</button>
                </form>
              </div>
              </div>
              </div>';
            }
            ?>

            </div>
            <div class="row">
            </div>

            <h1>Completed Projects</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
<?php

  while ($row = $finishedProject -> fetch_assoc() ) {

    echo  '<div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">'.$row["projectName"].'</h3>
              </div>
              <div class="panel-body">
                <i class="fa fa-4x fa-check fa-fw pull-right text-muted"></i>
                <p contenteditable="true">'.$row["projectDescription"].'</p>
              </div>
            </div>';
          }
          ?>
          </div>
        </div>
        <div class="row">
        </div>
        <div class="row">
          <div class="col-sm-6">
            <p>
              <br>
              <br></p>
          </div>
          <div class="col-sm-6">
            <div class="row">
              <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 text-center">

                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>


</div></body></html>
