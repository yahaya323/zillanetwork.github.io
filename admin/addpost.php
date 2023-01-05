<?php 

include('includes/config.php');

$posttitle = mysqli_real_escape_string($con, $_POST['posttitle']);
$arr = explode(" ",$posttitle);
$url = implode("-",$arr);
$category = mysqli_real_escape_string($con, $_POST['category']);
$postdescibe = mysqli_real_escape_string($con, $_POST['postdescibe']);

$image_name = $_FILES['postimage']['name'];
if(!empty($posttitle) && !empty($category) && !empty($postdescibe) && !empty($image_name)){

if($_FILES['postimage']['type'] == 'image/jpeg' ||
    $_FILES['postimage']['type'] == 'image/png' ||
    $_FILES['postimage']['type'] == 'image/gif'){

    $new_image_name = $_FILES['postimage']['name']; 


 $target_path = "postimages/" . $new_image_name;

if(move_uploaded_file($_FILES['postimage']['tmp_name'], $target_path)){
$imgnewfile = "postimages/" . $new_image_name;

$status = 1;


$query = mysqli_query($con,"INSERT INTO tblposts(PostTitle, CategoryId, PostDetails, PostUrl, Is_Active, PostImage) 
  VALUES('$posttitle', '$category', '$postdescibe', '$url', '$status', '$imgnewfile')");

sleep(3);

      if($query)
      {
        echo "<div class='alert alert-dismissible fade show alert-info' role='alert'><strong>Congrats ! </strong>Post Published successfully !</div>";
      }
      else{
      echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>";   
      } 

  }
  }

}else{
    echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Fill in the blank !</div>"; 
  }


?>