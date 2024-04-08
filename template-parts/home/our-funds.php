<?php
/**
 * Template part for displaying Our Funds section
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */
?>
<?php if( get_theme_mod( 'ngo_organization_our_fund_show_hide') != '') { ?>
<div id="our-funds" class="py-lg-5 py-md-5">
  <div class="container">
    <div class="row mt-lg-5 mt-md-5">
      <?php
        $post_category = get_theme_mod('ngo_organization_our_fund_section_category');
        if($post_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'ngo-organization')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="fund-box mb-4">
                <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                <h6 class="mt-4"><?php the_category(); ?></h6>
                <h3 class="mb-0 mt-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <?php
                  $raised = esc_html(get_post_meta($post->ID,'ngo_organization_raise_amount',true));
                  if( get_post_meta($post->ID, 'ngo_organization_raise_amount', true) ) {
                    $raised_val = explode('$', $raised);
                    $ra = $raised_val[count($raised_val)-1];
                  }else{
                    $ra = 1;
                  }
                  $goal = esc_html(get_post_meta($post->ID,'ngo_organization_goal_amount',true));
                  if( get_post_meta($post->ID, 'ngo_organization_goal_amount', true) ) {
                    $goal_val = explode('$', $goal); 
                    $ga = $goal_val[count($goal_val)-1];
                  }else{
                    $ga = 1;
                  }
                  $percent = $ra/$ga*100;
               ?>
                <?php if( get_post_meta($post->ID, 'ngo_organization_raise_amount', true) && get_post_meta($post->ID, 'ngo_organization_goal_amount', true) ) {?>
                  <div class="progress my-4">
                    <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent ?>%;">
                    </div>
                  </div>
                <?php } ?>
                <?php if( get_post_meta($post->ID, 'ngo_organization_goal_amount', true) ) {?>
                  <span class="mr-2 goal-amt"><?php echo esc_html(get_post_meta($post->ID,'ngo_organization_goal_amount',true)); ?>   <?php esc_html_e('of','ngo-organization'); ?></span>
                <?php } ?>
                <?php if( get_post_meta($post->ID, 'ngo_organization_raise_amount', true) ) {?>
                  <span class="mr-2 raise-amt"><?php echo esc_html(get_post_meta($post->ID,'ngo_organization_raise_amount',true)); ?></span>
                <?php } ?>
                <?php if( get_post_meta($post->ID, 'ngo_organization_raise_amount', true) && get_post_meta($post->ID, 'ngo_organization_goal_amount', true) ) {?>
                  <span class="percent float-right"><?php echo $percent ?>%</span>
                <?php } ?>
                <div class="box-btn mt-4 text-center">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('DONATE NOW','ngo-organization'); ?></a>
                </div>
              </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</div>
<?php } ?>