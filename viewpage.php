
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
  <script src="https://kit.fontawesome.com/955279a20f.js" crossorigin="anonymous"></script>
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
              background-color:;
              color:;
              border-radius: 4px;
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
      <?php 
      session_start();
      $link = mysqli_connect("localhost","root","","tweet_db"); 
      if(!$link){ 
          $_SESSION["db_conn_error"] = ' '. mysqli_error($link);
          include('viewpage.php');
          exit();
      } 
      $query = 'SELECT * FROM `user` WHERE user_id ='.$_SESSION['USER_ID']; 
      $results = mysqli_query($link,$query);
      while($row = mysqli_fetch_assoc($results))
       $user_name = $row['user_name'];
      
      echo '<h1>Hi '.$user_name.'</h1>';

?>
      </div>
      <div class="col-lg-6">
  <img src="tenduapp.png" alt="">
      </div>
    </div>
    <div class="row px-5 pt-5">
  <div class="col-lg-6">
    <h5>Total  tweets</h5>
  </div>
  <div class="col-lg-6">
   <?php 
      $link = mysqli_connect("localhost","root","","tweet_db"); 
      if(!$link){ 
          $_SESSION["db_conn_error"] = ' '. mysqli_error($link);
          include('viewpage.php');
          exit();
      } 
      $query = 'SELECT * FROM `data` WHERE user_id ='.$_SESSION['USER_ID']; 
      if($results = mysqli_query($link,$query))
       $tweet_count = mysqli_num_rows($results);
      
      echo '<h5>'.$tweet_count.'</h5>';
   ?>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-6">

        <h1 class="my-4">My Tweets
        </h1>

        <div class="card mb-4">
         
          <?php
            include('my_post.php');
          ?>
 
      </div>
      </div>
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
