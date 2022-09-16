<?php 

if ( isset($_POST['login']) && $_POST['login'] == 'login'){ 
//Collect POST values 
$user_name = $_POST['email']; 
$pass = $_POST['pass']; 
$count = 0;

if($user_name && $pass){ 
//Connect to mysql server 
$link = mysqli_connect("localhost","root", "","tweet_db"); 
//Check link to the mysql server 
if(!$link) { 
    $_SESSION["db_conn_error"] = mysqli_error($link); 
    exit();
}  
//Create query (if you have a user_names table the you can select user_name id and pass from there)

$sql = "SELECT * FROM `user` WHERE `email` LIKE '$_POST[email]' AND `password` LIKE '$_POST[pass]'";
if($result = mysqli_query($link, $sql))
$count = mysqli_num_rows($result);

//if query was successful it should fetch 1 matching record from the table. 
if($count==1){ 
//user_name successful set session variables and redirect to main page. 

$row = mysqli_fetch_array($result);
 
session_start(); 
$_SESSION['IS_AUTHENTICATED'] = 1; 
$_SESSION['USER_NAME'] = $row['user_name']; 
$_SESSION['EMAIL'] = $row['email'];
$_SESSION['USER_ID'] = $row['user_id']; 
header('location:homepage.php');    
} 
else{ 
//user_name failed 
$_SESSION["error"] = 'INVALID USER NAME OR PASSWORD: ';
include('loginpage.php'); 
// echo 'Incorrect Username or pass !!!'; 
exit(); 
} 
} 
else{
$_SESSION["error"] = 'MISSING FIELDS'; 
include('loginpage.php'); 
// echo 'Username or pass missing!!'; 
exit(); 
} 
}  


else if (isset($_POST['register']) && $_POST['register'] == 'register'){ 
//Collect POST values 
$user_name = $_POST['name']; 
$pass = $_POST['pass']; 
$email  = $_POST['email'];
$count=0;

if($user_name && $pass && $email){ 
//Connect to mysql server 
$link = mysqli_connect("localhost","root", "","tweet_db"); 
//Check link to the mysql server 
if(!$link) {
     $_SESSION["db_conn_error"] = mysqli_error($link); 
     exit();
}  

$sql = "SELECT * FROM `user` WHERE `email` LIKE '$_POST[email]'";
if($result = mysqli_query($link, $sql))
$count = mysqli_num_rows($result);

if($count==1){ 
$row = mysqli_fetch_array($result);
$_SESSION["error"] = 'USER ALREADY EXISTS';
include('register.php'); 
exit(); 
} 
else{ 
    $sql = "SELECT * FROM `user`";
    $result = mysqli_query($link, $sql);
    $id=1;
    while($row = mysqli_fetch_assoc($result))
    $id = $row['user_id']+1;

    $sql = "INSERT INTO `user`(user_id,user_name,email,password) VALUES ($id,'$user_name','$email','$pass')";
    $results = mysqli_query($link,$sql); 
     
    if($results == FALSE){
        $_SESSION["error"] = 'DATABASE ERROR'.mysqli_error($link);
        include('register.php');
         exit();
    }else{
        header('location:loginpage.php'); 
    }   
} 
} 
else{
    $_SESSION["error"] = 'FIELDS MISSING';
    include('register.php');
    exit();
} 
}
else{
    header('location:register.php'); 
    exit(); 
} 

?>
