<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Minimal_Portfolio extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-minimal-portfolio';
    }

    public function get_title()
    {
        return esc_html__('Minimal Portfolio', 'trydo');
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
        return ['minimal portfolio', 'portfolio', 'works', 'project', 'trydo'];
    }

    protected function register_controls()
    {

        // Section Title
        $this->rbt_section_title('minimal_portfolio', 'Section - Title and Content', '', 'Our Portfolio', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.');

        // Portfolio Query
        $this->rbt_query_controls('minimal_portfolio', 'Minimal Portfolio - ', 'portfolio', 'portfolio-cat');


        $this->start_controls_section(
            'trydo_minimal_portfolio',
            [
                'label' => esc_html__('Minimal Portfolio - Layout', 'trydo'),
            ]
        );

        $this->add_control(
            'trydo_minimal_portfolio_layout',
            [
                'label' => esc_html__('Select Layout', 'trydo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'fullwidth',
                'options' => [
                    'fullwidth' => esc_html__('Fullwidth', 'trydo'),
                    'container' => esc_html__('Container', 'trydo'),
                ]
            ]
        );
        $this->add_control(
            'trydo_minimal_portfolio_col_gap',
            [
                'label' => esc_html__('Column Gap', 'trydo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'large',
                'options' => [
                    'small' => esc_html__('Small', 'trydo'),
                    'large' => esc_html__('large', 'trydo'),
                ]
            ]
        );

        $this->add_control(
            'trydo_minimal_portfolio_height',
            [
                'label' => esc_html__( 'Height', 'trydo' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .portfolio' => 'min-height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'minimal_portfolio_thumb_size', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'default' => 'trydo-portfolio-thumb',
            ]
        );

        $this->add_control(
            'minimal_portfolio_load_more_button',
            [
                'label'        => esc_html__('Load More Button ?', 'trydo'),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__('Yes', 'trydo'),
                'label_off'    => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'separator'    => 'before',
                'default'      => 'yes'
            ]
        );
        $this->add_control(
            'minimal_portfolio_button_label',
            [
                'label' => esc_html__('More Projects Button Label', 'trydo'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('View More Projects', 'trydo'),
                'placeholder' => esc_html__('Type View More Projects label here', 'trydo'),
                'condition' => [
                    'minimal_portfolio_load_more_button' => 'yes'
                ]
            ]
        );

        $this->end_controls_section();

        // Columns Panel
        $this->rbt_columns('minimal_portfolio_columns', 'Portfolio - Columns', '3', '6', '6', '12');

        // Style Component
        $this->rbt_basic_style_controls('minimal_portfolio_section_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('minimal_portfolio_section_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('minimal_portfolio_section_description', 'Section - Description', '.section-title p');

        // Portfolio Style
        $this->rbt_basic_style_controls('minimal_portfolio_cat', 'Portfolio Category', '.portfolio .content .inner p');
        $this->rbt_basic_style_controls('minimal_portfolio_title', 'Portfolio Title', '.portfolio .content .inner h4');

        // Load more button style
        $this->rbt_link_controls_style('load_more_button', 'Load More Button style', '.rbt-button', 'btn-size-lg', 'rn-button-style--2 btn_solid');

        // Area Style
        $this->rbt_section_style_controls('minimal_portfolio_area', 'Section Style', '.rn-portfolio-area');


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $Helper = new \Helper();
        $trydo_options = $Helper->trydo_get_options();
        /**
         * Setup the post arguments.
         */
        $query_args = RBT_Helper::get_query_args('portfolio', 'portfolio-cat', $this->get_settings());

        // The Query
        $query = new \WP_Query($query_args);
        $elemid = 'minimal-portfolio-' . rand(000000, 999999);


        // layout
        if( $settings['trydo_minimal_portfolio_layout'] == 'fullwidth' ){
            $wrapper_class = "";
        } else {
            $wrapper_class = " container ";
        }
        // column gap
        if( $settings['trydo_minimal_portfolio_col_gap'] == 'small' ){
            if( $settings['trydo_minimal_portfolio_layout'] == 'fullwidth' ){
                $wrapper_gap_class = " plr--10 ";
                $row_gap_class = " row--5 ";
            } else {
                $wrapper_gap_class = " plr--15 ";
                $row_gap_class = " row--5 ";
            }
        } else {

            if( $settings['trydo_minimal_portfolio_layout'] == 'fullwidth' ){
                $wrapper_gap_class = " plr--30 ";
            } else {
                $wrapper_gap_class = " plr--15 ";
            }


            $row_gap_class = "";
        }


        ?>
        <!-- Start Portfolio Area  -->
        <div class="rn-portfolio-area rn-section-gap bg_color--1 <?php echo esc_attr($settings['trydo_minimal_portfolio_layout']); ?> <?php echo esc_attr($settings['trydo_minimal_portfolio_col_gap']); ?>" id="trydo-minimal-portfolio-<?php echo esc_attr($this->get_id()) ?>">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title section-title--2 mb--20 <?php echo esc_attr($settings['rbt_minimal_portfolio_align']) ?>">
                            <?php $this->rbt_section_title_render('minimal_portfolio', $this->get_settings()); ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if ($query->have_posts()) { ?>
                <div class="wrapper <?php echo esc_attr($wrapper_class); ?> <?php echo esc_attr($wrapper_gap_class); ?>">
                    <div class="row portfolio-content-wrap-row <?php echo esc_attr($row_gap_class); ?>">
                        <?php while ($query->have_posts()) {
                            $query->the_post();
                            global $post;
                            $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>
                            <!-- Start Single Portfolio  -->
                            <div class=" portfolio-tilthover col-lg-<?php echo esc_attr($settings['rbt_minimal_portfolio_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_minimal_portfolio_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_minimal_portfolio_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_minimal_portfolio_columns_for_mobile']); ?>">
                                <div class="Tilt-inner">
                                    <div class="portfolio">
                                        <div class="thumbnail-inner">
                                            <div class="thumbnail image-1" style="background-image: url(<?php the_post_thumbnail_url($settings['minimal_portfolio_thumb_size_size']); ?>)"></div>
                                            <div class="bg-blr-image image-1" style="background-image: url(<?php the_post_thumbnail_url($settings['minimal_portfolio_thumb_size_size']); ?>)"></div>
                                        </div>
                                        <div class="content">
                                            <div class="inner">
                                                <?php if ($terms && !is_wp_error($terms)): ?>
                                                    <p><?php foreach ($terms as $term) { ?>
                                                            <span><?php echo esc_html($term->name); ?></span>
                                                        <?php } ?>
                                                    </p>
                                                <?php endif ?>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <?php if ($trydo_options['trydo_enable_case_study_button'] == 'yes') { ?>
                                                    <div class="portfolio-button">
                                                        <a class="rn-btn"
                                                           href="<?php the_permalink(); ?>"><?php echo esc_html($trydo_options['trydo_enable_case_study_button_text']); ?></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Portfolio  -->
                        <?php } ?>
                        <?php wp_reset_postdata(); ?>
                    </div>  <!-- Row -->

                    <?php if( $settings['minimal_portfolio_load_more_button'] == 'yes' || $settings['minimal_portfolio_button_label']){ ?>
                       <?php
                        $this->add_render_attribute('rbt_load_more_button_class', 'class', ' rbt-button load-more ');
                        // Style
                        if (!empty($settings['rbt_load_more_button_button_style'])) {
                            $this->add_render_attribute('rbt_load_more_button_class', 'class', '' . $settings['rbt_load_more_button_button_style'] . '');
                        }
                        // Size
                        if (!empty($settings['rbt_load_more_button_button_size'])) {
                            $this->add_render_attribute('rbt_load_more_button_class', 'class', $settings['rbt_load_more_button_button_size']);
                        }
                        // Color
                        if (!empty($settings['rbt_load_more_button_button_color'])) {
                            $this->add_render_attribute('rbt_load_more_button_class', 'class', $settings['rbt_load_more_button_button_color']);
                        }
                        $postCount = $query->found_posts;
                        $post_value = ($settings['posts_per_page'] < 0 || empty($settings['posts_per_page'])) ? false : true;
                        if($postCount>$settings['posts_per_page'] && $post_value) {
                        ?>
                        <!-- Start Pagination-->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="view-more-btn mt--60 text-center">
                                    <a href="javascript:void(0)"
                                       data-query='<?php echo esc_attr(json_encode($query_args)); ?>'
                                       data-actions="trydo_get_all_posts"
                                       data-settings="<?php echo esc_attr(json_encode($settings)); ?>"
                                       data-paged="1"
                                       data-post-count="<?php echo esc_attr($settings['posts_per_page']); ?>"
                                       data-target="#<?php echo esc_attr($elemid) ?>"
                                       <?php echo trydo_escapeing($this->get_render_attribute_string('rbt_load_more_button_class')); ?>
                                       ><span><?php echo esc_html($settings['minimal_portfolio_button_label']); ?></span></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Pagination-->
                    <?php }
                    } ?>

                </div> <!-- End Wrapper -->
            <?php } ?>
        </div>
        <!-- End Portfolio Area  -->
        <?php

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Minimal_Portfolio());


