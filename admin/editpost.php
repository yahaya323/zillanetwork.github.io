<?php
include('includes/config.php');

$posttitle= mysqli_real_escape_string($con, $_POST['posttitle']);

$catid= mysqli_real_escape_string($con, $_POST['category']);

$postdetails = mysqli_real_escape_string($con, $_POST['postdescription']);

$postid = mysqli_real_escape_string($con, $_POST['post_id']);

$arr = explode(" ",$posttitle);

$url=implode("-",$arr);

$status=1;



$query=mysqli_query($con,"UPDATE tblposts SET PostTitle='$posttitle',CategoryId='$catid', PostDetails='$postdetails', PostUrl='$url', Is_Active='$status' WHERE id='$postid'");

sleep(3);

if($query)
{

 echo "<div class='alert alert-dismissible fade show alert-info' role='alert'><strong>Congrats ! </strong>Post Updated successfully !</div>";
}
else{

  echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>";    
} 



?>