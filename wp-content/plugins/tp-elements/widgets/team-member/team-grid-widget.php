<?php

use Elementor\Group_Control_Css_Filter;
use Elementor\Repeater;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Core\Schemes\Typography;
use Elementor\Utils;

defined( 'ABSPATH' ) || die();

class Themephi_Elementor_Team_Grid_Widget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve rsgallery widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'tp-team-member';
	}		

	/**
	 * Get widget title.
	 *
	 * Retrieve rsgallery widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'TP Team Grid', 'tp-elements' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve rsgallery widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'glyph-icon flaticon-network';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the rsgallery widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
        return [ 'pielements_category' ];
    }

	

	/**
	 * Register team grid widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'tp-elements' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'team_grid_source',
			[
				'label'   => esc_html__( 'Select Team Type', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'custom',				
				'options' => [
					'custom' => esc_html__('Custom', 'tp-elements'),
					'dynamic' => esc_html__('Dynamic', 'tp-elements')					
				],											
			]
		);


		$this->add_control(
			'team_grid_style',
			[
				'label'   => esc_html__( 'Select Style', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',				
				'options' => [
					'style1' => esc_html__('Style 1', 'tp-elements'),
					'style2' => esc_html__('Style 2', 'tp-elements'),
					'style3' => esc_html__('Style 3', 'tp-elements'),
					'style4' => esc_html__('Style 4', 'tp-elements'),
					'style5' => esc_html__('Style 5', 'tp-elements'),
					'style6' => esc_html__('Style 6', 'tp-elements'),					
					'style7' => esc_html__('Style 7', 'tp-elements'),					
					'style8' => esc_html__('Style 8', 'tp-elements'),					
					'style9' => esc_html__('Style 9', 'tp-elements'),					
					'style10' => esc_html__('Style 10', 'tp-elements'),					
					'style11' => esc_html__('Style 11', 'tp-elements'),					
				],
				'separator' => 'before',										
			]
		);


		$this->add_control(
			'team_category',
			[
				'label'   => esc_html__( 'Category', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT2,	
				'default' => 0,			
				'options' => $this->getCategories(),
				'multiple' => true,	
				'separator' => 'before',
				'condition' => [
					'team_grid_source' => 'dynamic',
				],	
			]

		);

		

		$this->add_control(
			'per_page',
			[
				'label' => esc_html__( 'Team Show Per Page', 'tp-elements' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'example 3', 'tp-elements' ),
				'separator' => 'before',
				'condition' => [
					'team_grid_source' => 'dynamic',
				],
			]
		);
	
		$this->add_control(
			'team_columns',
			[
				'label'   => esc_html__( 'Columns', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT,	
				'default' => 4,			
				'options' => [
					'6' => esc_html__( '2 Column', 'tp-elements' ),
					'4' => esc_html__( '3 Column', 'tp-elements' ),
					'3' => esc_html__( '4 Column', 'tp-elements' ),
					'2' => esc_html__( '6 Column', 'tp-elements' ),
					'12' => esc_html__( '1 Column', 'tp-elements' ),					
				],
				'separator' => 'before',
				'condition' => [
					'team_grid_source' => 'dynamic',
				],
							
			]
		);

		$this->add_control(
				'show_filter',
				[
					'label'   => esc_html__( 'Show Filter', 'tp-elements' ),
					'type'    => Controls_Manager::SELECT,
					'default' => 'filter_hide',	
							
					'options' => [
						'filter_show' => 'Show',
						'filter_hide' => 'Hide',				
					],											
				]
			);

			$this->add_control(
				'filter_title',
				[
					'label' => esc_html__( 'Filter Default Title', 'tp-elements' ),
					'type' => Controls_Manager::TEXT,
					'default' => 'All',
					'condition' => [
	                	'show_filter' => 'filter_show',
	                ],
	                	
					'separator' => 'before',
				]
			);


		$this->add_control(
			'memeber_image',
			[
				'label' => esc_html__( 'Member Image', 'tp-elements' ),
				'type'  => Controls_Manager::MEDIA,
				
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
				'separator' => 'before',
				'condition' => [
					'team_grid_source' => 'custom',
				],
			]
		);

		$this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'thumbnail',
                'default' => 'large',
                'separator' => 'before',
                'exclude' => [
                    'custom'
                ],
                'separator' => 'before',
                'condition' => [
					'team_grid_source' => 'dynamic',
				],
            ]
        ); 

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Name', 'tp-elements' ),                
                'type' => Controls_Manager::TEXT,
                'default' => 'Elements Name',
                'placeholder' => esc_html__( 'Type Member Name', 'tp-elements' ),
                'separator' => 'before',
                'condition' => [
					'team_grid_source' => 'custom',
				],
			]

        );

        $this->add_control(
            'designation',
            [
                'label' => esc_html__( 'Designation', 'tp-elements' ),               
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Web Developer', 'tp-elements' ),
                'separator' => 'before',
                'placeholder' => esc_html__( 'Type Member Designation', 'tp-elements' ),
                'condition' => [
					'team_grid_source' => 'custom',
				],
            ]
        );
        $this->add_control(
            'phone',
            [
                'label' => esc_html__( 'Phone', 'tp-elements' ),               
                'type' => Controls_Manager::TEXT,                
                'separator' => 'before',                
                'condition' => [
					'team_grid_source' => 'custom',
				],
            ]
        );
        $this->add_control(
            'email',
            [
                'label' => esc_html__( 'Email Address', 'tp-elements' ),                
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'Enter Email Address', 'tp-elements' ),
                'separator' => 'before',               
                'condition' => [
					'team_grid_source' => 'custom',
				],
            ]
        );

        $this->add_control(
            'bio',
            [
                'label' => esc_html__( 'Short Bio', 'tp-elements' ),                
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( '', 'tp-elements' ),
                'rows' => 5,
                'separator' => 'before',
                'condition' => [
					'team_grid_source' => 'custom',
				],
            ]
        );

        $this->add_control(
            'popup_description',
            [
                'label' => esc_html__( 'Description', 'tp-elements' ),                
                'type' => Controls_Manager::TEXTAREA,
                'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ‘Content here.',
                'placeholder' => esc_html__( '', 'tp-elements' ),
                'rows' => 10,
                'separator' => 'before',
                'condition' => [
					'team_grid_source' => 'custom',
				],
            ]
        );
 		


        $this->end_controls_section();

        $this->start_controls_section(
            '_section_social',
            [
                'label' => esc_html__( 'Social Profiles', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
					'team_grid_source' => 'custom',
				],
            ]
        );


 		$repeater = new Repeater();
 		
 		$repeater->add_control(
 		    'link',
 		    [
 		        'label' => esc_html__('Enter Link', 'tp-elements'),
 		        'type' => Controls_Manager::URL,                
 		    ]
 		); 

		 $repeater->add_control(
			'social_icon_pick',
			[
				'label'     => esc_html__( 'Icon', 'tp-elements' ),
				'type'      => Controls_Manager::ICONS,
				'separator' => 'before',
			]
		);

 		$this->add_control(
 		    'social_icon_list',
 		    [
 		        'show_label' => false,
 		        'type' => Controls_Manager::REPEATER,
 		        'fields' => $repeater->get_controls(),
 		        'title_field' => '{{{ social_icon_pick.value }}}',
 		        'default' => [
                    [
                        'link' => '#',
                        'social_icon_pick' => 'fab fa-facebook-f',
                    ],
                    [
                        'link' => '#',
                        'social_icon_pick' => 'fab fa-twitter',
                    ],
                    [
                        'link' => '#',
                        'social_icon_pick' => 'fab fa-linkedin-in',
                    ],                  
                ],
 		    ]
 		);

        $this->add_control(
			'image_spacing_custom',
			[
				'label'      => esc_html__( 'Item Bottom Gap', 'tp-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'show_label' => true,
				'separator'  => 'before',
				'range' => [
					'px' => [
						'max' => 100,
					],
				],		

				'selectors' => [
                    '{{WRAPPER}} .team-item-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .team-inner-wrap' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
					'team_grid_source' => 'dynamic',
				],
			]
		);  
	
		$this->end_controls_section();

		$this->start_controls_section(
			'section_slider_style',
			[
				'label' => esc_html__( 'Team Style', 'tp-elements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style1 .team-item .team-content .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .content-area .name a, {{WRAPPER}} .team-grid-style11 .single-team-three .content-area .name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style7 .team-item .team-content h3.team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style2 .team-inner-wrap .team-img .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style3 .team-img .team-img-sec .team-content .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style4 .team-item .team-content .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap .team-content .member-desc .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style9 .hover-item.position-absolute .text-item h4 a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .content-area .name a' => 'color: {{VALUE}};',

                ],                
            ]
        );
		

        $this->add_control(
            'title_color_hover',
            [
                'label' => esc_html__( 'Title Hover Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style1 .team-item .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .content-area .name a:hover, {{WRAPPER}} .team-grid-style11 .single-team-three .content-area .name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style7 .team-item .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style2 .team-inner-wrap .team-img .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style3 .team-img .team-img-sec .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style4 .team-item .team-content .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap:hover .team-content .member-desc .team-name a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style9 .hover-item.position-absolute .text-item h4 a:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .content-area .name a:hover' => 'color: {{VALUE}};',
                ],                
            ]
            
        );

        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Title Typography', 'tp-elements' ),
				'selector' =>
                    '{{WRAPPER}} .rs-team-grid .team-item .team-name a, {{WRAPPER}} .rs-team-grid .team-name a, {{WRAPPER}} .text-item h4 a, .team-grid-style10 .single-team-three .thumbnail .content-area .name, {{WRAPPER}} .team-grid-style6 .single-team-three .content-area .name a, {{WRAPPER}} .team-grid-style11 .single-team-three .content-area .name a'
			]
		);


        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-team-grid .team-content .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .rs-team-grid .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .content-area .designation' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .content-area .designation, {{WRAPPER}} .team-grid-style11 .single-team-three .content-area .designation' => 'color: {{VALUE}};',
                ],                
            ]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'designation_typography',
				'label' => esc_html__( 'Designation Typography', 'tp-elements' ),
				'selector' => '{{WRAPPER}} .rs-team-grid .team-content .team-title, {{WRAPPER}} .rs-team-grid .image-wrap:hover .team-title.nolink, .team-grid-style10 .single-team-three .thumbnail .content-area .designation, {{WRAPPER}} .team-grid-style6 .single-team-three .content-area .designation, {{WRAPPER}} .team-grid-style11 .single-team-three .content-area .designation'
			]
		);


        $this->add_control(
            'content_hover_bg',
            [
                'label' => esc_html__( 'Content Hover Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => ['style5', 'style2'],
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap:hover .team-content' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style2 .team-inner-wrap .image-wrap:hover::before' => 'border-color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_hover_text_color',
            [
                'label' => esc_html__( 'Content Hover Text Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap:hover .team-content .member-desc .team-name a' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap:hover .team-content .member-desc .team-title' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap:hover .team-content .social-icons a i' => 'color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_color',
            [
                'label' => esc_html__( 'Content Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .team-item .team-content .team-text' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style3 .team-img .team-img-sec .team-content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style4 .team-item .team-content .team-text' => 'color: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_top_border_color',
            [
                'label' => esc_html__( 'Content Top Border Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => 'style4',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style4 .team-item .team-content .team-text::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'content_bottom_border_color',
            [
                'label' => esc_html__( 'Content Bottom Border Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => 'style5',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap .team-content::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'image_overlay',
            [
                'label' => esc_html__( 'Image Overlay', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => 'style3',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style3 .team-img .team-img-sec::before' => 'background: {{VALUE}};',

                ],                
            ]
        );


        $this->add_control(
            'image_corner_border_color',
            [
                'label' => esc_html__( 'Image Corner Border Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => 'style3',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style3 .team-img::before' => 'border-bottom-color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style3 .team-img::after' => 'border-top-color: {{VALUE}};',

                ],
            ]
        );


        $this->add_control(
            'icon_section_bg',
            [
                'label' => esc_html__( 'Icon Section Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'condition' => [
                	'team_grid_style' => 'style1',
                ],
                'selectors' => [
                    '{{WRAPPER}} .team-grid-style1 .team-item .image-wrap .social-icons1' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );
		

        $this->add_control(
			'icon_font_size',
			[
				'label' => esc_html__( 'Icon Font Size', 'tp-elements' ),
				'type' => Controls_Manager::SLIDER,
				'show_label' => true,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'default' => [
					'size' => 15,
				],				

				'selectors' => [
                     '{{WRAPPER}} .social-icons1 a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-social a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-social a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-inner-wrap .social-icons a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .social-team-wrapper ul li a i' => 'font-size: {{SIZE}}{{UNIT}}',
                     '{{WRAPPER}} .team-grid-style6 .single-team-three .thumbnail .social-team-wrapper ul li a i, {{WRAPPER}} .team-grid-style11 .single-team-three .thumbnail .social-team-wrapper ul li a i' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
                'separator' => 'before',
			]
		);


        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-icons1 a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style4 .team-item .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap .team-content .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-inner-wrap .social-icons a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .social-team-wrapper ul li a i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .thumbnail .social-team-wrapper ul li a i, {{WRAPPER}} .team-grid-style11 .single-team-three .thumbnail .social-team-wrapper ul li a i' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );

        $this->add_control(
            'icon_color_hover',
            [
                'label' => esc_html__( 'Icon Hover Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .social-icons1 a i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-social a i:hover' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style4 .team-item .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style5 .team-inner-wrap .team-content .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-inner-wrap .social-icons a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .social-team-wrapper ul li a:hover i' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .thumbnail .social-team-wrapper ul li a:hover i, {{WRAPPER}} .team-grid-style11 .single-team-three .thumbnail .social-team-wrapper ul li a:hover i' => 'color: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );

        $this->add_control(
            'icon_bg_color',
            [
                'label' => esc_html__( 'Icon Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-team-grid .team-item .team-content .social-icons a' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .social-team-wrapper ul li a i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .thumbnail .social-team-wrapper ul li a i, {{WRAPPER}} .team-grid-style11 .single-team-three .thumbnail .social-team-wrapper ul li a i' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );
        $this->add_control(
            'icon__hover_bg_color',
            [
                'label' => esc_html__( 'Icon Hover Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .rs-team-grid .team-item .team-content .social-icons a:hover' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style10 .single-team-three .thumbnail .social-team-wrapper ul li a:hover i' => 'background: {{VALUE}};',
                    '{{WRAPPER}} .team-grid-style6 .single-team-three .thumbnail .social-team-wrapper ul li a:hover i, {{WRAPPER}} .team-grid-style11 .single-team-three .thumbnail .social-team-wrapper ul li a:hover i' => 'background: {{VALUE}};',
                ],
                'separator' => 'before',                
            ]
        );

        $this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'box_shadow',
				'label' => esc_html__( 'Box Shadow', 'tp-elements' ),
				'selector' => '{{WRAPPER}} .team-content',
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => esc_html__( 'Background', 'tp-elements' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .team-content',
				
			]
		);

		$this->add_control(
		    'bubble_heading',
		    [
		        'type' => Controls_Manager::HEADING,
		        'label' => esc_html__( 'Bubbles Background', 'tp-elements' ),
		        'separator' => 'before'
		    ]
		);


        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'Bubble_left_bg',
				'label' => esc_html__( 'Bubble Left Background', 'tp-elements' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .team-grid-style7 .team-item .image-wrap:before',
				
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'bubble_right_bg',
				'label' => esc_html__( 'Bubble Right Background', 'tp-elements' ),
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .team-grid-style7 .team-item .image-wrap:after',
			]
		);

		$this->end_controls_section();



		//Popup Style Setting
		$this->start_controls_section(
			'section_popup_style',
			[
				'label' => esc_html__( 'Popup Style', 'tp-elements' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'popup_title_color',
            [
                'label' => esc_html__( 'Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,                              
            ]
        );


        $this->add_control(
            'popup_designation_color',
            [
                'label' => esc_html__( 'Designation Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,              
            ]
        );

        $this->add_control(
            'popup_content_color',
            [
                'label' => esc_html__( 'Content Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,              
            ]
        );	

        $this->add_control(
            'popup_phn_email_color',
            [
                'label' => esc_html__( 'Phone and Email Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,              
            ]
        );		

        $this->add_control(
            'popup_icon_color',
            [
                'label' => esc_html__( 'Icon Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',                
            ]
        );

        $this->add_control(
            'popup_icon_bg_color',
            [
                'label' => esc_html__( 'Icon Background Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',                
            ]
            
        );

        $this->add_control(
            'popup_background',
            [
                'label' => esc_html__( 'Background Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'separator' => 'before',                
            ]
            
        );
		$this->end_controls_section();

	}

	/**
	 * Render rsgallery widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display(); 

		$popup_title_color = !empty( $settings['popup_title_color']) ? 'style="color: '.$settings['popup_title_color'].'"' : '';
		$popup_designation_color = !empty( $settings['popup_designation_color']) ? 'style="color: '.$settings['popup_designation_color'].'"' : '';
		$popup_content_color = !empty( $settings['popup_content_color']) ? 'style="color: '.$settings['popup_content_color'].'"' : '';
		$popup_phn_email_color = !empty( $settings['popup_phn_email_color']) ? 'style="color: '.$settings['popup_phn_email_color'].'"' : '';
		$popup_background = !empty( $settings['popup_background']) ? 'style="background: '.$settings['popup_background'].'"' : '';

		//Icon Style
		$icon_style='';
		if(!empty($settings['popup_icon_color']) && empty($settings['popup_icon_bg_color'])){
			$icon_style = 'style="color: '.$settings['popup_icon_color'].'"';				
		}
		if(!empty($settings['popup_icon_bg_color'])){
			$icon_style = ($settings['popup_icon_bg_color']) ? ' style="background: '.$settings['popup_icon_bg_color'].'"' : '';
		}

		if(!empty($settings['popup_icon_color']) && !empty($settings['popup_icon_bg_color'])){
			$icon_style = 'style="background: '.$settings['popup_icon_bg_color'].'; color: '.$settings['popup_icon_color'].'"';				
		} ?>

		<?php if($settings['show_filter'] == 'filter_show') : ?>
	
			<div class="portfolio-filter">
			    <button class="active" data-filter="*"><?php echo esc_html($settings['filter_title']);?></button>
			    <?php $taxonomy = "team-category";
				    $select_cat = $settings['team_category'];
	                foreach ($select_cat as $catid) {
	                $term = get_term_by('slug', $catid, $taxonomy);
	                $term_name  =  $term->name;
	                $term_slug  =  $term->slug;
	            ?>
	            	<button data-filter=".filter_<?php echo esc_html($term_slug);?>"><?php echo esc_html($term_name);?></button>
	            <?php  } ?>

			</div>
		
		<?php endif; ?>
		<?php if($settings['team_grid_source'] == 'dynamic'){
			
			if('style1' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style1.php";
			}

			if('style2' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style2.php";
			}

			if('style3' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style3.php";
			}

			if('style4' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style4.php";
			}

			if('style5' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style5.php";
			}	

			if('style6' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style6.php";
			}		
			if('style7' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style7.php";
			}		
			if('style8' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style8.php";
			}		
			if('style9' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style9.php";
			}
			if('style10' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style10.php";
			}		
			if('style11' == $settings['team_grid_style']){
				require plugin_dir_path(__FILE__)."/style11.php";
			}		
		}else{ ?>


		<div class="rs-team-grid rs-team team-grid-<?php echo esc_html($settings['team_grid_style']);?> <?php echo esc_html($settings['team_grid_popup']);?> rsaddon_pro_box">
				<?php 
					$unique = rand(2012,3554120);
				?>
				<div class="team-item">
					<div class="team-inner-wrap">
						<div class="image-wrap">
							<a class="pointer-events" href="#rs_popupBox_<?php echo esc_attr($unique);?>" data-effect="mfp-zoom-in">
								<?php if ( $settings['memeber_image']['url'] ) : ?>
			                       <img src="<?php echo esc_url($settings['memeber_image']['url']);?>"  alt="<?php echo esc_url($settings['memeber_image']['url']);?>" />
			                    <?php endif; ?>
							</a>

							<?php if('style1' == $settings['team_grid_style']){ ?>
							<div class="social-icons1">	
								<?php foreach ( $settings['social_icon_list'] as $index => $item ) :

									$target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';                    
				            		$link         = !empty($item['link']['URL']) ? $item['link']['URL'] : '';
									$iconPick         = !empty($item['social_icon_pick']) ? $item['social_icon_pick']['value'] : '';
									?>
										<a href="<?php echo esc_url($link);?>"  <?php echo wp_kses_post($target);?> class="social-icon">
											<i class="<?php echo esc_html($iconPick); ?>"></i>
										</a>			
							        
							   <?php  endforeach; ?>   
						   </div> 
							<?php } ?>
						</div>

						<div class="team-content">
							<div class="member-desc">								
								<?php if($settings['title']):?>
						       		<h3 class="team-name"><a class="pointer-events" href="#rs_popupBox_<?php echo esc_attr($unique);?>"><?php echo esc_html($settings['title']);?></a></h3>
						        <?php endif; 

								if($settings['designation']) : ?>
									<span class="team-title"><?php echo esc_html($settings['designation']);?></span>
								<?php endif ; ?>
							</div>
							<?php if($settings['bio']): ?>
						        	<p class="team-desc"><?php echo esc_html($settings['bio']);?></p>
			                  	<?php endif; ?>								  	
						  	<?php if ( !empty(is_array( $settings['social_icon_list'] )) ) : ?>
								<div class="social-icons">	
									<?php foreach ( $settings['social_icon_list'] as $index => $item ) :

										$target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';                    
					            		$link         = !empty($item['link']['URL']) ? $item['link']['URL'] : '';
					            		$iconPick         = !empty($item['social_icon_pick']) ? $item['social_icon_pick']['value'] : '';
					            	?>

										<a href="<?php echo esc_url($link);?>"  <?php echo wp_kses_post($target);?> class="social-icon">
											<i class="<?php echo esc_html($iconPick); ?>"></i>
										</a>			
							        
							   		<?php  endforeach; ?>   
						   		</div>	
							<?php endif; ?>	
						</div>
			  		</div>
			  	</div>

  				<!-- Hidden PupupBox Text -->
				<div id="rs_popupBox_<?php echo esc_attr($unique);?>" class="rspopup_style1 mfp-with-anim mfp-hide" <?php echo wp_kses_post($popup_background);?>>
					<div class="row">
						<div class="col-md-5">
							<div class="rsteam_img">
								<?php if ( $settings['memeber_image']['url'] ) : ?>
			                       <img src="<?php echo esc_url($settings['memeber_image']['url']);?>"  alt="<?php echo esc_url($settings['memeber_image']['url']);?>" />
			                    <?php endif; ?>	
					  		</div>
						</div>
						<div class="col-md-7">
							<div class="rsteam_content">
								<div class="team-content">
									<div class="team-heading">

									  	<?php if($settings['title']) : ?>
								  		<h3 class="team-name"><a class="pointer-events" href="#rs_popupBox_<?php echo esc_attr($x);?>" data-effect="mfp-zoom-in"><?php echo esc_html($settings['title']);?></a></h3>
								  		<?php endif; ?>
								  		<?php if($settings['designation']) : ?>
								  			<span class="team-title"><?php echo esc_html($settings['designation']);?></span>
								  		<?php endif; ?>	
									</div> 

									
									<?php if($settings['popup_description']) : ?>
									<div class="team-des" <?php echo wp_kses_post($popup_content_color);?>>
										<?php echo esc_html($settings['popup_description']);?>
									</div>
									<?php endif; ?>


									<?php if($settings['phone'] || $settings['email'])   : ?>
									<div class="contact-info">

										<ul>
											<?php if($settings['phone']): ?>
												<li <?php echo wp_kses_post($popup_phn_email_color);?>>
													<span><?php echo esc_html('Phone:', 'tp-elements');?> </span>
													<?php echo esc_html($settings['phone']);?>
												</li>

											<?php endif; ?>



											<?php if($settings['email']): ?>
												<li <?php echo wp_kses_post($popup_phn_email_color);?>>
													<span><?php echo esc_html('Email:', 'tp-elements');?> </span>
													<a href="<?php echo esc_html($show_email); ?>"<?php echo wp_kses_post($popup_phn_email_color);?>>
														<?php echo esc_html($settings['email']);?></a>
												</li>
											<?php endif; ?>
										</ul>
									</div>
									<?php endif; ?>

								  	<div class="rs-social-icons">
										<div class="social-icons1">	
										<?php foreach ( $settings['social_icon_list'] as $index => $item ) :
											$target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';                    
						            		$link         = !empty($item['link']['URL']) ? $item['link']['URL'] : '';
											$iconPick         = !empty($item['social_icon_pick']) ? $item['social_icon_pick']['value'] : '';
											?>
						            								
												<a href="<?php echo esc_url($link);?>"  <?php echo wp_kses_post($target);?> class="social-icon">
												<i class="<?php echo esc_html($iconPick); ?>"></i>
												</a>			
									        
									   <?php  endforeach; ?>   
								   </div>
								  	</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		<?php 

		}		

	}
	    public function getCategories(){
	        $cat_list = [];
	         	if ( post_type_exists( 'teams' ) ) { 
	          	$terms = get_terms( array(
	             	'taxonomy'    => 'team-category',
	             	'hide_empty'  => true            
	         	) ); 
		        foreach($terms as $post) {
		        	$cat_list[$post->slug]  = [$post->name];
		        }
	    	}  
	        return $cat_list;
	    }
}?>