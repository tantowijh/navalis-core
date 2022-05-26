<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_AboutWithExperience extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-about-with-experience';
    }

    public function get_title()
    {
        return esc_html__('About With Experience', 'trydo');
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
        return ['about', 'experience', 'trydo'];
    }

    protected function register_controls()
    {

        // Section Title
        $this->rbt_section_title('about_section_title', 'Title and Content', 'About With Us', 'Save your time by using Trydo and present yours.', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form. have suffered alteration in some form majority.', 'text-left');
        $this->start_controls_section(
            '_tab',
            [
                'label' => esc_html__( 'Tabs', 'trydo' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'tab_title', [
                'label' => esc_html__( 'Tab Item', 'trydo' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Item 1' , 'trydo' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tab_description',
            [
                'label' => esc_html__('Description', 'trydo'),
                'description' => rbt_get_allowed_html_desc( 'basic' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => '800',
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'tab_description_sup',
            [
                'label' => esc_html__('Sup', 'trydo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '+',
                'label_block' => true,
            ]
        );
        $this->add_control(
            'tabs',
            [
                'label' => esc_html__( 'Tabs contents', 'trydo' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__( 'Awards', 'trydo' ),
                        'tab_description' => esc_html__( '800', 'trydo' ),
                        'tab_description_sup' => esc_html__( '+', 'trydo' ),
                    ],
                    [
                        'tab_title' => esc_html__( 'Happy Client', 'trydo' ),
                        'tab_description' => esc_html__( '1200', 'trydo' ),
                        'tab_description_sup' => esc_html__( '+', 'trydo' ),
                    ],
                    [
                        'tab_title' => esc_html__( 'Experience', 'trydo' ),
                        'tab_description' => esc_html__( '12', 'trydo' ),
                        'tab_description_sup' => esc_html__( '+', 'trydo' ),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );

        $this->add_control(
            'space_tab_item',
            [
                'label' => esc_html__( 'Tab space gap', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .experience-wrap .experience + .experience' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            '_about_thumbnail',
            [
                'label' => esc_html__('Thumbnail', 'trydo'),
            ]
        );
        $this->add_control(
            'about_thumbnail',
            [
                'label' => esc_html__( 'Choose Image', 'trydo' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'about_thumbnail_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'about_thumbnail_overlap',
            [
                'label' => esc_html__('Image overlap to top?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'trydo'),
                'label_off' => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_responsive_control(
            'about_thumbnail_height',
            [
                'label' => esc_html__( 'Image Height', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-area .thumbnail img' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'about_thumbnail_overlap_x',
            [
                'label' => esc_html__( 'Image overlap position', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .about-position-top .thumbnail' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
                'condition' => array(
                    'about_thumbnail_overlap' => 'yes',
                ),
            ]
        );



        $this->end_controls_section();



        // Style Component
        $this->rbt_basic_style_controls('about_section_title_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('about_section_title_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('about_section_title_description', 'Section - Description', '.section-title p');

        // Tabs Component
        $this->rbt_basic_style_controls('awe_tabs_title', 'Tab - Title', '.experience-wrap .experience > span');
        $this->rbt_basic_style_controls('awe_tabs_description', 'Tab - Description', '.experience-wrap .experience .title');
        $this->rbt_basic_style_controls('awe_tabs_description_sup', 'Tab - Description Sup', '.experience-wrap .experience .title span');



        // Area Style
        $this->rbt_section_style_controls('about_area', 'Section Style', '.about-area');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $image_overlap = ( $settings['about_thumbnail_overlap'] == 'yes') ? "about-position-top" : "pt--120";

        ?>
        <!-- Start About Area  -->
        <div class="about-area about-with-experience-area pb--120 <?php echo esc_attr($image_overlap); ?>">
            <div class="about-wrapper">
                <div class="container">
                    <div class="row row--35 align-items-center">
                        <?php if ($settings['about_thumbnail']['url'] || $settings['about_thumbnail']['id']) : ?>
                            <div class="col-lg-5 col-md-12">
                                <div class="thumbnail">
                                    <?php
                                    $this->add_render_attribute('about_thumbnail', 'src', $settings['about_thumbnail']['url']);
                                    $this->add_render_attribute('about_thumbnail', 'alt', Control_Media::get_image_alt($settings['about_thumbnail']));
                                    $this->add_render_attribute('about_thumbnail', 'title', Control_Media::get_image_title($settings['about_thumbnail']));
                                    $this->add_render_attribute('about_thumbnail', 'class', 'w-100');
                                    ?>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'about_thumbnail_size', 'about_thumbnail'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-7 col-md-12">
                            <div class="about-inner inner">
                                <div class="section-title <?php echo esc_attr($settings['rbt_about_section_title_align']) ?>">
                                    <?php $this->rbt_section_title_render('about_section_title', $this->get_settings()); ?>
                                </div>
                                <?php
                                if ($settings['tabs']){ ?>
                                    <div class="experience-wrap mt--40 mt_sm--10">
                                        <?php foreach ( $settings['tabs'] as $index => $item ){ ?>
                                            <div class="experience">
                                                <span class="theme-gradient"><?php echo esc_html($item['tab_title']); ?></span>
                                                <h3 class="title theme-gradient"><?php echo rbt_kses_basic($item['tab_description']); ?><span><?php echo esc_html($item['tab_description_sup']); ?></span></h3>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start About Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_AboutWithExperience());


