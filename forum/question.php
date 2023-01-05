<?php session_start();
include('includes/config.php');
error_reporting(0);
include('includes/function.php');

if(isset($_GET['Vid'])){
		//id	question_id	active
		$vid = $_GET['Vid']; 
	$result = mysqli_query($con, "SELECT id FROM topics WHERE id='$vid'"); 
    while($row = mysqli_fetch_array($result)){
    	$question_id = $row['id'];
	    $Status = 1; 
	$sql = mysqli_query($con, "INSERT INTO count_view(question_id, active)VALUES('$question_id', '$Status')"); 
  }
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
	<title>Zillanetwork - forum</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	
<?php include('includes/header.php');?>
	

		
	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
								     <div class="inbox-navigation">
                           
                        <div class="inbox-panel-head">
                       <?php 
                          $id = $_SESSION['sign-in']; 
                           $query = mysqli_query($con, "SELECT * FROM fusers WHERE id = '$id'"); 
                          while($row = mysqli_fetch_array($query)){
                            $profile = $row['profile']; 
                         ?>
                             <?php if($profile){?>
                              <img src="<?= base_url($row['profile']);?>" alt="" width="45px">
                            <?php }else{?>
                                <img src="<?= base_url('images/avatar.png');?>" alt="" width="45px">
                              <?php }?>

                               <h1> <?php echo $row['Username'];?></h1>
                                 <br><hr>
                             <?php }?>
                          
                         
                          <?php if(strlen($_SESSION['sign-in'])== true){?>
                          <a title="" href="<?= base_url('dashboard');?>"><i class="fa fa-user"></i>Profile</a>
                          <a title="" href="<?= base_url('logout') ;?>"><i class="fa fa-power-off"></i>Logout</a>
                          <?php }else{?>
                           <a title="" href="<?= base_url('sign-up');?>"><i class="fa fa-user"></i>Sign Up</a>
                           <a title="" href="<?= base_url('sign-in');?>"><i class="fa fa-sign-in"></i>Sign In</a>
                          <?php }?>
                          <ul>
                          <li><a class="compose-btn" title="" href="<?= base_url('ask-question');?>">Ask Questions</a></li>
                          </ul>
                            </div><!-- Inbox Panel Head -->
                      <?php if(strlen($_SESSION['sign-in'])== true){?>
                          <div class="flaged">
                         <h3><i class="fa fa-bar-chart-o"></i>insight</h3>
                          <ul>
                             <?php 
                               $id = $_SESSION['sign-in']; 
                               $query = mysqli_query($con, "SELECT * FROM topics WHERE Posted_by ='$id'"); 
                               $question_count = mysqli_num_rows($query); 
                               ?>
                            <li><span title="" style="color:#3ac1e3;">Total Questions: <?php echo $question_count;  ?></span></li>
                             <?php 
                               $id = $_SESSION['sign-in']; 
                               $query = mysqli_query($con, "SELECT * FROM answer WHERE userid='$id'"); 
                               $answer_count = mysqli_num_rows($query);

                             
                                ?>
                            <li><span title="" style="color:#3ac1e3;">Total Answer:<?php  echo $answer_count; ?></span></li>
                            <li><span title="" style="color:#3ac1e3;">Total View: 0</span></li>
                          </ul>

                        </div>
                       <?php }else{

                        echo "";
                      }?>

                         
                      </div>	
								
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
							
								
									<div class="central-meta item">
										       <?php
							                $Vid = $_GET['Vid']; 
							                   $result_query = mysqli_query($con, "SELECT topics.id, topics.Posted_by, topics.Title, topics.Content, topics.Created_at, fusers.Role, fusers.Username FROM topics LEFT JOIN fusers ON topics.Posted_by = fusers.id WHERE topics.id = ' $Vid '"); 
							                   while($row = mysqli_fetch_array($result_query)){ 
							                 ?>
										<div class="user-post">
											
											<div class="friend-info">
												
												<div class="friend-name">
													<ins><a href="#" title="<?php echo $row['Title'];?>"><?php echo $row['Title'];?></a></ins>
													<span>published: <?php $d = strtotime($row['Created_at']);  echo date('Y-d-M', $d);?></span>
												</div>
												<div class="post-meta">
													<img src="images/resources/user-post.jpg" alt="">
													<div class="we-video-info">
														<ul>
															<li>
																 <?php 
								                                    $Vid = $_GET['Vid']; 
								                                  $answer_result = mysqli_query($con, "SELECT * FROM answer WHERE topicid = '$Vid'");
								                                  $count = mysqli_num_rows($answer_result);
								                                  ?>
																<span class="comment" data-toggle="tooltip" title="Comments">
																	<i class="fa fa-comments-o"></i>
																	<ins><?php echo $count; ?></ins>
																</span>
															</li>
															 <li>
                                <span class="like" data-toggle="tooltip" title="like">
                                  <i class="fa fa-eye"></i>
                                  <?php 
                                  $Vid = $_GET['Vid']; 
                                    $view = mysqli_query($con, "SELECT * FROM count_view WHERE question_id ='$Vid'");
                                    $counts_veiw = mysqli_num_rows($view);
                                  ?>
                                  <ins><?php echo $counts_veiw;?></ins>
                                </span>
                              </li>
															<li class="social-media">
																<div class="menu">
																  <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
																  <div class="rotater">
																	<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
																  </div>
																  <div class="rotater">
																	<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
																  </div>
																  <div class="rotater">
																	<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
																	</div>
																  </div>
																	<div class="rotater">
																	<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
																	</div>
																  </div>
																  <div class="rotater">
																	<div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
																	</div>
																  </div>

																</div>
															</li>
														</ul>
													</div>
													<div class="description">
														
														<p>
															 <?php echo $row['Content'];?>
														</p>
													</div>
												</div>
											</div>
											<?php 
                          $Vid = $_GET['Vid'];
                          $answer_result = mysqli_query($con, "SELECT * FROM answer WHERE topicid = '$Vid'");
                          $count = mysqli_num_rows($answer_result);
                       ?>
											<span>Total answers: <?php echo $count; ?> </span>
					
											<div class="coment-area">
												<ul class="we-comet">
										         <?php
									                $Vid = $_GET['Vid']; 
									              $answers = mysqli_query($con, "SELECT answer.id, answer.userid, answer.answer, answer.topicid, answer.created_at, answer.active, fusers.Username FROM answer LEFT JOIN fusers ON answer.userid = fusers.id WHERE answer.active = 1 AND answer.topicid ='$Vid' ORDER BY answer.id DESC");
									               while($row = mysqli_fetch_array($answers)){
									              ?>
													<li>
														<div class="comet-avatar">
															Answer
														</div>
														<div class="we-comment">
															<div class="coment-head">
																<h5><?php echo $row['Username'];?></h5>
																<span><?php $t = strtotime($row['created_at']); echo date('Y-d-M', $t); ?></span>
															</div>
															<p><?php echo $row['answer'];?></p>
														</div>
													</li>
												<?php }?>
													<li class="post-comment">
														
														<div class="post-comt-box">
														 <?php 
										              if(strlen($_SESSION['sign-in'])== true){?>               
										              <form id="form">
										                    <?php 
										                      $Vid = $_GET['Vid']; 
										                      $ret = mysqli_query ($con, "SELECT id FROM topics WHERE id ='$Vid'"); 
										                      while($row = mysqli_fetch_array($ret)){
										                    ?>
										                    <div class="form-group">
										                 <input type="hidden" id="topcid" name="Topicid" value="<?php echo $row['id'];?>">
										               </div>
										                     <?php }?>
										                      <?php 

										                      $Sid = $_SESSION['sign-in']; 
										                      $ret = mysqli_query ($con, "SELECT * FROM fusers WHERE id ='$Sid'"); 
										                      while($row = mysqli_fetch_array($ret)){
										                    ?> 
										                    <div class="form-group">
										                 <input type="hidden" id="userid"  name="Userid" value="<?php echo $row['id']; ?>">
										               </div>
										                <?php }?>
										              <div class="form-group">
										                  <textarea id="editor" name="Content" required></textarea> 
										                 </div>
										                 <hr>
										               <br>
										                 <div class="form-group">
										                  <button type="button" id="btn-answer"  class="dislike">Answer</button>
										                 </div>
										                </form>
										                <br>
										                <div class="text-center">
										                <span class="loader"><img src="<?= base_url('images/preview.gif');?>" style="width:50px;">Please Wait....</span>
										              </div>
                                    <span class="text-center" id="msg"></span>

										                  <?php }else{?>
										                   <button type="button" class="btn-logout"><a href="<?= base_url('sign-in');?>" title="">Answer Questions</a></button>
										                 <?php } ?>	
														</div>
													</li>
												</ul>
											</div>
										
										</div>

										<?php }?>
									</div>
								
							</div><!-- centerl meta -->
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
						</div>	
					</div>
				</div>
			</div>
		</div>	
	</section>

	<footer>
		<div class="container">
			<div class="row">
				
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
</div>

  <script data-cfasync="false" src="<?= base_url('../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js');?>"></script>
  <script src="<?= base_url('js/jquery-3.5.1.min.js');?>"></script>
  <script>
  	 $("#btn-answer").click(function(e) 
  {
    e.preventDefault();
    console.log("button clicked");
    var tid = $("#topcid").val(); 
    var uid = $("#userid").val(); 
    var Content = CKEDITOR.instances['editor'].getData();

      $.ajax({
        url: "<?= base_url('data/answer.php');?>", 
        method: "POST", 
        data: {
        	'Topicid':tid,
        	'Userid':uid,
        	'Content':Content
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
  <script src="<?= base_url('js/main.min.js');?>"></script>
  <script src="<?= base_url('js/script.js');?>"></script>
	 <script src="<?= base_url('ckeditor1/ckeditor.js');?>"></script>
	       <script>
  CKEDITOR.replace( 'editor' ,
    { } 
    );
</script>

</body>	

</html>