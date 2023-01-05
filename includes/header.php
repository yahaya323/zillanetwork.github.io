  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

       <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span>Zillanetwork</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a class="nav-link scrollto" href="<?= base_url('index#hero')?>">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('index#about')?>">About</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('index#tools')?>">Tools</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('index#features')?>">Features</a></li>
         <li><a class="nav-link scrollto" href="<?= base_url('index#faq');?>">Faq</a></li>
             <li class="dropdown"><a href="#"><span>Menu</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="<?= base_url('blog')?>">Blog</a></li>
              <li><a href="<?= base_url('forum/index');?>">Forum</a></li>
            </ul>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->