<?php
/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

function synthai_body_classes( $classes ) {
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    global $synthai_option;
    $theme_mode = isset($synthai_option['theme_mode']) ? $synthai_option['theme_mode'] : 'light';

    $classes[] = ($theme_mode === 'dark') ? 'dark-mode' : '';

    return $classes;
}
add_filter( 'body_class', 'synthai_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function synthai_pingback_header() {
  if ( is_singular() && pings_open() ) {
    echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
  }
}

add_action( 'wp_head', 'synthai_pingback_header' );
/**  kses_allowed_html */
function synthai_prefix_kses_allowed_html($tags, $context) {
  switch($context) {
    case 'synthai': 
      $tags = array( 
        'a' => array('href' => array()),
        'b' => array()
      );
      return $tags;
    default: 
      return $tags;
  }
}
add_filter( 'wp_kses_allowed_html', 'synthai_prefix_kses_allowed_html', 10, 2);

/*
Register Fonts theme google font
*/
function synthai_studio_fonts_url() {
    $font_url = '';
    
    /*
    Translators: If there are characters in your language that are not supported
    by chosen font(s), translate this to 'off'. Do not translate into your own language.
     */
    if ( 'off' !== _x( 'on', 'Google font: on or off', 'synthai' ) ) {
        $font_url = 'https://fonts.googleapis.com/css2?' . urlencode('family=Ubuntu:wght@300;400;500;600;700&display=swap');

    }
    return $font_url;
}

function synthai_studio_scripts() {
    wp_enqueue_style( 'synthai-fonts', synthai_studio_fonts_url(), array(), '1.0.0' );
}
add_action( 'wp_enqueue_scripts', 'synthai_studio_scripts' );


//Favicon Icon
function synthai_site_icon() {
 if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) {     
    global $synthai_option;
     
    if(!empty($synthai_option['tp_favicon']['url']))
    {?>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo esc_url(($synthai_option['tp_favicon']['url'])); ?>"> 
  <?php 
    }
  }
}
add_filter('wp_head', 'synthai_site_icon');


//excerpt for specific section
function synthai_wpex_get_excerpt( $args = array() ) {
  // Defaults
  $defaults = array(
    'post'            => '',
    'length'          => 48,
    'readmore'        => false,
    'readmore_text'   => esc_html__( 'Read More', 'synthai' ),
    'readmore_after'  => '',
    'custom_excerpts' => true,
    'disable_more'    => false,
  );
  // Apply filters
  $defaults = apply_filters( 'synthai_wpex_get_excerpt_defaults', $defaults );
  // Parse args
  $args = wp_parse_args( $args, $defaults );
  // Apply filters to args
  $args = apply_filters( 'synthai_wpex_get_excerpt_args', $defaults );
  // Extract
  extract( $args );
  // Get global post data
  if ( ! $post ) {
    global $post;
  }

  $post_id = $post->ID;
  if ( $custom_excerpts && has_excerpt( $post_id ) ) {
    $output = $post->post_excerpt;
  } 
  else { 
    $readmore_link = '<a href="' . get_permalink( $post_id ) . '" class="readmore">' . $readmore_text . $readmore_after . '</a>';    
    if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
      $output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
    }    
    else {     
      $output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );      
      if ( $readmore ) {
        $output .= apply_filters( 'synthai_wpex_readmore_link', $readmore_link );
      }
    }
  }
  // Apply filters and echo
  return apply_filters( 'synthai_wpex_get_excerpt', $output );
}


// Import files
function synthai_import_files() {
  return array(
    array(
      'import_file_name'           => 'Synthai Default Demo',
      'categories'                 => array( 'Light Demo' ),
      'import_file_url'            => 'https://softivus.com/wp/synthai/source/demo-data/synthai-content.xml', 
      'import_redux'               => array(
        array(
          'file_url'    => 'https://softivus.com/wp/synthai/source/demo-data/synthai-options.json',
          'option_name' => 'synthai_option',
        ),
      ),
      'import_preview_image_url'   => 'https://softivus.com/wp/synthai/wp-content/uploads/2025/09/screenshot.png',
      'import_notice'              => esc_html__( 'Caution: Please click "Import Demo Data". Do not refresh the page during import.', 'synthai' ),
      'preview_url'                => 'https://softivus.com/wp/synthai/',     
    ),

    array(
      'import_file_name'           => 'Synthai Dark Demo',
      'categories'                 => array( 'Dark Demo' ),
      'import_file_url'            => 'https://softivus.com/wp/synthai/source/demo-data/dark/synthai-content.xml', 
      'import_redux'               => array(
        array(
          'file_url'    => 'https://softivus.com/wp/synthai/source/demo-data/dark/synthai-options.json',
          'option_name' => 'synthai_option',
        ),
      ),
      'import_preview_image_url'   => 'https://softivus.com/wp/synthai/dark/wp-content/uploads/sites/2/2025/08/screenshot.png',
      'import_notice'              => esc_html__( 'Caution: Please click "Import Demo Data". Do not refresh the page during import.', 'synthai' ),
      'preview_url'                => 'https://softivus.com/wp/synthai/dark/',     
    ),

  );

}

add_filter( 'pt-ocdi/import_files', 'synthai_import_files' );




function synthai_after_import_setup($selected_import) {
  // Assign menus to their locations.
	$main_menu     = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
  $menu_single     = get_term_by( 'name', 'Onepage Menu', 'nav_menu' );
  $mega_menu   = get_term_by( 'name', 'Mega Menu', 'nav_menu' ); // Elementor Pro Mega Menu

	set_theme_mod( 'nav_menu_locations', array(
      'menu-1' => $main_menu->term_id, 
      'menu-2' => $menu_single->term_id,      
      'menu-3' => $mega_menu->term_id,      
    )
  );

  if ( 'Synthai Default Demo' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Light Demo');
  }

  if ( 'Synthai Dark Demo' == $selected_import['import_file_name'] ) {
    $front_page_id = get_page_by_title('Dark Demo');
  }

  $blog_page_id  = get_page_by_title( 'News & Media' );
  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );
  update_option( 'page_for_posts', $blog_page_id->ID ); 

  // Elementor settings fix — enable all CPTs
  $cpts = get_post_types(array('public' => true), 'names');
  update_option('elementor_cpt_support', array_values($cpts));
  update_option('elementor_disable_color_schemes', 'yes');
  update_option('elementor_disable_typography_schemes', 'yes');


}
add_action( 'pt-ocdi/after_import', 'synthai_after_import_setup' );

add_filter( 'use_widgets_block_editor', '__return_false' );
