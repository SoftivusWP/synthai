<?php
/*
dynamic css file. please don't edit it. it's update automatically when settins changed
*/
add_action('wp_head', 'synthai_custom_colors', 160);
function synthai_custom_colors() { 
global $synthai_option;	
/***styling options
------------------*/
	// Get selected theme mode (default = light)
    $theme_mode = isset($synthai_option['theme_mode']) ? $synthai_option['theme_mode'] : 'light';
    // Get correct background color based on mode
    if ( $theme_mode === 'dark' && !empty($synthai_option['body_bg_color_dark']) ) {
        $body_bg = $synthai_option['body_bg_color_dark'];
		$breadcrumb_bg = !empty($synthai_option['breadcrumb_bg_color_dark']) ? $synthai_option['breadcrumb_bg_color_dark'] : '#121212';
		$body_title_color = !empty($synthai_option['body_title_color_dark']) ? $synthai_option['body_title_color_dark'] : '#F2F1F6';
		$body_text_color = !empty($synthai_option['body_text_color_dark']) ? $synthai_option['body_text_color_dark'] : '#C4C5C0';
		$element_bg = !empty($synthai_option['element_bg_color_dark']) ? $synthai_option['element_bg_color_dark'] : '#171717';
		$input_bg = !empty($synthai_option['input_bg_color_dark']) ? $synthai_option['input_bg_color_dark'] : '#242424';
    } elseif ( $theme_mode === 'light' && !empty($synthai_option['body_bg_color']) ) {
        $body_bg = $synthai_option['body_bg_color'];
		$breadcrumb_bg = !empty($synthai_option['breadcrumb_bg_color']) ? $synthai_option['breadcrumb_bg_color'] : '#ffffff';
		$body_title_color = !empty($synthai_option['body_title_color']) ? $synthai_option['body_title_color'] : '#121212';
		$body_text_color = !empty($synthai_option['body_text_color']) ? $synthai_option['body_text_color'] : '#242424';
		$element_bg = !empty($synthai_option['element_bg_color']) ? $synthai_option['element_bg_color'] : '#f9f9f9';
		$input_bg = !empty($synthai_option['input_bg_color']) ? $synthai_option['input_bg_color'] : '#f2f2f2';
    } else {
        // fallback defaults
        $body_bg = ($theme_mode === 'dark') ? '#121212' : '#ffffff';
		$breadcrumb_bg = !empty($synthai_option['breadcrumb_bg_color']) ? $synthai_option['breadcrumb_bg_color'] : '#ffffff';
		$body_title_color = !empty($synthai_option['body_title_color']) ? $synthai_option['body_title_color'] : '#121212';
		$body_text_color = !empty($synthai_option['body_text_color']) ? $synthai_option['body_text_color'] : '#242424';
		$element_bg = !empty($synthai_option['element_bg_color']) ? $synthai_option['element_bg_color'] : '#f9f9f9';
		$input_bg = !empty($synthai_option['input_bg_color']) ? $synthai_option['input_bg_color'] : '#f2f2f2';
    }

	$site_color       = !empty($synthai_option['primary_color']) ? $synthai_option['primary_color'] : '';
	$secondary_color  = !empty($synthai_option['secondary_color']) ? $synthai_option['secondary_color'] : '';	
	$link_color       = !empty($synthai_option['link_text_color']) ? $synthai_option['link_text_color'] : '';
	$link_hover_color = !empty($synthai_option['link_hover_text_color']) ? $synthai_option['link_hover_text_color'] : '';
	
	//typography extract for body
	$body_typography_font      = !empty($synthai_option['opt-typography-body']['font-family']) ? $synthai_option['opt-typography-body']['font-family'] : '';
	$body_typography_font_size = !empty($synthai_option['opt-typography-body']['font-size']) ? $synthai_option['opt-typography-body']['font-size'] : '' ;

	//typography extract for menu
	$menu_typography_color       = !empty($synthai_option['opt-typography-menu']['color']) ? $synthai_option['opt-typography-menu']['color'] : '' ;	
	$menu_typography_weight      = !empty($synthai_option['opt-typography-menu']['font-weight']) ? $synthai_option['opt-typography-menu']['font-weight']: '';	
	$menu_typography_font_family = !empty($synthai_option['opt-typography-menu']['font-family']) ? $synthai_option['opt-typography-menu']['font-family'] : '';
	$menu_typography_font_fsize  = !empty($synthai_option['opt-typography-menu']['font-size']) ? $synthai_option['opt-typography-menu']['font-size'] : '';

	//typography extract for heading
	$h1_typography_color= !empty($synthai_option['opt-typography-h1']['color'])? $synthai_option['opt-typography-h1']['color']: '';
	if(!empty($synthai_option['opt-typography-h1']['font-weight'])) {
		$h1_typography_weight=$synthai_option['opt-typography-h1']['font-weight'];
	}
		
	$h1_typography_font_family = !empty($synthai_option['opt-typography-h1']['font-family']) ? $synthai_option['opt-typography-h1']['font-family'] : '' ;
	$h1_typography_font_fsize = !empty($synthai_option['opt-typography-h1']['font-size']) ? $synthai_option['opt-typography-h1']['font-size'] : '';	

	if(!empty($synthai_option['opt-typography-h1']['line-height'])) {
		$h1_typography_line_height=$synthai_option['opt-typography-h1']['line-height'];
	}
	
	$h2_typography_color = !empty($synthai_option['opt-typography-h2']['color']) ? $synthai_option['opt-typography-h2']['color'] : '';	

	$h2_typography_font_fsize = !empty($synthai_option['opt-typography-h2']['font-size']) ? $synthai_option['opt-typography-h2']['font-size'] : '';	
	if(!empty($synthai_option['opt-typography-h2']['font-weight'])){
		$h2_typography_font_weight=$synthai_option['opt-typography-h2']['font-weight'];
	}	

	$h2_typography_font_family = !empty($synthai_option['opt-typography-h2']['font-family']) ? $synthai_option['opt-typography-h2']['font-family'] : '' ;

	$h2_typography_font_fsize = !empty($synthai_option['opt-typography-h2']['font-size']) ? $synthai_option['opt-typography-h2']['font-size'] : '';	

	if(!empty($synthai_option['opt-typography-h2']['line-height'])){
		$h2_typography_line_height=$synthai_option['opt-typography-h2']['line-height'];
	}
	
	$h3_typography_color = !empty($synthai_option['opt-typography-h3']['color']) ? $synthai_option['opt-typography-h3']['color'] : '';	

	if(!empty($synthai_option['opt-typography-h3']['font-weight'])){
		$h3_typography_font_weightt=$synthai_option['opt-typography-h3']['font-weight'];
	}	

	$h3_typography_font_family = !empty($synthai_option['opt-typography-h3']['font-family']) ? $synthai_option['opt-typography-h3']['font-family']: '';

	$h3_typography_font_fsize  = !empty($synthai_option['opt-typography-h3']['font-size']) ? $synthai_option['opt-typography-h3']['font-size'] : '';	

	if(!empty($synthai_option['opt-typography-h3']['line-height'])){
		$h3_typography_line_height = $synthai_option['opt-typography-h3']['line-height'];
	}

	$h4_typography_color = !empty($synthai_option['opt-typography-h4']['color']) ? $synthai_option['opt-typography-h4']['color'] : '';	

	if(!empty($synthai_option['opt-typography-h4']['font-weight'])){
		$h4_typography_font_weight = $synthai_option['opt-typography-h4']['font-weight'];
	}	

	$h4_typography_font_family = !empty($synthai_option['opt-typography-h4']['font-family']) ? $synthai_option['opt-typography-h4']['font-family'] : '';

	$h4_typography_font_fsize  = !empty($synthai_option['opt-typography-h4']['font-size']) ? $synthai_option['opt-typography-h4']['font-size'] : '';	

	if(!empty($synthai_option['opt-typography-h4']['line-height'])) {
		$h4_typography_line_height = $synthai_option['opt-typography-h4']['line-height'];
	}
	
	$h5_typography_color = !empty($synthai_option['opt-typography-h5']['color']) ? $synthai_option['opt-typography-h5']['color'] : '';	

	if(!empty($synthai_option['opt-typography-h5']['font-weight'])) {
		$h5_typography_font_weight = $synthai_option['opt-typography-h5']['font-weight'];
	}	

	$h5_typography_font_family = !empty($synthai_option['opt-typography-h5']['font-family']) ? $synthai_option['opt-typography-h5']['font-family'] : '';

	$h5_typography_font_fsize  = !empty($synthai_option['opt-typography-h5']['font-size']) ? $synthai_option['opt-typography-h5']['font-size'] : '';	

	if(!empty($synthai_option['opt-typography-h5']['line-height'])) {
		$h5_typography_line_height = $synthai_option['opt-typography-h5']['line-height'];
	}
	
	$h6_typography_color = !empty($synthai_option['opt-typography-6']['color']) ? $synthai_option['opt-typography-6']['color'] : '';	

	if(!empty($synthai_option['opt-typography-6']['font-weight'])) {
		$h6_typography_font_weight = $synthai_option['opt-typography-6']['font-weight'];
	}

	$h6_typography_font_family = !empty($synthai_option['opt-typography-6']['font-family']) ? $synthai_option['opt-typography-6']['font-family'] : '';

	$h6_typography_font_fsize  = !empty($synthai_option['opt-typography-6']['font-size']) ? $synthai_option['opt-typography-6']['font-size'] : '';

	if(!empty($synthai_option['opt-typography-6']['line-height'])) {
		$h6_typography_line_height = $synthai_option['opt-typography-6']['line-height'];
	}

?>

<!-- Typography -->

<style>	

	body{
		background:<?php echo sanitize_hex_color($body_bg); ?>;
		color:<?php echo sanitize_hex_color($body_text_color); ?> !important;
		<?php if(!empty($body_typography_font)){ ?>
			font-family: <?php echo esc_attr($body_typography_font);?> !important;   
		<?php } ?> 
	    font-size: <?php echo esc_attr($body_typography_font_size);?> !important;
	}	

	h1{
		<?php if(!empty($h1_typography_color)) { ?>
			 color: <?php echo sanitize_hex_color($h1_typography_color);?>;
		<?php
	 	}?>
		<?php if(!empty($h1_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($h1_typography_font_family);?>;   
		<?php } ?>
		font-size:<?php echo esc_attr($h1_typography_font_fsize);?>;
		<?php if(!empty($h1_typography_weight)){
		?>
		font-weight:<?php echo esc_attr($h1_typography_weight);?>;
		<?php }?>
		
		<?php if(!empty($h1_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h1_typography_line_height); ?>;
		<?php }?>		
	}
	h2{
		color:<?php echo sanitize_hex_color($h2_typography_color);?>;
		<?php if(!empty($h2_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($h2_typography_font_family); ?> !important;   
		<?php } ?> 
		font-size:<?php echo esc_attr($h2_typography_font_fsize);?>;
		<?php if(!empty($h2_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h2_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h2_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h2_typography_line_height); ?>
		<?php }?>
	}
	h3{
		color:<?php echo sanitize_hex_color($h3_typography_color);?> ;
		<?php if(!empty($h3_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($h3_typography_font_family);?> !important;   
		<?php } ?> 
		font-size:<?php echo esc_attr($h3_typography_font_fsize);?>;
		<?php if(!empty($h3_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h3_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h3_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h3_typography_line_height);?>;
		<?php }?>
	}
	h4{
		color:<?php echo sanitize_hex_color($h4_typography_color);?>;
		<?php if(!empty($h4_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($h4_typography_font_family);?> !important;   
		<?php } ?>
		font-size:<?php echo esc_attr($h4_typography_font_fsize);?>;
		<?php if(!empty($h4_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h4_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h4_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h4_typography_line_height);?>;
		<?php }?>		
	}
	h5{
		color:<?php echo sanitize_hex_color($h5_typography_color);?>;
		<?php if(!empty($h5_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($h5_typography_font_family);?> !important;   
		<?php } ?>
		font-size:<?php echo esc_attr($h5_typography_font_fsize);?>;
		<?php if(!empty($h5_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h5_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h5_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h5_typography_line_height);?>;
		<?php }?>
	}
	h6{
		color:<?php echo sanitize_hex_color($h6_typography_color);?> ;
		<?php if(!empty($h6_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($h6_typography_font_family);?> !important;   
		<?php } ?>
		font-size:<?php echo esc_attr($h6_typography_font_fsize);?>;
		<?php if(!empty($h6_typography_font_weight)){
		?>
		font-weight:<?php echo esc_attr($h6_typography_font_weight);?>;
		<?php }?>
		
		<?php if(!empty($h6_typography_line_height)){
		?>
			line-height:<?php echo esc_attr($h6_typography_line_height);?>;
		<?php }?>
	}
	.menu-area .navbar ul li > a,
	.sidenav .widget_nav_menu ul li a{
		<?php if(!empty($menu_typography_weight)){ ?>
			font-weight: <?php echo esc_attr($menu_typography_weight);?>;   
		<?php } ?>
		<?php if(!empty($menu_typography_font_family)){ ?>
			font-family: <?php echo esc_attr($menu_typography_font_family);?>;   
		<?php } ?>
		font-size:<?php echo esc_attr($menu_typography_font_fsize); ?>;
	}
	:root{
		--primaryColor: <?php echo sanitize_hex_color($site_color);?> !important;
		--secondaryColor: <?php echo sanitize_hex_color($secondary_color);?> !important;
	} 

	.themephi-breadcrumbs .breadcrumbs-title span a span, .themephi-sideabr .widget_block label.wp-block-search__label, .themephi-sideabr .widget_block h2, .themephi-sideabr .widget-title, .themephi-sideabr .recent-post-widget .post-desc a, .themephi-breadcrumbs .breadcrumbs-title span a::before, h1, h2, h3, h4, h5, h6, .woocommerce-Address-title.title h2, .woocommerce-MyAccount-content h2, .woocommerce h2, .wp-block-heading, .woocommerce:where(body:not(.woocommerce-uses-block-theme)) div.product p.price, .woocommerce:where(body:not(.woocommerce-uses-block-theme)) div.product span.price, .woocommerce div.product form.cart .button, .entry-content li.wc-block-grid__product .wc-block-grid__product-title, .entry-content li.wc-block-grid__product .add_to_cart_button, .woocommerce-MyAccount-navigation ul li a, .woocommerce-MyAccount-navigation ul li.is-active a, .woocommerce-MyAccount-navigation ul li:hover a, .bs-desc h2, .bs-desc h3, .bs-desc h4, .bs-desc h5, .bs-desc h6, .themephi-blog-details #reply-title, .comments-title, .team-info-wrapp .heading, .tp-team-infos .team-details-info-title, .social-follows label, .tp-portfolio-inner-content-text-title, .tp-portfolio-inner-side-single .tp-portfolio-inner-side-title, .service-navigation .title, .product_title.entry-title, .woocommerce-Tabs-panel h2, .related.products h2, .woocommerce-loop-product__title, .woocommerce-Reviews-title, .page-title, .tp-portfolio-inner-content-text-wrapper .tp-portfolio-inner-content-text-title, body.search-results .site-main > article .entry-title a, .woocommerce .quantity .qty, .sidenav .widget_nav_menu ul li a, #mobile_menu .submenu-button::after {
		color: <?php echo esc_attr($body_title_color); ?>;
	}

	.single-post .themephi-blog-details .type-post .single-content-full .user-info .single-info i, .single-post .themephi-blog-details .type-post .single-content-full .user-info .single-info a, .themephi-blog-details .bs-info.tags, .themephi-sideabr .recent-post-widget .post-desc span, .themephi-sideabr .recent-post-widget .post-desc span i, .themephi-sideabr ul a, .themephi-sideabr .tagcloud a, .themephi-blog-details .bs-info.tags a, .widget_tp_all_post_types_categories .themephi-all-categories-wrapper ul li a, .themephi-sideabr .widget_search input, .themephi-sideabr .bs-search input, .logged-in-as a, .pagination-area .nav-links a, .product_meta span.tagged_as a, .product_meta span.posted_in a, .woocommerce ul.products li.product .price, .entry-content li.wc-block-grid__product .wc-block-grid__product-price.price, .wp-block-button .wp-block-button__link, .woocommerce a, mark, ins, .woocommerce-error, .woocommerce-info, .woocommerce-message, input[type="text"]::placeholder, input[type="number"]::placeholder, input[type="password"]::placeholder, textarea::placeholder, input[type="email"]::placeholder, .woocommerce form .form-row input.input-text, .woocommerce form .form-row select, .select2-container--default .select2-selection--single .select2-selection__placeholder, .tp-synthai-shop-top-portion select, select:valid, .bs-search input, .description-informations-label-value span strong, .blog .themephi-blog .blog-item .full-blog-content .title-wrap .blog-title a, .archive .themephi-blog .blog-item .full-blog-content .title-wrap .blog-title a, input[type="text"], input[type="number"], input[type="password"], textarea, input[type="email"], blockquote p, body .wp-block-quote.is-style-large:not(.is-style-plain) p {
		color: <?php echo esc_attr($body_text_color); ?>;
	}

	.themephi-sideabr .widget, .comments-area p.comment-form-comment textarea, .tp-synthai-shop-top-portion, .tp-synthai-shop-top-portion select, .menu-wrap-off {
		background: <?php echo esc_attr($element_bg); ?>;
	}

	.widget_themephi_soical_widget ul.footer_social li > a, .themephi-sideabr .widget_search input, .themephi-sideabr .bs-search input, .widget_tp_all_post_types_categories .themephi-all-categories-wrapper ul li a, .comments-area p.comment-form-comment textarea, .woocommerce .quantity .qty, .woocommerce div.product form.cart .button, .woocommerce-MyAccount-navigation ul li, .woocommerce-MyAccount-navigation ul li.is-active, .woocommerce-MyAccount-navigation ul li:hover, .woocommerce-MyAccount-navigation ul li:last-child, .woocommerce form .form-row .select2-container--default .select2-selection--single, .woocommerce form .form-row input.input-text, .woocommerce form .form-row select, .tp-synthai-shop-top-portion select, .sidenav .widget_nav_menu ul li a, .sidenav .widget_nav_menu ul li:last-child a {
		border-color: <?php echo esc_attr($input_bg); ?>;
	}
	
	.themephi-sideabr ul a, .themephi-sideabr .tagcloud a, .themephi-blog-details .bs-info.tags a, .themephi-sideabr .widget_search input, .themephi-sideabr .bs-search input, .widget_tp_all_post_types_categories .themephi-all-categories-wrapper ul li a, .product_meta span.posted_in a, .woocommerce #review_form #respond textarea, .woocommerce-error, .woocommerce-info, .woocommerce-message, .woocommerce-MyAccount-navigation ul li.is-active, .woocommerce-MyAccount-navigation ul li:hover, .woocommerce form .form-row input.input-text, .woocommerce form .form-row select, .woocommerce form .form-row .select2-container--default .select2-selection--single, input[type="text"], input[type="number"], input[type="email"], input[type="url"], select, input[type="password"], .comments-area p.comment-form-author input, .comments-area p.comment-form-email input, .bs-search input {
		background: <?php echo esc_attr($input_bg); ?>;
	}

	<?php if( !empty( $breadcrumb_bg ) ) : ?>
	.themephi-breadcrumbs .breadcrumbs-inner .tp-breadcrumb-title-abs {
		
		background-color: <?php echo esc_attr($breadcrumb_bg); ?>;
	}
	.themephi-breadcrumbs .breadcrumbs-inner .tp-breadcrumb-title-abs::before, .themephi-breadcrumbs .breadcrumbs-inner .tp-breadcrumb-title-abs::after {
		box-shadow: 0px 12px 0 0 <?php echo esc_attr($breadcrumb_bg); ?>;
	}
	<?php endif; ?>
	
	<?php if( !empty( $synthai_option['breadcrumb_top_gap'] ) ) : ?>
		.themephi-breadcrumbs .breadcrumbs-inner { 
			padding-top:<?php echo esc_attr($synthai_option['breadcrumb_top_gap']); ?>;					
	}
	<?php endif; ?>

	<?php if( !empty( $synthai_option['breadcrumb_bottom_gap'] ) ) : ?>
		.themephi-breadcrumbs .breadcrumbs-inner { 		
			padding-bottom:<?php echo esc_attr($synthai_option['breadcrumb_bottom_gap']); ?>;			
	}
	<?php endif; ?>

	<?php if(!empty($synthai_option['breadcrumb_position'])) : ?>
		
		.themephi-breadcrumbs{
			margin-top:<?php echo esc_attr($synthai_option['breadcrumb_position']); ?>;		
		}
		
	<?php endif; ?>
	

	<?php if(!empty($synthai_option['container_size'])) : ?>
		@media only screen and (min-width: 1400px) {
			.container{
				max-width:<?php echo esc_attr($synthai_option['container_size']); ?>;
			}
		}
	<?php endif; ?>

	<?php if(!empty($synthai_option['preloader_bg_color'])) : ?>
		#synthai-load{
			background: <?php echo sanitize_hex_color($synthai_option['preloader_bg_color']); ?>;  
		}
	<?php endif; ?>

	<?php if(!empty($synthai_option['preloader_animate_color2'])) : ?>
		#synthai-load .lds-ring div{
			border-color: <?php echo sanitize_hex_color($synthai_option['preloader_animate_color2']); ?> transparent transparent transparent;  
		}
	<?php endif; ?>

	<?php if(!empty($synthai_option['align_breadcrumb'])) : ?>
		.themephi-breadcrumbs .breadcrumbs-inner{
			text-align: <?php echo esc_attr($synthai_option['align_breadcrumb']); ?> !important;  
		}
	<?php endif; ?>

	<?php if(!empty($synthai_option['page_title_color'])) : ?>
		.themephi-breadcrumbs .page-title{
			color: <?php echo sanitize_hex_color($synthai_option['page_title_color']); ?> !important;  
		}
	<?php endif; ?>
	
	<?php if(!empty($body_bg)) : ?>
		body.archive.tax-product_cat{
			background: <?php echo sanitize_hex_color($body_bg); ?> !important;  
		}
	<?php endif; ?>
</style>

<?php

	 
	if(is_home() && !is_front_page() || is_home() && is_front_page()){
		$padding_top        = get_post_meta(get_queried_object_id(), 'content_top', true);
		$padding_bottom     = get_post_meta(get_queried_object_id(), 'content_bottom', true);		
		$footer_padd_top    = get_post_meta(get_queried_object_id(), 'footer_padd_top', true);
		$footer_padd_bottom = get_post_meta(get_queried_object_id(), 'footer_padd_bottom', true);
  		if($padding_top != '' || $padding_bottom != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content,
	  	  	body.themephi-pages-btm-gap .main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?>;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?>;
	  	  	}
	  	  </style>	
	  	<?php
	  	}
   		if($footer_padd_top != '' || $footer_padd_bottom != ''){
 	  	?>
 	  	  <style>
 	  	  	.themephi-footer .footer-top{
 	  	  		<?php if(!empty($footer_padd_top)): ?>padding-top:<?php echo esc_attr($footer_padd_top); endif;?>;
 	  	  		<?php if(!empty($footer_padd_bottom)): ?>padding-bottom:<?php echo esc_attr($footer_padd_bottom); endif;?>;
 	  	  	}
 	  	  </style>	
 	  	  <?php
 	 	} 		
  }
  	else{ 
		$padding_top        = get_post_meta(get_the_ID(), 'content_top', true);
		$padding_bottom     = get_post_meta(get_the_ID(), 'content_bottom', true);		
		$footer_padd_top    = get_post_meta(get_the_ID(), 'footer_padd_top', true);
		$footer_padd_bottom = get_post_meta(get_the_ID(), 'footer_padd_bottom', true);
  		if($padding_top != '' || $padding_bottom != ''){
	  	?>
	  	  <style>
	  	  	.main-contain #content,
	  	  	body.themephi-pages-btm-gap .main-contain #content{
	  	  		<?php if(!empty($padding_top)): ?>padding-top:<?php echo esc_attr($padding_top); endif;?>;
	  	  		<?php if(!empty($padding_bottom)): ?>padding-bottom:<?php echo esc_attr($padding_bottom); endif;?>;
	  	  	}
	  	  </style>	
	  	<?php
	  }

		if($footer_padd_top != '' || $footer_padd_bottom != ''){
	  	?>
	  	  <style>
	  	  	.themephi-footer .footer-top{
	  	  		<?php if(!empty($footer_padd_top)): ?>padding-top:<?php echo esc_attr($footer_padd_top); endif;?> !important;
	  	  		<?php if(!empty($footer_padd_bottom)): ?>padding-bottom:<?php echo esc_attr($footer_padd_bottom); endif;?> !important;
	  	  	}
	  	  </style>	
	  	  <?php
	 	} 
}	

if ( !class_exists('ReduxFrameworkPlugin') ) {  ?>		

	<style>@media only screen and (max-width: 1024px){
		.sidebarmenu-area.primary-menu.mobilehum {
			display: block !important;
		}
	} </style>
<?php }
}