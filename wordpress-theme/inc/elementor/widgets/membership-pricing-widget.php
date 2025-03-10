<?php
/**
 * Membership Pricing Widget for Elementor
 *
 * @package CityClub
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Membership Pricing Widget.
 */
class CityClub_Membership_Pricing_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'cityclub_membership_pricing';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'CityClub Membership Pricing', 'cityclub' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-price-table';
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
		return [ 'membership', 'pricing', 'plans', 'subscription', 'cityclub' ];
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
				'default'     => esc_html__( 'Nos Abonnements', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your title', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'       => esc_html__( 'Subtitle', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Rejoignez une communauté de plus de 230.000 adhérents actifs', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter your subtitle', 'cityclub' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'show_comparison',
			[
				'label'        => esc_html__( 'Show Comparison Toggle', 'cityclub' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Show', 'cityclub' ),
				'label_off'    => esc_html__( 'Hide', 'cityclub' ),
				'return_value' => 'yes',
				'default'      => 'yes',
			]
		);

		$this->add_control(
			'background_color',
			[
				'label'   => esc_html__( 'Background Color', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'bg-gray-50',
				'options' => [
					'bg-white'   => esc_html__( 'White', 'cityclub' ),
					'bg-gray-50' => esc_html__( 'Light Gray', 'cityclub' ),
					'bg-gray-100' => esc_html__( 'Gray', 'cityclub' ),
					'bg-gray-900' => esc_html__( 'Dark', 'cityclub' ),
				],
			]
		);

		$this->end_controls_section();

		// Benefits Section
		$this->start_controls_section(
			'section_benefits',
			[
				'label' => esc_html__( 'Benefits', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'icon',
			[
				'label'   => esc_html__( 'Icon', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value'   => 'fas fa-dumbbell',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Équipement de Pointe', 'cityclub' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'description',
			[
				'label'       => esc_html__( 'Description', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'default'     => esc_html__( 'Accédez à des équipements fitness premium dans tous nos clubs à travers le Maroc.', 'cityclub' ),
				'placeholder' => esc_html__( 'Enter benefit description', 'cityclub' ),
				'rows'        => 3,
			]
		);

		$repeater->add_control(
			'icon_color',
			[
				'label'   => esc_html__( 'Icon Color', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'text-orange-500',
				'options' => [
					'text-orange-500' => esc_html__( 'Orange', 'cityclub' ),
					'text-teal-500'   => esc_html__( 'Teal', 'cityclub' ),
					'text-blue-500'   => esc_html__( 'Blue', 'cityclub' ),
					'text-purple-500' => esc_html__( 'Purple', 'cityclub' ),
					'text-red-500'    => esc_html__( 'Red', 'cityclub' ),
					'text-green-500'  => esc_html__( 'Green', 'cityclub' ),
				],
			]
		);

		$this->add_control(
			'benefits',
			[
				'label'       => esc_html__( 'Benefits', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'icon'        => [
							'value'   => 'fas fa-dumbbell',
							'library' => 'fa-solid',
						],
						'title'       => esc_html__( 'Équipement de Pointe', 'cityclub' ),
						'description' => esc_html__( 'Accédez à des équipements fitness premium dans tous nos clubs à travers le Maroc.', 'cityclub' ),
						'icon_color'  => 'text-orange-500',
					],
					[
						'icon'        => [
							'value'   => 'fas fa-users',
							'library' => 'fa-solid',
						],
						'title'       => esc_html__( 'Coachs Experts', 'cityclub' ),
						'description' => esc_html__( 'Travaillez avec des professionnels certifiés dédiés à vous aider à atteindre vos objectifs.', 'cityclub' ),
						'icon_color'  => 'text-teal-500',
					],
					[
						'icon'        => [
							'value'   => 'fas fa-award',
							'library' => 'fa-solid',
						],
						'title'       => esc_html__( 'Avantages Exclusifs', 'cityclub' ),
						'description' => esc_html__( 'Profitez d\'avantages exclusifs, y compris des réductions chez nos partenaires et des événements spéciaux.', 'cityclub' ),
						'icon_color'  => 'text-orange-500',
					],
				],
				'title_field' => '{{{ title }}}',
			]
		);

		$this->end_controls_section();

		// Pricing Plans Section
		$this->start_controls_section(
			'section_pricing_plans',
			[
				'label' => esc_html__( 'Pricing Plans', 'cityclub' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$plans_repeater = new \Elementor\Repeater();

		$plans_repeater->add_control(
			'name',
			[
				'label'       => esc_html__( 'Plan Name', 'cityclub' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'default'     => esc_html__( 'Basic', 'cityclub' ),
				'label_block' => true,
			]
		);

		$plans_repeater->add_control(
			'price',
			[
				'label'   => esc_html__( 'Price', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::NUMBER,
				'default' => 299,
			]
		);

		$plans_repeater->add_control(
			'period',
			[
				'label'   => esc_html__( 'Period', 'cityclub' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'mois', 'cityclub' ),
			]
		);

		$plans_repeater->add_control(
			'description',
			[
				'label'