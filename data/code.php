<?php 
include('../includes/config.php');


if(isset($_POST['add-sub-replies'])){

   $cm_id = mysqli_real_escape_string($con, $_POST['cm_id']); 
   $sub_reply_name= mysqli_real_escape_string($con, $_POST['name']); 
   $sub_reply_msg = mysqli_real_escape_string($con, $_POST['msg']);
   $postid = mysqli_real_escape_string($con, $_POST['postid']);
   $status = 1;

   if(!empty($sub_reply_name) && !empty($sub_reply_msg)){ 
$reply_insert = mysqli_query($con, "INSERT INTO reply(name, reply, comment_id, Post_id, active)
   VALUES('$sub_reply_name', '$sub_reply_msg', '$cm_id', '$postid', '$status')");
sleep(3);
if($reply_insert){

   echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>You have reply to this comment successfully !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}else{

   echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>"; 
}
}else{
   
  echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Fill in the blank !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>"; 
}

}



if(isset($_POST['view_replies_data'])){
   $cm_id = mysqli_real_escape_string($con, $_POST['cm_id']); 

   $reply_result = mysqli_query($con, "SELECT * FROM reply WHERE comment_id ='$cm_id'");
$count_reply = mysqli_num_rows($reply_result );
$array_reply = []; 
    
   if($count_reply > 0)
   {
      foreach ($reply_result as  $row) {
         
         array_push($array_reply, ['cmt'=>$row]);
      }
      header('Content-type: application/json'); 
      echo json_encode($array_reply); 
   }else{
      echo "No reply here !";
   }
}



if(isset($_POST['add-reply'])){

       $cm_id = mysqli_real_escape_string($con, $_POST['comment_id']);
       $reply_name = mysqli_real_escape_string($con, $_POST['reply_name']);
       $reply_msg = mysqli_real_escape_string($con, $_POST['reply_msg']);
       $postid = mysqli_real_escape_string($con, $_POST['postid']);
       $status = 1;
      if(!empty( $reply_name) && !empty($reply_msg)){ 
$reply_insert = mysqli_query($con, "INSERT INTO reply(name, reply, comment_id, Post_id, active)VALUES('$reply_name', '$reply_msg', '$cm_id', '$postid', '$status')");
sleep(3);
if($reply_insert){

    echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>You have reply to this comment successfully !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>";
}else{

    echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>"; 
}

}else{

 echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Fill in the blank !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>"; 
}


}



if(isset($_POST['comment-load-data']))
{

$postid = mysqli_real_escape_string($con, $_POST['postid']); 

$comment_result = mysqli_query($con, "SELECT * FROM comments WHERE postsid ='$postid'");
$count = mysqli_num_rows($comment_result);
$array_reslut = []; 
    
   if($count > 0)
   {
      foreach ($comment_result as  $row) {
      	
      	array_push($array_reslut, ['cmt'=>$row]);
      }
      header('Content-type: application/json'); 
      echo json_encode($array_reslut); 
   }else{
   	echo "Give a comment !";
   }
}

if(isset($_POST['add-comment'])){

	$name = mysqli_real_escape_string($con, $_POST['name']);
	$msg = mysqli_real_escape_string($con, $_POST['msg']); 
   $posid = mysqli_real_escape_string($con, $_POST['posid']); 
    $status = 1;
    if(!empty($name) && !empty($msg)){
	$insert_query = mysqli_query($con, "INSERT INTO comments(Name, Message, postsid, Active)
      VALUES('$name', '$msg', ' $posid', ' $status')");
     sleep(3); 
	if($insert_query){
		 echo "<div class='alert alert-dismissible fade show alert-info' role='alert'>You have make a comment successfully !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>";
	}else{
	 echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Something Went Wrong Please Try Again !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>"; 
}
}else{
    echo "<div class='alert alert-dismissible fade show alert-danger' role='alert'>Fill in the blank !<button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button></div>"; 
 }
}


?>