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
class Themephi_Elementor_Testimonial_Slider_Widget  extends \Elementor\Widget_Base {
  
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
        return 'tp-slider';
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
        return esc_html__( 'TP Testimonial Slider', 'tp-elements' );
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
        return [ 'slider' ];
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
                    'style2' => esc_html__( 'Style 2', 'tp-elements'),
                    'style3' => esc_html__( 'Style 3', 'tp-elements'),
                    'style4' => esc_html__( 'Style 4', 'tp-elements'),
                    'style5' => esc_html__( 'Style 5', 'tp-elements'),
                    'style6' => esc_html__( 'Style 6', 'tp-elements'),
                    'style7' => esc_html__( 'Style 7', 'tp-elements'),
                    'style8' => esc_html__( 'Style 8', 'tp-elements'),
                    'style9' => esc_html__( 'Style 9', 'tp-elements'),
                ],
            ]
        );        

        $this->add_control(
            'add_overlay_mobile',
            [
                'label'   => esc_html__( 'Add Overlay on Mobile', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,  
                'default' => 'true',                    
                'options' => [
                    'true' => esc_html__( 'Enable', 'tp-elements' ),
                    'false' => esc_html__( 'Disable', 'tp-elements' ),              
                ],
                'separator' => 'before',
                'condition' => [ 'tp_slider_style' => 'style4', ],
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

        $repeater->add_responsive_control(
            'img_margin',
            [
                'label' => esc_html__( 'Image Right Margin', 'tp-elements' ),
                'type' => Controls_Manager::TEXT,
                              
            ]
        ); 

		$repeater->add_control(
            'sub-name',
            [
                'label' => esc_html__('Designation', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Designation', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'designation', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'name',
            [
                'label' => esc_html__('Name', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__( 'Type Name', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Name', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'top_title',
            [
                'label' => esc_html__('Title', 'tp-elements'),
                'type' => Controls_Manager::TEXT,
                'default' => __('“Great work quality, and delivered on time”', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Title', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'tp-elements'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('Thanks to Hyperai, I\'m in the best shape of my life. The training sessions are challenging but rewarding.', 'tp-elements'),
                'label_block' => true,
                'placeholder' => esc_html__( 'Description', 'tp-elements' ),
                'separator'   => 'before',
            ]
        );

        $this->add_control(
			'show_rating',
			[
				'label' => esc_html__( 'Show Rating', 'tp-elements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tp-elements' ),
				'label_off' => esc_html__( 'Hide', 'tp-elements' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

        $this->add_control(
			'show_rating_in_first',
			[
				'label' => esc_html__( 'Show in First', 'tp-elements' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'tp-elements' ),
				'label_off' => esc_html__( 'Hide', 'tp-elements' ),
				'return_value' => 'yes',
				'default' => 'no',
                'condition' => [
                    'show_rating' => 'yes',
                    'tp_slider_style' => 'style1',
                ],
			]
		);

        $repeater->add_control(
            'tp_rating',
            [
                'label'   => esc_html__( 'Select Rating', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '5',
                'options' => [					
                    '1' => esc_html__( '1', 'tp-elements'),
                    '1.5' => esc_html__( '1.5', 'tp-elements'),
                    '2' => esc_html__( '2', 'tp-elements'),
                    '2.5' => esc_html__( '2.5', 'tp-elements'),
                    '3' => esc_html__( '3', 'tp-elements'),
                    '3.5' => esc_html__( '3.5', 'tp-elements'),
                    '4' => esc_html__( '4', 'tp-elements'),
                    '4.5' => esc_html__( '4.5', 'tp-elements'),
                    '5' => esc_html__( '5', 'tp-elements'),
                ],
            ]
        );

        $this->add_control(
            'logo_list',
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
            'sub-name-image-icon',
            [
                'label' => esc_html__('Quote Icon', 'tp-elements'),
                'type' => Controls_Manager::MEDIA,
            ]
        );  

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
                            
            ]
            
        );

        $this->add_control(
            'col_md',
            [
                'label'   => esc_html__( 'Desktops > 767px', 'tp-elements' ),
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


        $this->add_control(
            'title_color',
            [
                'label' => esc_html__( 'Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tp--slider.slider-style5 .slider-content-area .content--box .slider-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tp-el-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-inner-wrapper .tp-el-title' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-title' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .tp--slider .single--item .content--box .slider-title, {{WRAPPER}} .tp--slider.slider-style5 .slider-content-area .content--box .slider-title, {{WRAPPER}} .tp-el-title, {{WRAPPER}} .slider-inner-wrapper .tp-el-title, {{WRAPPER}} .slider-title'
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => esc_html__( 'Sub Title Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .tp--slider.slider-style5 .slider-content-area .content--box .slider-subtitle' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-inner-wrapper .tp-el-subtitle, {{WRAPPER}} .slider-subtitle' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_typography',
                'selector' => '{{WRAPPER}} .tp--slider.slider-style5 .slider-content-area .content--box .slider-subtitle, {{WRAPPER}} .slider-inner-wrapper .tp-el-subtitle, {{WRAPPER}} .slider-subtitle',
            ]
        );

        $this->add_control(
            'ragting_title_color',
            [
                'label' => esc_html__( 'Rating Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider.slider-style2 .single--item .review-body .star-rating .star' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-inner-wrapper .tp-el-star' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'img__styles',
            [
                'label' => esc_html__( 'Image Styles', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'slider_image_width',
            [
                'label' => esc_html__( 'Image Width', 'tp-elements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .banner-image, {{WRAPPER}} .info-area .img-area' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'image__padding',
            [
                'label' => esc_html__( 'Padding', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .banner-image, {{WRAPPER}} .info-area .img-area' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        
        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tp-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .banner-image img, {{WRAPPER}} .info-area .img-area img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'quote_img__styles',
            [
                'label' => esc_html__( 'Quote Image Styles', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'quote_image_width',
            [
                'label' => esc_html__( 'Quote Image Width', 'tp-elements' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 80,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 80,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-end' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'quote_image__margin',
            [
                'label' => esc_html__( 'Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-end' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'quote_image__padding',
            [
                'label' => esc_html__( 'Padding', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-end' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'quote_image_bg_color',
            [
                'label' => esc_html__( 'Quote Background', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-end' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'quote_image_border',
		        'selector' => '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-end',
		    ]
		);

        $this->add_control(
            'quote_image_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tp-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-end' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
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
                    '{{WRAPPER}} .tp--slider.slider-style2 .single--item .description .desc p' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider.slider-style2 .single--item .description .desc' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-inner-wrapper .tp-el-desc' => 'color: {{VALUE}}',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-body .desc' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des__typography',
                'selector' => '{{WRAPPER}} .slider-inner-wrapper .tp-el-desc, {{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-body .desc, {{WRAPPER}} .slider-inner-wrapper .tp--slider.slider-style2 .single--item .description .desc',
            ]
        );

        $this->add_responsive_control(
            'des__padding',
            [
                'label' => esc_html__( 'Padding', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp--slider.slider-style2 .single--item .description .desc p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider.slider-style2 .single--item .description .desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .slider-inner-wrapper .tp-el-desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-body .desc' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );
        
        $this->add_responsive_control(
            'des__margin',
            [
                'label' => esc_html__( 'Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .tp--slider.slider-style2 .single--item .description .desc p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider.slider-style2 .single--item .description .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .slider-inner-wrapper .tp-el-desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-body .desc' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_group_control(
		    Group_Control_Border::get_type(),
		    [
		        'name' => 'slider_desc_border',
		        'selector' => '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-body .desc, {{WRAPPER}} .slider-inner-wrapper .tp--slider.slider-style2 .single--item .description .desc',
		    ]
		);

        $this->add_control(
            'slider_desc_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tp-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .review-body .desc, {{WRAPPER}} .slider-inner-wrapper .tp--slider.slider-style2 .single--item .description .desc' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'btn_style_options',
            [
                'label' => esc_html__( 'Button Styles', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => esc_html__( 'Button Text Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp--slider .single--item .content--box .slider-btn' => 'color: {{VALUE}}',
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

        $this->add_responsive_control(
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

        $this->add_responsive_control(
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

        $this->start_controls_section(
            '_testimonial_item_style',
            [
                'label' => esc_html__( 'Item Style', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'slider_alignment',
            [
                'label' => esc_html__( 'Item Alignment', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'default' => '',
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'tp-elements' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'tp-elements' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'tp-elements' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .themephi-addon-slider .single--item' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .slider-inner-wrapper ul.tp-el-star' => 'justify-content: {{VALUE}};',
                    '{{WRAPPER}} .slider-inner-wrapper .tp--slider .single--item .banner-image, {{WRAPPER}} .info-area .img-area' => 'justify-content: {{VALUE}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'item__padding',
            [
                'label' => esc_html__( 'Padding', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single--item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_responsive_control(
            'item__margin',
            [
                'label' => esc_html__( 'Margin', 'tp-elements' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single--item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => esc_html__( 'Border Radius', 'tp-elements' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .single--item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                ],
            ]
        );

        $this->start_controls_tabs( '_tabs_item' );

		$this->start_controls_tab(
            'style_normal_tab_item',
            [
                'label' => esc_html__( 'Normal', 'tp-elements' ),
            ]
        );

        $this->add_control(
            'item_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single--item' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->end_controls_tab();

		$this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'tp-elements' ),
            ]
        );

        $this->add_control(
            'item_hover_bg_color',
            [
                'label' => esc_html__( 'Background Color', 'tp-elements' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single--item:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'item_hover_content_color',
            [
                'label' => esc_html__( 'Color', 'tp-elements' ), 
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single--item:hover .slider-title, {{WRAPPER}} .single--item:hover .slider-subtitle, {{WRAPPER}} .single--item:hover .desc, {{WRAPPER}} .single--item:hover .rating-portion i' => 'color: {{VALUE}} !important',
                ],
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
        $pagination_class = '.tp-testimonial-pagination ';
        
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


        if ( empty($settings['logo_list'] ) ) {
            return;
        }

        $sstyle = $settings['tp_slider_style'];
        $overlay_mobile = '';

        if( $settings['add_overlay_mobile'] == 'true' ){
            $overlay_mobile = ' overlay_mobile';
        }

        $sub_img_link = $settings['sub-name-image-icon']['url'];

        ?>
            <div class="slider-inner-wrapper">

                <div class="themephi-addon-slider swiper tp--slider<?php echo esc_attr( $overlay_mobile ); ?> slider-<?php echo esc_attr( $sstyle ); ?> tp_slider-<?php echo esc_attr($unique); ?>">

                    <div class="swiper-wrapper">                   
                    <?php
                        $total_number = count( $settings['logo_list'] );
                        foreach ( $settings['logo_list'] as $index => $item ) :                     
                            $imgId = $item['image']['id'];
                                                    
                            if($imgId ){
                                $image = wp_get_attachment_image_src($imgId, 'full')[0];
                                $IMGstyle = 'style="background-image: url( '. $image .' );"';
                            }else{
                                $IMGstyle = '';
                                $image = '';
                            }                            
    
                            $title        = !empty($item['name']) ? $item['name'] : '';                              
                            $sub_title    = !empty($item['sub-name']) ? $item['sub-name'] : '';                              
                            $top_title    = !empty($item['top_title']) ? $item['top_title'] : '';                              
                            $description  = !empty($item['description']) ? $item['description'] : '';
                            $tp_rating  = !empty($item['tp_rating']) ? $item['tp_rating'] : '5';
                            $img_gap = $item['img_margin'];         

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
            <?php if( !empty( $right_quote_link ) ): ?>
               <div class="right-quote">
                   <img src="<?php echo $right_quote_link; ?>" alt="">
               </div>    
            <?php endif; ?>

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
                            nextEl: ".tp-testimonial-next",
                            prevEl: ".tp-testimonial-prev",
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