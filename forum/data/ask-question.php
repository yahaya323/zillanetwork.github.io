
  <?php 
include('../includes/config.php');

    $Poster = mysqli_real_escape_string($con, $_POST['poster']);

    $Title = mysqli_real_escape_string($con, $_POST['title']); 

    $arr = explode(" ",$Title);

    $url=implode("-",$arr);

    $tag = mysqli_real_escape_string($con, $_POST['tag']);  

    $content = mysqli_real_escape_string($con, $_POST['message']); 

    $status = 1; 

     if(!empty($Title) && !empty($tag) && !empty($content) ){
    $result_query = mysqli_query($con, "INSERT INTO topics(Posted_by, Title, Tag, Url, Content, Active) VALUES('$Poster', '$Title', '$tag', '$url', '$content', '$status')"); 
    sleep(3);

    if($result_query){
        echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>Your question posted successfully !</div>";
    
    }else{
      echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !</div>";   
    }
  }else{
      echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Fill in the blank !</div>"; 
    }
  
?>