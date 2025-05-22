<div class="swiper-slide tp-slide-item">
    <div  class="single--item ">
        <div class="banner-image">
            <img class="banner-img" src="<?php echo esc_url($image); ?>" alt="image">
        </div>
        <?php if(!empty($title)):?>
            <h2 class="slider-title"><?php echo wp_kses_post($title); ?></h2>   
        <?php endif;?> 
        <?php if(!empty($sub_title)):?>
            <span class="slider-subtitle"><?php echo wp_kses_post($sub_title); ?></span>
        <?php endif;?>  

        <div class="content--box-wrapp">
            <div class="description">
                <div class="desc">
                    <?php echo wp_kses_post($description); ?>
                </div>
            </div>  
            <?php if( $settings['show_rating'] == 'yes' ) : ?>
            <ul class="d-flex gap-2 tp-el-star <?php if( $settings['show_rating_in_first'] == 'yes' ) : ?> order-in-first <?php endif; ?>">
                <?php if( $tp_rating == '1' ) : ?>
                <li><i class="tp tp-star"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '1.5' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-half"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '2' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '2.5' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-half"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '3' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '3.5' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-half"></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '4' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-regular"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '4.5' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star-half"></i></li>
                <?php endif; ?>
                <?php if( $tp_rating == '5' ) : ?>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <li><i class="tp tp-star "></i></li>
                <?php endif; ?>

            </ul>
            <?php endif; ?>          
        </div>
    </div>
</div> 