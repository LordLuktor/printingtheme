<?php
/**
 * Steinmetz Printing Theme Functions
 *
 * @package Steinmetz_Printing
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme setup
 */
function steinmetz_printing_setup() {
    // Add support for block styles
    add_theme_support('wp-block-styles');

    // Add support for editor styles
    add_theme_support('editor-styles');

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add viewport meta tag for better mobile responsiveness
    add_action('wp_head', function() {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">';
    }, 1);

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 150,
        'width'       => 500,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add support for post thumbnails
    add_theme_support('post-thumbnails');

    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add support for title tag
    add_theme_support('title-tag');

    // Add support for align wide
    add_theme_support('align-wide');

    // Add support for custom line height
    add_theme_support('custom-line-height');

    // Add support for custom spacing
    add_theme_support('custom-spacing');

    // Add support for custom units
    add_theme_support('custom-units');
}
add_action('after_setup_theme', 'steinmetz_printing_setup');

/**
 * Enqueue styles and scripts
 */
function steinmetz_printing_enqueue_assets() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'steinmetz-printing-fonts',
        'https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Enqueue custom stylesheet
    wp_enqueue_style(
        'steinmetz-printing-custom',
        get_theme_file_uri('assets/css/custom.css'),
        array(),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'steinmetz_printing_enqueue_assets');

/**
 * Enqueue editor styles
 */
function steinmetz_printing_editor_styles() {
    add_editor_style('assets/css/custom.css');
}
add_action('after_setup_theme', 'steinmetz_printing_editor_styles');

/**
 * Register navigation menus
 */
function steinmetz_printing_register_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'steinmetz-printing'),
        'footer'  => __('Footer Menu', 'steinmetz-printing'),
    ));
}
add_action('init', 'steinmetz_printing_register_menus');

/**
 * Register widget areas
 */
function steinmetz_printing_widgets_init() {
    register_sidebar(array(
        'name'          => __('Footer Widget Area', 'steinmetz-printing'),
        'id'            => 'footer-widgets',
        'description'   => __('Add widgets here to appear in your footer.', 'steinmetz-printing'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'steinmetz_printing_widgets_init');

/**
 * Add custom image sizes
 */
function steinmetz_printing_image_sizes() {
    add_image_size('steinmetz-printing-featured', 1200, 600, true);
    add_image_size('steinmetz-printing-thumbnail', 400, 400, true);
}
add_action('after_setup_theme', 'steinmetz_printing_image_sizes');

/**
 * Customize excerpt length
 */
function steinmetz_printing_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'steinmetz_printing_excerpt_length');

/**
 * Customize excerpt more string
 */
function steinmetz_printing_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'steinmetz_printing_excerpt_more');

/**
 * Add body classes for better styling control
 */
function steinmetz_printing_body_classes($classes) {
    // Add a class if it's a singular post/page
    if (is_singular()) {
        $classes[] = 'singular-page';
    }

    // Add a class if it's the home page
    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    // Add a class if it's the blog page
    if (is_home()) {
        $classes[] = 'blog-page';
    }

    return $classes;
}
add_filter('body_class', 'steinmetz_printing_body_classes');

/**
 * Automatically create and set Home and Blog pages on theme activation
 */
function steinmetz_printing_create_pages() {
    // Check if this is the first activation
    if (get_option('steinmetz_printing_pages_created')) {
        return;
    }

    // Create Home page
    $home_page = array(
        'post_title'   => 'Home',
        'post_content' => '',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => 1,
    );

    $home_page_id = wp_insert_post($home_page);

    // Create Blog page
    $blog_page = array(
        'post_title'   => 'Blog',
        'post_content' => '',
        'post_status'  => 'publish',
        'post_type'    => 'page',
        'post_author'  => 1,
    );

    $blog_page_id = wp_insert_post($blog_page);

    // Set the home page as static front page
    if ($home_page_id && $blog_page_id) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home_page_id);
        update_option('page_for_posts', $blog_page_id);

        // Mark that pages have been created
        update_option('steinmetz_printing_pages_created', true);
    }
}
add_action('after_switch_theme', 'steinmetz_printing_create_pages');

/**
 * Add theme support for WooCommerce if installed
 */
function steinmetz_printing_woocommerce_setup() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'steinmetz_printing_woocommerce_setup');

/**
 * Improve accessibility for keyboard navigation
 */
function steinmetz_printing_skip_link() {
    echo '<a class="skip-link screen-reader-text" href="#content">' . esc_html__('Skip to content', 'steinmetz-printing') . '</a>';
}
add_action('wp_body_open', 'steinmetz_printing_skip_link');

/**
 * Add custom block patterns category
 */
function steinmetz_printing_block_pattern_categories() {
    register_block_pattern_category(
        'steinmetz-printing',
        array('label' => __('Steinmetz Printing', 'steinmetz-printing'))
    );
}
add_action('init', 'steinmetz_printing_block_pattern_categories');
