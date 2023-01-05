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
//id	First_name	Last_name	PhoneNo	About	userid	Date	Active
if(isset($_POST['send'])){
	$FirstName = $_POST['Firstname'];
	$LastName = $_POST['Lastname'];
	$Email = $_POST['Email'];
	$Phoneno = $_POST['Phoneno'];
	$About = $_POST['about'];
	$Userid = $_POST['userid'];

	

	$image_name = $_FILES['postimage']['name'];

if($_FILES['postimage']['type'] == 'image/jpeg' ||
    $_FILES['postimage']['type'] == 'image/png' ||
    $_FILES['postimage']['type'] == 'image/gif'){

    $new_image_name = $_FILES['postimage']['name']; 

    $target_path = "postimages/" . $new_image_name;

if(move_uploaded_file($_FILES['postimage']['tmp_name'], $target_path)){
$imgnewfile = "postimages/" . $new_image_name;

  $Status = 1;

  $Sid = $_SESSION['sign-in'];

	$query_result = mysqli_query($con, "UPDATE basic_info SET First_name ='$FirstName', Last_name = '$LastName', Email = '$Email', PhoneNo = '$Phoneno', profile = '$imgnewfile', About = '$About', userid = '$Userid', Active = '$Status' WHERE userid='$Sid'"); 
	if($query_result){
		$msg = "Basic info Updated !"; 
	}else{
		$error = "Something Went Wrong !";
	}
}
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
										<a class="active" href="members" ><i class="fa fa-users"></i> Members</a>
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
							
										<h5 class="f-title"><i class="ti-info-alt"></i>Members</h5> 
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

										<?php
										if (isset($_GET['page_no']) && $_GET['page_no']!="") {
										  $page_no = $_GET['page_no'];
										  } else {
										    $page_no = 1;
										        }

										  $total_records_per_page = 10;
										    $offset = ($page_no-1) * $total_records_per_page;
										  $previous_page = $page_no - 1;
										  $next_page = $page_no + 1;
										  $adjacents = "2"; 

										  $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM fusers");
										  $total_records = mysqli_fetch_array($result_count);
										  $total_records = $total_records['total_records'];
										    $total_no_of_pages = ceil($total_records / $total_records_per_page);
										  $second_last = $total_no_of_pages - 1; // total page minus 1
																			
											$member_result = mysqli_query($con, "SELECT * FROM fusers WHERE Active = 1  LIMIT $offset, $total_records_per_page"); 
											while($row = mysqli_fetch_array($member_result)){
										?>
									<div class="frnds">
										<!-- Tab panes -->
										<div class="tab-content">
										  <div class="tab-pane active fade show " id="frends" >
											<ul class="nearby-contct">
											<li>
												<div class="nearly-pepls">
														<?php
									
											if($row['profile']){
										
													echo'<figure>
														<img src="' . $row['profile']. '" alt="">
													</figure>';
												}else{
															echo'<figure>
														<img src="images/avatar.png" alt="">
													</figure>'; }
													?>
													<div class="pepl-info">
														<h4> <?php echo $row['Username'];?></h4>
														<span><?php echo $row['Role']; ?></span> <span>Joined Date : <?php $d = strtotime($row['Created_at']); echo date('Y-d-M', $d);?></span>

														<?php 
														$Sid = $row['id'];
                              $query = mysqli_query($con, "SELECT topics.id, topics.Posted_by, fusers.Role FROM topics LEFT JOIN fusers ON topics.Posted_by = fusers.id WHERE fusers.id = '$Sid'"); 
                              $counts=mysqli_num_rows($query);
														?>
														<a href="#" title="" class="add-butn more-action" data-ripple="">Posts: <?php echo $counts; ?></a>
														<a href="#" title="" class="add-butn" data-ripple="">View Info</a>
													</div>
												</div>
											</li>
										</ul>
											
										  </div>
										  <div class="tab-pane fade" id="frends-req" >
											
										  </div>
										</div>
									</div>
								<?php }?>
								<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div>
            <ul class="pagination">
                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
  </li>
       
    <?php 
  if ($total_no_of_pages <= 3){     
    for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
  }
  elseif($total_no_of_pages > 3){
    
  if($page_no <= 3) {     
   for ($counter = 1; $counter < 3; $counter++){     
      if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }
        }
    echo "<li><a>...</a></li>";
    echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
    echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
    }

   elseif($page_no > 3 && $page_no < $total_no_of_pages - 3) {     
    echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {     
           if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                  
       }
       echo "<li><a>...</a></li>";
     echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
     echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
    
    else {
        echo "<li><a href='?page_no=1'>1</a></li>";
    echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 3; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
       echo "<li class='active'><a>$counter</a></li>";  
        }else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
        }                   
                }
            }
  }
?>
    
  <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?> class="mb-2 tm-btn tm-paging-link">Load More</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
    } ?>
        
              </ul>
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
	