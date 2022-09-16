<?php 
session_start(); 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){}
else{ 
  header('location:loginpage.php'); 
  exit(); 
  } 
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="1607421792.ico">
  <title>Tendua</title>
 
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <style>
    body {
  padding-top: 56px;
    }
    .row{
              background:white;
              border-radius: 30px; 
          }
          .navbar {
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
}  
.btn1{
              border: none;
              outline: none;
              height: 50px;
              width:100%;
              background-color: black;
              color: white;
              border-radius: 4px;
              font-weight: bold;
          }
          .btn1:hover{
              background: white;
              border: 1px solid;
              color: black;

          }    
  img{
    border-radius: 100%;
  }  
  .map-container-5{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container-5 iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
} 
    
    

  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">tendua</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewpage.php">MyTweets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="log_out.php">Log out</a>            
            <!-- link to log out php to end session and php will direct to login page -->
          </li>
        </ul>
      </div>
    </div>
  </nav>
<section class="header">
  <div class="container">
    <div class="row px-5 pt-5">
      <div class="col-lg-6">
<h1>Profile</h1>
      </div>
      <div class="col-lg-6">
  <img src="tenduapp.png" alt="">
      </div>
    </div>
    <div class="row px-5 pt-5">
  <div class="col-lg-6">
    <h5>Email-id:</h5>
  </div>
  <div class="col-lg-6">
   <?php 
    $user_email = $_SESSION["EMAIL"];
    echo "<h5>$user_email</h5>";
   ?> 

  </div>
  </div>
  <div class="row px-5 pt-5">
    <div class="col-lg-6">
<h5>Location:</h5>
    </div>
    <div class="col-lg-6">
      <!-- Google map Location-->
    <!--Card-->
    <div class="card card-cascade narrower">

      <!--Card image-->
      <div class="view view-cascade gradient-card-header peach-gradient">
        <h5 class="mb-0">Current Location</h5>
      </div>
      <!--/Card image-->

      <!--Card content-->
      <div class="card-body card-body-cascade text-center">

        <!--Google map-->
        <div id="map-container-google-9" class="z-depth-1-half map-container-5" style="height: 300px">
          <iframe src="https://maps.google.com/maps?q=Madryt&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
            style="border:0" allowfullscreen></iframe>
        </div>


      </div>
      <!--/.Card content-->

    </div>
    <!--/.Card-->


      </div>

  </div>
  </div>
</section>
  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;Tendua.inc@2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>