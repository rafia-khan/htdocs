
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>BizPage</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <?php 
                wp_nav_menu(array(
                    'theme_location' => 'footer_menu',
                    // 'menu_class' => "nav-menu ",
                   // "container_class" => "collapse navbar-collapse",
                    // "container_id" => "nav-menu-container",
                 "walker" => new AWP_Menu_Walker(),
                ));
              ?>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <img src="<?php echo esc_url( get_theme_mod( 'logo' ) ); ?>" alt="Product 1" max-width="150" max-height="100">
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Corporate</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://www.facebook.com/profile.php?id=100087479240551">Rafia khan tuly</a>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/jquery/jquery.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/easing/easing.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/superfish/superfish.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/wow/wow.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/waypoints/waypoints.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/counterup/counterup.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/isotope/isotope.pkgd.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>./lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo get_stylesheet_directory_uri() ?>./contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo get_stylesheet_directory_uri() ?>./js/main.js"></script>
<?php wp_footer() ?>
</body>
</html>
