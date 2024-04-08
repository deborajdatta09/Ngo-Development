<?php
/**
 * Template part for displaying slider section
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

?>
<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'ngo_organization_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $ngo_organization_slide_pages = array();
      for ( $ngo_organization_count = 1; $ngo_organization_count <= 4; $ngo_organization_count++ ) {
        $ngo_organization_mod = intval( get_theme_mod( 'ngo_organization_slider_page' . $ngo_organization_count ));
        if ( 'page-none-selected' != $ngo_organization_mod ) {
          $ngo_organization_slide_pages[] = $ngo_organization_mod;
        }
      }
      if( !empty($ngo_organization_slide_pages) ) :
        $ngo_organization_args = array(
          'post_type' => 'page',
          'post__in' => $ngo_organization_slide_pages,
          'orderby' => 'post__in'
        );
        $ngo_organization_query = new WP_Query( $ngo_organization_args );
        if ( $ngo_organization_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $ngo_organization_query->have_posts() ) : $ngo_organization_query->the_post(); ?>
        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
          <?php if(has_post_thumbnail()){ ?>
               <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php }else {echo ('<img src="'.$static_image.'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
             <p><?php echo wp_trim_words( get_the_content(),18 );?></p>
              <?php if( get_theme_mod( 'ngo_organization_slider_button',true) != '' || get_theme_mod( 'ngo_organization_slider_buttom_mob',true) != '') { ?>
                <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('READ MORE','ngo-organization'); ?></a>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
  <div class="social-links">
      <span class="media-links">
        <?php                  
            $ngo_organization_facebook_new_tab = esc_attr(get_theme_mod('ngo_organization_facebook_new_tab','true'));
            $ngo_organization_twitter_new_tab = esc_attr(get_theme_mod('ngo_organization_twitter_new_tab','true'));
            $ngo_organization_instagram_new_tab = esc_attr(get_theme_mod('ngo_organization_instagram_new_tab','true'));
            $ngo_organization_youtube_new_tab = esc_attr(get_theme_mod('ngo_organization_youtube_new_tab','true'));
            $ngo_organization_pint_new_tab = esc_attr(get_theme_mod('ngo_organization_pint_new_tab','true'));
            ?>
           <?php if( get_theme_mod( 'ngo_organization_facebook_url' ) != '') { ?>
              <a <?php if($ngo_organization_facebook_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'ngo_organization_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_facebook_icon','fab fa-facebook-f')); ?> 
                mr-2"></i></a>
            <?php } ?>
          <?php if( get_theme_mod( 'ngo_organization_twitter_url' ) != '') { ?>
            <a <?php if($ngo_organization_twitter_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'ngo_organization_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_twitter_icon','fab fa-twitter')); ?> mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'ngo_organization_instagram_url' ) != '') { ?>
            <a <?php if($ngo_organization_instagram_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'ngo_organization_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_instagram_icon','fab fa-instagram')); ?> mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'ngo_organization_youtube_url' ) != '') { ?>
            <a <?php if($ngo_organization_youtube_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'ngo_organization_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_youtube_icon','fab fa-youtube')); ?> mr-2"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'ngo_organization_pint_url' ) != '') { ?>
            <a <?php if($ngo_organization_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'ngo_organization_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_pint_icon','fab fa-pinterest')); ?> mr-2"></i></a>
          <?php } ?>
        </span>
    </div>
</section>

<?php } ?>
