<?php
/**
 * The header for our theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="header-top">
        <!-- Logo -->
       <div class="site-logo">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php 
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            // Fallback: use theme's logo from images folder
            echo '<img src="' . esc_url( get_template_directory_uri() . '/images/vogue-logo-png-transparent.png' ) . '" alt="' . get_bloginfo( 'name' ) . '">';
        }
        ?>
    </a>
</div>

    </div>

    <!-- Navigation Menu -->
    <nav class="main-navigation">
        <?php
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'nav-list',
            'container'      => false,
        ) );
        ?>
    </nav>
</header>
