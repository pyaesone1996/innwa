<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digit7s
 */

?>
<!-- ======= Blog Section ======= -->


<div class="entries">

    <article id="post-<?php the_ID(); ?>" <?php post_class(['entry']); ?>>

        <div class="entry-img">
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('full', ['class' => 'img-fluid']); ?>
        <?php else : ?> 
            <img src="<?php echo get_template_directory_uri() . '/assets/img/blog-post-1.jpg' ?>" alt="" class="img-fluid">
        <?php endif; ?>
        </div>

        <h2 class="entry-title">
            <a href="<?php echo get_permalink(); ?>"><?php the_title() ?></a>
        </h2>

        <div class="entry-meta">
            <ul>
                
                <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="<?php echo get_permalink(); ?>"><time datetime=" 2020-01-01"><?php digit7s_posted_on(); ?></time></a></li>
               
            </ul>
        </div>

        <div class="entry-content">
            <p>
                <?php get_excerpt(); ?>
            </p>
            <div class="read-more">
                <a href="<?php echo get_permalink(); ?>">Read More</a>
            </div>
        </div>

    </article><!-- End blog entry -->


</div><!-- End blog entries list -->