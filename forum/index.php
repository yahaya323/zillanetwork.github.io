<?php session_start();
include('includes/config.php');
error_reporting(0);
include('includes/function.php');
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
    <div class="gap gray-bg">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="row" id="page-contents">
              <div class="col-lg-9">
                <div class="inbox-sec">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4">
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
                               <h1><?php echo $row['Username'];?></h1>
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
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-8">
                      <div class="inbox-lists">
                        <div class="inbox-action">
                        </div>
                        <div class="mesages-lists">
                          <form method="post">
                            <input type="text" placeholder="Search Questions">
                          </form>
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

                $Topic_query = mysqli_query($con, "SELECT topics.id, topics.Posted_by, topics.Title, topics.Tag, topics.Url, topics.Created_at, topics.Active, tags.Tagname, fusers.Username FROM topics LEFT JOIN tags ON topics.Tag = tags.id LEFT JOIN fusers ON topics.Posted_by = fusers.id WHERE topics.Active = 1 order by topics.id DESC LIMIT $offset, $total_records_per_page"); 
                while($row = mysqli_fetch_array($Topic_query)){

                ?>
                          <ul id="message-list" class="message-list">
                            
                            <li class="unread">
                             
                      <h3 class="sender-name"><a href="<?= base_url('question/' . $row['id'] . '/' . $row['Url']);?>"><?php echo $row['Title'];?></a></h3>

                              <p><?php echo $row['Tagname']; ?> || by: <?php echo $row['Username'];?></p>
                               
                                 <div class="we-video-info">
                            <ul>
                              <li>
                                 <?php 
                                    $Vid = $row['id']; 
                                    $answer_result = mysqli_query($con, "SELECT * FROM answer WHERE topicid = '$Vid'");
                                    $count = mysqli_num_rows($answer_result);
                                  ?>
                                <span class="comment" data-toggle="tooltip" title="answers">
                                  <i class="fa fa-comments-o"></i>
                                  <ins><?php echo $count; ?></ins>
                                </span>
                              </li>
                              <li>
                                <span class="like" data-toggle="tooltip" title="like">
                                  <i class="fa fa-eye"></i>
                                  
                                   <?php 
                                 $Vid = $row['id']; 
                                    $view = mysqli_query($con, "SELECT * FROM count_view WHERE question_id ='$Vid'");
                                    $counts_veiw = mysqli_num_rows($view);
                                  ?>
                                  <ins><?php echo $counts_veiw;?></ins>
                                </span>
                              </li>
                             </ul>
                             </div>
                            </li>
                          </ul>

                             <?php }?>
                         
                          
                        </div>
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
    echo "<li><a href='?page_no=$total_no_of_pages'>&rsaquo;&rsaquo;</a></li>";
    } ?>
        
              </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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
	
<?php include('includes/footer.php'); ?>
 