<?php

	if(is_page() || is_search() ) {
		get_template_part( 'inc/page-header/breadcrumbs' );
	}

	if(is_home() && !is_front_page() || is_home() && is_front_page()){
		get_template_part( 'inc/page-header/breadcrumbs' );
	}

	if( is_singular('post') || is_singular('tp-portfolios') || is_singular('teams') || is_singular('services') ){
		get_template_part( 'inc/page-header/breadcrumbs' );
	}

	if(is_archive()){	
		if ( class_exists( 'WooCommerce' ) ) {	
			if(is_shop() || is_product_category() || is_product_tag()){	
						
			}
			else{
				get_template_part( 'inc/page-header/breadcrumbs');
			}	
		}else{
			get_template_part( 'inc/page-header/breadcrumbs');
		}	
	}

	
?>