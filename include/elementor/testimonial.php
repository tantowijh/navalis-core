<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Testimonial extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-testimonial';
    }

    public function get_title()
    {
        return esc_html__('Testimonial', 'trydo');
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
        return ['testimonial', 'review', 'client review', 'quote', 'trydo'];
    }

    protected function register_controls()
    {

        // Review group
        $this->start_controls_section(
            'review_list',
            [
                'label' => esc_html__( 'Review List', 'trydo' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();


        $repeater->add_control(
            'reviewer_image',
            [
                'label' => esc_html__( 'Reviewer Image', 'trydo' ),
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
            'reviewer_name', [
                'label' => esc_html__( 'Reviewer Name', 'trydo' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'FATIMA ASRAFY' , 'trydo' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'reviewer_title', [
                'label' => esc_html__( 'Reviewer Title', 'trydo' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.' , 'trydo' ),
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'review_content',
            [
                'label' => esc_html__( 'Review Content', 'trydo' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'rows' => 10,
                'default' => 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.',
                'placeholder' => esc_html__( 'Type your review content here', 'trydo' ),
            ]
        );

        $this->add_control(
            'reviews_list',
            [
                'label' => esc_html__( 'Review List', 'trydo' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' =>  $repeater->get_controls(),
                'default' => [
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],
                    [
                        'reviewer_name' => esc_html__( 'FATIMA ASRAFY', 'trydo' ),
                        'reviewer_title' => esc_html__( '- COO, AMERIMAR ENTERPRISES, INC.', 'trydo' ),
                        'review_content' => esc_html__( 'Aklima The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections Bonorum et Malorum original.', 'trydo' ),
                    ],

                ],
                'title_field' => '{{{ reviewer_name }}}',
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail_size',
                'default' => 'thumbnail',
                'exclude' => ['custom'],
                'separator' => 'none',
            ]
        );
        $this->add_control(
            'quote_icon',
            [
                'label' => esc_html__('Quote icon?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'trydo'),
                'label_off' => esc_html__('Hide', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->end_controls_section();

        $this->rbt_basic_style_controls('testimonial_content', 'Testimonial - Contenet', '.rn-testimonial-content .inner p');
        $this->rbt_basic_style_controls('testimonial_name', 'Testimonial - Name', '.rn-testimonial-content .author-info h6 span');
        $this->rbt_basic_style_controls('testimonial_title', 'Testimonial - Title', '.rn-testimonial-content .author-info h6');

        $this->rbt_section_style_controls('testimonial_area', 'Area Background', '.rn-testimonial-area');


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();

        $quote_icon = ($settings['quote_icon'] !== 'yes') ? 'quote-icon-none' : '';

        ?>
        <!-- Start Testimonial Area  -->
        <div class="rn-testimonial-area rn-section-gap bg_color--5 <?php echo esc_attr($quote_icon); ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <?php if($settings['reviews_list']){ ?>

                            <!-- Start Tab Content  -->
                            <div class="rn-testimonial-content tab-content" id="myTabContent-<?php echo esc_attr($this->get_id()) ?>">

                                <?php foreach ($settings['reviews_list'] as $index => $item){
                                    $active = ($index == '0') ? 'show active' : '';
                                    ?>
                                    <div class="tab-pane fade <?php echo esc_attr($active); ?>" id="tab-<?php echo esc_attr($this->get_id()) ?>-<?php echo esc_attr($index); ?>" role="tabpanel" aria-labelledby="tab-<?php echo esc_attr($this->get_id()) ?>-<?php echo esc_attr($index); ?>">
                                        <div class="inner">
                                            <p><?php echo rbt_kses_intermediate($item['review_content']); ?></p>
                                        </div>
                                        <div class="author-info">
                                            <h6><span><?php echo rbt_kses_basic($item['reviewer_name']); ?> </span> <?php echo rbt_kses_basic($item['reviewer_title']); ?></h6>
                                        </div>
                                    </div>
                                <?php } ?>


                            </div>
                            <!-- End Tab Content  -->

                            <!-- Start Tab Nav  -->
                            <ul class="testimonial-thumb-wrapper nav nav-tabs" id="myTab-<?php echo esc_attr($this->get_id()) ?>" role="tablist">
                            <?php foreach ($settings['reviews_list'] as $index => $item){
                                $active = ($index == '0') ? ' active' : '';
                                ?>
                                <li>
                                    <a class="<?php echo esc_attr($active); ?>" id="tab-<?php echo esc_attr($this->get_id()) ?>-<?php echo esc_attr($index); ?>-tab" data-toggle="tab" href="#tab-<?php echo esc_attr($this->get_id()) ?>-<?php echo esc_attr($index); ?>" role="tab" aria-controls="tab-<?php echo esc_attr($this->get_id()) ?>-<?php echo esc_attr($index); ?>" aria-selected="true">
                                        <div class="testimonial-thumbnai">
                                            <div class="thumb">
                                                <?php if(!empty(wp_get_attachment_image( $item['reviewer_image']['id']))){ ?>
                                                    <?php echo wp_get_attachment_image( $item['reviewer_image']['id'], $settings['thumbnail_size_size'] ); ?>
                                                <?php } else { ?>
                                                    <?php echo Group_Control_Image_Size::get_attachment_image_html($item, $settings['thumbnail_size_size'], 'reviewer_image') ?>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                            </ul>
                            <!-- End Tab Content  -->
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- Start Testimonial Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Testimonial());


