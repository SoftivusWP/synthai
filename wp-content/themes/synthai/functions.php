<?php

if ( ! function_exists( 'synthai_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */ 

function synthai_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on synthai, use a find and replace
	 * to change 'synthai' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'synthai', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
	
	if ( class_exists( 'WooCommerce' ) ) {  

		add_theme_support( 'woocommerce' );	
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

	}

	function my_theme_register_block_patterns() {
		register_block_pattern( 'my-theme/my-pattern', array(
			'title'       => __( 'My Pattern', 'synthai' ),
			'description' => _x( 'A custom pattern for my theme.', 'Block pattern description', 'synthai' ),
			'content'     => "<!-- wp:paragraph --><p>" . __( 'Hello world!', 'synthai' ) . "</p><!-- /wp:paragraph -->",
		));
	}
	add_action( 'init', 'my_theme_register_block_patterns' );
	function my_theme_register_block_styles() {
		register_block_style( 'core/quote', array(
			'name'  => 'fancy-quote',
			'label' => __( 'Fancy Quote', 'synthai' ),
		));
	}
	add_action( 'init', 'my_theme_register_block_styles' );

	
	function synthai_change_excerpt( $text )
	{
		$pos = strrpos( $text, '[');
		if ($pos === false)
		{
			return $text;
		}
		
		return rtrim (substr($text, 0, $pos) ) . '...';
	}
	add_filter('get_the_excerpt', 'synthai_change_excerpt');


	// Limit Excerpt Length by number of Words
	function synthai_custom_excerpt( $limit ) {
		$excerpt = explode(' ', get_the_excerpt(), $limit);
		if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
		} else {
		$excerpt = implode(" ",$excerpt);
		}
		$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
		return $excerpt;
		}
		function content($limit) {
		$content = explode(' ', get_the_content(), $limit);
		if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
		} else {
		$content = implode(" ",$content);
		}
		$content = preg_replace('/[.+]/','', $content);
		$content = apply_filters('the_content', $content);
		$content = str_replace(']]>', ']]&gt;', $content);
		return $content;
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary Menu', 'synthai' ),		
		'menu-2' => esc_html__( 'Single Menu', 'synthai' ),
		
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'synthai_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 250,
		'width'       => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	//add support posts format
	add_theme_support( 'post-formats', array( 
		'standard',
		'image', 
		'gallery',
		'audio',
		'video',
		'quote',
	) );

add_theme_support( 'align-wide' );	
}
endif;
add_action( 'after_setup_theme', 'synthai_setup' );

/**
*Custom Image Size
*/
add_image_size( 'tp-blog-wide-size', 1760, 420, true );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function synthai_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'synthai_content_width', 640 );
}
add_action( 'after_setup_theme', 'synthai_content_width', 0 );


/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 *  Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/theme-scripts.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/theme-functions.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/theme-sidebar.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

/**
 * Custom Style
 */
require_once get_template_directory() . '/inc/dyanamic-css.php';
require_once get_template_directory() . '/libs/theme-option/config.php';
require_once get_template_directory() . '/inc/tgm/tgm-config.php';


//----------------------------------------------------------------------
// Remove Redux Framework NewsFlash
//----------------------------------------------------------------------
if ( ! class_exists( 'reduxNewsflash' ) ):
    class reduxNewsflash {
        public function __construct( $parent, $params ) {}
    }
endif;

function synthai_remove_demo_mode_link() { // Be sure to rename this function to something more unique
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
    }
    if ( class_exists('ReduxFrameworkPlugin') ) {
        remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
    }
}
add_action('init', 'synthai_remove_demo_mode_link');

/**
 * Registers an editor stylesheet for the theme.
 */
function synthai_theme_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'synthai_theme_add_editor_styles' );


//------------------------------------------------------------------------
//Organize Comments form field
//-----------------------------------------------------------------------
function synthai_wpb_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter( 'comment_form_fields', 'synthai_wpb_move_comment_field_to_bottom' );	


//adding placeholder text for comment form

function synthai_comment_textarea_placeholder( $args ) {
	$args['comment_field']        = str_replace( '<textarea', '<textarea placeholder="Comment"', $args['comment_field'] );
	return $args;
}
add_filter( 'comment_form_defaults', 'synthai_comment_textarea_placeholder' );

/**
 * Comment Form Fields Placeholder
 *
 */
function synthai_comment_form_fields( $fields ) {
	foreach( $fields as &$field ) {
		$field = str_replace( 'id="author"', 'id="author" placeholder="Name*"', $field );
		$field = str_replace( 'id="email"', 'id="email" placeholder="Email*"', $field );
		$field = str_replace( 'id="url"', 'id="url" placeholder="Website"', $field );
	}
	return $fields;
}
add_filter( 'comment_form_default_fields', 'synthai_comment_form_fields' );


//customize archive tilte
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
            $title = single_cat_title( '', false );
        } elseif ( is_tag() ) {
            $title = single_tag_title( '', false );
        } elseif ( is_author() ) {
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;
        }
    return $title;
});

add_filter( 'get_the_archive_title', 'synthai_archive_title_remove_prefix' );
function synthai_archive_title_remove_prefix( $title ) {
	if ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}

function synthai_menu_add_description_to_menu($item_output, $item, $depth, $args) {

   if (strlen($item->description) > 0 ) {
      // append description after link
      $item_output .= sprintf('<span class="description">%s</span>', esc_html($item->description));   
     
   }   
   return $item_output;
}
add_filter('walker_nav_menu_start_el', 'synthai_menu_add_description_to_menu', 10, 4);

add_filter('wp_list_categories', 'synthai_cat_count_span');
function synthai_cat_count_span($links) {
  $links = str_replace('</a> (', '</a> <span>(', $links);
  $links = str_replace(')', ')</span>', $links);
  return $links;
}

function synthai_style_the_archive_count($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="archiveCount">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

add_filter('get_archives_link', 'synthai_style_the_archive_count');

/**
 * Post title array
 */
function synthai_get_postTitleArray($postType = 'post' ){
    $post_type_query  = new WP_Query(
        array (
            'post_type'      => $postType,
            'posts_per_page' => -1,
            'orderby' => 'title',
    		'order'   => 'ASC',
        )
    );
    // we need the array of posts
    $posts_array      = $post_type_query->posts;
    // the key equals the ID, the value is the post_title
    if ( is_array($posts_array) ) {
        $post_title_array = wp_list_pluck($posts_array, 'post_title', 'ID' );
    } else {
        $post_title_array['default'] = esc_html__( 'Default', 'synthai' );
    }
    return $post_title_array;
}


if ( class_exists( 'WooCommerce' ) ) { 

	/**
	 * Display 3 products per row on Shop Page
	 */
	add_filter('loop_shop_columns', 'fitton_default_shop_loop_columns');
	function fitton_default_shop_loop_columns() {
		return 3;
	}

	/**
	 * Remove WooCommerce Actions 
	 */
	add_action( 'init', 'woo_remove_actions' );
	function woo_remove_actions() {
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
		remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
	}

}


// Get all Taxonomy Terms Array
if ( !function_exists('tp_get_all_taxonomy_terms') ) {
    function tp_get_all_taxonomy_terms($post_type = null, $taxonomy = null) {
        $terms_arr = [];
        if ( !empty($post_type) && !empty($taxonomy) ) {
            $terms = get_terms(
                [
                    'taxonomy' => $taxonomy,
                    'type' => $post_type,
                    'child_of' => 0,
                    'parent' => '',
                    'orderby' => 'name',
                    'order' => 'ASC',
                    'hierarchical' => 1,
                    'exclude' => '',
                    'include' => '',
                    'number' => 0,
                    'pad_counts' => false
                ]
            );
            if (!empty($terms)) {
                foreach ($terms as $key => $term) {
                    $terms_arr[$term->slug] = $term->name;
                }
            }
        }

        return $terms_arr;
    }
}

// Get all post of type list
if ( !function_exists('tp_get_all_post_list') ) {
    function tp_get_all_post_list($type = '') {
        $post_list = [];
        if ( !empty($type) ) {
            $all_posts = get_posts(
                [
                    'post_type'     => sanitize_key($type),
                    'numberposts'   => '-1'
                ]
            );

            if ($all_posts > 0) {
                foreach ($all_posts as $post) {
                    setup_postdata($post);
                    $post_list[$post->ID] = $post->post_title;
                }
            } else {
                $post_list = array(
                    'no_posts' => esc_html__('No Posts Were Found', 'synthai')
                );
            }
        }

        return $post_list;
    }
}

// Output Code
if (!function_exists('tp_elements_output_code')) {
    function tp_elements_output_code($code) {
        return $code;
    }
}

//Custom Animation for Elementor
if (!function_exists('tp_elements_elementor_custom_animation') ) {
	function tp_elements_elementor_custom_animation() {
		return array(
			'ThemePhi Animation' => [
				'tp_heading_animation' => 'TP Heading Animation',
			]
		);
	}
}
add_filter( 'elementor/controls/animations/additional_animations', 'tp_elements_elementor_custom_animation' );
