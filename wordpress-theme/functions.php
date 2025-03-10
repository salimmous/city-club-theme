<?php
/**
 * CityClub Fitness Theme functions and definitions
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Define theme constants
define('CITYCLUB_VERSION', '1.0.0');
define('CITYCLUB_DIR', get_template_directory());
define('CITYCLUB_URI', get_template_directory_uri());

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cityclub_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cityclub'),
        'footer' => esc_html__('Footer Menu', 'cityclub'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Elementor Pro locations
    add_theme_support('elementor-pro');
}
add_action('after_setup_theme', 'cityclub_setup');

/**
 * Register widget area.
 */
function cityclub_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Sidebar', 'cityclub'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Add widgets here.', 'cityclub'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 1', 'cityclub'),
        'id'            => 'footer-1',
        'description'   => esc_html__('First footer column.', 'cityclub'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 2', 'cityclub'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Second footer column.', 'cityclub'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 3', 'cityclub'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Third footer column.', 'cityclub'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Footer 4', 'cityclub'),
        'id'            => 'footer-4',
        'description'   => esc_html__('Fourth footer column.', 'cityclub'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'cityclub_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function cityclub_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('cityclub-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), CITYCLUB_VERSION);
    
    // Main stylesheet
    wp_enqueue_style('cityclub-style', get_stylesheet_uri(), array(), CITYCLUB_VERSION);
    
    // Theme custom CSS
    wp_enqueue_style('cityclub-custom', CITYCLUB_URI . '/assets/css/custom.css', array(), CITYCLUB_VERSION);
    
    // Theme main JS
    wp_enqueue_script('cityclub-main', CITYCLUB_URI . '/assets/js/main.js', array('jquery'), CITYCLUB_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cityclub_scripts');

/**
 * Custom template tags for this theme.
 */
require CITYCLUB_DIR . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require CITYCLUB_DIR . '/inc/template-functions.php';

/**
 * Custom Post Types for CityClub theme
 */
require CITYCLUB_DIR . '/inc/custom-post-types.php';

/**
 * Elementor compatibility and custom widgets
 */
require CITYCLUB_DIR . '/inc/elementor/elementor.php';

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require CITYCLUB_DIR . '/inc/woocommerce.php';
}
