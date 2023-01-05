<div class="responsive-header">
    <div class="mh-head first Sticky">
      <span class="mh-btns-left">
        <a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
      </span>
      <span class="mh-text">
      <a title="" href="<?= base_url('../index');?>"><img src="<?= base_url('assets/img/logo.png');?>" alt="" width="50px"><b>Zillanetwork</b></a>
      </span>
    </div>
    <nav id="menu" class="res-menu">
        <li><span><a href="<?= base_url('index');?>" title="">Home</a></span></li>
        <li><span><a href="#" title="">About</a></span></li>
        <li><span> <a href="#" title="">Policy</a></span></li>
        <li><span>forum</span></li>
        
        <?php 
        $id = $_SESSION['sign-in']; 
                           
           $query = mysqli_query($con, "SELECT * FROM fusers WHERE id = '$id'"); 
          while($row = mysqli_fetch_array($query)){
           $profile = $row['profile']; 
         if(strlen($_SESSION['sign-in'])== true){
          ?>
          <li>
          <div class="user-img">
            <?php if($profile){?>
        <img src="<?= base_url($row['profile']);?>" alt="" width="45px">
      <?php }else{?>
          <img src="<?= base_url('images/avatar.png');?>" alt="" width="45px">
        <?php }?>
        <span class="status f-online"></span>
        <div class="user-setting">
          <a href="#" title=""><span class="status f-online"></span>online</a>
        </div>
      </div>
      </li>
        <?php }
        ?>
         <?php if(strlen($_SESSION['sign-in'])== true){?>
          <ul>
            <li>
      <button type="button" class="btn-logout"><a href="<?= base_url('logout');?>" title="">Log-Out</a></button>
    </li>
      <?php }else{?>
        <li>
      <button type="button" class="btn-logout"><a href="<?= base_url('sign-in');?>" title="">Sign-In</a></button>
    </li>
  </ul>
      <?php }
    }?>
    </nav>
  </div><!-- responsive header -->
  <div class="topbar stick">
    <div class="logo">
      <a title="" href="<?= base_url('../index');?>"><img src="<?= base_url('assets/img/logo.png');?>" alt="" width="50px"><b>Zillanetwork</b></a>
    </div>
    
    <div class="top-area">
      <ul>
        <li>
          <a href="<?= base_url('index');?>" title="">Home</a>
        </li>
        <li>
          <a href="#" title="">About</a>
        </li>
        <li>
         <a href="#" title=""><i class="ti-bell"></i></a>
        </li>    
        <?php 
        $id = $_SESSION['sign-in']; 
                           
           $query = mysqli_query($con, "SELECT * FROM fusers WHERE id = '$id'"); 
          while($row = mysqli_fetch_array($query)){
           $profile = $row['profile']; 
         if(strlen($_SESSION['sign-in'])== true){
          ?>
       
           <li>
          <div class="user-img">
            <?php if($profile){?>
        <img src="<?= base_url($row['profile']);?>" alt="" width="45px">
      <?php }else{?>
          <img src="<?= base_url('images/avatar.png');?>" alt="" width="45px">
        <?php }?>
        <span class="status f-online"></span>
        <div class="user-setting">
          <a href="#" title=""><span class="status f-online"></span>online</a>
        </div>
      </div>
    </li>
     <?php }
        }?>
         <?php if(strlen($_SESSION['sign-in'])== true){?>
  
            <li>
      <button type="button" class="btn-logout"><a href="<?= base_url('logout');?>" title="">Log-Out</a></button>
    </li>
      <?php }else{?>
        <li>
      <button type="button" class="btn-logout"><a href="<?= base_url('sign-in');?>" title="">Sign-In</a></button>
    </li>
   </ul>
   <?php }
    ?>
 
     
  
          
      
      <div><span></span></div>
    </div>
  </div><!-- topbar -->