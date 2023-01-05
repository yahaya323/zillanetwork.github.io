 <?php 
include('../includes/config.php');

    $Eid = mysqli_real_escape_string($con, $_POST['Eid']);

    $Poster = mysqli_real_escape_string($con, $_POST['poster']); 

    $Title = mysqli_real_escape_string($con, $_POST['title']); 

    $arr = explode(" ",$Title);

    $url=implode("-",$arr);

    $tag = mysqli_real_escape_string($con, $_POST['tag']);  

    $content = mysqli_real_escape_string($con, $_POST['message']); 

    $status = 1; 
  
    $result_query = mysqli_query($con, "UPDATE topics SET Posted_by ='$Poster', Title ='$Title', Tag='$tag', Url='$url', Content='$content', Active='$status' WHERE id = '$Eid'");

     sleep(3);

    if($result_query){
     echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>Your question is updated successfully !</div>";
    }else{
       echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !</div>";   
    }

  ?>