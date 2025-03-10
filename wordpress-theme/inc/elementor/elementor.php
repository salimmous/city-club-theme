<?php
/**
 * Elementor compatibility file
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register CityClub Elementor category.
 *
 * @param object $elements_manager Elementor elements manager.
 */
function cityclub_register_elementor_category( $elements_manager ) {
	$elements_manager->add_category(
		'cityclub-elements',
		[
			'title' => esc_html__( 'CityClub Elements', 'cityclub' ),
			'icon'  => 'fa fa-plug',
		]
	);
}
add_action( 'elementor/elements/categories_registered', 'cityclub_register_elementor_category' );

/**
 * Register CityClub Elementor widgets.
 */
function cityclub_register_elementor_widgets() {
	// Include widget files
	require_once get_template_directory() . '/inc/elementor/widgets/hero-section-widget.php';
	require_once get_template_directory() . '/inc/elementor/widgets/class-schedule-widget.php';
	require_once get_template_directory() . '/inc/elementor/widgets/membership-pricing-widget.php';
	require_once get_template_directory() . '/inc/elementor/widgets/trainer-grid-widget.php';
	require_once get_template_directory() . '/inc/elementor/widgets/location-map-widget.php';

	// Register widgets
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Hero_Section_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Class_Schedule_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Membership_Pricing_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Trainer_Grid_Widget() );
	\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \CityClub_Location_Map_Widget() );
}
add_action( 'elementor/widgets/widgets_registered', 'cityclub_register_elementor_widgets' );

/**
 * Enqueue Elementor frontend styles.
 */
function cityclub_elementor_frontend_styles() {
	wp_enqueue_style(
		'cityclub-elementor-styles',
		get_template_directory_uri() . '/assets/css/elementor.css',
		[],
		_S_VERSION
	);
}
add_action( 'elementor/frontend/after_enqueue_styles', 'cityclub_elementor_frontend_styles' );

/**
 * Enqueue Elementor frontend scripts.
 */
function cityclub_elementor_frontend_scripts() {
	wp_enqueue_script(
		'cityclub-elementor-scripts',
		get_template_directory_uri() . '/assets/js/elementor.js',
		[ 'jquery' ],
		_S_VERSION,
		true
	);
}
add_action( 'elementor/frontend/after_enqueue_scripts', 'cityclub_elementor_frontend_scripts' );

/**
 * Create necessary directories and files for Elementor if they don't exist
 */
function cityclub_create_elementor_directories() {
    // Create assets directory if it doesn't exist
    $assets_dir = get_template_directory() . '/assets';
    if (!file_exists($assets_dir)) {
        wp_mkdir_p($assets_dir);
    }
    
    // Create css directory if it doesn't exist
    $css_dir = $assets_dir . '/css';
    if (!file_exists($css_dir)) {
        wp_mkdir_p($css_dir);
    }
    
    // Create js directory if it doesn't exist
    $js_dir = $assets_dir . '/js';
    if (!file_exists($js_dir)) {
        wp_mkdir_p($js_dir);
    }
    
    // Create elementor.css file if it doesn't exist
    $elementor_css_file = $css_dir . '/elementor.css';
    if (!file_exists($elementor_css_file)) {
        $elementor_css_content = "/**\n * CityClub Elementor Styles\n */\n\n/* Hero Section Styles */\n.cityclub-hero-section {\n  min-height: 700px;\n  position: relative;\n  overflow: hidden;\n}\n\n.cityclub-hero-slide {\n  transition: opacity 1s ease;\n}\n\n.cityclub-hero-slide-bg {\n  background-size: cover;\n  background-position: center;\n}\n\n.cityclub-hero-badge {\n  display: inline-block;\n  padding: 8px 16px;\n  border-radius: 50px;\n  font-weight: 500;\n  letter-spacing: 1px;\n  text-transform: uppercase;\n  animation: pulse 3s infinite;\n}\n\n.cityclub-hero-title {\n  font-size: 4rem;\n  font-weight: 900;\n  line-height: 1.1;\n  margin-bottom: 1rem;\n}\n\n.cityclub-hero-subtitle {\n  font-size: 1.5rem;\n  font-weight: 300;\n  max-width: 800px;\n  margin: 0 auto 2rem;\n}\n\n.cityclub-hero-button-primary,\n.cityclub-hero-button-secondary {\n  display: inline-block;\n  padding: 15px 30px;\n  border-radius: 10px;\n  font-weight: 700;\n  font-size: 1.125rem;\n  text-transform: uppercase;\n  transition: all 0.3s ease;\n  position: relative;\n  overflow: hidden;\n}\n\n.cityclub-hero-button-primary {\n  background: linear-gradient(to right, #f97316, #ea580c);\n  color: white;\n  box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.3);\n}\n\n.cityclub-hero-button-primary:hover {\n  transform: translateY(-5px) scale(1.05);\n  box-shadow: 0 15px 20px -3px rgba(249, 115, 22, 0.4);\n}\n\n.cityclub-hero-button-secondary {\n  background-color: rgba(255, 255, 255, 0.1);\n  backdrop-filter: blur(10px);\n  border: 2px solid rgba(255, 255, 255, 0.5);\n  color: white;\n}\n\n.cityclub-hero-button-secondary:hover {\n  background-color: white;\n  color: #1f2937;\n  transform: translateY(-5px) scale(1.05);\n  box-shadow: 0 10px 15px -3px rgba(255, 255, 255, 0.3);\n}\n\n.cityclub-hero-arrow {\n  width: 50px;\n  height: 50px;\n  display: flex;\n  align-items: center;\n  justify-content: center;\n  border-radius: 50%;\n  cursor: pointer;\n  transition: all 0.3s ease;\n}\n\n.cityclub-hero-dot {\n  height: 12px;\n  border-radius: 50px;\n  transition: all 0.3s ease;\n  cursor: pointer;\n}\n\n.cityclub-hero-dot.active {\n  width: 32px;\n}\n\n.cityclub-location-selector {\n  display: flex;\n  align-items: center;\n  gap: 10px;\n  padding: 10px 15px;\n  border-radius: 8px;\n  background-color: rgba(255, 255, 255, 0.9);\n  backdrop-filter: blur(5px);\n  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);\n}\n\n.cityclub-location-dropdown {\n  padding: 8px 12px;\n  border-radius: 6px;\n  border: 1px solid #e5e7eb;\n  background-color: white;\n  font-size: 0.875rem;\n  color: #374151;\n  width: 100%;\n  max-width: 250px;\n}\n\n.cityclub-location-button {\n  padding: 8px 16px;\n  border-radius: 6px;\n  background-color: #f97316;\n  color: white;\n  font-weight: 600;\n  font-size: 0.875rem;\n  text-transform: uppercase;\n  letter-spacing: 0.5px;\n  transition: all 0.3s ease;\n}\n\n.cityclub-location-button:hover {\n  background-color: #ea580c;\n  transform: translateY(-2px);\n  box-shadow: 0 10px 15px -3px rgba(249, 115, 22, 0.3);\n}\n\n/* Class Schedule Styles */\n.cityclub-schedule-section {\n  padding: 80px 0;\n}\n\n.cityclub-schedule-header {\n  margin-bottom: 40px;\n  text-align: center;\n}\n\n.cityclub-schedule-title {\n  font-size: 2.5rem;\n  font-weight: 700;\n  margin-bottom: 1rem;\n  color: #1f2937;\n}\n\n.cityclub-schedule-subtitle {\n  font-size: 1.125rem;\n  color: #6b7280;\n  max-width: 800px;\n  margin: 0 auto;\n}\n\n.cityclub-schedule-tabs {\n  display: flex;\n  justify-content: center;\n  margin-bottom: 30px;\n  overflow-x: auto;\n  padding-bottom: 10px;\n}\n\n.cityclub-schedule-tab {\n  padding: 10px 20px;\n  border-radius: 50px;\n  font-weight: 600;\n  cursor: pointer;\n  transition: all 0.3s ease;\n  white-space: nowrap;\n}\n\n.cityclub-schedule-tab.active {\n  background-color: #f97316;\n  color: white;\n}\n\n.cityclub-schedule-content {\n  display: grid;\n  grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));\n  gap: 20px;\n}\n\n.cityclub-schedule-card {\n  background-color: white;\n  border-radius: 10px;\n  overflow: hidden;\n  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);\n  transition: all 0.3s ease;\n}\n\n.cityclub-schedule-card:hover {\n  transform: translateY(-5px);\n  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);\n}\n\n.cityclub-schedule-card-header {\n  padding: 15px;\n  border-bottom: 1px solid #e5e7eb;\n  display: flex;\n  justify-content: space-between;\n  align-items: center;\n}\n\n.cityclub-schedule-card-title {\n  font-weight: 700;\n  font-size: 1.125rem;\n  color: #1f2937;\n}\n\n.cityclub-schedule-card-badge {\n  padding: 4px 8px;\n  border-radius: 50px;\n  font-size: 0.75rem;\n  font-weight: 600;\n  background-color: #f97316;\n  color: white;\n}\n\n.cityclub-schedule-card-body {\n  padding: 15px;\n}\n\n.cityclub-schedule-card-info {\n  display: flex;\n  align-items: center;\n  margin-bottom: 8px;\n  color: #6b