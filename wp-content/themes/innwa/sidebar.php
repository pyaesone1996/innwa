<div class="blog">
	<div class="sidebar">


		<div class="sidebar-item search-form">
			<form role="search" method="get" action="/">
				<input type="text" name="s">
				<button type="submit"><i class="icofont-search"></i></button>
			</form>
		</div>
		<!-- End sidebar search formn-->

		<h3 class="sidebar-title">Recent Posts</h3>
		<div class="sidebar-item recent-posts">
			<?php
			query_posts('cat=1&showposts=5');

			if (have_posts()) :
				while (have_posts()) :
					the_post(); ?>

					<div class="post-item clearfix">
						<?php
						$thumbnail = get_the_post_thumbnail_url();
						if ($thumbnail) : ?>

							<?php the_post_thumbnail('full', ["class" => "img-fluid"]); ?>

						<?php else : ?>

							<img src="<?php echo get_template_directory_uri() . '/assets/img/favicon-300x300.webp' ?>" alt="the-calm-tech-<?php echo the_title(); ?>" class="img-fluid">

						<?php endif; ?>

						<div class="title-time">
							<h4><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h4>
							<time datetime="2020-01-01"><?php echo get_the_date(); ?></time>
							<p class="text-excerpt"> <?php echo get_excerpt(50); ?> </p>
							<a href="<?php echo get_permalink(); ?>" class="read-more">Read More</a>
						</div>

					</div>
					<hr>
			<?php endwhile;

			endif; ?>

		</div>
		<!-- End sidebar recent posts-->


	</div><!-- End sidebar -->
</div>