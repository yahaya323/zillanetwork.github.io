<?php 

include('../includes/config.php');

$category = $_POST["category"];
$description = $_POST["description"];
$status=1;
$query=mysqli_query($con,"INSERT INTO tblcategory(CategoryName,Description,Is_Active) 
   VALUES('$category','$description','$status')");
sleep(3);
if($query)
{
   echo "<div class='alert alert-dismissible fade show alert-info' role='alert'><strong>Congrats ! </strong>category created successfully !</div>";
}
else{
echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Warning! </strong>Something Went Wrong Please Try Again !</div>";  
} 


?>