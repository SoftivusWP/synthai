<?php
    global $synthai_option;    
    $header_width_meta = get_post_meta(get_the_ID(), 'header_width_custom', true);
    if ($header_width_meta != ''){
        $header_width = ( $header_width_meta == 'full' ) ? 'container-fluid': 'container';
    }else{
        $header_width = !empty($synthai_option['header-grid']) ? $synthai_option['header-grid'] : '';
        $header_width = ( $header_width == 'full' ) ? 'container-fluid': 'container';
    }
    $post_meta_data = get_post_meta(get_the_ID(), 'banner_image', true); 
    $post_menu_type = get_post_meta(get_the_ID(), 'menu-type', true); 
    $content_banner = get_post_meta(get_the_ID(), 'content_banner', true); 
    $intro_content_banner = get_post_meta(get_the_ID(), 'intro_content_banner', true); 
?>

<div class="themephi-breadcrumbs  porfolio-details">
<?php if($post_meta_data !='') { ?>
    <div class="breadcrumbs-single" style="background:<?php echo esc_attr($synthai_option['breadcrumb_bg_color']);?>">
        <img src="<?php echo esc_url($post_meta_data); ?>" alt="<?php echo esc_attr__('breadcrumb image', 'synthai'); ?>">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <div class="row">               
                    <div class="col-lg-12">                
                        <?php                       
                            $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);
                            if( $post_meta_title != 'hide' ){             
                   
                                if( !empty( $intro_content_banner )): ?>
                                    <span class="sub-title"><?php echo esc_html($intro_content_banner);?></span>
                                <?php endif; ?>
                                 <h1 class="page-title">
                                <?php if($content_banner !=''){
                                    echo esc_html($content_banner);
                                    } else {
                                        the_title();
                                    }
                                ?>
                                </h1>
                        <?php }  ?>    
                  </div>
                    <div class="col-lg-12">                                  
                        <?php 
                      
                            if(!empty($synthai_option['off_breadcrumb'])){
                                $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                                if( $rs_breadcrumbs != 'hide' ):        
                                    if(function_exists('bcn_display')){?>
                                        <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                    <?php } 
                                endif;
                            }
                 
                        ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }
elseif (!empty($synthai_option['department_single_image']['url'])) {
    ?>
    <div class="breadcrumbs-single" style="background-image: url('<?php echo esc_url( $synthai_option['department_single_image']['url'] );?>')">
        <div class="<?php echo esc_attr($header_width);?>">
            <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <div class="row">            
                    <div class="col-lg-12">             
                        <?php         
                        

                        $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                
                        if( !empty( $intro_content_banner )): ?>
                            <span class="sub-title"><?php echo esc_html($intro_content_banner);?></span>
                        <?php endif; ?>

                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {
                                the_title();
                            } ?>
                        </h1>
                        <?php }?>    
                    </div>
                 <div class="col-lg-12">                                  
                     <?php 
                   
                         if(!empty($synthai_option['off_breadcrumb'])){
                             $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                             if( $rs_breadcrumbs != 'hide' ):        
                                 if(function_exists('bcn_display')){?>
                                     <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                 <?php } 
                             endif;
                         }
              
                     ?>    
                 </div>
             </div>
          </div>
        </div>
    </div>    
<?php }else{?>
    <div class="breadcrumbs-single " style="background:<?php echo esc_attr($synthai_option['breadcrumb_bg_color']);?>">
          <div class="<?php echo esc_attr($header_width);?>">
           <div class="breadcrumbs-inner bread-<?php echo esc_attr($post_menu_type); ?>">
                <div class="row">            
                    <div class="col-lg-12">            
                        

                        <?php $post_meta_title = get_post_meta(get_the_ID(), 'select-title', true);?>
                        <?php if( $post_meta_title != 'hide' ){             
                
                        if( !empty( $intro_content_banner )): ?>
                            <span class="sub-title"><?php echo esc_html($intro_content_banner);?></span>
                        <?php endif; ?>

                        <h1 class="page-title">
                            <?php if($content_banner !=''){
                                echo esc_html($content_banner);
                            } else {
                                the_title();
                            } ?>
                        </h1>
                        <?php }?>    
                    </div>
                 <div class="col-lg-12">                                  
                     <?php 
                   
                         if(!empty($synthai_option['off_breadcrumb'])){
                             $rs_breadcrumbs = get_post_meta(get_the_ID(), 'select-bread', true);
                             if( $rs_breadcrumbs != 'hide' ):        
                                 if(function_exists('bcn_display')){?>
                                     <div class="breadcrumbs-title"> <?php  bcn_display();?></div>
                                 <?php } 
                             endif;
                         }
              
                     ?>    
                 </div>
             </div>
          </div>
          </div>
    </div>
<?php } ?>
</div>