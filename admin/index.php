<?php


include('includes/config.php');
error_reporting(0); 

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zillanetwork Admin-Login</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
   <style>
    .loader{
      display: none;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
            <?php 
              if($Msg){
              ?>
                <?php echo '<div class="alert alert-success" role="alert">
                  <strong>Well done!</strong>'  . $Msg . '</div>' ;
              }?>
              <?php 
                   if($Error){
              ?>
              <?php echo '<div class="alert alert-success" role="alert">
                  <strong>Well done!</strong>'  . $Error . 
                 '</div>'; } ?>
             
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <center><img src="images/logo.png" alt="logo" style="width: 100px;"></center>
              </div>
              <h4 style="text-align:center;">Zillanetwork</h4>
              <h6 class="font-weight-light" style="text-align:center;">Admin Login</h6>
               <div class="my-2 d-flex justify-content-between align-items-center text-center"> 
                <p style="text-align:center;">
                 <div class="loader"><img src="images/preview.gif" style="width:50px">Please Wait....</div>
               </p>
                <span class="text-center" id="msg"></span>
                 </div>
              <form class="pt-3" action="" method="post">
                <div class="form-group">
                  <input type="text"  name="username" id="user_name" class="form-control form-control-lg"  placeholder="Username" required>
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="pass" class="form-control form-control-lg" placeholder="Password" required>
                </div>
                <div class="mt-3">
                  <button type="button" id="btn_login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login">SIGN IN</button>
                </div>
               
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="includes/login.js"></script>
  <!-- endinject -->
</body>

</html>
