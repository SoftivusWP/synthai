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
class Themephi_Elementor_Hero_Slider_Widget  extends \Elementor\Widget_Base {
  
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
        return 'tp-hero-slider';
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
        return esc_html__( 'TP Hero Slider', 'tp-elements' );
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
        return [ 'hero-slider' ];
    }
    protected function register_controls() {

        $this->start_controls_section(
            '_services_slider_s',
            [
                'label' => esc_html__( 'Slider Style', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'tp_slider_style',
            [
                'label'   => esc_html__( 'Select Style', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'style1',
                'options' => [					
                    'style1' => esc_html__( 'Style 1', 'tp-elements'),
                ],
            ]
        );        

        $this->end_controls_section();

        $this->start_controls_section(
            '_section_logo',
            [
                'label' => esc_html__( 'Slider Item', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
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

        // $repeater->add_control(
        //     'sub_image',
        //     [
        //         'label' => esc_html__('Befor Title Image', 'tp-elements'),
        //         'type' => Controls_Manager::MEDIA,
        //         'default' => [
        //             'url' => Utils::get_placeholder_image_src(),
        //         ],
        //     ]
        // );

		// $repeater->add_control(
        //     'sub_title',
        //     [
        //         'label' => esc_html__('Sub Title', 'tp-elements'),
        //         'type' => Controls_Manager::TEXT,
        //         'default' => esc_html__( 'Find Your Favorite Affiliate Coupons', 'tp-elements'),
        //         'label_block' => true,
        //         'placeholder' => esc_html__( 'Type Sub Title', 'tp-elements' ),
        //         'separator'   => 'before',
        //     ]
        // );

        $repeater->add_control(
            'hero_title',
            [
                'label' => esc_html__('Title', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'SynthAI', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Type Title', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'tp-elements'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('Web developers and marketers who\’ve been We excel at marketing websites.', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Type Description', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
			'show_button',
			[
				'label' => esc_html__( 'Enable Button ?', 'tp-elements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tp-elements' ),
				'label_off' => esc_html__( 'Hide', 'tp-elements' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$repeater->add_control(
			'btn_text',
			[
				'label'   => esc_html__( 'Text', 'tp-elements' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'Read More', 'tp-elements' ),
			]
		);

		$repeater->add_control(
			'btn_icon',
			[
				'label'       => esc_html__( 'Icon', 'tp-elements' ),
				'type'        => Controls_Manager::ICONS,
				'skin'        => 'inline',
				'label_block' => false,
				'default'     => [
					'value'   => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
			]
		);

		$repeater->add_control(
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

        $this->add_control(
            'hero_items',
            [
                'show_label' => false,
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ hero_title }}}',
				'default' => [
					[
						'hero_title' => esc_html__( 'Title #1', 'tp-elements' ),
					],
					[
						'hero_title' => esc_html__( 'Title #2', 'tp-elements' ),
					],
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
                'label'   => esc_html__( 'Desktops > 768px', 'tp-elements' ),
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
                    '4000' => esc_html__( '4 Seconds', 'tp-elemsents' ), 
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
                    'size' => 15,
                ],          
            ]
        ); 
                
        $this->end_controls_section();
   
        $this->start_controls_section(
            '_section_style_grid',
            [
                'label' => esc_html__( 'Slider Style', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__( 'Content Space', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-text' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_responsive_control(
            'title_space',
            [
                'label' => esc_html__( 'Title Space', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .tp-hero-slider-title',
            ]
        );

        $this->add_control(
		    'subtitle_image_width',
		    [
		        'label' => esc_html__( 'subtitle imagee width', 'tp-elements' ),
		        'type' => Controls_Manager::SLIDER,
				'size_units' => ['px'],
		        'selectors' => [    
		            '{{WRAPPER}} .tp-hero-slider-subtitle img' => 'height: {{SIZE}}{{UNIT}}; width: {{SIZE}}{{UNIT}};',	 	            
		        ],
		    ]
		);

        $this->add_responsive_control(
            'subtitle_space',
            [
                'label' => esc_html__( 'SubTitle Space', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-subtitle' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Sub Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .tp-hero-slider-subtitle',
            ]
        );

        $this->add_control(
            'des__styles',
            [
                'label' => esc_html__( 'Description Styles', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'des__color',
            [
                'label' => esc_html__( 'Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-description' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des__typography',
                'selector' => '{{WRAPPER}} .tp-hero-slider-description',
            ]
        );

        $this->add_responsive_control(
            'des__margin',
            [
                'label' => esc_html__( 'Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp-hero-slider-description' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
				'selector' => '{{WRAPPER}} .helo--btn:hover, {{WRAPPER}} .wc-btn-group:hover span',
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->end_controls_section();

    }
    protected function render() {
        $settings = $this->get_settings_for_display();
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
        $item_gap        = !empty($item_gap) ? $item_gap : '30';   
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
        $pagination_class = '.tp-hero-pagination ';
        
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


        if ( empty($settings['hero_items'] ) ) {
            return;
        }

        $sstyle = $settings['tp_slider_style'];

        ?>
        <style>

            .slider-style1 .tp-slide-item * {
                opacity: 0;
                visibility: hidden;
            }
            .tp-hero-slider-text {
                max-width: 550px;
            }
            .slider-style1 .tp-slide-item.swiper-slide-active * {
                opacity: 1;
                visibility: visible;
            }
            .slider-style1 .tp-slide-item .tp-hero-slider-title {
                transform: translateY(40px);
                transition: 0.7s;
            }
            .slider-style1 .tp-slide-item.swiper-slide-active .tp-hero-slider-title {
                transform: translateY(0px);
            }
            .slider-style1 .tp-slide-item .tp-hero-slider-description {
                transform: translateY(50px);
                transition: 0.9s;
            }
            .slider-style1 .tp-slide-item.swiper-slide-active .tp-hero-slider-description {
                transform: translateY(0px);
            }
            .slider-style1 .tp-slide-item .helo--btn-wrapper {
                transform: translateY(60px);
                transition: 1.3s;
            }
            .slider-style1 .tp-slide-item.swiper-slide-active .helo--btn-wrapper {
                transform: translateY(0px);
            }
            .button-pro-align-center .wc-btn-group {
                margin: 0 auto;
            }
            .button-pro-align-start .wc-btn-group {
                margin-right: auto;
            }
            .button-pro-align-end .wc-btn-group {
                margin-left: auto;
            }

        </style>
            <div class="slider-inner-wrapper">
                <div class="themephi-addon-slider swiper slider-<?php echo esc_attr( $sstyle ); ?> tp_slider-<?php echo esc_attr($unique); ?>">

                    <div class="swiper-wrapper">                   
                        <?php
                        $total_number = count( $settings['hero_items'] );
                        foreach ( $settings['hero_items'] as $index => $item ) :                     
                            $imgId = $item['image']['id'];
                            //$sub_imgId = $item['sub_image']['id'];
                                        
                            if($imgId ){
                                $image = wp_get_attachment_image_src($imgId, 'full')[0];
                                $IMGstyle = 'style="background-image: url( '. $image .' );"';
                            }else{
                                $IMGstyle = '';
                                $image = '';
                            }                            
               
                            // if($sub_imgId ){
                            //     $sub_image = wp_get_attachment_image_src($sub_imgId, 'full')[0];
                            // }else{
                            //     $sub_image = '';
                            // }                            
               
                            // $sub_title    = !empty($item['sub_title']) ? $item['sub_title'] : '';
                            $hero_title   = !empty($item['hero_title']) ? $item['hero_title'] : '';                                 
                            $description  = !empty($item['description']) ? $item['description'] : '';    
                            $btn_text  = !empty($item['btn_text']) ? $item['btn_text'] : '';    
                            $btn_link  = !empty($item['btn_link']['url']) ? $item['btn_link']['url'] : '';    
                            $target = $item['btn_link']['is_external'] ? 'target=_blank' : '';

                            if($sstyle){
                                require plugin_dir_path(__FILE__)."/$sstyle.php";
                            }else{
                                require plugin_dir_path(__FILE__)."/style1.php";
                            }
                            endforeach; 
                        ?>
                    </div>   
            
                </div>
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
                            nextEl: ".tp-hero-next",
                            prevEl: ".tp-hero-prev",
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