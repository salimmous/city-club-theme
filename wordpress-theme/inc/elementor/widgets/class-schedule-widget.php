<?php
/**
 * Class Schedule Widget for Elementor
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class Schedule Widget.
 */
class CityClub_Class_Schedule_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cityclub_class_schedule';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CityClub Class Schedule', 'cityclub' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-calendar';
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
		return [ 'schedule', 'class', 'fitness', 'cityclub' ];
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
				'default'     => esc_html__( 'Class Schedules', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your title', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Find the perfect class for your fitness journey. Filter by day, type, or level to discover classes that match your interests and schedule.', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your description', 'cityclub' ),
				'rows'        => 5,
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

		$this->add_control(
			'show_all_classes_link',
			[
				'label'        => esc_html__( 'Show "View All Classes" Button', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'all_classes_link',
			[
				'label'       => esc_html__( 'All Classes Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'               => '#',
					'is_external'        => false,
					'nofollow'           => false,
					'custom_attributes' => '',
				],
				'condition'   => [
					'show_all_classes_link' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// Classes Section
		$this->start_controls_section(
			'section_classes',
			[
				'label' => esc_html__( 'Classes', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'class_name',
			[
				'label'       => esc_html__( 'Class Name', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Power Yoga', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'instructor',
			[
				'label'       => esc_html__( 'Instructor', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Sarah Ahmed', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'time',
			[
				'label'   => esc_html__( 'Time', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '07:00', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'duration',
			[
				'label'   => esc_html__( 'Duration', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '60 min', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'location',
			[
				'label'       => esc_html__( 'Location', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Casablanca Downtown', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'capacity',
			[
				'label'   => esc_html__( 'Capacity', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => 20,
			]
		);

		$repeater->add_control(
			'enrolled',
			[
				'label'   => esc_html__( 'Enrolled', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 100,
				'step'    => 1,
				'default' => 15,
			]
		);

		$repeater->add_control(
			'type',
			[
				'label'   => esc_html__( 'Class Type', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Yoga', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'level',
			[
				'label'   => esc_html__( 'Level', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'Intermediate',
				'options' => [
					'Beginner'     => esc_html__( 'Beginner', 'cityclub' ),
					'Intermediate' => esc_html__( 'Intermediate', 'cityclub' ),
					'Advanced'     => esc_html__( 'Advanced', 'cityclub' ),
				],
			]
		);

		$repeater->add_control(
			'day',
			[
				'label'   => esc_html__( 'Day', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'Monday',
				'options' => [
					'Monday'    => esc_html__( 'Monday', 'cityclub' ),
					'Tuesday'   => esc_html__( 'Tuesday', 'cityclub' ),
					'Wednesday' => esc_html__( 'Wednesday', 'cityclub' ),
					'Thursday'  => esc_html__( 'Thursday', 'cityclub' ),
					'Friday'    => esc_html__( 'Friday', 'cityclub' ),
					'Saturday'  => esc_html__( 'Saturday', 'cityclub' ),
					'Sunday'    => esc_html__( 'Sunday', 'cityclub' ),
				],
			]
		);

		$this->add_control(
			'classes',
			[
				'label'       => esc_html__( 'Classes', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'class_name' => esc_html__( 'Power Yoga', 'cityclub' ),
						'instructor' => esc_html__( 'Sarah Ahmed', 'cityclub' ),
						'time'       => '07:00',
						'duration'   => '60 min',
						'location'   => 'Casablanca Downtown',
						'capacity'   => 20,
						'enrolled'   => 15,
						'type'       => 'Yoga',
						'level'      => 'Intermediate',
						'day'        => 'Monday',
					],
					[
						'class_name' => esc_html__( 'HIIT Circuit', 'cityclub' ),
						'instructor' => esc_html__( 'Mohammed Khalid', 'cityclub' ),
						'time'       => '18:30',
						'duration'   => '45 min',
						'location'   => 'Casablanca Downtown',
						'capacity'   => 15,
						'enrolled'   => 12,
						'type'       => 'Cardio',
						'level'      => 'Advanced',
						'day'        => 'Monday',
					],
					[
						'class_name' => esc_html__( 'Beginner Pilates', 'cityclub' ),
						'instructor' => esc_html__( 'Leila Benali', 'cityclub' ),
						'time'       => '10:00',
						'duration'   => '50 min',
						'location'   => 'Rabat Central',
						'capacity'   => 12,
						'enrolled'   => 8,
						'type'       => 'Pilates',
						'level'      => 'Beginner',
						'day'        => 'Tuesday',
					],
				],
				'title_field' => '{{{ class_name }}}',
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
					'{{WRAPPER}} .cityclub-schedule-section' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .cityclub-schedule-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cityclub-schedule-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .cityclub-schedule-title',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Description Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#6b7280',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-subtitle' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .cityclub-schedule-subtitle',
			]
		);

		$this->end_controls_section();

		// Tabs Style Section
		$this->start_controls_section(
			'section_style_tabs',
			[
				'label' => esc_html__( 'Tabs', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'tabs_background',
			[
				'label'     => esc_html__( 'Tabs Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f3f4f6',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-tabs' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'tab_text_color',
			[
				'label'     => esc_html__( 'Tab Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#4b5563',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-tab' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'active_tab_text_color',
			[
				'label'     => esc_html__( 'Active Tab Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-tab.active' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'active_tab_background',
			[
				'label'     => esc_html__( 'Active Tab Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f97316',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-tab.active' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'tab_typography',
				'selector' => '{{WRAPPER}} .cityclub-schedule-tab',
			]
		);

		$this->add_control(
			'tab_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-schedule-tab' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 50,
					'right'  => 50,
					'bottom' => 50,
					'left'   => 50,
					'unit'   => 'px',
				],
			]
		);

		$this->end_controls_section();

		// Cards Style Section
		$this->start_controls_section(
			'section_style_cards',
			[
				'label' => esc_html__( 'Class Cards', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'card_background',
			[
				'label'     => esc_html__( 'Card Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-card' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'card_border',
				'selector' => '{{WRAPPER}} .cityclub-schedule-card',
			]
		);

		$this->add_control(
			'card_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-schedule-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name'     => 'card_box_shadow',
				'selector' => '{{WRAPPER}} .cityclub-schedule-card',
			]
		);

		$this->add_control(
			'card_title_color',
			[
				'label'     => esc_html__( 'Card Title Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#1f2937',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-card-title' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'card_title_typography',
				'selector' => '{{WRAPPER}} .cityclub-schedule-card-title',
			]
		);

		$this->add_control(
			'card_info_color',
			[
				'label'     => esc_html__( 'Card Info Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#6b7280',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-card-info' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'card_info_typography',
				'selector' => '{{WRAPPER}} .cityclub-schedule-card-info',
			]
		);

		$this->add_control(
			'badge_background',
			[
				'label'     => esc_html__( 'Badge Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f97316',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-card-badge' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'badge_text_color',
			[
				'label'     => esc_html__( 'Badge Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-card-badge' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Button Style Section
		$this->start_controls_section(
			'section_style_button',
			[
				'label'     => esc_html__( 'Button', 'cityclub' ),
				'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
				'condition' => [
					'show_all_classes_link' => 'yes',
				],
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f97316',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'button_background_color',
			[
				'label'     => esc_html__( 'Background Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-schedule-button' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'button_border',
				'selector' => '{{WRAPPER}} .cityclub-schedule-button',
				'default'  => [
					'border' => [
						'width' => 1,
						'color' => '#f97316',
						'style' => 'solid',
					],
				],
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-schedule-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'name'     => 'button_box_shadow',
				'selector' => '{{WRAPPER}} .cityclub-schedule-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .cityclub-schedule-button',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => esc_html__( 'Padding', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-schedule-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'default'    => [
					'top'    => 12,
					'right'  => 24,
					'bottom' => 12,
					'left'   => 24,
					'unit'   => 'px',
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

		// Get unique days from classes
		$days = [];
		foreach ( $settings['classes'] as $class ) {
			if ( ! in_array( $class['day'], $days, true ) ) {
				$days[] = $class['day'];
			}
		}

		// Sort days in correct order
		$day_order = [
			'Monday',
			'Tuesday',
			'Wednesday',
			'Thursday',
			'Friday',
			'Saturday',
			'Sunday',
		];

		usort( $days, function ( $a, $b ) use ( $day_order ) {
			return array_search( $a, $day_order ) - array_search( $b, $day_order );
		} );

		// Get unique locations
		$locations = [];
		foreach ( $settings['classes'] as $class ) {
			if ( ! in_array( $class['location'], $locations, true ) ) {
				$locations[] = $class['location'];
			}
		}
		sort( $locations );

		?>
		<section class="cityclub-schedule-section py-24 px-4 md:px-8 bg-white">
			<div class="max-w-7xl mx-auto">
				<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-6">
					<div class="max-w-2xl">
						<div class="inline-block bg-orange-500/10 px-4 py-1 rounded-full mb-4">
							<span class="text-sm font-medium tracking-wider text-orange-600 flex items-center">
								<i class="fas fa-dumbbell mr-2"></i> PROGRAMMES VARIÉS
							</span>
						</div>
						<h2 class="cityclub-schedule-title text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
							<span class="relative inline-block">
								<span class="relative z-10"><?php echo esc_html( explode( ' ', $settings['title'] )[0] ); ?></span>
								<span class="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
							</span>
							<?php echo esc_html( implode( ' ', array_slice( explode( ' ', $settings['title'] ), 1 ) ) ); ?>
						</h2>
						<p class="cityclub-schedule-subtitle text-gray-600 text-lg leading-relaxed max-w-2xl">
							<?php echo esc_html( $settings['description'] ); ?>
						</p>
					</div>

					<?php if ( 'yes' === $settings['show_location_selector'] ) : ?>
						<div class="w-full md:w-auto">
							<div class="cityclub-location-selector flex flex-col sm:flex-row items-center gap-2 bg-white rounded-lg p-2 shadow-md">
								<div class="flex items-center gap-2 text-gray-700 font-medium">
									<i class="fas fa-map-marker-alt text-primary"></i>
									<span>Choisir un Club:</span>
								</div>

								<div class="w-full sm:w-64">
									<select class="cityclub-location-dropdown w-full bg-white border-gray-300 focus:ring-primary rounded-md p-2" data-location-filter>
										<option value="all">Tous les clubs</option>
										<?php foreach ( $locations as $location ) : ?>
											<option value="<?php echo esc_attr( $location ); ?>">
												<?php echo esc_html( $location ); ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					<?php endif; ?>
				</div>

				<div class="bg-white rounded-xl shadow-md overflow-hidden">
					<!-- Tabs -->
					<div class="cityclub-schedule-tabs flex overflow-x-auto bg-gray-100 p-1 rounded-t-xl">
						<?php foreach ( $days as $index => $day ) : ?>
							<button class="cityclub-schedule-tab flex-1 min-w-[100px] py-2 px-4 <?php echo 0 === $index ? 'active' : ''; ?>" data-day="<?php echo esc_attr( $day ); ?>">
								<?php echo esc_html( $day ); ?>
							</button>
						<?php endforeach; ?>
					</div>

					<!-- Content -->
					<?php foreach ( $days as $index => $day ) : ?>
						<div class="cityclub-schedule-content p-6 <?php echo 0 !== $index ? 'hidden' : ''; ?>" data-day-content="<?php echo esc_attr( $day ); ?>">
							<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
								<?php
								$day_classes = array_filter(
									$settings['classes'],
									function( $class ) use ( $day ) {
										return $class['day'] === $day;
									}
								);

								if ( ! empty( $day_classes ) ) :
									foreach ( $day_classes as $class ) :
										?>
										<div class="cityclub-schedule-card overflow-hidden border-l-4 border-l-primary hover:shadow-lg transition-shadow duration-300 group" data-location="<?php echo esc_attr( $class['location'] ); ?>">
											<div class="cityclub-schedule-card-header">
												<h4 class="cityclub-schedule-card-title font-bold text-lg"><?php echo esc_html( $class['class_name'] ); ?></h4>
												<span class="cityclub-schedule-card-badge">
													<?php
													if ( $class['enrolled'] >= $class['capacity'] ) :
														echo esc_html__( 'Full', 'cityclub' );
													else :
														echo esc_html( $class['enrolled'] ) . '/' . esc_html( $class['capacity'] );
													endif;
													?>
												</span>
											</div>
											<div class="cityclub-schedule-card-body">
												<div class="cityclub-schedule-card-info flex items-center text-sm text-gray-600 mb-1">
													<i class="fas fa-clock mr-1"></i>
													<span>
														<?php echo esc_html( $class['time'] ); ?> • <?php echo esc_html( $class['duration'] ); ?>
													</span>
												</div>

												<div class="cityclub-schedule-card-info flex items-center text-sm text-gray-600 mb-1">
													<i class="fas fa-map-marker-alt mr-1"></i>
													<span><?php echo esc_html( $class['location'] ); ?></span>
												</div>

												<div class="cityclub-schedule-card-info flex items-center text-sm text-gray-600 mb-3">
													<i class="fas fa-user mr-1"></i>
													<span><?php echo esc_html( $class['instructor'] ); ?></span>
												</div>

												<div class="flex items-center justify-between mt-4">
													<div class="flex gap-2">
														<span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded"><?php echo esc_html( $class['type'] ); ?></span>
														<span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded"><?php echo esc_html( $class['level'] ); ?></span>
													</div>
													<button class="px-3 py-1 bg-gradient-to-r from-orange-500 to-orange-600 text-white text-sm font-semibold rounded group-hover:shadow-md transition-all duration-300 group-hover:scale-105 <?php echo $class['enrolled'] >= $class['capacity'] ? 'opacity-50 cursor-not-allowed' : ''; ?>">
														<?php echo $class['enrolled'] >= $class['capacity'] ? esc_html__( "Liste d'attente", 'cityclub' ) : esc_html__( 'Réserver', 'cityclub' ); ?>
													</button>
												</div>
											</div>
										</div>
										<?php
									endforeach;
								else :
									?>
									<div class="col-span-full text-center py-12 bg-gray-50 rounded-lg">
										<i class="fas fa-calendar text-gray-400 text-4xl mb-4"></i>
										<h3 class="text-xl font-medium text-gray-700 mb-2">
											<?php echo esc_html__( 'No Classes Available', 'cityclub' ); ?>
										</h3>
										<p class="text-gray-500 max-w-md mx-auto">
											<?php echo esc_html__( 'There are no classes scheduled for this day. Please check another day or contact us for more information.', 'cityclub' ); ?>
										</p>
									</div>
									<?php
								endif;
								?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<?php if ( 'yes' === $settings['show_all_classes_link'] ) : ?>
					<div class="mt-8 text-center">
						<a href="<?php echo esc_url( $settings['all_classes_link']['url'] ); ?>" class="cityclub-schedule-button inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-input bg-background hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 group">
							<span><?php echo esc_html__( 'View All Classes', 'cityclub' ); ?></span>
							<i class="fas fa-arrow-right ml-2 transition-transform group-hover:translate-x-1"></i>
						</a>
					</div>
				<?php endif; ?>

				<div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
					<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
						<i class="fas fa-calendar text-primary text-2xl mb-4"></i>
						<h3 class="text-xl font-bold mb-2"><?php echo esc_html__( 'Personal Training', 'cityclub' ); ?></h3>
						<p class="text-gray-600 mb-4">
							<?php echo esc_html__( 'Work one-on-one with our expert trainers to achieve your fitness goals faster.', 'cityclub' ); ?>
						</p>
						<a href="#" class="text-primary flex items-center hover:underline">
							<span><?php echo esc_html__( 'Book a Session', 'cityclub' ); ?></span>
							<i class="fas fa-arrow-right ml-1"></i>
						</a>
					</div>

					<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
						<i class="fas fa-calendar text-primary text-2xl mb-4"></i>
						<h3 class="text-xl font-bold mb-2"><?php echo esc_html__( 'Special Workshops', 'cityclub' ); ?></h3>
						<p class="text-gray-600 mb-4">
							<?php echo esc_html__( 'Join our specialized workshops led by guest instructors and fitness experts.', 'cityclub' ); ?>
						</p>
						<a href="#" class="text-primary flex items-center hover:underline">
							<span><?php echo esc_html__( 'View Workshops', 'cityclub' ); ?></span>
							<i class="fas fa-arrow-right ml-1"></i>
						</a>
					</div>

					<div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
						<i class="fas fa-calendar text-primary text-2xl mb-4"></i>
						<h3 class="text-xl font-bold mb-2"><?php echo esc_html__( 'Fitness Challenges', 'cityclub' ); ?></h3>
						<p class="text-gray-600 mb-4">
							<?php echo esc_html__( 'Challenge yourself with our monthly fitness programs designed to push your limits.', 'cityclub' ); ?>
						</p>
						<a href="#" class="text-primary flex items-center hover:underline">
							<span><?php echo esc_html__( 'Join a Challenge', 'cityclub' ); ?></span>
							<i class="fas fa-arrow-right ml-1"></i>
						</a>
					</div>
				</div>
			</div>
		</section>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const tabs = document.querySelectorAll('.cityclub-schedule-tab');
				const contents = document.querySelectorAll('[data-day-content]');
				const locationFilter = document.querySelector('[data-location-filter]');
				const cards = document.querySelectorAll('.cityclub-schedule-card');

				// Tab functionality
				tabs.forEach(tab => {
					tab.addEventListener('click', () => {
						// Remove active class from all tabs
						tabs.forEach(t => t.classList.remove('active'));
						
						// Add active class to clicked tab
						tab.classList.add('active');
						
						// Hide all content
						contents.forEach(content => content.classList.add('hidden'));
						
						// Show content for selected day
						const day = tab.getAttribute('data-day');
						const content = document.querySelector(`[data-day-content="${day}"]`);
						content.classList.remove('hidden');
						
						// Apply location filter if set
						if (locationFilter) {
							applyLocationFilter();
						}
					});
				});
				
				// Location filter functionality
				if (locationFilter) {
					locationFilter.addEventListener('change', applyLocationFilter);
				}
				
				function applyLocationFilter() {
					const selectedLocation = locationFilter.value;
					const visibleContent = document.querySelector('.cityclub-schedule-content:not(.hidden)');
					
					if (visibleContent) {
						const visibleCards = visibleContent.querySelectorAll('.cityclub-schedule-card');
						
						visibleCards.forEach(card => {
							const cardLocation = card.getAttribute('data-location');
							
							if (selectedLocation === 'all' || cardLocation === selectedLocation) {
								card.style.display = 'block';
							} else {
								card.style.display = 'none';
							}
						});
						
						// Check if no cards are visible
						const hasVisibleCards = Array.from(visibleCards).some(card => card.style.display !== 'none');
						
						if (!hasVisibleCards) {
							// Create no classes message if it doesn't exist
							let noClassesMsg = visibleContent.querySelector('.no-classes-message');
							
							if (!noClassesMsg) {
								noClassesMsg = document.createElement('div');
								noClassesMsg.className = 'no-classes-message col-span-full text-center py-12 bg-gray-50 rounded-lg';
								noClassesMsg.innerHTML = `
									<i class="fas fa-calendar text-gray-400 text-4xl mb-4"></i>
									<h3 class="text-xl font-medium text-gray-700 mb-2">No Classes Available</h3>
									<p class="text-gray-500 max-w-md mx-auto">There are no classes matching your current filters. Try changing your filters or check another day.</p>
								`;
								visibleContent.querySelector('.grid').appendChild(noClassesMsg);
							}
						} else {
							// Remove no classes message if it exists
							const noClassesMsg = visibleContent.querySelector('.no-classes-message');
							if (noClassesMsg) {
								noClassesMsg.remove();
							}
						}
					}
				}
			});
		</script>
		<?php
	}
}
