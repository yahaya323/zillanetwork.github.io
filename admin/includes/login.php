<?php
session_start();
include('config.php');
error_reporting(0); 

    $uname=$_POST['username'];
    $password=$_POST['password'];
  
$sql =mysqli_query($con,"SELECT * FROM tbladmin WHERE (AdminUserName='$uname' || AdminEmailId='$uname')");
 $num=mysqli_fetch_array($sql);
 sleep(3);

if($num>0)
{
$hashpassword=$num['AdminPassword']; 

if (password_verify($password, $hashpassword)) {
$_SESSION['login'] = $num['id'];
     echo"<div class='alert alert-dismissible fade show alert-success' role='alert'><strong>Good !</strong>You have login Successfully !</div>";
    echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
  } else {
echo'<div class="alert alert-dismissible fade show alert-danger" role="alert"><strong>Error ! </strong>Wrong Password !</div>'; 
 
  }
}

else{
 echo'<div class="alert alert-dismissible fade show alert-warning" role="alert"><strong>Warning ! </strong>Email or Username not found !</div>';
  }
 

?>