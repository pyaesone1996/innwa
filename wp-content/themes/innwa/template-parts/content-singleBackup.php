<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digit7s
 */

?>


<!-- ======= Blog Section ======= -->
<section id="post-<?php the_ID(); ?>" <?php post_class(['blog']); ?>" data-aos=" fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="centries">

        <article class="entry entry-single">
            <div class="entry-img">
                <?php
                $thumbnail = get_the_post_thumbnail_url();
                if ($thumbnail) : ?>

                    <?php the_post_thumbnail('full'); ?>

                <?php else : ?>

                    <img src="<?php echo get_template_directory_uri() . '/assets/img/recent-posts-1.jpg' ?>" alt="">

                <?php endif; ?>
            </div>

            <h2 class="entry-title">
                <h1><?php the_title(); ?></h1>
            </h2>

            <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center"><i class="icofont-user"></i>
                        <span"><?php digit7s_posted_by(); ?></span>
                    </li>
                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <span><time datetime="2020-01-01"><?php digit7s_posted_on(); ?></time></span></li>
                    <li class="d-flex align-items-center">
                        <i class="icofont-comment"></i>
                        <span> <?php echo get_comments_number(get_the_ID()); ?></span>
                    </li>
                </ul>
            </div>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>



        </article><!-- End blog entry -->

        <!-- <div class="blog-comments"> -->
        <?php
        // if (comments_open() || get_comments_number()) :
        // comments_template();
        // endif; 
        ?>
        <!-- </div> -->

    </div><!-- End blog entries list -->

</section><!-- End Blog Section -->