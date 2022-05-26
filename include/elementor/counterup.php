<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Counterup extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-counterup';
    }

    public function get_title()
    {
        return esc_html__('Counterup', 'trydo');
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
        return ['counter', 'fun fact', 'funfact', 'counter up', 'trydo'];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'trydo_counterup',
            [
                'label' => esc_html__('Counterup', 'trydo'),
            ]
        );
        $this->add_control(
            'counterup_number',
            [
                'label' => esc_html__('Number', 'trydo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '50',
                'label_block' => true,
            ]
        );

        $this->add_control(
            'counterup_number_sup',
            [
                'label' => esc_html__('Select Funfact Number Sup', 'trydo'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'counter',
                'options' => [
                    'counter-none' => esc_html__('None', 'trydo'),
                    'counter' => esc_html__('Plus(+)', 'trydo'),
                    'counter-percentage' => esc_html__('Percentage(%)', 'trydo'),
                    'counter-k' => esc_html__('Thousand(K)', 'trydo'),
                ],
                'label_block' => true,
            ]
        );

        $this->add_control(
            'counterup_description', [
                'label' => esc_html__('Description', 'trydo'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__('The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those.', 'trydo'),
                'label_block' => true,
            ]
        );
        $this->add_responsive_control(
            'counterup_description_align',
            [
                'label' => esc_html__( 'Alignment', 'trydo' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'text-left' => [
                        'title' => esc_html__( 'Left', 'trydo' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'text-center' => [
                        'title' => esc_html__( 'Center', 'trydo' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'text-right' => [
                        'title' => esc_html__( 'Right', 'trydo' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'default' => 'text-center',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'counterup_style',
            [
                'label' => esc_html__('Select Style', 'trydo'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1' => esc_html__('Style One', 'trydo'),
                    '2' => esc_html__('Style Two', 'trydo'),
                ],
            ]
        );
        $this->add_control(
            'custom_class',
            [
                'label' => esc_html__('Add Custom Class', 'trydo'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->end_controls_section();

        // Style Component
        $this->rbt_basic_style_controls('counterup_number', 'Number', '.rn-counterup .counter');
        $this->rbt_basic_style_controls('counterup_number_sup', 'Number Sup', '.rn-counterup .counter::after');
        $this->rbt_basic_style_controls('counterup_description', 'Description', '.rn-counterup .description');

        // Area
        $this->rbt_section_style_controls('counterup_box', 'Counter Box', '.rn-counterup');

    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="rn-counterup counterup_style--<?php echo esc_attr($settings['counterup_style']); ?> <?php echo esc_attr($settings['counterup_description_align']); ?> <?php echo esc_attr($settings['custom_class']); ?>">
            <?php if(!empty($settings['counterup_number'])){ ?>
                <h5 class="counter <?php echo $settings['counterup_number_sup'] ?>"><?php echo esc_html($settings['counterup_number']) ?></h5>
            <?php } ?>
            <?php if(!empty($settings['counterup_description'])){ ?>
                <p class="description"><?php echo esc_html($settings['counterup_description']) ?></p>
            <?php } ?>
        </div>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Counterup());


