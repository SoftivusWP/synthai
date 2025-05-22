<?php

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Utils;
use Elementor\Modules\DynamicTags\Module as TagsModule;

defined( 'ABSPATH' ) || die();

class Themephi_Elementor_Video_Button_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve counter widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tp-video-button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve counter widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'TP Video Button', 'tp-elements' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve counter widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-multimedia';
	}

	/**
	 * Retrieve the list of scripts the counter widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.3.0
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_categories() {
        return [ 'pielements_category' ];
    }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the widget belongs to.
	 *
	 * @since 2.1.0
	 * @access public
	 *
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'video-button' ];
	}

	/**
	 * Register counter widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'section_counter',
			[
				'label' => esc_html__( 'Video Button Content', 'tp-elements' ),
			]
		);

        $this->add_control(
            'video_type',
            [
                'label'     => esc_html__( 'Source', 'tp-elements' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'youtube',
                'options'   => [
                    'youtube'       => esc_html__( 'YouTube', 'tp-elements' ),
                    'vimeo'         => esc_html__( 'Vimeo', 'tp-elements' ),
                    'dailymotion'   => esc_html__( 'Dailymotion', 'tp-elements' ),
                    'hosted'        => esc_html__( 'Self Hosted', 'tp-elements' )
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'row_column_direction',
            [
                'label'     => esc_html__( 'Row Direction', 'tp-elements' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'column',
                'options'   => [
                    'row'       => esc_html__( 'Row', 'tp-elements' ),
                    'column'    => esc_html__( 'Column', 'tp-elements' ),
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'youtube_url',
            [
                'label'         => esc_html__( 'Link', 'tp-elements' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ]
                ],
                'placeholder'   => esc_html__( 'Enter your URL', 'tp-elements' ) . ' (YouTube)',
                'default'       => 'https://www.youtube.com/watch?v=XHOmBV4js_E',
                'label_block'   => true,
                'condition'     => [
                    'video_type'    => 'youtube'
                ],
                'frontend_available' => true
            ]
        );

        $this->add_control(
            'vimeo_url',
            [
                'label'         => esc_html__( 'Link', 'tp-elements' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ],
                ],
                'placeholder'   => esc_html__( 'Enter your URL', 'tp-elements' ) . ' (Vimeo)',
                'default'       => 'https://vimeo.com/235215203',
                'label_block'   => true,
                'condition'     => [
                    'video_type'    => 'vimeo'
                ]
            ]
        );

        $this->add_control(
            'dailymotion_url',
            [
                'label'         => esc_html__( 'Link', 'tp-elements' ),
                'type'          => Controls_Manager::TEXT,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ],
                ],
                'placeholder'   => esc_html__( 'Enter your URL', 'tp-elements' ) . ' (Dailymotion)',
                'default'       => 'https://www.dailymotion.com/video/x6tqhqb',
                'label_block'   => true,
                'condition'     => [
                    'video_type'    => 'dailymotion'
                ]
            ]
        );

        $this->add_control(
            'insert_url',
            [
                'label'     => esc_html__( 'External URL', 'tp-elements' ),
                'type'      => Controls_Manager::SWITCHER,
                'condition' => [
                    'video_type'    => 'hosted'
                ]
            ]
        );

        $this->add_control(
            'hosted_url',
            [
                'label'         => esc_html__( 'Choose File', 'tp-elements' ),
                'type'          => Controls_Manager::MEDIA,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::MEDIA_CATEGORY
                    ],
                ],
                'media_type'    => 'video',
                'condition'     => [
                    'video_type'    => 'hosted',
                    'insert_url'    => ''
                ]
            ]
        );

        $this->add_control(
            'external_url',
            [
                'label'         => esc_html__( 'URL', 'tp-elements' ),
                'type'          => Controls_Manager::URL,
                'autocomplete'  => false,
                'options'       => false,
                'label_block'   => true,
                'show_label'    => false,
                'dynamic'       => [
                    'active'        => true,
                    'categories'    => [
                        TagsModule::POST_META_CATEGORY,
                        TagsModule::URL_CATEGORY
                    ]
                ],
                'media_type'    => 'video',
                'placeholder'   => esc_html__( 'Enter your URL', 'tp-elements' ),
                'condition'     => [
                    'video_type'    => 'hosted',
                    'insert_url'    => 'yes'
                ],
            ]
        );

        $this->add_control(
            'controls',
            [
                'label' => esc_html__( 'Player Controls', 'tp-elements' ),
                'type' => Controls_Manager::SWITCHER,
                'label_off' => esc_html__( 'Hide', 'tp-elements' ),
                'label_on' => esc_html__( 'Show', 'tp-elements' ),
                'default' => 'yes',
                'condition' => [
                    'video_type!' => 'vimeo',
                ],
                'frontend_available' => true,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label' => esc_html__('Play Button Text', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__('Enter Play Button Text', 'tp-elements'),
                'default' => esc_html__('Play video', 'tp-elements'),
            ]
        );
        
        $this->add_responsive_control(
            'button_align',
            [
                'label'     => esc_html__('Button Alignment', 'tp-elements'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'      => [
                        'title'     => esc_html__('Left', 'tp-elements'),
                        'icon'      => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title'     => esc_html__('Center', 'tp-elements'),
                        'icon'      => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title'     => esc_html__('Right', 'tp-elements'),
                        'icon'      => 'eicon-text-align-right',
                    ]
                ],
                'default'   => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .tp_video_button_container' => 'text-align: {{VALUE}};',
                ],
                'prefix_class' => 'tp-video-button-alignment%s-'
            ]
        );

		$this->add_control(
			'color',
			[
				'label' => esc_html__( 'Color', 'tp-elements' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'condition' => [
                    'video_type' => ['vimeo', 'dailymotion'],
                ],
			]
		);

        $this->add_control(
            'hide_icon',
            [
                'label'     => esc_html__( 'Hide Icon', 'tp-elements' ),
                'type'      => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'yes',
                'label_off'     => esc_html__('No', 'tp-elements'),
                'label_on'      => esc_html__('Yes', 'tp-elements'),
            ]
        );

        $this->add_control(
            'enable_decoration',
            [
                'label'         => esc_html__('Enable Decoration ?', 'tp-elements'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'on',
                'label_off'     => esc_html__('No', 'tp-elements'),
                'label_on'      => esc_html__('Yes', 'tp-elements'),
                'separator'     => 'before',

            ]
        );

        $this->add_control(
            'add_decoration',
            [
                'label'         => esc_html__('Select Decoration', 'tp-elements'),
                'type' => \Elementor\Controls_Manager::SELECT2,
                'multiple' => true,
				'options' => [
					'border-top-left' => esc_html__( 'Top Left', 'tp-elements' ),
					'border-top-right'  => esc_html__( 'Top Right', 'tp-elements' ),
					'border-bottom-left' => esc_html__( 'Bottom Left', 'tp-elements' ),
					'border-bottom-right' => esc_html__( 'Bottom Right', 'tp-elements' ),
                    'inside-border-top-left' => esc_html__( 'Inside Top Left', 'tp-elements' ),
                    'inside-border-top-right' => esc_html__( 'Inside Top Right', 'tp-elements' ),
                    'inside-border-bottom-right' => esc_html__( 'Inside Bottom Right', 'tp-elements' ),
                    'inside-border-bottom-left' => esc_html__( 'Inside Bottom Left', 'tp-elements' ),
                ],
                'separator'     => 'before',
                'condition' => [ 
                    'enable_decoration' => 'on'
                 ],
            ]
        );

		$this->add_control(
			'box_shadow_offset_y',
			[
				'label' => esc_html__( 'Box Shadow Offset Y', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px'],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 300,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 20,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-left, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left' => '--box-shadow-offset-y: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 
                    'enable_decoration' => 'on'
                 ],
			]
		);

        $this->add_control(
            'decoration_color',
            [
                'label' => esc_html__('Decoration Color', 'tp-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-left, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left' => '--box-shadow-color: {{VALUE}};'
                ],
                'condition' => [ 
                    'enable_decoration' => 'on'
                ],
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'decoration_border',
				'selector' => '{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-left, {{WRAPPER}} .tp-border-inside-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left',
                'condition' => [ 
                    'enable_decoration' => 'on'
                ],
			]
		);

        $this->end_controls_section();

        // ------------------------------------ //
        // ---------- Video Settings ---------- //
        // ------------------------------------ //
        $this->start_controls_section(
            'section_settings',
            [
                'label' => esc_html__('Video Button Settings', 'tp-elements'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label'         => esc_html__('Button Padding', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .tp_video_button_widget .elementor-custom-embed-play-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'button_radius',
            [
                'label'         => esc_html__('Border Radius', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .elementor-custom-embed-play-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => esc_html__('Button Text Typography', 'tp-elements'),
                'selector' => '{{WRAPPER}} .tp_button_text'
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'button_bg_image',
                'fields_options' => [
                    'background' => [
                        'label' => esc_html__( 'Button Background Image', 'tp-elements' )
                    ]                    
                ],
                'exclude' => ['color'],
                'types' => [ 'classic' ],
                'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon',
                'condition' => [
                    'hide_icon!' => 'on'
                ]
            ]
        );

        $this->add_responsive_control(
            'button_text_margin',
            [
                'label'         => esc_html__('Button Text Margin', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .tp_button_text' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->start_controls_tabs('button_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'tab_button_normal',
                [
                    'label' => esc_html__('Normal', 'tp-elements')
                ]
            );

                $this->add_control(
                    'button_text_color',
                    [
                        'label' => esc_html__('Button Text Color', 'tp-elements'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp_button_text' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'button_bg_color',
                    [   
                        'label' => esc_html__('Button Background Color', 'tp-elements'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .elementor-custom-embed-play-icon' => 'background-color: {{VALUE}};',
                            '{{WRAPPER}}.tp-video-button-decoration-on .elementor-custom-embed-image-overlay:before, {{WRAPPER}}.tp-video-button-decoration-on .elementor-custom-embed-image-overlay:after' => 'box-shadow: 0 20px 0 0 {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'button_border',
                        'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon',
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'tab_button_hover',
                [
                    'label' => esc_html__('Hover', 'tp-elements')
                ]
            );

                $this->add_control(
                    'button_text_hover',
                    [
                        'label' => esc_html__('Button Text Hover', 'tp-elements'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .elementor-custom-embed-play-icon:hover .tp_button_text' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_control(
                    'button_bg_hover',
                    [   
                        'label' => esc_html__('Button Background Hover Color', 'tp-elements'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:not(.tp-video-button-decoration-on) .elementor-custom-embed-play-icon:hover' => 'background-color: {{VALUE}};',
                        ]
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'button_border_hover',
                        'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon:hover',
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        
        // ------------------------------------ //
        // ---------- Trigger Settings ---------- //
        // ------------------------------------ //
        $this->start_controls_section(
            'play_icon_settings',
            [
                'label' => esc_html__('Trigger Button Settings', 'tp-elements'),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_responsive_control(
            'play_icon_margin',
            [
                'label'         => esc_html__('Trigger Button margin', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .tp_video_button_widget .elementor-custom-embed-play-icon .icon-play-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );
        $this->add_responsive_control(
            'play_icon_padding',
            [
                'label'         => esc_html__('Trigger Button Padding', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .tp_video_button_widget .elementor-custom-embed-play-icon .icon-play-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_button_size',
            [
                'label' => esc_html__('Trigger Button Size', 'tp-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 250,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp_video_button_widget .icon-play-wrapper' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; line-height: {{SIZE}}{{UNIT}};',
                ],
                'separator' => 'before'
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'tp-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 5,
                        'max' => 100,
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp_video_button_widget .fa-play' => 'font-size: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'play_icon_radius',
            [
                'label'         => esc_html__('Trigger Border Radius', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%'],
                'selectors'     => [
                    '{{WRAPPER}} .elementor-custom-embed-play-icon .icon-play-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'play_icon_align',
            [
                'label'     => esc_html__('Trigger Alignment', 'tp-elements'),
                'type'      => Controls_Manager::CHOOSE,
                'options'   => [
                    'left'      => [
                        'title'     => esc_html__('Left', 'tp-elements'),
                        'icon'      => 'eicon-text-align-left',
                    ],
                    'center'    => [
                        'title'     => esc_html__('Center', 'tp-elements'),
                        'icon'      => 'eicon-text-align-center',
                    ],
                    'right'     => [
                        'title'     => esc_html__('Right', 'tp-elements'),
                        'icon'      => 'eicon-text-align-right',
                    ]
                ],
                'default'   => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .icon-play-wrapper' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->start_controls_tabs('trigger_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'tab_trigger_normal',
                [
                    'label' => esc_html__('Normal', 'tp-elements')
                ]
            );

                $this->add_control(
                    'icon_color',
                    [
                        'label' => esc_html__('Icon Color', 'tp-elements'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .tp_video_button_widget .fa-play' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'play_icon_bg',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Trigger Background', 'tp-elements' )
                            ]                    
                        ],
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon .icon-play-wrapper',
                        'condition' => [
                            'hide_icon!' => 'on'
                        ]
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'icon_border',
                        'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon .icon-play-wrapper',
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'tab_trigger_hover',
                [
                    'label' => esc_html__('Hover', 'tp-elements')
                ]
            );

                $this->add_control(
                    'icon_hover',
                    [
                        'label' => esc_html__('Icon Hover', 'tp-elements'),
                        'type' => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .elementor-custom-embed-play-icon:hover .fa-play' => 'color: {{VALUE}};'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'play_icon_bg_hover',
                        'fields_options' => [
                            'background' => [
                                'label' => esc_html__( 'Trigger Background', 'tp-elements' )
                            ]                    
                        ],
                        'types' => [ 'classic', 'gradient' ],
                        'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon:hover .icon-play-wrapper',
                        'condition' => [
                            'hide_icon!' => 'on'
                        ]
                    ]
                );

                $this->add_group_control(
                    \Elementor\Group_Control_Border::get_type(),
                    [
                        'name' => 'icon_border_hover',
                        'selector' => '{{WRAPPER}} .elementor-custom-embed-play-icon:hover .icon-play-wrapper',
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

	}

	/**
	 * Render counter widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	/**
	 * Render counter widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {	
		$settings = $this->get_settings_for_display();	
	
		$youtube_url = $settings['youtube_url'];
		$vimeo_url = $settings['vimeo_url'];
		$dailymotion_url = $settings['dailymotion_url'];
		$video_type = $settings['video_type'];
		$insert_url = $settings['insert_url'];        
		$hosted_url = $settings['hosted_url'];
		$external_url = $settings['external_url'];
		$button_text = $settings['button_text'];
		$hide_icon = $settings['hide_icon'];

		?>

		<style>

        .tp_video_button_widget {
            position: relative;
            z-index: 1;
        }

		.tp_video_button_container {
			line-height: 1;
		}

        .tp-video-button-alignment-left .icon-play-wrapper {
            margin-right: auto;
        }
        .tp-video-button-alignment-center .icon-play-wrapper {
            margin: 0 auto;
        }
        .tp-video-button-alignment-right .icon-play-wrapper {
            margin-left: auto;
        }

		</style>
	
		<div class="tp_video_button_container">
			<div class="tp_video_button_widget  ">

            <?php if (!empty($settings['enable_decoration']) && !empty($settings['add_decoration'])) { 

            foreach ( $settings['add_decoration'] as $item ) {
				echo '<span class="tp-border-decoration-' . $item . ' "></span>';
			}
        
            }
            
            ?>

				<?php 
					if( ( $video_type == 'youtube' && !empty($youtube_url) ) ||
						( $video_type == 'vimeo' && !empty($vimeo_url) ) ||
						( $video_type == 'dailymotion' && !empty($dailymotion_url) ) ||
						( $video_type == 'hosted' && (
								!empty($insert_url) ||
								!empty($hosted_url) ||
								!empty($external_url)  
							) ) 
					) {
						$video_url = $settings[ $settings['video_type'] . '_url' ];
	
						if ( 'hosted' === $settings['video_type'] ) {
							$video_url = $this->get_hosted_video_url();
						} else {
							$embed_params = $this->get_embed_params();
							$embed_options = $this->get_embed_options();
						}
						
						$this->add_render_attribute( 'video-wrapper', 'class', 'elementor-wrapper' );
	
						$this->add_render_attribute( 'video-wrapper', 'class', 'elementor-open-lightbox' );
						?>
						<div <?php $this->print_render_attribute_string( 'video-wrapper' ); ?>>
							<?php
								if ( 'hosted' === $settings['video_type'] ) {
									$lightbox_url = $video_url;
								} else {
									$lightbox_url = \Elementor\Embed::get_embed_url( $video_url, $embed_params, $embed_options );
								}
	
								$lightbox_options = [
									'type'          => 'video',
									'videoType'     => $settings['video_type'],
									'url'           => $lightbox_url,
									'modalOptions'  => [
										'id'                        => 'elementor-lightbox-' . $this->get_id(),
										'videoAspectRatio'          => '169'
									],
								];
								if('hosted' === $video_type) {
									$lightbox_options['videoParams'] = $this->get_hosted_params();
								}
	
								$this->add_render_attribute( 'image-overlay', 'class', 'elementor-custom-embed-image-overlay' );
	
								$this->add_render_attribute( 'image-overlay', [
									'data-elementor-open-lightbox'  => 'yes',
									'data-elementor-lightbox'       => wp_json_encode( $lightbox_options ),
								] );
	
								if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
									$this->add_render_attribute( 'image-overlay', [
										'class' => 'elementor-clickable',
									] );
								}
							?>
							<div <?php $this->print_render_attribute_string( 'image-overlay' ); ?>>
								<div class="elementor-custom-embed-play-icon <?php if( $settings['row_column_direction'] == 'row' ) : ?> d-flex align-items-center gap-3 <?php endif; ?>" role="button">
									<?php
										if( $hide_icon !== 'yes' ) { ?>
											<div class="icon-play-wrapper">
												<!-- <i class="tp fa-play"></i> -->
                                                <i class="fas fa-play"></i>
											</div>
										<?php }
									?>                                    
									<?php
										if ($button_text !== '') {
											?>
											<span class="tp_button_text"><?php echo esc_html($button_text); ?></span>
											<?php
										}                                        
									?>
									<span class="elementor-screen-only"><?php echo ($button_text !== '' ? esc_html($button_text) : esc_html__('Watch video', 'tp-elements')); ?></span>
								</div>
							</div>
						</div>
					<?php }
				?>
			</div>
		</div>
	
	<?php 
	}
	
	public function get_embed_params() {
		$settings = $this->get_settings_for_display();      
		$params = [];
		$params_dictionary = [];
	
		if ( isset($settings['color']) ) {
			$color_value = str_replace('#', '', $settings['color']);
		} else {
			$color_value = ''; 
		}
	
		if ( 'youtube' === $settings['video_type'] ) {
			$params_dictionary = [];
			$params['wmode'] = 'opaque';
		} elseif ( 'vimeo' === $settings['video_type'] ) {
			$params_dictionary = [
				'mute'              => 'muted',
				'vimeo_title'       => 'title',
				'vimeo_portrait'    => 'portrait',
				'vimeo_byline'      => 'byline'
			];
			$params['color'] = $color_value; 
			$params['autopause'] = '0';
		} elseif ( 'dailymotion' === $settings['video_type'] ) {
			$params_dictionary = [
				'showinfo'  => 'ui-start-screen-info',
				'logo'      => 'ui-logo',
			];
			$params['ui-highlight'] = $color_value; 
			$params['endscreen-enable'] = '0';
		}
	
		foreach ( $params_dictionary as $key => $param_name ) {
			$setting_name = $param_name;
			if ( is_string( $key ) ) {
				$setting_name = $key;
			}
	
			$setting_value = isset($settings[$setting_name]) ? ( $settings[$setting_name] ? '1' : '0' ) : '0';
			$params[$param_name] = $setting_value;
		}
	
		return $params;
	}	

	private function get_hosted_video_url() {
		$settings = $this->get_settings_for_display();
	
		if ( ! empty( $settings['insert_url'] ) ) {
			$video_url = $settings['external_url']['url'];
		} else {
			$video_url = $settings['hosted_url']['url'];
		}
		if ( empty( $video_url ) ) {
			return '';
		}
		return $video_url;
	}    
	
	private function get_embed_options() {
		$settings = $this->get_settings_for_display();
		$embed_options = [];
		if ( 'youtube' === $settings['video_type'] ) {
			$embed_options['privacy'] = 'no';
		}
		return $embed_options;
	}
	
	private function get_hosted_params() {
		$settings = $this->get_settings_for_display();
	
		$video_params = ['autoplay' => true, 'loop' => false];
	
		if($settings['controls']) {
			$video_params['controls'] = true;
		}
	
		return $video_params;
	}
}