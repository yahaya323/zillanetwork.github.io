<?php

  include('../includes/config.php');
error_reporting(0);

$postid = $_POST['id'];
$query=mysqli_query($con,"UPDATE tblposts SET Is_Active=0 WHERE id={$postid}");
sleep(3);

if($query)
{
 echo "<div class='alert alert-dismissible fade show alert-warning' role='alert'><strong>Oh No ! </strong>Post Deleted successfully !</div>";
}
else{
 echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>"; 
} 

?>