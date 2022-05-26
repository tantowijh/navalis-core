<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Designer_Banner extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-designer-banner';
    }

    public function get_title()
    {
        return esc_html__('Designer Banner', 'trydo');
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
        return ['designer banner', 'banner', 'banner with image', 'image with banner', 'trydo'];
    }

    protected function register_controls()
    {

        // Title and content
        $this->rbt_section_title('trydo_designer_title_and_content', 'Title & Content', 'WELCOME TO MY WORLD', 'Hi, I’m Jone Doe <br> <span> UX Designer.</span>', 'h1', 'based in USA.', 'text-left', false);

        $this->start_controls_section(
            '_trydo_designer_thumbnail',
            [
                'label' => esc_html__('Thumbnail', 'trydo'),
            ]
        );
        $this->add_control(
            'trydo_designer_thumbnail',
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
                'name' => 'trydo_designer_thumbnail_size',
                'default' => 'full',
                'exclude' => [
                    'custom'
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'trydo_designer_banner',
            [
                'label' => esc_html__('Advanced Options', 'trydo'),
            ]
        );
        // Height Control
        $this->rbt_height_control('designer_banner');

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('designer_portfolio_before_title', 'Before Title', '.slide.designer-portfolio.slider-style-3 .inner > span');
        $this->rbt_basic_style_controls('designer_portfolio_title', 'Title', '.slide.designer-portfolio.slider-style-3 .inner .title');
        $this->rbt_basic_style_controls('designer_portfolio_title_span', 'Title Span', '.slide.designer-portfolio.slider-style-3 .inner .title span');
        $this->rbt_basic_style_controls('designer_portfolio_before_description', 'Description', '.slide.designer-portfolio.slider-style-3 .inner .description');

        $this->rbt_section_style_controls('designer_portfolio_area', 'Section Style', '.slide.designer-portfolio');
        $this->rbt_section_style_controls('designer_portfolio_area_overlay', 'Section Style Overlay', '.slide.designer-portfolio.overlay:before');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title_args', 'class', 'title');

        ?>
        <!-- Start Slider Area  -->
        <div class="slider-wrapper">
            <div class="slide designer-portfolio slider-style-3  d-flex align-items-center justify-content-center bg_color--5 rn-slider-height overlay rbt-height-control">
                <div class="container">
                    <div class="row align-items-center">
                        <?php if ($settings['trydo_designer_thumbnail']['url'] || $settings['trydo_designer_thumbnail']['id']) : ?>
                            <div class="col-lg-5">
                                <div class="designer-thumbnail">
                                    <?php
                                    $this->add_render_attribute('trydo_designer_thumbnail', 'src', $settings['trydo_designer_thumbnail']['url']);
                                    $this->add_render_attribute('trydo_designer_thumbnail', 'alt', Control_Media::get_image_alt($settings['trydo_designer_thumbnail']));
                                    $this->add_render_attribute('trydo_designer_thumbnail', 'title', Control_Media::get_image_title($settings['trydo_designer_thumbnail']));
                                    ?>
                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'trydo_designer_thumbnail_size', 'trydo_designer_thumbnail'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-lg-7 mt_md--40 mt_sm--40">
                            <div class="inner <?php echo esc_attr($settings['rbt_trydo_designer_title_and_content_align']) ?>">
                                <?php if (!empty($settings['rbt_trydo_designer_title_and_content_before_title'])) { ?>
                                    <span><?php echo rbt_kses_basic( $settings['rbt_trydo_designer_title_and_content_before_title'] ); ?></span>
                                <?php } ?>
                                <?php
                                if ($settings['rbt_trydo_designer_title_and_content_title_tag']) :
                                    printf('<%1$s %2$s>%3$s</%1$s>',
                                        tag_escape($settings['rbt_trydo_designer_title_and_content_title_tag']),
                                        $this->get_render_attribute_string('title_args'),
                                        rbt_kses_intermediate($settings['rbt_trydo_designer_title_and_content_title'])
                                    );
                                endif;
                                ?>
                                <?php if (!empty($settings['rbt_trydo_designer_title_and_content_desctiption'])) { ?>
                                    <h2 class="description"><?php echo rbt_kses_intermediate( $settings['rbt_trydo_designer_title_and_content_desctiption'] ); ?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Designer_Banner());


