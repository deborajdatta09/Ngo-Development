<?php
/*
* Display Logo and contact details
*/
?>

<?php
$ngo_organization_sticky = get_theme_mod('ngo_organization_sticky');
    $ngo_organization_data_sticky = "false";
    if ($ngo_organization_sticky) {
    $ngo_organization_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="top-header py-2  pt-md-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 align-self-md-center">
        <?php $ngo_organization_logo_settings = get_theme_mod( 'ngo_organization_logo_settings','Different Line');
        if($ngo_organization_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) ngo_organization_the_custom_logo(); ?>
            <?php if( get_theme_mod('ngo_organization_site_title_text',true) == 1){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $ngo_organization_description = get_bloginfo( 'description', 'display' );
            if ( $ngo_organization_description || is_customize_preview() ) : ?>
              <?php if(get_theme_mod('ngo_organization_site_tagline_text',false)){ ?>
                <p class="site-description mb-0"><?php echo esc_html($ngo_organization_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($ngo_organization_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-md-center">
                <?php if( has_custom_logo() ) ngo_organization_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-md-center">
                <?php if( get_theme_mod('ngo_organization_site_title_text',true) == 1){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $ngo_organization_description = get_bloginfo( 'description', 'display' );
                if ( $ngo_organization_description || is_customize_preview() ) : ?>
                   <?php if(get_theme_mod('ngo_organization_site_tagline_text',false)){ ?>
                    <p class="site-description mb-0"><?php echo esc_html($ngo_organization_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-9 col-md-12 col-12 text-center text-md-right">
        <div class="topbar py-3">
            <div class="row">
              <div class="col-lg-8 col-md-6 text-lg-left text-center">
                <?php if( get_theme_mod( 'ngo_organization_phone_number' ) != '') { ?>
                <span class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_phone_icon','fas fa-phone')); ?> mr-2"></i><?php echo esc_html( get_theme_mod('ngo_organization_phone_number','')); ?></span>
              <?php } ?>
              <?php if( get_theme_mod( 'ngo_organization_email_address' ) != '') { ?>
                <span class="mr-2"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_mail_icon','far fa-envelope')); ?> mr-2"></i><?php echo esc_html( get_theme_mod('ngo_organization_email_address','')); ?></span>
              <?php } ?>
              </div>
              <div class="col-lg-4 col-md-6 text-center text-lg-right log-btn">
                <?php if( get_theme_mod( 'ngo_organization_register_button_link' ) != '' || get_theme_mod( 'ngo_organization_register_button' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ngo_organization_register_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'ngo_organization_register_button','' ) ); ?></a>
              <?php } ?>
              <?php if( get_theme_mod( 'ngo_organization_login_button_link' ) != '' || get_theme_mod( 'ngo_organization_login_button' ) != '') { ?>
                <a href="<?php echo esc_url( get_theme_mod( 'ngo_organization_login_button_link','' ) ); ?>" class="login-btn"><i class="<?php echo esc_attr(get_theme_mod('ngo_organization_login_icon','fas fa-lock')); ?> mr-2"></i><?php echo esc_html( get_theme_mod( 'ngo_organization_login_button','' ) ); ?></a>
              <?php } ?>
              </div>
          </div>
        </div>
        <hr class="top-hr">
        <div class="header">
          <div class="row">
          <div class="col-lg-7 col-md-6 col-12 text-md-left align-self-center">
           <?php get_template_part( 'template-parts/navigation/site', 'nav' ); ?>
          </div>
          <div class="col-lg-5 col-md-6 col-12 align-self-center">
            <div class="header-btn">
              <?php if( get_theme_mod( 'ngo_organization_donate_button_1_link' ) != '' || get_theme_mod( 'ngo_organization_donate_button_1' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'ngo_organization_donate_button_1_link','' ) ); ?>" class="donate-btn-1"><?php echo esc_html( get_theme_mod( 'ngo_organization_donate_button_1','' ) ); ?></a>
          <?php } ?>
          <?php if( get_theme_mod( 'ngo_organization_donate_button_2_link' ) != '' || get_theme_mod( 'ngo_organization_donate_button_2' ) != '') { ?>
            <a href="<?php echo esc_url( get_theme_mod( 'ngo_organization_donate_button_2_link','' ) ); ?>" class="donate-btn-2"><?php echo esc_html( get_theme_mod( 'ngo_organization_donate_button_2','' ) ); ?></a>
          <?php } ?>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
