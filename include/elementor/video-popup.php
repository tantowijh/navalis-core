<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_VideoPopup extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-video-popup';
    }

    public function get_title()
    {
        return esc_html__('Video Popup', 'trydo');
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
        return ['video popup', 'trydo'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'trydo_video_popup',
            [
                'label' => esc_html__('Video Popup', 'trydo'),
            ]
        );
        $this->add_control(
            'rbt_video_popup_image',
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
                'name' => 'rbt_video_popup_image_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );
        $this->add_control(
            'rbt_video_popup_image_radius',
            [
                'label' => esc_html__('Image Border Radius', 'trydo'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .thumb img, {{WRAPPER}} .thumbnail img' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_control(
            'rbt_video_popup_video_url',
            [
                'label' => esc_html__( 'Video Link', 'trydo' ),
                'description' => 'Video url example: https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'https://www.youtube.com/watch?v=ZOoVOfieAF8',
                'placeholder' => esc_html__( 'Enter your youtube video url hare', 'trydo' ),
            ]
        );
        $this->add_control(
            'rbt_video_popup_button_size',
            [
                'label' => esc_html__('Button Size', 'trydo'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'size-large' => esc_html__('Large', 'trydo'),
                    'size-medium' => esc_html__('Small', 'trydo'),
                ],
                'default' => 'size-large',
            ]
        );
        $this->add_control(
            'rbt_video_popup_button_color',
            [
                'label' => esc_html__('Button Color', 'trydo'),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'theme-color' => esc_html__('Theme Color', 'trydo'),
                    'white-color' => esc_html__('White Color', 'trydo'),
                    'black-color' => esc_html__('Dark Color', 'trydo'),
                ],
                'default' => 'theme-color'
            ]
        );
        $this->add_control(
            'rbt_video_popup_button_radius',
            [
                'label' => esc_html__('Button Border Radius', 'trydo'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} button.video-popup.position-top-center, {{WRAPPER}} a.video-popup.position-top-center' => 'border-radius: {{SIZE}}px;',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_video_popup_margin',
            [
                'label' => esc_html__('Margin', 'trydo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} button.video-popup.position-top-center, {{WRAPPER}} a.video-popup.position-top-center' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'rbt_video_popup_padding',
            [
                'label' => esc_html__('Padding', 'trydo'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} button.video-popup.position-top-center, {{WRAPPER}} a.video-popup.position-top-center' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display(); ?>
            <div class="thumbnail position-relative">
                <?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'rbt_video_popup_image_size', 'rbt_video_popup_image' );?>
                <?php if(!empty($settings['rbt_video_popup_video_url'])){ ?>
                    <a class="video-popup position-top-center play__btn <?php echo esc_attr($settings['rbt_video_popup_button_size']); ?> <?php echo esc_attr($settings['rbt_video_popup_button_color']); ?>" href="<?php echo esc_url($settings['rbt_video_popup_video_url']); ?>"><span
                        class="play-icon"></span></a>

                <?php } ?>
            </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_VideoPopup());


