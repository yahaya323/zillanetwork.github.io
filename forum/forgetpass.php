
<?php 

session_start();
include('includes/config.php');
error_reporting(0);
include('includes/function.php');


/*if(isset($_POST['sign-in'])){
  $Email = $_POST['Email']; 
  $Status = 1; 
   
   $result_query = mysqli_query($con, "SELECT id, Email, Password FROM fusers WHERE (Email = '$Email')"); 
   $num = mysqli_fetch_array($result_query); 
   if($num>0)
   {
     $hashpassword = $num['Password']; 
   if(password_verify($Password, $hashpassword)){
      $_SESSION['sign-in'] = $num['id']; 
      echo "<script type='text/javascript'> document.location = 'dashboard'; </script>";
    }else{
      $error = "Wrong Password !"; 
    }
}else{
    $alert ="User account not found !";
}

}*/

 
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
    
   
    <link rel="stylesheet" href="<?= base_url('css/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/color.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css');?>">
    

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/vendor/aos/aos.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/bootstrap-icons/bootstrap-icons.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/glightbox/css/glightbox.min.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/remixicon/remixicon.css');?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/swiper/swiper-bundle.min.css');?>" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/css/style.css');?>" rel="stylesheet">

  <!-- Template Main CSS File --> 
    
    <link rel="stylesheet" href="<?= base_url('css/main.min.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/style.css');?>">
    <link rel="stylesheet" href="<?= base_url('css/color.css')?>">
    <link rel="stylesheet" href="<?= base_url('css/responsive.css');?>">

</head>
<body>
<?php include('includes/header.php');?>

<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>Zillanetwork</h1>
						<p>
						We offer modern solutions for growing your Online Marketing
						</p>
						<div class="friend-logo">
							<span><img src="assets/img/logo.png" width="40%" alt=""></span>
						</div>
						<a href="#" title="" class="folow-me">Follow Us on</a>
					</div>	
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

				<div class="login-reg-bg">
					<div class="log-reg-area sign">
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
              <?php if($alert){
                ?>
                <?php echo ' <div class="alert alert-dismissible fade show alert-warning" role="alert"><strong>Warning !</strong>' . $alert . '
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';}?>
						<h2 class="log-title">Forget Password</h2>
						<form action="" method="post">
							<div class="form-group">	
							  <input type="email" name="Email" id="input" required="required"/>
							  <label class="control-label" for="input">Very Email</label><i class="mtrl-select"></i>
							</div>
							<a href="sign-in" title="" class="forgot-pwd">Already have an Account</a>
							<div class="submit-btns">
							 <button type="submit" class="btn btn-primary" name="reset">Reset Password</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php include('includes/footer.php'); ?>
