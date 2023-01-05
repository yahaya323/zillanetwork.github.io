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


	if(isset($_POST['send'])){
		$Tagname = $_POST['tagname']; 
		$Description = $_POST['description']; 
		$Status = 1; 
		$sql = mysqli_query($con, "INSERT INTO tags(Tagname, Description, Active) VALUES('$Tagname','$Description','$Status')"); 
		if($sql){
			 $msg = "New Tag Created !"; 
			}else{
				 $error = "Something went wrong! Please try again"; 
			}
	}



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
                  <?php }?>
            
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
                    <a class="active" href="add_tag" ><i class="fa fa-tags"></i> Tags/Category</a>
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
                    <a class="active" href="members" ><i class="fa fa-users"></i> Members</a>
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
                $Topic_query = mysqli_query($con, "SELECT topics.id, topics.Posted_by, topics.Title, topics.Tag, topics.Created_at, topics.Active, tags.Tagname, fusers.Username FROM topics LEFT JOIN tags ON topics.Tag = tags.id LEFT JOIN fusers ON topics.Posted_by = fusers.id WHERE topics.Active = 1 order by topics.id desc LIMIT 4"); 
                while($row = mysqli_fetch_array($Topic_query)){
                	?>
										<ul class="activitiez">
											<li>
												<div class="activity-meta">
													<i><?php $d = strtotime($row['Created_at']); echo date('Y-d-M', $d);?></i>
													<span><a title="" href="<?= base_url('topic/' . $row['id'] . '/' . $row['Url']);?>"><?php echo $row['Title'];?></a></span>
													<h6>by <b><?php echo $row['Username'];?></b>, <?php echo $row['Tagname'];?></h6>
												</div>
											</li>
										</ul>
									<?php }?>
									</div>									
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="editing-info">
							<?php 
              if($msg){
              ?>
                <?php echo '<div class="alert alert-dismissible fade show alert-info" role="alert"><strong>Congrats ! </strong>' . $msg . '
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>' ;}?>
              <?php 
                   if($error){
              ?>
              <?php echo ' <div class="alert alert-dismissible fade show alert-danger" role="alert"><strong>Error ! </strong>' . $error . 
                '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; } ?>
										<h5 class="f-title"><i class="ti-tag"></i>Add Tags/Category <a href="tag_created"><span class="btn btn-primary"> Show Tags Created</span></a></h5>

										<form action="" method="post">
											<div class="form-group">	
											  <input type="text" name="tagname" required="required"/>
											  <label class="control-label" for="input">Tag/Category</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group">	
											  <textarea rows="4" id="textarea" name="description" required="required"></textarea>
											  <label class="control-label" for="textarea">Description</label><i class="mtrl-select"></i>
											</div>
											<div class="submit-btns">
												<button type="reset" class="btn btn-danger"><span>Cancel</span></button>
												<button type="submit" class="btn btn-primary" name="send"><span>Save</span></button>
											</div>
										</form>
									</div>
								</div>	

					
							</div><!-- centerl meta -->

						
							<div class="col-lg-3">
							 <?php include('includes/notificationbar.php'); ?>   
							</div><!-- sidebar -->
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<?php include('includes/footer.php'); ?>
<?php }?>
	