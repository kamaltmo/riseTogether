<?php
    
    include 'database_info.php';
   session_start(); // Start Session

    $skillID = $_GET['skill'];
    $id = $_SESSION['userID'];
    $mainSkill =" Skill";

    if (!isset($skillID)) {
       header("Location: index.php");
   } else {

      // Create connection
      $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
      // Check connection
      if ($conn->connect_error) {
          header("Location: index.php");
          echo $error = "Connection failed: " . $conn->connect_error;
      } else {

          $sql = "SELECT * FROM profile WHERE ID = '".$id."'";
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

          

        } 

          $sql = "SELECT * FROM skills WHERE ID = '".$skillID."'";
          $result = $conn->query($sql);
          $skillInfo = $result->fetch_assoc();


          $sql = "SELECT * FROM profile WHERE ID IN (SELECT profileID FROM profileskills WHERE skillsID = ".$skillID.")";
          $result = $conn->query($sql);
          $conn->close();
      }

   }

?>

<html><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <style>
      /* CSS design by @jofpin */
      @import url(http://fonts.googleapis.com/css?family=Raleway|Varela+Round|Coda);
      @import url(http://weloveiconfonts.com/api/?family=entypo);
      
      [class*="entypo-"]:before {
        font-family: 'entypo', sans-serif;
      }
      
      .title-pen {
        color: #333;
        font-family: "Coda", sans-serif;
        text-align: center;
      }
      .title-pen span {
        color: #55acee;
      }
      
      #card {
      	margin-top:20px
      }
      
      .data {
        -webkit-box-shadow: 0px 11px 53px -14px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 11px 53px -14px rgba(0,0,0,0.75);
		box-shadow: 0px 11px 53px -14px rgba(0,0,0,0.75);
      }
      
      .user-profile {
        margin: auto;
      	width: 40em; 
        height: 11em;
        background: #ececec
;
        border-radius: .3em;
        
        -webkit-box-shadow: 0px 11px 53px -14px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 11px 53px -14px rgba(0,0,0,0.75);
		box-shadow: 0px 11px 53px -14px rgba(0,0,0,0.75);
      }
      
      .user-profile  .username {
        margin: auto;
        margin-top: -3.40em;
        margin-left: 5.80em;
        color: #658585;
        font-size: 1.53em;
        font-family: "Coda", sans-serif;
        font-weight: bold;
      }
      .user-profile  .bio {
        margin: auto;
        display: inline-block;
        margin-left: 10.43em;
        color: #e76043; 
        font-size: .87em;
        font-family: "varela round", sans-serif;
      }
      .user-profile > .description {
        margin: auto;
        margin-top: 1.35em;
        margin-right: 4.43em;
        width: 31em;
        color: #658585;
        font-size: .87em;
        font-family: "varela round", sans-serif;
      }
      .user-profile > img.avatar {
      	padding: .7em;
        margin-left: 1em;
        margin-top: 1em;
        height: 6.23em;
        width: 6.23em;
        border-radius: 18em;
      }
      
      .user-profile ul.data {
      	margin: 2em auto;
      	height: 4.70em;
        background: #D11919;
        text-align: center;
        border-radius: 0 0 .3em .3em;
      }
      .user-profile li {
      	margin: 0 auto;
        padding: 1.30em; 
        width: 33.33334%;
        display: table-cell;
        text-align: center;
      }
      
      .user-profile span {
      	font-family: "varela round", sans-serif;
      	color: #e3eeee;
        white-space: nowrap;
        font-size: 1.27em;
        font-weight: bold;
      }
      .user-profile span:hover {
        color: #daebea;
      }

      .cardrow {
        margin-top: 60px;
      }
      
      i {
        color:#fff;
      }
      
      footer > h1 {
        display: block;
        text-align: center;
        clear: both;
        font-family: "Coda", sans-serif;
        color: #343f3d;
        line-height: 6;
        font-size: 1.6em;
      }
      footer > h1 a {
        text-decoration: none;
        color: #ea4c89;
      }
    </style>
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
          <a href="logout.php" class="btn btn-default navbar-right">Sign Out</a><ul class="nav navbar-nav navbar-right">
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
          <div class="col-md-1"></div>
          <div class="col-md-10">
            <img src="<?php echo "assets/".$skillID.".png" ?>" class="center-block img-circle img-responsive">
            <h1 class="text-center text-muted"><?php echo $skillInfo["skillName"] ?></h1>
          </div>
          <div class="col-md-1"></div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section">
              <div class="container">
                <div class="row"><div class="col-md-12"><p class="text-center"><?php echo $skillInfo["skillInfo"] ?></p></div></div><div class="row">

                   <?php

                    while($row = $result->fetch_assoc()) {

                      if ($row["firstName"] == "") {
                        $row["firstName"] = "Name";
                      }

                       if ($row["bio"] == "") {
                        $row["bio"] = "User Bio";
                      }

                       if ($row["xp"] == "") {
                        $row["xp"] = "User Xp";
                      }

                      echo ' <div class="row cardrow"><div class="col-md-3"></div><div class="col-md-6" id="card">
                    <div class="user-profile">
                      <img class="avatar" src="'.$row["pic"].'" alt="Ash">
                      <div class="username">'.$row["firstName"]." ".$row["lastName"].'</div>
                      <div class="bio">'.$mainSkill.'</div>
                      <div class="description">'.$row["bio"].'</div>
                      <ul class="data text-justify">
                        <li><i class="fa fa-2x fa-fw fa-xing">'.$row["xp"].'</i></li><li>';

                          if ($row["onSite"] == '1') {
                            echo '<i class="fa fa-2x fa-crosshairs"></i>';
                          }

                          echo '
                          </li>                        
                        <li>
                          <a class="btn btn-block btn-default">Make A Request</a>
                        </li>
                      </ul>
                    </div>
                    <footer></footer>
                  </div> <div class="col-md-3"></div> </div>';
                    }


                   ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><footer class="section section-primary"> <div class="container"> <div class="row"> <div class="col-sm-6"> <h1><br><br></h1> <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, <br>sed eiusmod tempor incidunt ut labore et dolore magna aliqua. <br>Ut enim ad minim veniam, quis nostrud</p></div><div class="col-sm-6"> <p class="text-info text-right"> <br><br></p><p><br><br><br></p><div class="row"> <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left"> <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> </div></div><div class="row"> <div class="col-md-12 text-center">  <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-primary"></i></a> <a href="#"><i class="fa fa-3x fa-facebook fa-fw text-primary"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-primary"></i></a> </div></div></div></div></div></footer>
  

</body></html>