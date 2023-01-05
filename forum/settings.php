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
										<a class="" href="add_tag" ><i class="fa fa-tags"></i> Tags/Category</a>
										<a class="" href="ask-question"><i class="fa fa-edit"></i>Ask New Question</a>
										<a class="active" href="settings"><i class="fa fa-cog"></i> Settings</a>';
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
										<a class="active" href="settings"><i class="fa fa-cog"></i> Settings</a>';
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
									 <?php
                					$Sid = $_SESSION['sign-in'];  
                 					$user_query = mysqli_query($con, "SELECT * FROM fusers WHERE id = '$Sid'"); 
                 					while($row = mysqli_fetch_array($user_query)){
               									?>
									<div class="about">
										<div class="personal">
											<h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
											<p>
												<?php echo $row['About']; ?>
											</p>
										</div>
										<div class="d-flex flex-row mt-2">
											<ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
												<li class="nav-item">
													<a href="#basic" class="nav-link active" data-toggle="tab" >Basic info</a>
												</li>
												<li class="nav-item">
													<a href="#location" class="nav-link" data-toggle="tab" >location</a>
												</li>
												<li class="nav-item">
													<a href="#work" class="nav-link" data-toggle="tab" >work and education</a>
												</li>
											</ul>
											<div class="tab-content">
												<div class="tab-pane fade show active" id="basic" >
													<ul class="basics">
														<li><i class="ti-user"></i><?php echo $row['First_name']; ?> <?php echo $row['Last_name']; ?></li>
														<li><i class="ti-map-alt"></i><?php echo $row['Username'];?></li>
														<li><i class="ti-mobile"></i><?php echo $row['PhoneNo']; ?></li>
														<li><i class="ti-email"></i><?php echo $row['Email']; ?></li>
														<li><i class="ti-world"></i>www.zillanetwork.com</li>
													</ul>
												</div>
												<div class="tab-pane fade" id="location" role="tabpanel">
													<div class="location-map">
														<div id="map-canvas"></div>
													</div>
												</div>
												<div class="tab-pane fade" id="work" role="tabpanel">
													<div>
														
														<a href="#" title="">Edit Work</a>
														<p>work as content creator SEO at www.example.com</p> 
														<ul class="education">
															<li><i class="ti-facebook"></i> BSCS from Oxford University</li>
															<li><i class="ti-twitter"></i> MSCS from Harvard Unversity</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?php }?>
								</div>	

								<div class="central-meta">
									<div class="editing-info">
											<?php 
											$Sid = $_SESSION['sign-in'];
												$user_result = mysqli_query($con, "SELECT * FROM fusers WHERE id ='$Sid'");
												while($row = mysqli_fetch_array($user_result)){
											?>
										<h5 class="f-title"><i class="ti-info-alt"></i>Basic Information </h5> 
					 
									<?php }?>
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

										<form action="" method="post" enctype="multipart/form-data">
											<?php 
											$Sid = $_SESSION['sign-in'];
												$user_result = mysqli_query($con, "SELECT * FROM fusers WHERE id ='$Sid'");
												while($row = mysqli_fetch_array($user_result)){
											?>
											  <input type="hidden" id="input" name="userid" value="<?php echo $row['id']; ?>">
										<?php }?>
											<div class="form-group half">	
											  <input type="text" id="input" name="Firstname" value="<?php echo $FirstName; ?>" required="required"/>
											  <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" name="Lastname" value="<?php echo $LastName; ?>"  required="required"/>
											  <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
											</div>
											<div class="form-group half">	
											  <input type="text" name="Phoneno" value="<?php echo $Phoneno; ?>"  required="required"/>
											  <label class="control-label" for="input">Phone No.</label><i class="mtrl-select"></i>
											</div>
											
											<div class="form-group half">	
												<label>Profile Image</label>
											   <input type="file" class="form-control"  name="postimage">
											</div>
											<div class="form-group">	
											  <textarea rows="4" id="textarea" name="about" required="required"><?php echo $About; ?></textarea>
											  <label class="control-label" for="textarea">About Me</label><i class="mtrl-select"></i>
											</div>
											<div class="submit-btns">
						            <?php if($edit == true){
												echo'
												<a href="settings"><button type="button" class="mtr-btn"><span>Cancel</span></button></a>
												<button type="submit" name="update" class="mtr-btn"><span>Update</span></button>';
											}else{ echo '	<button type="submit" name="save" class="mtr-btn"><span>Save</span></button>';
										}?>
											<?php 
											$Sid = $_SESSION['sign-in'];
												$user_result = mysqli_query($con, "SELECT * FROM fusers WHERE id ='$Sid'");
												while($row = mysqli_fetch_array($user_result)){
													$Uid = $row['id'];
												}
										   
													$btn_result = mysqli_query($con, "SELECT id, userid, Updates FROM basic_info WHERE userid='$Uid'");
													while($row = mysqli_fetch_array($btn_result)){
												?>
												<?php if($row['Updates']==1){ ?>
												<a href="settings?Edit=<?php echo $row['id'];?>"><button type="button" class="float-right btn btn-danger"><span>Edit</span></button></a>
											<?php } }?>
											</div>
										</form>
									</div>
								</div>	

									<div class="central-meta">
										<div class="editing-info">
											<h5 class="f-title"><i class="ti-lock"></i>Change Password</h5>
											
											<form method="post">
												<div class="form-group">	
												  <input type="email" id="input" required="required"/>
												  <label class="control-label" for="input">Confirm Email</label><i class="mtrl-select"></i>
												</div>
												<div class="form-group">	
												  <input type="password" required="required"/>
												  <label class="control-label" for="input">New Password</label><i class="mtrl-select"></i>
												</div>
												<div class="submit-btns">
													<button type="button" class="mtr-btn"><span>Cancel</span></button>
													<button type="button" class="mtr-btn"><span>Update</span></button>
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

 

</body> 

</html>
<?php }?>
	