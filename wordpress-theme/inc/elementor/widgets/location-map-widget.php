<?php
/**
 * Location Map Widget for Elementor
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Location Map Widget.
 */
class CityClub_Location_Map_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cityclub_location_map';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CityClub Location Map', 'cityclub' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-map-pin';
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
		return [ 'map', 'location', 'club', 'cityclub' ];
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
				'default'     => esc_html__( 'Find a Club Near You', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your title', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'With over 20 locations across Morocco, there\'s always a Fitness Club nearby. Use the map to find your nearest club and explore its amenities.', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your description', 'cityclub' ),
				'rows'        => 5,
			]
		);

		$this->add_control(
			'show_search',
			[
				'label'        => esc_html__( 'Show Search', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'search_placeholder',
			[
				'label'       => esc_html__( 'Search Placeholder', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Rechercher par ville ou code postal', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter search placeholder', 'cityclub' ),
				'condition'   => [
					'show_search' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_nearest_button',
			[
				'label'        => esc_html__( 'Show "Find Nearest Club" Button', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'nearest_button_text',
			[
				'label'       => esc_html__( 'Nearest Button Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Trouver le Club le Plus Proche', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter button text', 'cityclub' ),
				'condition'   => [
					'show_nearest_button' => 'yes',
				],
			]
		);

		$this->add_control(
			'show_all_clubs_link',
			[
				'label'        => esc_html__( 'Show "View All Clubs" Link', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'all_clubs_text',
			[
				'label'       => esc_html__( 'All Clubs Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Voir Tous les Clubs', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter link text', 'cityclub' ),
				'condition'   => [
					'show_all_clubs_link' => 'yes',
				],
			]
		);

		$this->add_control(
			'all_clubs_link',
			[
				'label'       => esc_html__( 'All Clubs Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'               => '#',
					'is_external'        => false,
					'nofollow'           => false,
					'custom_attributes' => '',
				],
				'condition'   => [
					'show_all_clubs_link' => 'yes',
				],
			]
		);

		$this->add_control(
			'map_height',
			[
				'label'      => esc_html__( 'Map Height', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 200,
						'max'  => 1000,
						'step' => 10,
					],
				],
				'default'    => [
					'unit' => 'px',
					'size' => 600,
				],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-location-map' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'map_image',
			[
				'label'       => esc_html__( 'Map Background Image', 'cityclub' ),
				'description' => esc_html__( 'This is a placeholder for the map. In a real implementation, you would use Google Maps or another mapping service.', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::MEDIA,
				'default'     => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->end_controls_section();

		// Locations Section
		$this->start_controls_section(
			'section_locations',
			[
				'label' => esc_html__( 'Locations', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name',
			[
				'label'       => esc_html__( 'Club Name', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Fitness Club Casablanca Central', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'address',
			[
				'label'       => esc_html__( 'Address', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '123 Mohammed V Boulevard', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'city',
			[
				'label'   => esc_html__( 'City', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Casablanca', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'phone',
			[
				'label'   => esc_html__( 'Phone', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '+212-522-123456', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'hours',
			[
				'label'       => esc_html__( 'Hours', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'lat',
			[
				'label'       => esc_html__( 'Latitude', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '33.5731',
				'description' => esc_html__( 'For demonstration purposes only. In a real implementation, this would be used with a mapping API.', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'lng',
			[
				'label'       => esc_html__( 'Longitude', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => '-7.5898',
				'description' => esc_html__( 'For demonstration purposes only. In a real implementation, this would be used with a mapping API.', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'amenities',
			[
				'label'       => esc_html__( 'Amenities', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Pool, Sauna, Group Classes, Personal Training, Parking', 'cityclub' ),
				'label_block' => true,
				'description' => esc_html__( 'Comma separated list of amenities', 'cityclub' ),
			]
		);

		$this->add_control(
			'locations',
			[
				'label'       => esc_html__( 'Locations', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'name'      => esc_html__( 'Fitness Club Casablanca Central', 'cityclub' ),
						'address'   => esc_html__( '123 Mohammed V Boulevard', 'cityclub' ),
						'city'      => esc_html__( 'Casablanca', 'cityclub' ),
						'phone'     => esc_html__( '+212-522-123456', 'cityclub' ),
						'hours'     => esc_html__( 'Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub' ),
						'lat'       => '33.5731',
						'lng'       => '-7.5898',
						'amenities' => esc_html__( 'Pool, Sauna, Group Classes, Personal Training, Parking', 'cityclub' ),
					],
					[
						'name'      => esc_html__( 'Fitness Club Marrakech', 'cityclub' ),
						'address'   => esc_html__( '45 Avenue Hassan II', 'cityclub' ),
						'city'      => esc_html__( 'Marrakech', 'cityclub' ),
						'phone'     => esc_html__( '+212-524-789012', 'cityclub' ),
						'hours'     => esc_html__( 'Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub' ),
						'lat'       => '31.6295',
						'lng'       => '-7.9811',
						'amenities' => esc_html__( 'Group Classes, Personal Training, Spa, Juice Bar', 'cityclub' ),
					],
					[
						'name'      => esc_html__( 'Fitness Club Rabat', 'cityclub' ),
						'address'   => esc_html__( '78 Avenue Mohammed VI', 'cityclub' ),
						'city'      => esc_html__( 'Rabat', 'cityclub' ),
						'phone'     => esc_html__( '+212-537-345678', 'cityclub' ),
						'hours'     => esc_html__( 'Mon-Fri: 6am-10pm, Sat-Sun: 8am-8pm', 'cityclub' ),
						'lat'       => '34.0209',
						'lng'       => '-6.8416',
						'amenities' => esc_html__( 'Pool, Group Classes, Personal Training, Childcare', 'cityclub' ),
					],
				],
				'title_field' => '{{{ name }}}',
			]
		);

		$this->end_controls_section();

		// CTA Section
		$this->start_controls_section(
			'section_cta',
			[
				'label' => esc_html__( 'Call to Action', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'show_cta',
			[
				'label'        => esc_html__( 'Show CTA Section', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'cta_text',
			[
				'label'       => esc_html__( 'CTA Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Want to know more about a specific location? Visit in person or call us directly.', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter CTA text', 'cityclub' ),
				'label_block' => true,
				'condition'   => [
					'show_cta' => 'yes',
				],
			]
		);

		$this->add_control(
			'cta_button_text',
			[
				'label'       => esc_html__( 'Button Text', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Programmer une Visite', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter button text', 'cityclub' ),
				'condition'   => [
					'show_cta' => 'yes',
				],
			]
		);

		$this->add_control(
			'cta_button_link',
			[
				'label'       => esc_html__( 'Button Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'               => '#',
					'is_external'        => false,
					'nofollow'           => false,
					'custom_attributes' => '',
				],
				'condition'   => [
					'show_cta' => 'yes',
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

		$this->add_control(
			'section_background',
			[
				'label'     => esc_html__( 'Section Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-location-section' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'section_padding',
			[
				'label'      => esc_html__( 'Section Padding', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-location-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 80,
					'right'  => 20,
					'bottom' => 80,
					'left'   => 20,
					'unit'   => 'px',
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
				'default'   => '#1f2937',
				'selectors' => [
					'{{WRAPPER}} .cityclub-location-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .cityclub-location-title',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Description Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#6b7280',
				'selectors' => [
					'{{WRAPPER}} .cityclub-location-description' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .cityclub-location-description',
			]
		);

		$this->end_controls_section();

		// Map Style Section
		$this->start_controls_section(
			'section_style_map',
			[
				'label' => esc_html__( 'Map', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'map_background',
			[
				'label'     => esc_html__( 'Map Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f3f4f6',
				'selectors'