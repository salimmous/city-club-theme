<?php
/**
 * Trainer Grid Widget for Elementor
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

class TrainerGridWidget extends Widget_Base {

    public function get_name() {
        return 'cityclub_trainer_grid';
    }

    public function get_title() {
        return __('Trainer Grid', 'cityclub');
    }

    public function get_icon() {
        return 'eicon-person';
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
                'default' => __('Our Expert Trainers', 'cityclub'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Our certified fitness professionals are dedicated to helping you achieve your goals with personalized training programs and expert guidance.', 'cityclub'),
            ]
        );

        // Trainers Repeater
        $trainers_repeater = new Repeater();

        $trainers_repeater->add_control(
            'name',
            [
                'label' => __('Name', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Ahmed Benali', 'cityclub'),
            ]
        );

        $trainers_repeater->add_control(
            'specialty',
            [
                'label' => __('Specialties (comma separated)', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Strength Training, Bodybuilding', 'cityclub'),
            ]
        );

        $trainers_repeater->add_control(
            'location',
            [
                'label' => __('Location', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Casablanca', 'cityclub'),
            ]
        );

        $trainers_repeater->add_control(
            'image',
            [
                'label' => __('Image', 'cityclub'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=trainer1',
                ],
            ]
        );

        $trainers_repeater->add_control(
            'experience',
            [
                'label' => __('Experience', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('8 years', 'cityclub'),
            ]
        );

        $trainers_repeater->add_control(
            'rating',
            [
                'label' => __('Rating (1-5)', 'cityclub'),
                'type' => Controls_Manager::NUMBER,
                'min' => 1,
                'max' => 5,
                'step' => 0.1,
                'default' => 4.8,
            ]
        );

        $trainers_repeater->add_control(
            'profile_link',
            [
                'label' => __('Profile Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'trainers',
            [
                'label' => __('Trainers', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $trainers_repeater->get_controls(),
                'default' => [
                    [
                        'name' => __('Ahmed Benali', 'cityclub'),
                        'specialty' => __('Strength Training, Bodybuilding', 'cityclub'),
                        'location' => __('Casablanca', 'cityclub'),
                        'image' => [
                            'url' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=trainer1',
                        ],
                        'experience' => __('8 years', 'cityclub'),
                        'rating' => 4.8,
                    ],
                    [
                        'name' => __('Leila Mansouri', 'cityclub'),
                        'specialty' => __('Yoga, Pilates', 'cityclub'),
                        'location' => __('Rabat', 'cityclub'),
                        'image' => [
                            'url' => 'https://api.dicebear.com/7.x/avataaars/svg?seed=trainer2',
                        ],
                        'experience' => __('6 years', 'cityclub'),
                        'rating' => 4.7,
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        $this->add_control(
            'show_filters',
            [
                'label' => __('Show Filters', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'view_profile_text',
            [
                'label' => __('View Profile Button Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('View Profile', 'cityclub'),
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
                    '{{WRAPPER}} .trainer-section-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Subtitle Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#4b5563',
                'selectors' => [
                    '{{WRAPPER}} .trainer-section-subtitle' => 'color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .trainer-section-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Subtitle Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .trainer-section-subtitle',
            ]
        );

        $this->end_controls_section();

        // Card Style Section
        $this->start_controls_section(
            'section_card_style',
            [
                'label' => __('Trainer Cards', 'cityclub'),
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
                    '{{WRAPPER}} .trainer-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => __('Card Border', 'cityclub'),
                'selector' => '{{WRAPPER}} .trainer-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .trainer-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .trainer-card',
            ]
        );

        $this->end_controls_section();

        // Button Style Section
        $this->start_controls_section(
            'section_button_style',
            [
                'label' => __('Button', 'cityclub'),
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
                    '{{WRAPPER}} .trainer-button' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .trainer-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .trainer-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .trainer-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0.25',
                    'right' => '0.25',
                    'bottom' => '0.25',
                    'left' => '0.25',
                    'unit' => 'rem',
                    'isLinked' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $trainers = $settings['trainers'];
        
        if (empty($trainers)) {
            return;
        }
        
        // Extract unique specialties and locations for filters
        $specialties = [];
        $locations = [];
        
        foreach ($trainers as $trainer) {
            $trainer_specialties = explode(',', $trainer['specialty']);
            foreach ($trainer_specialties as $specialty) {
                $specialty = trim($specialty);
                if (!empty($specialty) && !in_array($specialty, $specialties)) {
                    $specialties[] = $specialty;
                }
            }
            
            if (!empty($trainer['location']) && !in_array($trainer['location'], $locations)) {
                $locations[] = $trainer['location'];
            }
        }
        
        // Sort arrays
        sort($specialties);
        sort($locations);
        
        // Output HTML
        ?>
        <section class="cityclub-trainer-section py-24 px-4 md:px-8 bg-gray-50">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <div class="flex items-center justify-center mb-4">
                        <div class="h-1 w-12 bg-orange-500 rounded-full"></div>
                        <div class="h-1 w-1 bg-orange-500 rounded-full mx-1"></div>
                        <div class="h-1 w-1 bg-orange-500 rounded-full"></div>
                    </div>
                    <h2 class="trainer-section-title text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-tight">
                        <span class="relative inline-block">
                            <span class="relative z-10"><?php echo esc_html(explode(' ', $settings['title'])[0]); ?></span>
                            <span class="absolute bottom-2 left-0 w-full h-3 bg-orange-500/20 -z-10"></span>
                        </span>
                        <?php echo esc_html(implode(' ', array_slice(explode(' ', $settings['title']), 1))); ?>
                    </h2>
                    <p class="trainer-section-subtitle text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                        <?php echo esc_html($settings['subtitle']); ?>
                    </p>
                </div>

                <div class="flex items-center justify-between mb-8">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mr-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span class="font-medium">
                            <?php echo count($trainers); ?> <?php echo esc_html__('Trainers Available', 'cityclub'); ?>
                        </span>
                    </div>
                </div>

                <div class="cityclub-trainer-grid bg-white w-full p-8 rounded-xl shadow-lg">
                    <?php if ($settings['show_filters'] === 'yes') : ?>
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                            <div class="relative w-full md:w-64">
                                <input type="text" placeholder="<?php echo esc_attr__('Search trainers...', 'cityclub'); ?>" class="trainer-search pl-10 border-orange-200 focus:ring-orange-500 focus-visible:ring-orange-500 w-full p-2 rounded-md border border-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                    <select class="specialty-filter w-full sm:w-[180px] border-orange-200 focus:ring-orange-500 p-2 rounded-md border border-gray-300">
                                        <option value="All Specialties"><?php echo esc_html__('All Specialties', 'cityclub'); ?></option>
                                        <?php foreach ($specialties as $specialty) : ?>
                                            <option value="<?php echo esc_attr($specialty); ?>">
                                                <?php echo esc_html($specialty); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                    <select class="location-filter w-full sm:w-[180px] border-orange-200 focus:ring-orange-500 p-2 rounded-md border border-gray-300">
                                        <option value="All Locations"><?php echo esc_html__('All Locations', 'cityclub'); ?></option>
                                        <?php foreach ($locations as $location) : ?>
                                            <option value="<?php echo esc_attr($location); ?>">
                                                <?php echo esc_html($location); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($trainers as $trainer) : ?>
                            <div class="trainer-card overflow-hidden transition-all hover:shadow-xl hover:-translate-y-2 group rounded-lg" data-specialties="<?php echo esc_attr($trainer['specialty']); ?>" data-location="<?php echo esc_attr($trainer['location']); ?>">
                                <div class="aspect-square relative overflow-hidden bg-gray-100 group-hover:scale-105 transition-transform duration-500">
                                    <img src="<?php echo esc_url($trainer['image']['url']); ?>" alt="<?php echo esc_attr($trainer['name']); ?>" class="object-cover w-full h-full">
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-1"><?php echo esc_html($trainer['name']); ?></h3>
                                    <div class="flex items-center mb-3">
                                        <span class="text-yellow-500 mr-1">★</span>
                                        <span class="text-sm font-medium"><?php echo esc_html($trainer['rating']); ?></span>
                                        <span class="mx-2 text-gray-300">|</span>
                                        <span class="text-sm text-gray-600">
                                            <?php echo esc_html($trainer['experience']); ?>
                                        </span>
                                    </div>
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-500 mb-1">
                                            <?php echo esc_html__('Location:', 'cityclub'); ?> <?php echo esc_html($trainer['location']); ?>
                                        </p>
                                        <div class="flex flex-wrap gap-2 mt-2">
                                            <?php 
                                            $specialties = explode(',', $trainer['specialty']);
                                            foreach ($specialties as $specialty) :
                                                $specialty = trim($specialty);
                                                if (!empty($specialty)) :
                                            ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold rounded-md bg-gray-200 text-gray-800">
                                                    <?php echo esc_html($specialty); ?>
                                                </span>
                                            <?php 
                                                endif;
                                            endforeach; 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-6 pt-0">
                                    <a href="<?php echo esc_url($trainer['profile_link']['url']); ?>" class="trainer-button w-full bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-2 px-4 rounded-md group-hover:shadow-lg transition-all duration-300 inline-block text-center">
                                        <?php echo esc_html($settings['view_profile_text']); ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="mt-12 text-center">
                    <p class="text-gray-600 mb-4">
                        <?php echo esc_html__('Want to join our team of fitness professionals?', 'cityclub'); ?>
                    </p>
                    <a href="#" class="inline-block py-2 px-4 bg-primary text-white font-medium rounded-md hover:bg-primary/90 transition-colors">
                        <?php echo esc_html__('Apply to Become a Trainer', 'cityclub'); ?>
                    </a>
                </div>
            </div>
        </section>

        <script>
        jQuery(document).ready(function($) {
            // Search functionality
            $('.trainer-search').on('keyup', function() {
                var searchTerm = $(this).val().toLowerCase();
                filterTrainers();
            });
            
            // Filter change events
            $('.specialty-filter, .location-filter').change(function() {
                filterTrainers();
            });
            
            function filterTrainers() {
                var searchTerm = $('.trainer-search').val().toLowerCase();
                var selectedSpecialty = $('.specialty-filter').val();
                var selectedLocation = $('.location-filter').val();
                
                $('.trainer-card').each(function() {
                    var trainerName = $(this).find('h3').text().toLowerCase();
                    var trainerSpecialties = $(this).data('specialties').toLowerCase();
                    var trainerLocation = $(this).data('location').toLowerCase();
                    
                    var matchesSearch = trainerName.includes(searchTerm);
                    var matchesSpecialty = selectedSpecialty === 'All Specialties' || trainerSpecialties.includes(selectedSpecialty.toLowerCase());
                    var matchesLocation = selectedLocation === 'All Locations' || trainerLocation === selectedLocation.toLowerCase();
                    
                    if (matchesSearch && matchesSpecialty && matchesLocation) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
                
                // Check if no trainers are visible
                var visibleTrainers = $('.trainer-card:visible').length;
                if (visibleTrainers === 0) {
                    if ($('.no-trainers-message').length === 0) {
                        $('.grid').append(
                            '<div class="no-trainers-message col-span-3 text-center py-12">' +
                                '<p class="text-gray-500">' +
                                    '<?php echo esc_js(__('No trainers found matching your criteria.', 'cityclub')); ?>' +
                                '</p>' +
                            '</div>'
                        );
                    }
                } else {
                    $('.no-trainers-message').remove();
                }
            }
        });
        </script>
        <?php
    }

    protected function content_template() {
        // JavaScript template for the Elementor editor
    }
}
