<?php 

include('includes/config.php'); 

$postid = mysqli_real_escape_string($con, $_POST['post_id']);

$image_name = $_FILES['postimage']['name'];

if($_FILES['postimage']['type'] == 'image/jpeg' ||
    $_FILES['postimage']['type'] == 'image/png' ||
    $_FILES['postimage']['type'] == 'image/gif'){

    $new_image_name = $_FILES['postimage']['name']; 

    $target_path = "postimages/" . $new_image_name;

if(move_uploaded_file($_FILES['postimage']['tmp_name'], $target_path)){
$imgnewfile = "postimages/" . $new_image_name;


$query = mysqli_query($con,"UPDATE tblposts SET PostImage ='$imgnewfile' WHERE id='$postid'");
 
 sleep(3);

if($query)
{
     echo "<div class='alert alert-dismissible fade show alert-info' role='alert'><strong>Congrats ! </strong>Post Feature Image updated successfully !</div>";
   }else{

echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>"; 
       } 
   }
}
?>