<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class Trydo_Elementor_Widget_Team extends Widget_Base
{

    use \Elementor\TrydoElementCommonFunctions;

    public function get_name()
    {
        return 'trydo-team';
    }

    public function get_title()
    {
        return esc_html__('Team', 'trydo');
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
        return ['team', 'member', 'crew', 'staff', 'person', 'trydo'];
    }

    protected static function get_profile_names()
    {
        return [
            '500px' => esc_html__('500px', 'trydo'),
            'apple' => esc_html__('Apple', 'trydo'),
            'behance' => esc_html__('Behance', 'trydo'),
            'bitbucket' => esc_html__('BitBucket', 'trydo'),
            'codepen' => esc_html__('CodePen', 'trydo'),
            'delicious' => esc_html__('Delicious', 'trydo'),
            'deviantart' => esc_html__('DeviantArt', 'trydo'),
            'digg' => esc_html__('Digg', 'trydo'),
            'dribbble' => esc_html__('Dribbble', 'trydo'),
            'email' => esc_html__('Email', 'trydo'),
            'facebook' => esc_html__('Facebook', 'trydo'),
            'flickr' => esc_html__('Flicker', 'trydo'),
            'foursquare' => esc_html__('FourSquare', 'trydo'),
            'github' => esc_html__('Github', 'trydo'),
            'houzz' => esc_html__('Houzz', 'trydo'),
            'instagram' => esc_html__('Instagram', 'trydo'),
            'jsfiddle' => esc_html__('JS Fiddle', 'trydo'),
            'linkedin' => esc_html__('LinkedIn', 'trydo'),
            'medium' => esc_html__('Medium', 'trydo'),
            'pinterest' => esc_html__('Pinterest', 'trydo'),
            'product-hunt' => esc_html__('Product Hunt', 'trydo'),
            'reddit' => esc_html__('Reddit', 'trydo'),
            'slideshare' => esc_html__('Slide Share', 'trydo'),
            'snapchat' => esc_html__('Snapchat', 'trydo'),
            'soundcloud' => esc_html__('SoundCloud', 'trydo'),
            'spotify' => esc_html__('Spotify', 'trydo'),
            'stack-overflow' => esc_html__('StackOverflow', 'trydo'),
            'tripadvisor' => esc_html__('TripAdvisor', 'trydo'),
            'tumblr' => esc_html__('Tumblr', 'trydo'),
            'twitch' => esc_html__('Twitch', 'trydo'),
            'twitter' => esc_html__('Twitter', 'trydo'),
            'vimeo' => esc_html__('Vimeo', 'trydo'),
            'vk' => esc_html__('VK', 'trydo'),
            'website' => esc_html__('Website', 'trydo'),
            'whatsapp' => esc_html__('WhatsApp', 'trydo'),
            'wordpress' => esc_html__('WordPress', 'trydo'),
            'xing' => esc_html__('Xing', 'trydo'),
            'yelp' => esc_html__('Yelp', 'trydo'),
            'youtube' => esc_html__('YouTube', 'trydo'),
        ];
    }

    protected function register_controls()
    {

        $this->start_controls_section(
            'trydo_team',
            [
                'label' => esc_html__('Team', 'trydo'),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => esc_html__('Photo', 'trydo'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'none',
            ]
        );
        $this->add_responsive_control(
            'image_height',
            [
                'label' => esc_html__('Height', 'trydo'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'range' => [
                    'px' => [
                        'min' => 100,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team, {{WRAPPER}} .team .thumbnail, {{WRAPPER}} .team .thumbnail img, {{WRAPPER}} .team-static, {{WRAPPER}} .team-static .thumbnail, {{WRAPPER}} .team-static .thumbnail img' => 'height: {{SIZE}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Name', 'trydo'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => 'Member Name',
                'placeholder' => esc_html__('Type Member Name', 'trydo'),
                'separator' => 'before',
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'job_title',
            [
                'label' => esc_html__('Job Title', 'trydo'),
                'label_block' => true,
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Sr. Web Developer', 'trydo'),
                'placeholder' => esc_html__('Type Member Job Title', 'trydo'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'title_tag',
            [
                'label' => esc_html__('Title HTML Tag', 'trydo'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'h1' => [
                        'title' => esc_html__('H1', 'trydo'),
                        'icon' => 'eicon-editor-h1'
                    ],
                    'h2' => [
                        'title' => esc_html__('H2', 'trydo'),
                        'icon' => 'eicon-editor-h2'
                    ],
                    'h3' => [
                        'title' => esc_html__('H3', 'trydo'),
                        'icon' => 'eicon-editor-h3'
                    ],
                    'h4' => [
                        'title' => esc_html__('H4', 'trydo'),
                        'icon' => 'eicon-editor-h4'
                    ],
                    'h5' => [
                        'title' => esc_html__('H5', 'trydo'),
                        'icon' => 'eicon-editor-h5'
                    ],
                    'h6' => [
                        'title' => esc_html__('H6', 'trydo'),
                        'icon' => 'eicon-editor-h6'
                    ]
                ],
                'default' => 'h4',
                'toggle' => false,
                'separator' => 'before',
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
        $this->add_control(
            'team_layout',
            [
                'label' => esc_html__('Select Layout', 'trydo'),
                'type' => Controls_Manager::SELECT,
                'default' => 'layout-1',
                'options' => [
                    'layout-1' => esc_html__('Layout One', 'trydo'),
                    'layout-2' => esc_html__('Layout Two', 'trydo'),
                    'layout-3' => esc_html__('Layout Three', 'trydo'),
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social',
            [
                'label' => esc_html__('Social Profiles', 'trydo'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Profile Name', 'trydo'),
                'type' => Controls_Manager::SELECT2,
                'label_block' => true,
                'select2options' => [
                    'allowClear' => false,
                ],
                'options' => self::get_profile_names()
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => esc_html__('Profile Link', 'trydo'),
                'placeholder' => esc_html__('Add your profile link', 'trydo'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'autocomplete' => false,
                'show_external' => false,
                'condition' => [
                    'name!' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $repeater->add_control(
            'email_link', [
                'label' => esc_html__('Add your email', 'trydo'),
                'placeholder' => esc_html__('Add your email', 'trydo'),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'name' => 'email'
                ],
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );
        $this->add_control(
            'profiles',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '<# print(name.slice(0,1).toUpperCase() + name.slice(1)) #>',
                'default' => [
                    [
                        'link' => ['url' => 'https://facebook.com/'],
                        'name' => 'facebook'
                    ],
                    [
                        'link' => ['url' => 'https://linkedin.com/'],
                        'name' => 'linkedin'
                    ],
                    [
                        'link' => ['url' => 'https://twitter.com/'],
                        'name' => 'twitter'
                    ]
                ],
            ]
        );

        $this->add_control(
            'show_profiles',
            [
                'label' => esc_html__('Show Profiles', 'trydo'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Show', 'trydo'),
                'label_off' => esc_html__('Hide', 'trydo'),
                'return_value' => 'yes',
                'default' => 'yes',
                'separator' => 'before',
                'style_transfer' => true,
            ]
        );


        $this->end_controls_section();

        $this->rbt_basic_style_controls('team_name', 'Name', '.title');
        $this->rbt_basic_style_controls('team_job_title', 'Job Title', '.designation');
        $this->start_controls_section(
            '_section_team_profiles',
            [
                'label' => esc_html__('Social Icons', 'trydo'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'links_spacing',
            [
                'label' => esc_html__('Right Spacing', 'trydo'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team ul.social-icon li:not(:last-child), {{WRAPPER}} .team-static ul.social-transparent li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_padding',
            [
                'label' => esc_html__('Padding', 'trydo'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team ul.social-icon li a, {{WRAPPER}} .team-static ul.social-transparent li a' => 'padding: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'links_icon_size',
            [
                'label' => esc_html__('Icon Size', 'trydo'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px'],
                'selectors' => [
                    '{{WRAPPER}} .team ul.social-icon li a, {{WRAPPER}} .team-static ul.social-transparent li a' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'links_color',
            [
                'label' => esc_html__('Icon Color', 'trydo'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team ul.social-icon li a, {{WRAPPER}} .team-static ul.social-transparent li a' => 'color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_tab();

        $this->end_controls_tab();
        $this->end_controls_tabs();


    }

    protected function render($instance = [])
    {

        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('title', 'class', 'title');


        if ('layout-2' == $settings['team_layout']) { ?>
            <div class="team-static <?php echo esc_attr($settings['align']); ?>">
                <?php if ($settings['image']['url'] || $settings['image']['id']) :
                    $this->add_render_attribute('image', 'src', $settings['image']['url']);
                    $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
                    $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
                    $settings['hover_animation'] = 'disable-animation';
                    ?>
                    <div class="thumbnail">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                    </div>
                <?php endif; ?>
                <div class="inner">
                    <div class="content">
                        <?php if ($settings['title']) :
                            printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                rbt_kses_basic($settings['title'])
                            );
                        endif; ?>

                        <?php if ($settings['job_title']) : ?>
                            <p class="designation"><?php echo rbt_kses_basic($settings['job_title']); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                        <ul class="social-transparent liststyle d-flex">
                            <?php
                            foreach ($settings['profiles'] as $profile) :
                                $icon = $profile['name'];
                                $url = esc_url($profile['link']['url']);
                                $email = esc_html($profile['email_link']);

                                if( $icon == 'email' ){
                                    printf('<li><a target="_blank" rel="noopener"  href="mailto:%s" class="elementor-repeater-item-%s"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>',
                                        $email,
                                        esc_attr($profile['_id'])
                                    );
                                } else {
                                    printf('<li><a target="_blank" rel="noopener"  href="%s" class="elementor-repeater-item-%s"><i class="fab fa-%s" aria-hidden="true"></i></a></li>',
                                        $url,
                                        esc_attr($profile['_id']),
                                        esc_attr($icon)
                                    );
                                }

                            endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        <?php } elseif ('layout-3' == $settings['team_layout']) { ?>
            <!-- Start Single Team Area  -->
            <div class="team team-style--bottom <?php echo esc_attr($settings['align']); ?>">
                    <?php if ($settings['image']['url'] || $settings['image']['id']) :
                        $this->add_render_attribute('image', 'src', $settings['image']['url']);
                        $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
                        $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
                        $settings['hover_animation'] = 'disable-animation';
                        ?>
                        <div class="thumbnail">
                            <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                        </div>
                    <?php endif; ?>
                    <div class="content">
                        <?php if ($settings['title']) :
                            printf('<%1$s %2$s>%3$s</%1$s>',
                                tag_escape($settings['title_tag']),
                                $this->get_render_attribute_string('title'),
                                rbt_kses_basic($settings['title'])
                            );
                        endif; ?>

                        <?php if ($settings['job_title']) : ?>
                            <p class="designation"><?php echo rbt_kses_basic($settings['job_title']); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                        <ul class="social-icon">
                            <?php
                            foreach ($settings['profiles'] as $profile) :
                                $icon = $profile['name'];
                                $url = esc_url($profile['link']['url']);
                                $email = esc_html($profile['email_link']);

                                if( $icon == 'email' ){
                                    printf('<li><a target="_blank" rel="noopener"  href="mailto:%s" class="elementor-repeater-item-%s"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>',
                                        $email,
                                        esc_attr($profile['_id'])
                                    );
                                } else {
                                    printf('<li><a target="_blank" rel="noopener"  href="%s" class="elementor-repeater-item-%s"><i class="fab fa-%s" aria-hidden="true"></i></a></li>',
                                        $url,
                                        esc_attr($profile['_id']),
                                        esc_attr($icon)
                                    );
                                }

                            endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            <!-- End Single Team Area  -->
        <?php } else { ?>
            <div class="team <?php echo esc_attr($settings['align']); ?>">
                <?php if ($settings['image']['url'] || $settings['image']['id']) :
                    $this->add_render_attribute('image', 'src', $settings['image']['url']);
                    $this->add_render_attribute('image', 'alt', Control_Media::get_image_alt($settings['image']));
                    $this->add_render_attribute('image', 'title', Control_Media::get_image_title($settings['image']));
                    $settings['hover_animation'] = 'disable-animation';
                    ?>
                    <div class="thumbnail">
                        <?php echo Group_Control_Image_Size::get_attachment_image_html($settings, 'thumbnail', 'image'); ?>
                    </div>
                <?php endif; ?>
                <div class="content">
                    <?php if ($settings['title']) :
                        printf('<%1$s %2$s>%3$s</%1$s>',
                            tag_escape($settings['title_tag']),
                            $this->get_render_attribute_string('title'),
                            rbt_kses_basic($settings['title'])
                        );
                    endif; ?>

                    <?php if ($settings['job_title']) : ?>
                        <p class="designation"><?php echo rbt_kses_basic($settings['job_title']); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ($settings['show_profiles'] && is_array($settings['profiles'])) : ?>
                    <ul class="social-icon">
                        <?php
                        foreach ($settings['profiles'] as $profile) :
                            $icon = $profile['name'];
                            $url = (!empty($profile['link']['url'])) ? $profile['link']['url'] : "#";
                            $email = esc_html($profile['email_link']);

                            if( $icon == 'email' ){
                                printf('<li><a rel="noopener"  href="mailto:%s" class="elementor-repeater-item-%s"><i class="fas fa-envelope" aria-hidden="true"></i></a></li>',
                                    $email,
                                    esc_attr($profile['_id'])
                                );
                            } else {
                                printf('<li><a target="_blank" rel="noopener"  href="%s" class="elementor-repeater-item-%s"><i class="fab fa-%s" aria-hidden="true"></i></a></li>',
                                    $url,
                                    esc_attr($profile['_id']),
                                    esc_attr($icon)
                                );
                            }

                        endforeach; ?>
                    </ul>
                <?php endif; ?>

            </div>
        <?php }

    }

}

Plugin::instance()->widgets_manager->register_widget_type(new Trydo_Elementor_Widget_Team());


