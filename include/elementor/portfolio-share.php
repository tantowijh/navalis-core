<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Portfolio_Share extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-portfolio-share';
    }

    public function get_title()
    {
        return esc_html__('Portfolio Share', 'trydo');
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
        return ['portfolio share', 'trydo'];
    }

    protected function register_controls()
    {

//        $this->start_controls_section(
//            'trydo_portfolio_share',
//            [
//                'label' => esc_html__('Portfolio_Share', 'trydo'),
//            ]
//        );
//
//        $this->end_controls_section();

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        echo rbt_portfolio_sharing_icon_links();

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Portfolio_Share());


