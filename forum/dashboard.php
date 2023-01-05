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
    <link rel="stylesheet" href="<?= base_url('css/counter.css');?>">

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
                                        <a class="active" href="dashboard" ><i class="fa fa-home"></i>Account</a>
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
                    <a class="active" href="dashboard" ><i class="fa fa-home"></i>Account</a>
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
							</div><!-- sidebar -->
								<div class="col-lg-6">
								<div class="central-meta">
									<div class="editing-info">
										<div class="main-section">
		<div class="dashbord dashbord-green">
			<div class="icon-section">
				<i class="fa fa-rss-square" aria-hidden="true"></i><br>
				<small>Questions</small>
				<?php 
				 $id = $_SESSION['sign-in']; 
				 $query = mysqli_query($con, "SELECT * FROM topics WHERE Posted_by ='$id' AND Active = 1"); 
				 $question_count = mysqli_num_rows($query); 
				?>
				<p><?php echo $question_count; ?></p>
			</div>
			<div class="detail-section">
				<a href="#">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-skyblue">
			<div class="icon-section">
				<i class="fa fa-comments" aria-hidden="true"></i><br>
				<small>Answers</small>
				<?php 
				 $id = $_SESSION['sign-in']; 
				 $result = mysqli_query($con, "SELECT id FROM topics WHERE Posted_by ='$id' AND Active = 1"); 
				 while ($row = mysqli_fetch_array($result)){
          $Tid = $row['id']; 
    

				 $query = mysqli_query($con, "SELECT * FROM answer WHERE 	userid ='$id'"); 
				 $answer_count = mysqli_num_rows($query); 
        }
				?>
				<p><?php echo $answer_count; ?></p>
			</div>
			<div class="detail-section">
				<a href="#">More Info </a>
			</div>
		</div>
		<div class="dashbord">
			<div class="icon-section">
				<i class="fa fa-users" aria-hidden="true"></i><br>
				<small>Users</small>
				<?php 
			
				 $query = mysqli_query($con, "SELECT * FROM fusers WHERE Active = 1"); 
				 $count_user = mysqli_num_rows($query); 
        
				?>
				<p><?php echo $count_user; ?></p>
			</div>
			<div class="detail-section">
				<a href="#">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-orange">
			<div class="icon-section">
				<i class="fa fa-bell" aria-hidden="true"></i><br>
				<small>Alert</small>
				<p>0</p>
			</div>
			<div class="detail-section">
				<a href="#">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-blue">
			<div class="icon-section">
				<i class="fa fa-eye" aria-hidden="true"></i><br>
				<small>View</small>
				<p>0</p>
			</div>
			<div class="detail-section">
				<a href="#">More Info </a>
			</div>
		</div>
		<div class="dashbord dashbord-red">
			<div class="icon-section">
				<i class="fa fa-signal" aria-hidden="true"></i><br>
				<small>Badge</small>
				<p>0</p>
			</div>
			<div class="detail-section">
				<a href="#">More Info </a>
			</div>
		</div>
		
	</div>
	<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

				
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
  <script src="<?= base_url('js//Chart.min.js');?>"></script>
  <script>
var xValues = ["Questions", "Answers", "Users", "Views", "Badge"];
	  
var yValues = [ <?php 
				 $id = $_SESSION['sign-in']; 
				 $query = mysqli_query($con, "SELECT * FROM topics WHERE Posted_by ='$id' AND Active = 1"); 
				 $question_count = mysqli_num_rows($query); 

				 echo $question_count; ?>, 

				 <?php 
				 $id = $_SESSION['sign-in']; 
				 $query = mysqli_query($con, "SELECT * FROM answer WHERE userid='$id'"); 
				 $answer_count = mysqli_num_rows($query);

        echo $answer_count;
				?>,

				 	<?php 
			
				 $query = mysqli_query($con, "SELECT * FROM fusers WHERE Active = 1"); 
				 $count_user = mysqli_num_rows($query); 

        echo $count_user;
				?>,
				 0, 
				 0];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "Account statistics"
    }
  }
});
</script>
	<?php include('includes/footer.php'); ?>
<?php }?>
	