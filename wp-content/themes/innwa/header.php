<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package digit7s
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="" />
    <meta name="keywords"
        content="" />
    <meta name="author" content="Digit7s">
    <meta name="document-classification" content="">

    <link href="<?php echo get_template_directory_uri() . '/assets/img/favicon-300x300.webp' ?>" rel="icon">
    <link href="<?php echo get_template_directory_uri() . '/assets/img/favicon-300x300.webp' ?>" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/vendor/icofont/icofont.min.css' ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/vendor/icofont/icofont.min.css' ?>">
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri() . '/assets/vendor/boxicons/css/boxicons.min.css' ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/vendor/venobox/venobox.css' ?>">
    <link rel="stylesheet"
        href="<?php echo get_template_directory_uri() . '/assets/vendor/owl.carousel/assets/owl.carousel.min.css' ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/vendor/aos/aos.css' ?>">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/css/style.css' ?>">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center mrg-10">
            <div class="logo">
                <a href="/">
                    <img src="<?php echo get_template_directory_uri() . '/assets/img/LogoInnwasport.png' ?>"
                        alt="LogoInnwasport">
                </a>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <?php
                wp_nav_menu([
                    'menu_id' => '',
                    'depth' => 3,
                    'container' => '',
                    'container_class' => '',
                    'container_id' => '',
                    'menu_class' => '',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ]);
                ?>
            </nav>
            <div></div>
        </div>
    </header>

    <div class="main">