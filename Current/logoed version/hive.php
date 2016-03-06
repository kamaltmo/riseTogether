<?php

    include 'database_info.php';
   session_start(); // Start Session

   // Create connection
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Check connection
    if ($conn->connect_error) {
        header("Location: index.php");
        echo $error = "Connection failed: " . $conn->connect_error;
    } else {
        $sql = "SELECT * FROM skills WHERE ID NOT IN (SELECT skillsID FROM profileskills WHERE profileID = ".$_SESSION['userID'].")";
        $result = $conn->query($sql);
        $conn->close();
    }

?>


<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="bootstrap.min.css"></head><body>
        <div class="navbar navbar-default navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-ex-collapse">
              <a href="logout.php" class="btn btn-default navbar-right">Sign Out</a>
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li class="active"><a href="#">Contacts</a></li>
              </ul>
              <img src="assets/logo.png" class="img-responsive">
            </div></div></div><div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="text-center text-primary"><b>Hive</b></h1><h3 class="text-center">What Do You Need Help With</h3>
                    </div>
                </div>

                <?php

                    $numSkills = $result->num_rows;
                    $counter = 3;
                    echo '<div class="row">
                            <div class="col-md-4">';

                    while($row = $result->fetch_assoc()) {

                        echo '<a href="skillPage.php?skill='.$row["ID"].'"><img src="assets/'.$row["ID"].'.png" class="center-block img-responsive"></a>';
                        echo '<h3 class="text-center text-muted">'.$row["skillName"].'</h3>';
                        $counter--;

                        if($counter == 0) {
                            echo '</div></div><div class="row"><div class="col-md-4">';
                        } else {
                            echo '</div>
                                <div class="col-md-4">';
                        }

                    }
                    echo '</div></div>';
                ?>

        </div><div class="section"><div class="container"><div class="row"></div></div></div><footer class="section section-primary"> <div class="container"> <div class="row"> <div class="col-sm-6">  <p>Address</p></div><div class="col-sm-6"> <div class="row"> <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left"> <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> </div></div><div class="row"> <div class="col-md-12 hidden-xs text-right"> <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a> <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a> </div></div></div></div></div></footer>


</body></html>
