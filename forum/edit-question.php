<?php 

session_start();
include('includes/config.php');
error_reporting(0);
include('includes/function.php');
if(strlen($_SESSION['sign-in'])==0)
  { 
header('location:sign-in.php');
}
else{ 



?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Zillanetwork - forum</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

 <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png');?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">

  <!-- Template Main CSS File --> 
    
    <link rel="stylesheet" href="<?= base_url('css/main.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/color.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css');?>">
     <style>
    .loader{
      display: none;
    }
  </style>
</head>
<body>
 <?php include('includes/header.php');?>
	<section>
      <div class="feature-photo">
      <figure><img src="<?= base_url('images/resources/timeline-1.jpg');?>" alt=""></figure>
      <div class="container-fluid">
        <div class="row merged">
          <div class="col-lg-2 col-sm-3">
            <div class="user-avatar">
               <?php 
                $id = $_SESSION['sign-in']; 
                 $query = mysqli_query($con, "SELECT * FROM fusers WHERE id = '$id'"); 
                 while($row = mysqli_fetch_array($query)){
                 $profile = $row['profile']; 
                if($profile){?>
                 <figure>
                 <img src="<?= base_url($row['profile']);?>" alt="">
                 </figure>
                 <?php }else{?>
                 <figure>
                 <img src="<?= base_url('images/avatar.png');?>" alt="">
                 </figure>
                  <?php } ?>
            
            </div>
          </div>
            <div class="col-lg-10 col-sm-9">
              <div class="timeline-info">
                <ul>
                  <li class="admin-name">
                    <h5><?php echo $row['First_name'];?> <?php echo $row['Last_name'];?></h5>
                    <span><?php echo $row['Username'];?></span>
                  </li>
                  <li>
                  <?php }?>
                        <?php 
                 $Sid = $_SESSION['sign-in']; 
                $result = mysqli_query($con, "SELECT * FROM fusers WHERE id='$Sid' AND Role ='Admin'");

                if($row = mysqli_fetch_array($result)){
                      echo' 
                    <a class="" href="dashboard" ><i class="fa fa-home"></i>Account</a>
                    <a class="" href="index" ><i class="fa fa-comments"></i> Discussion</a>
                    <a class="" href="questions" ><i class="fa fa-paperclip"></i> Questions</a>
                    <a class="" href="members" ><i class="fa fa-users"></i> Members</a>
                    <a class="" href="add_tag" ><i class="fa fa-tags"></i> Tags/Category</a>
                    <a class="" href="ask-question"><i class="fa fa-edit"></i>Ask New Question</a>
                    <a class="" href="settings"><i class="fa fa-cog"></i> Settings</a>';
                  }?>
                   <?php 
                 $Sid = $_SESSION['sign-in']; 
                $result = mysqli_query($con, "SELECT * FROM fusers WHERE id='$Sid' AND Role ='User'");

                if($row = mysqli_fetch_array($result)){
                     echo'
                    <a class="" href="dashboard" ><i class="fa fa-home"></i>Account</a>
                    <a class="" href="index" ><i class="fa fa-comments"></i> Discussion</a>
                    <a class="" href="questions" ><i class="fa fa-paperclip"></i> Questions</a>
                    <a class="" href="members" ><i class="fa fa-users"></i> Members</a>
                    <a class="" href="ask-question"><i class="fa fa-edit"></i>Ask New Question</a>
                    <a class="" href="settings"><i class="fa fa-cog"></i> Settings</a>';
                  }?>
            
                  </li>
                </ul>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section><!-- top area -->
  <section>
    <div class="gap gray-bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="row" id="page-contents">
              <div class="col-lg-3">
                <aside class="sidebar static">
                  <div class="widget">
                  <h4 class="widget-title">Recent Questions</h4>
                       <?php 
                $Topic_query = mysqli_query($con, "SELECT topics.id, topics.Posted_by, topics.Url, topics.Title, topics.Tag, topics.Created_at, topics.Active, tags.Tagname, fusers.Username FROM topics LEFT JOIN tags ON topics.Tag = tags.id LEFT JOIN fusers ON topics.Posted_by = fusers.id WHERE topics.Active = 1 order by topics.id desc LIMIT 4"); 
                while($row = mysqli_fetch_array($Topic_query)){
                  ?>
                    <ul class="activitiez">
                      <li>
                        <div class="activity-meta">
                          <i><?php $d = strtotime($row['Created_at']); echo date('Y-d-M', $d);?></i>
                          <span><a title="" href="<?= base_url('question/' . $row['id'] . '/' . $row['Url']);?>"><?php echo $row['Title'];?></a></span>
                          <h6>by <b><?php echo $row['Username'];?></b>, <?php echo $row['Tagname'];?></h6>
                        </div>
                      </li>
                    </ul>
                  <?php }?>
                  </div>                  
                </aside>
              </div>
            <div class="col-lg-6">
                <div class="central-meta">
                  <div class="editing-info">
              <h1 class="badge badge-primary text-white ml-2"><i class="fa fa-edit"></i> Edit Question</h1>
              <hr>
            <div class="forum-form">
						
							<h5 class="f-title"><i class="ti-info-alt"></i>Edit Your question</h5>
            
							<form action="" method="post">
								
								 <div class="form-group">	
								 	  <?php
              $Sid = $_SESSION['sign-in']; 
              $sql = mysqli_query($con, "SELECT id, Role, Username FROM fusers WHERE id ='$Sid'"); 
              while($row = mysqli_fetch_array($sql)){
              ?>
								   <input type="hidden" id="userid"  name="poster" value="<?php echo $row['id'];?>">
								      <?php }?>
								</div>
                     <?php 
                    $Eid = $_GET['Eid'];
                  $result_query = mysqli_query($con, "SELECT topics.id, topics.Title, topics.Tag, tags.Tagname FROM topics LEFT JOIN tags ON topics.Tag = tags.id WHERE topics.id = '$Eid' AND topics.Active = 1");

                  while($row = mysqli_fetch_array($result_query)){

              ?>
              <div class="form-group">  
                   <input type="hidden" id="Eid"  name="Eid" value="<?php echo $row['id'];?>">  
                </div>
								<div class="form-group">	
								  <input type="text" name="title" id="title" value="<?php echo $row['Title']; ?>" required="required"/>
								  <label class="control-label" for="input">Topic Tittle</label><i class="mtrl-select"></i>
								</div>										
								<div class="form-group">	
								  <select name="tag" id="tag" required="required"/>
									<option value="Tag"><?php echo $row['Tagname'];?></option>
									 		 <?php
                     $ret = mysqli_query($con, "SELECT * FROM tags WHERE Active = 1"); 
                     while($row = mysqli_fetch_array($ret)){
                     ?>
									   <option value="<?php echo $row['id'];?>"><?php echo $row['Tagname'];?></option>
                  <?php }?>
								  </select>
								</div>
                <?php }?>
                       <?php 
                    $Eid = $_GET['Eid'];
                  $result_query = mysqli_query($con, "SELECT id, Content FROM topics WHERE id = '$Eid' AND Active = 1");

                  while($row = mysqli_fetch_array($result_query)){

              ?>
								<div class="form-group">	
								  <textarea rows="4" id="editor1" name="message"  required="required"><?php echo $row['Content']; ?></textarea>
								  <label class="control-label" for="textarea">Additional Info</label><i class="mtrl-select"></i>
								</div>
                   <?php }?>
								<div class="submit-btns">
									<button type="reset" class="btn btn-danger">Reset</button>
									<button type="button" id="btn-update" class="btn btn-primary">Update Topic</button>
								</div>
							 </form>
               <div class="text-center">
               <span class="loader"><img src="<?= base_url('images/preview.gif');?>" style="width:50px;">Please Wait....</span>
              </div>
            <span class="text-center" id="msg"></span>
            </div>
          </div>
        </div>
      </div>
              <div class="col-lg-3">
             <?php include('includes/notificationbar.php'); ?>  
          </div>
        </div>
      </div>
    </div>

  </section>
 <footer>
    <div class="container">


    

        <div class="col-lg-12 col-md-4">
          <div class="widget">
            <div class="col-md-12 col-12 text-center">
                    All Rights Reserved: <a rel="nofollow" target="_parent" href="https://zillanetwork.com" class="tm-external-link">Zillanetwork</a>
                </div>
                 <div class="col-md-12 col-12 text-center">
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>  | <span>From <a href="https://yacksweb.com">Yacksweb</a></span>
                </div>
          </div>
        </div>
      </div>
    </div>
  </footer><!-- footer -->

 


  <script src="<?= base_url('js/main.min.js');?>"></script>
  <script src="<?= base_url('js/script.js');?>"></script>
  <script src="<?= base_url('js/jquery-3.5.1.min.js');?>"></script>
  <script src="<?= base_url('js/jquery-3.5.1.min.js');?>"></script>
  <script>
     $("#btn-update").click(function(e) 
  {
    e.preventDefault();
    console.log("button clicked");
    var title = $("#title").val(); 
    var userid = $("#userid").val(); 
    var tagid = $("#tag").val(); 
    var Eid = $("#Eid").val(); 
    var Content = CKEDITOR.instances['editor1'].getData();
  
      $.ajax({
        url: "<?= base_url('data/edit-question.php');?>", 
        method: "POST", 
        data: {
          'title':title,
          'poster':userid,
          'tag':tagid,
          'Eid':Eid,
          'message':Content
          }, 

         beforeSend:function(){
              $(".loader").show();
         },
        success:function(data){
         $("#msg").html(data);
          $(".loader").hide(); 
        }
      });
  $(document).ajaxStop(function(){
     window.location.reload();
  });
   
  });
  </script>
    <script src="<?= base_url('ckeditor/ckeditor.js');?>"></script>
      <script>
  CKEDITOR.replace( 'editor1' ,
    { } 
    );
</script>
</body> 

</html>

<?php }?>