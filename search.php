<?php 


session_start();
include('includes/config.php');
error_reporting(0);
include('includes/function.php'); 

if(isset($_POST['submit'])){
  $Email = $_POST['email']; 
  $Status = 1;
  $sub = mysqli_query($con, "INSERT INTO subscribe(Email, Active) VALUES('$Email', '$Status')"); 
  if($sub){
    $Email_msg ="You have successfully subscribe to our news letter !";

  }else{
     $Email_error ="something went wrong !";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Zillanetwork - Search Results</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png');?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/aos/aos.css" rel="stylesheet');?>">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">


</head>

<body>

  
   <?php include('includes/header.php');?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?= base_url('index.html');?>">Home</a></li>
          <li>Search Results</li>
        </ol>
        <h2>Search Results</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
       <?php 
        if($_POST['searchtitle']!=''){
$st=$_SESSION['searchtitle']=$_POST['searchtitle'];
}
$st;
             

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
  $page_no = $_GET['page_no'];
  } else {
    $page_no = 1;
        }

  $total_records_per_page = 3;
    $offset = ($page_no-1) * $total_records_per_page;
  $previous_page = $page_no - 1;
  $next_page = $page_no + 1;
  $adjacents = "2"; 

  $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM tblposts");
  $total_records = mysqli_fetch_array($result_count);
  $total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
  $second_last = $total_no_of_pages - 1; // total page minus 1


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle, tblposts.PostImage, tblcategory.CategoryName as category,tblcategory.id as cid, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.PostTitle like '%$st%' and tblposts.Is_Active=1 LIMIT $offset, $total_records_per_page");

$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
echo "No record found";
}
else {
while ($row=mysqli_fetch_array($query)) {


?>
            <article class="entry">
 
              <div class="entry-img">
                <img src="<?= base_url('admin/' .$row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="<?= base_url('post/'.$row['pid'].'/'.$row['url']);?>"><?php echo htmlentities($row['posttitle']);?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-tags"></i> <a href="<?= base_url('blog');?>"><?php echo htmlentities($row['category']);?></a></li>
                  <li class="d-flex align-items-center"><i class="bi bi-clock"></i><?php $d = strtotime($row['postingdate']);
                        ?><time datetime="2020-01-01"><?php echo date("Y-d-M", $d); ?></time></li>
                      <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i>
            <?php 
            $pid= $row['pid'];
            $comment_result = mysqli_query($con, "SELECT * FROM comments WHERE postsid = '$pid'");
            $count = mysqli_num_rows($comment_result);
            ?><span><?php echo $count; ?> Comment</span></li>
                </ul>
              </div>

              <div class="entry-content">
                <div class="read-more">
                  <a href="<?= base_url('post/'.$row['pid'].'/'.$row['url']);?>">Read More</a>
                </div>
              </div>

            </article><!-- End blog entry -->
             <?php
                  } 
               }
               ?>
            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
            </div>  
        <div class="blog-pagination">
              <ul class="justify-content-center">
                <li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
  <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Prev</a>
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
    echo "<li><a href='?page_no=$total_no_of_pages'>Last</a></li>";
    } ?>
        
              </ul>
            </div>
            <br>
          </div><!-- End blog entries list -->
             
          <div class="col-lg-4">

          <?php include('includes/sidebar.php') ?>

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->

 <?php include('includes/footer.php');?>