<?php

function themebs_enqueue_styles() {
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('core', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all');
}
add_action('wp_enqueue_scripts', 'themebs_enqueue_styles');

function themebs_enqueue_scripts() {
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/vendor/bootstrap.bundle.min.js', array('jquery'));
    wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.1', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'themebs_enqueue_scripts');

function ds_setup() {
    // Theme supports
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', ['aside', 'image', 'video']);
    add_theme_support('title-tag');
    add_theme_support('widgets');
    add_theme_support( 'custom-logo', array(
    'height'      => 9999,
    'width'       => 9999,
    'flex-height' => true,
    'flex-width'  => true,
) );



    // Register menus
    register_nav_menu('primary', __('Primary Navigation', 'your-theme-textdomain'));

    register_nav_menu('footer', __('Footer Navigation', 'your-theme-textdomain'));

}
add_action('after_setup_theme', 'ds_setup');
// add a hard-cropped size for grid cards
add_action('after_setup_theme', function() {
    add_image_size('grid-thumb', 800, 520, true); // width 800 x height 520, hard crop
});



/* ===== CUSTOM POST TYPE ===== */
function themebs_custom_post_type() {
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => __('Portfolios'),
            'singular_name' => __('Portfolio')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
    ));
}
add_action('init', 'themebs_custom_post_type');

/* ===== CUSTOM TAXONOMY ===== */
function themebs_custom_taxonomy() {
    register_taxonomy('genre', 'portfolio', array(
        'label' => __('Genres'),
        'rewrite' => array('slug' => 'genre'),
        'hierarchical' => true,
        'show_admin_column' => true,
    ));
}
add_action('init', 'themebs_custom_taxonomy');



// Make the logo use full size instead of 60x60
function change_logo_size_to_full( $html ) {
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $logo_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );
    return '<a href="' . esc_url( home_url('/') ) . '" class="custom-logo-link" rel="home">
                <img src="' . esc_url( $logo_url ) . '" class="custom-logo" alt="' . get_bloginfo( 'name' ) . '">
            </a>';
}
add_filter( 'get_custom_logo', 'change_logo_size_to_full' );












function themebs_enqueue_assets() {
    // Bootstrap core CSS
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );

    // Your theme stylesheet
    wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );

    // Slider CSS example
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/css/slider.css', array(), '1.1', 'all' );

    // Bootstrap Icons (enqueue in footer by setting last param true)
    wp_enqueue_style(
        'bootstrap-icons',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css',
        array(),
        '1.11.3',
        'all'
    );
}
add_action( 'wp_enqueue_scripts', 'themebs_enqueue_assets' );
add_image_size('grid-thumb', 400, 250, true); // 400x250 cropped


function mytheme_register_sidebar() {
    register_sidebar( array(
        'name'          => __( 'Right Sidebar', 'mytheme' ),
        'id'            => 'right-sidebar',
        'description'   => __( 'Widgets in this area will appear on the right-hand side.', 'mytheme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'mytheme_register_sidebar' );




function search_only_posts($query) {
    if ($query->is_search() && $query->is_main_query()) {
        $query->set('post_type', 'post'); // Only show posts
    }
}
add_action('pre_get_posts', 'search_only_posts');
