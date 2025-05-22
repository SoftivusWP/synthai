<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;

defined( 'ABSPATH' ) || die();

class Themephi_Elementor_Blog_Slider_Widget extends \Elementor\Widget_Base {

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
        return 'tp-blog-slider';
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
        return __( 'TP Blog Slider', 'tp-elements' );
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
    
    
    protected function register_controls() {    
        

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'portfolio_slider_style',
            [
                'label'   => esc_html__( 'Select Style', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT,
                'default' => '1',               
                'options' => [
                    '1' => 'Style 1',
                    '2' => 'Style 2',
                    '3' => 'Style 3',               
                    '4' => 'Style 4', 
                    '5' => 'Style 5',               
                ],                                          
            ]
        );


        $this->add_control(
            'portfolio_category',
            [
                'label'   => esc_html__( 'Category', 'tp-elements' ),
                'type'    => Controls_Manager::SELECT2, 
                'default' => 0,         
                'options' => $this->getCategories(),
                'multiple' => true, 
                'separator' => 'before',        
            ]

        );        

        $this->add_control(
            'per_page',
            [
                'label' => esc_html__( 'Blog Show Per Page', 'tp-elements' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => esc_html__( 'example 3', 'tp-elements' ),
                'separator' => 'before',
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
            ]
        ); 
       
        $this->add_control(
            'details_btn_text',
            [
                'label' => esc_html__( 'Button Text', 'tp-elements' ),
                'type' => Controls_Manager::TEXT,               
                'separator' => 'before',
                 'condition' => [
                    'portfolio_slider_style' => '3',
                ],  
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
       

        $this->start_controls_section(
            'meta_section',
            [
                'label' => esc_html__( 'Meta Settings', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'blog_avatar_show_hide',
            [
                'label' => esc_html__( 'Author Show / Hide', 'tp-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'tp-elements' ),
                    'no' => esc_html__( 'No', 'tp-elements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_cat_show_hide',
            [
                'label' => esc_html__( 'Category Show / Hide', 'tp-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'tp-elements' ),
                    'no' => esc_html__( 'No', 'tp-elements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_comments_show_hide', 
            [
                'label' => esc_html__( 'Comments Show / Hide', 'tp-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'no',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'tp-elements' ),
                    'no' => esc_html__( 'No', 'tp-elements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'blog_meta_show_hide',
            [
                'label' => esc_html__( 'Date Show / Hide', 'tp-elements' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'yes',
                'options' => [
                    'yes' => esc_html__( 'Yes', 'tp-elements' ),
                    'no' => esc_html__( 'No', 'tp-elements' ),
                ],                
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__( 'Button Settings', 'tp-elements' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
       

        $this->add_control(
            'blog_readmore_text',
            [
                'label' => esc_html__( 'Read More Button text', 'tp-elements' ),
                'type' => Controls_Manager::TEXT,         
                'separator' => 'before',
            ]
        );



 $this->end_controls_section();

 $this->start_controls_section(
    'content_slider',
    [
        'label' => esc_html__( 'Slider Settings', 'tp-elements' ),
        'tab'   => Controls_Manager::TAB_CONTENT,               
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

    $this->start_controls_section(
        'section_slider_style',
        [
            'label' => esc_html__( 'Content', 'tp-elements' ),
            'tab' => Controls_Manager::TAB_STYLE,
        ]
    );

        $this->add_control(
        'title_color',
        [
            'label' => esc_html__( 'Title Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [                  
                '{{WRAPPER}} .tp-blog-slider h3.title a' => 'color: {{VALUE}};',                   

            ],                
        ]
    );



    $this->add_control(
        'title_color_hover',
        [
            'label' => esc_html__( 'Title Hover Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider h3.title a:hover' => 'color: {{VALUE}};',                    
            ],                
        ]
        
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'title_typography',
            'label' => esc_html__( 'Title Typography', 'tp-elements' ),
            'selector' => '{{WRAPPER}} .themephi-blog-grid1 .title a',                    
        ]
    );

    $this->add_group_control(
        \Elementor\Group_Control_Border::get_type(),
        [
            'name' => 'title_border',
            'selector' => '{{WRAPPER}} .tp-blog-slider.slider-style-3 .title',
            'condition' => [
                'portfolio_slider_style' => '3'
            ]
        ]
        
    );

    $this->add_responsive_control(
        'blog_title_padding',
        [
            'label' => esc_html__( 'Title Padding', 'tp-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider.slider-style-3 .title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'portfolio_slider_style' => '3'
            ]
        ]
    );


    $this->add_responsive_control(
        'blog_title_margin',
        [
            'label' => esc_html__( 'Title Margin', 'tp-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider.slider-style-3 .title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'portfolio_slider_style' => '3'
            ]
        ]
    );

    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'cat_grad_bg',
            'label' => esc_html__( 'Category Background', 'tp-elements' ),
            'types' => [ 'classic', 'gradient' ],
            'exclude' => [ 'image' ],
            'selector' => '{{WRAPPER}} .tp-blog-slider.tp-blog-style2 .portfolio-item .portfolio-content .p-category',
            'fields_options' => [
                'background' => [
                    'default' => 'classic',
                ],
            ],
            
        ]
    );

    $this->add_control(
        'category_color',
        [
            'label' => esc_html__( 'Category Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .post-categories li a' => 'color: {{VALUE}};',                   

            ],                
        ]
    );

    $this->add_control(
        'category_color_hover',
        [
            'label' => esc_html__( 'Category Hover Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .post-categories li a:hover' => 'color: {{VALUE}};',                    
            ],                
        ]
        
    ); 

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'category_typography',
            'label' => esc_html__( 'Category Typography', 'tp-elements' ),
            'selector' => '{{WRAPPER}} .tp-blog-slider .post-categories li a',                    
        ]
    ); 

    $this->add_control(
        'autor_color',
        [
            'label' => esc_html__( 'Author Text Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .blog-content .blog-meta li span' => 'color: {{VALUE}};',                    
            ],                
        ]
        
    ); 

    $this->add_control(
        'meta_bg_color',
        [
            'label' => esc_html__( 'Author Meta BG Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider.slider-style-1 .image-part .blog-badge' => 'background: {{VALUE}};',                    
            ],                
        ]
        
    ); 

    $this->add_control(
        'Seperator Color',
        [
            'label' => esc_html__( 'Author Separator Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .blog-content .blog-meta li' => 'color: {{VALUE}};',                    
            ],                
        ]
        
    ); 

    $this->add_control(
        'button_text_color',
        [
            'label' => esc_html__( 'Button Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [                  
                '{{WRAPPER}} .tp-blog-slider .tps-read-more' => 'color: {{VALUE}};',                   

            ],                
        ]
    );

    $this->add_control(
        'button_text_color_hover',
        [
            'label' => esc_html__( 'Btton Hover Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .tps-read-more:hover' => 'color: {{VALUE}};',                    
            ],                
        ]
    );

    $this->add_group_control(
        Group_Control_Typography::get_type(),
        [
            'name' => 'btn_typography',
            'label' => esc_html__( 'Typography', 'tp-elements' ),
            'selector' => '{{WRAPPER}} .tp-blog-slider.slider-style-5 .footer-area .tps-read-more',  
            'condition' => [
                'portfolio_slider_style' => ['5']
            ]                  
        ]
    );

    $this->add_responsive_control(
        'blog_button_padding',
        [
            'label' => esc_html__( 'Button Padding', 'tp-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider.slider-style-3 .blog-btn.themephi-button a, .tp-blog-slider.slider-style-5 .footer-area .tps-read-more' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'portfolio_slider_style' => ['3', '5']
            ]
        ]
    );

    $this->add_control(
        'icon_color6',
        [
            'label' => esc_html__( 'Icon Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-icon i' => 'color: {{VALUE}};',                   

            ], 
            'condition' => [
                'portfolio_slider_style' => '6',
            ],               
        ]
    ); 

    $this->add_control(
        'icon_bg_color6',
        [
            'label' => esc_html__( 'Icon Background Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-portfolio-slider.slider-style-6 .portfolio-item .portfolio-content .p-icon i' => 'background: {{VALUE}};',                   

            ], 
            'condition' => [
                'portfolio_slider_style' => '6',
            ],               
        ]
    ); 

    $this->add_control(
        'item_border_color',
        [
            'label' => esc_html__( 'Border Color', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .tp-portfolio-slider.slider-style-6 .portfolio-item:before' => 'background: {{VALUE}};',                   

            ], 
            'condition' => [
                'portfolio_slider_style' => '6',
            ],               
        ]
    ); 

    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'text_bg_color',
            'label' => esc_html__( 'Text Background Color', 'tp-elements' ),
            'types' => [ 'classic', 'gradient' ],
            'condition' => [
                'portfolio_slider_style' => '5',
            ],
            'selector' => '{{WRAPPER}} .slider-style-5 .tp-portfolio4 .portfolio-item .portfolio-inner, .tp-blog-slider.slider-style-5 .blog-content'
        ]
    );


    $this->add_control(
        'image_overlay',
        [
            'label' => esc_html__( 'Image Overlay', 'tp-elements' ),
            'type' => Controls_Manager::COLOR,
            
            'selectors' => [
                '{{WRAPPER}} .portfolio-content:before' => 'background: {{VALUE}};',
                '{{WRAPPER}} .slider-style-5 .tp-portfolio4 .portfolio-item' => 'background: {{VALUE}};',
                '{{WRAPPER}} .tp-portfolio-style3 .portfolio-item .portfolio-img:before' => 'background: {{VALUE}};',
                '{{WRAPPER}} .tp-portfolio-style2 .portfolio-item:before' => 'background: {{VALUE}};',

            ],                
        ]
    );

    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'blog_wrapper_bg',
            'label' => esc_html__( 'Blog Wrapper Backgound', 'tp-elements' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .tp-blog-slider.slider-style-3 .tps-blog-h-2-wrapper',
            'condition' => [
                'portfolio_slider_style' => '3'
            ]
        ]
    );

    $this->add_responsive_control(
        'blog_slider_content_padding',
        [
            'label' => esc_html__( 'Content Padding', 'tp-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .blog-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $this->add_responsive_control(
        'blog_slider_content_margin',
        [
            'label' => esc_html__( 'Content Margin', 'tp-elements' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .tp-blog-slider .blog-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );


    $this->add_group_control(
        Group_Control_Background::get_type(),
        [
            'name' => 'style_overly_bg',
            'label' => esc_html__( 'Overlay Background Color', 'tp-elements' ),
            'types' => [ 'classic', 'gradient' ],
            'selector' => '{{WRAPPER}} .tp-portfolio-slider.slider-style-6 .portfolio-item:after',
            'condition' => [
                'portfolio_slider_style' => '6'
            ]
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

        $settings              = $this->get_settings_for_display();             
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

        $item_gap = $settings['item_gap_custom']['size'];
        $item_gap = !empty($item_gap) ? $item_gap : '30';
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
        $pagination_class = '.tp-blog-pagination ';
        
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

    
        ?>   
        <?php $gray_scale = $settings['show_graycale']; ?>
        <div class="tpaddon-unique-slider gray_<?php echo $settings['show_graycale'];?> themephi-addon-slider tp-blog-slider tp-blog tp-blog-style<?php echo esc_attr($settings['portfolio_slider_style']); ?> slider-style-<?php echo esc_attr($settings['portfolio_slider_style']); ?> ">
            <div id="rsaddon-slick-slider-<?php echo esc_attr($unique); ?>" class="rt_widget_sliders swiper tpaddon-slider-<?php echo esc_attr($unique); ?>">
                <div class="swiper-wrapper">
                    <?php  if('1' == $settings['portfolio_slider_style']){ 
                            include plugin_dir_path(__FILE__)."/style1.php";
                        }

                        if('2' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style2.php";
                        }

                        if('3' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style3.php";
                        }

                        if('4' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style4.php";
                        } 

                        if('5' == $settings['portfolio_slider_style']){
                            include plugin_dir_path(__FILE__)."/style5.php";
                        }                                  
                        
                    ?>
                </div>
            </div>
        </div>
        <script type="text/javascript"> 
            jQuery(document).ready(function(){
                    
                var swiper = new Swiper(".tpaddon-slider-<?php echo esc_attr($unique); ?>", {				
                    slidesPerView: <?php echo $slidesToShow;?>,
                    speed: <?php echo esc_attr($autoplaySpeed); ?>,
                    loop: <?php echo esc_attr($infinite ); ?>,
                   <?php echo esc_attr($slider_autoplay); ?>,
                   spaceBetween:  <?php echo esc_attr($item_gap); ?>,
                   <?php echo $pagination; ?>,
                    centeredSlides: <?php echo esc_attr($centerMode); ?>,
                    navigation: {
                        nextEl: ".tp-blog-nav-next",
                        prevEl: ".tp-blog-nav-prev",
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
    public function getCategories(){
        $cat_list = [];
            if ( post_type_exists( 'post' ) ) { 
            $terms = get_terms( array(
                'taxonomy'    => 'category',
                'hide_empty'  => true            
            ) );
            
            foreach($terms as $post) {
                $cat_list[$post->slug]  = [$post->name];
            }
        }  
        return $cat_list;
    }
}?>