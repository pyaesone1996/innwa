<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digit7s
 */

?>
</div><!-- end main -->

<footer id="footer">
    <div class="container py-2">
        <div class="text-center d-flex justify-content-center align-items-center flex-wrap">
            <div class="col-12 col-sm-3">
                <div class="social-links">
                    <a href="https://www.youtube.com/@InnwaFootBallNews" target="_blank"><i
                            class="fab fa-youtube"></i></a>
                    <a href="https://www.facebook.com/innwaapp" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="https://t.me/+4dcJYWAI1zI1Yzg1" target="_blank"><i class="fab fa-telegram"></i></a>
                </div>
            </div>
            <div class="col-12 col-sm-6 mt-2 mt-sm-0">
                InnwaSports© 2025. All Right Reserved. <a href="/privacy-policy/" target="_blank"
                    style="color:#000;">Privacy Policy</a>
            </div>
            <div class="col-12 col-sm-3"></div>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i>⤴</i></a>

<script src="<?php echo get_template_directory_uri() . '/assets/vendor/jquery/jquery.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>">
</script>
<script src="<?php echo get_template_directory_uri() . '/assets/vendor/jquery.easing/jquery.easing.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/vendor/venobox/venobox.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/vendor/owl.carousel/owl.carousel.min.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/vendor/aos/aos.js' ?>"></script>
<script src="<?php echo get_template_directory_uri() . '/assets/js/main.js' ?>"></script>
<script>
    $(document).ready(function() {
        // $('#popupAds').modal('show');
        
    });
</script>
</body>

</html>
<?php wp_footer(); ?>