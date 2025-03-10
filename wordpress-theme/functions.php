<?php
/**
 * CityClub functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CityClub
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function cityclub_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
	load_theme_textdomain( 'cityclub', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'cityclub' ),
			'footer-1' => esc_html__( 'Footer Links', 'cityclub' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'cityclub_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );

	// Add support for responsive embeds.
	add_theme_support( 'responsive-embeds' );
}
add_action( 'after_setup_theme', 'cityclub_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cityclub_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cityclub_content_width', 1200 );
}
add_action( 'after_setup_theme', 'cityclub_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cityclub_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cityclub' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'cityclub' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'cityclub' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'cityclub' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 4', 'cityclub' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'cityclub' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cityclub_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cityclub_scripts() {
	// Enqueue Google Fonts
	wp_enqueue_style('cityclub-google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap', array(), null);
	
	// Enqueue Font Awesome
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
	
	// Enqueue theme stylesheet
	wp_enqueue_style('cityclub-style', get_stylesheet_uri(), array(), _S_VERSION);
	
	// Enqueue custom scripts
	wp_enqueue_script('cityclub-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('cityclub-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), _S_VERSION, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cityclub_scripts' );

/**
 * Create necessary directories and files if they don't exist
 */
function cityclub_create_directories() {
    // Create js directory if it doesn't exist
    $js_dir = get_template_directory() . '/js';
    if (!file_exists($js_dir)) {
        wp_mkdir_p($js_dir);
    }
    
    // Create navigation.js file if it doesn't exist
    $navigation_file = $js_dir . '/navigation.js';
    if (!file_exists($navigation_file)) {
        $navigation_content = "/**\n * File navigation.js.\n *\n * Handles toggling the navigation menu for small screens and enables TAB key\n * navigation support for dropdown menus.\n */\n( function() {\n\tconst siteNavigation = document.getElementById( 'site-navigation' );\n\n\t// Return early if the navigation doesn't exist.\n\tif ( ! siteNavigation ) {\n\t\treturn;\n\t}\n\n\tconst button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];\n\n\t// Return early if the button doesn't exist.\n\tif ( 'undefined' === typeof button ) {\n\t\treturn;\n\t}\n\n\tconst menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];\n\n\t// Hide menu toggle button if menu is empty and return early.\n\tif ( 'undefined' === typeof menu ) {\n\t\tbutton.style.display = 'none';\n\t\treturn;\n\t}\n\n\tif ( ! menu.classList.contains( 'nav-menu' ) ) {\n\t\tmenu.classList.add( 'nav-menu' );\n\t}\n\n\t// Toggle the .toggled class and the aria-expanded value each time the button is clicked.\n\tbutton.addEventListener( 'click', function() {\n\t\tsiteNavigation.classList.toggle( 'toggled' );\n\n\t\tif ( button.getAttribute( 'aria-expanded' ) === 'true' ) {\n\t\t\tbutton.setAttribute( 'aria-expanded', 'false' );\n\t\t} else {\n\t\t\tbutton.setAttribute( 'aria-expanded', 'true' );\n\t\t}\n\t} );\n\n\t// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.\n\tdocument.addEventListener( 'click', function( event ) {\n\t\tconst isClickInside = siteNavigation.contains( event.target );\n\n\t\tif ( ! isClickInside ) {\n\t\t\tsiteNavigation.classList.remove( 'toggled' );\n\t\t\tbutton.setAttribute( 'aria-expanded', 'false' );\n\t\t}\n\t} );\n\n\t// Get all the link elements within the menu.\n\tconst links = menu.getElementsByTagName( 'a' );\n\n\t// Get all the link elements with children within the menu.\n\tconst linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );\n\n\t// Toggle focus each time a menu link is focused or blurred.\n\tfor ( const link of links ) {\n\t\tlink.addEventListener( 'focus', toggleFocus, true );\n\t\tlink.addEventListener( 'blur', toggleFocus, true );\n\t}\n\n\t// Toggle focus each time a menu link with children receive a touch event.\n\tfor ( const link of linksWithChildren ) {\n\t\tlink.addEventListener( 'touchstart', toggleFocus, false );\n\t}\n\n\t/**\n\t * Sets or removes .focus class on an element.\n\t */\n\tfunction toggleFocus() {\n\t\tif ( event.type === 'focus' || event.type === 'blur' ) {\n\t\t\tlet self = this;\n\t\t\t// Move up through the ancestors of the current link until we hit .nav-menu.\n\t\t\twhile ( ! self.classList.contains( 'nav-menu' ) ) {\n\t\t\t\t// On li elements toggle the class .focus.\n\t\t\t\tif ( 'li' === self.tagName.toLowerCase() ) {\n\t\t\t\t\tself.classList.toggle( 'focus' );\n\t\t\t\t}\n\t\t\t\tself = self.parentNode;\n\t\t\t}\n\t\t}\n\n\t\tif ( event.type === 'touchstart' ) {\n\t\t\tconst menuItem = this.parentNode;\n\t\t\tevent.preventDefault();\n\t\t\tfor ( const link of menuItem.parentNode.children ) {\n\t\t\t\tif ( menuItem !== link ) {\n\t\t\t\t\tlink.classList.remove( 'focus' );\n\t\t\t\t}\n\t\t\t}\n\t\t\tmenuItem.classList.toggle( 'focus' );\n\t\t}\n\t}\n}() );\n";
        file_put_contents($navigation_file, $navigation_content);
    }
    
    // Create scripts.js file if it doesn't exist
    $scripts_file = $js_dir . '/scripts.js';
    if (!file_exists($scripts_file)) {
        $scripts_content = "/**\n * Custom scripts for CityClub theme\n */\njQuery(document).ready(function($) {\n    // Mobile menu toggle\n    $('.mobile-menu-toggle').on('click', function() {\n        $('.mobile-menu').toggleClass('active');\n        $('body').toggleClass('mobile-menu-open');\n    });\n    \n    // Smooth scroll for anchor links\n    $('a[href*=\\#]:not([href=\\#])').on('click', function() {\n        if (location.pathname.replace(/^\\//, '') === this.pathname.replace(/^\\//, '') && location.hostname === this.hostname) {\n            var target = $(this.hash);\n            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');\n            if (target.length) {\n                $('html, body').animate({\n                    scrollTop: target.offset().top - 100\n                }, 1000);\n                return false;\n            }\n        }\n    });\n    \n    // Add active class to current menu item\n    var currentUrl = window.location.href;\n    $('.main-navigation a').each(function() {\n        if ($(this).attr('href') === currentUrl) {\n            $(this).addClass('active');\n        }\n    });\n    \n    // Initialize AOS animation library if it exists\n    if (typeof AOS !== 'undefined') {\n        AOS.init({\n            duration: 800,\n            easing: 'ease-in-out',\n            once: true\n        });\n    }\n});\n";
        file_put_contents($scripts_file, $scripts_content);
    }
}
add_action('after_switch_theme', 'cityclub_create_directories');

/**
 * Create custom header file if it doesn't exist
 */
function cityclub_create_custom_header_file() {
    $custom_header_file = get_template_directory() . '/inc/custom-header.php';
    if (!file_exists($custom_header_file)) {
        $custom_header_content = "<?php\n/**\n * Sample implementation of the Custom Header feature\n *\n * @link https://developer.wordpress.org/themes/functionality/custom-headers/\n *\n * @package CityClub\n */\n\n/**\n * Set up the WordPress core custom header feature.\n *\n * @uses cityclub_header_style()\n */\nfunction cityclub_custom_header_setup() {\n\tadd_theme_support(\n\t\t'custom-header',\n\t\tapply_filters(\n\t\t\t'cityclub_custom_header_args',\n\t\t\tarray(\n\t\t\t\t'default-image'      => '',\n\t\t\t\t'default-text-color' => '000000',\n\t\t\t\t'width'              => 1920,\n\t\t\t\t'height'             => 250,\n\t\t\t\t'flex-height'        => true,\n\t\t\t\t'wp-head-callback'   => 'cityclub_header_style',\n\t\t\t)\n\t\t)\n\t);\n}\nadd_action( 'after_setup_theme', 'cityclub_custom_header_setup' );\n\nif ( ! function_exists( 'cityclub_header_style' ) ) :\n\t/**\n\t * Styles the header image and text displayed on the blog.\n\t *\n\t * @see cityclub_custom_header_setup().\n\t */\n\tfunction cityclub_header_style() {\n\t\t$header_text_color = get_header_textcolor();\n\n\t\t/*\n\t\t * If no custom options for text are set, let's bail.\n\t\t* get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_theme_support( 'custom-header' ).\n\t\t*/\n\t\tif ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color ) {\n\t\t\treturn;\n\t\t}\n\n\t\t// If we get this far, we have custom styles. Let's do this.\n\t\t?>\n\t\t<style type=\"text/css\">\n\t\t<?php\n\t\t// Has the text been hidden?\n\t\tif ( ! display_header_text() ) :\n\t\t\t?>\n\t\t\t.site-title,\n\t\t\t.site-description {\n\t\t\t\tposition: absolute;\n\t\t\t\tclip: rect(1px, 1px, 1px, 1px);\n\t\t\t\t}\n\t\t\t<?php\n\t\t// If the user has set a custom color for the text use that.\n\t\telse :\n\t\t\t?>\n\t\t\t.site-title a,\n\t\t\t.site-description {\n\t\t\t\tcolor: #<?php echo esc_attr( $header_text_color ); ?>;\n\t\t\t\t}\n\t\t\t<?php endif; ?>\n\t\t</style>\n\t\t<?php\n\t}\nendif;\n";
        file_put_contents($custom_header_file, $custom_header_content);
    }
}
add_action('after_switch_theme', 'cityclub_create_custom_header_file');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom post types and taxonomies.
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Load Elementor compatibility file.
 */
if (defined('ELEMENTOR_VERSION')) {
    require get_template_directory() . '/inc/elementor/elementor.php';
}
