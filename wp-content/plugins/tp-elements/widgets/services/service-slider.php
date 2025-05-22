<?php
/**
 * Logo widget class
 *
 */
use Elementor\Group_Control_Css_Filter;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Repeater;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\register_controls;

defined( 'ABSPATH' ) || die();

class Themephi_Elementor_Services_Slider_Widget  extends \Elementor\Widget_Base {
    /**
     * Get widget name.
     *   
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget name.
     */

    public function get_name() {
        return 'tp-service-slider';
    }

    /**
     * Get widget title.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget title.
     */

    public function get_title() {
        return esc_html__( 'TP Services Slider', 'tp-elements' );
    }

    /**
     * Get widget icon.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-gallery-grid';
    }


    public function get_categories() {
        return [ 'pielements_category' ];
    }

    public function get_keywords() {
        return [ 'service' ];
    }


    protected function register_controls() {       

        $this->start_controls_section(
            '_section_service',
            [
                'label' => esc_html__( 'Slider Item', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
			'service_slider_style',
			[
				'label'   => esc_html__( 'Select Services Style', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [					
					'style1' => esc_html__( 'Style 1', 'tp-elements'),
					'style2' => esc_html__( 'Style 2', 'tp-elements'),	
					'style3' => esc_html__( 'Style 3', 'tp-elements'),	
					'style4' => esc_html__( 'Style 4', 'tp-elements'),	
				],
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'tp-elements'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
            ]
        );  
		$repeater->add_control(
            'services_meta_show_hide',
            [
                'label' => esc_html__( 'Meta Show / Hide', 'tp-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'tp-elements' ),
                    'no' => esc_html__( 'No', 'tp-elements' ),
                ],                
                'separator' => 'before',
            ]
        );

		$repeater->add_control(
            'topic_fee',
            [
                'label' => esc_html__('Fee', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('$250.00', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Type Price', 'tp-elements' ),
                'separator'   => 'before',
                'condition' => [
                    'services_meta_show_hide' => 'yes',
                ],
            ]
        ); 
        
		$repeater->add_control(
            'trainer_name',
            [
                'label' => esc_html__('Trainer Name', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Masum Billah', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Type Trainer Name', 'tp-elements' ),
                'separator'   => 'before',
                'condition' => [
                    'services_meta_show_hide' => 'yes',
                ],
            ]
        ); 

		$repeater->add_control(
            'topic_name',
            [
                'label' => esc_html__('Topic', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Swimming Course', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Type Topice name', 'tp-elements' ),
                'separator'   => 'before',
                'condition' => [
                    'services_meta_show_hide' => 'yes',
                ],
            ]
        );      

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Title', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Name', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'tp-elements'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Description', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );        
        
		$repeater->add_control(
            'services_btn_show_hide',
            [
                'label' => esc_html__( 'Button Show / Hide', 'tp-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'tp-elements' ),
                    'no' => esc_html__( 'No', 'tp-elements' ),
                ],                
                'separator' => 'before',
            ]
        );
        
		$repeater->add_control(
			'services_btn_text',
			[
				'label' => esc_html__( 'Services Button Text', 'tp-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => 'View Service',
				'placeholder' => esc_html__( 'Services Button Text', 'tp-elements' ),
				'separator' => 'before',
				'condition' => [
					'services_btn_show_hide' => ['yes'],
				],
			]
		);

		$repeater->add_control(
			'services_btn_link',
			[
				'label' => esc_html__( 'Services Button Link', 'tp-elements' ),
				'type' => Controls_Manager::TEXT,
				'label_block' => true,
				'default' => '',
				'placeholder' => esc_html__( '#', 'tp-elements' ),		
				'condition' => [
					'services_btn_show_hide' => ['yes'],
				],	
			]
		);

		$repeater->add_control(
			'services_btn_link_open',
			[
				'label'   => esc_html__( 'Link Open New Window', 'tp-elements' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'no',
				'options' => [					
					'no' => esc_html__( 'No', 'tp-elements'),
					'yes' => esc_html__( 'Yes', 'tp-elements'),
				],
				'condition' => [
					'services_btn_show_hide' => ['yes'],
				],
			]
		);

		$repeater->add_control(
			'services_btn_icon',
			[
				'label' => esc_html__( 'Icon', 'tp-elements' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'solid',
				],			
				'separator' => 'before',	
				'condition' => [
					'services_btn_show_hide' => ['yes'],
				],		
			]
		);

		$repeater->add_control(
		    'services_btn_icon_position',
		    [
		        'label' => esc_html__( 'Icon Position', 'tp-elements' ),
		        'type' => Controls_Manager::CHOOSE,
		        'label_block' => false,
		        'options' => [
		            'before' => [
		                'title' => esc_html__( 'Before', 'tp-elements' ),
		                'icon' => 'eicon-h-align-left',
		            ],
		            'after' => [
		                'title' => esc_html__( 'After', 'tp-elements' ),
		                'icon' => 'eicon-h-align-right',
		            ],
		        ],
		        'default' => 'after',
		        'toggle' => false,
		        'condition' => [
		            'services_btn_icon!' => '',
					'services_btn_show_hide' => ['yes'],
		        ],
		    ]
		); 

		$repeater->add_control(
		    'services_btn_icon_spacing',
		    [
		        'label' => esc_html__( 'Icon Spacing', 'tp-elements' ),
		        'type' => Controls_Manager::SLIDER,
		       
		        'condition' => [
		            'services_btn_icon!' => '',
					'services_btn_show_hide' => ['yes'],
		        ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .services-part .services-text .services-btn-part .services-btn.icon-before i' => 'margin-right: {{SIZE}}{{UNIT}};',
		            '{{WRAPPER}} .tp-service--slider .services-part .services-text .services-btn-part .services-btn.icon-after i' => 'margin-left: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);

        $this->add_control(
            'slide_list',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ name }}}',
                'default' => [
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                    ['image' => ['url' => Utils::get_placeholder_image_src()]],
                ]
            ]
        );   

        $this->add_control(
			'show_graycale',
			[
				'label' => esc_html__( 'Enable Image Grayscale', 'tp-elements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tp-elements' ),
				'label_off' => esc_html__( 'Hide', 'tp-elements' ),
				'return_value' => 'yes',
				'default' => 'no',
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
                    'service_slider_style' => ['style2', 'style4'],
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

        
        $this->start_controls_section(
            'content_slider',
            [
                'label' => esc_html__( 'Slider Settings', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,               
            ]
        );

        $this->add_control(
            'col_xxl',
            [
                'label'   => esc_html__( 'Desktops > 1399px', 'tp-elements' ),
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
                'label'   => esc_html__( 'Desktops > 1199px', 'tp-elements' ),
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
                'label'   => esc_html__( 'Tablets > 767px', 'tp-elements' ),
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
            'col_sm',
            [
                'label'   => esc_html__( 'Tablets > 575px', 'tp-elements' ),
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
            'rt_pslider_effect',
            [
                'label' => esc_html__('Slider Effect', 'tp-elements'),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
					'default' => esc_html__('Default', 'tp-elements'),					
					'fade' => esc_html__('Fade', 'tp-elements'),
					'flip' => esc_html__('Flip', 'tp-elements'),
					'cube' => esc_html__('Cube', 'tp-elements'),
					'coverflow' => esc_html__('Coverflow', 'tp-elements'),
					'creative' => esc_html__('Creative', 'tp-elements'),
					'cards' => esc_html__('Cards', 'tp-elements'),
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

        $this->add_control(
            'item_gap_custom',
            [
                'label' => esc_html__( 'Item Gap', 'tp-elements' ),
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
            ]
        ); 
                
        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_item',
            [
                'label' => esc_html__( 'Slider Item', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'item_margin',
            [
                'label' => esc_html__( 'Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-el-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__( 'Padding', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-el-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'item_border',
				'selector' => '{{WRAPPER}} .tp-el-item',
			]
		);
        $this->add_control(
            'item_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-el-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'item_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-el-item' => 'background-color: {{VALUE}}',
                ],
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
                    'service_slider_style' => ['style2', 'style4'],
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

                $this->add_group_control(
                    Group_Control_Background::get_type(),
                    [
                        'name' => 'background_normal_color',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .icon-container, {{WRAPPER}} .icon-container .background svg',
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
                            '{{WRAPPER}} .icon-item .icon-container' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                        ],
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
                        'name' => 'hover_background_normal_color',
                        'types' => [ 'classic', 'gradient', 'video' ],
                        'selector' => '{{WRAPPER}} .icon-container:hover, {{WRAPPER}}:hover .icon-container:hover .background svg',
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
		    '_section_style_meta',
		    [
		        'label' => esc_html__( 'Meta', 'tp-elements' ),
		        'tab' => Controls_Manager::TAB_STYLE,
		    ]
		);

		$this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'meta_typography',
		        'selector' => '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a',
		    ]
		);

		$this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'meta_border',
		        'selector' => '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a',
		    ]
		);

		$this->add_control(
		    'meta_border_radius',
		    [
		        'label' => esc_html__( 'Border Radius', 'tp-elements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);
		$this->add_responsive_control(
		    'meta_padding',
		    [
		        'label' => esc_html__( 'Padding', 'tp-elements' ),
		        'type' => Controls_Manager::DIMENSIONS,
		        'size_units' => [ 'px', 'em', '%' ],
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
		        ],
		    ]
		);

		$this->add_group_control(
		    Group_Control_Box_Shadow::get_type(),
		    [
		        'name' => 'meta_box_shadow',
		        'selector' => '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a',
		    ]
		);

		$this->add_control(
		    'hr_two',
		    [
		        'type' => Controls_Manager::DIVIDER,
		        'style' => 'thick',
		    ]
		);

		$this->start_controls_tabs( '_tabs_meta' );

		$this->start_controls_tab(
		    '_tab_meta_normal',
		    [
		        'label' => esc_html__( 'Normal', 'tp-elements' ),
		    ]
		);

		$this->add_control(
		    'meta_color',
		    [
		        'label' => esc_html__( 'Text Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '',
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'meta_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .service-meta span, {{WRAPPER}} .tp-service--slider .service-meta a' => 'background-color: {{VALUE}};',
		        ],
		    ]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
		    '_tab_meta_hover',
		    [
		        'label' => esc_html__( 'Hover', 'tp-elements' ),
		    ]
		);

		$this->add_control(
		    'meta_hover_color',
		    [
		        'label' => esc_html__( 'Text Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
					'{{WRAPPER}} .tp-service--slider .service-meta span:hover, {{WRAPPER}} .tp-service--slider .service-meta a:hover' => 'color: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'meta_hover_bg_color',
		    [
		        'label' => esc_html__( 'Background Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .service-meta span:hover, {{WRAPPER}} .tp-service--slider .service-meta a:hover' => 'background: {{VALUE}};',
		        ],
		    ]
		);

		$this->add_control(
		    'meta_hover_border_color',
		    [
		        'label' => esc_html__( 'Border Color', 'tp-elements' ),
		        'type' => Controls_Manager::COLOR,
		        'selectors' => [
		            '{{WRAPPER}} .tp-service--slider .service-meta span:hover, {{WRAPPER}} .tp-service--slider .service-meta span:focus, {{WRAPPER}} .tp-service--slider .service-meta a:hover, {{WRAPPER}} .tp-service--slider .service-meta a:focus' => 'border-color: {{VALUE}};',
		        ],
		    ]
		);


		$this->end_controls_tab();
		$this->end_controls_tabs();

		$this->end_controls_section();


        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => esc_html__( 'Slider Style', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,
                
            ]
        );

        $this->add_control(
            'tp_image_margin',
            [
                'label' => esc_html__( 'Image Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-service--slider .single-item-image' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'title_service_typography',
		        'label' => esc_html__( 'Title Typography', 'tp-elements' ),
		        'selector' => '{{WRAPPER}} .tp-service--slider .single-item-title',
		    ]
		);

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-service--slider .single-item-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'title_margin',
            [
                'label' => esc_html__( 'Title Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-service--slider .single-item-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_group_control(
		    Group_Control_Typography::get_type(),
		    [
		        'name' => 'desc_service_typography',
		        'label' => esc_html__( 'Description Typography', 'tp-elements' ),
		        'selector' => '{{WRAPPER}} .tp-service--slider .single-item-content p',
		    ]
		);

        $this->add_control(
            'desc_color',
            [
                'label' => esc_html__( 'Description Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-service--slider .single-item-content p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'desc_margin',
            [
                'label' => esc_html__( 'Description Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-service--slider .single-item-content p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_style_grid_btn',
            [
                'label' => esc_html__( 'Slider Button', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'service_slider_style!' => ['style2', 'style4'],
                ],
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Text Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.tps-btn' => 'color: {{VALUE}}',
                    
                ],
            ]
        );
        $this->add_control(
            'btn_bg_color',
            [
                'label' => esc_html__( 'Button Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.tps-btn' => 'background: {{VALUE}}',                    
                ],
            ]
        );
        $this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'btn__border',
				'selector' => '{{WRAPPER}} .service-one-inner-four a.tps-btn',
			]
		);
        $this->add_control(
            'btn_border_color',
            [
                'label' => esc_html__( 'Button Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [                    
                    '{{WRAPPER}} .service-one-inner-four a.tps-btn' => 'border-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_color',
            [
                'label' => esc_html__( 'Button Hover Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn:hover' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.tps-btn:hover' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btn_hover_bg_color',
            [
                'label' => esc_html__( 'Button Hover Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn:hover' => 'background: {{VALUE}}',
                    '{{WRAPPER}} .service-one-inner-four a.tps-btn:hover' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'slider_btn_typography',
                'selector' => '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn',
            ]
        );

        $this->add_control(
            'slider_btn_margin',
            [
                'label' => esc_html__( 'Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'slider_btn_padding',
            [
                'label' => esc_html__( 'Padding', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        $this->add_control(
            'slider_btn_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {

        $settings = $this->get_settings_for_display();

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

        $col_xxl          = $settings['col_xxl'];
        $col_xxl          = !empty($col_xxl) ? $col_xxl : 3;
        $slidesToShow    = $col_xxl;
        $autoplaySpeed   = $settings['slider_autoplay_speed'];
        $autoplaySpeed   = !empty($autoplaySpeed) ? $autoplaySpeed : '1000';
        $interval        = $settings['slider_interval'];
        $interval        = !empty($interval) ? $interval : '3000';
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
        $item_gap        = $settings['item_gap_custom']['size'];
        $item_gap        = !empty($item_gap) ? $item_gap : '0';
        $unique          = rand(2012,35120);

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

        $effect = $settings['rt_pslider_effect'];

        if($effect== 'fade'){
            $seffect = "effect: 'fade', fadeEffect: { crossFade: true, },";
        }elseif($effect== 'cube'){
            $seffect = "effect: 'cube',";
        }elseif($effect== 'flip'){
            $seffect = "effect: 'flip',";
        }elseif($effect== 'coverflow'){
            $seffect = "effect: 'coverflow',";
        }elseif($effect== 'creative'){
            $seffect = "effect: 'creative', creativeEffect: { prev: { translate: [0, 0, -400], }, next: { translate: ['100%', 0, 0], }, },";
        }elseif($effect== 'cards'){
            $seffect = "effect: 'cards',";
        }else{
            $seffect = '';
        }


        $pagination_type = $settings['pagination_type'] === 'pagination_progressbar' ? 'progressbar' : ($settings['pagination_type'] ==='pagination_fraction' ? 'fraction' : '');
    
        $dynamic_bullets = $settings['pagination_type'] === 'pagination_dynamic' ? 'true' : 'false';
        $pagination_class = '.tp-service-pagination ';
        
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


        if ( empty($settings['slide_list'] ) ) {
            return;
        }   

        ?>
        <?php $gray_scale = $settings['show_graycale']; ?>

        <div class="swiper tp-service--slider tp_slider-<?php echo esc_attr($unique); ?> gray_<?php echo $settings['show_graycale'];?> tp-service-style-<?php echo esc_attr( $settings['service_slider_style'] ); ?>">
           
            <div class="swiper-wrapper">   

                <?php
                foreach ( $settings['slide_list'] as $index => $item ) :                        
                    $imgId = $item['image']['id'];
                                            
                    if($imgId ){
                        $image = wp_get_attachment_image_src($imgId, 'full')[0];                        
                    }else{
                        $IMGstyle = '';
                        $image = '';
                    }                            
                   
                    $title        = !empty($item['name']) ? $item['name'] : '';                              
                    $services_meta_show_hide = !empty($item['services_meta_show_hide']) ? $item['services_meta_show_hide'] : '';                              
                    $topic_name   = !empty($item['topic_name']) ? $item['topic_name'] : '';                              
                    $trainer_name = !empty($item['trainer_name']) ? $item['trainer_name'] : '';                              
                    $description  = !empty($item['description']) ? $item['description'] : '';
                    $btn_text     = !empty($item['btn_text']) ? $item['btn_text'] : '';
                    $target       = !empty($item['link']['is_external']) ? 'target=_blank' : '';  
                    $link         = !empty($item['link']['url']) ? $item['link']['url'] : '';                                        
                    
                    ?>

                    <?php if( $settings['service_slider_style'] == 'style4' ) : ?>
                    <div class="swiper-slide">
                        <div class="single-item-wrapper tp-el-item">

                        <?php if( $index % 2 !== 0 ) : ?>

                        <?php if(!empty($title)):?>
                        <h5 class="single-item-title mb-20"><?php echo wp_kses_post($title); ?></h5>
                        <?php endif;?>

                        <?php endif; ?>

                            <div class="single-item position-relative ">
                                <?php if(!empty($image)):?>
                                    <div class="single-item-image ">
                                        <img src="<?php echo esc_attr($image); ?>" class="w-100" alt="image">
                                    </div>
                                <?php endif;?>
                                <div class="hover-item position-absolute">
                                    <div class="text-item"> 
                                        <div class="service-meta">
                                            <?php if( !empty( $item['topic_name'] ) ){ ?>
                                            <span class="meta_topic"><?php echo esc_html( $item['topic_name'] ); ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="tp_elements-icon-widget d-inline-block position-absolute bottom-right-0" >
                                    <?php 
                                    if (!empty($settings['enable_decoration']) && !empty($settings['add_decoration'])) { 
                                        foreach ( $settings['add_decoration'] as $itemicon ) {
                                            echo '<span class="tp-border-decoration-' . $itemicon . ' "></span>';
                                        }
                                    }
                                    $link_open = $settings['btn_link_open'] == 'yes' ? 'target=_blank' : '';
                                    ?>
                                    <a href="<?php echo esc_attr( $item['services_btn_link'] ); ?>" class="icon-item-link" <?php echo esc_attr( $link_open ); ?> >
                                        <div class="icon-item">

                                            <div class="icon-container<?php echo ( !empty($background_type) ? ' background-type-' . esc_attr($background_type) : '' ); ?>">
                                                <?php
                                                if ($icon_type == 'default') {
                                                    echo '<i class="' . esc_attr($default_icon['value']) . '"></i>';
                                                }
                                                if ($icon_type == 'svg') {
                                                    echo '<span class="icon">' . tp_elements_output_code($svg_icon) . '</span>';
                                                }
                                                if ($icon_type == 'custom') {
                                                    echo '<span>' . $settings['custom_text'] . '</span>';
                                                }

                                                if ($background_type == 'image') {
                                                    if (!empty($bg_image['url'])) {
                                                        echo '<img class="icon-container-bg-image" src="' . esc_url($bg_image['url']) . '" alt="' . esc_html__('Background Image', 'tp-elements') . '" />';
                                                    }
                                                }
                                                if ($background_type == 'svg' && !empty($svg_background)) {
                                                    echo '<span class="background">' . tp_elements_output_code($svg_background) . '</span>';
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </a>
                                </div>


                            </div>

                            <?php if( $index % 2 == 0 ) : ?>

                            <?php if(!empty($title)):?>
                            <h5 class="single-item-title mb-0 mt-20"><?php echo wp_kses_post($title); ?></h5>
                            <?php endif;?>

                            <?php endif; ?>

                        </div>
                    </div>
                    <?php elseif( $settings['service_slider_style'] == 'style3' ) : ?>

                    <div class="swiper-slide">
                        <div class="single-item tp-el-item">
                            <?php if(!empty($image)):?>
                                <img src="<?php echo esc_attr($image); ?>" class="w-100" alt="image">
                            <?php endif;?>
                            <div class="text-area pt-4 pt-md-7">
                                <div class="text-item">
                                    <?php if(!empty($title)):?>
                                        <h5 class="mb-2 p2-color transition service-title"><?php echo wp_kses_post($title); ?></h5>
                                    <?php endif;?>
                                    <?php if(!empty($description)):?>
                                        <p class="s3-color"><?php echo  $description; ?></p>
                                    <?php endif;?>
                                </div>
                                <a href="<?php echo $link;?>" class="btn-area position-relative d-inline-flex gap-2 align-items-center ">
                                    <?php if(!empty($item['services_btn_text'])){ ?>
                                    <span class="text-uppercase p2-color fw-bold transition"><?php echo esc_html($item['services_btn_text']);?></span>
                                    <?php } ?>
                                    <span class="title-shape position-relative d-center v-line f-width"><span class="opacity-0 px-2"><?php echo esc_html__( 'title', 'tp-elements' ); ?></span></span>
                                </a>

                            </div>
                        </div>
                    </div>

                    <?php elseif( $settings['service_slider_style'] == 'style2' ) : ?>

                    <div class="swiper-slide">

                        <div class="single-item tp-el-item transition position-relative overflow-hidden">
                            <div class="single-item-image">
                                <div class="tp_elements-icon-widget d-inline-block position-absolute end-0" >
                                    <?php 
                                    if (!empty($settings['enable_decoration']) && !empty($settings['add_decoration'])) { 
                                        foreach ( $settings['add_decoration'] as $itemicon ) {
                                            echo '<span class="tp-border-decoration-' . $itemicon . ' "></span>';
                                        }
                                    }
                                    $link_open = $settings['btn_link_open'] == 'yes' ? 'target=_blank' : '';
                                    ?>
                                    <a href="<?php echo esc_attr( $item['services_btn_link'] ); ?>" class="icon-item-link" <?php echo esc_attr( $link_open ); ?> >
                                        <div class="icon-item">

                                            <div class="icon-container<?php echo ( !empty($background_type) ? ' background-type-' . esc_attr($background_type) : '' ); ?>">
                                                <?php
                                                if ($icon_type == 'default') {
                                                    echo '<i class="' . esc_attr($default_icon['value']) . '"></i>';
                                                }
                                                if ($icon_type == 'svg') {
                                                    echo '<span class="icon">' . tp_elements_output_code($svg_icon) . '</span>';
                                                }
                                                if ($icon_type == 'custom') {
                                                    echo '<span>' . $settings['custom_text'] . '</span>';
                                                }

                                                if ($background_type == 'image') {
                                                    if (!empty($bg_image['url'])) {
                                                        echo '<img class="icon-container-bg-image" src="' . esc_url($bg_image['url']) . '" alt="' . esc_html__('Background Image', 'tp-elements') . '" />';
                                                    }
                                                }
                                                if ($background_type == 'svg' && !empty($svg_background)) {
                                                    echo '<span class="background">' . tp_elements_output_code($svg_background) . '</span>';
                                                }
                                                ?>
                                            </div>

                                        </div>
                                    </a>
                                </div>

                                <?php if(!empty($image)):?>
                                <div class="icon-area position-relative">
                                    <img src="<?php echo esc_attr($image); ?>" class="max-un" alt="image">

                                    <?php if(($item['services_meta_show_hide'] == 'yes') ){ ?>
                                    <ul class="service-meta single-service-meta-abs position-absolute">
                                        <?php if( !empty( $item['trainer_name'] ) ){ ?>
                                        <li><span class="meta_trainer"><?php echo esc_html( $item['trainer_name'] ); ?></span></li>
                                        <?php } ?>
                                        <?php if( !empty( $item['topic_name'] ) ){ ?>
                                        <li><span class="meta_topic"><?php echo esc_html( $item['topic_name'] ); ?></span></li>
                                        <?php } ?>
                                    </ul>
                                    <?php } ?>

                                </div>
                                <?php endif;?>
                            </div>
                            <div class="single-item-content">
                                <?php if(!empty($title)):?>
                                <h5 class="single-item-title"><?php echo wp_kses_post($title); ?></h5>
                                <?php endif;?>
                                <?php if(!empty($description)):?>
                                <p><?php echo  $description; ?></p>
                                <?php endif;?>
                            </div>

                        </div>

                    </div>

                    <?php else : ?>
                    <div class="swiper-slide">
                        <div class="single-item tp-el-item">
                            <?php if(!empty($image)):?>
                            <div class="single-item-img">
                                <img src="<?php echo esc_attr($image); ?>" alt="service image">
                                <?php if(($item['services_meta_show_hide'] == 'yes') && !empty( $item['topic_fee'] ) ){ ?> 
                                <span class="meta_fee"><?php echo esc_html( $item['topic_fee'] ); ?> <span><?php echo esc_html__( '/ Person', 'tp-elements' ); ?></span></span> 
                                <?php } ?>
                            </div>
                            <?php endif;?>
                            <div class="single-item-content">

                                <?php if(($item['services_meta_show_hide'] == 'yes') ){ ?>
                                <ul class="service-meta">
                                    <?php if( !empty( $item['trainer_name'] ) ){ ?>
                                    <li><span class="meta_trainer"><i class="tp tp-user-2"></i><?php echo esc_html( $item['trainer_name'] ); ?></span></li>
                                    <?php } ?>
                                    <?php if( !empty( $item['topic_name'] ) ){ ?>
                                    <li><span class="meta_topic"><i class="tp tp-tags"></i><?php echo esc_html( $item['topic_name'] ); ?></span></li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>

                                <?php if(!empty($title)):?>
                                <div class="sigle-item-title">
                                    <h4 class="title"><?php echo wp_kses_post($title); ?></h4>
                                </div>
                                <?php endif;?>

                                <?php if(!empty( $description )) : ?>
                                    <p class="single-item-desc"><?php echo wp_kses_post( $description );?></p>
                                <?php endif; ?>	

                                <?php if(!empty($item['services_btn_show_hide'])){ ?>
                                <div class="services-btn-part mt-20">
                                    <?php 
                                        $link_open = $item['services_btn_link_open'] == 'yes' ? 'target=_blank' : ''; 		    		 
                                        $icon_position = $item['services_btn_icon_position'] == 'before' ? 'icon-before' : 'icon-after';
                                    ?>		    		
                                    <a class="services-btn <?php echo esc_html($icon_position); ?>" href="<?php echo esc_url($item['services_btn_link']);?>" <?php echo wp_kses_post($link_open); ?>>
                                        <?php if( $item['services_btn_icon_position'] == 'before' ) : ?>
                                            <?php if($item['services_btn_icon']): ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $item['services_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if(!empty($item['services_btn_text'])){ ?>
                                        <span class="btn_text">
                                            <?php echo esc_html($item['services_btn_text']);?>    						
                                        </span>	
                                        <?php } ?>
                                        <?php if( $item['services_btn_icon_position'] == 'after' ) : ?> 				
                                            <?php if($item['services_btn_icon']): ?>
                                            <?php \Elementor\Icons_Manager::render_icon( $item['services_btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </a>	    		    		
                                </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php
                endforeach; ?>

            </div>

        <script type="text/javascript"> 
            jQuery(document).ready(function(){
                var swiper<?php echo esc_attr($unique); ?><?php echo esc_attr($unique); ?> = new Swiper(".tp_slider-<?php echo esc_attr($unique); ?>", {				
                    slidesPerView: 1,
                    <?php echo $seffect; ?>
                    speed: <?php echo esc_attr($autoplaySpeed); ?>,
                    slidesPerGroup: 1,
                    loop: <?php echo esc_attr($infinite ); ?>,
                    <?php echo esc_attr($slider_autoplay); ?>,
                    spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                    <?php echo $pagination; ?>,
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".tp-service-slide-next",
                        prevEl: ".tp-service-slide-prev",
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
        </script>
        <?php
    }
}