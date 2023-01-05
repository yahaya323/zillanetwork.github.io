<?php 

include('../includes/config.php');

$catid = $_POST['cid'];

$category=$_POST['category'];

$description=$_POST['description'];

$query=mysqli_query($con,"UPDATE tblcategory SET CategoryName='$category', Description='$description' WHERE id='$catid'");
sleep(3);
if($query)
{

echo "<div class='alert alert-dismissible fade show alert-info' role='alert'><strong>Congrats ! </strong>category updated successfully !</div>";
}
else{

echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>";   
} 

?>
