<?php
/**
 * Membership Pricing Widget for Elementor
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

class MembershipPricingWidget extends Widget_Base {

    public function get_name() {
        return 'cityclub_membership_pricing';
    }

    public function get_title() {
        return __('Membership Pricing', 'cityclub');
    }

    public function get_icon() {
        return 'eicon-price-table';
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
                'default' => __('Nos Abonnements', 'cityclub'),
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label' => __('Subtitle', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Rejoignez une communauté de plus de 230.000 adhérents actifs', 'cityclub'),
            ]
        );

        $this->add_control(
            'show_comparison',
            [
                'label' => __('Show Comparison Toggle', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        // Benefits Repeater
        $benefits_repeater = new Repeater();

        $benefits_repeater->add_control(
            'icon',
            [
                'label' => __('Icon', 'cityclub'),
                'type' => Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fas fa-dumbbell',
                    'library' => 'fa-solid',
                ],
            ]
        );

        $benefits_repeater->add_control(
            'title',
            [
                'label' => __('Title', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Équipement de Pointe', 'cityclub'),
            ]
        );

        $benefits_repeater->add_control(
            'description',
            [
                'label' => __('Description', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Accédez à des équipements fitness premium dans tous nos clubs à travers le Maroc.', 'cityclub'),
            ]
        );

        $this->add_control(
            'benefits',
            [
                'label' => __('Benefits', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $benefits_repeater->get_controls(),
                'default' => [
                    [
                        'icon' => [
                            'value' => 'fas fa-dumbbell',
                            'library' => 'fa-solid',
                        ],
                        'title' => __('Équipement de Pointe', 'cityclub'),
                        'description' => __('Accédez à des équipements fitness premium dans tous nos clubs à travers le Maroc.', 'cityclub'),
                    ],
                    [
                        'icon' => [
                            'value' => 'fas fa-users',
                            'library' => 'fa-solid',
                        ],
                        'title' => __('Coachs Experts', 'cityclub'),
                        'description' => __('Travaillez avec des professionnels certifiés dédiés à vous aider à atteindre vos objectifs.', 'cityclub'),
                    ],
                    [
                        'icon' => [
                            'value' => 'fas fa-award',
                            'library' => 'fa-solid',
                        ],
                        'title' => __('Avantages Exclusifs', 'cityclub'),
                        'description' => __('Profitez d'avantages exclusifs, y compris des réductions chez nos partenaires et des événements spéciaux.', 'cityclub'),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        // Plans Repeater
        $plans_repeater = new Repeater();

        $plans_repeater->add_control(
            'name',
            [
                'label' => __('Plan Name', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Basic', 'cityclub'),
            ]
        );

        $plans_repeater->add_control(
            'price',
            [
                'label' => __('Price', 'cityclub'),
                'type' => Controls_Manager::NUMBER,
                'default' => 299,
            ]
        );

        $plans_repeater->add_control(
            'period',
            [
                'label' => __('Period', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('mois', 'cityclub'),
            ]
        );

        $plans_repeater->add_control(
            'description',
            [
                'label' => __('Description', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Parfait pour les débutants et les passionnés de fitness occasionnels', 'cityclub'),
            ]
        );

        $plans_repeater->add_control(
            'features',
            [
                'label' => __('Features (one per line)', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => "Access to main gym area\nStandard equipment usage\n2 group classes per week\nLocker access",
                'placeholder' => __('One feature per line', 'cityclub'),
            ]
        );

        $plans_repeater->add_control(
            'highlighted',
            [
                'label' => __('Highlight This Plan', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => '',
            ]
        );

        $plans_repeater->add_control(
            'badge',
            [
                'label' => __('Badge Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Plus Populaire', 'cityclub'),
                'condition' => [
                    'highlighted' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'plans',
            [
                'label' => __('Pricing Plans', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $plans_repeater->get_controls(),
                'default' => [
                    [
                        'name' => __('Basic', 'cityclub'),
                        'price' => 299,
                        'period' => __('mois', 'cityclub'),
                        'description' => __('Parfait pour les débutants et les passionnés de fitness occasionnels', 'cityclub'),
                        'features' => "Access to main gym area\nStandard equipment usage\n2 group classes per week\nLocker access",
                        'highlighted' => '',
                    ],
                    [
                        'name' => __('Premium', 'cityclub'),
                        'price' => 499,
                        'period' => __('mois', 'cityclub'),
                        'description' => __('Idéal pour les passionnés de fitness réguliers qui recherchent plus', 'cityclub'),
                        'features' => "Full gym access\nAll equipment usage\nUnlimited group classes\nLocker with towel service\n1 personal training session monthly\nNutrition consultation",
                        'highlighted' => 'yes',
                        'badge' => __('Plus Populaire', 'cityclub'),
                    ],
                    [
                        'name' => __('Elite', 'cityclub'),
                        'price' => 799,
                        'period' => __('mois', 'cityclub'),
                        'description' => __('L'expérience fitness ultime pour les athlètes dédiés', 'cityclub'),
                        'features' => "24/7 access to all locations\nPremium equipment priority\nUnlimited group classes\nPremium locker with laundry service\n4 personal training sessions monthly\nAdvanced nutrition planning\nSpa access\nGuest passes (2 per month)",
                        'highlighted' => '',
                    ],
                ],
                'title_field' => '{{{ name }}}',
            ]
        );

        // Features Comparison
        $features_repeater = new Repeater();

        $features_repeater->add_control(
            'name',
            [
                'label' => __('Feature Name', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Gym Access', 'cityclub'),
            ]
        );

        $features_repeater->add_control(
            'basic',
            [
                'label' => __('Included in Basic', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $features_repeater->add_control(
            'premium',
            [
                'label' => __('Included in Premium', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $features_repeater->add_control(
            'elite',
            [
                'label' => __('Included in Elite', 'cityclub'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __('Yes', 'cityclub'),
                'label_off' => __('No', 'cityclub'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $features_repeater->add_control(
            'description',
            [
                'label' => __('Feature Description', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => '',
            ]
        );

        $this->add_control(
            'features',
            [
                'label' => __('Comparison Features', 'cityclub'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $features_repeater->get_controls(),
                'default' => [
                    [
                        'name' => __('Gym Access', 'cityclub'),
                        'basic' => 'yes',
                        'premium' => 'yes',
                        'elite' => 'yes',
                    ],
                    [
                        'name' => __('Group Classes', 'cityclub'),
                        'basic' => '',
                        'premium' => 'yes',
                        'elite' => 'yes',
                        'description' => __('Access to instructor-led fitness classes', 'cityclub'),
                    ],
                    [
                        'name' => __('Personal Training', 'cityclub'),
                        'basic' => '',
                        'premium' => 'yes',
                        'elite' => 'yes',
                        'description' => __('One-on-one sessions with certified trainers', 'cityclub'),
                    ],
                ],
                'title_field' => '{{{ name }}}',
                'condition' => [
                    'show_comparison' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'cta_title',
            [
                'label' => __('CTA Title', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Vous ne savez pas quel forfait vous convient ?', 'cityclub'),
            ]
        );

        $this->add_control(
            'cta_description',
            [
                'label' => __('CTA Description', 'cityclub'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Visitez n'importe lequel de nos clubs pour une visite gratuite et une consultation avec nos conseillers d'adhésion. Nous vous aiderons à trouver la formule parfaite pour vos objectifs de fitness et votre budget.', 'cityclub'),
            ]
        );

        $this->add_control(
            'primary_button_text',
            [
                'label' => __('Primary Button Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('PROGRAMMER UNE VISITE', 'cityclub'),
            ]
        );

        $this->add_control(
            'primary_button_link',
            [
                'label' => __('Primary Button Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'secondary_button_text',
            [
                'label' => __('Secondary Button Text', 'cityclub'),
                'type' => Controls_Manager::TEXT,
                'default' => __('CONTACTEZ-NOUS', 'cityclub'),
            ]
        );

        $this->add_control(
            'secondary_button_link',
            [
                'label' => __('Secondary Button Link', 'cityclub'),
                'type' => Controls_Manager::URL,
                'placeholder' => __('https://your-link.com', 'cityclub'),
                'default' => [
                    'url' => '#',
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
            'background_color',
            [
                'label' => __('Background Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f9fafb',
                'selectors' => [
                    '{{WRAPPER}} .cityclub-membership-section' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#111827',
                'selectors' => [
                    '{{WRAPPER}} .section-title' => 'color: {{VALUE}};',
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
                    '{{WRAPPER}} .section-subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'highlight_color',
            [
                'label' => __('Highlight Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f97316',
                'selectors' => [
                    '{{WRAPPER}} .highlight-color' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .highlight-border' => 'border-color: {{VALUE}};',
                    '{{WRAPPER}} .highlight-bg' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __('Title Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .section-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'label' => __('Subtitle Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .section-subtitle',
            ]
        );

        $this->end_controls_section();

        // Card Style Section
        $this->start_controls_section(
            'section_card_style',
            [
                'label' => __('Pricing Cards', 'cityclub'),
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
                    '{{WRAPPER}} .pricing-card' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'card_border',
                'label' => __('Card Border', 'cityclub'),
                'selector' => '{{WRAPPER}} .pricing-card',
            ]
        );

        $this->add_control(
            'card_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .pricing-card',
            ]
        );

        $this->add_control(
            'card_padding',
            [
                'label' => __('Padding', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-card' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '2',
                    'right' => '2',
                    'bottom' => '2',
                    'left' => '2',
                    'unit' => 'rem',
                    'isLinked' => true,
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
            'button_background_color',
            [
                'label' => __('Button Background Color', 'cityclub'),
                'type' => Controls_Manager::COLOR,
                'default' => '#f97316',
                'selectors' => [
                    '{{WRAPPER}} .pricing-button' => 'background-color: {{VALUE}};',
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
                    '{{WRAPPER}} .pricing-button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Button Typography', 'cityclub'),
                'selector' => '{{WRAPPER}} .pricing-button',
            ]
        );

        $this->add_control(
            'button_border_radius',
            [
                'label' => __('Border Radius', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pricing-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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

        $this->add_control(
            'button_padding',
            [
                'label' => __('Padding', 'cityclub'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .pricing