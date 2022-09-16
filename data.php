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

$qry = 'SELECT * FROM `user` WHERE `user_id`<>'.$_SESSION['USER_ID']; 
$result = mysqli_query($link,$qry);

while($row = mysqli_fetch_assoc($result)){
 $user_name = $row['user_name'];
 $email = $row['email'];
}

 /*Create query*/ 
$qry = 'SELECT * FROM `data` WHERE `user_id`<>'.$_SESSION['USER_ID']; 
// $qry = 'SELECT * FROM `data`'; 

/*Execute query*/ 
// if($result = mysqli_query($link,$qry)){

$result = mysqli_query($link,$qry);
while ($row = mysqli_fetch_assoc($result))
{ 
 
$sql = 'SELECT * FROM `user` WHERE `user_id` ='.$row['user_id']; 
$results = mysqli_query($link,$sql);

while($rows=mysqli_fetch_assoc($results))
$user_name = $rows['user_name'];


   echo'<div class="card mb-4">          
        <div class="card-body">
        <h5 class="card-title">'.$user_name.'</h5>';

    echo'<p class="card-text">'.$row['message'].'</p>';
    echo'</div>
    <div class="card-footer text-muted">
    Posted on '.$row['post_date'].' by '.$email.'
    </div>
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
