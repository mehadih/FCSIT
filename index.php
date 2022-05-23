<?php include_once 'helpers/init.php';?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" type="text/css" href="bin/bootstrap.css">
    <link rel="stylesheet" href="assests/css/style.css">
    <style media="screen">
    body{
      background: #92a8d1;
      background-image: url(assests/img/Unimas.jpg)
    }
    </style>
    <title>FCSIT Supports</title>
    <link rel = "icon" href ="uploads/UNIMAS-logo.png" type = "image/x-icon"> 
  </head>
  <body class="">
    <div class="container-fluid">
      <nav class="navbar navbar-dark bg-dark">
        <span class="navbar-brand mb-0 h1">FCSIT Supports</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="views/adminlogin.php">Admin</a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Login
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="views/stafflogin.php">Staff</a>
                  <a class="dropdown-item" href="views/smlogin.php">Support Manager</a>
                  <a class="dropdown-item" href="views/studentlogin.php">Student</a>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="http://www.fcsit.unimas.my/about-us">About</a></li>
            </ul>
        </div>
      </nav>
        
      <div class="jumbotron jumbotron-fluid">
        <div class="container">
          <h1 class="display-4">Online Complaining System</h1>
          <p class="lead">Register your complains through this portal.</p>
          <a class="btn btn-success btn-lg" href="views/studentlogin.php" role="button">Get Started</a>
        </div>
      </div>
    </div>



  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->
      <script src="bin/jquery.js"></script>
      <script src="bin/bootstrap.js"></script>
  </body>
</html>