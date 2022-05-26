<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly



class Trydo_Elementor_Widget_PortfolioMeta extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-portfolio-meta';
    }

    public function get_title()
    {
        return esc_html__('Portfolio Meta', 'trydo');
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
        return ['meta', 'portfolio', 'portfolio meta', 'trydo'];
    }

    protected function register_controls()
    {

//        $this->start_controls_section(
//            'trydo_portfolio_meta',
//            [
//                'label' => esc_html__('Portfolio Meta', 'trydo'),
//            ]
//        );
//
//        $this->end_controls_section();

    }

    protected function render($instance = [])
    {
        $settings = $this->get_settings_for_display();
        $Helper = new \Helper();
        $trydo_options = $Helper->trydo_get_options();

        ?>
        <div class="portfolio-view-list d-flex flex-wrap">
            <?php if( !empty(get_field( "client" )) && $trydo_options['trydo_enable_client_name_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($trydo_options['trydo_client_name_text']); ?></span>
                    <h4><?php echo get_field( "client" ); ?></h4>
                </div>
            <?php } ?>
            <?php if( !empty(get_field( "release_date" ))  && $trydo_options['trydo_enable_release_date_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($trydo_options['trydo_release_date_text']); ?></span>
                    <h4>
                        <?php
                        $format_in = 'Y-m-d'; // the format your value is saved in (set in the field options)
                        $format_out = get_option('date_format'); // the format you want to end up with
                        $date = \DateTime::createFromFormat($format_in, get_field( "release_date" ));
                        echo $date->format( $format_out );
                        ?>
                    </h4>
                </div>
            <?php } ?>
            <?php if( !empty(get_field( "project_types" ))  && $trydo_options['trydo_enable_project_types_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($trydo_options['trydo_project_types_text']); ; ?></span>
                    <h4><?php echo get_field( "project_types" ); ?></h4>
                </div>
            <?php } ?>
            <?php if( !empty(get_field( "live_link" )) && $trydo_options['trydo_enable_live_preview_meta'] == 'yes'){ ?>
                <div class="port-view"><span><?php echo esc_html($trydo_options['trydo_live_preview_text']); ; ?></span>
                    <a class="rn-button-style--2 btn_solid btn-size-sm" href="<?php echo esc_url(get_field( "live_link" )); ?>"><?php echo esc_html($trydo_options['trydo_live_preview_button_text']); ; ?></a>
                </div>
            <?php } ?>
        </div>
        <?php
    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_PortfolioMeta());