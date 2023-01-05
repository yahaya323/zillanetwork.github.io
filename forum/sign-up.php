
<?php 

session_start();
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
						<h2 class="log-title">Register</h2>
						    <form>
                <div class="form-group">  
                <input type="hidden" name="Role" id="role" value="User">
              </div>
              <div class="form-group">  
                <input type="text" name="Username" id="username" required="required"/>
                <label class="control-label" for="input">User Name</label><i class="mtrl-select"></i>
              </div>
                <div class="form-group">  
                <input type="text" name="First_name" id="Firstname" required="required"/>
                <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
              </div>
                <div class="form-group">  
                <input type="text" name="Last_name" id="Lastname" required="required"/>
                <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
              </div>
              <div class="form-group">  
                <input type="email" name="Email" id="emailid" required="required"/>
                <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
              </div>
              <div class="form-group">  
                <input type="password" name="Password" id="pass" required="required"/>
                <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
              </div>
       
              <a href="sign-in" title="" class="already-have">Already have an account</a>
              <div class="submit-btns">
              <button type="button" class="btn btn-primary" id="btn-signup">Register</button>
              </div>
            </form>
            <div class="text-center">
           <span class="loader"><img src="<?= base_url('images/preview.gif');?>" style="width:50px;">Please Wait....</span>
           </div>
          <span class="text-center" id="msg"></span>
				</div>
			</div>
		</div>
	</div>
</div>
  <?php include('includes/footer.php'); ?>
   <script src="<?= base_url('js/jquery-3.5.1.min.js');?>"></script>
  <script>
     $("#btn-signup").click(function(e) 
  {
    e.preventDefault();
    console.log("button clicked");
    var userid = $("#username").val(); 
    var firstname = $("#Firstname").val(); 
    var lastname = $("#Lastname").val(); 
    var email = $("#emailid").val(); 
    var Pass = $("#pass").val();
    var Role = $("#role").val();  
    

     $.ajax({
        url: "<?= base_url('data/register.php');?>", 
        method: "POST", 
        data: {
          'Username':userid,
          'First_name':firstname,
          'Last_name':lastname,
          'Email':email,
          'Password':Pass, 
          'Role': Role
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
	

