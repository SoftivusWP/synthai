<?php
/*
Header Style
*/
global $synthai_option;
$sticky             = !empty($synthai_option['off_sticky']) ? $synthai_option['off_sticky'] : ''; 
$sticky_menu        = ($sticky == 1) ? ' menu-sticky' : '';
$drob_aligns        = (!empty($synthai_option['drob_align_s'])) ? 'menu-drob-align' : '';
$mobile_hide_search = (!empty($synthai_option['mobile_off_search'])) ? 'mobile-hide-search' : '';
$mobile_hide_cart   = (!empty($synthai_option['mobile_off_cart'])) ? 'mobile-hide-cart-no' : 'mobile-hide-cart';
$mobile_hide_button = (!empty($synthai_option['mobile_off_button'])) ? 'mobile-hide-button' : '';
$mobile_logo_height =!empty($synthai_option['mobile_logo_height']) ? 'style = "max-height: '.$synthai_option['mobile_logo_height'].'"' : '';

// Header Options here
require get_parent_theme_file_path('inc/header/header-options.php');



$post_meta_header = '';
	 //check individual header 
if(is_page() || is_single()){
	$post_meta_header = get_post_meta(get_the_ID(), 'header_select', true);
	
}elseif(is_home() && !is_front_page() || is_home() && is_front_page()){
	$post_meta_header = get_post_meta(get_queried_object_id(), 'header_select', true);
}

$synthai_header_id = !empty($synthai_option['header_layout']) ? $synthai_option['header_layout'] : '';

$get_id = !empty($post_meta_header) ? $post_meta_header : $synthai_header_id;
$headser_postion = get_post_meta($get_id, 'header-position', true);
$get_header = ($headser_postion == 'on') ? 'fixed-header' : '';

?>

<?php 
  //include sticky search here
  get_template_part('inc/header/search');
?>

    <header id="themephi-header" class="tps-default-header header-style-1 mainsmenu<?php echo esc_attr($main_menu_hides);?>">
     
    	<div class="header-inner<?php echo esc_attr($sticky_menu);?>">    
    		<div class="container">
    			<?php  get_template_part('inc/header/header-style1');  ?>
    		</div>
		</div>    
  
	</header>
<?php 
 get_template_part( 'inc/breadcrumbs' );  ?>