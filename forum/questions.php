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
										<a class="active" href="questions" ><i class="fa fa-paperclip"></i> Questions</a>
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
										<a class="active" href="questions" ><i class="fa fa-paperclip"></i> Questions</a>
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
					   <div class="text-center">
               <span class="loader"><img src="<?= base_url('images/preview.gif');?>" style="width:50px;">Please Wait....</span>
              </div>
            <span class="text-center" id="msg"></span>
                
                	<div class="frnds">
										<!-- Tab panes -->
										<div class="tab-content">
										  <div class="tab-pane active fade show " id="frends" >
											<ul class="nearby-contct">
													<li>
												<table>
													<thead>
													<tr>
														<th>
														Title
														</th>
														<th>
															Tag
														</th>
														<th>
															Action
														</th>
													</tr>
												</thead>
                         			 <?php
                         			 if (isset($_GET['page_no']) && $_GET['page_no']!="") {
										  $page_no = $_GET['page_no'];
										  } else {
										    $page_no = 1;
										        }

										  $total_records_per_page = 8;
										    $offset = ($page_no-1) * $total_records_per_page;
										  $previous_page = $page_no - 1;
										  $next_page = $page_no + 1;
										  $adjacents = "2"; 

										  $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM topics");
										  $total_records = mysqli_fetch_array($result_count);
										  $total_records = $total_records['total_records'];
										    $total_no_of_pages = ceil($total_records / $total_records_per_page);
										  $second_last = $total_no_of_pages - 1; // total page minus 1

												  $Sid = $_SESSION['sign-in'];
				               $result_query = mysqli_query($con, "SELECT topics.id, topics.Posted_by, topics.Title, topics.Tag, topics.Active, tags.Tagname FROM topics LEFT JOIN tags ON topics.Tag = tags.id WHERE topics.Posted_by  = '$Sid' AND topics.Active = 1 ORDER BY id DESC LIMIT $offset, $total_records_per_page"); 
				               $cnt = 1; 
				               $rowcount = mysqli_num_rows($result_query); 
				               if($rowcount==0){
				               	?>
				               	<tbody>
											   <tr>
				               		<td>
				               			<h4 style="color:red">No record found</h4>
				               		</td>
				               	</tr>
				               </tbody>

				               	<?php 
														}else{

						               while($row = mysqli_fetch_array($result_query)){
						              
						              
													echo'<tbody>
													<tr>
															<td>'. $row['Title'] . '</td>
															<td>' . $row['Tagname'] . '</td>
														<td><a href="edit-question?Eid=' . $row['id'] . '" title=""  data-ripple=""><i class="fa fa-edit"></i></a>
                                                         <a href="" title="" class="btn-del" data-id="' . $row['id'] . '"><i class="fa fa-trash"></i></a>
														</td>
													   </tr>';
														
								               $cnt = $cnt +1; 
								                 } 
								              }?>
												</tbody>
												</table>
												<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div>
            <ul class="pagination">
                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>><<</a>
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
  <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?> class="mb-2 tm-btn tm-paging-link">Next</a>
  </li>
    <?php if($page_no < $total_no_of_pages){
    echo "<li><a href='?page_no=$total_no_of_pages'> &rsaquo;&rsaquo;</a></li>";
    } ?>
        
              </ul>
											</li>
										</ul>
											
										  </div>
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
  <script src="<?= base_url('js/map-init.js');?>"></script>
  <script src="<?= base_url('js/jquery-3.5.1.min.js');?>"></script>
  <script>
  $(document).on("click",".btn-del", function(){
   if(confirm("Do you really want to move the record to trash ?")){
    var trashid = $(this).data("id"); 
     
    $.ajax({
        type: "post", 
        url: "<?= base_url('data/trash.php');?>", 
        data: {id : trashid},
         beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
         $(".loader").hide();
        },

      });
  }
   $(document).ajaxStop(function(){
     window.location.reload();
  });

  });
  </script>
</body> 

</html>

<?php }?>
	