<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Button extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-button';
    }

    public function get_title()
    {
        return esc_html__('Button', 'trydo');
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
        return ['button', 'trydo'];
    }

    protected function register_controls()
    {

        $this->rbt_link_controls('rbt_button', 'Button', 'Button Text');

        $this->start_controls_section(
            '_button_alignment',
            [
                'label' => esc_html__('Button Alignment', 'trydo'),
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'trydo'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__('Left', 'trydo'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__('Center', 'trydo'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__('Right', 'trydo'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        // Link style
        $this->rbt_link_controls_style('rbt_button_style', 'Button', '.rbt-button');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>
        <?php if($settings['rbt_rbt_button_button_show'] === 'yes'){ ?>
            <div class="<?php echo esc_attr($settings['align']); ?>">
                <?php $this->rbt_link_control_render('rbt_button', $this->get_settings()); ?>
            </div>
        <?php } ?>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Button());


