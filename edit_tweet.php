<?php
// Code to be executed when 'Insert' is clicked. 
if (isset($_POST['delete'])){

session_start();
$user_id = $_SESSION['USER_ID'];
$id = (int)$_POST['delete'];
//Connect to mysql server 
$link = mysqli_connect("localhost","root","","tweet_db"); 
//Check link to the mysql server 
if(!$link){ 
    $_SESSION["db_conn_error"] = ' '. mysqli_error($link);
    include('viewpage.php');
    exit();
} 

// $query = "INSERT INTO data (user_id, post_id, message,post_date) VALUES ('$user_id','$post_id','$message','NOW()')"; 
$query = 'DELETE FROM `data` WHERE  post_id ='.$id.' AND user_id ='.$user_id; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE){
    // $_SESSION["error"] = 'DATABASE ERROR';
    $_SESSION["delete_error"] = ' '. mysqli_error($link);
    include('viewpage.php');
     exit();
}else{
    header('location:viewpage.php'); 
    exit();
} 
}



else if( isset($_POST['submit-text']) && $_POST['submit-text'] == 'update'){
 
session_start();
if(isset($_POST['content']))
$message = htmlspecialchars($_POST['content']);
$user_id = $_SESSION['USER_ID'];
$id = (int)$_SESSION['POST_ID'];

//Connect to mysql server 
$link = mysqli_connect("localhost","root","","tweet_db"); 
//Check link to the mysql server 
if(!$link){ 
    $_SESSION["db_conn_error"] = ' '. mysqli_error($link);
    include('homepage.php');
    exit();
} 
// $query = "INSERT INTO data (user_id, post_id, message,post_date) VALUES ('$user_id','$post_id','$message','NOW()')"; 
$query = "UPDATE `data` SET message = '$message' WHERE post_id =".$id." AND user_id =".$user_id; 
//Execute query 
$results = mysqli_query($link,$query); 
 
//Check if query executes successfully 
if($results == FALSE){
    // $_SESSION["error"] = 'DATABASE ERROR';
    $_SESSION["delete_error"] = ' '. mysqli_error($link);
    include('viewpage.php');
     exit();
}else{
    header('location:viewpage.php'); 
    exit();
} 
} 
else{ 
header('location:viewpage.php'); 
exit(); 
} 
?>
