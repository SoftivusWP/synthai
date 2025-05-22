<?php
wp_head();
global $synthai_option;?>
<div class="page-error">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="container">
                <section class="error-404 not-found">
                    <div class="page-content">
                        <?php if (!empty($synthai_option['404_bg']['url'])) {?>
                            <img class="error-image"  src="<?php echo esc_url($synthai_option['404_bg']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        <?php }
                        else{ ?>
                            <h2>
                            <span>
                                <?php
                                    if (!empty($synthai_option['title_404'])) {
                                        echo esc_html($synthai_option['title_404']);
                                    } else {  
                                        echo esc_html__('404', 'synthai');
                                    }
                                ?>
                            </span>                           
                        </h2>                 
                       <?php } 
                        ?>

                        <h2 class="opps-nothing">
                            
                            <?php
                                if (!empty($synthai_option['text_404'])) {
                                    echo esc_html($synthai_option['text_404']);
                                } else {
                                    echo esc_html__('Oops! Nothing Was Found', 'synthai');
                                }
                            ?>
                        </h2>            
                        <p class="error-msg">
                            <?php echo esc_html__("Sorry, we couldn't find the page you where looking for. We suggest that you return to homepage.", 'synthai'); ?>
                        </p>

                        <div class="helo--btn-wrapper style1 d-inline-block mt-30">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="nofollow" class="wc-btn-group">
                                <span class="wc-btn-play"><i class="tp tp-arrow-right"></i></span>
                                <span class="wc-btn-primary"><?php
                                    if (!empty($synthai_option['back_home'])) {
                                        echo esc_html($synthai_option['back_home']);
                                    } else {
                                        esc_html_e('Or back to homepage', 'synthai');
                                    }
                                ?></span>
                                <span class="wc-btn-play"><i class="tp tp-arrow-right"></i></span>
                            </a>
                        </div>

                    </div><!-- .page-content -->
                </section><!-- .error-404 -->
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->
</div> <!-- .page-error -->
<?php
wp_footer();
