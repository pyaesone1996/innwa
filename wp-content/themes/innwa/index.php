<?php

/**
 * Template name: Blog
 * The Blog template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digit7s
 */


get_header();
?>
<!-- ======= Blog Section ======= -->
<section class="">
	<div class="container">

		<div class="row">
			<div class="col-12 breadcrumbs">
				<p class="mb-0 my-1 rounded bg-white d-inline-block text-dark p-2 px-5 font-weight-bold">Top News</p>
			</div>

		</div>

	</div>
</section><!-- End Blog Section -->
<section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">

	<div class="container">
		<div class="row">

			<?php
			if (have_posts()) :

				/* Start the Loop */
				while (have_posts()) :
					the_post();
			?>
					<div class="col-lg-6">
						<?php
						get_template_part('template-parts/content', get_post_type());
						?>
					</div>
				<?php
				endwhile;
				?>
				<div class="blog-pagination">
					<?php pagination_bar(); ?>
				</div>

			<?php

			else :

				get_template_part('template-parts/content', 'none');

			endif;
			?>

		</div>


	</div>
	</div>

</section>
<?php
get_footer();
