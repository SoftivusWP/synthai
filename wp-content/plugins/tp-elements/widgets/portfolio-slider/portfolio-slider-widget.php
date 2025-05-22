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
use Elementor\Group_Control_Css_Filter;
use Elementor\REPEATER;
use Elementor\Utils;
use Elementor\Icons_Manager;

defined( 'ABSPATH' ) || die();

class Themephi_Portfolio_Slider_Widget extends \Elementor\Widget_Base {
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
		return 'tp-portfolio-slider';
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
		return __( 'TP Portfolio Slider', 'tp-elements' );
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
		return 'glyph-icon flaticon-slider-3';
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

    public function get_script_depends() {
        return ['aat'];
    }

  	/**
	 * Register rsgallery widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {  	

        
        // ----------------------------- //
        // ---------- Content ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content_settings',
            [
                'label'         => esc_html__('Projects Listing', 'tp-elements')
            ]
        );

        $this->add_control(
            'listing_type',
            [
                'label'         => esc_html__('Type', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'grid',
                'options'       => [
                    'grid'          => esc_html__('Grid', 'tp-elements'),
                    'masonry'       => esc_html__('Masonry', 'tp-elements'),
                    'slider'        => esc_html__('Slider', 'tp-elements'),
                    'modern'        => esc_html__('Modern', 'tp-elements'),
                    'cards'         => esc_html__('Cards', 'tp-elements'),
                    'tabs'         => esc_html__('Tabs', 'tp-elements'),
                ]
            ]
        );

        $this->add_control(
            'select_layout',
            [
                'label'         => esc_html__('Select Layout', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => '',
                'options'       => [
                    'layout1'         => esc_html__('Layout 1', 'tp-elements'),
                    'layout2'         => esc_html__('Layout 2', 'tp-elements'),
                ],
            ]
        );

        $this->add_control(
            'select_post_format',
            [
                'label'         => esc_html__('Select Content', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'audio',
                'options'       => [
                    'audio'         => esc_html__('Audio', 'tp-elements'),
                ],
                'condition'     => [
                    'listing_type' => ['slider'],
                    'select_layout'=> ['layout2'],
                ],
            ]
        );

        $this->add_control(
            'text_position',
            [
                'label'         => esc_html__('Content Position', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'outside',
                'options'       => [
                    'inside'        => esc_html__('Inside', 'tp-elements'),
                    'outside'       => esc_html__('Outside', 'tp-elements')
                ],
                'condition'     => [
                    'listing_type'  => ['masonry', 'grid']
                ]
            ]
        );

        $this->add_responsive_control(
            'title_align',
            [
                'label'         => esc_html__('Title Alignment', 'tp-elements'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'           => [
                        'title'         => esc_html__('Left', 'tp-elements'),
                        'icon'          => 'eicon-text-align-left',
                    ],
                    'center'        => [
                        'title'         => esc_html__('Center', 'tp-elements'),
                        'icon'          => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title'         => esc_html__('Right', 'tp-elements'),
                        'icon'          => 'eicon-text-align-right',
                    ]
                ],
                'default'       => is_rtl() ? 'right' : 'left',
                'prefix_class'  => 'title-alignment-',
                'toggle'        => false,
                'condition'     => [
                    'listing_type'  => 'slider'
                ]
            ]
        );

        $this->add_control(
            'post_order_by',
            [
                'label'         => esc_html__('Order By', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'date',
                'options'       => [
                    'date'          => esc_html__('Post Date', 'tp-elements'),
                    'rand'          => esc_html__('Random', 'tp-elements'),
                    'ID'            => esc_html__('Post ID', 'tp-elements'),
                    'title'         => esc_html__('Post Title', 'tp-elements')
                ],
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'post_order',
            [
                'label'         => esc_html__('Order', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'desc',
                'options'       => [
                    'desc'          => esc_html__('Descending', 'tp-elements'),
                    'asc'           => esc_html__('Ascending', 'tp-elements')
                ]
            ]
        );

        $this->add_control(
            'filter_by',
            [
                'label'         => esc_html__('Filter by:', 'tp-elements'),
                'type'          => Controls_Manager::SELECT,
                'default'       => 'none',
                'options'       => [
                    'none'          => esc_html__('None', 'tp-elements'),
                    'cat'           => esc_html__('Category', 'tp-elements'),
                    'id'            => esc_html__('ID', 'tp-elements')
                ],
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'categories',
            [
                'label'         => esc_html__('Categories', 'tp-elements'),
                'label_block'   => true,
                'type'          => Controls_Manager::SELECT2,
                'multiple'      => true,
                'description'   => esc_html__('List of categories.', 'tp-elements'),
                'options'       => tp_get_all_taxonomy_terms('tp-portfolios', 'tp-portfolio-category'),
                'condition'     => [
                    'filter_by'     => 'cat'
                ]
            ]
        );

        $this->add_control(
            'projects',
            [
                'label'         => esc_html__('Choose Projects', 'tp-elements'),
                'type'          => Controls_Manager::SELECT2,
                'options'       => tp_get_all_post_list('tp-portfolios'),
                'label_block'   => true,
                'multiple'      => true,
                'condition'     => [
                    'filter_by'     => 'id'
                ]
            ]
        );

        $this->add_control(
            'show_filter',
            [
                'label'         => esc_html__('Show Filter', 'tp-elements'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('Hide', 'tp-elements'),
                'label_on'      => esc_html__('Show', 'tp-elements'),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'separator'     => 'before',
                'condition'     => [
                    'filter_by'     => 'cat',
                    'listing_type!' => ['cards', 'slider'],
                ]
            ]
        );

        $this->add_control(
            'filter_title',
            [
                'label' => esc_html__( 'Filter Default Title', 'tp-elements' ),
                'type' => Controls_Manager::TEXT,
                'default' => 'All',
                'condition' => [
                    'show_filter' => 'yes',
                    'filter_by'     => 'cat',
                    'listing_type!' => ['cards', 'slider'],
                ],
            ]
        );

        $this->add_control(
            'show_pagination',
            [
                'label'         => esc_html__('Show Pagination', 'tp-elements'),
                'type'          => Controls_Manager::SWITCHER,
                'label_off'     => esc_html__('Hide', 'tp-elements'),
                'label_on'      => esc_html__('Show', 'tp-elements'),
                'return_value'  => 'yes',
                'default'       => 'yes',
                'condition'     => [
                    'listing_type!'  => 'slider'
                ]
            ]
        );

        $this->end_controls_section();


        // ----------------------------- //
        // ---------- Icon Settings ---------- //
        // ----------------------------- //
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Icon Settings', 'tp-elements'),
                'condition' => [
                    'listing_type' => ['slider', 'grid'],
                ],
            ]
        );

        $this->add_control(
            'icon_type',
            [
                'label'     => esc_html__('Type of Icon', 'tp-elements'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'default',
                'options'   => [
                    'default'   => esc_html__('Default Icon', 'tp-elements'),
                    'svg'       => esc_html__('SVG Icon', 'tp-elements'),
                    'custom'       => esc_html__('Custom Text', 'tp-elements'),
                ]
            ]
        );

        $this->add_control(
            'default_icon',
            [
                'label'                     => esc_html__('Icon', 'tp-elements'),
                'type'                      => Controls_Manager::ICONS,
                'label_block'               => false,
                'default'                   => [
                    'value'     => 'fas fa-star',
                    'library'   => 'fa-solid'
                ],
                'skin'                      => 'inline',
                'exclude_inline_options'    => ['svg'],
                'condition'                 => [
                    'icon_type' => 'default'
                ]
            ]
        );

        $this->add_control(
            'svg_icon',
            [
                'label'         => esc_html__('SVG Icon', 'tp-elements'),
                'description'   => esc_html__('Enter svg code', 'tp-elements'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => '',
                'condition'     => [
                    'icon_type'     => 'svg'
                ]
            ]
        );

        $this->add_control(
            'custom_text',
            [
                'label'         => esc_html__('Custom Text', 'tp-elements'),
                'description'   => esc_html__('Write Custom Text', 'tp-elements'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'condition'     => [
                    'icon_type'     => 'custom'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_align',
            [
                'label'             => esc_html__('Alignment', 'tp-elements'),
                'type'              => Controls_Manager::CHOOSE,
                'options'           => [
                    'left'              => [
                        'title'             => esc_html__('Left', 'tp-elements'),
                        'icon'              => 'eicon-text-align-left',
                    ],
                    'center'            => [
                        'title'             => esc_html__('Center', 'tp-elements'),
                        'icon'              => 'eicon-text-align-center',
                    ],
                    'right'             => [
                        'title'             => esc_html__('Right', 'tp-elements'),
                        'icon'              => 'eicon-text-align-right',
                    ],
                    'space-between'     => [
                        'title'             => esc_html__('Space Between', 'tp-elements'),
                        'icon'              => 'eicon-justify-space-between-h',
                    ],
                ],
                'toggle'            => true,
                'default'           => 'center',
                'selectors' => [
					'{{WRAPPER}} .icon-item' => 'text-align: {{VALUE}};',
				],
            ]
        );
  
        $this->add_control(
            'background_type',
            [
                'label'     => esc_html__('Type of Background', 'tp-elements'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'none',
                'options'   => [
                    'none'              => esc_html__('None', 'tp-elements'),
                    'svg'               => esc_html__('SVG', 'tp-elements'),
                    'image'             => esc_html__('Image', 'tp-elements'),
                    'color'             => esc_html__('Color', 'tp-elements')
                ]
            ]
        );

        $this->add_control(
            'svg_background',
            [
                'label'         => esc_html__('SVG Background', 'tp-elements'),
                'description'   => esc_html__('Enter svg code', 'tp-elements'),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => '',
                'condition'     => [
                    'background_type' => 'svg'
                ]
            ]
        );

        $this->start_controls_tabs('background_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'background_normal',
                [
                    'label'     => esc_html__('Normal', 'tp-elements'),
                    'condition' => [
                        'background_type' => ['image', 'color']
                    ]
                ]
            );

                $this->add_control(
                    'bg_image',
                    [
                        'label'     => esc_html__('Choose Background Image', 'tp-elements'),
                        'type'      => Controls_Manager::MEDIA,
                        'default'   => [],
                        'condition' => [
                            'background_type' => 'image'
                        ]
                    ]
                );

				$this->add_control(
                    'bg_color',
                    [
                        'label'     => esc_html__('Background Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'color',
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'background_hover',
                [
                    'label'     => esc_html__('Hover', 'tp-elements'),
                    'condition' => [
                        'background_type' => ['image', 'color'],
                    ]
                ]
            );

                $this->add_control(
                    'bg_image_hover',
                    [
                        'label'     => esc_html__('Choose Background Image', 'tp-elements'),
                        'type'      => Controls_Manager::MEDIA,
                        'default'   => [],
                        'condition' => [
                            'background_type' => 'image'
                        ]
                    ]
                );

				$this->add_control(
                    'bg_hover_color',
                    [
                        'label'     => esc_html__('Background Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container:hover' => 'background-color: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'color',
                        ]
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

		$this->add_control(
			'btn_link_open',
			[
				'label'   => esc_html__( 'Open New Window', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [					
					'no' => esc_html__( 'No', 'tp-elements'),
					'yes' => esc_html__( 'Yes', 'tp-elements'),
				],
			]
		);

        $this->end_controls_section();

        // ----------------------------- //
        // ---------- Button Settings ---------- //
        // ----------------------------- //
        
        $this->start_controls_section(
            'section_button',
            [
                'label' => esc_html__('Button Settings', 'tp-elements'),
                'condition' => [
                    'listing_type!' => ['cards'],
                ],
            ]
        );
 
        $this->add_control(
			'btn_style',
			[
				'label'     => esc_html__( 'Style', 'tp-elements' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'style1',
				'options'   => [
					'style1' => esc_html__( ' Button Style 1', 'tp-elements' ),
					'style2' => esc_html__( ' Button Style 2', 'tp-elements' ),
				],
				'separator' => 'after',
			]
		);

        $this->add_control(
			'btn_text',
			[
				'label'   => esc_html__( 'Text', 'tp-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Discover More', 'tp-elements' ),
			]
		);

		$this->add_control(
			'btn_icon_position',
			[
				'label'     => esc_html__( 'Icon Position', 'tp-elements' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'row',
				'options'   => [
					'row'         => esc_html__( 'After', 'tp-elements' ),
					'row-reverse' => esc_html__( 'Before', 'tp-elements' ),
				],
				'selectors' => [
					'{{WRAPPER}} .btn-text-flip' => 'flex-direction: {{VALUE}};',
				],
				'condition' => [
					'btn_style' => 'style3',
				],
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label'   => esc_html__( 'Link', 'tp-elements' ),
				'type'    => Controls_Manager::URL,
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url'         => '#',
					'is_external' => false,
					'nofollow'    => true,
				],
			]
		);

		$this->add_responsive_control(
			'btn_align',
			[
				'label'     => esc_html__( 'Alignment', 'tp-elements' ),
				'type'      => Controls_Manager::CHOOSE,
				'options'   => [
					'start'  => [
						'title' => esc_html__( 'Left', 'tp-elements' ),
						'icon'  => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'tp-elements' ),
						'icon'  => 'eicon-text-align-center',
					],
					'end'    => [
						'title' => esc_html__( 'Right', 'tp-elements' ),
						'icon'  => 'eicon-text-align-right',
					],
				],
				'toggle'    => true,
				'selectors' => [
					'{{WRAPPER}} .price-item-button-container' => 'justify-content: {{VALUE}};',
				],
				'prefix_class'      => 'button-pro-align-',
				'separator' => 'before',
			]
		);

        $this->end_controls_section();


        // ----------------------------------- //
        // ---------- Modern Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_modern_settings',
            [
                'label'         => esc_html__('Modern Settings', 'tp-elements'),
                'condition'     => [
                    'listing_type'  => 'modern'
                ]
            ]
        );

        $this->add_control(
            'modern_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'tp-elements'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 4,
                'min'           => -1
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Grid Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_grid_settings',
            [
                'label'         => esc_html__('Grid Settings', 'tp-elements'),
                'condition'     => [
                    'listing_type'  => 'grid'
                ]
            ]
        );

        // $this->add_control(
        //     'grid_columns_number',
        //     [
        //         'label'         => esc_html__('Columns Number', 'tp-elements'),
        //         'type'          => Controls_Manager::NUMBER,
        //         'default'       => 3,
        //         'min'           => 1,
        //         'max'           => 6
        //     ]
        // );

        $this->add_control(
            'grid_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'tp-elements'),
                'type'          => Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
            ]
        );

        $this->end_controls_section();
        // -------------------------------------- //
        // ---------- Masonry Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'section_masonry_settings',
            [
                'label'         => esc_html__('Masonry Settings', 'tp-elements'),
                'condition'     => [
                    'listing_type'  => 'masonry'
                ]
            ]
        );

        // $this->add_control(
        //     'masonry_columns_number',
        //     [
        //         'label'         => esc_html__('Columns Number', 'tp-elements'),
        //         'type'          => \Elementor\Controls_Manager::NUMBER,
        //         'default'       => 3,
        //         'min'           => 1,
        //         'max'           => 6
        //     ]
        // );

        $this->add_control(
            'masonry_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'tp-elements'),
                'type'          => \Elementor\Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Cards Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_cards_settings',
            [
                'label'         => esc_html__('Cards Settings', 'tp-elements'),
                'condition'     => [
                    'listing_type'  => 'cards'
                ]
            ]
        );

        $this->add_control(
            'cards_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'tp-elements'),
                'type'          => \Elementor\Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
            ]
        );

        $this->end_controls_section();

        // ----------------------------------- //
        // ---------- Tabs Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'section_tabs_settings',
            [
                'label'         => esc_html__('tabs Settings', 'tp-elements'),
                'condition'     => [
                    'listing_type'  => 'tabs'
                ]
            ]
        );

        $this->add_control(
            'tabs_posts_per_page',
            [
                'label'         => esc_html__('Items Per Page', 'tp-elements'),
                'type'          => \Elementor\Controls_Manager::NUMBER,
                'default'       => 3,
                'min'           => -1
            ]
        );

        $this->end_controls_section();

        // ---------------------------- //
        // ---------- Slider ---------- //
        // ---------------------------- //

        $this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'tp-elements' ),
                'condition'     => [
                    'listing_type'  => 'slider'
                ]           
            ]
        );

        $this->add_control(
            'col_xxl',
            [
                'label'   => esc_html__( 'Wide Screen > 1399px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'tp-elements' ), 
                    '2' => esc_html__( '2 Column', 'tp-elements' ),
                    '3' => esc_html__( '3 Column', 'tp-elements' ),
                    '4' => esc_html__( '4 Column', 'tp-elements' ),
                    '5' => esc_html__( '5 Column', 'tp-elements' ),
                    '6' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',       
            ]
        );

        $this->add_control(
            'col_xl',
            [
                'label'   => esc_html__( 'Wide Screen > 1199px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'tp-elements' ), 
                    '2' => esc_html__( '2 Column', 'tp-elements' ),
                    '3' => esc_html__( '3 Column', 'tp-elements' ),
                    '4' => esc_html__( '4 Column', 'tp-elements' ),
                    '5' => esc_html__( '5 Column', 'tp-elements' ),
                    '6' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',       
            ]
        );

        $this->add_control(
            'col_lg',
            [
                'label'   => esc_html__( 'Desktops > 991px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,
                'options' => [
                    '1' => esc_html__( '1 Column', 'tp-elements' ), 
                    '2' => esc_html__( '2 Column', 'tp-elements' ),
                    '3' => esc_html__( '3 Column', 'tp-elements' ),
                    '4' => esc_html__( '4 Column', 'tp-elements' ),
                    '5' => esc_html__( '5 Column', 'tp-elements' ),
                    '6' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',                            
            ]
        );

        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__( 'Laptop > 769px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'tp-elements' ), 
                    '2' => esc_html__( '2 Column', 'tp-elements' ),
                    '3' => esc_html__( '3 Column', 'tp-elements' ),
                    '4' => esc_html__( '4 Column', 'tp-elements' ),
                    '5' => esc_html__( '5 Column', 'tp-elements' ),
                    '6' => esc_html__( '6 Column', 'tp-elements' ),                     
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_sm',
            [
                'label'   => esc_html__( 'Tablets > 576px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'tp-elements' ), 
                    '2' => esc_html__( '2 Column', 'tp-elements' ),
                    '3' => esc_html__( '3 Column', 'tp-elements' ),
                    '4' => esc_html__( '4 Column', 'tp-elements' ),
                    '5' => esc_html__( '5 Column', 'tp-elements' ),
                    '6' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'col_xs',
            [
                'label'   => esc_html__( 'Tablets < 575px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 1,         
                'options' => [
                    '1' => esc_html__( '1 Column', 'tp-elements' ), 
                    '2' => esc_html__( '2 Column', 'tp-elements' ),
                    '3' => esc_html__( '3 Column', 'tp-elements' ),
                    '4' => esc_html__( '4 Column', 'tp-elements' ),
                    '5' => esc_html__( '5 Column', 'tp-elements' ),
                    '6' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',           
            ]
        );

        $this->add_control(
            'slides_ToScroll',
            [
                'label'   => esc_html__( 'Slide To Scroll', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 2,         
                'options' => [
                    '1' => esc_html__( '1 Item', 'tp-elements' ),
                    '2' => esc_html__( '2 Item', 'tp-elements' ),
                    '3' => esc_html__( '3 Item', 'tp-elements' ),
                    '4' => esc_html__( '4 Item', 'tp-elements' ),                   
                ],
                'separator' => 'before',         
            ]
        );      

        $this->add_control(
            'navigation_top_space',
            [
                'label' => esc_html__( 'Navigation Top', 'tp-elements' ),
                'type' => Controls_Manager::SLIDER,
                'show_label' => true,               
                'range' => [
                    'px' => [
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 0,
                ],          

                'selectors' => [
                    '{{WRAPPER}} .tp-blog-navigation-wrapp' => 'transform: translateY({{SIZE}}{{UNIT}});',                    
                ],
            ]
        ); 
            
        $this->add_control(
            'slider_autoplay',
            [
                'label'   => esc_html__( 'Autoplay', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'false',           
                'options' => [
                    'true' => esc_html__( 'Enable', 'tp-elements' ),
                    'false' => esc_html__( 'Disable', 'tp-elements' ),              
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slider_autoplay_speed',
            [
                'label'   => esc_html__( 'Autoplay Slide Speed', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '1000' => esc_html__( '1 Seconds', 'tp-elements' ),
                    '2000' => esc_html__( '2 Seconds', 'tp-elements' ), 
                    '3000' => esc_html__( '3 Seconds', 'tp-elements' ), 
                    '4000' => esc_html__( '4 Seconds', 'tp-elements' ), 
                    '5000' => esc_html__( '5 Seconds', 'tp-elements' ), 
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                          
            ]
            
        );

        $this->add_control(
            'slider_interval',
            [
                'label'   => esc_html__( 'Autoplay Interval', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 3000,          
                'options' => [
                    '5000' => esc_html__( '5 Seconds', 'tp-elements' ), 
                    '4000' => esc_html__( '4 Seconds', 'tp-elements' ), 
                    '3000' => esc_html__( '3 Seconds', 'tp-elements' ), 
                    '2000' => esc_html__( '2 Seconds', 'tp-elements' ), 
                    '1000' => esc_html__( '1 Seconds', 'tp-elements' ),     
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                                                      
            ]
            
        );

        $this->add_control(
            'slider_stop_on_interaction',
            [
                'label'   => esc_html__( 'Stop On Interaction', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',               
                'options' => [
                    'true' => esc_html__( 'Enable', 'tp-elements' ),
                    'false' => esc_html__( 'Disable', 'tp-elements' ),              
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                                                      
            ]
            
        );

        $this->add_control(
            'slider_stop_on_hover',
            [
                'label'   => esc_html__( 'Stop on Hover', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',               
                'options' => [
                    'true' => esc_html__( 'Enable', 'tp-elements' ),
                    'false' => esc_html__( 'Disable', 'tp-elements' ),              
                ],
                'separator' => 'before',
                'condition' => [
                    'slider_autoplay' => 'true',
                ],                                                      
            ]
            
        );

        $this->add_control(
            'slider_loop',
            [
                'label'   => esc_html__( 'Loop', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'tp-elements' ),
                    'false' => esc_html__( 'Disable', 'tp-elements' ),
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'slider_centerMode',
            [
                'label'   => esc_html__( 'Center Mode', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'false',
                'options' => [
                    'true' => esc_html__( 'Enable', 'tp-elements' ),
                    'false' => esc_html__( 'Disable', 'tp-elements' ),
                ],
                'separator' => 'before',
                            
            ]
            
        );

        $this->add_control(
            'pagination_type',
            [
                'label'   => esc_html__( 'Pagination Type', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'pagination_default',				
                'options' => [
                    'pagination_default' => esc_html__('Default', 'tp-elements'),					
                    'pagination_dynamic' => esc_html__('Dynamic', 'tp-elements'),									
                    'pagination_progressbar' => esc_html__('Progressbar', 'tp-elements'),									
                    'pagination_fraction' => esc_html__('Fraction', 'tp-elements'),									
                ],
                'separator' => 'before',										
            ]
        );

        $this->add_responsive_control(
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Middle Gap', 'tp-elements' ),
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

            ]
        ); 

        $this->add_control(
            'item_gap_custom_bottom',
            [
                'label' => esc_html__( 'Item Bottom Gap', 'tp-elements' ),
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
                    '{{WRAPPER}} .themephi-addon-slider .testimonial-item' => 'margin-bottom:{{SIZE}}{{UNIT}};',                    
                ],
            ]
        ); 
                
        $this->end_controls_section();


        // -------------------------------------- //
        // ---------- Column Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'column_settings_section',
            [
                'label' => esc_html__( 'Column Settings', 'tp-elements' ),
                'condition'     => [
                    'listing_type'  => ['grid', 'masonry'],
                ]           
            ]
        );

        
		$this->add_control(
            'column_xxl',
            [
                'label'   => esc_html__( 'Desktops > 1399px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 6,
                'options' => [
                    '12' => esc_html__( '1 Column', 'tp-elements' ), 
                    '6' => esc_html__( '2 Column', 'tp-elements' ),
                    '4' => esc_html__( '3 Column', 'tp-elements' ),
                    '3' => esc_html__( '4 Column', 'tp-elements' ),
                    '2' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',	        
            ]
        );

		$this->add_control(
            'column_xl',
            [
                'label'   => esc_html__( 'Desktops > 1199px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 6,
                'options' => [
                    '12' => esc_html__( '1 Column', 'tp-elements' ), 
                    '6' => esc_html__( '2 Column', 'tp-elements' ),
                    '4' => esc_html__( '3 Column', 'tp-elements' ),
                    '3' => esc_html__( '4 Column', 'tp-elements' ),
                    '2' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',	        
            ]
            
        );

		$this->add_control(
            'column_lg',
            [
                'label'   => esc_html__( 'Desktops > 991px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 6,
                'options' => [
                    '12' => esc_html__( '1 Column', 'tp-elements' ), 
                    '6' => esc_html__( '2 Column', 'tp-elements' ),
                    '4' => esc_html__( '3 Column', 'tp-elements' ),
                    '3' => esc_html__( '4 Column', 'tp-elements' ),
                    '2' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',       
            ]
            
        );

        $this->add_control(
            'column_md',
            [
                'label'   => esc_html__( 'Desktops > 767px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 6,         
                'options' => [
                    '12' => esc_html__( '1 Column', 'tp-elements' ), 
                    '6' => esc_html__( '2 Column', 'tp-elements' ),
                    '4' => esc_html__( '3 Column', 'tp-elements' ),
                    '3' => esc_html__( '4 Column', 'tp-elements' ),
                    '2' => esc_html__( '6 Column', 'tp-elements' ),                   
                ],
                'separator' => 'before',           
            ]
            
        );

        $this->add_control(
            'column_sm',
            [
                'label'   => esc_html__( 'Tablets > 575px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 12,         
                'options' => [
                    '12' => esc_html__( '1 Column', 'tp-elements' ), 
                    '6' => esc_html__( '2 Column', 'tp-elements' ),
                    '4' => esc_html__( '3 Column', 'tp-elements' ),
                    '3' => esc_html__( '4 Column', 'tp-elements' ),
                    '2' => esc_html__( '6 Column', 'tp-elements' ),                  
                ],
                'separator' => 'before',           
            ] 
        );

        $this->add_control(
            'column_xs',
            [
                'label'   => esc_html__( 'Tablets < 575px', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 12,         
                'options' => [
                    '12' => esc_html__( '1 Column', 'tp-elements' ), 
                    '6' => esc_html__( '2 Column', 'tp-elements' ),
                    '4' => esc_html__( '3 Column', 'tp-elements' ),
                    '3' => esc_html__( '4 Column', 'tp-elements' ),
                    '2' => esc_html__( '6 Column', 'tp-elements' ),                 
                ],
                'separator' => 'before',          
            ]
        );

        $this->end_controls_section();

        // -------------------------------------- //
        // ---------- Filter Settings ---------- //
        // -------------------------------------- //
        $this->start_controls_section(
            'filter_settings_section',
            [
                'label'     => esc_html__('Filter Settings', 'tp-elements'),
                'tab'       => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'filter_by'     => 'cat',
                    'listing_type!' => ['slider', 'cards'],
                    'show_filter'   => 'yes'
                ]
            ]
        );

        $this->end_controls_section();



        /*
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        Style Start From Here 
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
        */

        
        // ----------------------------------- //
        // ---------- Content Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'content___settings',
            [
                'label' => esc_html__('Content Settings', 'tp-elements'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

		$this->add_responsive_control(
			'content_wrapper_margin',
			[
				'label'      => esc_html__( 'Margin', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-isotope-wrapp .tp-portfolio-item-content, {{WRAPPER}} .tp-portfolio-item-inner-wrapper-left' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'content_wrapper_padding',
			[
				'label'      => esc_html__( 'Padding', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-isotope-wrapp .tp-portfolio-item-content,  {{WRAPPER}} .tp-portfolio-item-inner-wrapper-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'content_wrapper_bg',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .portfolio-isotope-wrapp .tp-portfolio-item-content, {{WRAPPER}} .tp-portfolio-item-inner-wrapper-left',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'content_wrapper_border',
				'selector' => '{{WRAPPER}} .portfolio-isotope-wrapp .tp-portfolio-item-content,  {{WRAPPER}} .tp-portfolio-item-inner-wrapper-left',
			]
		);

		$this->add_responsive_control(
			'content_wrapper_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-isotope-wrapp .tp-portfolio-item-content,  {{WRAPPER}} .tp-portfolio-item-inner-wrapper-left'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'enable_btn_decoration',
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
            'add_btn_decoration',
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
                ],
                'separator'     => 'before',
                'condition' => [ 
                    'enable_btn_decoration' => 'on'
                 ],
            ]
        );

		$this->add_control(
			'btn_box_shadow_offset_y',
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
					'{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left' => '--box-shadow-offset-y: {{SIZE}}{{UNIT}};',
				],
                'condition' => [ 
                    'enable_btn_decoration' => 'on'
                ],
			]
		);

        $this->add_control(
            'btn_decoration_color',
            [
                'label' => esc_html__('Decoration Color', 'tp-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left' => '--box-shadow-color: {{VALUE}};'
                ],
                'condition' => [ 
                    'enable_btn_decoration' => 'on'
                ],
            ]
        );

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn_decoration_border',
				'selector' => '{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left',
                'condition' => [ 
                    'enable_btn_decoration' => 'on'
                ],
			]
		);


        $this->end_controls_section();
        
        // ----------------------------------- //
        // ---------- Title Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'title_settings',
            [
                'label' => esc_html__('Title Settings', 'tp-elements'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'title_typography',
                'label'     => esc_html__('Title Typography', 'tp-elements'),
                'selector'  => '{{WRAPPER}} .tp-portfolio-title'
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label'     => esc_html__('Title Color', 'tp-elements'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-portfolio-title' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label'     => esc_html__('Title Hover Color', 'tp-elements'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-portfolio-title:hover a' => 'color: {{VALUE}};'
                ]
            ]
        );

		$this->add_responsive_control(
			'title_margin',
			[
				'label'      => esc_html__( 'Margin', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .tp-portfolio-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->end_controls_section();


                
        // ----------------------------------- //
        // ---------- Category Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'category_settings',
            [
                'label' => esc_html__('Category Settings', 'tp-elements'),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'      => 'category_typography',
                'label'     => esc_html__('Category Typography', 'tp-elements'),
                'selector'  => '{{WRAPPER}} .tp-portfolio-category'
            ]
        );

        $this->add_control(
            'category_color',
            [
                'label'     => esc_html__('Category Color', 'tp-elements'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-portfolio-category' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->add_control(
            'category_hover_color',
            [
                'label'     => esc_html__('Category Hover Color', 'tp-elements'),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-portfolio-category:hover' => 'color: {{VALUE}};'
                ]
            ]
        );

        $this->end_controls_section();


        // ----------------------------------- //
        // ---------- Icon Settings ---------- //
        // ----------------------------------- //
        $this->start_controls_section(
            'icon_settings',
            [
                'label' => esc_html__('Icon Settings', 'tp-elements'),
                'tab'   => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'listing_type' => ['slider', 'grid'],
                ],
            ]
        );

        $this->add_responsive_control(
            'icon_container_size',
            [
                'label'     => esc_html__('Icon Container Size', 'tp-elements'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 10,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_background_size',
            [
                'label'     => esc_html__('Icon Background Size', 'tp-elements'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 10,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container .background' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'background_type' => 'svg'
                ]
            ]
        );

        $this->add_responsive_control(
            'icon_size',
            [
                'label'     => esc_html__('Icon Size', 'tp-elements'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 5,
                        'max'       => 280
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container i' => 'font-size: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'icon_type' => 'default'
                ]
            ]
        );

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'custom_text_typography',
				'selector' => '{{WRAPPER}} .icon-container span',
                'condition' => [
                    'icon_type' => 'custom',
                ],
			]
		);

        $this->add_responsive_control(
            'icon_svg_size',
            [
                'label'     => esc_html__('Icon Size', 'tp-elements'),
                'type'      => Controls_Manager::SLIDER,
                'range'     => [
                    'px'        => [
                        'min'       => 5,
                        'max'       => 200
                    ]
                ],
                'selectors' => [
                    '{{WRAPPER}} .icon-container .icon' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};'
                ],
                'condition' => [
                    'icon_type' => 'svg'
                ]
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name'      => 'icon_shadow',
                'label'     => esc_html__('Icon Shadow', 'tp-elements'),
                'selector'  => '{{WRAPPER}} .icon-container'
            ]
        );

        $this->add_responsive_control(
            'icon_margin',
            [
                'label'         => esc_html__('Icon Margins', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .icon-item .icon-container' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_wrapper_background',
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .icon-item',
			]
		);

        $this->add_responsive_control(
            'icon_wrapper_border_radius',
            [
                'label'         => esc_html__('Icon Border Radius', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .icon-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ],
            ]
        );

        $this->start_controls_tabs('icon_settings_tabs');

            // ------------------------ //
            // ------ Normal Tab ------ //
            // ------------------------ //
            $this->start_controls_tab(
                'icon_normal',
                [
                    'label' => esc_html__('Normal', 'tp-elements')
                ]
            );

                $this->add_control(
                    'icon_color',
                    [
                        'label'     => esc_html__('Icon Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container i' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'default'
                        ]
                    ]
                );

                $this->add_control(
                    'text_color',
                    [
                        'label'     => esc_html__('Text Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container span' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'custom',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'      => 'text_gradient_color',
                        'label'     => esc_html__( 'Text Gradient Color', 'tp-elements' ),
                        'fields_options' => [
                            'background' => [
                                'label'     => esc_html__( 'Text Gradient Color', 'tp-elements' ),
                            ]
                        ],
                        'types'     => [ 'gradient' ],
                        'selector'  => '{{WRAPPER}} .icon-container span',
                        'condition' => [
                            'icon_type' => 'custom',
                        ]
                    ]
                );

                $this->add_control(
                    'icon_svg_color',
                    [
                        'label'     => esc_html__('Icon Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container .icon svg' => 'fill: {{VALUE}};',
                            '{{WRAPPER}} .icon-container .icon svg path' => 'fill: {{VALUE}};',
                        ],
                        'condition' => [
                            'icon_type' => 'svg'
                        ]
                    ]
                );

                $this->add_control(
                    'background_svg_color',
                    [
                        'label'     => esc_html__('Background SVG Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container .background svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'svg',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'background_normal_color',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .icon-container',
                        'condition' => [
                            'background_type' => 'color'
                        ],
                    ]
                );

                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'border_normal_icon',
                        'selector' => '{{WRAPPER}} .icon-container',
                    ]
                );

                $this->add_responsive_control(
                    'icon_radius',
                    [
                        'label'         => esc_html__('Icon Border Radius', 'tp-elements'),
                        'type'          => Controls_Manager::DIMENSIONS,
                        'size_units'    => ['px', '%', 'em'],
                        'selectors'     => [
                            '{{WRAPPER}} .icon-item .icon-container.background-type-color' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
                        'condition'     => [
                            'background_type' => 'color'
                        ]
                    ]
                );

            $this->end_controls_tab();

            // ----------------------- //
            // ------ Hover Tab ------ //
            // ----------------------- //
            $this->start_controls_tab(
                'icon_hover',
                [
                    'label' => esc_html__('Hover', 'tp-elements')
                ]
            );

                $this->add_control(
                    'icon_color_hover',
                    [
                        'label'     => esc_html__('Icon Color on Hover', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container i' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'default'
                        ]
                    ]
                );

                $this->add_control(
                    'text_hover_color',
                    [
                        'label'     => esc_html__('Text Color', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .icon-container:hover span' => 'color: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'custom',
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name'      => 'text_hover_gradient_color',
                        'label'     => esc_html__( 'Text Gradient Color', 'tp-elements' ),
                        'fields_options' => [
                            'background' => [
                                'label'     => esc_html__( 'Text Gradient Color', 'tp-elements' ),
                            ]
                        ],
                        'types'     => [ 'gradient' ],
                        'selector'  => '{{WRAPPER}} .icon-container:hover span',
                        'condition' => [
                            'icon_type' => 'custom',
                        ]
                    ]
                );

                $this->add_control(
                    'icon_svg_color_hover',
                    [
                        'label'     => esc_html__('Icon Color on Hover', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container .icon svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'icon_type' => 'svg'
                        ]
                    ]
                );

                $this->add_control(
                    'background_svg_color_hover',
                    [
                        'label'     => esc_html__('Background SVG on Hover', 'tp-elements'),
                        'type'      => Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}}:hover .icon-container .background svg' => 'fill: {{VALUE}};'
                        ],
                        'condition' => [
                            'background_type' => 'svg'
                        ]
                    ]
                );

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'background_normal_color_hover',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .icon-container:hover',
                        'condition' => [
                            'background_type' => 'color'
                        ],
                    ]
                );
            
                $this->add_group_control(
                    Group_Control_Border::get_type(),
                    [
                        'name' => 'border_hover_icon',
                        'selector' => '{{WRAPPER}} .icon-container:hover',
                    ]
                );

            $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control(
			'additional_separator_decoration',
			[
				'label' => esc_html__( 'Decoration Settings', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
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
					'{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-left, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left, {{WRAPPER}} .tp-border-decoration-inside-border-top-right' => '--box-shadow-offset-y: {{SIZE}}{{UNIT}};',
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
                    '{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-left, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left, {{WRAPPER}} .tp-border-decoration-inside-border-top-right' => '--box-shadow-color: {{VALUE}};'
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
				'selector' => '{{WRAPPER}} .tp-border-decoration-border-bottom-left, {{WRAPPER}} .tp-border-decoration-border-bottom-right, {{WRAPPER}} .tp-border-decoration-border-top-left, {{WRAPPER}} .tp-border-decoration-border-top-right, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-left, {{WRAPPER}} .tp-border-decoration-inside-border-bottom-right, {{WRAPPER}} .tp-border-decoration-inside-border-top-left, {{WRAPPER}} .tp-border-decoration-inside-border-top-right',
                'condition' => [ 
                    'enable_decoration' => 'on'
                ],
			]
		);

        $this->end_controls_section();

            
        
		$this->start_controls_section(
			'style_button',
			[
				'label' => esc_html__( 'Button', 'tp-elements' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

        // Button Wrapper
		$this->add_control(
			'btn_wrapper_heading',
			[
				'label'     => esc_html__( 'Button Wrapper ', 'tp-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'btn_wrapper_margin',
			[
				'label'      => esc_html__( 'Margin', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-isotope-wrapp .helo--btn-wrapper' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_wrapper_padding',
			[
				'label'      => esc_html__( 'Padding', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-isotope-wrapp .helo--btn-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        
		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_wrapper_bg',
				'types'    => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .portfolio-isotope-wrapp .helo--btn-wrapper',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'btn_wrapper_border',
				'selector' => '{{WRAPPER}} .portfolio-isotope-wrapp .helo--btn-wrapper',
			]
		);

		$this->add_responsive_control(
			'btn_wrapper_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .portfolio-isotope-wrapp .helo--btn-wrapper'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        // Button 
		$this->add_control(
			'btn_button_heading',
			[
				'label'     => esc_html__( 'Button ', 'tp-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name'     => 'btn_typo',
				'selector' => '{{WRAPPER}} .helo--btn, {{WRAPPER}} .wc-btn-primary',
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_bg',
				'types'    => [ 'classic', 'gradient' ],
				'exclude'  => [ 'image' ],
				'selector' => '{{WRAPPER}} .helo--btn, {{WRAPPER}} .wc-btn-primary, {{WRAPPER}} .wc-btn-play',
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'btn_border',
				'selector' => '{{WRAPPER}} .helo--btn, {{WRAPPER}} .wc-btn-primary, {{WRAPPER}} .wc-btn-play',
			]
		);

		$this->add_responsive_control(
			'btn_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .helo--btn'      => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wc-btn-primary' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wc-btn-play'    => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label'      => esc_html__( 'Padding', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .helo--btn'      => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .wc-btn-primary' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		// Icon Style
		$this->add_control(
			'btn_icon_heading',
			[
				'label'     => esc_html__( 'Icon', 'tp-elements' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'btn_icon_size',
			[
				'label'      => esc_html__( 'Icon Size', 'tp-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .helo--btn .icon, {{WRAPPER}} .wc-btn-play' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .style-4 .wc-btn-primary strong'            => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'btn_icon_size_width',
			[
				'label'      => esc_html__( 'Icon Width', 'tp-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 200,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .wc-btn-play' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}}; --icon-width: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [ 'btn_style' => [ 'style1', 'style2' ] ],
			]
		);

		$this->add_responsive_control(
			'btn_gap',
			[
				'label'      => esc_html__( 'Gap', 'tp-elements' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .helo--btn, {{WRAPPER}} .wc-btn-primary' => 'gap: {{SIZE}}{{UNIT}};',
				],
				'condition'  => [ 'btn_style!' => [ 'style1', 'style2' ] ],
			]
		);

		// Tabs
		$this->start_controls_tabs(
			'btn_style_tabs'
		);

		$this->start_controls_tab(
			'btn_normal_tab',
			[
				'label' => esc_html__( 'Normal', 'tp-elements' ),
			]
		);

		$this->add_control(
			'btn_color',
			[
				'label'     => esc_html__( 'Color', 'tp-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .helo--btn, {{WRAPPER}} .btn-text-flip span, {{WRAPPER}} .wc-btn-primary' => 'color: {{VALUE}}; fill: {{VALUE}}',
					'{{WRAPPER}} .style-4 .wc-btn-primary strong'                                          => 'background-color: {{VALUE}}',
					'{{WRAPPER}} svg'                                                                      => 'fill: {{VALUE}}',
				],
			]
		);

		$this->end_controls_tab();

		// Hover
		$this->start_controls_tab(
			'btn_hover_tab',
			[
				'label' => esc_html__( 'Hover', 'tp-elements' ),
			]
		);

		$this->add_control(
			'btn_h_color',
			[
				'label'     => esc_html__( 'Color', 'tp-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .helo--btn:hover'                                                => 'color: {{VALUE}}; fill: {{VALUE}}',
					'{{WRAPPER}} .btn-text-flip:hover span, {{WRAPPER}} .btn-text-flip:hover svg' => 'color: {{VALUE}}; fill: {{VALUE}}',
					'{{WRAPPER}} .wc-btn-group:hover span, {{WRAPPER}} .wc-btn-primary:hover'     => 'color: {{VALUE}}',
					'{{WRAPPER}} .wc-btn-group:hover .wc-btn-play svg'                            => 'fill: {{VALUE}}',
					'{{WRAPPER}} .style-4 .wc-btn-primary:hover strong'                           => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .style-4 .wc-btn-primary:hover strong::after'                    => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'btn_h_border',
			[
				'label'     => esc_html__( 'Border Color', 'tp-elements' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .helo--btn:hover, {{WRAPPER}} .wc-btn-primary:hover, {{WRAPPER}} .wc-btn-group:hover span' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name'     => 'btn_h_bg',
				'types'    => [ 'classic', 'gradient' ],
				'exclude'  => [ 'image' ],
				'selector' => '{{WRAPPER}} .helo--btn:hover, {{WRAPPER}} .wc-btn-group:hover span, .style-4 .wc-btn-primary span',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

        
		// Start Blog Pagination Style
		$this->start_controls_section(
		    '_blog_pagination_style',
		    [
		        'label' => esc_html__( 'Pagination Style', 'tp-elements' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		        'condition' => [
                    'show_pagination' => 'yes',
                ]
		    ]
		);

        $this->add_responsive_control(
			'pagination_wrapper_margin',
			[
				'label'      => esc_html__( 'Wrapper Margin', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .pagination' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
            'pagination_align',
            [
                'label'         => esc_html__('Pagination Alignment', 'tp-elements'),
                'type'          => Controls_Manager::CHOOSE,
                'options'       => [
                    'left'           => [
                        'title'         => esc_html__('Left', 'tp-elements'),
                        'icon'          => 'eicon-text-align-left',
                    ],
                    'center'        => [
                        'title'         => esc_html__('Center', 'tp-elements'),
                        'icon'          => 'eicon-text-align-center',
                    ],
                    'right'   => [
                        'title'         => esc_html__('Right', 'tp-elements'),
                        'icon'          => 'eicon-text-align-right',
                    ]
                ],
                'default'       => is_rtl() ? 'right' : 'left',
                'toggle'        => false,
                'selectors' => [
		            '{{WRAPPER}} .pagination' => 'justify-content: {{VALUE}};',
		        ],
            ]
        );

		$this->add_control(
		    'blog_pagi_color',
		    [
		        'label' => esc_html__( 'Text Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .pagination a, {{WRAPPER}} .pagination span' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'blog_pagi_hover_color',
		    [
		        'label' => esc_html__( 'Text Hover Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .pagination a:hover' => 'color: {{VALUE}};',
		            '{{WRAPPER}} .pagination span.current' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'blog_pagi_background_color',
		    [
		        'label' => esc_html__( 'Background Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .pagination a' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'blog_pagiesc_html__bg_color',
		    [
		        'label' => esc_html__( 'Hover Background Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .pagination a:hover' => 'background-color: {{VALUE}};',
		            '{{WRAPPER}} .pagination span.current' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name'     => 'pagination_wrapper_border',
				'selector' => '{{WRAPPER}} .pagination a,  {{WRAPPER}} .pagination span',
			]
		);

		$this->add_responsive_control(
			'pagination_border_radius',
			[
				'label'      => esc_html__( 'Border Radius', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .pagination a,  {{WRAPPER}} .pagination span'  => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'pagination_padding',
			[
				'label'      => esc_html__( 'Padding', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .pagination a, {{WRAPPER}} .pagination span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

        $this->add_responsive_control(
			'pagination_margin',
			[
				'label'      => esc_html__( 'Margin', 'tp-elements' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors'  => [
					'{{WRAPPER}} .pagination a, {{WRAPPER}} .pagination span' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();
		// End Blog Pagination Style


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
        $unique = rand(2012,35120);

        $price_button_text      = $settings['btn_text'];
        $button_link            = $settings['btn_link'];

        /* Icon Settings Start */
        $icon_type       = $settings['icon_type'];
        $default_icon    = $settings['default_icon'];
        $svg_icon        = $settings['svg_icon'];

        $background_type = $settings['background_type'];

        if ( $background_type == 'svg' ) {
            $svg_background = $settings['svg_background'];
        }
        if ( $background_type == 'image' ) {
            $bg_image = !empty($settings['bg_image']['url']) ? $settings['bg_image'] : array();
        }

        /* Icon Settings End */

        $listing_type = $settings['listing_type'];
        $filter_by = $settings['filter_by'];
        $categories = $settings['categories'];
        $projects = $settings['projects'];
        $show_filter = $settings['show_filter'];
        $pagination = $settings['show_pagination'];
        $paged = isset($_GET[esc_attr($this->get_id()) . '-paged']) && $pagination == 'yes' ? (int)$_GET[esc_attr($this->get_id()) . '-paged'] : 1;

        //$grid_columns_number = $settings['grid_columns_number'];
        $grid_posts_per_page = $settings['grid_posts_per_page'];
        
        // Masonry settings
        //$masonry_columns_number = $settings['masonry_columns_number'];
        $masonry_posts_per_page = $settings['masonry_posts_per_page'];

        // Cards settings
        $cards_posts_per_page = $settings['cards_posts_per_page'];

        // Widget options
        $widget_class = 'neuros-projects-listing-widget';
        $wrapper_class = 'archive-listing-wrapper project-listing-wrapper' . ($listing_type === 'masonry' || $listing_type === 'grid' ? ' text-position-' . esc_attr($settings['text_position']) : '');
        $widget_attr = '';
        $wrapper_attr = '';
        

        global $wp;
        $base = home_url($wp->request);

        $query_options = [
            'post_type' => 'tp-portfolios',
            'ignore_sticky_posts' => true,
            'suppress_filters' => false,
            'orderby' => sanitize_key($settings['post_order_by']),
            'order' => sanitize_key($settings['post_order']),
            'link_base' => esc_url($base),
        ];
        
        if ( $listing_type === 'slider' && $settings['select_layout'] === 'layout2' ) {
            $query_options['tax_query'] = [
                [
                    'taxonomy' => 'post_format',
                    'field'    => 'slug',
                    'terms'    => [ 'post-format-' . sanitize_key($settings['select_post_format']) ],
                ],
            ];
        }
        
        // Add filter by categories or projects if necessary
        if ($filter_by === 'cat') {  
            $query_options = array_merge($query_options, [
                'tp-portfolio-category' => $categories
            ]);
        } elseif ($filter_by === 'id') {
            $query_options = array_merge($query_options, [
                'post__in' => $projects
            ]);
        }

        // Handle masonry, slider, grid, or cards listings
        if ($listing_type === 'masonry') {
            $widget_class .= ' isotope' . ($show_filter === 'yes' && $filter_by === 'cat' ? ' isotope-filter' : '');
            $wrapper_class .= ' isotope-trigger project-masonry-listing' 
            // . (!empty($masonry_columns_number) ? ' columns-' . esc_attr($masonry_columns_number) : '')
            ;
            $query_options = array_merge($query_options, [
                'posts_per_page' => !empty($masonry_posts_per_page) ? $masonry_posts_per_page : -1,
                'paged' => $paged,
            ]);
        } elseif ($listing_type === 'slider') {

                
            $col_xxl          = $settings['col_xxl'];
            $col_xxl          = !empty($col_xxl) ? $col_xxl : 3;
            $slidesToShow    = $col_xxl;
            $autoplaySpeed   = $settings['slider_autoplay_speed'];
            $autoplaySpeed = !empty($autoplaySpeed) ? $autoplaySpeed : '1000';
            $interval        = $settings['slider_interval'];
            $interval = !empty($interval) ? $interval : '3000';
            $slidesToScroll  = $settings['slides_ToScroll'];
            $slider_autoplay = $settings['slider_autoplay'] === 'true' ? 'true' : 'false';
            $pauseOnHover    = $settings['slider_stop_on_hover'] === 'true' ? 'true' : 'false';
            $pauseOnInter    = $settings['slider_stop_on_interaction'] === 'true' ? 'true' : 'false';      
            $infinite        = $settings['slider_loop'] === 'true' ? 'true' : 'false';
            $centerMode      = $settings['slider_centerMode'] === 'true' ? 'true' : 'false';

            $col_xl          = $settings['col_xl'];
            $col_lg          = $settings['col_lg'];
            $col_md          = $settings['col_md'];
            $col_sm          = $settings['col_sm'];
            $col_xs          = $settings['col_xs'];

            $item_gap_holder = $settings['item_gap_custom'];
            $item_gap = !empty($item_gap_holder['size']) ? $item_gap_holder['size'] : '15';

            $unique = rand(2012,35120);

            if( $slider_autoplay =='true' ){
                $slider_autoplay = 'autoplay: { ' ;
                $slider_autoplay .= 'delay: '.$interval;
                if(  $pauseOnHover =='true'  ){
                    $slider_autoplay .= ', pauseOnMouseEnter: true';
                }else{
                    $slider_autoplay .= ', pauseOnMouseEnter: false';
                }
                if(  $pauseOnInter =='true'  ){
                    $slider_autoplay .= ', disableOnInteraction: true';
                }else{
                    $slider_autoplay .= ', disableOnInteraction: false';
                }
                $slider_autoplay .= ' }';
            }else{
                $slider_autoplay = 'autoplay: false' ;
            }
        
            $pagination_type = $settings['pagination_type'] === 'pagination_progressbar' ? 'progressbar' : ($settings['pagination_type'] ==='pagination_fraction' ? 'fraction' : '');
    
            $dynamic_bullets = $settings['pagination_type'] === 'pagination_dynamic' ? 'true' : 'false';
            $pagination_class = '.tp-portfolio-pagination ';
            
            if (!empty($settings['pagination_type'])) {
                $pagination = 'pagination: { ';
                if( $settings['pagination_type'] === 'pagination_progressbar' ) {
                    $pagination .= 'el: "' . $pagination_class . '", ';
                    $pagination .= 'type: "' . $pagination_type . '", ';
                } elseif( $settings['pagination_type'] === 'pagination_fraction' ) {
                    $pagination .= 'el: "' . $pagination_class . '", ';
                    $pagination .= 'type: "' . $pagination_type . '", ';
                } elseif( $settings['pagination_type'] === 'pagination_dynamic' ) {
                    $pagination .= 'el: "' . $pagination_class . '", ';
                    $pagination .= 'dynamicBullets: ' . $dynamic_bullets;
                } else {
                    $pagination .= 'el: "' . $pagination_class . '", ';
                }
                $pagination .= ' }';
            }
    

            //$wrapper_attr = ' data-slider-options=' . esc_attr(wp_json_encode($slider_options));
            $wrapper_class .= ' project-slider-listing ';
            $query_options = array_merge($query_options, [
                'posts_per_page' => -1,
            ]);
        } elseif ($listing_type === 'cards') {
            $widget_class .= ' project-card-listing';
            $wrapper_class .= ' project-cards-listing';
            $query_options = array_merge($query_options, [
                'posts_per_page' => !empty($cards_posts_per_page) ? $cards_posts_per_page : -1,
                'paged' => $paged,
            ]);
        } elseif ($listing_type === 'tabs') {
            $widget_class .= ' project-tab-listing';
            $wrapper_class .= ' project-tabs-listing';
            $query_options = array_merge($query_options, [
                'posts_per_page' => !empty($tabs_posts_per_page) ? $tabs_posts_per_page : -1,
                'paged' => $paged,
            ]);
        } else {
            $widget_class .= ($show_filter === 'yes' && $filter_by === 'cat' ? ' grid-filter' : '');
            $wrapper_class .= ' project-grid-listing';
            $query_options = array_merge($query_options, [
                'posts_per_page' => !empty($grid_posts_per_page) ? $grid_posts_per_page : -1,
                'paged' => $paged,
            ]);
        }

        // WP Query to fetch projects
        $projects_query = new WP_Query($query_options);

        ?>

        <style>



        </style>

        <?php if ( $show_filter == 'yes' && $filter_by == 'cat' && ( $listing_type != 'slider' || $listing_type != 'cards' ) ) : ?>

        <div class="portfolio-filter">
            <button class="active" data-filter="*"><?php echo esc_html($settings['filter_title']);?></button>
            <?php $taxonomy = "tp-portfolio-category";
                $select_cat = $categories;
                foreach ($select_cat as $catid) {
                $term = get_term_by('slug', $catid, $taxonomy);
                $term_name  =  $term->name;
                $term_slug  =  $term->slug;
            ?>
                <button data-filter=".filter_<?php echo esc_html($term_slug);?>"><?php echo esc_html($term_name);?></button>
            <?php  } ?>

        </div>

        <?php endif; ?>

        <div class="<?php echo esc_attr($wrapper_class); ?> " <?php echo esc_attr($wrapper_attr); ?>>
            <div class="portfolio-isotope-wrapp <?php if(  $show_filter == 'yes' && $filter_by == 'cat' && ( $listing_type != 'slider' || $listing_type != 'cards' ) ) : ?> grid overflow-hidden <?php else : ?> <?php endif; ?>">
                <div class=" <?php if( $listing_type !== 'slider' ) : ?> row <?php endif; ?>">
                    <?php
                    if( $listing_type === 'slider' ) { ?>
                        <div class="tp-portfolio-active-<?php echo esc_attr( $unique ); ?> swiper"><div class="swiper-wrapper">
                    <?php }
                    // Render the projects
                    if ($projects_query->have_posts()) :
                        while ($projects_query->have_posts()) : $projects_query->the_post();

                            if(  $show_filter == 'yes' && $filter_by == 'cat' && ( $listing_type != 'slider' || $listing_type != 'cards' ) ) {
                                $termsArray  = get_the_terms( $projects_query->ID, 'tp-portfolio-category' );  //Get the terms for this particular item
                                $termsString = ""; //initialize the string that will contain the terms
                                $termsSlug   = "";
            
                                foreach ( $termsArray as $term ) { 
                                    $termsString .= 'filter_'.$term->slug.' '; 
                                    $termsSlug .= $term->name;
                                } 
                            } else {
                                $termsString = ""; //initialize the string that will contain the terms
                                $termsSlug   = "";
                            }

                            // Category 
                            $portfolio_cats  = get_the_terms( $projects_query->ID, 'tp-portfolio-category' );
                            if ( ! empty( $portfolio_cats ) && ! is_wp_error( $portfolio_cats ) ) {
                                // Get the first term
                                $first_cat = $portfolio_cats[0];
                                $cat_link = get_term_link( $first_cat );
                            }
                                            
                            require plugin_dir_path(__FILE__)."/portfolio-parts/$listing_type.php";

                        endwhile;
                    endif;
                    if( $listing_type === 'slider' ) { ?>
                        </div></div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>

        <?php
        // Pagination
        if ( $pagination == 'yes' && $listing_type != 'slider' && $projects_query->max_num_pages > 1 ) :
            ?>
            <div class="pagination">
                <?php
                echo paginate_links([
                    //'format'    => '?' . esc_attr($this->get_id()) . '-paged=%#%',
                    'current'   => max( 1, $paged ),
                    'total'     => $projects_query->max_num_pages,
                    'end_size'  => 2,
                ]);
                ?>
            </div>
        <?php
        endif;

        wp_reset_postdata(); 
        ?>

        <script>
            <?php if( $listing_type === 'cards' ) : ?>
            function initCardsProjects() {
                jQuery('body').css({
                    overflow: 'visible'
                });  
                
                const { ScrollObserver, valueAtPercentage } = aat;
                const cardsContainer = jQuery('.project-cards-listing');
                const cards = jQuery('.project-cards-listing .project-item-wrapper');

                cards.each(function(index) {
                    if (index === cards.length - 1) {
                        return;
                    }

                    const card = jQuery(this);
                    const toScale = 1 - (cards.length - 1 - index) * 0.05;
                    const nextCard = cards[index + 1];
                    const cardInner = card.find('.project-item');

                    ScrollObserver.Element(nextCard, {
                        offsetTop: 0,
                        offsetBottom: window.innerHeight - card.height()
                    }).onScroll(({ percentageY }) => {
                        const scale = valueAtPercentage({
                            from: 1,
                            to: toScale,
                            percentage: percentageY
                        });
                        cardInner.css('transform', `scale(${scale})`);
                        const filter = `brightness(${valueAtPercentage({
                            from: 1,
                            to: 0.6,
                            percentage: percentageY
                        })})`;
                        cardInner.css('filter', filter);
                    });
                });
            }

            jQuery(document).ready(function() {
                initCardsProjects();
            });

            <?php endif; ?>
            
            <?php if( $listing_type === 'slider' ) : ?>
            jQuery(document).ready(function(){
                    
                var swiper = new Swiper(".tp-portfolio-active-<?php echo esc_attr( $unique ); ?>", {				
                    slidesPerView: <?php echo $slidesToShow;?>,
                    speed: <?php echo esc_attr($autoplaySpeed); ?>,
                    loop: <?php echo esc_attr($infinite ); ?>,
                    <?php echo esc_attr($slider_autoplay); ?>,
                    spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                    <?php echo $pagination; ?>,
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".tp-portfolio-nav-next",
                        prevEl: ".tp-portfolio-nav-prev",
                    },
                    breakpoints: {
                        <?php
                        echo (!empty($col_xs)) ?  '0: { slidesPerView: '. $col_xs .' },' : '';
                        echo (!empty($col_sm)) ?  '575: { slidesPerView: '. $col_sm .' },' : '';
                        echo (!empty($col_md)) ?  '767: { slidesPerView: '. $col_md .' },' : '';
                        echo (!empty($col_lg)) ?  '991: { slidesPerView: '. $col_lg .' },' : '';
                        echo (!empty($col_xl)) ?  '1199: { slidesPerView: '. $col_xl .' },' : '';
                        ?>
                        1399: {
                            slidesPerView: <?php echo esc_attr($col_xxl); ?>,
                            spaceBetween:  <?php echo esc_attr($item_gap); ?>
                        }
                    }
                });
            
            });
            <?php endif; ?>

        </script>

        <?php
    }
}