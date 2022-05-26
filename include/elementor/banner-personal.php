<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Personal_Banner extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-personal-banner';
    }

    public function get_title()
    {
        return esc_html__('Personal Banner', 'trydo');
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
        return ['personal_banner', 'trydo'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('title_and_content', 'Title & Content', 'FREELANCE DIGITAL DESIGNER', 'Hello, I’m <span>Nancy</span> Welcome to my World.', 'h1', '', 'text-left', false);


        $this->start_controls_section(
            'trydo_personal_banner',
            [
                'label' => esc_html__('Advanced Options', 'trydo'),
            ]
        );
            // Height Control
            $this->rbt_height_control('personal_banner');

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('pb_before_title', 'Before Title', '.slide.slider-style-3 .inner > span');
        $this->rbt_basic_style_controls('pb_title', 'Title', '.slide.slider-style-3 .inner .title');
        $this->rbt_basic_style_controls('pb_title_span', 'Title Span', '.slide.slider-style-3 .inner .title span');
        $this->rbt_basic_style_controls('pb_before_description', 'Description', '.slide.slider-style-3 .inner .description');

        $this->rbt_section_style_controls('pb_area', 'Section Style', '.slide.slider-style-3.bg_image');
        $this->rbt_section_style_controls('pb_area_overlay', 'Section Style Overlay', '.slide.slider-style-3.bg_image.overlay:before');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title');

        ?>
        <!-- Start Slider Area  -->
        <div class="rn-slider-area">
            <!-- Start Single Slide  -->
            <div class="slide personal-portfolio-slider slider-paralax slider-style-3 d-flex align-items-center justify-content-center bg_image overlay rbt-height-control">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="inner <?php echo esc_attr($settings['rbt_title_and_content_align']) ?>">
                                <?php if (!empty($settings['rbt_title_and_content_before_title'])) { ?>
                                    <span><?php echo rbt_kses_basic( $settings['rbt_title_and_content_before_title'] ); ?></span>
                                <?php } ?>
                                <?php
                                if ($settings['rbt_title_and_content_title_tag']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['rbt_title_and_content_title_tag']),
                                        $this->get_render_attribute_string('title_args'),
                                        rbt_kses_intermediate($settings['rbt_title_and_content_title'])
                                    );
                                endif;
                                ?>
                                <?php if (!empty($settings['rbt_title_and_content_desctiption'])) { ?>
                                    <p class="description"><?php echo rbt_kses_intermediate( $settings['rbt_title_and_content_desctiption'] ); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Slide  -->
            </div>
        </div>
        <!-- End Slider Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Personal_Banner());


