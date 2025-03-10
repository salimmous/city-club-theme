<?php
/**
 * Hero Section Widget for Elementor
 */

namespace CityClub\Elementor;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Repeater;

class HeroSectionWidget extends Widget_Base {

    public function get_name() {
        return 'cityclub_hero_section';
    }

    public function get_title() {
        return __('Hero Section', 'cityclub');
    }

    public function get_icon() {
        return 'eicon-banner';
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

        $repeater = new Repeater();

        $repeater->add_control(
            'slide_title',
            [
                'label' => __('Title', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('REPRENEZ EN MAIN VOTRE SANTÉ', 'cityclub'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_subtitle',
            [
                'label' => __('Subtitle', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Avec le bilan médico-sportif et nos 600+ coachs certifiés', 'cityclub'),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'slide_image',
            [
                'label' => __('Background Image', 'cityclub'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=80',
                ],
            ]
        );

        $repeater->add_control(
            'location_id',
            [
                'label' => __('Location ID', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => 'loc1',
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __('Slides', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'slide_title' => __('REPRENEZ EN MAIN VOTRE SANTÉ', 'cityclub'),
                        'slide_subtitle' => __('Avec le bilan médico-sportif et nos 600+ coachs certifiés', 'cityclub'),
                        'slide_image' => [
                            'url' => 'https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=1200&q=80',
                        ],
                        'location_id' => 'loc1',
                    ],
                    [
                        'slide_title' => __('Marrakech Medina', 'cityclub'),
                        'slide_subtitle' => __('Experience fitness with a view of the historic Medina', 'cityclub'),
                        'slide_image' => [
                            'url' => 'https://images.unsplash.com/photo-1571902943202-507ec2618e8f?w=1200&q=80',
                        ],
                        'location_id' => 'loc2',
                    ],
                ],
                'title_field' => '{{{ slide_title }}}',
            ]
        );

        $this->add_control(
            'autoplay_interval',
            [
                'label' => __('Autoplay Interval (ms)', 'cityclub'),
                'type' => Controls_Manager::NUMBER,
                'default' => 5000,
                'min' => 1000,
                'max' => 10000,
                'step' => 500,
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label' => __('Primary Button Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('REJOIGNEZ-NOUS', 'cityclub'),
            ]
        );

        $this->add_control(
            'primary_button_link',
            [
                'label' => __('Primary Button Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#membership',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label' => __('Secondary Button Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('NOS COURS', 'cityclub'),
            ]
        );

        $this->add_control(
            'secondary_button_link',
            [
                'label' => __('Secondary Button Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#classes',
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

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .hero-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Subtitle Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .hero-subtitle',
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __('Subtitle Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .hero-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'overlay_color',
            [
                'label' => __('Overlay Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(0, 0, 0, 0.5)',
                'selectors' => [
                    '{{WRAPPER}} .hero-overlay' => 'background-color: {{VALUE}};',
                ],
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
            'primary_button_bg_color',
            [
                'label' => __('Primary Button Background', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f97316',
                'selectors' => [
                    '{{WRAPPER}} .primary-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'primary_button_text_color',
            [
                'label' => __('Primary Button Text Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .primary-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_bg_color',
            [
                'label' => __('Secondary Button Background', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(255, 255, 255, 0.1)',
                'selectors' => [
                    '{{WRAPPER}} .secondary-button' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text_color',
            [
                'label' => __('Secondary Button Text Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .secondary-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .hero-button',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'button_border',
                'label' => __('Button Border', 'cityclub'),
                'selector' => '{{WRAPPER}} .hero-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .hero-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '0.75',
                    'right' => '0.75',
                    'bottom' => '0.75',
                    'left' => '0.75',
                    'unit' => 'rem',
                    'isLinked' => true,
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $slides = $settings['slides'];
        $autoplay_interval = $settings['autoplay_interval'];
        
        if (empty($slides)) {
            return;
        }
        
        // Get locations for the dropdown
        $locations = [];
        foreach ($slides as $slide) {
            $locations[] = [
                'id' => $slide['location_id'],
                'name' => $slide['slide_title'],
            ];
        }
        
        // Output HTML
        ?>
        <div class="cityclub-hero-section relative w-full h-[100vh] min-h-[700px] bg-gray-900 overflow-hidden">
            <!-- Background Slides -->
            <?php foreach ($slides as $index => $slide) : ?>
                <div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?php echo $index === 0 ? 'opacity-100' : 'opacity-0'; ?>" data-slide-index="<?php echo $index; ?>" data-location-id="<?php echo esc_attr($slide['location_id']); ?>">
                    <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url($slide['slide_image']['url']); ?>')"></div>
                    <div class="hero-overlay absolute inset-0 bg-black bg-opacity-50"></div>
                </div>
            <?php endforeach; ?>

            <!-- Content -->
            <div class="relative h-full flex flex-col justify-center items-center text-white px-4 z-10">
                <div class="max-w-5xl mx-auto text-center mb-8">
                    <div class="inline-block bg-black/30 backdrop-blur-md px-6 py-2 rounded-full mb-8 animate-pulse-slow border border-white/20">
                        <span class="text-sm md:text-base font-medium tracking-wider">
                            <?php echo esc_html__('PLUS DE 42 CLUBS AU MAROC', 'cityclub'); ?>
                        </span>
                    </div>

                    <div class="overflow-hidden mb-2">
                        <h1 class="hero-title text-6xl md:text-8xl font-black mb-2 animate-text-reveal" style="animation-delay: 300ms;">
                            <?php echo esc_html($slides[0]['slide_title']); ?>
                        </h1>
                    </div>

                    <div class="overflow-hidden mb-8">
                        <div class="animate-text-reveal" style="animation-delay: 600ms;">
                            <div class="text-6xl md:text-7xl font-black bg-gradient-to-r from-orange-500 via-teal-400 to-orange-500 text-transparent bg-clip-text animate-gradient-x">
                                CITY<span class="text-teal-400">CLUB</span>
                                <span class="text-orange-500 text-xs align-super">+</span>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden mb-10">
                        <p class="hero-subtitle text-xl md:text-2xl max-w-2xl mx-auto font-light animate-text-reveal" style="animation-delay: 900ms;">
                            <?php echo esc_html($slides[0]['slide_subtitle']); ?>
                        </p>
                    </div>

                    <div class="flex flex-col sm:flex-row justify-center gap-4">
                        <a href="<?php echo esc_url($settings['primary_button_link']['url']); ?>" class="hero-button primary-button bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold py-6 px-10 rounded-xl relative overflow-hidden group transition-all duration-300 hover:shadow-xl hover:shadow-orange-500/30 hover:scale-105 text-lg">
                            <span class="relative z-10 flex items-center">
                                <?php echo esc_html($settings['primary_button_text']); ?> <span class="ml-2">→</span>
                            </span>
                            <span class="absolute top-0 -left-[100%] w-[120%] h-full bg-gradient-to-r from-transparent via-white/20 to-transparent skew-x-[25deg] animate-[glint_3s_ease-in-out_infinite_alternate]"></span>
                        </a>

                        <a href="<?php echo esc_url($settings['secondary_button_link']['url']); ?>" class="hero-button secondary-button backdrop-blur-md bg-white/10 border-2 border-white/50 text-white hover:bg-white hover:text-gray-900 font-bold py-6 px-10 rounded-xl transition-all duration-300 hover:shadow-lg hover:shadow-white/30 hover:scale-105 text-lg">
                            <span class="relative z-10 flex items-center">
                                <?php echo esc_html($settings['secondary_button_text']); ?> <span class="ml-2">→</span>
                            </span>
                        </a>
                    </div>
                </div>

                <!-- Location Selector -->
                <div class="absolute bottom-16 left-0 right-0 mx-auto max-w-3xl px-4">
                    <div class="cityclub-location-selector flex flex-col sm:flex-row items-center gap-2 bg-white rounded-lg p-2 shadow-md">
                        <div class="flex items-center gap-2 text-gray-700 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span><?php echo esc_html__('Choisir un Club:', 'cityclub'); ?></span>
                        </div>

                        <div class="w-full sm:w-64">
                            <select class="location-select w-full bg-white border-gray-300 focus:ring-primary rounded-md p-2" data-autoplay-interval="<?php echo esc_attr($autoplay_interval); ?>">
                                <?php foreach ($locations as $index => $location) : ?>
                                    <option value="<?php echo esc_attr($location['id']); ?>" <?php echo $index === 0 ? 'selected' : ''; ?>>
                                        <?php echo esc_html($location['name']); ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button class="get-directions-btn bg-primary hover:bg-primary/90 text-white whitespace-nowrap relative overflow-hidden group transition-all duration-300 hover:shadow-lg hover:shadow-orange-500/30 py-2 px-4 rounded-md">
                            <span class="relative z-10"><?php echo esc_html__('ITINÉRAIRE', 'cityclub'); ?></span>
                            <span class="absolute inset-0 bg-gradient-to-r from-orange-600 to-orange-400 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button class="hero-prev-btn absolute left-6 top-1/2 transform -translate-y-1/2 bg-white/10 backdrop-blur-sm hover:bg-orange-500 text-white p-3 rounded-full z-20 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-orange-500/50 border border-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </button>
            <button class="hero-next-btn absolute right-6 top-1/2 transform -translate-y-1/2 bg-white/10 backdrop-blur-sm hover:bg-orange-500 text-white p-3 rounded-full z-20 transition-all duration-300 hover:scale-110 hover:shadow-lg hover:shadow-orange-500/50 border border-white/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </button>

            <!-- Slide Indicators -->
            <div class="hero-indicators absolute bottom-40 left-0 right-0 flex justify-center gap-3 z-20">
                <?php foreach ($slides as $index => $slide) : ?>
                    <button class="hero-indicator h-3 rounded-full transition-all <?php echo $index === 0 ? 'bg-orange-500 w-8 shadow-lg shadow-orange-500/50' : 'bg-white/30 w-3 hover:bg-white/60'; ?>" data-index="<?php echo $index; ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            // Hero Section Slider
            var currentSlide = 0;
            var slides = $('.hero-slide');
            var indicators = $('.hero-indicator');
            var totalSlides = slides.length;
            var autoplayInterval = $('.location-select').data('autoplay-interval');
            var autoplayTimer;
            var isAutoPlaying = true;

            // Function to show a specific slide
            function showSlide(index) {
                slides.removeClass('opacity-100').addClass('opacity-0');
                $(slides[index]).removeClass('opacity-0').addClass('opacity-100');
                
                // Update indicators
                indicators.removeClass('bg-orange-500 w-8 shadow-lg shadow-orange-500/50').addClass('bg-white/30 w-3');
                $(indicators[index]).removeClass('bg-white/30 w-3').addClass('bg-orange-500 w-8 shadow-lg shadow-orange-500/50');
                
                // Update location selector
                var locationId = $(slides[index]).data('location-id');
                $('.location-select').val(locationId);
                
                // Update content
                $('.hero-title').text($(slides[index]).find('.slide-title').text());
                $('.hero-subtitle').text($(slides[index]).find('.slide-subtitle').text());
                
                currentSlide = index;
            }

            // Next slide
            $('.hero-next-btn').click(function() {
                isAutoPlaying = false;
                var nextSlide = (currentSlide + 1) % totalSlides;
                showSlide(nextSlide);
                resetAutoplayTimer();
            });

            // Previous slide
            $('.hero-prev-btn').click(function() {
                isAutoPlaying = false;
                var prevSlide = (currentSlide - 1 + totalSlides) % totalSlides;
                showSlide(prevSlide);
                resetAutoplayTimer();
            });

            // Indicator click
            indicators.click(function() {
                isAutoPlaying = false;
                var index = $(this).data('index');
                showSlide(index);
                resetAutoplayTimer();
            });

            // Location selector change
            $('.location-select').change(function() {
                isAutoPlaying = false;
                var locationId = $(this).val();
                slides.each(function(index) {
                    if ($(this).data('location-id') === locationId) {
                        showSlide(index);
                        return false;
                    }
                });
                resetAutoplayTimer();
            });

            // Autoplay function
            function startAutoplay() {
                autoplayTimer = setInterval(function() {
                    if (isAutoPlaying) {
                        var nextSlide = (currentSlide + 1) % totalSlides;
                        showSlide(nextSlide);
                    }
                }, autoplayInterval);
            }

            // Reset autoplay timer
            function resetAutoplayTimer() {
                clearInterval(autoplayTimer);
                setTimeout(function() {
                    isAutoPlaying = true;
                    startAutoplay();
                }, 10000);
            }

            // Start autoplay
            startAutoplay();

            // Get directions button
            $('.get-directions-btn').click(function() {
                var locationId = $('.location-select').val();
                // In a real implementation, this would use the actual location data
                window.open('https://maps.google.com/?q=CityClub+' + locationId, '_blank');
            });
        });
        </script>
        <?php
    }

    protected function content_template() {
        // JavaScript template for the Elementor editor
    }
}
