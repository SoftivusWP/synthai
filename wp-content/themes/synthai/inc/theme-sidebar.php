<?php
function synthai_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'synthai' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'This is sidebar area for blog post and single post.', 'synthai' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	
	register_sidebar( array(
		'name'          => esc_html__( 'Service Sidebar', 'synthai' ),
		'id'            => 'sidebar-service',
		'description'   => esc_html__( 'This is sidebar area for blog post and single post.', 'synthai' ),
		'before_widget' => '<div id="%1$s" class="widget common__item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Portfolio Sidebar', 'synthai' ),
		'id'            => 'sidebar-portfolio',
		'description'   => esc_html__( 'This is sidebar area for blog post and single post.', 'synthai' ),
		'before_widget' => '<div id="%1$s" class="widget common__item %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	// if(class_exists('WooCommerce')): 
	// 	register_sidebar( array(
	// 		'name'          => esc_html__( 'WooCommerce Sidebar', 'synthai' ),
	// 		'id'            => 'woocommerce',
	// 		'description'   => esc_html__( 'This is sidebar area for woocommerces shop page.', 'synthai' ),
	// 		'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 		'after_widget'  => '</section>',
	// 		'before_title'  => '<h2 class="widget-title">',
	// 		'after_title'   => '</h2>',
	// 	) );
	// endif;
			
}
add_action( 'widgets_init', 'synthai_widgets_init' );