<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Portfolio extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-portfolio';
    }

    public function get_title()
    {
        return esc_html__('Portfolio', 'trydo');
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
        return ['portfolio', 'works', 'project', 'trydo'];
    }

    protected function register_controls()
    {

        // Section Title
        $this->rbt_section_title('portfolio', 'Section - Title and Content', '', 'Featured', 'h2', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration.');

        // Portfolio Query
        $this->rbt_query_controls('portfolio', 'Portfolio - ', 'portfolio', 'portfolio-cat');

        // layout Panel
        $this->start_controls_section(
            'trydo_portfolio',
            [
                'label' => esc_html__('Portfolio - Layout', 'trydo'),
            ]
        );
        $this->add_control(
            'trydo_portfolio_layout',
            [
                'label' => esc_html__('Select Layout', 'trydo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout-1',
                'options' => [
                    'layout-1' => esc_html__('Default', 'trydo'),
                    'layout-2' => esc_html__('Carousel', 'trydo'),
                    'layout-3' => esc_html__('Carousel Full Width', 'trydo'),
                ]
            ]
        );
        $this->add_control(
            'trydo_portfolio_height',
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
        $this->add_control(
            'trydo_portfolio_dots',
            [
                'label' => esc_html__('Dots?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'trydo'),
                'label_off' => esc_html__('Hide', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'trydo_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'trydo_portfolio_arrow',
            [
                'label' => esc_html__('Arrow Icons?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'trydo'),
                'label_off' => esc_html__('Hide', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'trydo_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'trydo_portfolio_infinite',
            [
                'label' => esc_html__('Infinite?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'trydo'),
                'label_off' => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'trydo_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'trydo_portfolio_autoplay',
            [
                'label' => esc_html__('Autoplay?', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'trydo'),
                'label_off' => esc_html__('No', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
                'condition' => array(
                    'trydo_portfolio_layout!' => 'layout-1',
                ),
            ]
        );
        $this->add_control(
            'trydo_portfolio_autoplay_speed',
            [
                'label' => esc_html__('Autoplay Speed', 'trydo'),
                'type' => Controls_Manager::TEXT,
                'default' => '2500',
                'title' => esc_html__('Enter autoplay speed', 'trydo'),
                'label_block' => true,
                'condition' => array(
                    'trydo_portfolio_autoplay' => 'yes',
                    'trydo_portfolio_layout!' => 'layout-1',
                ),
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'portfolio_thumb_size', // // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
                'exclude' => ['custom'],
                'default' => 'trydo-portfolio-thumb',
            ]
        );
        $this->add_control(
            'trydo_portfolio_pagination',
            [
                'label' => esc_html__( 'Pagination', 'trydo' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__( 'Show', 'trydo' ),
                'label_off' => esc_html__( 'Hide', 'trydo' ),
                'return_value' => 'yes',
                'default' => 'no',
                'condition' => array(
                    'trydo_portfolio_layout' => 'layout-1',
                ),
            ]
        );
        $this->end_controls_section();

        // Columns Panel
        $this->rbt_columns('portfolio_columns', 'Portfolio - Columns', '4', '6', '6', '12');

        $this->rbt_columns_carousel('portfolio_carousel_columns', 'Portfolio - Columns for Carousel Layout', '5', '3', '2', '2', '1');

        // Style Component
        $this->rbt_basic_style_controls('portfolio_section_before_title', 'Section - Before Title', '.section-title .sub-title');
        $this->rbt_basic_style_controls('portfolio_section_title', 'Section - Title', '.section-title .title');
        $this->rbt_basic_style_controls('portfolio_section_description', 'Section - Description', '.section-title p');

        // Portfolio Style
        $this->rbt_basic_style_controls('portfolio_cat', 'Portfolio Category', '.portfolio .content .inner p');
        $this->rbt_basic_style_controls('portfolio_title', 'Portfolio Title', '.portfolio .content .inner h4');

        // Area Style
        $this->rbt_section_style_controls('portfolio_area', 'Section Style', '.rn-portfolio-area');


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

        $carousel_args = [
            'arrows' => ('yes' === $settings['trydo_portfolio_arrow']),
            'dots' => ('yes' === $settings['trydo_portfolio_dots']),
            'autoplay' => ('yes' === $settings['trydo_portfolio_autoplay']),
            'autoplay_speed' => absint($settings['trydo_portfolio_autoplay_speed']),
            'infinite' => ('yes' === $settings['trydo_portfolio_infinite']),
            'for_xl_desktop' => absint($settings['rbt_portfolio_carousel_columns_for_xl_desktop']),
            'slidesToShow' => absint($settings['rbt_portfolio_carousel_columns_for_desktop']),
            'for_laptop' => absint($settings['rbt_portfolio_carousel_columns_for_laptop']),
            'for_tablet' => absint($settings['rbt_portfolio_carousel_columns_for_tablet']),
            'for_mobile' => absint($settings['rbt_portfolio_carousel_columns_for_mobile']),
            'for_xs_mobile' => absint($settings['rbt_portfolio_carousel_columns_for_xs_mobile']),
        ];
        $this->add_render_attribute('trydo-carousel-portfolio-data', 'data-settings', wp_json_encode($carousel_args));
        $this->add_render_attribute('trydo-portfolio', 'class', 'rn-portfolio-area rn-section-gap bg_color--1');
        $this->add_render_attribute('trydo-portfolio', 'id', 'trydo-portfolio-' . esc_attr($this->get_id()));


        if ($settings['trydo_portfolio_layout'] == 'layout-2') { ?>
            <!-- Start Portfolio Area  -->
            <div class="rn-portfolio-area rn-section-gap bg_color--1" id="trydo-portfolio-<?php echo esc_attr($this->get_id()) ?>" >
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title mb--20 mb_sm--0 <?php echo esc_attr($settings['rbt_portfolio_align']) ?>">
                                <?php $this->rbt_section_title_render('portfolio', $this->get_settings()); ?>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio  -->
                    <?php if ($query->have_posts()) { ?>
                        <div class="rn-slick-activation rn-slick-dot mt--10 slick-gutter-15 portfolio-slick-activation layout-2" <?php echo $this->get_render_attribute_string('trydo-carousel-portfolio-data'); ?>>
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>

                                <!-- Start Single Portfolio  -->
                                <div class="portfolio mt--30 mb--20">
                                    <div class="thumbnail-inner">
                                        <div class="thumbnail image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                        <div class="bg-blr-image image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                    </div>
                                    <div class="content">
                                        <div class="inner">
                                            <?php if ($terms && !is_wp_error($terms)): ?>
                                                <p><?php foreach ($terms as $term) { ?>
                                                        <span><?php echo esc_html($term->name); ?></span>
                                                    <?php } ?>
                                                </p>
                                            <?php endif ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php if ($trydo_options['trydo_enable_case_study_button'] == 'yes') { ?>
                                                <div class="portfolio-button">
                                                    <a class="rn-btn"
                                                       href="<?php the_permalink(); ?>"><?php echo esc_html($trydo_options['trydo_enable_case_study_button_text']); ?></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <a class="transparent-link" href="<?php the_permalink(); ?>"></a>
                                </div>
                                <!-- End Single Portfolio  -->
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Start Portfolio Area  -->
        <?php } elseif ($settings['trydo_portfolio_layout'] == 'layout-3') { ?>
            <!-- Start Portfolio Area  -->
            <div class="rn-portfolio-area rn-section-gap bg_color--1" id="trydo-portfolio-<?php echo esc_attr($this->get_id()) ?>">
                <div class="portfolio-sacousel-inner pb--30">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-title mb--20 mb_sm--0 mb_md--0 <?php echo esc_attr($settings['rbt_portfolio_align']) ?>">
                                    <?php $this->rbt_section_title_render('portfolio', $this->get_settings()); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Portfolio  -->
                    <?php if ($query->have_posts()) { ?>
                        <div class="portfolio-slick-activation rn-slick-activation item-fluid rn-slick-dot mt--40 mt_sm--40 slick-gutter-15" <?php echo $this->get_render_attribute_string('trydo-carousel-portfolio-data'); ?>>
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>

                                <!-- Start Single Portfolio  -->
                                <div class="portfolio">
                                    <div class="thumbnail-inner">
                                        <div class="thumbnail image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                        <div class="bg-blr-image image-1"
                                             style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                    </div>
                                    <div class="content">
                                        <div class="inner">
                                            <?php if ($terms && !is_wp_error($terms)): ?>
                                                <p><?php foreach ($terms as $term) { ?>
                                                        <span><?php echo esc_html($term->name); ?></span>
                                                    <?php } ?>
                                                </p>
                                            <?php endif ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                            <?php if ($trydo_options['trydo_enable_case_study_button'] == 'yes') { ?>
                                                <div class="portfolio-button">
                                                    <a class="rn-btn"
                                                       href="<?php the_permalink(); ?>"><?php echo esc_html($trydo_options['trydo_enable_case_study_button_text']); ?></a>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <a class="transparent-link" href="<?php the_permalink(); ?>"></a>
                                </div>
                                <!-- End Single Portfolio  -->
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- End Portfolio Area  -->
        <?php } else { ?>
            <!-- Start Portfolio Area  -->
            <div class="rn-portfolio-area rn-section-gap bg_color--5" id="trydo-portfolio-<?php echo esc_attr($this->get_id()) ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title mb--30 <?php echo esc_attr($settings['rbt_portfolio_align']) ?>">
                                <?php $this->rbt_section_title_render('portfolio', $this->get_settings()); ?>
                            </div>
                        </div>
                    </div>

                    <?php if ($query->have_posts()) { ?>
                        <div class="row">
                            <?php while ($query->have_posts()) {
                                $query->the_post();
                                global $post;
                                $terms = get_the_terms($post->ID, 'portfolio-cat'); ?>

                                <!-- Start Single Portfolio  -->
                                <div class="mt--30 col-lg-<?php echo esc_attr($settings['rbt_portfolio_columns_for_desktop']); ?> col-md-<?php echo esc_attr($settings['rbt_portfolio_columns_for_laptop']); ?> col-sm-<?php echo esc_attr($settings['rbt_portfolio_columns_for_tablet']); ?> col-<?php echo esc_attr($settings['rbt_portfolio_columns_for_mobile']); ?>">
                                    <div class="portfolio">
                                        <div class="thumbnail-inner">
                                            <div class="thumbnail image-1"
                                                 style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                            <div class="bg-blr-image image-1"
                                                 style="background-image: url(<?php the_post_thumbnail_url($settings['portfolio_thumb_size_size']); ?>)"></div>
                                        </div>
                                        <div class="content">
                                            <div class="inner">
                                                <?php if ($terms && !is_wp_error($terms)): ?>
                                                    <p><?php foreach ($terms as $term) { ?>
                                                            <span><?php echo esc_html($term->name); ?></span>
                                                        <?php } ?>
                                                    </p>
                                                <?php endif ?>
                                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php if ($trydo_options['trydo_enable_case_study_button'] == 'yes') { ?>
                                                    <div class="portfolio-button">
                                                        <a class="rn-btn"
                                                           href="<?php the_permalink(); ?>"><?php echo esc_html($trydo_options['trydo_enable_case_study_button_text']); ?></a>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <a class="transparent-link" href="<?php the_permalink(); ?>"></a>
                                    </div>
                                </div>
                            <?php } ?> <!-- End While  -->
                            <?php
                            if($settings['trydo_portfolio_pagination'] == 'yes' && '-1' != $settings['posts_per_page'] ){ ?>
                                <div class="col-lg-12">
                                    <div class="rn-pagination text-center mt--60 mt_sm--30">
                                        <?php
                                        $big = 999999999; // need an unlikely integer

                                        if (get_query_var('paged')) {
                                            $paged = get_query_var('paged');
                                        } else if (get_query_var('page')) {
                                            $paged = get_query_var('page');
                                        } else {
                                            $paged = 1;
                                        }
                                        echo paginate_links( array(
                                            'base'       => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                            'format'     => '?paged=%#%',
                                            'current'    => $paged,
                                            'total'      => $query->max_num_pages,
                                            'type'       =>'list',
                                            'prev_text'  =>'<i class="fas fa-angle-left"></i>',
                                            'next_text'  =>'<i class="fas fa-angle-right"></i>',
                                            'show_all'   => false,
                                            'end_size'   => 1,
                                            'mid_size'   => 4,
                                        ) );
                                        ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Start Portfolio Area  -->
        <?php }

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Portfolio());


