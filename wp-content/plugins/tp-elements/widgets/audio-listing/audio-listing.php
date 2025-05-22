<?php
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Control_Media;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Css_Filter;
use Elementor\REPEATER;
use Elementor\Utils;
use Elementor\Icons_Manager;

defined( 'ABSPATH' ) || die();

class Themephi_Elementor_Audio_Listing_Widgets extends \Elementor\Widget_Base {

    /**
     * Get widget name.
     */
    public function get_name() {
        return 'tp-audio-listing';
    }

    /**
     * Get widget title.
     */
    public function get_title() {
        return esc_html__( 'TP Audio Listing', 'tp-elements' );
    }

    /**
     * Get widget icon.
     */
    public function get_icon() {
        return 'glyph-icon flaticon-one';
    }

    /**
     * Get widget categories.
     */
    public function get_categories() {
        return [ 'tpaddon_category' ];
    }

    /**
     * Register widget controls.
     */
    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_content',
            [
                'label' => esc_html__('Audio Listing', 'tp-elements')
            ]
        );

        $this->add_control(
            'view_type',
            [
                'label'     => esc_html__('View Type', 'tp-elements'),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'inline',
                'options'   => [
                    'inline'    => esc_html__('Inline', 'tp-elements'),
                    'columns'   => esc_html__('Columns', 'tp-elements')
                ]
            ]
        );

        $this->add_control(
            'columns_number',
            [
                'label'     => esc_html__('Columns Number', 'tp-elements'),
                'type'      => Controls_Manager::NUMBER,
                'default'   => 4,
                'min'       => 1,
                'max'       => 6,
                'condition' => [
                    'view_type'  => 'columns'
                ]
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'audio',
            [
                'label'     => esc_html__('Audio', 'tp-elements'),
                'type'      => Controls_Manager::MEDIA,
                'media_types' => [ 'audio' ]
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label'     => esc_html__('Image', 'tp-elements'),
                'type'      => Controls_Manager::MEDIA
            ]
        );

        $repeater->add_control(
            'item_title',
            [
                'label'         => esc_html__('Title', 'tp-elements'),
                'type'          => Controls_Manager::TEXT,
                'default'       => '',
                'label_block'   => true,
                'placeholder'   => esc_html__('Enter Title', 'tp-elements')
            ]
        );

        $this->add_control(
            'audio_items',
            [
                'label'         => esc_html__('Items', 'tp-elements'),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'title_field'   => '{{{item_title}}}',
                'prevent_empty' => false,
                'separator'     => 'before'
            ]
        );

        $this->add_control(
            'hide_icon',
            [
                'label'         => esc_html__('Hide Audio Icon', 'tp-elements'),
                'type'          => Controls_Manager::SWITCHER,
                'default'       => '',
                'return_value'  => 'on',
                'label_off'     => esc_html__('No', 'tp-elements'),
                'label_on'      => esc_html__('Yes', 'tp-elements')
            ]
        );

        $this->add_control(
            'title_position',
            [
                'label' => esc_html__( 'Title Position', 'tp-elements' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => 'right',
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'tp-elements' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'tp-elements' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'selectors_dictionary' => [
                    'left'  => is_rtl() ? 'flex-direction: row;' : 'flex-direction: row-reverse;',
                    'right' => is_rtl() ? 'flex-direction: row-reverse;' : 'flex-direction: row;',
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item' => '{{VALUE}}'
                ],
                'toggle' => false,
                'prefix_class' => 'title-position-'
            ]
        );

        $this->add_control(
            'vert_alignment',
            [
                'label' => esc_html__( 'Vertical Alignment', 'tp-elements' ),
                'type' => Controls_Manager::CHOOSE,
                'default' => '',
                'options' => [
                    'top' => [
                        'title' => esc_html__( 'Top', 'tp-elements' ),
                        'icon' => 'eicon-v-align-top',
                    ],
                    'middle' => [
                        'title' => esc_html__( 'Middle', 'tp-elements' ),
                        'icon' => 'eicon-v-align-middle',
                    ],
                    'bottom' => [
                        'title' => esc_html__( 'Bottom', 'tp-elements' ),
                        'icon' => 'eicon-v-align-bottom',
                    ],
                ],
                'prefix_class' => 'vertical-align-',
            ]
        );

        $this->end_controls_section();

        // Style Section
        $this->start_controls_section(
            'section_style',
            [
                'label' => esc_html__('Style', 'tp-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        // $this->add_control(
        //     'item_spacing',
        //     [
        //         'label' => esc_html__('Item Spacing', 'tp-elements'),
        //         'type' => Controls_Manager::SLIDER,
        //         'range' => [
        //             'px' => [
        //                 'min' => 0,
        //                 'max' => 100,
        //             ],
        //         ],
        //         'selectors' => [
        //             '{{WRAPPER}} .tp-audio-listing' => '--item-gap: {{SIZE}}{{UNIT}};',
        //         ],
        //     ]
        // );

        $this->add_control(
			'item_spacing',
			[
				'label' => esc_html__( 'Item Spacing', 'textdomain' ),
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
					'size' => 0,
				],
				'selectors' => [
					'{{WRAPPER}} .tp-audio-listing, {{WRAPPER}} .tp-audio-listing.view-columns.columns-1 .tp-audio-item-wrapper, {{WRAPPER}} .tp-audio-listing.view-columns.columns-2 .tp-audio-item-wrapper, {{WRAPPER}} .tp-audio-listing.view-columns.columns-3 .tp-audio-item-wrapper, {{WRAPPER}} .tp-audio-listing.view-columns.columns-4 .tp-audio-item-wrapper, {{WRAPPER}} .tp-audio-listing.view-columns.columns-5 .tp-audio-item-wrapper, {{WRAPPER}} .tp-audio-listing.view-columns.columns-6 .tp-audio-item-wrapper' => '--item-gap: {{SIZE}}{{UNIT}};',
				],
			]
		);

        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Item Padding', 'tp-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item-wrapper' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'item_background',
                'label' => esc_html__('Background Color', 'tp-elements'),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .tp-audio-item-wrapper',
			]
		);

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'item_border',
                'selector' => '{{WRAPPER}} .tp-audio-item-wrapper',
            ]
        );

        $this->add_control(
            'item_border_radius',
            [
                'label' => esc_html__('Border Radius', 'tp-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item-wrapper' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'item_box_shadow',
                'selector' => '{{WRAPPER}} .tp-audio-item-wrapper',
            ]
        );

        $this->end_controls_section();

        // Image Style
        $this->start_controls_section(
            'section_image_style',
            [
                'label' => esc_html__('Image', 'tp-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'image_size',
            [
                'label' => esc_html__('Size', 'tp-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 20,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item img' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'image_spacing',
            [
                'label' => esc_html__('Spacing', 'tp-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item' => 'gap: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'image_border',
                'selector' => '{{WRAPPER}} .tp-audio-item img',
            ]
        );

        $this->add_control(
            'image_border_radius',
            [
                'label' => esc_html__('Border Radius', 'tp-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        // Title Style
        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Title', 'tp-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'tp-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .audio-item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_hover_color',
            [
                'label' => esc_html__('Hover Color', 'tp-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tp-audio-item:hover .audio-item-title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .audio-item-title',
            ]
        );

        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'title_text_shadow',
                'selector' => '{{WRAPPER}} .audio-item-title',
            ]
        );

        $this->end_controls_section();

        // Icon Style
        $this->start_controls_section(
            'section_icon_style',
            [
                'label' => esc_html__('Icon', 'tp-elements'),
                'tab' => Controls_Manager::TAB_STYLE,
                'condition' => [
                    'hide_icon!' => 'on'
                ]
            ]
        );

        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Size', 'tp-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 10,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .audio-icon' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'tp-elements'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .audio-icon' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
			Group_Control_Background::get_type(),
			[
				'name' => 'icon_background',
                'label' => esc_html__('Background Color', 'tp-elements'),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .audio-icon',
			]
		);

        $this->add_responsive_control(
            'icon_padding',
            [
                'label'         => esc_html__('Icon Padding', 'tp-elements'),
                'type'          => Controls_Manager::DIMENSIONS,
                'size_units'    => ['px', '%', 'em'],
                'selectors'     => [
                    '{{WRAPPER}} .audio-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
                ]
            ]
        );

        $this->add_control(
            'icon_spacing',
            [
                'label' => esc_html__('Spacing', 'tp-elements'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .audio-icon' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'icon_border',
                'selector' => '{{WRAPPER}} .audio-icon',
            ]
        );

        $this->add_control(
            'icon_border_radius',
            [
                'label' => esc_html__('Border Radius', 'tp-elements'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .audio-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    /**
     * Render widget output on the frontend.
     */

    protected function render() {
        $settings = $this->get_settings_for_display();

        $view_type          = $settings['view_type'];
        $columns_number     = $settings['columns_number'];
        $audio_items        = $settings['audio_items'];
        $hide_icon          = $settings['hide_icon'];

        $wrapper_class      = 'tp-audio-listing' . ( !empty($view_type) ? ' view-' . $view_type : ' view-inline' );
        $wrapper_class     .= ( !empty($columns_number) && $view_type === 'columns' ? ' columns-' . (int)$columns_number : '' );

        ?>
        
        <div class="<?php echo esc_attr($wrapper_class); ?>">
            <?php
                foreach ($audio_items as $index => $item) {
                    $audio_url = $item['audio']['url'];
                    if ( empty($audio_url) ) {
                        continue;
                    }
                    $image_url = !empty($item['image']['url']) ? $item['image']['url'] : '';
                    ?>
                    <div class="tp-audio-item-wrapper">
                        <div class="tp-audio-item" data-audio="<?php echo esc_url($audio_url); ?>" data-id="<?php echo esc_attr($this->get_id() . '-' . $index); ?>">
                            <audio id="audio-<?php echo esc_attr($this->get_id() . '-' . $index); ?>" src="<?php echo esc_url($audio_url); ?>"></audio>
                            <?php if ($image_url) : ?>
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item['item_title']); ?>">
                            <?php endif; ?>
                            <div class="audio-wrapper">
                                <?php if ( $hide_icon !== 'on' ) : ?>
                                    <span class="audio-icon">
										<i class="fas fa-volume-off"></i>
                                    </span>
                                <?php endif; ?>
                                <?php if ( !empty($item['item_title']) ) : ?>
                                    <span class="audio-item-title"><?php echo esc_html($item['item_title']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
        
        <style>
            .tp-audio-listing {
                display: flex;
                flex-wrap: wrap;
                --item-gap: 0px;
                gap: var(--item-gap);
            }
            
            .tp-audio-listing.view-inline {
                flex-direction: column;
            }
            
            .tp-audio-listing.view-columns.columns-1 .tp-audio-item-wrapper {
                width: 100%;
            }
            
            .tp-audio-listing.view-columns.columns-2 .tp-audio-item-wrapper {
                width: 50%;
            }
            
            .tp-audio-listing.view-columns.columns-3 .tp-audio-item-wrapper {
                --item-gap: 0px;
                width: calc( 33.333% - var(--item-gap) );
            }
            
            .tp-audio-listing.view-columns.columns-4 .tp-audio-item-wrapper {
                --item-gap: 0px;
                width: calc( 25% - var(--item-gap) );
            }
            
            .tp-audio-listing.view-columns.columns-5 .tp-audio-item-wrapper {
                --item-gap: 0px;
                width: calc( 20% - var(--item-gap) );
            }
            
            .tp-audio-listing.view-columns.columns-6 .tp-audio-item-wrapper {
                --item-gap: 0px;
                width: calc( 16.666%- var(--item-gap) );
            }
            
            .tp-audio-item {
                display: flex;
                align-items: center;
                cursor: pointer;
                transition: all 0.3s ease;
            }
            
            .tp-audio-item img {
                object-fit: cover;
                flex-shrink: 0;
            }
            
            .audio-wrapper {
                display: flex;
                align-items: center;
                flex-grow: 1;
            }
            
            .audio-icon {
                transition: all 0.3s ease;
            }
            
            .tp-audio-item.playing .audio-icon i:before {
                content: "\f028"; /* pause icon */
            }
            
            @media (max-width: 768px) {
                .tp-audio-listing.view-columns .tp-audio-item-wrapper {
                    /* width: 50% !important; */
                    --item-gap: 0px;
                    width: calc( 50% - var(--item-gap) ) !important;
                }
            }
            
            @media (max-width: 480px) {
                .tp-audio-listing.view-columns .tp-audio-item-wrapper {
                    /* width: 100% !important; */
                    /* --item-gap: 0px; */
                    width: calc( 100% ) !important;
                }
            }
        </style>

        <script>
            jQuery(document).ready(function($) {
                // Store currently playing audio
                var currentAudio = null;
                
                $('.tp-audio-item').on('click', function(e) {
                    e.preventDefault();
                    
                    var audioId = $(this).data('id');
                    var audioElement = document.getElementById('audio-' + audioId);
                    
                    // If clicking the same item that's currently playing
                    if ($(this).hasClass('playing')) {
                        audioElement.pause();
                        $(this).removeClass('playing');
                        currentAudio = null;
                    } 
                    // If clicking a different item
                    else {
                        // Pause any currently playing audio
                        if (currentAudio) {
                            currentAudio.pause();
                            $('.tp-audio-item.playing').removeClass('playing');
                        }
                        
                        // Play the clicked audio
                        audioElement.play();
                        $(this).addClass('playing');
                        currentAudio = audioElement;
                        
                        // When audio ends, remove playing class
                        audioElement.onended = function() {
                            $(this).parent().removeClass('playing');
                            currentAudio = null;
                        };
                    }
                });
            });
        </script>
        <?php
    }
}