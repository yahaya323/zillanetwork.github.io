<?php 

include('../includes/config.php');

$topicid = mysqli_real_escape_string($con, $_POST['Topicid']); 
$Userid = mysqli_real_escape_string($con, $_POST['Userid']); 
$message = mysqli_real_escape_string($con, $_POST['Content']); 
$status = 1; 
if(!empty($message)){
$query = mysqli_query($con, "INSERT INTO answer(userid,	answer,topicid,active)VALUES('$Userid','$message','$topicid','$status')"); 

sleep(3);

if($query){
	echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>You have the questions successfully !</div>";
}else{
	echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !</div>";   
}
}else{
	echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Fill in the blank !</div>"; 
}


?>