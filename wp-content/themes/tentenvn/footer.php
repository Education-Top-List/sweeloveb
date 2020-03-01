

       <?php
        $args = array(
          'post_type' => 'page',
          'post__in' => array(285) //list of page_ids
        );
        $page_query = new WP_Query( $args );
        if( $page_query->have_posts() ) :
        //print any general title or any header here//
        while( $page_query->have_posts() ) : $page_query->the_post();
        echo '<div class="page-on-page" id="page_id-' . $post->ID . '">';
        echo the_content();
        echo '</div>';
        endwhile;
        else:
        //optional text here is no pages found//
        endif;
        wp_reset_postdata();
        ?>
<div class="scrolltop">
  <i class="fa fa-angle-up" aria-hidden="true"></i> 
</div>
  <ul class="social_ft">
      <?php if(get_option('footer_insta')){ ?>
        <li class="insta"><a href="<?php echo get_option('footer_insta'); ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/images/icon_insta.png"></i></a></li>
      <?php }?>
      <?php if(get_option('footer_fb')){ ?>
        <li class="fb"><a href="<?php echo get_option('footer_fb'); ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/images/icon_fb.png"></a></li>
      <?php }?>
      <?php if(get_option('footer_ytb')){ ?>
        <li class="ytb"><a href="<?php echo get_option('footer_ytb'); ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/images/icon_ytb.png"></a></li>
      <?php }?>
      <?php if(get_option('footer_shopee')){ ?>
        <li class="shopee"><a href="<?php echo get_option('footer_shopee'); ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/images/icon_shopee.png"></a></li>
      <?php }?>
       <?php if(get_option('footer_lazada')){ ?>
        <li class="lazada"><a href="<?php echo get_option('footer_lazada'); ?>" target="_blank"><img src="<?php echo BASE_URL; ?>/images/icon_lzd.png"></a></li>
      <?php }?>
    </ul>
<?php wp_footer(); ?>



<script src="<?php echo BASE_URL; ?>/js/wow.min.js"></script>
<script src="<?php echo BASE_URL; ?>/js/slick.js"></script>


</body>
</html>