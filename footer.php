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
                            <p>
                                <a href="#!" class="footer-link">Contact Us</a>
                            </p>
                            <p>
                                <a href="#!" class="footer-link">Blog</a>
                            </p>
                            <p>
                                <a href="#!" class="footer-link">Entreprise</a>
                            </p>
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

            <div class="row mt-5">
                <div class="col-md-4">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/logo-footer.png" alt="">
                    <span class="text-white">2021 © Copyright Parent ApS</span>
                </div>
                <div class="col-md-4">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/app-store.png" alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/google-play.png" alt="">
                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/app-gallery.png" alt="">
                </div>
                <div class="col-md-4 social-media">
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/vectors/twitter.svg" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/vectors/youtube.svg" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/vectors/facebook.svg" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/vectors/instagram.svg" alt=""></a>
                    <a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/vectors/pinterest.svg" alt=""></a>
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
