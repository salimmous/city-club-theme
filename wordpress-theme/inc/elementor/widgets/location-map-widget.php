<?php
/**
 * Location Map Widget for Elementor
 */

namespace CityClub\Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;

class LocationMapWidget extends Widget_Base {

    public function get_name() {
        return 'cityclub_location_map';
    }

    public function get_title() {
        return __('Location Map', 'cityclub');
    }

    public function get_icon() {
        return 'eicon-map-pin';
    }

    public function get_categories() {
        return ['cityclub'];
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => __('Content', 'cityclub'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Find a Club Near You', 'cityclub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('With over 20 locations across Morocco, there's always a Fitness Club nearby. Use the map to find your nearest club and explore its amenities.', 'cityclub'),
            ]
        );

        $this->add_control(
            'map_image',
            [
                'label' => __('Map Image', 'cityclub'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1569336415962-a4bd9f69c07a?w=1200&q=80',
                ],
            ]
        );

        // Locations Repeater
        $locations_repeater = new Repeater();

        $locations_repeater->add_control(
            'name',
            [
                'label' => __('Location Name', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Fitness Club Casablanca Central', 'cityclub'),
            ]
        );

        $locations_repeater->add_control(
            'address',
            [
                'label' => __('Address', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('123 Mohammed V Boulevard', 'cityclub'),
            ]
        );

        $locations_repeater->add_control(
            'city',
            [
                'label' => __('City', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Casablanca', 'cityclub'),
            ]
        );

        $locations_repeater->add_control(
            'phone',
            [
                'label' => __('Phone', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('+212-522-123456', 'cityclub'),
            ]
        );

        $locations_repeater->add_control(
            'hours',
            [
                'label' => __('Hours', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub'),
            ]
        );

        $locations_repeater->add_control(
            'coordinates',
            [
                'label' => __('Coordinates (Lat, Lng)', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('33.5731, -7.5898', 'cityclub'),
                'description' => __('Enter as latitude, longitude (e.g., 33.5731, -7.5898)', 'cityclub'),
            ]
        );

        $locations_repeater->add_control(
            'amenities',
            [
                'label' => __('Amenities (comma separated)', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Pool, Sauna, Group Classes, Personal Training, Parking', 'cityclub'),
            ]
        );

        $this->add_control(
            'locations',
            [
                'label' => __('Locations', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $locations_repeater->get_controls(),
                'default' => [
                    [
                        'name' => __('Fitness Club Casablanca Central', 'cityclub'),
                        'address' => __('123 Mohammed V Boulevard', 'cityclub'),
                        'city' => __('Casablanca', 'cityclub'),
                        'phone' => __('+212-522-123456', 'cityclub'),
                        'hours' => __('Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub'),
                        'coordinates' => __('33.5731, -7.5898', 'cityclub'),
                        'amenities' => __('Pool, Sauna, Group Classes, Personal Training, Parking', 'cityclub'),
                    ],
                    [
                        'name' => __('Fitness Club Marrakech', 'cityclub'),
                        'address' => __('45 Avenue Hassan II', 'cityclub'),
                        'city' => __('Marrakech', 'cityclub'),
                        'phone' => __('+212-524-789012', 'cityclub'),
                        'hours' => __('Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub'),
                        'coordinates' => __('31.6295, -7.9811', 'cityclub'),
                        'amenities' => __('Group Classes, Personal Training, Spa, Juice Bar', 'cityclub'),
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->add_control(
            'show_search',
            [
                'label' => __('Show Search', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'show_cta',
            [
                'label' => __('Show CTA Section', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'cta_text',
            [
                'label' => __('CTA Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Want to know more about a specific location? Visit in person or call us directly.', 'cityclub'),
                'condition' => [
                    'show_cta' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'cta_button_text',
            [
                'label' => __('CTA Button Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Schedule a Visit', 'cityclub'),
                'condition' => [
                    'show_cta' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'cta_button_link',
            [
                'label' => __('CTA Button Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'show_cta' => 'yes',
                ],
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'cityclub'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#111827',
                'selectors' => [
                    '{{WRAPPER}} .location-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'description_color',
            [
                'label' => __('Description Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#4b5563',
                'selectors' => [
                    '{{WRAPPER}} .location-description' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label' => __('Accent Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f97316',
                'selectors' => [
                    '{{WRAPPER}} .accent-color' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .accent-bg' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .accent-border' => 'border-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .location-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Description Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .location-description',
            ]
        );

        $this->end_controls_section();

        // Map Style Section
        $this->start_controls_section(
            'section_map_style',
            [
                'label' => __('Map', 'cityclub'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'map_height',
            [
                'label' => __('Map Height', 'cityclub'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 200,
                        'max' => 1000,
                        'step' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 600,
                ],
                'selectors' => [
                    '{{WRAPPER}} .location-map-container' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'map_border',
                'label' => __('Map Border', 'cityclub'),
                'selector' => '{{WRAPPER}} .location-map-container',
            ]
        );

        $this->add_control(
            'map_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .location-map-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0.5',
                    'right' => '0.5',
                    'bottom' => '0.5',
                    'left' => '0.5',
                    'unit' => 'rem',
                    'isLinked' => true,
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'map_box_shadow',
                'label' => __('Box Shadow', 'cityclub'),
                'selector' => '{{WRAPPER}} .location-map-container',
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'section_button_style',
            [
                'label' => __('Buttons', 'cityclub'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_background_color',
            [
                'label' => __('Button Background Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f97316',
                'selectors' => [
                    '{{WRAPPER}} .location-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __('Button Text Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .location-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .location-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .location-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0.5',
                    'right' => '0.5',
                    'bottom' => '0.5',
                    'left' => '0.5',
                    'unit' => 'rem',
                    'isLinked' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $locations = $settings['locations'];
        
        if (empty($locations)) {
            return;
        }
        
        // Output HTML
        ?>
        <section class="cityclub-location-map-section py-24 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-10">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-12 bg-orange-500 rounded-full"></div>
                        <div class="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
                        <div class="h-1 w-1 bg-orange-500 rounded-full"></div>
                    </div>
                    <h2 class="location-title text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
                        <span class="relative inline-block">
                            <span class="relative z-10"><?php echo esc_html(explode(' ', $settings['title'])[0]); ?></span>
                            <span class="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
                        </span>
                        <?php echo esc_html(implode(' ', array_slice(explode(' ', $settings['title']), 1))); ?>
                    </h2>
                    <p class="location-description text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        <?php echo esc_html($settings['description']); ?>
                    </p>
                </div>

                <?php if ($settings['show_search'] === 'yes') : ?>
                    <div class="flex flex-col md:flex-row items-center justify-center gap-4 mb-8">
                        <form class="relative w-full max-w-m