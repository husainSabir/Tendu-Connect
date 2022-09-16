<?php 
//Check if the user is authenticated first. Or else redirect to login page 
if(isset($_SESSION['IS_AUTHENTICATED']) && $_SESSION['IS_AUTHENTICATED'] == 1){ 

 /*Connect to mysql server*/ 
$link = mysqli_connect("localhost", "root", "","tweet_db");  

/*Check link to the mysql server*/ 
if(!$link)
{ 
  $_SESSION["db_conn_error"] = mysqli_error($link); 
  exit();
 } 

 $qry = 'SELECT * FROM `user` WHERE `user_id`='.$_SESSION['USER_ID']; 
$result = mysqli_query($link,$qry);

while($row = mysqli_fetch_assoc($result)){
 $user_name = $row['user_name'];
 $email = $row['email'];
}


 /*Create query*/ 
$qry = 'SELECT * FROM `data` WHERE `user_id`='.$_SESSION['USER_ID'].''; 
// $qry = 'SELECT * FROM `data`'; 

/*Execute query*/ 
// if($result = mysqli_query($link,$qry)){

$result = mysqli_query($link,$qry);
while ($row = mysqli_fetch_assoc($result))
{ 
   
    echo '<div class="card-body">
          <h5 class="card-title">'.$user_name.'</h5>
          <p class="card-text">'.$row['message'].'</p> 
        </div>
        <div class="card-footer text-muted">
        <p>   Posted on '.$row['post_date'].' </p>
         <form method="post" action="update_text.php">
          <button type="submit"  class="btn btn-dark btn-lg btn1 mt-1 mb-1"  name="update" value="'.$row['post_id'].'"><i class="fas fa-pencil-alt"></i></button>
        </form>
        <form method="post" action="edit_tweet.php">
        <button type="submit"  class="btn btn-dark btn-lg btn1 mt-1 mb-1"  name="delete" value="'.$row['post_id'].'"><i class="far fa-trash-alt"></i></button>
        </form>
        </div>';
}
// } 
// else{
//       // in case no post is there by other users
// }    
}
else{ 
header('location:loginpage.php'); 
exit(); 
} 
?>
