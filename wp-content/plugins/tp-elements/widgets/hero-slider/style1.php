<div class="swiper-slide tp-slide-item" style="background-image: url( <?php echo esc_url($image); ?> ); background-repeat: no-repeat; background-size: cover;" >
    <div  class="tp-hero-slider-item single--item ">

        <div class="tp-hero-slider-text ">
            <?php if(!empty($hero_title)):?>
            <h2 class="tp-hero-slider-title"><?php echo wp_kses_post($hero_title); ?></h2>
            <?php endif;?>
            <?php if(!empty($description)):?>
            <div class="tp-hero-slider-description">
                <?php echo wp_kses_post($description); ?>
            </div>
            <?php endif;?> 
            <?php if( $item['show_button'] == 'yes' ) : ?>
            <div class="helo--btn-wrapper style1">
                <a class="wc-btn-group" href="<?php echo esc_url( $btn_link );?>" <?php echo esc_attr($target); ?> >
                    <span class="wc-btn-play">
                        <?php \Elementor\Icons_Manager::render_icon( $item['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                    <span class="wc-btn-primary">
                    <?php echo esc_html( $btn_text ); ?>
                    </span>
                    <span class="wc-btn-play">
                        <?php \Elementor\Icons_Manager::render_icon( $item['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                </a>
            </div>
            <?php endif; ?>

        </div>

    </div>
</div> 