<?php
    get_header();
    global $synthai_option;
	//take metafield value            

    $designation     = get_post_meta( get_the_ID(), 'designation', true );                                   
    $facebook        = get_post_meta( get_the_ID(), 'facebook', true );
    $twitter         = get_post_meta( get_the_ID(), 'twitter', true );
    $instagram       = get_post_meta( get_the_ID(), 'instagram', true );
    $linkedin        = get_post_meta( get_the_ID(), 'linkedin', true );
    $team_desination = get_post_meta( get_the_ID(), 'designation', true );  
    $short_desc      = get_post_meta( get_the_ID(), 'shortbio', true );

    // Get the group field values
    $group_field_values = get_post_meta( get_the_ID(), 'member_skill', true );

    // Get the information group field values
    $informations_field_values = get_post_meta( get_the_ID(), 'member_info', true );

    ?>

<div class="container">
    <?php while ( have_posts() ) : the_post(); ?>

    <div class="row justify-content-between our-team-details">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 mb-6 mb-xl-0 ">
            <div class="image-area mb-40 mr-50">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12">
            <div class="team-info-wrapp mb-40">
                        
                <h2 class="heading "><?php the_title(); ?></h2>
                <?php if($designation) : ?>
                <span class="mb-40"><?php echo esc_html( $designation ); ?></span>
                <?php endif; ?>

                <div class="tp-team-infos">
                    <h4 class="team-details-info-title"><?php echo esc_html__( 'About Info:', 'synthai' ); ?></h4>
                    <div class="description mb-40">
                        <?php echo esc_html($short_desc); ?>
                    </div>

                    <?php if( !empty( $informations_field_values ) ) : ?>
                    <div class="description-informations mb-30">
                        <h4 class="team-details-info-title"><?php echo esc_html__( 'Details:', 'synthai' ); ?></h4>
                        <div class="description-informations-label-value">
                            <?php foreach ( $informations_field_values as $info_item ) : 
                                $info_label = $info_item['information_title'];
                                $info_value = $info_item['information_value'];
                            ?>
                            <span class="d-block"><span><?php echo esc_html( $info_label ); ?></span> <strong><?php echo esc_html( $info_value ); ?></strong></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="social-follows">
                        <label><?php echo esc_html__( 'Follow Us:', 'synthai' ); ?></label>
                        <div class="social-follows-icons">
                            <a href="<?php echo esc_url( $facebook ); ?>" aria-label="Facebook">
                                <i class="tp tp-facebook-f"></i>
                            </a>
                            <a href="<?php echo esc_url( $twitter ); ?>" aria-label="Twitter">
                                <i class="tp tp-twitter"></i>
                            </a>
                            <a href="<?php echo esc_url( $instagram ); ?>" aria-label="Instagram">
                                <i class="tp tp-instagram"></i>
                            </a>
                            <a href="<?php echo esc_url( $linkedin ); ?>" aria-label="dribbble">
                                <i class="tp tp-linkedin-in"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>


    <?php endwhile; ?>

    <?php the_content();?>
<!-- Single Team End -->
</div>




<?php
get_footer();