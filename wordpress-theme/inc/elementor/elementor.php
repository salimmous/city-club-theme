<?php
/**
 * Elementor compatibility and custom widgets
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Check if Elementor is active
if (!did_action('elementor/loaded')) {
    return;
}

/**
 * Register Elementor locations for Elementor Pro
 */
function cityclub_register_elementor_locations($elementor_theme_manager) {
    $elementor_theme_manager->register_location('header');
    $elementor_theme_manager->register_location('footer');
    $elementor_theme_manager->register_location('single');
    $elementor_theme_manager->register_location('archive');
}
add_action('elementor/theme/register_locations', 'cityclub_register_elementor_locations');

/**
 * Register custom Elementor widgets
 */
function cityclub_register_elementor_widgets() {
    // Include widget files
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/hero-section-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/class-schedule-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/trainer-grid-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/location-map-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/testimonial-carousel-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/membership-pricing-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/instagram-feed-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/activity-carousel-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/certified-coaches-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/club-network-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/women-only-section-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/medical-assessment-widget.php';
    require_once CITYCLUB_DIR . '/inc/elementor/widgets/faq-section-widget.php';
    
    // Register widgets
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\HeroSectionWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\ClassScheduleWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\TrainerGridWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\LocationMapWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\TestimonialCarouselWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\MembershipPricingWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\InstagramFeedWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\ActivityCarouselWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\CertifiedCoachesWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\ClubNetworkWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\WomenOnlySectionWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\MedicalAssessmentWidget());
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \CityClub\Elementor\FAQSectionWidget());
}
add_action('elementor/widgets/widgets_registered', 'cityclub_register_elementor_widgets');

/**
 * Add custom Elementor categories
 */
function cityclub_add_elementor_widget_categories($elements_manager) {
    $elements_manager->add_category(
        'cityclub',
        [
            'title' => __('CityClub', 'cityclub'),
            'icon' => 'fa fa-dumbbell',
        ]
    );
}
add_action('elementor/elements/categories_registered', 'cityclub_add_elementor_widget_categories');

/**
 * Enqueue Elementor styles and scripts
 */
function cityclub_elementor_scripts() {
    if (\Elementor\Plugin::$instance->preview->is_preview_mode() || \Elementor\Plugin::$instance->editor->is_edit_mode()) {
        wp_enqueue_style('cityclub-elementor', CITYCLUB_URI . '/assets/css/elementor.css', [], CITYCLUB_VERSION);
        wp_enqueue_script('cityclub-elementor', CITYCLUB_URI . '/assets/js/elementor.js', ['jquery'], CITYCLUB_VERSION, true);
    }
}
add_action('elementor/frontend/after_enqueue_styles', 'cityclub_elementor_scripts');
