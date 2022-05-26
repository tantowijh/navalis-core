<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_List_Style extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-list-style';
    }

    public function get_title()
    {
        return esc_html__('List Style', 'trydo');
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
        return ['list_style', 'list', 'li', 'custom_list', 'trydo_list', 'trydo'];
    }

    protected function register_controls()
    {


        // Section Title
        $this->rbt_section_title('list_style', 'Title and Content', '', 'List Style Default', 'h3', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, totam.', 'true', 'text-left');

        $this->start_controls_section(
            '_list',
            [
                'label' => esc_html__( 'List', 'trydo' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'list_title', [
                'label' => esc_html__( 'List Item', 'trydo' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'This is list item title' , 'trydo' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'list_icon_type',
            [
                'label' => esc_html__('Select Icon Type', 'trydo'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'icon',
                'options' => [
                    'image' => esc_html__('Image', 'trydo'),
                    'icon' => esc_html__('Icon', 'trydo'),
                ],
            ]
        );

        $repeater->add_control(
            'list_image',
            [
                'label' => esc_html__('Upload Image', 'trydo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'list_icon_type' => 'image'
                ]

            ]
        );
        if (rbt_is_elementor_version('<', '2.6.0')) {
            $repeater->add_control(
                'list_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICON,
                    'label_block' => true,
                    'default' => 'fa fa-star',
                    'condition' => [
                        'list_icon_type' => 'icon'
                    ]
                ]
            );
        } else {
            $repeater->add_control(
                'list_selected_icon',
                [
                    'show_label' => false,
                    'type' => Controls_Manager::ICONS,
                    'fa4compatibility' => 'icon',
                    'label_block' => true,
                    'default' => [
                        'value' => 'fas fa-star',
                        'library' => 'solid',
                    ],
                    'condition' => [
                        'list_icon_type' => 'icon'
                    ]
                ]
            );
        }
        $this->add_control(
            'lists',
            [
                'label' => esc_html__( 'Repeater List', 'trydo' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'list_title' => esc_html__( 'This is list item title #1', 'trydo' ),
                    ],
                    [
                        'list_title' => esc_html__( 'This is list item title #2', 'trydo' ),
                    ],
                    [
                        'list_title' => esc_html__( 'This is list item title #3', 'trydo' ),
                    ],
                    [
                        'list_title' => esc_html__( 'This is list item title #4', 'trydo' ),
                    ],
                ],
                'title_field' => '{{{ list_title }}}',
            ]
        );

        $this->add_control(
            'space_list_item',
            [
                'label' => esc_html__( 'List space gap', 'trydo' ),
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
                    '{{WRAPPER}} .list-style--1 li' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();





        // Style Component
        $this->rbt_basic_style_controls('list_style_before_title', 'Section - Before Title', '.list-style-inner .sub-title');
        $this->rbt_basic_style_controls('list_style_title', 'Section - Title', '.list-style-inner .title');
        $this->rbt_basic_style_controls('list_style_description', 'Section - Description', '.list-style-inner p');

        $this->rbt_icon_style('list_icon', 'List - Icon/Image/SVG', '.list-style--1 li .icon');
        $this->rbt_basic_style_controls('list_title', 'List - Title', '.list-style--1 li');

        // Area Style
        $this->rbt_section_style_controls('list_style_area', 'Area Style', '.list-style-inner');
    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="list-style-inner <?php echo esc_attr($settings['rbt_list_style_align']) ?>">
            <?php $this->rbt_section_title_render('list_style', $this->get_settings()); ?>

            <?php if( $settings['lists'] ){ ?>
                <ul class="list-style--1">
                    <?php foreach ($settings['lists'] as $index => $item){ ?>
                        <li>
                            <?php if($item['list_icon_type'] !== 'image'){ ?>
                                <?php if (!empty($item['list_icon']) || !empty($item['list_selected_icon']['value'])) : ?>
                                    <div class="icon">
                                        <?php rbt_render_icon($item, 'list_icon', 'list_selected_icon'); ?>
                                    </div>
                                <?php endif; ?>
                            <?php } else {
                                if (!empty($item['list_image'])){ ?>
                                    <div class="icon">
                                        <?php echo Group_Control_Image_Size::get_attachment_image_html($item, 'full', 'list_image'); ?>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <?php echo esc_html($item['list_title']) ?>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>

        </div>
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_List_Style());