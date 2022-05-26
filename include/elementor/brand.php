<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Brand extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-brand';
    }

    public function get_title()
    {
        return esc_html__('Brand', 'trydo');
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
        return ['brand', 'brand', 'brand logo', 'logo', 'customer', 'trydo'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'trydo_brand',
            [
                'label' => esc_html__('Brand', 'trydo'),
            ]
        );

        $this->add_control(
            'brand_style',
            [
                'label' => esc_html__('Select Style', 'trydo'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Box Style', 'trydo'),
                    '2' => esc_html__('Flat Style', 'trydo'),
                ],

            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'brand_logo_image',
            [
                'label' => esc_html__('Logo', 'trydo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'brand_logo_link',
            [
                'label' => esc_html__( 'Website Url', 'trydo' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ],
                'placeholder' => esc_html__( 'https://your-link.com', 'trydo' ),
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => false,
                    'nofollow' => false,
                ],
            ]
        );

        $repeater->add_control(
            'brand_logo_name',
            [
                'label' => esc_html__('Brand Name', 'trydo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Brand Name', 'trydo'),
            ]
        );

        $this->add_control(
            'brand_logo_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ brand_logo_name }}}',
                'default' => [
                    ['brand_logo_image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['brand_logo_image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['brand_logo_image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['brand_logo_image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['brand_logo_image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['brand_logo_image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );



        $this->start_controls_tabs(
            '_tabs_brand_image_effects',
            [
                'separator' => 'before',

            ]
        );
        $this->start_controls_tab( 'normal',
            [
                'label' => __( 'Normal', 'trydo' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'brand_css_filters',
                'label' => esc_html__('Image Effect', 'trydo'),
                'selector' => '{{WRAPPER}} ul.brand-style li img, {{WRAPPER}} ul.brand-style-2 li img',
            ]
        );
        $this->end_controls_tab();
        $this->start_controls_tab( 'hover',
            [
                'label' => __( 'Hover', 'trydo' ),
            ]
        );
        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            [
                'name' => 'brand_css_filters_hover',
                'label' => esc_html__('Image Effect', 'trydo'),
                'selector' => '{{WRAPPER}} ul.brand-style li:hover img, {{WRAPPER}} ul.brand-style-2 li:hover img',
            ]
        );
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->add_control(
            'custom_class',
            [
                'label' => esc_html__('Add Custom Class', 'trydo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'separator' => 'before'
            ]
        );

        $this->end_controls_section();




        // Area
        $this->rbt_section_style_controls('brand_area', 'Section Style', '.rn-brand-area');


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        $style = ($settings['brand_style'] == '1') ? 'brand-style' : 'brand-style-2';

        ?>

        <!-- Start Brand Area -->
        <div class="rn-brand-area bg_color--1 rn-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="<?php echo esc_attr($style); ?> <?php echo esc_attr($settings['custom_class']); ?>">
                            <?php
                            $link = '';
                            $target = '';
                            $rel = '';
                            foreach($settings['brand_logo_list'] as $key => $logo){
                                $link = $logo['brand_logo_link']['url'];
                                $target = $logo['brand_logo_link']['is_external'] ? ' target="_blank"' : '';
                                $rel = $logo['brand_logo_link']['nofollow'] ? ' rel="nofollow"' : '';
                                ?>
                                <li>
                                    <?php if (!empty($link)){ ?>
                                    <a href="<?php echo esc_url($link); ?>" <?php echo esc_attr($target); ?><?php echo esc_attr($rel); ?>>
                                        <?php } ?>
                                        <?php if(!empty(wp_get_attachment_image( $logo['brand_logo_image']['id']))){ ?>
                                            <?php echo wp_get_attachment_image( $logo['brand_logo_image']['id'], 'full' ); ?>
                                        <?php } else { ?>
                                            <?php echo Group_Control_Image_Size::get_attachment_image_html($logo, 'full', 'brand_logo_image') ?>
                                        <?php } ?>
                                        <?php if (!empty($link)){ ?>
                                    </a>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Brand Area -->


        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Brand());


