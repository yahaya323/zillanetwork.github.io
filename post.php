
<?php 
include('includes/config.php');
error_reporting(0);
include('includes/function.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
       <?php
       $pid = $_GET['nid']; 
         $sql = mysqli_query($con, "select id, PostUrl from tblposts where id = '$pid'");
        while($row = mysqli_fetch_array($sql)){ 
     ?>
    <title>zillanetwork/blog/<?php echo $row['id'] ?>/<?php echo $row['PostUrl'];?></title>
<?php }?>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/img/favicon.png');?>" rel="icon">
  <link href="<?= base_url('assets/img/apple-touch-icon.png');?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



<!-- jquery.textcomplete plugin -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.textcomplete/1.8.4/jquery.textcomplete.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/aos/aos.css" rel="stylesheet');?>">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css');?>" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">

 <style>
    .loader{
      display: none;
    }
  </style>
</head>

<body>


      
        
  <?php include('includes/header.php');?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?= base_url('index');?>">Home</a></li>
          <li><a href="<?= base_url('blog');?>">Blog</a></li>
           <?php
       $pid = $_GET['nid']; 
         $sql = mysqli_query($con, "select id, posttitle from tblposts where id = '$pid'");
        while($row = mysqli_fetch_array($sql)){ 
     ?>
        <li><?php echo $row['posttitle'];?></li>
        </ol>
        <h2><?php echo $row['posttitle'];?></h2>
      <?php }?>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            
            <article class="entry entry-single">
               <?php
$pid=intval($_GET['nid']);
$currenturl="http://".$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
 $query=mysqli_query($con,"select tblposts.PostTitle as posttitle, tblposts.id as pid, tblposts.PostImage, tblcategory.CategoryName as category,tblcategory.id as cid, tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>         

              <div class="entry-img">
                <img src="<?= base_url('admin/' . $row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <?php echo htmlentities($row['posttitle']);?>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="bi bi-tags"></i> <a href="<?= base_url('blog');?>"><?php echo htmlentities($row['category']);?></a></li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  <?php 
                    $pt=$row['postdetails'];
                    echo  (substr($pt,0))
                    ;?>
                </p>

              </div>
              
               
            </article><!-- End blog entry -->
               
  <?php }?>
            <div class="blog-author d-flex align-items-center">
              <div>
                <h4>Share: </h4>
                <div class="social-links">
                  <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                  <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                  <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                </div>
               
              </div>
            </div><!-- End blog author bio -->
          
          <div class="row">
            <div class="col-lg-12">
             <div class="blog-comments">

               
               <div class="reply-form">
                <form>
                      <div class="row">
                        <div class="col-md-12 form-group">
                          <label>Name:</label>
                          <input class="form-control comment-name" placeholder="Enter your name">
                        </div>
                         <div class="col-md-12 form-group">
                           <?php 
                            $pid=intval($_GET['nid']);
                           $post_id = mysqli_query($con, "SELECT * FROM tblposts WHERE id=' $pid'");
                           while($row = mysqli_fetch_array($post_id)){

                           ?>
                          <input type="hidden" class="form-control post-id" value="<?php echo $row['id']; ?>">
                        <?php }?>
                        </div>
                       <div class="col-md-12 form-group">
                          <label>Message:</label>
                          <textarea class="form-control comment-textarea" placeholder="Enter a message"></textarea>
                        </div>
                         <div class="col-md-12 form-group">
                          <button type="button" class="btn-primary add-comment">comment</button> 
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
          </div>
           <div class="row">
                <div class="col-md-12">
                <div class="text-center">
                  <span class="loader"><img src="<?= base_url('assets/img/preview.gif');?>" style="width:50px;">Please Wait....</span>
              </div>
              <span class="text-center" id="msg"></span>
                     <?php 
              $pid=intval($_GET['nid']);
              $c_result = mysqli_query($con, "SELECT * FROM comments WHERE postsid ='$pid'");
              $c_count = mysqli_num_rows($c_result);               
                ?>
                  <?php 
              $pid=intval($_GET['nid']);
              $c_result = mysqli_query($con, "SELECT * FROM reply WHERE Post_id ='$pid'");
              $r_count = mysqli_num_rows($c_result);               
                ?>
              <h5><b><i class="bi bi-chat-dots"></i> comments:</b> <?php $allcount = $c_count + $r_count ; echo $allcount; ?></h5>
              <hr>
                   <div class="comment-container">
                        
                   </div>
                </div>
            </div>
          </div>

          
         


          <div class="col-lg-4">
         <?php include('includes/sidebar.php');?>

          </div><!-- End blog sidebar -->
      
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->

<?php include('includes/footer.php');?>
   
 <script>
  $(document).ready(function(){
    load_comment();
      function load_comment(){
        var postid = $('.post-id').val();
        $.ajax({
          type:"POST", 
          url: "<?= base_url('data/code.php');?>", 
          data:{
            'postid': postid,
            'comment-load-data': true,
          }, 
            success: function(data){
                 $('.comment-container').html("");
              $.each(data, function(key, value){
                 $('.comment-container').append('<div class="reply_box border p-2 mb-2">\
                       <input type="hidden" class="get_postid" value="'+value.cmt['postsid']+'">\
                      <h6 class="border-bottom d-inline">'+ value.cmt['Name']+' | <b>'+ value.cmt['comment_on']+'</b></h6>\
                          <p class="para">'+ value.cmt['Message']+'</p>\
                                 <button value="'+ value.cmt['id']+'" class="btn btn-primary reply_btn">Reply</button>\
                                 <button value="'+ value.cmt['id']+'" class="btn btn-primary view_replies_btn">Veiw replies</button>\
                                 <div class="ml-4 reply-section"></div>\
                          </div>'); 

              });
            
                
            }
        });
      }
      $(document).on('click', '.reply_btn', function(){
         var thisclicked = $(this); 
         var cm_id = thisclicked;
         var postid = thisclicked.closest('.reply_box').find('.get_postid').val(); 
    
          $('.reply-section').html(""); 
          thisclicked.closest('.reply_box').find('.reply-section').html('<form>\
                      <div class="row">\
                        <div class="col-md-12">\
                          <input type="hidden" class="form-control postid" value="'+postid+'">\
                        </div>\
                        <div class="col-md-12">\
                          <label>Name:</label>\
                          <input class="form-control reply-name" placeholder="Enter your name">\
                        </div>\
                        <div class="col-md-12">\
                          <label>Message:</label>\
                          <textarea class="form-control reply-textarea" placeholder="Enter a message"></textarea>\
                        </div>\
                        <div class="col-md-12">\
                          <button type="button" class="btn btn-primary add-reply">reply</button>\
                          <button type="button" class="btn btn-danger cancel-btn">close</button>\
                        </div>\
                      </div>\
                    </form>\
            ');
      });
      $(document).on('click', '.add-reply', function(e){
        e.preventDefault(); 
          var thisclicked = $(this); 
          var cm_id = thisclicked.closest('.reply_box').find('.reply_btn').val();
          var reply_name = thisclicked.closest('.reply_box').find('.reply-name').val();
          var reply_msg = thisclicked.closest('.reply_box').find('.reply-textarea').val();
          var postid = thisclicked.closest('.reply_box').find('.postid').val();


            var data = {
            'comment_id': cm_id,
            'reply_name': reply_name,
            'reply_msg':reply_msg,
            'postid': postid,
            'add-reply':true,
          }
              $.ajax({
               type:"POST", 
               url: "<?= base_url('data/code.php');?>", 
               data: data, 
                beforeSend:function(){
              $(".loader").show();
               },
               success:function(data){
                   $("#msg").html(data);
                   $(".loader").hide(); 
                 $('.reply-section').html(""); 
               }

          });
 
      });
      $(document).on('click', '.cancel-btn', function(){
          $('.reply-section').html(""); 
      });

    $('.add-comment').click(function(e) {
      e.preventDefault(); 
      var name = $('.comment-name').val(); 
      var msg = $('.comment-textarea').val();
      var posid = $('.post-id').val();
          
          var data = {
            'name': name,
            'msg':msg,
            'posid': posid,
            'add-comment':true,
          }
          $.ajax({
               type:"POST", 
               url: "<?= base_url('data/code.php');?>", 
               data: data, 
               beforeSend:function(){
              $(".loader").show();
               },
               success:function(data){
                $("#msg").html(data);
                $(".loader").hide(); 
                $('.comment-name').val("");
                $('.comment-textarea').val(""); 
               }

          });
    });
     
     $(document).on('click', '.view_replies_btn', function(e){
        e.preventDefault(); 
        var thisclicked = $(this); 
        var cm_id = thisclicked.val(); 

         $('.reply-section').html("");
        
        $.ajax({
          type: "POST", 
          url: "<?= base_url('data/code.php');?>", 
          data: {
            'cm_id': cm_id,
            'view_replies_data': true, 

          },
          success: function(data){
               console.log(data); 
               $.each(data, function(key, value) {

                 thisclicked.closest('.reply_box').find('.reply-section').append('<div class="sub_reply_box border p-2 mb-2">\
                      <input type="hidden" class="get_postid" value="'+value.cmt['Post_id']+'">\
                      <input type="hidden" class="get_username" value="'+value.cmt['name']+'">\
                      <h6 class="border-bottom d-inline">'+ value.cmt['name']+'| <b>'+ value.cmt['reply_on']+'</b></h6>\
                          <p class="para">'+ value.cmt['reply']+'</p>\
                                 <button value="'+ value.cmt['comment_id'] +'" class="btn btn-primary sub_reply_btn">Reply</button>\
                                 <div class="ml-4 sub-reply-section"></div>\
                          </div>');

               });
             

          }

        });
      
     });

     $(document).on('click', '.sub_reply_btn', function(e) {
      e.preventDefault(); 

      var thisclicked = $(this);
      var username = thisclicked.closest('.sub_reply_box').find('.get_username').val();
      var postid = thisclicked.closest('.sub_reply_box').find('.get_postid').val();
      var cm_id = thisclicked.val(); 

      $('.sub-reply-section').html(""); 

      thisclicked.closest('.sub_reply_box').find('.sub-reply-section').append('<div class="row">\
                    <div class="col-md-12">\
                          <input type="hidden" class="form-control postid" value="'+postid+'">\
                        </div>\
                        <div class="col-md-12">\
                          <label>Name:</label>\
                          <input class="form-control sub-reply-name" placeholder="Enter your name">\
                        </div>\
                        <div class="col-md-12">\
                          <label>Message:</label>\
                          <textarea class="form-control sub-reply-textarea">@'+username+'</textarea>\
                        </div>\
                        <div class="col-md-12">\
                          <button type="button" class="btn btn-primary add-sub-reply">reply</button>\
                                <button type="button" class="btn btn-danger reply-cancel-btn">close</button>\
                        </div>\
                      </div>\
                    </form>\
        ')
     });

       $(document).on('click', '.add-sub-reply', function(e){
          e.preventDefault(); 

           var thisclicked = $(this);
           var cm_id = thisclicked.closest('.sub_reply_box').find('.sub_reply_btn').val();
           var sub_reply_name  = thisclicked.closest('.sub_reply_box').find('.sub-reply-name').val();
           var sub_reply_msg = thisclicked.closest('.sub_reply_box').find('.sub-reply-textarea').val();
           var postid = thisclicked.closest('.sub_reply_box').find('.postid').val();

         


          var data = {
            'cm_id':cm_id,
            'name': sub_reply_name,
            'msg':sub_reply_msg,
            'postid': postid,
            'add-sub-replies':true,
          }
          $.ajax({
               type:"POST", 
               url: "<?= base_url('data/code.php');?>", 
               data: data, 
             beforeSend:function(){
              $(".loader").show();
               },
               success:function(data){
               $("#msg").html(data);
               $(".loader").hide(); 
               $('.reply-section').html(""); 
               }

          });
      });
      $(document).on('click', '.reply-cancel-btn', function(){
          $('.sub-reply-section').html(""); 
      });

     
  }); 
</script>
</html>