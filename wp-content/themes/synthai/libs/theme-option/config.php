<?php

/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if (!class_exists('Redux')) {
    return;
}

// This is your option name where all the Redux data is stored.
$opt_name = "synthai_option";

// This line is only for altering the demo. Can be easily removed.
$opt_name = apply_filters('synthai/opt_name', $opt_name);

/*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => 'menu',
    'page_priority'        => 8,
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Synthai Options', 'synthai'),
    'page_title'           => esc_html__('Synthai Options', 'synthai'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => true,
    // Use a asynchronous font on the front end or font string
    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-portfolio',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 20,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => false,
    'forced_dev_mode_off' => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    'compiler' => true,

    // OPTIONAL -> Give you extra features
    'page_priority'        => 20,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'themes.php',
    // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => '',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    'force_output' => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// Panel Intro text -> before the form
if (!isset($args['global_variable']) || $args['global_variable'] !== false) {
    if (!empty($args['global_variable'])) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace('-', '_', $args['opt_name']);
    }
    $args['intro_text'] = sprintf(esc_html__('Synthai Theme', 'synthai'), $v);
} else {
    $args['intro_text'] = esc_html__('Synthai Theme', 'synthai');
}

Redux::setArgs($opt_name, $args);

/*
     * ---> END ARGUMENTSsynthai
      
     */
// -> START General Settings
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('General Settings', 'synthai'),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => 'enable_global',
                'type'     => 'switch',
                'title'    => esc_html__('Enable Global Settings', 'synthai'),
                'subtitle' => esc_html__('If you enable global settings all option will be work only theme option', 'synthai'),
                'default'  => false,
            ),

            array(
                'id'       => 'container_size',
                'title'    => esc_html__('Container Size', 'synthai'),
                'subtitle' => esc_html__('Container Size example(1350px)', 'synthai'),
                'type'     => 'text',
                'default'  => '1320px'
            ),

            array(
                'id'       => 'tp_favicon',
                'type'     => 'media',
                'title'    => esc_html__('Upload Favicon', 'synthai'),
                'subtitle' => esc_html__('Upload your faviocn here', 'synthai'),
                'url' => true
            ),

            array(
                'id'       => 'off_sticky',
                'type'     => 'switch',
                'title'    => esc_html__('Enable Sticky Menu', 'synthai'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'synthai'),
                'default'  => false,
            ),  
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Scroll to Top', 'synthai'),
                'subtitle' => esc_html__('You can show or hide here', 'synthai'),
                'default'  => false,
            ),         
        )
    )
);


//Preloader settings
Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Preloader Style', 'synthai'),
        'desc'   => esc_html__('Preloader Style Here', 'synthai'),
        'fields' => array(
            array(
                'id'       => 'show_preloader',
                'type'     => 'switch',
                'title'    => esc_html__('Show Preloader', 'synthai'),
                'subtitle' => esc_html__('You can show or hide preloader', 'synthai'),
                'default'  => false,
            ),

            array(
                'id'        => 'preloader_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Preloader Background Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#212121',
                'validate'  => 'color',
            ),
           

            array(
                'id'        => 'preloader_animate_color2',
                'type'      => 'color',
                'title'     => esc_html__('Preloader Circle Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#A58EFF',
                'validate'  => 'color',
                'output'    => array('background' => '.lds-ellipsis div')
            ),

          
            array(
                'id'    => 'preloader_img',
                'url'   => true,
                'title' => esc_html__('Preloader Image', 'synthai'),
                'type'  => 'media',
            ),
        )
    )
);
//End Preloader settings 

// -> START Style Section
Redux::setSection($opt_name, array(
    'title'            => esc_html__('Style', 'synthai'),
    'id'               => 'stle',
    'customizer_width' => '450px',
    'icon' => 'el el-brush',
));

Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Global Style', 'synthai'),
        'desc'   => esc_html__('Style your theme', 'synthai'),
        'subsection' => true,
        'fields' => array(

            array(
                'id'        => 'body_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Body Backgroud Color', 'synthai'),
                'subtitle'  => esc_html__('Pick body background color', 'synthai'),
                'default'   => '#121212',
                'validate'  => 'color',
            ),

            array(
                'id'        => 'body_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Text Color', 'synthai'),
                'subtitle'  => esc_html__('Pick text color', 'synthai'),
                'default'   => '#C4C5C0',
                'validate'  => 'color',
            ),

            array(
                'id'        => 'primary_color',
                'type'      => 'color',
                'title'     => esc_html__('Primary Color', 'synthai'),
                'subtitle'  => esc_html__('Select Primary Color.', 'synthai'),
                'default'   => '#D5313D',
                'validate'  => 'color',
                'output'      => array(''),
            ),

            array(
                'id'        => 'secondary_color',
                'type'      => 'color',
                'title'     => esc_html__('Secondary Color', 'synthai'),
                'subtitle'  => esc_html__('Select Secondary Color.', 'synthai'),
                'default'   => '#3A6BB6',
                'validate'  => 'color',
            ),

            array(
                'id'        => 'link_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Link Color', 'synthai'),
                'subtitle'  => esc_html__('Pick Link color', 'synthai'),
                'default'   => '#F2F1F6',
                'validate'  => 'color',
            ),

            array(
                'id'        => 'link_hover_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Link Hover Color', 'synthai'),
                'subtitle'  => esc_html__('Pick link hover color', 'synthai'),
                'default'   => '#D5313D',
                'validate'  => 'color',
            ),

        )
    )
);


//Button settings
Redux::setSection(
    $opt_name,
    array(
        'title'      => esc_html__('Button Style', 'synthai'),
        'desc'       => esc_html__('Button Style Here', 'synthai'),
        'subsection' => true,
        'fields' => array(

            array(
                'id'        => 'btn_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Background Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#D5313D',
                'validate'  => 'color',
                'output'    => array('')
            ),

            array(
                'id'        => 'btn_bg_hover',
                'type'      => 'color',
                'title'     => esc_html__('Hover Background', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#3A6BB6',
                'validate'  => 'color',
                'output'    => array('')

            ),          

            array(
                'id'        => 'btn_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Text Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#F2F1F6',
                'validate'  => 'color',
                'output'    => array('')
            ),

            array(
                'id'        => 'btn_txt_hover_color',
                'type'      => 'color',
                'title'     => esc_html__('Hover Text Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#F2F1F6',
                'validate'  => 'color',
                'output'    => array('')
            ),

            array(
                'id'     => 'notice_critical',
                'type'   => 'info',
                'notice' => true,
                'style'  => 'success',
                'title'  => esc_html__('Seconday Button Style', 'synthai')            
            ),
            array(
                'id'        => 'btn2_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Background Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#3A6BB6',
                'validate'  => 'color',
                'output'    => array('')
            ),

            array(
                'id'        => 'btn2_bg_hover',
                'type'      => 'color',
                'title'     => esc_html__('Hover Background', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#D5313D',
                'validate'  => 'color',
                'output'    => array('')

            ),
            
            array(
                'id'        => 'btn2_text_color',
                'type'      => 'color',
                'title'     => esc_html__('Text Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#F2F1F6',
                'validate'  => 'color',
                'output'    => array('')
            ),

            array(
                'id'        => 'btn2_txt_hover_color',
                'type'      => 'color',
                'title'     => esc_html__('Hover Text Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#F2F1F6',
                'validate'  => 'color',
                'output'    => array('')
            ),
        )
    )
);


//Breadcrumb settings
Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Breadcrumb Style', 'synthai'),
        'subsection' => true,
        'fields' => array(

            array(
                'id'       => 'off_breadcrumb',
                'type'     => 'switch',
                'title'    => esc_html__('Show off Breadcrumb', 'synthai'),
                'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'synthai'),
                'default'  => true,
            ),

            array(
                'id'      => 'align_breadcrumb',
                'type'    => 'select',
                'title'    => esc_html__('Breadcrumb Alignment', 'synthai'),
                'default'  => 'start',
                'options' => array(
                    'start' => __( 'Left', 'synthai' ),
                    'center'   => __( 'Center', 'synthai' ),
                    'end'     => __( 'Right', 'synthai' ),
                ),
            ),

            array(
                'id'        => 'breadcrumb_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Background Bg Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#242424',
                'validate'  => 'color',
            ),

            array(
                'id'        => 'page_title_color',
                'type'      => 'color',
                'title'     => esc_html__('Banner Title Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#F2F1F6',
                'validate'  => 'color',               
            ),

            array(
                'id'          => 'opt-typography',
                'type'        => 'typography', 
                'title'       => __('Banner Title Typography', 'synthai'),    
                'output'      => array('.themephi-breadcrumbs .page-title'),
                'units'       =>'px',
                'subtitle'    => __('Typography option with each property can be called individually.', 'synthai'),                
            ),

            array(
                'id'       => 'page_banner_main',
                'type'     => 'media',
                'title'    => esc_html__('Background Banner', 'synthai'),
                'subtitle' => esc_html__('Upload your banner', 'synthai'),
                'default' => [
                    'url' => get_template_directory_uri() . '/assets/images/breadcrum_bg.webp',
                ],
                'url'      => true, // Allow URL upload
                'preview'  => true, // Enable preview of the image
            ),

            array(
                'id'        => 'breadcrumb_top_gap',
                'type'      => 'text',
                'title'     => esc_html__('Top Gap', 'synthai'),
                'desc'    => esc_html__('Type ex: 90px', 'synthai'),

            ),
            array(
                'id'        => 'breadcrumb_bottom_gap',
                'type'      => 'text',
                'title'     => esc_html__('Bottom Gap', 'synthai'),
                'desc'    => esc_html__('Type ex: 80px', 'synthai'),
            ),

            array(
                'id'        => 'mobile_breadcrumb_top_gap',
                'type'      => 'text',
                'title'     => esc_html__('Mobile Top Gap', 'synthai'),
                'default'   => '90px',

            ),
            array(
                'id'        => 'mobile_breadcrumb_bottom_gap',
                'type'      => 'text',
                'title'     => esc_html__('Mobile Bottom Gap', 'synthai'),
                'default'   => '80px',
            ),

            array(
                'id'        => 'breadcrumb_position',
                'type'      => 'text',
                'title'     => esc_html__('Top Bottom Postion', 'synthai'),                
            ),

        )
    )
);

//-> START Typography
Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('Typography', 'synthai'),
        'id'     => 'typography',
        'desc'   => esc_html__('You can specify your body and heading font here', 'synthai'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__('Body Font', 'synthai'),
                'subtitle' => esc_html__('Specify the body font properties.', 'synthai'),
                'google'   => true,
                'font-style' => false,
                'default'  => array(
                    'font-size'   => '16px',
                    'font-weight' => '400',
                ),
            ),
            array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__('Navigation Font', 'synthai'),
                'subtitle' => esc_html__('Specify the menu font properties.', 'synthai'),
                'google'   => true,
                'font-backup' => true,
                'all_styles'  => true,
                'default'  => array(
                    'color'       => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '15px',
                    'font-weight' => '500',
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H1', 'synthai'),
                'font-backup' => true,
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'synthai'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''

                ),
            ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H2', 'synthai'),
                'font-backup' => true,
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'synthai'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''

                ),
            ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H3', 'synthai'),
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'synthai'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''

                ),
            ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H4', 'synthai'),
                'font-backup' => false,
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'synthai'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H5', 'synthai'),
                'font-backup' => false,
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'synthai'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''
                ),
            ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__('Heading H6', 'synthai'),

                'font-backup' => false,
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__('Typography option with each property can be called individually.', 'synthai'),
                'default'     => array(
                    'color'       => '',
                    'font-style'  => '',
                    'font-family' => '',
                    'google'      => true,
                    'font-size'   => '',
                    'line-height' => ''
                ),
            ),

        )
    )

);

/*Team Sections*/
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Team Section', 'synthai' ),
    'id'               => 'team',
    'customizer_width' => '450px',
    'icon' => 'el el-user',
    'fields'           => array(        
    
        array(
                'id'       => 'team_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Team Single page banner image', 'synthai' ),                    
                'type'     => 'media',
                
            ), 

        array(
                'id'        => 'team_single_bg_color',
                'type'      => 'color',                           
                'title'     => esc_html__('Sinlge Team Body Backgroud Color','synthai'),
                'subtitle'  => esc_html__('Pick body background color', 'synthai'),
                'default'   => '',
                'validate'  => 'color',                        
            ),
        
        array(
                'id'       => 'team_slug',                               
                'title'    => esc_html__( 'Team Slug', 'synthai' ),
                'subtitle' => esc_html__( 'Enter Team Slug Here', 'synthai' ),
                'type'     => 'text',
                'default'  => esc_html__('teams', 'synthai'),
                
            ),                 
                      
        )
    ) 
);

if (class_exists('WooCommerce')) {
    Redux::setSection(
        $opt_name,
        array(
            'title'  => esc_html__('Woocommerce', 'synthai'),
            'icon'   => 'el el-shopping-cart',
        )
    );

    Redux::setSection(
        $opt_name,
        array(
            'title'            => esc_html__('Shop', 'synthai'),
            'id'               => 'shop_layout',
            'customizer_width' => '450px',
            'subsection' => true,
            'fields'           => array(
                array(
                    'id'       => 'shop_banner',
                    'url'      => true,
                    'title'    => esc_html__('Shop page banner', 'synthai'),
                    'type'     => 'media',
                ),
                array(
                    'id'       => 'shop-long-title',
                    'url'      => true,
                    'title'    => esc_html__('Shop Long Title', 'synthai'),
                    'type'     => 'text',
                ),
                array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'synthai'),
                    'subtitle' => esc_html__('Select your shop layout', 'synthai'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => esc_html__('Shop Style 1', 'synthai'),
                            'img'   => get_template_directory_uri() . '/libs/img/1c.png'
                        ),
                        'right-col' => array(
                            'alt'   => esc_html__('Shop Style 2', 'synthai'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => esc_html__('Shop Style 3', 'synthai'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cl.png'
                        ),
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__('Number of Products Per Page', 'synthai'),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__('Number of Products Per Row', 'synthai'),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__('Cart Icon Show At Menu Area', 'synthai'),
                    'on'       => esc_html__('Enabled', 'synthai'),
                    'off'      => esc_html__('Disabled', 'synthai'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'disable-sidebar',
                    'type'     => 'switch',
                    'title'    => esc_html__('Sidebar Disable For Single Product Page', 'synthai'),
                    'default'  => true,
                ),

                array(
                    'id'       => 'wc_wishlist_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__('Show Wishlist Icon', 'synthai'),
                    'on'       => esc_html__('Enabled', 'synthai'),
                    'off'      => esc_html__('Disabled', 'synthai'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_quickview_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Quickview Icon', 'synthai'),
                    'on'       => esc_html__('Enabled', 'synthai'),
                    'off'      => esc_html__('Disabled', 'synthai'),
                    'default'  => true,
                ),
                array(
                    'id'       => 'wc_show_new',
                    'type'     => 'switch',
                    'title'    => esc_html__('Show Product New Badge', 'synthai'),
                    'on'       => esc_html__('Enabled', 'synthai'),
                    'off'      => esc_html__('Disabled', 'synthai'),
                    'default'  => true,
                ),

                array(
                    'id'       => 'wc_new_product_days',
                    'type'     => 'select',
                    'title'    => esc_html__('New Days', 'synthai'),
                    'desc'     => esc_html__('Select last day, when uploaded products will show a new badge.', 'synthai'),
                    'options'  => array(
                        '7'     => esc_html__('7 Days', 'synthai'),
                        '10' => esc_html__('10 Days', 'synthai'),
                        '15' => esc_html__('15 Days', 'synthai'),
                        '30' => esc_html__('30 Days', 'synthai'),
                    ),
                    'default'  => '15',

                ),



            )
        )
    );
    Redux::setSection(
        $opt_name,
        array(
            'title'            => esc_html__('Shop Single', 'synthai'),
            'id'               => 'shop_single',
            'customizer_width' => '450px',
            'subsection' => true,
            'fields'           => array(

                array(
                    'id'       => 'single-gallery-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Single Product Gallery Layout', 'synthai'),
                    'subtitle' => esc_html__('Select single page gallery layout', 'synthai'),
                    'options'  => array(
                        'default-thumb'      => array(
                            'alt'   => esc_html__('Style 1', 'synthai'),
                            'img'   => get_template_directory_uri() . '/libs/img/1c.png'
                        ),
                        'right-thumb' => array(
                            'alt'   => esc_html__('Style 2', 'synthai'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cr.png'
                        ),
                        'left-thumb'  => array(
                            'alt'   => esc_html__('Style 3', 'synthai'),
                            'img'   => get_template_directory_uri() . '/libs/img/2cl.png'
                        ),
                    ),
                    'default' => 'default-thumb'
                ),

                array(
                    'id'       => 'single_releted_products',
                    'type'     => 'text',
                    'title'    => esc_html__('Number of Releted Products in Product detail Page', 'synthai'),
                    'default'  => '4',
                ),
                array(
                    'id'       => 'single_releted_products_col',
                    'type'     => 'text',
                    'title'    => esc_html__('Coloumn Number of Releted Products in Product detail Page', 'synthai'),
                    'default'  => '4',
                ),

            )
        )
    );
}
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Portfolio Section', 'synthai' ),
    'id'               => 'Portfolio',
    'customizer_width' => '450px',
    'icon' => 'el el-align-right',
    'fields'           => array(
    
        array(
                'id'       => 'department_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Portfolio Single page banner image', 'synthai' ),                    
                'type'     => 'media',
                
        ),  

         array(
                'id'       => 'portfolio_slug',                               
                'title'    => esc_html__( 'Portfolio Slug', 'synthai' ),
                'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'synthai' ),
                'type'     => 'text',
                'default'  => 'portfolios',                
            ), 
            array(
                'id'       => 'portfolio_cat_slug',                               
                'title'    => esc_html__( 'Portfolio Category Slug', 'synthai' ),
                'subtitle' => esc_html__( 'Enter Portfolio Cat Slug Here', 'synthai' ),
                'type'     => 'text',
                'default'  => '',                    
            ), 

            array(
                'id'        => 'portfolio_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Project Information Area Background', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#ffffff',
                'validate'  => 'color',
                'output'    => array('background' => '.big-bg-porduct-details .project-info')
            ),
            array(
                'id'        => 'portfolio_bg_border_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__('Project Information Border Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
              
                'output'    => array('border-color' => '.big-bg-porduct-details .project-info .info-body .single-info')
            ),
        )
     ) 
);

Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Service Section', 'synthai' ),
    'id'               => 'Service',
    'customizer_width' => '450px',
    'icon' => 'el el-align-right',
    'fields'           => array(
    
        array(
                'id'       => 'service_single_image', 
                'url'      => true,     
                'title'    => esc_html__( 'Service Single page banner image', 'synthai' ),                    
                'type'     => 'media',
                
        ),  

         array(
                'id'       => 'service_slug',                               
                'title'    => esc_html__( 'Service Slug', 'synthai' ),
                'subtitle' => esc_html__( 'Enter Service Slug Here', 'synthai' ),
                'type'     => 'text',
                'default'  => 'services',                
            ), 
            array(
                'id'       => 'service_cat_slug',                               
                'title'    => esc_html__( 'Service Category Slug', 'synthai' ),
                'subtitle' => esc_html__( 'Enter Service Cat Slug Here', 'synthai' ),
                'type'     => 'text',
                'default'  => '',                    
            ), 

            array(
                'id'        => 'service_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Project Information Area Background', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
                'default'   => '#ffffff',
                'validate'  => 'color',
                'output'    => array('background' => '.big-bg-service-details .service-info')
            ),
            array(
                'id'        => 'service_bg_border_color',
                'type'      => 'color_rgba',
                'title'     => esc_html__('Service Information Border Color', 'synthai'),
                'subtitle'  => esc_html__('Pick color', 'synthai'),
              
                'output'    => array('border-color' => '.big-bg-service-details .service-info .info-body .single-info')
            ),
        )
     ) 
);

/*Blog Sections*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('Blog', 'synthai'),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
    )
);

Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('Blog Settings', 'synthai'),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'    => 'blog_banner_main',
                'url'   => true,
                'title' => esc_html__('Blog Page Banner', 'synthai'),
                'type'  => 'media',
            ),

            array(
                'id'        => 'blog_bg_color',
                'type'      => 'color',
                'title'     => esc_html__('Body Backgroud Color', 'synthai'),
                'subtitle'  => esc_html__('Pick body background color', 'synthai'),
                'default'   => '#ffffff',
                'validate'  => 'color',
            ),

            array(
                'id'       => 'blog_title',
                'title'    => esc_html__('Blog  Title', 'synthai'),
                'subtitle' => esc_html__('Enter Blog  Title Here', 'synthai'),
                'type'     => 'text',
            ),

            array(
                'id'       => 'blog_long_title',
                'title'    => esc_html__('Blog  Long Title', 'synthai'),
                'subtitle' => esc_html__('Enter Blog  Long Title Here', 'synthai'),
                'type'     => 'text',
            ),

            array(
                'id'               => 'blog-layout',
                'type'             => 'image_select',
                'title'            => esc_html__('Select Blog Layout', 'synthai'),
                'subtitle'         => esc_html__('Select your blog layout', 'synthai'),
                'options'          => array(
                    'full'             => array(
                        'alt'              => esc_html__('Blog Style 1', 'synthai'),
                        'img'              => get_template_directory_uri() . '/libs/img/1c.png'
                    ),
                    '2right'           => array(
                        'alt'              => esc_html__('Blog Style 2', 'synthai'),
                        'img'              => get_template_directory_uri() . '/libs/img/2cr.png'
                    ),
                    '2left'            => array(
                        'alt'              => esc_html__('Blog Style 3', 'synthai'),
                        'img'              => get_template_directory_uri() . '/libs/img/2cl.png'
                    ),
                ),
                'default'          => '2right'
            ),

            array(
                'id'               => 'blog-grid',
                'type'             => 'select',
                'title'            => esc_html__('Select Blog Gird', 'synthai'),
                'desc'             => esc_html__('Select your blog gird layout', 'synthai'),
                'options'          => array(
                    '12'               => esc_html__('1 Column', 'synthai'),
                    '6'                => esc_html__('2 Column', 'synthai'),
                    '4'                => esc_html__('3 Column', 'synthai'),
                    '3'                => esc_html__('4 Column', 'synthai'),
                ),
                'default'          => '12',
            ),

            array(
                'id'               => 'blog-author-post',
                'type'             => 'select',
                'title'            => esc_html__('Show Author Info ', 'synthai'),
                'desc'             => esc_html__('Select author info show or hide', 'synthai'),
                'options'          => array(
                    'show'             => esc_html__('Show', 'synthai'),
                    'hide'             => esc_html__('Hide', 'synthai'),
                ),
                'default'          => 'show',

            ),

            array(
                'id'               => 'blog-category',
                'type'             => 'select',
                'title'            => esc_html__('Show Category', 'synthai'),
                'options'          => array(
                    'show'             => esc_html__('Show', 'synthai'),
                    'hide'             => esc_html__('Hide', 'synthai'),
                ),
                'default'          => 'show',

            ),

            array(
                'id'               => 'blog-date',
                'type'             => 'switch',
                'title'            => esc_html__('Show Date', 'synthai'),
                'desc'             => esc_html__('You can show/hide date at blog page', 'synthai'),
                'default'          => true,
            ),
            array(
                'id'               => 'blog_readmore',
                'title'            => esc_html__('Blog Read More Text', 'synthai'),
                'subtitle'         => esc_html__('Enter Blog Read More Here', 'synthai'),
                'type'             => 'text',
                'default'          => esc_html__('Read More', 'synthai'),
            ),

        )
    )

);

/*Single Post Sections*/
Redux::setSection(
    $opt_name,
    array(
        'title'            => esc_html__('Single Post', 'synthai'),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',
        'fields'           => array(

            array(
                'id'       => 'single_blog_title',
                'title'    => esc_html__('Single Blog  Title', 'synthai'),
                'subtitle' => esc_html__('Enter Title Here', 'synthai'),
                'type'     => 'text',
            ),
            array(
                'id'       => 'blog_banner',
                'url'      => true,
                'title'    => esc_html__('Blog Single page banner', 'synthai'),
                'type'     => 'media',

            ),

            array(
                'id'       => 'blog-comments',
                'type'     => 'select',
                'title'    => esc_html__('Show Comment Form', 'synthai'),
                'desc'     => esc_html__('Select comments show or hide', 'synthai'),
                'options'  => array(
                    'show' => esc_html__('Show', 'synthai'),
                    'hide' => esc_html__('Hide', 'synthai'),
                ),
                'default'  => 'show',

            ),

            array(
                'id'       => 'blog-author-meta',
                'type'     => 'select',
                'title'    => esc_html__('Show Meta Info', 'synthai'),
                'desc'     => esc_html__('Select meta info show or hide', 'synthai'),
                'options'  => array(
                    'show' => esc_html__('Show', 'synthai'),
                    'hide' => esc_html__('Hide', 'synthai'),
                ),
                'default'  => 'show',

            ),

        )
    )


);


Redux::setSection(
    $opt_name,
    array(
        'title'  => esc_html__('404 Error Page', 'synthai'),
        'desc'   => esc_html__('404 details  here', 'synthai'),
        'icon'   => 'el el-error-alt',
        'fields' => array(

            array(
                'id'       => 'title_404',
                'type'     => 'text',
                'title'    => esc_html__('Title', 'synthai'),
                'subtitle' => esc_html__('Enter title for 404 page', 'synthai'),
                'default'  => esc_html__('404', 'synthai')
            ),
            array(
                'id'       => 'text_404',
                'type'     => 'text',
                'title'    => esc_html__('Text', 'synthai'),
                'subtitle' => esc_html__('Enter text for 404 page', 'synthai'),
                'default'  => esc_html__('Page Not Found', 'synthai')
            ),
            array(
                'id'       => 'back_home',
                'type'     => 'text',
                'title'    => esc_html__('Back to Home Button Label', 'synthai'),
                'subtitle' => esc_html__('Enter label for "Back to Home" button', 'synthai'),
                'default'  => esc_html__('Back to Home', 'synthai')

            ),
            array(
                'id'       => '404_bg',
                'type'     => 'media',
                'title'    => esc_html__('404 page Image', 'synthai'),
                'subtitle' => esc_html__('Upload your image', 'synthai'),
                'url' => true
            ),


        )
    )
);

if (!function_exists('compiler_action')) {
    function compiler_action($options, $css, $changed_values)
    {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r($changed_values); // Values that have changed since the last save
        echo "</pre>";
    }
}

/**
 * Custom function for the callback validation referenced above
 * */
if (!function_exists('redux_validate_callback_function')) {
    function redux_validate_callback_function($field, $value, $existing_value)
    {
        $error   = false;
        $warning = false;

        //do your validation
        if ($value == 1) {
            $error = true;
            $value = $existing_value;
        } elseif ($value == 2) {
            $warning = true;
            $value   = $existing_value;
        }

        $return['value'] = $value;

        if ($error == true) {
            $field['msg']    = 'your custom error message';
            $return['error'] = $field;
        }

        if ($warning == true) {
            $field['msg']      = 'your custom warning message';
            $return['warning'] = $field;
        }

        return $return;
    }
}

/**
 * Custom function for the callback referenced above
 */
if (!function_exists('redux_my_custom_field')) {
    function redux_my_custom_field($field, $value)
    {
        print_r($field);
        echo '<br/>';
        print_r($value);
    }
}

/**
 * Custom function for filtering the sections array. Good for child themes to override or add to the sections.     
 * */
if (!function_exists('dynamic_section')) {
    function dynamic_section($sections)
    {
        $sections[] = array(
            'title'  => esc_html__('Section via hook', 'synthai'),
            'desc'   => esc_html__('<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'synthai'),
            'icon'   => 'el el-paper-clip',
            'fields' => array()
        );
        return $sections;
    }
}

/**
 * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
 * */
if (!function_exists('change_arguments')) {
    function change_arguments($args)
    {
        return $args;
    }
}

/**
 * Filter hook for filtering the default value of any given field. Very useful in development mode.
 * */
if (!function_exists('change_defaults')) {
    function change_defaults($defaults)
    {
        $defaults['str_replace'] = 'Testing filter hook!';
        return $defaults;
    }
}

/**
 * Removes the demo link and the notice of integrated demo from the redux-framework plugin
 */
if (!function_exists('remove_demo')) {
    function remove_demo()
    {
        // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
        if (class_exists('ReduxFrameworkPlugin')) {
            remove_action('plugin_row_meta', array(
                ReduxFrameworkPlugin::instance(),
                'plugin_metalinks'
            ), null, 2);
            remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
        }
    }
}
