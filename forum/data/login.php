<?php 

include('../includes/config.php');

session_start();

  $Email = mysqli_real_escape_string($con, $_POST['Email']); 
  $Password = mysqli_real_escape_string($con, $_POST['Password']); 
  $Status = 1; 
   
   $result_query = mysqli_query($con, "SELECT id, Email, Password FROM fusers WHERE (Email = '$Email')"); 
   $num = mysqli_fetch_array($result_query); 

      sleep(3); 

   if($num>0)
   {
     $hashpassword = $num['Password']; 
   if(password_verify($Password, $hashpassword)){
      $_SESSION['sign-in'] = $num['id']; 

       echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>Login successfully !</div>";

     echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";

    }else{

     echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Wrong Password !</div>";  
    }

}else{

    echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>User Not Found !</div>";  
}




?>