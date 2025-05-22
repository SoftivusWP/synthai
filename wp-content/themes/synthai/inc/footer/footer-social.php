   <?php
/*
     Footer Social
*/
     global $synthai_option;
?>

<ul class="footer_social">  
      <?php
       if(!empty($synthai_option['facebook'])) { ?>
       <li> 
            <a href="<?php echo esc_url($synthai_option['facebook'])?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a> 
       </li>
      <?php } ?>
      <?php if(!empty($synthai_option['twitter'])) { ?>
      <li> 
            <a href="<?php echo esc_url($synthai_option['twitter']);?> " target="_blank"><span><i class="fa fa-twitter"></i></span></a> 
      </li>
      <?php } ?>
      <?php if(!empty($synthai_option['rss'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['rss']);?> " target="_blank"><span><i class="fa fa-rss"></i></span></a> 
      </li>
      <?php } ?>
      <?php if (!empty($synthai_option['pinterest'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['pinterest']);?> " target="_blank"><span><i class="fa fa-pinterest-p"></i></span></a> 
      </li>
      <?php } ?>
      <?php if (!empty($synthai_option['linkedin'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['linkedin']);?> " target="_blank"><span><i class="fa fa-linkedin"></i></span></a> 
      </li>
      <?php } ?>
      <?php if (!empty($synthai_option['google'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['google']);?> " target="_blank"><span><i class="fa fa-google-plus-square"></i></span></a> 
      </li>
      <?php } ?>
      <?php if (!empty($synthai_option['instagram'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['instagram']);?> " target="_blank"><span><i class="fa fa-instagram"></i></span></a> 
      </li>
      <?php } ?>
      <?php if(!empty($synthai_option['vimeo'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['vimeo'])?> " target="_blank"><span><i class="fa fa-vimeo"></i></span></a> 
      </li>
      <?php } ?>
      <?php if (!empty($synthai_option['tumblr'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['tumblr'])?> " target="_blank"><span><i class="fa fa-tumblr"></i></span></a> 
      </li>
      <?php } ?>
      <?php if (!empty($synthai_option['youtube'])) { ?>
      <li> 
            <a href="<?php  echo esc_url($synthai_option['youtube'])?> " target="_blank"><span><i class="fa fa-youtube"></i></span></a> 
      </li>
      <?php } ?>     
</ul>
