<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Addonname extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-addonname';
    }

    public function get_title()
    {
        return esc_html__('Addonname', 'trydo');
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
        return ['addonname', 'trydo'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'trydo_addonname',
            [
                'label' => esc_html__('Addonname', 'trydo'),
            ]
        );

        $this->end_controls_section();

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>

        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Addonname());


