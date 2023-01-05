<?php 
session_start();
include('../includes/config.php');

$id = $_SESSION['login']; 
$Cpass = $_POST["Cpassword"];
$NewPass = $_POST["Password"]; 
$NewHash = password_hash($NewPass, PASSWORD_DEFAULT); 

$query = mysqli_query($con, "SELECT id, AdminPassword FROM tbladmin WHERE id='$id'"); 

$ret = mysqli_fetch_array($query); 
$hashpassword = $ret["AdminPassword"]; 

if(password_verify($Cpass, $hashpassword)){

	$result = mysqli_query($con, "UPDATE tbladmin SET AdminPassword='$NewHash' WHERE id='$id'");
        sleep(3);
        
	if($result){

		echo "<div class='alert alert-dismissible fade show alert-success' role='alert'><strong>Good ! </strong>password Updated successfully !</div>";
	}else{
		echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>"; 
	}
}else{
	echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Current Password Not Match !</div>";
}



?>