
<?php 
include('../includes/config.php');



  $Role = mysqli_real_escape_string($con, $_POST['Role']); 
  $Username = mysqli_real_escape_string($con, $_POST['Username']); 
  $First_name = mysqli_real_escape_string($con, $_POST['First_name']); 
  $Last_name = mysqli_real_escape_string($con, $_POST['Last_name']); 
  $Email = mysqli_real_escape_string($con, $_POST['Email']); 
  $Password = mysqli_real_escape_string($con, $_POST['Password']); 
  $Hash = password_hash($Password, PASSWORD_DEFAULT); 
  $Status = 1; 
   if(!empty($Username) && !empty($First_name) && !empty($Last_name) && !empty($Email) && !empty($Password)){
   $result_query = mysqli_query($con, "SELECT id, Email FROM fusers WHERE Email = '$Email'"); 
   $ret = mysqli_fetch_array($result_query); 
   if($ret>0){
     $alert = "Email already Been used !"; 
   }else{
   $query= mysqli_query($con, "INSERT INTO fusers(Role, Username, Email, Password, First_name, Last_name, Active) 
    VALUES('$Role', '$Username', '$Email', '$Hash', ' $First_name', '$Last_name', '$Status')"); 

   sleep(3); 

    if($query){
      echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>You have registered successfully !</div>";
    
    }else{
       echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !</div>";  
     
       
    }

}
}else{
  echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Fill in the blank !</div>"; 
}
?>
