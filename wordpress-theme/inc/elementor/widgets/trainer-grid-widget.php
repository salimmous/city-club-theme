<?php
/**
 * Trainer Grid Widget for Elementor
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Trainer Grid Widget.
 */
class CityClub_Trainer_Grid_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cityclub_trainer_grid';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CityClub Trainer Grid', 'cityclub' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-person';
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
		return [ 'trainer', 'coach', 'team', 'staff', 'cityclub' ];
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
				'default'     => esc_html__( 'Nos Coachs Experts', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your title', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Nos professionnels du fitness certifiés sont dédiés à vous aider à atteindre vos objectifs avec des programmes d\'entraînement personnalisés et des conseils d\'experts.', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your description', 'cityclub' ),
				'rows'        => 5,
			]
		);

		$this->add_control(
			'show_filters',
			[
				'label'        => esc_html__( 'Show Filters', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
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
			'columns',
			[
				'label'   => esc_html__( 'Columns', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'1' => esc_html__( '1', 'cityclub' ),
					'2' => esc_html__( '2', 'cityclub' ),
					'3' => esc_html__( '3', 'cityclub' ),
					'4' => esc_html__( '4', 'cityclub' ),
				],
			]
		);

		$this->end_controls_section();

		// Trainers Section
		$this->start_controls_section(
			'section_trainers',
			[
				'label' => esc_html__( 'Trainers', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'name',
			[
				'label'       => esc_html__( 'Name', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Ahmed Benali', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'   => esc_html__( 'Image', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'specialties',
			[
				'label'       => esc_html__( 'Specialties', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Strength Training, Bodybuilding', 'cityclub' ),
				'label_block' => true,
				'description' => esc_html__( 'Comma separated list of specialties', 'cityclub' ),
			]
		);

		$repeater->add_control(
			'location',
			[
				'label'       => esc_html__( 'Location', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Casablanca', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'experience',
			[
				'label'       => esc_html__( 'Experience', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( '8 years', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'rating',
			[
				'label'   => esc_html__( 'Rating', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'min'     => 0,
				'max'     => 5,
				'step'    => 0.1,
				'default' => 4.8,
			]
		);

		$repeater->add_control(
			'profile_link',
			[
				'label'       => esc_html__( 'Profile Link', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'cityclub' ),
				'default'     => [
					'url'               => '#',
					'is_external'        => false,
					'nofollow'           => false,
					'custom_attributes' => '',
				],
			]
		);

		$this->add_control(
			'trainers',
			[
				'label'       => esc_html__( 'Trainers', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'name'        => esc_html__( 'Ahmed Benali', 'cityclub' ),
						'specialties' => esc_html__( 'Strength Training, Bodybuilding', 'cityclub' ),
						'location'    => esc_html__( 'Casablanca', 'cityclub' ),
						'experience'  => esc_html__( '8 years', 'cityclub' ),
						'rating'      => 4.8,
					],
					[
						'name'        => esc_html__( 'Leila Mansouri', 'cityclub' ),
						'specialties' => esc_html__( 'Yoga, Pilates', 'cityclub' ),
						'location'    => esc_html__( 'Rabat', 'cityclub' ),
						'experience'  => esc_html__( '6 years', 'cityclub' ),
						'rating'      => 4.7,
					],
					[
						'name'        => esc_html__( 'Karim Tazi', 'cityclub' ),
						'specialties' => esc_html__( 'CrossFit, HIIT', 'cityclub' ),
						'location'    => esc_html__( 'Marrakech', 'cityclub' ),
						'experience'  => esc_html__( '5 years', 'cityclub' ),
						'rating'      => 4.9,
					],
				],
				'title_field' => '{{{ name }}}',
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
				'default'   => '#f9fafb',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-section' => 'background-color: {{VALUE}};',
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
					'{{WRAPPER}} .cityclub-trainer-section' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
					'{{WRAPPER}} .cityclub-trainer-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'selector' => '{{WRAPPER}} .cityclub-trainer-title',
			]
		);

		$this->add_control(
			'description_color',
			[
				'label'     => esc_html__( 'Description Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#6b7280',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-description' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'description_typography',
				'selector' => '{{WRAPPER}} .cityclub-trainer-description',
			]
		);

		$this->end_controls_section();

		// Card Style Section
		$this->start_controls_section(
			'section_style_cards',
			[
				'label' => esc_html__( 'Trainer Cards', 'cityclub' ),
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
					'{{WRAPPER}} .cityclub-trainer-card' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name'     => 'card_border',
				'selector' => '{{WRAPPER}} .cityclub-trainer-card',
			]
		);

		$this->add_control(
			'card_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-trainer-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .cityclub-trainer-card',
			]
		);

		$this->add_control(
			'card_name_color',
			[
				'label'     => esc_html__( 'Name Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#1f2937',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-name' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'card_name_typography',
				'selector' => '{{WRAPPER}} .cityclub-trainer-name',
			]
		);

		$this->add_control(
			'card_info_color',
			[
				'label'     => esc_html__( 'Info Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#6b7280',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-info' => 'color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'card_info_typography',
				'selector' => '{{WRAPPER}} .cityclub-trainer-info',
			]
		);

		$this->add_control(
			'badge_background',
			[
				'label'     => esc_html__( 'Badge Background', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#f3f4f6',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-badge' => 'background-color: {{VALUE}};',
				],
				'separator' => 'before',
			]
		);

		$this->add_control(
			'badge_text_color',
			[
				'label'     => esc_html__( 'Badge Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#4b5563',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-badge' => 'color: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// Button Style Section
		$this->start_controls_section(
			'section_style_button',
			[
				'label' => esc_html__( 'Button', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label'     => esc_html__( 'Text Color', 'cityclub' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'default'   => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .cityclub-trainer-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name'     => 'button_background',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .cityclub-trainer-button',
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
				'name'     => 'button_border',
				'selector' => '{{WRAPPER}} .cityclub-trainer-button',
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-trainer-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
				'selector' => '{{WRAPPER}} .cityclub-trainer-button',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'button_typography',
				'selector' => '{{WRAPPER}} .cityclub-trainer-button',
			]
		);

		$this->add_responsive_control(
			'button_padding',
			[
				'label'      => esc_html__( 'Padding', 'cityclub' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .cityclub-trainer-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

		// Get all specialties for filter
		$all_specialties = [];
		foreach ( $settings['trainers'] as $trainer ) {
			$specialties = explode( ',', $trainer['specialties'] );
			foreach ( $specialties as $specialty ) {
				$specialty = trim( $specialty );
				if ( ! empty( $specialty ) && ! in_array( $specialty, $all_specialties, true ) ) {
					$all_specialties[] = $specialty;
				}
			}
		}
		sort( $all_specialties );

		// Get all locations for filter
		$all_locations = [];
		foreach ( $settings['trainers'] as $trainer ) {
			if ( ! empty( $trainer['location'] ) && ! in_array( $trainer['location'], $all_locations, true ) ) {
				$all_locations[] = $trainer['location'];
			}
		}
		sort( $all_locations );

		?>
		<section class="cityclub-trainer-section py-24 px-4 md:px-8 bg-gray-50">
			<div class="max-w-7xl mx-auto">
				<div class="text-center mb-12">
					<div class="flex items-center justify-center mb-4">
						<div class="h-1 w-12 bg-orange-500 rounded-full"></div>
						<div class="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
						<div class="h-1 w-1 bg-orange-500 rounded-full"></div>
					</div>
					<h2 class="cityclub-trainer-title text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
						<span class="relative inline-block">
							<span class="relative z-10"><?php echo esc_html( explode( ' ', $settings['title'] )[0] ); ?></span>
							<span class="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
						</span>
						<?php echo esc_html( implode( ' ', array_slice( explode( ' ', $settings['title'] ), 1 ) ) ); ?>
					</h2>
					<p class="cityclub-trainer-description text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
						<?php echo esc_html( $settings['description'] ); ?>
					</p>
				</div>

				<div class="flex items-center justify-between mb-8">
					<div class="flex items-center">
						<i class="fas fa-users text-primary mr-2"></i>
						<span class="font-medium">
							<?php echo count( $settings['trainers'] ); ?> <?php echo esc_html__( 'Trainers Available', 'cityclub' ); ?>
						</span>
					</div>
				</div>

				<div class="cityclub-trainer-grid bg-white p-8 rounded-xl shadow-lg">
					<?php if ( 'yes' === $settings['show_filters'] || 'yes' === $settings['show_search'] ) : ?>
						<div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
							<?php if ( 'yes' === $settings['show_search'] ) : ?>
								<div class="relative w-full md:w-64">
									<input type="text" placeholder="<?php echo esc_attr__( 'Rechercher des coachs...', 'cityclub' ); ?>" class="cityclub-trainer-search pl-10 border-orange-200 focus:ring-orange-500 focus-visible:ring-orange-500 w-full p-2 rounded-md border" data-trainer-search>
									<i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
								</div>
							<?php endif; ?>

							<?php if ( 'yes' === $settings['show_filters'] ) : ?>
								<div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
									<div class="flex items-center gap-2">
										<i class="fas fa-filter text-gray-500"></i>
										<select class="cityclub-trainer-filter w-full sm:w-[180px] border-orange-200 focus:ring-orange-500 p-2 rounded-md border" data-specialty-filter>
											<option value="all"><?php echo esc_html__( 'All Specialties', 'cityclub' ); ?></option>
											<?php foreach ( $all_specialties as $specialty ) : ?>
												<option value="<?php echo esc_attr( $specialty ); ?>"><?php echo esc_html( $specialty ); ?></option>
											<?php endforeach; ?>
										</select>
									</div>

									<div class="flex items-center gap-2">
										<i class="fas fa-filter text-gray-500"></i>
										<select class="cityclub-trainer-filter w-full sm:w-[180px] border-orange-200 focus:ring-orange-500 p-2 rounded-md border" data-location-filter>
											<option value="all"><?php echo esc_html__( 'All Locations', 'cityclub' ); ?></option>
											<?php foreach ( $all_locations as $location ) : ?>
												<option value="<?php echo esc_attr( $location ); ?>"><?php echo esc_html( $location ); ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-<?php echo esc_attr( $settings['columns'] ); ?> gap-6">
						<?php foreach ( $settings['trainers'] as $trainer ) : ?>
							<div class="cityclub-trainer-card overflow-hidden transition-all hover:shadow-xl hover:-translate-y-2 group" data-specialties="<?php echo esc_attr( $trainer['specialties'] ); ?>" data-location="<?php echo esc_attr( $trainer['location'] ); ?>" data-name="<?php echo esc_attr( $trainer['name'] ); ?>">
								<div class="aspect-square relative overflow-hidden bg-gray-100 group-hover:scale-105 transition-transform duration-500">
									<img src="<?php echo esc_url( $trainer['image']['url'] ); ?>" alt="<?php echo esc_attr( $trainer['name'] ); ?>" class="object-cover w-full h-full">
								</div>
								<div class="p-6">
									<h3 class="cityclub-trainer-name text-xl font-bold mb-1"><?php echo esc_html( $trainer['name'] ); ?></h3>
									<div class="flex items-center mb-3">
										<span class="text-yellow-500 mr-1">★</span>
										<span class="text-sm font-medium"><?php echo esc_html( $trainer['rating'] ); ?></span>
										<span class="mx-2 text-gray-300">|</span>
										<span class="cityclub-trainer-info text-sm text-gray-600">
											<?php echo esc_html( $trainer['experience'] ); ?>
										</span>
									</div>
									<div class="mb-4">
										<p class="cityclub-trainer-info text-sm text-gray-500 mb-1">
											<?php echo esc_html__( 'Location', 'cityclub' ); ?>: <?php echo esc_html( $trainer['location'] ); ?>
										</p>
										<div class="flex flex-wrap gap-2 mt-2">
											<?php
											$specialties = explode( ',', $trainer['specialties'] );
											foreach ( $specialties as $specialty ) :
												$specialty = trim( $specialty );
												if ( ! empty( $specialty ) ) :
													?>
													<span class="cityclub-trainer-badge text-xs px-2 py-1 bg-gray-100 text-gray-700 font-semibold rounded"><?php echo esc_html( $specialty ); ?></span>
													<?php
												endif;
											endforeach;
											?>
										</div>
									</div>
									<a href="<?php echo esc_url( $trainer['profile_link']['url'] ); ?>" class="cityclub-trainer-button w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold group-hover:shadow-lg transition-all duration-300 inline-block text-center py-2 px-4 rounded-md">
										<?php echo esc_html__( 'Voir le Profil', 'cityclub' ); ?>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>

					<div class="cityclub-no-trainers hidden text-center py-12">
						<i class="fas fa-user-slash text-gray-400 text-4xl mb-4"></i>
						<h3 class="text-xl font-medium text-gray-700 mb-2">
							<?php echo esc_html__( 'No Trainers Found', 'cityclub' ); ?>
						</h3>
						<p class="text-gray-500 max-w-md mx-auto">
							<?php echo esc_html__( 'No trainers match your current filters. Try changing your filters or search criteria.', 'cityclub' ); ?>
						</p>
					</div>
				</div>

				<div class="mt-12 text-center">
					<p class="text-gray-600 mb-4">
						<?php echo esc_html__( 'Want to join our team of fitness professionals?', 'cityclub' ); ?>
					</p>
					<a href="#" class="inline-flex items-center justify-center rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2">
						<?php echo esc_html__( 'Apply to Become a Trainer', 'cityclub' ); ?>
					</a>
				</div>
			</div>
		</section>

		<script>
			document.addEventListener('DOMContentLoaded', function() {
				const trainerCards = document.querySelectorAll('.cityclub-trainer-card');
				const noTrainersMessage = document.querySelector('.cityclub-no-trainers');
				const searchInput = document.querySelector('[data-trainer-search]');
				const specialtyFilter = document.querySelector('[data-specialty-filter]');
				const locationFilter = document.querySelector('[data-location-filter]');
				
				// Function to filter trainers
				function filterTrainers() {
					const searchTerm = searchInput ? searchInput.value.toLowerCase() : '';
					const selectedSpecialty = specialtyFilter ? specialtyFilter.value : 'all';
					const selectedLocation = locationFilter ? locationFilter.value : 'all';
					
					let visibleCount = 0;
					
					trainerCards.forEach(card => {
						const name = card.getAttribute('data-name').toLowerCase();
						const specialties = card.getAttribute('data-specialties').toLowerCase();
						const location = card.getAttribute('data-location').toLowerCase();
						
						const matchesSearch = name.includes(searchTerm) || specialties.includes(searchTerm);
						const matchesSpecialty = selectedSpecialty === 'all' || specialties.includes(selectedSpecialty.toLowerCase());
						const matchesLocation = selectedLocation === 'all' || location === selectedLocation.toLowerCase();
						
						const isVisible = matchesSearch && matchesSpecialty && matchesLocation;
						card.style.display = isVisible ? 'block' : 'none';
						
						if (isVisible) visibleCount++;
					});
					
					// Show/hide no trainers message
					if (noTrainersMessage) {
						noTrainersMessage.style.display = visibleCount === 0 ? 'block' : 'none';
					}
				}
				
				// Add event listeners
				if (searchInput) {
					searchInput.addEventListener('input', filterTrainers);
				}
				
				if (specialtyFilter) {
					specialtyFilter.addEventListener('change', filterTrainers);
				}
				
				if (locationFilter) {
					locationFilter.addEventListener('change', filterTrainers);
				}
				
				// Initial filter
				filterTrainers();
			});
		</script>
		<?php
	}
}
