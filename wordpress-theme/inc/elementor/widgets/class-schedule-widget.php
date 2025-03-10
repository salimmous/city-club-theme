<?php
/**
 * Class Schedule Widget for Elementor
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

class ClassScheduleWidget extends Widget_Base {

    public function get_name() {
        return 'cityclub_class_schedule';
    }

    public function get_title() {
        return __('Class Schedule', 'cityclub');
    }

    public function get_icon() {
        return 'eicon-calendar';
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
                'default' => __('Class Schedules', 'cityclub'),
            ]
        );

        $this->add_control(
            'description',
            [
                'label' => __('Description', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Find the perfect class for your fitness journey. Filter by day, type, or level to discover classes that match your interests and schedule.', 'cityclub'),
            ]
        );

        $this->add_control(
            'show_all_classes_link',
            [
                'label' => __('Show "View All Classes" Button', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'all_classes_link',
            [
                'label' => __('All Classes Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#',
                ],
                'condition' => [
                    'show_all_classes_link' => 'yes',
                ],
            ]
        );

        // Classes Repeater
        $classes_repeater = new Repeater();

        $classes_repeater->add_control(
            'name',
            [
                'label' => __('Class Name', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Power Yoga', 'cityclub'),
            ]
        );

        $classes_repeater->add_control(
            'instructor',
            [
                'label' => __('Instructor', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Sarah Ahmed', 'cityclub'),
            ]
        );

        $classes_repeater->add_control(
            'time',
            [
                'label' => __('Time', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('07:00', 'cityclub'),
            ]
        );

        $classes_repeater->add_control(
            'duration',
            [
                'label' => __('Duration', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('60 min', 'cityclub'),
            ]
        );

        $classes_repeater->add_control(
            'location',
            [
                'label' => __('Location', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Casablanca Downtown', 'cityclub'),
            ]
        );

        $classes_repeater->add_control(
            'capacity',
            [
                'label' => __('Capacity', 'cityclub'),
                'type' => Controls_Manager::NUMBER,
                'default' => 20,
            ]
        );

        $classes_repeater->add_control(
            'enrolled',
            [
                'label' => __('Enrolled', 'cityclub'),
                'type' => Controls_Manager::NUMBER,
                'default' => 15,
            ]
        );

        $classes_repeater->add_control(
            'type',
            [
                'label' => __('Class Type', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Yoga', 'cityclub'),
            ]
        );

        $classes_repeater->add_control(
            'level',
            [
                'label' => __('Level', 'cityclub'),
                'type' => Controls_Manager::SELECT,
                'default' => 'Intermediate',
                'options' => [
                    'Beginner' => __('Beginner', 'cityclub'),
                    'Intermediate' => __('Intermediate', 'cityclub'),
                    'Advanced' => __('Advanced', 'cityclub'),
                ],
            ]
        );

        $classes_repeater->add_control(
            'day',
            [
                'label' => __('Day', 'cityclub'),
                'type' => Controls_Manager::SELECT,
                'default' => 'Monday',
                'options' => [
                    'Monday' => __('Monday', 'cityclub'),
                    'Tuesday' => __('Tuesday', 'cityclub'),
                    'Wednesday' => __('Wednesday', 'cityclub'),
                    'Thursday' => __('Thursday', 'cityclub'),
                    'Friday' => __('Friday', 'cityclub'),
                    'Saturday' => __('Saturday', 'cityclub'),
                    'Sunday' => __('Sunday', 'cityclub'),
                ],
            ]
        );

        $this->add_control(
            'classes',
            [
                'label' => __('Classes', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $classes_repeater->get_controls(),
                'default' => [
                    [
                        'name' => __('Power Yoga', 'cityclub'),
                        'instructor' => __('Sarah Ahmed', 'cityclub'),
                        'time' => __('07:00', 'cityclub'),
                        'duration' => __('60 min', 'cityclub'),
                        'location' => __('Casablanca Downtown', 'cityclub'),
                        'capacity' => 20,
                        'enrolled' => 15,
                        'type' => __('Yoga', 'cityclub'),
                        'level' => 'Intermediate',
                        'day' => 'Monday',
                    ],
                    [
                        'name' => __('HIIT Circuit', 'cityclub'),
                        'instructor' => __('Mohammed Khalid', 'cityclub'),
                        'time' => __('18:30', 'cityclub'),
                        'duration' => __('45 min', 'cityclub'),
                        'location' => __('Casablanca Downtown', 'cityclub'),
                        'capacity' => 15,
                        'enrolled' => 12,
                        'type' => __('Cardio', 'cityclub'),
                        'level' => 'Advanced',
                        'day' => 'Monday',
                    ],
                ],
                'title_field' => '{{{ name }}} - {{{ day }}}',
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
                    '{{WRAPPER}} .schedule-title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .schedule-description' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .schedule-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => __('Description Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .schedule-description',
            ]
        );

        $this->end_controls_section();

        // Card Style Section
        $this->start_controls_section(
            'section_card_style',
            [
                'label' => __('Class Cards', 'cityclub'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'card_background_color',
            [
                'label' => __('Card Background Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .class-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => __('Card Border', 'cityclub'),
                'selector' => '{{WRAPPER}} .class-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .class-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'name' => 'card_box_shadow',
                'label' => __('Box Shadow', 'cityclub'),
                'selector' => '{{WRAPPER}} .class-card',
            ]
        );

        $this->end_controls_section();

        // Tabs Style Section
        $this->start_controls_section(
            'section_tabs_style',
            [
                'label' => __('Tabs', 'cityclub'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'tabs_background_color',
            [
                'label' => __('Tabs Background Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f3f4f6',
                'selectors' => [
                    '{{WRAPPER}} .schedule-tabs' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'tab_active_color',
            [
                'label' => __('Active Tab Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f97316',
                'selectors' => [
                    '{{WRAPPER}} .tab-active' => 'background-color: {{VALUE}}; color: #ffffff;',
                ],
            ]
        );

        $this->add_control(
            'tab_inactive_color',
            [
                'label' => __('Inactive Tab Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#6b7280',
                'selectors' => [
                    '{{WRAPPER}} .tab-inactive' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'tab_typography',
                'label' => __('Tab Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .schedule-tab',
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $classes = $settings['classes'];
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $class_types = [];
        $locations = [];
        
        // Extract unique class types and locations
        foreach ($classes as $class) {
            if (!in_array($class['type'], $class_types)) {
                $class_types[] = $class['type'];
            }
            if (!in_array($class['location'], $locations)) {
                $locations[] = $class['location'];
            }
        }
        
        // Sort arrays
        sort($class_types);
        sort($locations);
        
        // Add "All" options
        array_unshift($class_types, 'All Types');
        array_unshift($locations, 'All Locations');
        
        // Output HTML
        ?>
        <section class="cityclub-class-schedule py-24 px-4 md:px-8 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-6">
                    <div class="max-w-2xl">
                        <div class="inline-block bg-orange-500/10 px-4 py-1 rounded-full mb-4">
                            <span class="text-sm font-medium tracking-wider text-orange-600 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M20 16V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v9m16 0H4m16 0 1.28 2.55a1 1 0 0 1-.9 1.45H3.62a1 1 0 0 1-.9-1.45L4 16"></path>
                                </svg>
                                <?php echo esc_html__('PROGRAMMES VARIÉS', 'cityclub'); ?>
                            </span>
                        </div>
                        <h2 class="schedule-title text-4xl md:text-5xl font-bold text-gray-900 mb-4 tracking-tight">
                            <span class="relative inline-block">
                                <span class="relative z-10"><?php echo esc_html(explode(' ', $settings['title'])[0]); ?></span>
                                <span class="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
                            </span>
                            <?php echo esc_html(implode(' ', array_slice(explode(' ', $settings['title']), 1))); ?>
                        </h2>
                        <p class="schedule-description text-gray-600 text-lg leading-relaxed max-w-2xl">
                            <?php echo esc_html($settings['description']); ?>
                        </p>
                    </div>

                    <div class="w-full md:w-auto">
                        <div class="location-selector flex flex-col sm:flex-row items-center gap-2 bg-white rounded-lg p-2 shadow-md">
                            <div class="flex items-center gap-2 text-gray-700 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                    <circle cx="12" cy="10" r="3"></circle>
                                </svg>
                                <span><?php echo esc_html__('Choisir un Club:', 'cityclub'); ?></span>
                            </div>

                            <div class="w-full sm:w-64">
                                <select class="location-filter w-full bg-white border-gray-300 focus:ring-primary rounded-md p-2">
                                    <?php foreach ($locations as $location) : ?>
                                        <option value="<?php echo esc_attr($location); ?>">
                                            <?php echo esc_html($location); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="cityclub-class-schedule-widget w-full bg-white rounded-xl shadow-lg p-8">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                            <h3 class="text-2xl font-bold text-gray-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                <?php echo esc_html__('Planning Hebdomadaire', 'cityclub'); ?>
                            </h3>

                            <div class="flex flex-wrap gap-3">
                                <div class="w-full sm:w-auto">
                                    <select class="type-filter w-full sm:w-[180px] border-orange-200 focus:ring-orange-500 p-2 rounded-md">
                                        <?php foreach ($class_types as $type) : ?>
                                            <option value="<?php echo esc_attr($type); ?>">
                                                <?php echo esc_html($type); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="w-full sm:w-auto">
                                    <select class="level-filter w-full sm:w-[180px] border-orange-200 focus:ring-orange-500 p-2 rounded-md">
                                        <option value="All Levels"><?php echo esc_html__('All Levels', 'cityclub'); ?></option>
                                        <option value="Beginner"><?php echo esc_html__('Beginner', 'cityclub'); ?></option>
                                        <option value="Intermediate"><?php echo esc_html__('Intermediate', 'cityclub'); ?></option>
                                        <option value="Advanced"><?php echo esc_html__('Advanced', 'cityclub'); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="schedule-tabs w-full mb-8 flex overflow-x-auto bg-gray-100 p-1 rounded-md">
                            <?php foreach ($days as $day) : ?>
                                <button class="schedule-tab flex-1 min-w-[100px] py-2 px-4 rounded-md <?php echo $day === 'Monday' ? 'tab-active' : 'tab-inactive'; ?>" data-day="<?php echo esc_attr($day); ?>">
                                    <?php echo esc_html($day); ?>
                                </button>
                            <?php endforeach; ?>
                        </div>

                        <?php foreach ($days as $day) : ?>
                            <div class="schedule-content mt-0 <?php echo $day !== 'Monday' ? 'hidden' : ''; ?>" data-day="<?php echo esc_attr($day); ?>">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <?php 
                                    $day_classes = array_filter($classes, function($class) use ($day) {
                                        return $class['day'] === $day;
                                    });
                                    
                                    if (count($day_classes) > 0) :
                                        foreach ($day_classes as $class) : 
                                    ?>
                                        <div class="class-card overflow-hidden border-l-4 border-l-primary hover:shadow-lg transition-shadow duration-300 group p-4 rounded-md" data-type="<?php echo esc_attr($class['type']); ?>" data-level="<?php echo esc_attr($class['level']); ?>" data-location="<?php echo esc_attr($class['location']); ?>">
                                            <div class="flex justify-between items-start mb-2">
                                                <h4 class="font-bold text-lg"><?php echo esc_html($class['name']); ?></h4>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full <?php echo $class['enrolled'] >= $class['capacity'] ? 'bg-red-500 text-white' : 'bg-orange-500 text-white'; ?>">
                                                    <?php echo $class['enrolled'] >= $class['capacity'] ? esc_html__('Full', 'cityclub') : esc_html($class['enrolled']) . '/' . esc_html($class['capacity']); ?>
                                                </span>
                                            </div>

                                            <div class="flex items-center text-sm text-gray-600 mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <polyline points="12 6 12 12 16 14"></polyline>
                                                </svg>
                                                <span>
                                                    <?php echo esc_html($class['time']); ?> • <?php echo esc_html($class['duration']); ?>
                                                </span>
                                            </div>

                                            <div class="flex items-center text-sm text-gray-600 mb-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                    <circle cx="12" cy="10" r="3"></circle>
                                                </svg>
                                                <span><?php echo esc_html($class['location']); ?></span>
                                            </div>

                                            <div class="flex items-center text-sm text-gray-600 mb-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="9" cy="7" r="4"></circle>
                                                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                </svg>
                                                <span><?php echo esc_html($class['instructor']); ?></span>
                                            </div>

                                            <div class="flex items-center justify-between mt-4">
                                                <div class="flex gap-2">
                                                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded-md bg-gray-200 text-gray-800">
                                                        <?php echo esc_html($class['type']); ?>
                                                    </span>
                                                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded-md border border-gray-300 text-gray-700">
                                                        <?php echo esc_html($class['level']); ?>
                                                    </span>
                                                </div>
                                                <button class="bg-gradient-to-r from-orange-500 to-orange-600 text-white text-sm py-1 px-3 rounded-md group-hover:shadow-md transition-all duration-300 group-hover:scale-105 <?php echo $class['enrolled'] >= $class['capacity'] ? 'opacity-50 cursor-not-allowed' : ''; ?>">
                                                    <?php echo $class['enrolled'] >= $class['capacity'] ? esc_html__('Liste d\'attente', 'cityclub') : esc_html__('Réserver', 'cityclub'); ?>
                                                </button>
                                            </div>
                                        </div>
                                    <?php 
                                        endforeach; 
                                    else : 
                                    ?>
                                        <div class="col-span-3 text-center py-12 bg-gray-50 rounded-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                <line x1="16" y1="2" x2="16" y2="6"></line>
                                                <line x1="8" y1="2" x2="8" y2="6"></line>
                                                <line x1="3" y1="10" x2="21" y2="10"></line>
                                            </svg>
                                            <h3 class="text-xl font-medium text-gray-700 mb-2">
                                                <?php echo esc_html__('No Classes Available', 'cityclub'); ?>
                                            </h3>
                                            <p class="text-gray-500 max-w-md mx-auto">
                                                <?php echo esc_html__('There are no classes matching your current filters. Try changing your filters or check another day.', 'cityclub'); ?>
                                            </p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if ($settings['show_all_classes_link'] === 'yes') : ?>
                    <div class="mt-8 text-center">
                        <a href="<?php echo esc_url($settings['all_classes_link']['url']); ?>" class="inline-block py-2 px-4 border border-gray-300 rounded-md text-gray-700 font-medium hover:bg-gray-50 transition-colors group">
                            <span><?php echo esc_html__('View All Classes', 'cityclub'); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4 ml-2 transition-transform group-hover:translate-x-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <h3 class="text-xl font-bold mb-2"><?php echo esc_html__('Personal Training', 'cityclub'); ?></h3>
                        <p class="text-gray-600 mb-4">
                            <?php echo esc_html__('Work one-on-one with our expert trainers to achieve your fitness goals faster.', 'cityclub'); ?>
                        </p>
                        <a href="#" class="text-primary flex items-center hover:underline">
                            <span><?php echo esc_html__('Book a Session', 'cityclub'); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <h3 class="text-xl font-bold mb-2"><?php echo esc_html__('Special Workshops', 'cityclub'); ?></h3>
                        <p class="text-gray-600 mb-4">
                            <?php echo esc_html__('Join our specialized workshops led by guest instructors and fitness experts.', 'cityclub'); ?>
                        </p>
                        <a href="#" class="text-primary flex items-center hover:underline">
                            <span><?php echo esc_html__('View Workshops', 'cityclub'); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <h3 class="text-xl font-bold mb-2"><?php echo esc_html__('Fitness Challenges', 'cityclub'); ?></h3>
                        <p class="text-gray-600 mb-4">
                            <?php echo esc_html__('Challenge yourself with our monthly fitness programs designed to push your limits.', 'cityclub'); ?>
                        </p>
                        <a href="#" class="text-primary flex items-center hover:underline">
                            <span><?php echo esc_html__('Join a Challenge', 'cityclub'); ?></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                <polyline points="12 5 19 12 12 19"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <script>
        jQuery(document).ready(function($) {
            // Tab switching
            $('.schedule-tab').click(function() {
                var day = $(this).data('day');
                
                // Update active tab
                $('.schedule-tab').removeClass('tab-active').addClass('tab-inactive');
                $(this).removeClass('tab-inactive').addClass('tab-active');
                
                // Show corresponding content
                $('.schedule-content').addClass('hidden');
                $('.schedule-content[data-day="' + day + '"]').removeClass('hidden');
                
                filterClasses();
            });
            
            // Filtering
            function filterClasses() {
                var selectedType = $('.type-filter').val();
                var selectedLevel = $('.level-filter').val();
                var selectedLocation = $('.location-filter').val();
                var activeDay = $('.schedule-tab.tab-active').data('day');
                
                $('.schedule-content[data-day="' + activeDay + '"] .class-card').each(function() {
                    var cardType = $(this).data('type');
                    var cardLevel = $(this).data('level');
                    var cardLocation = $(this).data('location');
                    
                    var typeMatch = selectedType === 'All Types' || cardType === selectedType;
                    var levelMatch = selectedLevel === 'All Levels' || cardLevel === selectedLevel;
                    var locationMatch = selectedLocation === 'All Locations' || cardLocation === selectedLocation;
                    
                    if (typeMatch && levelMatch && locationMatch) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                
                // Check if no classes are visible
                var visibleClasses = $('.schedule-content[data-day="' + activeDay + '"] .class-card:visible').length;
                if (visibleClasses === 0) {
                    if ($('.schedule-content[data-day="' + activeDay + '"] .no-classes-message').length === 0) {
                        $('.schedule-content[data-day="' + activeDay + '"] .grid').append(
                            '<div class="no-classes-message col-span-3 text-center py-12 bg-gray-50 rounded-lg">' +
                                '<svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">' +
                                    '<rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>' +
                                    '<line x1="16" y1="2" x2="16" y2="6"></line>' +
                                    '<line x1="8" y1="2" x2="8" y2="6"></line>' +
                                    '<line x1="3" y1="10" x2="21" y2="10"></line>' +
                                '</svg>' +
                                '<h3 class="text-xl font-medium text-gray-700 mb-2">' +
                                    '<?php echo esc_js(__('No Classes Available', 'cityclub')); ?>' +
                                '</h3>' +
                                '<p class="text-gray-500 max-w-md mx-auto">' +
                                    '<?php echo esc_js(__('There are no classes matching your current filters. Try changing your filters or check another day.', 'cityclub')); ?>' +
                                '</p>' +
                            '</div>'
                        );
                    }
                } else {
                    $('.schedule-content[data-day="' + activeDay + '"] .no-classes-message').remove();
                }
            }
            
            // Filter change events
            $('.type-filter, .level-filter, .location-filter').change(function() {
                filterClasses();
            });
            
            // Initial filtering
            filterClasses();
        });
        </script>
        <?php
    }

    protected function content_template() {
        // JavaScript template for the Elementor editor
    }
}
