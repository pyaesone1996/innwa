<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package digit7s
 */

get_header();
?>
<!-- ======= Blog Section ======= -->

<main id="main">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<main id="primary" class="site-main">
					<?php
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/content-single', get_post_type());


					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div>
			<div class="col-lg-4"><?php get_sidebar(); ?></div>
		</div>
	</div>
</main>
<?php
get_footer();
