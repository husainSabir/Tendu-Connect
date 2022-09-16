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
            <a class="nav-link" href="log_out.php">Log out</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-9">

      <?php 
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
      
      echo 
      '<h1 class="my-4">Welcome
        <small>'.$user_name.'  Share your views.</small>
      </h1>';

?>

        <!-- Blog Post -->
        <div class="form-floating">
            <form method="post" action="add_post.php" name="usrfrm" id="usrfrm">
            <textarea name="content" id="text-content" form="usrfrm" class="form-control" placeholder="Leave a comment here"></textarea>
           <button type="submit" class="btn1 mt-3 mb-5" name="submit-text" value="content">Submit</button>
            </form>   
          </div>
          
          
        <!-- Blog Post -->
        <?php 
          include('data.php');
        ?>

        <!-- Pagination
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul> -->

      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

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