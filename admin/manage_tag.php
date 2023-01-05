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
  <title>Zillanetwork Admin-Category</title>
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

        
          <div class="row">
            <div class="col-md-12">
              <div class="card">  
              <div class="loader"><img src="images/preview.gif" style="width:50px">Please Wait....</div>    
              <span class="text-center" id="msg"></span>
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                            <th>#</th>
                            <th> Category</th>
                            <th>Description</th>
                            <th>Posting Date</th>
                            <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $query=mysqli_query($con,"Select id, CategoryName, Description, PostingDate, UpdationDate from  tblcategory where Is_Active=1 order by id desc ");
                      $cnt=1;
                      while($row=mysqli_fetch_array($query))
                      {
                      ?>
                   <tr>
                  <th scope="row"><?php echo htmlentities($cnt);?></th>
                  <td><?php echo htmlentities($row['CategoryName']);?></td>
                  <td><?php echo htmlentities($row['Description']);?></td>
                  <td><?php echo htmlentities($row['PostingDate']);?></td>
                  <td>
                    <a href="edit-category.php?cid=<?php echo htmlentities($row['id']);?>"><button type="button" class="btn btn-success btn-sm btn-icon-text mr-3">Edit<i class="typcn typcn-edit btn-icon-append"></i></button></a> 
                    <button type="button" id="btn-del" class="btn btn-danger btn-sm btn-cat-trash" data-id="<?php echo htmlentities($row['id']);?>">Delete<i class="typcn typcn-delete-outline btn-icon-append"></i></button>
                  
                </td>
                  </tr>
                  <?php
                  $cnt++;
                   } ?>
                                       
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <hr>

  <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                   <h6 class="badge badge-danger text-white ml-2">Trash</h6>
                  <table class="table table-striped project-orders-table">
                    <thead>
                      <tr>
                            <th>#</th>
                            <th> Category</th>
                            <th>Description</th>
                            <th>Posting Date</th>
                            <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
$query=mysqli_query($con,"Select id,CategoryName,Description,PostingDate,UpdationDate from  tblcategory where Is_Active=0");
$cnt=1;

while($row=mysqli_fetch_array($query))
{
?>

                   <tr>
                  <th scope="row"><?php echo htmlentities($cnt);?></th>
                  <td><?php echo htmlentities($row['CategoryName']);?></td>
                  <td><?php echo htmlentities($row['Description']);?></td>
                  <td><?php echo htmlentities($row['PostingDate']);?></td>
                  <td>
                   <button type="button" id="btn-ret" class="btn btn-success btn-sm btn-icon-text btn-cat-ret" data-id="<?php echo htmlentities($row['id']);?>">Restore</button>
                    <button type="button" id="btn-delete" class="btn btn-danger btn-sm btn-cat-del" data-id="<?php echo htmlentities($row['id']);?>">Delete<i class="typcn typcn-delete-outline btn-icon-append"></i></button>
                  
                </td>
                  </tr>
                  <?php
                  $cnt++;
                   
                 }?>
                                       
                    </tbody>
                  </table>
                </div>
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
   <script src="js/jquery-3.5.1.min.js"></script>
  <script src="includes/function.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php }?>

