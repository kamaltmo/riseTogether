<?php

   include 'database_info.php';
   session_start(); // Start Session

include('signup.php'); // Includes Login Script

   if(isset($_SESSION['login_user'])){
    //Redirect to page on login success
        header("location: profile.php");
}

?>

<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="bootstrap.min.css">
    </head><body>

<div class="cover">
<p id="demo"></p>
   <div class="navbar navbar-default">
      <div class="container">
         <div class="navbar-header"> <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#"><span>Logo</span></a> </div>
         <div class="collapse navbar-collapse" id="navbar-ex-collapse">
            <a onclick="getLocation()" class="btn btn-default navbar-btn navbar-right" data-toggle="modal" data-target="#SignIn">Sign In</a>
            <ul class="nav navbar-nav navbar-right">
               <li class="active"> <a href="#">About</a> </li>
               <li> <a href="#">Contact</a> </li>
            </ul>
         </div>
      </div>
   </div>
   <div class="cover-image"></div>
   <div class="container">
      <div class="row">
         <div class="col-md-12 text-center">
            <h1>Welcome to RT</h1>
            <p>Connect and Collaborate with other Startups to get where you need to be.<br>Get. Give. Rise. Together.</p>
            <br><br><a class="btn btn-lg btn-default" data-toggle="modal" data-target="#SignUp">Sign Up</a> 
         </div>
      </div>
   </div>
</div>
<div class="modal fade" id="SignIn">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" contenteditable="true">Sign In</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal" role="form" action="" method="post">
               <div class="form-group">
                  <div class="col-sm-2"><label for="inputEmail3" class="control-label">Email</label></div>
                  <div class="col-sm-10"><input type="email" class="form-control" id="email" name="email" placeholder="Email"></div>
               </div>
               <div class="form-group">
                  <div class="col-sm-2"><label for="inputPassword3" class="control-label">Password</label></div>
                  <div class="col-sm-10"><input type="password" class="form-control" id="password" name="password" placeholder="Password"></div>
               </div>
               <input id="onsiteCheck" name="onsiteCheck" type="hidden" name="onsite" value="0">
         </div>
         <div class="modal-footer"><button id="ss" type="submit" class="btn btn-default">Sign in</button></div>
         </form>
      </div>
   </div>
</div>
<div class="fade modal text-center" id="SignUp">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title">Sign Up</h4>
         </div>
         <div class="modal-body">
            <form class="form-horizontal text-center" role="form" action="" method="post">
               <div class="form-group">
                  <div class="col-sm-2"><label for="email" class="control-label">Email</label></div>
                  <div class="col-sm-10"><input type="email" class="form-control" id="email" name="email" placeholder="Email"></div>
               </div>
               <div class="form-group">
                  <div class="col-sm-2"><label for="inputPassword3" class="control-label">Password</label></div>
                  <div class="col-sm-10"><input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password"></div>
               </div>
               <div class="form-group">
                  <div class="col-sm-2"><label class="control-label">What's Your Main Skill?</label></div>
                  <div class="col-sm-10">
                     <select class="form-control" name="mainSkill">
                        <option>1</option>
                        <option>2</option>
                     </select>
                  </div>
               </div>
         </div>
         <div class="modal-footer"><button name="submitSignup" type="submit" class="btn btn-default">Sign Up</button></div>
         </form>
      </div>
   </div>
</div>
    <footer class="section section-primary">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p class="lead">Rise Manchester: 231 Deansgate 
Manchester 
M3 4EN</p>
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
              <div class="col-md-12 hidden-xs text-right">
                <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
</body>
   <script type="text/javascript">
      
      var x = document.getElementById("demo");
   function getLocation() {
       if (navigator.geolocation) {
           navigator.geolocation.getCurrentPosition(checkPosition);
       } 
   }
   function checkPosition(position) {
       //x.innerHTML = "Latitude: " + position.coords.latitude + 
       //"<br>Longitude: " + position.coords.longitude; 

       //Check user is in rise
       if (( -2.2512 > position.coords.longitude) && (position.coords.longitude > -2.2532)) {
         if (( 54.4672 > position.coords.latitude) && (position.coords.latitude > 53.4661)) {
               document.getElementById("onsiteCheck").value = 1;
            }
         }

      //Check user is in MMU
       if (( -2.2388 > position.coords.longitude) && (position.coords.longitude > -2.2419)) {
         if (( 54.4715 > position.coords.latitude) && (position.coords.latitude > 53.4695)) {
               document.getElementById("onsiteCheck").value = 1;
            }
         } 

   }

   $("document").ready(function(){ 

      $("#ss").click(function() {
         var email = document.getElementById("email").value;
         var pass = document.getElementById("password").value;
         var onsiteCheck = document.getElementById("onsiteCheck").value;
         $.post( "login.php", { email: ""+email+"", password: ""+pass+"", onsiteCheck:''+onsiteCheck+'' } );
      });

   });

   </script>
</html>