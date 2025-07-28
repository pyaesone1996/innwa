<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package digit7s
 */

?>


<section id="post-<?php the_ID(); ?>" <?php post_class(['blog']); ?>" data-aos=" fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <header class="entry-header">
                    <?php
                    the_title('<h1 class="entry-title">', '</h1>');
                    ?>
                </header><!-- .entry-header -->
                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(
                        [
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'digit7s'),
                            'after' => '</div>',
                        ]
                    );
                    ?>
                </div><!-- .entry-content -->
            </div>
        </div>

        
           

            

       

     

    </div><!-- End blog entries list -->

</section><!-- End Blog Section -->