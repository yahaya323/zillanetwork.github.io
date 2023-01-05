<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{




?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Zillanetwork Admin-Post</title>
  <!-- base:css -->
  <link rel="stylesheet" href="vendors/typicons/typicons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link href="css/ckeditor/sample/ckeditor.css" rel="stylesheet">
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
    <style>
    .loader{
      display: none;
    }
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
      <?php include('includes/header.php') ;?>
    <!-- partial -->
    <nav class="navbar-breadcrumb col-xl-12 col-12 d-flex flex-row p-0">
     
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item ml-0">
            <h4 class="mb-0">Dashboard</h4>
          </li>
          <li class="nav-item">
            <div class="d-flex align-items-baseline">
              <p class="mb-0">Home</p>
              <i class="typcn typcn-chevron-right"></i>
              <p class="mb-0">Main Dahboard</p>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-search d-none d-md-block mr-0">
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close typcn typcn-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include('includes/sidebar.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

            <div class="col-12 grid-margin stretch-card">

              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Post</h4>
                  <p class="card-description">
                    Publish Post
                  </p>
                  <form class="forms-sample" id="form" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputName1">Title</label>
                      <input type="text" class="form-control" name="posttitle" id="title" placeholder="Enter title">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                      <label for="exampleInputName1">Tags</label>
                      <select class="form-control" name="category" id="tag">
                        <option value="">Select Tag</option>
                          <?php
                          // Feching active categories
                          $ret=mysqli_query($con,"select id,CategoryName from  tblcategory where Is_Active=1");
                          while($result=mysqli_fetch_array($ret))
                          {    
                          ?>
                          <option value="<?php echo htmlentities($result['id']);?>"><?php echo htmlentities($result['CategoryName']);?></option>
                          <?php } ?>
                      </select>
                    </div>
                  </div>
                      <div class="col-md-12">
                         <div class="form-group">
                      <label>Post Image</label>
                      <input type="file" name="postimage" id="Postimg" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label for="description">Description</label>
                      <textarea  name="postdescibe"  class="editor" placeholder="Enter content"></textarea>
                    </div>
                  </div>
                </div>
                    <button type="submit" id="btn-post" class="btn btn-primary mr-2">Publish</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                     <div class="loader"><img src="images/preview.gif" style="width:50px">Please Wait....</div>
                    <span class="text-center" id="msg"></span>
                  </form>
                </div>
              </div>
            </div>



        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
      <?php include('includes/footer.php'); ?>

        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/file-upload.js"></script>
  <script src="js/jquery-3.5.1.min.js"></script>
  <script src="includes/addpost.js"></script>
  <script src="css/ckeditor/build/ckeditor.js"></script>

  
  <!-- End custom js for this page-->
 
   <script>
   ClassicEditor
                .create( document.querySelector( '.editor' ), {
                    
                    licenseKey: '',
                    
                    
                    
                } )
                .then( editor => {
                    window.editor = editor;
            
                    
                    
                    
                } )
                .catch( error => {
                    console.error( 'Oops, something went wrong!' );
                    console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                    console.warn( 'Build id: pgebhke0346-1ki11uteos6a' );
                    console.error( error );
                } );
</script>


</body>

</html>
<?php }?>

