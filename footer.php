<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package parents
 */

?>

<!--Footer-->
<footer class="text-center text-lg-start text-muted">

    <!-- Section: Links  -->
    <section class="p-4">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
							<?php
							wp_nav_menu(
								array(
									'container' => false,
									'theme_location' => 'footer-menu',
									'menu_id' => 'footer-menu',
									'menu_class' => 'd-flex navbar-nav me-md-auto mb-2 mb-lg-0 ms-lg-2',
									'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
									'walker' => new WP_Bootstrap_Navwalker(),
								)
							);
							?>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <a href="#!" class="footer-link">Terms and Conditions</a>
                            </p>
                            <p>
                                <a href="#!" class="footer-link">Privacy and Policy</a>
                            </p>
                            <p>
                                <a href="#!" class="footer-link">Help Center</a>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <p>
                                <a href="#!" class="footer-link">Our Vision</a>
                            </p>
                            <p>
                                <a href="#!" class="footer-link">Security & Data</a>
                            </p>
                            <p>
                                <a href="#!" class="footer-link">Careers</a>
                            </p>
                        </div>

                    </div>

                </div>
                <div class="col-md-4">
                    <form action="" class="request-quote">
                        <span class="text-white">Request a quote</span>
                        <div class="email">
                            <input type="email" placeholder="Email Address">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/footer-arrow.svg" alt="">
                        </div>
                    </form>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->

            <div class="row mt-4 mt-md-5">
                <div class="col-12 col-md-4">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.png"
                         class="logo-footer" alt="">
                    <span class="text-white">2021 © Copyright Parent ApS</span>
                </div>
                <div class="col-12 col-md-4 my-2 my-md-0">
                    <div class="mobile-app-links">
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/app-store.png" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/google-play.png" alt="">
                        </a>
                        <a href="#">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/app-gallery.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-4 social-media my-2 my-md-0">
                    <ul class="list-group list-group-horizontal list-group-flush">
                        <li class="list-group-item"><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-youtube"></i></a></li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li class="list-group-item"><a href="#"><i class="bi bi-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Links  -->
</footer>
<!-- Footer -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
