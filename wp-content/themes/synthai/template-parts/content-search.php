<?php global $synthai_option; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>  
    <header class="entry-header">
        <?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
    </header>
    <!-- .entry-header -->
    
    <div class="entry-summary mb-0">
        <p><?php echo synthai_custom_excerpt(30);?></p>   
        <?php 
        if(!empty($synthai_option['blog_readmore'])):?>
        <div class="helo--btn-wrapper style1 mt-30">
            <a href="<?php the_permalink();?>" rel="nofollow" class="wc-btn-group">
                <span class="wc-btn-play"><i class="tp tp-arrow-right"></i></span>
                <span class="wc-btn-primary"><?php echo esc_html($synthai_option['blog_readmore']); ?></span>
                <span class="wc-btn-play"><i class="tp tp-arrow-right"></i></span>
            </a>
        </div>
        <?php endif; ?>
    </div>
    <!-- .entry-summary -->

</article>
