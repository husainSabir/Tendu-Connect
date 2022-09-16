<?php
// Code to be executed when 'Insert' is clicked. 
if ($_POST['submit-text'] == 'content'){
 
session_start();
if(isset($_POST['content']))
$message = htmlspecialchars($_POST['content']);
$user_id = $_SESSION['USER_ID'];

//Connect to mysql server 
$link = mysqli_connect("localhost","root","","tweet_db"); 
//Check link to the mysql server 
if(!$link){ 
    $_SESSION["db_conn_error"] = ' '. mysqli_error($link);
    include('homepage.php');
    exit();
} 

$sql = "SELECT * FROM `data` WHERE user_id = $user_id";
$result = mysqli_query($link,$sql);
$post_id=1;
while($row = mysqli_fetch_assoc($result))
$post_id = 1+ $row['post_id'];

// $query = "INSERT INTO data (user_id, post_id, message,post_date) VALUES ('$user_id','$post_id','$message','NOW()')"; 
$query = "INSERT INTO `data` (`post_id`,`user_id`,`message`,`post_date`) VALUES ($post_id,$user_id,'$message',NOW())"; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE){
    $_SESSION["db_error"] = 'DATABASE ERROR';
    // $_SESSION["error"] = ' '. mysqli_error($link);
    include('homepage.php');
     exit();
}else{
    header('location:homepage.php'); 
    exit();
} 
} 
else{ 
header('location:loginpage.php'); 
exit(); 
} 
?>
