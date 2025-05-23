<div class="swiper-slide tp-slide-item">
    <div  class="single--item" style="background-image: url( <?php echo esc_attr( $image ); ?> );">
        <div class="content--box">
            <?php if(!empty($sub_title)):?>
                <p class="slider-subtitle">
                    <?php if(!empty($sub_img_link)):?>
                        <img src="<?php echo esc_attr($sub_img_link); ?>" alt="Icon">
                    <?php endif;?>
                    <?php echo wp_kses_post($sub_title); ?>
                </p>
            <?php endif;?>
            <?php if(!empty($title)):?>
                <h2 class="slider-title"><?php echo wp_kses_post($title); ?></h2>
            <?php endif;?>
            <?php if(!empty($description)):?>
                <div class="slider-description"><?php echo wp_kses_post($description); ?></div>
            <?php endif;?>
        </div>
    
    </div>
</div>