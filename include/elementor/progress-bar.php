<?php

namespace Elementor;

use TrydoCore\Elementor\Controls\Group_Control_RBTBGGradient;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Progress_Bar extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-progress-bar';
    }

    public function get_title()
    {
        return esc_html__('Progress Bar', 'trydo');
    }

    public function get_icon()
    {
        return 'rt-icon';
    }

    public function get_categories()
    {
        return ['trydo'];
    }

    public function get_keywords()
    {
        return ['progress bar', 'trydo'];
    }

    protected function register_controls()
    {

        // Section Title
        $this->rbt_section_title('progress_bar', 'Section - Title', '', 'Skill', 'h3', '', 'text-left');


        $this->start_controls_section(
            'trydo_progress_bar',
            [
                'label' => esc_html__('Progress Bar', 'trydo'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'type' => Controls_Manager::TEXT,
                'label' => esc_html__( 'Name', 'trydo' ),
                'default' => esc_html__( 'Design', 'trydo' ),
                'placeholder' => esc_html__( 'Type a skill name', 'trydo' ),
            ]
        );

        $repeater->add_control(
            'level',
            [
                'label' => esc_html__( 'Level (Out Of 100)', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                    'size' => 95
                ],
                'size_units' => ['%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'want_customize',
            [
                'label' => esc_html__( 'Want To Customize?', 'trydo' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Yes', 'trydo' ),
                'label_off' => esc_html__( 'No', 'trydo' ),
                'return_value' => 'yes',
                'description' => esc_html__( 'You can customize this skill bar color from here or customize from Style tab', 'trydo' ),
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'trydo' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.rn-progress-charts h6.heading' => 'color: {{VALUE}};',
                ],
                'condition' => ['want_customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_control(
            'percentage_color',
            [
                'label' => esc_html__( 'Percentage label Color', 'trydo' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.rn-progress-charts .progress .progress-bar span.percent-label' => 'color: {{VALUE}};',
                ],
                'condition' => ['want_customize' => 'yes'],
                'style_transfer' => true,
            ]
        );

        $repeater->add_group_control(
            Group_Control_RBTBGGradient::get_type(),
            [
                'name' => 'level_color',
                'label' => esc_html__('Level Color', 'trydo'),
                'selector' => '{{WRAPPER}} {{CURRENT_ITEM}}.rn-progress-charts .progress .progress-bar',
                'condition' => ['want_customize' => 'yes'],
            ]
        );

        $repeater->add_control(
            'base_color',
            [
                'label' => esc_html__( 'Base Color', 'trydo' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.rn-progress-charts .progress' => 'background-color: {{VALUE}};',
                ],
                'condition' => ['want_customize' => 'yes'],
            ]
        );

        $this->add_control(
            'skills',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print((name || level.size) ? (name || "Skill") + " - " + level.size + level.unit : "Skill - 0%") #>',
                'default' => [
                    [
                        'name' => 'Design',
                        'level' => ['size' => 95, 'unit' => '%']
                    ],
                    [
                        'name' => 'UX',
                        'level' => ['size' => 85, 'unit' => '%']
                    ],
                    [
                        'name' => 'Coding',
                        'level' => ['size' => 75, 'unit' => '%']
                    ],
                    [
                        'name' => 'Speed',
                    ],
                    [
                        'name' => 'Passion',
                        'level' => ['size' => 90, 'unit' => '%']
                    ]
                ]
            ]
        );
        $this->add_control(
            'view',
            [
                'type' => Controls_Manager::SELECT,
                'label' => esc_html__( 'Layout', 'trydo' ),
                'separator' => 'before',
                'default' => 'progress-bar--1',
                'options' => [
                    'progress-bar--2' => esc_html__( 'Thin', 'trydo' ),
                    'progress-bar--1' => esc_html__( 'Normal', 'trydo' ),
                    'progress-bar--3' => esc_html__( 'Bold', 'trydo' ),
                ],
                'style_transfer' => true,
            ]
        );

        $this->end_controls_section();


        // Style Component
        $this->rbt_basic_style_controls('progress_bar_section_before_title', 'Section - Before Title', '.heading .sub-title');
        $this->rbt_basic_style_controls('progress_bar_section_title', 'Section - Title', '.heading .title');
        $this->rbt_basic_style_controls('progress_bar_section_description', 'Section - Description', '.heading p');


        $this->start_controls_section(
            'progress_bar_style_bars',
            [
                'label' => esc_html__( 'Skill Bars', 'trydo' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'height',
            [
                'label' => esc_html__( 'Height', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rn-progress-charts .progress' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_RBTBGGradient::get_type(),
            [
                'name' => 'level_color_style',
                'label' => esc_html__('Level Color', 'trydo'),
                'selector' => '{{WRAPPER}} .rn-progress-charts .progress .progress-bar',
            ]
        );

        $this->add_control(
            'base_color_style_tab',
            [
                'label' => esc_html__( 'Base Color', 'trydo' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rn-progress-charts .progress' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'spacing',
            [
                'label' => esc_html__( 'Spacing Between', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 250,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .rn-progress-charts:not(:first-child)' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_section();

        $this->rbt_basic_style_controls('progress_bars_title', 'Skill Bars - Title', '.rn-progress-charts h6.heading');
        $this->rbt_basic_style_controls('progress_bars_percentage_label', 'Skill Bars - Percentage label', '.rn-progress-charts .progress .progress-bar span.percent-label');

        // Area Style
        $this->rbt_section_style_controls('progress_bars_area', 'Section Style', '.progress-wrapper');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        if ( ! is_array( $settings['skills'] ) ) {
            return;
        }


        ?>
        <div class="progress-wrapper">
            <div class="heading <?php echo esc_attr($settings['rbt_progress_bar_align']) ?>">
                <?php $this->rbt_section_title_render('progress_bar', $this->get_settings()); ?>
            </div>
            <?php
            foreach ( $settings['skills'] as $index => $skill ) :
                $margin = ($index !== 0) ? 'mt--40' : '';
                ?>
                <div class="rn-progress-charts <?php echo esc_attr( $settings['view'] ); ?> elementor-repeater-item-<?php echo $skill['_id']; ?> <?php echo esc_attr($margin); ?>">
                    <h6 class="heading heading-h6"><?php echo esc_html( $skill['name'] ); ?></h6>
                    <div class="progress">
                        <div class="progress-bar wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay=".3s" role="progressbar" style="width: <?php echo esc_attr( $skill['level']['size'] ); ?>%" aria-valuenow="<?php echo esc_attr( $skill['level']['size'] ); ?>" aria-valuemin="0" aria-valuemax="100"><span
                                class="percent-label"><?php echo esc_attr( $skill['level']['size'] ); ?><?php echo esc_attr( $skill['level']['unit'] ); ?></span></div>
                    </div>
                </div>
            <?php
            endforeach;
            ?>
        </div>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Progress_Bar());


