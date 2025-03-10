<?php
/**
 * Hero Section Widget for Elementor
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Hero Section Widget.
 */
class CityClub_Hero_Section_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cityclub_hero_section';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CityClub Hero Section', 'cityclub' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-banner';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'cityclub-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'hero', 'banner', 'slider', 'cityclub', 'fitness' ];
	}

	/**
	 * Register widget controls.
	 */
	protected function register_controls() {
		// Content Section
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'REPRENEZ EN MAIN VOTRE SANTÉ', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your title', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Avec le bilan médico-sportif et nos 600+ coachs certifiés', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your subtitle', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'badge_text',
			[
				'label'       => esc_html__( 'Badge Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'PLUS DE 42 CLUBS AU MAROC', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter badge text', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'primary_button_text',
			[
				'label'       => esc_html__( 'Primary Button Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'REJOIGNEZ-NOUS', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter button text', 'cityclub' ),
			]
		);

		$this->add_control(
			'primary_button_link',
			[
				'label'       => esc_html__( 'Primary Button Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'               => '#membership',
					'is_external'        => false,
					'nofollow'           => false,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'secondary_button_text',
			[
				'label'       => esc_html__( 'Secondary Button Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'NOS COURS', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter button text', 'cityclub' ),
			]
		);

		$this->add_control(
			'secondary_button_link',
			[
				'label'       => esc_html__( 'Secondary Button Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'               => '#classes',
					'is_external'        => false,
					'nofollow'           => false,
					'custom_attributes' => '',
				],
			]
		);

		$this->end_controls_section();

		// Slides Section
		$this->start_controls_section(
			'section_slides',
			[
				'label' => esc_html__( 'Slides', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_title',
			[
				'label'       => esc_html__( 'Slide Title', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Slide Title', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_subtitle',
			[
				'label'       => esc_html__( 'Slide Subtitle', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Slide Subtitle', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_image',
			[
				'label'   => esc_html__( 'Background Image', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'location_id',
			[
				'label'       => esc_html__( 'Location ID', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'loc1', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter location ID', 'cityclub' ),
			]
		);

		$this->add_control(
			'slides',
			[
				'label'       => esc_html__( 'Slides', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'slide_title'    => esc_html__( 'REPRENEZ EN MAIN VOTRE SANTÉ', 'cityclub' ),
						'slide_subtitle' => esc_html__( 'Avec le bilan médico-sportif et nos 600+ coachs certifiés', 'cityclub' ),
						'location_id'    => 'loc1',
					],
					[
						'slide_title'    => esc_html__( 'Marrakech Medina', 'cityclub' ),
						'slide_subtitle' => esc_html__( 'Experience fitness with a view of the historic Medina', 'cityclub' ),
						'location_id'    => 'loc2',
					],
					[
						'slide_title'    => esc_html__( 'Rabat Agdal', 'cityclub' ),
						'slide_subtitle' => esc_html__( 'Modern facilities in the heart of the capital', 'cityclub' ),
						'location_id'    => 'loc3',
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => esc_html__( 'Autoplay', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'cityclub' ),
				'label_off'    => esc_html__( 'No', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'autoplay_speed',
			[
				'label'     => esc_html__( 'Autoplay Speed', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'min'       => 1000,
				'max'       => 10000,
				'step'      => 500,
				'default'   => 5000,
				'condition' => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// Location Selector Section
		$this->start_controls_section(
			'section_location_selector',
			[
				'label' => esc_html__( 'Location Selector', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_location_selector',
			[
				'label'        => esc_html__( 'Show Location Selector', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$location_repeater = new \Elementor\Repeater();

		$location_repeater->add_control(
			'location_id',
			[
				'label'       => esc_html__( 'Location ID', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'loc1', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter location ID', 'cityclub' ),
			]
		);

		$location_repeater->add_control(
			'location_name',
			[
				'label'       => esc_html__( 'Location Name', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'CityClub Casablanca Central', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter location name', 'cityclub' ),
				'label_block' => true,
			]
		);

		$location_repeater->add_control(
			'location_city',
			[
				'label'       => esc_html__( 'City', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Casablanca', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter city name', 'cityclub' ),
			]
		);

		$location_repeater->add_control(
			'location_address',
			[
				'label'       => esc_html__( 'Address', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '123 Mohammed V Boulevard', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter address', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'locations',
			[
				'label'       => esc_html__( 'Locations', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $location_repeater->get_controls(),
				'default'     => [
					[
						'location_id'      => 'loc1',
						'location_name'    => esc_html__( 'CityClub Casablanca Central', 'cityclub' ),
						'location_city'    => esc_html__( 'Casablanca', 'cityclub' ),
						'location_address' => esc_html__( '123 Mohammed V Boulevard', 'cityclub' ),
					],
					[
						'location_id'      => 'loc2',
						'location_name'    => esc_html__( 'CityClub Marrakech Medina', 'cityclub' ),
						'location_city'    => esc_html__( 'Marrakech', 'cityclub' ),
						'location_address' => esc_html__( '45 Jemaa el-Fnaa Square', 'cityclub' ),
					],
					[
						'location_id'      => 'loc3',
						'location_name'    => esc_html__( 'CityClub Rabat Agdal', 'cityclub' ),
						'location_city'    => esc_html__( 'Rabat', 'cityclub' ),
						'location_address' => esc_html__( '78 Hassan II Avenue', 'cityclub' ),
					],
				],
				'title_field' => '{{{ location_name }}}',
				'condition'   => [
					'show_location_selector' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// Style Tab
		$this->start_controls_section(
			'section_style_general',
			[
				'label' => esc_html__( 'General', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'hero_height',
			[
				'label'      => esc_html__( 'Height', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh', '%' ],
				'range'      => [
					'px' => [
						'min'  => 300,
						'max'  => 1200,
						'step' => 10,
					],
					'vh' => [
						'min' => 30,
						'max' => 100,
					],
					'%'  => [
						'min' => 30,
						'max' => 100,
					],
				],
				'default'    => [
					'unit' => 'vh',
					'size' => 100,
				],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-hero-section' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label'     => esc_html__( 'Overlay Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(0, 0, 0, 0.5)',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-slide-overlay' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Typography Style Section
		$this->start_controls_section(
			'section_style_typography',
			[
				'label' => esc_html__( 'Typography', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .cityclub-hero-title',
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Subtitle Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-subtitle' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'subtitle_typography',
				'selector' => '{{WRAPPER}} .cityclub-hero-subtitle',
			]
		);

		$this->add_control(
			'badge_color',
			[
				'label'     => esc_html__( 'Badge Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-badge' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'badge_background',
			[
				'label'     => esc_html__( 'Badge Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(0, 0, 0, 0.3)',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-badge' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'badge_typography',
				'selector' => '{{WRAPPER}} .cityclub-hero-badge',
			]
		);

		$this->end_controls_section();

		// Buttons Style Section
		$this->start_controls_section(
			'section_style_buttons',
			[
				'label' => esc_html__( 'Buttons', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		// Primary Button Tab
		$this->start_controls_tab(
			'tab_primary_button',
			[
				'label' => esc_html__( 'Primary', 'cityclub' ),
			]
		);

		$this->add_control(
			'primary_button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-button-primary' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'primary_button_background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cityclub-hero-button-primary',
				'default'  => [
					'type'     => 'gradient',
					'gradient' => [
						'start'  => '#f97316',
						'end'    => '#ea580c',
						'angle'  => 90,
						'type'   => 'linear',
						'repeat' => 'no-repeat',
					],
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'primary_button_border',
				'selector' => '{{WRAPPER}} .cityclub-hero-button-primary',
			]
		);

		$this->add_control(
			'primary_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-hero-button-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 10,
					'right'  => 10,
					'bottom' => 10,
					'left'   => 10,
					'unit'   => 'px',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'primary_button_box_shadow',
				'selector' => '{{WRAPPER}} .cityclub-hero-button-primary',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'primary_button_typography',
				'selector' => '{{WRAPPER}} .cityclub-hero-button-primary',
			]
		);

		$this->add_responsive_control(
			'primary_button_padding',
			[
				'label'      => esc_html__( 'Padding', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-hero-button-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 15,
					'right'  => 30,
					'bottom' => 15,
					'left'   => 30,
					'unit'   => 'px',
				],
			]
		);

		$this->end_controls_tab();

		// Secondary Button Tab
		$this->start_controls_tab(
			'tab_secondary_button',
			[
				'label' => esc_html__( 'Secondary', 'cityclub' ),
			]
		);

		$this->add_control(
			'secondary_button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-button-secondary' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'secondary_button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.1)',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-button-secondary' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'secondary_button_border',
				'selector' => '{{WRAPPER}} .cityclub-hero-button-secondary',
				'default'  => [
					'border' => [
						'width' => 2,
						'color' => '#ffffff',
						'style' => 'solid',
					],
				],
			]
		);

		$this->add_control(
			'secondary_button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-hero-button-secondary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 10,
					'right'  => 10,
					'bottom' => 10,
					'left'   => 10,
					'unit'   => 'px',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'secondary_button_box_shadow',
				'selector' => '{{WRAPPER}} .cityclub-hero-button-secondary',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'secondary_button_typography',
				'selector' => '{{WRAPPER}} .cityclub-hero-button-secondary',
			]
		);

		$this->add_responsive_control(
			'secondary_button_padding',
			[
				'label'      => esc_html__( 'Padding', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-hero-button-secondary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 15,
					'right'  => 30,
					'bottom' => 15,
					'left'   => 30,
					'unit'   => 'px',
				],
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

		// Navigation Style Section
		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => esc_html__( 'Navigation', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label'     => esc_html__( 'Arrows Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-arrow' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrows_background_color',
			[
				'label'     => esc_html__( 'Arrows Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.1)',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-arrow' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrows_hover_color',
			[
				'label'     => esc_html__( 'Arrows Hover Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-arrow:hover' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'arrows_hover_background_color',
			[
				'label'     => esc_html__( 'Arrows Hover Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f97316',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-arrow:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'dots_color',
			[
				'label'     => esc_html__( 'Dots Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.3)',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-dot' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'dots_active_color',
			[
				'label'     => esc_html__( 'Active Dot Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f97316',
				'selectors' => [
					'{{WRAPPER}} .cityclub-hero-dot.active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Location Selector Style Section
		$this->start_controls_section(
			'section_style_location_selector',
			[
				'label'     => esc_html__( 'Location Selector', 'cityclub' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_location_selector' => 'yes',
				],
			]
		);

		$this->add_control(
			'location_selector_background',
			[
				'label'     => esc_html__( 'Background Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => 'rgba(255, 255, 255, 0.9)',
				'selectors' => [
					'{{WRAPPER}} .cityclub-location-selector' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'location_selector_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#333333',
				'selectors' => [
					'{{WRAPPER}} .cityclub-location-selector' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'location_selector_typography',
				'selector' => '{{WRAPPER}} .cityclub-location-selector',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'location_selector_border',
				'selector' => '{{WRAPPER}} .cityclub-location-selector',
			]
		);

		$this->add_control(
			'location_selector_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-location-selector' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 8,
					'right'  => 8,
					'bottom' => 8,
					'left'   => 8,
					'unit'   => 'px',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name'     => 'location_selector_box_shadow',
				'selector' => '{{WRAPPER}} .cityclub-location-selector',
			]
		);

		$this->add_responsive_control(
			'location_selector_padding',
			[
				'label'      => esc_html__( 'Padding', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-location-selector' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 10,
					'right'  => 15,
					'bottom' => 10,
					'left'   => 15,
					'unit'   => 'px',
				],
			]
		);

		$this->add_responsive_control(
			'location_selector_margin',
			[
				'label'      => esc_html__( 'Margin', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-location-selector-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render widget output on the frontend.
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Hero Section Container
		?>
		<div class="cityclub-hero-section relative w-full bg-gray-900 overflow-hidden">
			<!-- Background Slides -->
			<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
				<div class="cityclub-hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo 0 === $index ? 'opacity-100' : 'opacity-0'; ?>" data-slide-index="<?php echo esc_attr( $index ); ?>" data-location-id="<?php echo esc_attr( $slide['location_id'] ); ?>">
					<div class="cityclub-hero-slide-bg absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url( $slide['slide_image']['url'] ); ?>');"></div>
					<div class="cityclub-hero-slide-overlay absolute inset-0"></div>
				</div>
			<?php endforeach; ?>

			<!-- Content -->
			<div class="cityclub-hero-content relative h-full flex flex-col justify-center items-center text-white px-4 z-10">
				<div class="max-w-5xl mx-auto text-center mb-8">
					<div class="cityclub-hero-badge inline-block bg-black/30 backdrop-blur-md px-6 py-2 rounded-full mb-8 animate-pulse-slow border border-white/20">
						<span class="text-sm md:text-base font-medium tracking-wider">
							<?php echo esc_html( $settings['badge_text'] ); ?>
						</span>
					</div>

					<div class="overflow-hidden mb-2">
						<h1 class="cityclub-hero-title text-6xl md:text-8xl font-black mb-2 animate-text-reveal" style="animation-delay: 300ms;">
							<?php echo esc_html( $settings['title'] ); ?>
						</h1>
					</div>

					<div class="overflow-hidden mb-8">
						<div class="animate-text-reveal" style="animation-delay: 600ms;">
							<div class="text-6xl md:text-7xl font-black bg-clip-text text-transparent bg-gradient-to-r from-orange-500 via-teal-400 to-orange-500 animate-gradient-x">
								CITY<span class="text-teal-400">CLUB</span>
								<span class="text-orange-500 text-xs align-super">+</span>
							</div>
						</div>
					</div>

					<div class="overflow-hidden mb-10">
						<p class="cityclub-hero-subtitle text-xl md:text-2xl max-w-2xl mx-auto font-light animate-text-reveal" style="animation-delay: 900ms;">
							<?php echo esc_html( $settings['subtitle'] ); ?>
						</p>
					</div>

					<div class="flex flex-col sm:flex-row justify-center gap-4">
						<a href="<?php echo esc_url( $settings['primary_button_link']['url'] ); ?>" class="cityclub-hero-button-primary bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-6 px-10 rounded-xl relative overflow-hidden group transition-all duration-300 hover:shadow-xl hover:shadow-orange-500/30 hover:scale-105 text-lg">
							<span class="relative z-10 flex items-center">
								<?php echo esc_html( $settings['primary_button_text'] ); ?> <span class="ml-2">→</span>
							</span>
							<span class="absolute top-0 -left-[100%] w-[120%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[25deg] animate-[glint_3s_ease-in-out_infinite_alternate]"></span>
						</a>

						<a href="<?php echo esc_url( $settings['secondary_button_link']['url'] ); ?>" class="cityclub-hero-button-secondary backdrop-blur-md bg-white/10 border-2 border-white/50 text-white hover:bg-white hover:text-gray-900 font-bold py-6 px-10 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-white/30 hover:scale-105 text-lg">
							<span class="relative z-10 flex items-center">
								<?php echo esc_html( $settings['secondary_button_text'] ); ?> <span class="ml-2">→</span>
							</span>
						</a>
					</div>
				</div>

				<?php if ( 'yes' === $settings['show_location_selector'] ) : ?>
					<!-- Location Selector -->
					<div class="cityclub-location-selector-wrapper absolute bottom-16 left-0 right-0 mx-auto max-w-3xl px-4">
						<div class="cityclub-location-selector flex flex-col sm:flex-row items-center gap-2 bg-white rounded-lg p-2 shadow-md">
							<div class="flex items-center gap-2 text-gray-700 font-medium">
								<i class="fas fa-map-marker-alt text-primary"></i>
								<span>Choisir un Club:</span>
							</div>

							<div class="w-full sm:w-64">
								<select class="cityclub-location-dropdown w-full bg-white border-gray-300 focus:ring-primary rounded-md p-2" data-location-selector>
									<?php foreach ( $settings['locations'] as $location ) : ?>
										<option value="<?php echo esc_attr( $location['location_id'] ); ?>">
											<?php echo esc_html( $location['location_name'] ); ?> - <?php echo esc_html( $location['location_city'] ); ?>
										</option>
									<?php endforeach; ?>
								</select>
							</div>

							<button class="cityclub-location-button bg-primary hover:bg-primary/90 text-white whitespace-nowrap relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 py-2 px-4 rounded-md">
								<span class="relative z-10">ITINÉRAIRE</span>
								<span class="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
							</button>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<!-- Navigation Arrows -->
			<button class="cityclub-hero-arrow cityclub-hero-prev absolute left-6 top-1/2 transform -translate-y-1/2 bg-white/10 backdrop-blur-sm hover:bg-orange-500 text-white p-3 rounded-full z-20 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-orange-500/50 border border-white/20">
				<i class="fas fa-chevron-left"></i>
			</button>
			<button class="cityclub-hero-arrow cityclub-hero-next absolute right-6 top-1/2 transform -translate-y-1/2 bg-white/10 backdrop-blur-sm hover:bg-orange-500 text-white p-3 rounded-full z-20 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-orange-500/50 border border-white/20">
				<i class="fas fa-chevron-right"></i>
			</button>

			<!-- Slide Indicators -->
			<div class="absolute bottom-40 left-0 right-0 flex justify-center gap-3 z-20">
				<?php foreach ( $settings['slides'] as $index => $slide ) : ?>
					<button class="cityclub-hero-dot h-3 rounded-full transition-all <?php echo 0 === $index ? 'active bg-orange-500 w-8 shadow-lg shadow-orange-500/50' : 'bg-white/30 w-3 hover:bg-white/60'; ?>" data-slide-index="<?php echo esc_attr( $index ); ?>"></button>
				<?php endforeach; ?>
			</div>
		</div>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const heroSection = document.querySelector('.cityclub-hero-section');
				const slides = heroSection.querySelectorAll('.cityclub-hero-slide');
				const dots = heroSection.querySelectorAll('.cityclub-hero-dot');
				const prevBtn = heroSection.querySelector('.cityclub-hero-prev');
				const nextBtn = heroSection.querySelector('.cityclub-hero-next');
				const locationSelector = heroSection.querySelector('[data-location-selector]');
				
				let currentSlide = 0;
				let isAutoPlaying = <?php echo 'yes' === $settings['autoplay'] ? 'true' : 'false'; ?>;
				let autoplayInterval;
				
				// Function to show a specific slide
				function showSlide(index) {
					slides.forEach((slide, i) => {
						slide.classList.toggle('opacity-0', i !== index);
						slide.classList.toggle('opacity-100', i === index);
					});
					
					dots.forEach((dot, i) => {
						dot.classList.toggle('active', i === index);
						dot.classList.toggle('bg-orange-500', i === index);
						dot.classList.toggle('w-8', i === index);
						dot.classList.toggle('shadow-lg', i === index);
						dot.classList.toggle('shadow-orange-500/50', i === index);
						dot.classList.toggle('bg-white/30', i !== index);
						dot.classList.toggle('w-3', i !== index);
					});
					
					currentSlide = index;
					
					// Update location selector if it exists
					if (locationSelector) {
						const locationId = slides[index].getAttribute('data-location-id');
						locationSelector.value = locationId;
					}
				}
				
				// Next slide function
				function nextSlide() {
					let next = currentSlide + 1;
					if (next >= slides.length) next = 0;
					showSlide(next);
				}
				
				// Previous slide function
				function prevSlide() {
					let prev = currentSlide - 1;
					if (prev < 0) prev = slides.length - 1;
					showSlide(prev);
				}
				
				// Set up autoplay
				function startAutoplay() {
					if (isAutoPlaying) {
						autoplayInterval = setInterval(() => {
							nextSlide();
						}, <?php echo absint( $settings['autoplay_speed'] ); ?>);
					}
				}
				
				function stopAutoplay() {
					clearInterval(autoplayInterval);
				}
				
				// Event listeners
				prevBtn.addEventListener('click', () => {
					prevSlide();
					stopAutoplay();
					isAutoPlaying = false;
				});
				
				nextBtn.addEventListener('click', () => {
					nextSlide();
					stopAutoplay();
					isAutoPlaying = false;
				});
				
				dots.forEach((dot, index) => {
					dot.addEventListener('click', () => {
						showSlide(index);
						stopAutoplay();
						isAutoPlaying = false;
					});
				});
				
				// Location selector change event
				if (locationSelector) {
					locationSelector.addEventListener('change', () => {
						const selectedLocationId = locationSelector.value;
						slides.forEach((slide, index) => {
							if (slide.getAttribute('data-location-id') === selectedLocationId) {
								showSlide(index);
								stopAutoplay();
								isAutoPlaying = false;
							}
						});
					});
				}
				
				// Initialize
				startAutoplay();
				
				// Resume autoplay after inactivity
				let inactivityTimeout;
				function resetInactivityTimer() {
					clearTimeout(inactivityTimeout);
					inactivityTimeout = setTimeout(() => {
						isAutoPlaying = true;
						startAutoplay();
					}, 10000); // Resume autoplay after 10 seconds of inactivity
				}
				
				// Reset inactivity timer on user interaction
				heroSection.addEventListener('click', resetInactivityTimer);
				heroSection.addEventListener('touchstart', resetInactivityTimer);
			});
		</script>
		<?php
	}
}
