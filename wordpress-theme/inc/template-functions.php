<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package CityClub
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cityclub_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cityclub_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cityclub_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cityclub_pingback_header' );

/**
 * Add custom theme settings
 */
function cityclub_customize_register( $wp_customize ) {
    // Social Media Section
    $wp_customize->add_section( 'cityclub_social_media', array(
        'title'    => __( 'Social Media', 'cityclub' ),
        'priority' => 30,
    ) );
    
    // Facebook URL
    $wp_customize->add_setting( 'cityclub_facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'cityclub_facebook_url', array(
        'label'    => __( 'Facebook URL', 'cityclub' ),
        'section'  => 'cityclub_social_media',
        'type'     => 'url',
    ) );
    
    // Instagram URL
    $wp_customize->add_setting( 'cityclub_instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'cityclub_instagram_url', array(
        'label'    => __( 'Instagram URL', 'cityclub' ),
        'section'  => 'cityclub_social_media',
        'type'     => 'url',
    ) );
    
    // Twitter URL
    $wp_customize->add_setting( 'cityclub_twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'cityclub_twitter_url', array(
        'label'    => __( 'Twitter URL', 'cityclub' ),
        'section'  => 'cityclub_social_media',
        'type'     => 'url',
    ) );
    
    // YouTube URL
    $wp_customize->add_setting( 'cityclub_youtube_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( 'cityclub_youtube_url', array(
        'label'    => __( 'YouTube URL', 'cityclub' ),
        'section'  => 'cityclub_social_media',
        'type'     => 'url',
    ) );
    
    // Contact Information Section
    $wp_customize->add_section( 'cityclub_contact_info', array(
        'title'    => __( 'Contact Information', 'cityclub' ),
        'priority' => 35,
    ) );
    
    // Phone Number
    $wp_customize->add_setting( 'cityclub_phone', array(
        'default'           => '+212 522 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'cityclub_phone', array(
        'label'    => __( 'Phone Number', 'cityclub' ),
        'section'  => 'cityclub_contact_info',
        'type'     => 'text',
    ) );
    
    // Email Address
    $wp_customize->add_setting( 'cityclub_email', array(
        'default'           => 'info@cityclubmaroc.com',
        'sanitize_callback' => 'sanitize_email',
    ) );
    
    $wp_customize->add_control( 'cityclub_email', array(
        'label'    => __( 'Email Address', 'cityclub' ),
        'section'  => 'cityclub_contact_info',
        'type'     => 'email',
    ) );
    
    // Business Hours
    $wp_customize->add_setting( 'cityclub_hours', array(
        'default'           => 'Lun-Ven 6h-22h | Sam-Dim 8h-20h',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    
    $wp_customize->add_control( 'cityclub_hours', array(
        'label'    => __( 'Business Hours', 'cityclub' ),
        'section'  => 'cityclub_contact_info',
        'type'     => 'text',
    ) );
    
    // Theme Colors Section
    $wp_customize->add_section( 'cityclub_colors', array(
        'title'    => __( 'Theme Colors', 'cityclub' ),
        'priority' => 40,
    ) );
    
    // Primary Color
    $wp_customize->add_setting( 'cityclub_primary_color', array(
        'default'           => '#f97316',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_primary_color', array(
        'label'    => __( 'Primary Color', 'cityclub' ),
        'section'  => 'cityclub_colors',
    ) ) );
    
    // Secondary Color
    $wp_customize->add_setting( 'cityclub_secondary_color', array(
        'default'           => '#0d9488',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cityclub_secondary_color', array(
        'label'    => __( 'Secondary Color', 'cityclub' ),
        'section'  => 'cityclub_colors',
    ) ) );
}
add_action( 'customize_register', 'cityclub_customize_register' );

/**
 * Generate inline CSS for theme customizer options
 */
function cityclub_customizer_css() {
    $primary_color = get_theme_mod('cityclub_primary_color', '#f97316');
    $secondary_color = get_theme_mod('cityclub_secondary_color', '#0d9488');
    
    $css = ''
        . ':root {'
        . '  --primary-color: ' . esc_attr($primary_color) . ';'
        . '  --secondary-color: ' . esc_attr($secondary_color) . ';'
        . '}'
        . '.bg-primary { background-color: var(--primary-color); }'
        . '.text-primary { color: var(--primary-color); }'
        . '.border-primary { border-color: var(--primary-color); }'
        . '.bg-secondary { background-color: var(--secondary-color); }'
        . '.text-secondary { color: var(--secondary-color); }'
        . '.border-secondary { border-color: var(--secondary-color); }'
        . '.btn-primary, .location-button, .trainer-button { background-color: var(--primary-color); }'
        . '.btn-primary:hover, .location-button:hover, .trainer-button:hover { background-color: color-mix(in srgb, var(--primary-color) 90%, black); }'
        . '.accent-color { color: var(--primary-color); }'
        . '.accent-bg { background-color: var(--primary-color); }'
        . '.accent-border { border-color: var(--primary-color); }'
        . '.tab-active { background-color: var(--primary-color); }'
        . '.from-orange-500 { --tw-gradient-from: var(--primary-color); }'
        . '.to-orange-600 { --tw-gradient-to: color-mix(in srgb, var(--primary-color) 90%, black); }'
        . '.bg-orange-500\/10 { background-color: color-mix(in srgb, var(--primary-color) 10%, transparent); }'
        . '.bg-orange-500\/20 { background-color: color-mix(in srgb, var(--primary-color) 20%, transparent); }'
        . '.text-orange-500, .text-orange-600 { color: var(--primary-color); }'
        . '.border-orange-200, .border-orange-500 { border-color: var(--primary-color); }'
        . '.focus\:ring-orange-500:focus { --tw-ring-color: var(--primary-color); }'
        . '.focus-visible\:ring-orange-500:focus-visible { --tw-ring-color: var(--primary-color); }'
        . '.hover\:bg-orange-500:hover { background-color: var(--primary-color); }'
        . '.hover\:text-orange-500:hover { color: var(--primary-color); }'
        . '.hover\:shadow-orange-500\/30:hover { --tw-shadow-color: color-mix(in srgb, var(--primary-color) 30%, transparent); }'
        . '.shadow-orange-500\/20 { --tw-shadow-color: color-mix(in srgb, var(--primary-color) 20%, transparent); }'
        . '.shadow-orange-500\/30 { --tw-shadow-color: color-mix(in srgb, var(--primary-color) 30%, transparent); }'
        . '.shadow-orange-500\/40 { --tw-shadow-color: color-mix(in srgb, var(--primary-color) 40%, transparent); }'
        . '.hover\:shadow-orange-500\/40:hover { --tw-shadow-color: color-mix(in srgb, var(--primary-color) 40%, transparent); }'
        . '.text-teal-400, .text-teal-500 { color: var(--secondary-color); }'
        . '.bg-teal-500 { background-color: var(--secondary-color); }'
        . '.to-teal-500 { --tw-gradient-to: var(--secondary-color); }'
        . '.hover\:shadow-teal-500\/30:hover { --tw-shadow-color: color-mix(in srgb, var(--secondary-color) 30%, transparent); }';
    
    echo '<style type="text/css">' . $css . '</style>';
}
add_action('wp_head', 'cityclub_customizer_css');

/**
 * This function has been moved to functions.php to avoid redeclaration
 * See functions.php for the cityclub_scripts() implementation
 */

/**
 * Add preconnect for Google Fonts
 */
function cityclub_resource_hints($urls, $relation_type) {
    if ('preconnect' === $relation_type) {
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin',
        );
    }
    
    return $urls;
}
add_filter('wp_resource_hints', 'cityclub_resource_hints', 10, 2);

/**
 * Get contact information from theme customizer
 */
function cityclub_get_contact_info($type = 'phone') {
    switch ($type) {
        case 'phone':
            return get_theme_mod('cityclub_phone', '+212 522 123 456');
        case 'email':
            return get_theme_mod('cityclub_email', 'info@cityclubmaroc.com');
        case 'hours':
            return get_theme_mod('cityclub_hours', 'Lun-Ven 6h-22h | Sam-Dim 8h-20h');
        default:
            return '';
    }
}
