
<?php
include('../includes/config.php');
	
		$id = mysqli_real_escape_string($con, $_POST['id']); 

     $Delete_query = mysqli_query($con, "UPDATE topics SET Active = 0 WHERE id='$id'"); 

     sleep(3);

     if($Delete_query){
     	   echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>Your question is updated successfully !</div>";
      }else{
        echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !</div>";   
      }


	
?>