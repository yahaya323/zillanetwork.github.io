   <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center">
           <?php 
              if($Email_msg){
              ?>
                <?php echo '<div class="alert alert-dismissible fade show alert-info" role="alert">' . $Email_msg . '
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>' ;}?>
              <?php 
                   if($Email_error){
              ?>
              <?php echo ' <div class="alert alert-dismissible fade show alert-danger" role="alert"><strong>Error ! </strong>' . $Email_error . 
                '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>'; } ?>
          <div class="col-lg-12 text-center">
            <h4>Our Newsletter</h4>
            <p>subscribe to our newsletter to get more  update coming !</p>
          </div>
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="email" name="email" required><input type="submit" name="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
    
 <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="<?= base_url('index.html');?>" class="logo d-flex align-items-center">
              <img src="<?= base_url('assets/img/logo.png');?>" alt="">
              <span>Zillanetwork</span>
            </a>
            <p>We provide many strategies to earn money online and also help you in how to grow your blogs site in a easy way.</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Forum Discussion</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Free SEO Tools</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Email  Marketing Tools</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              <strong>Phone:</strong> +2347084343765<br>
              <strong>Email:</strong> Zillanetwork@gmail.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Zillanetwork</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        From <a href="<?= base_url('yacksweb.com/');?>">Yacksweb</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="<?= base_url('assets/js/jquery-3.5.1.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/purecounter/purecounter.js');?>"></script>
  <script src="<?= base_url('assets/vendor/aos/aos.js');?>"></script>
  <script src="<?= base_url('assets/vendor/glightbox/js/glightbox.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/isotope-layout/isotope.pkgd.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/swiper/swiper-bundle.min.js');?>"></script>
  <script src="<?= base_url('assets/vendor/php-email-form/validate.js');?>"></script>
  <script src="<?=base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
  <script src="<?= base_url('assets/js/main.js');?>"></script>