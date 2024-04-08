<?php
/**
 * NGO Organization: Customizer
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * 
 */
function ngo_organization_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'NGO_Organization_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'NGO_Organization_Control_Sortable' );


	//add home page setting pannel
	$wp_customize->add_panel( 'ngo_organization_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'ngo-organization' ),
	    'description' => __( 'Description of what this panel does.', 'ngo-organization' ),
	) );

	//Tp Genral Option
	$wp_customize->add_section('ngo_organization_tp_general_settings',array(
		'title' => __('TP General Option', 'ngo-organization'),
		'priority' => 1,
		'panel' => 'ngo_organization_panel_id'
	) );
    $wp_customize->add_setting('ngo_organization_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
    $wp_customize->add_control('ngo_organization_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'ngo-organization'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'ngo-organization'),
        'section' => 'ngo_organization_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','ngo-organization'),
            'Container' => __('Container','ngo-organization'),
            'Container Fluid' => __('Container Fluid','ngo-organization')
        ),
	) );
    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('ngo_organization_sidebar_post_layout',array(
      'default' => 'right',
      'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
	$wp_customize->add_control('ngo_organization_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'ngo-organization'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'ngo-organization'),
        'section' => 'ngo_organization_tp_general_settings',
        'choices' => array(
            'full' => __('Full','ngo-organization'),
            'left' => __('Left','ngo-organization'),
            'right' => __('Right','ngo-organization'),
            'three-column' => __('Three Columns','ngo-organization'),
            'four-column' => __('Four Columns','ngo-organization'),
            'grid' => __('Grid Layout','ngo-organization')
        ),
	) );
	// Add Settings and Controls for Post Sidebar Layout
	$wp_customize->add_setting('ngo_organization_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
	$wp_customize->add_control('ngo_organization_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'ngo-organization'),
        'description'   => __('This option work for single blog page', 'ngo-organization'),
        'section' => 'ngo_organization_tp_general_settings',
        'choices' => array(
            'full' => __('Full','ngo-organization'),
            'left' => __('Left','ngo-organization'),
            'right' => __('Right','ngo-organization'),
        ),
	) );
	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('ngo_organization_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
	$wp_customize->add_control('ngo_organization_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'ngo-organization'),
        'description'   => __('This option work for pages.', 'ngo-organization'),
        'section' => 'ngo_organization_tp_general_settings',
        'choices' => array(
            'full' => __('Full','ngo-organization'),
            'left' => __('Left','ngo-organization'),
            'right' => __('Right','ngo-organization')
        ),
	) );
	$wp_customize->add_setting( 'ngo_organization_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Option', 'ngo-organization' ),
		'section'     => 'ngo_organization_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_sticky',
	) ) );

  	//TP Preloader Option
	$wp_customize->add_section('ngo_organization_prealoader_option',array(
		'title' => __('TP Preloader Option', 'ngo-organization'),
		'panel' => 'ngo_organization_panel_id',
		'priority' => 1,
 	) );
	$wp_customize->add_setting( 'ngo_organization_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'ngo-organization' ),
		'section'     => 'ngo_organization_prealoader_option',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_preloader_show_hide',
	) ) );
  	$wp_customize->add_setting( 'ngo_organization_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ngo_organization_tp_preloader_color1_option', array(
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'ngo-organization'),
	    'section' => 'ngo_organization_prealoader_option',
	    'settings' => 'ngo_organization_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'ngo_organization_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ngo_organization_tp_preloader_color2_option', array(
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'ngo-organization'),
	    'section' => 'ngo_organization_prealoader_option',
	    'settings' => 'ngo_organization_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'ngo_organization_tp_preloader_bg_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ngo_organization_tp_preloader_bg_option', array(
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'ngo-organization'),
	    'section' => 'ngo_organization_prealoader_option',
	    'settings' => 'ngo_organization_tp_preloader_bg_option',
  	)));


	//TP Color Option
	$wp_customize->add_section('ngo_organization_color_option',array(
     'title'         => __('TP Color Option', 'ngo-organization'),
     'priority' => 1,
     'panel' => 'ngo_organization_panel_id'
    ) );
	$wp_customize->add_setting( 'ngo_organization_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ngo_organization_tp_color_option', array(
	    'description' => __('It will change the complete theme color 1 in one click.', 'ngo-organization'),
	    'section' => 'ngo_organization_color_option',
	    'settings' => 'ngo_organization_tp_color_option',
  	)));
  	$wp_customize->add_setting( 'ngo_organization_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ngo_organization_tp_color_option_link', array(
	    'description' => __('It will change the complete  theme hover primary  color link in one click.', 'ngo-organization'),
	    'section' => 'ngo_organization_color_option',
	    'settings' => 'ngo_organization_tp_color_option_link',
  	)));

	//TP Blog Option
	$wp_customize->add_section('ngo_organization_blog_option',array(
		'title' => __('TP Blog Option', 'ngo-organization'),
		'priority' => 1,
		'panel' => 'ngo_organization_panel_id'
	) );

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category'),
        'sanitize_callback' => 'ngo_organization_sanitize_sortable',
    ));
    $wp_customize->add_control(new NGO_Organization_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'ngo-organization'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'ngo-organization') ,
        'section' => 'ngo_organization_blog_option',
        'choices' => array(
            'date' => __('date', 'ngo-organization') ,
            'author' => __('author', 'ngo-organization') ,
            'comment' => __('comment', 'ngo-organization') ,
            'category' => __('category', 'ngo-organization') ,
        ) ,
    )));
	$wp_customize->add_setting( 'ngo_organization_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ngo_organization_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'ngo_organization_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','ngo-organization' ),
		'section'     => 'ngo_organization_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
    $wp_customize->selective_refresh->add_partial( 'ngo_organization_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'ngo_organization_customize_partial_ngo_organization_remove_read_button',
	));
    $wp_customize->add_setting('ngo_organization_read_more_text',array(
		'default'=> __('Read More','ngo-organization'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_organization_read_more_text',array(
		'label'	=> __('Edit Button Text','ngo-organization'),
		'section'=> 'ngo_organization_blog_option',
		'type'=> 'text'
	));
    $wp_customize->add_setting( 'ngo_organization_remove_read_button', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_remove_read_button', array(
	 'label'       => esc_html__( 'Show / Hide Read More Button', 'ngo-organization' ),
	 'section'     => 'ngo_organization_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'ngo_organization_remove_read_button',
    ) ) );
	$wp_customize->add_setting( 'ngo_organization_remove_tags', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
    ) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'ngo-organization' ),
		'section'     => 'ngo_organization_blog_option',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'ngo_organization_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'ngo_organization_customize_partial_ngo_organization_remove_tags',
	));
	$wp_customize->add_setting( 'ngo_organization_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'ngo-organization' ),
		'section'     => 'ngo_organization_blog_option',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'ngo_organization_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'ngo_organization_customize_partial_ngo_organization_remove_category',
	));
	$wp_customize->add_setting( 'ngo_organization_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'ngo-organization' ),
	 'section'     => 'ngo_organization_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'ngo_organization_remove_comment',
	) ) );

	$wp_customize->add_setting( 'ngo_organization_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'ngo-organization' ),
	 'section'     => 'ngo_organization_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'ngo_organization_remove_related_post',
	) ) );

	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'ngo_organization_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'ngo-organization' ),
    	'priority' => 2,
		'panel' => 'ngo_organization_panel_id'
	) );
	$wp_customize->add_setting('ngo_organization_menu_text_tranform',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'ngo_organization_sanitize_choices'
 	));
 	$wp_customize->add_control('ngo_organization_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','ngo-organization'),
		'section' => 'ngo_organization_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','ngo-organization'),
		   'Lowercase' => __('Lowercase','ngo-organization'),
		   'Capitalize' => __('Capitalize','ngo-organization'),
		),
	) );
	$wp_customize->add_setting('ngo_organization_menu_font_size', array(
	  'default' => 15,
      'sanitize_callback' => 'ngo_organization_sanitize_number_range',
	));
	$wp_customize->add_control(new NGO_Organization_Range_Slider($wp_customize, 'ngo_organization_menu_font_size', array(
      'section' => 'ngo_organization_menu_typography',
      'label' => esc_html__('Font Size', 'ngo-organization'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	// Top Bar
	$wp_customize->add_section( 'ngo_organization_topbar', array(
    	'title'      => __( 'Contact Details', 'ngo-organization' ),
    	'description' => __( 'Add your contact details', 'ngo-organization' ),
    	'priority' => 2,
		'panel' => 'ngo_organization_panel_id'
	) );
	$wp_customize->add_setting('ngo_organization_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'ngo_organization_sanitize_phone_number'
	));
	$wp_customize->add_control('ngo_organization_phone_number',array(
		'label'	=> __('Add Phone Number','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'ngo_organization_phone_number', array(
		'selector' => '.top-header span',
		'render_callback' => 'ngo_organization_customize_partial_ngo_organization_phone_number',
	) );
	$wp_customize->add_setting('ngo_organization_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_phone_icon',array(
		'label'	=> __('Phone Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_organization_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('ngo_organization_email_address',array(
		'label'	=> __('Add Mail Address','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('ngo_organization_mail_icon',array(
		'default'	=> 'far fa-envelope',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_mail_icon',array(
		'label'	=> __('Mail Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_organization_register_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_organization_register_button',array(
		'label'	=> __('Add Register Text','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('ngo_organization_register_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_register_button_link',array(
		'label'	=> __('Add Register URL','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_login_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_organization_login_button',array(
		'label'	=> __('Add Login Text','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('ngo_organization_login_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_login_button_link',array(
		'label'	=> __('Add Login URL','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_login_icon',array(
		'default'	=> 'fas fa-lock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_login_icon',array(
		'label'	=> __('Login Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_organization_donate_button_1',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_organization_donate_button_1',array(
		'label'	=> __('Add Donate 1 Text','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('ngo_organization_donate_button_1_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_donate_button_1_link',array(
		'label'	=> __('Add Donate 1 URL','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_donate_button_2',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_organization_donate_button_2',array(
		'label'	=> __('Add Donate 2 Text','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('ngo_organization_donate_button_2_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_donate_button_2_link',array(
		'label'	=> __('Add Donate 2 URL','ngo-organization'),
		'section'=> 'ngo_organization_topbar',
		'type'=> 'url'
	));

	// Social Media
	$wp_customize->add_section( 'ngo_organization_social_media', array(
    	'title'      => __( 'Social Media Links', 'ngo-organization' ),
    	'description' => __( 'Add your Social Links', 'ngo-organization' ),
    	'priority' => 2,
		'panel' => 'ngo_organization_panel_id'
	) );
	$wp_customize->add_setting( 'ngo_organization_facebook_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_facebook_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ngo-organization' ),
		'section'     => 'ngo_organization_social_media',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_facebook_new_tab',
	) ) );
	$wp_customize->add_setting('ngo_organization_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_facebook_url',array(
		'label'	=> __('Facebook Link','ngo-organization'),
		'section'=> 'ngo_organization_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_facebook_icon',array(
		'label'	=> __('Facebook Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'ngo_organization_facebook_url', array(
		'selector' => '.media-links a',
		'render_callback' => 'ngo_organization_customize_partial_ngo_organization_facebook_url',
	) );
	$wp_customize->add_setting( 'ngo_organization_twitter_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_twitter_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ngo-organization' ),
		'section'     => 'ngo_organization_social_media',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_twitter_new_tab',
	) ) );
	$wp_customize->add_setting('ngo_organization_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_twitter_url',array(
		'label'	=> __('Twitter Link','ngo-organization'),
		'section'=> 'ngo_organization_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_twitter_icon',array(
		'label'	=> __('Twitter Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'ngo_organization_instagram_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_instagram_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ngo-organization' ),
		'section'     => 'ngo_organization_social_media',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_instagram_new_tab',
	) ) );
	$wp_customize->add_setting('ngo_organization_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_instagram_url',array(
		'label'	=> __('Instagram Link','ngo-organization'),
		'section'=> 'ngo_organization_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_instagram_icon',array(
		'label'	=> __('Instagram Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'ngo_organization_youtube_new_tab', array(
	  'default'           => true,
	  'transport'         => 'refresh',
	  'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_youtube_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ngo-organization' ),
		'section'     => 'ngo_organization_social_media',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_youtube_new_tab',
	) ) );
	$wp_customize->add_setting('ngo_organization_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_youtube_url',array(
		'label'	=> __('YouTube Link','ngo-organization'),
		'section'=> 'ngo_organization_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_youtube_icon',array(
		'label'	=> __('YouTube Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'ngo_organization_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ngo-organization' ),
		'section'     => 'ngo_organization_social_media',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_pint_new_tab',
	) ) );
	$wp_customize->add_setting('ngo_organization_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ngo_organization_pint_url',array(
		'label'	=> __('Pinterest Link','ngo-organization'),
		'section'=> 'ngo_organization_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ngo_organization_pint_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_pint_icon',array(
		'label'	=> __('Pinterest Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('ngo_organization_social_icon_fontsize',array(
		'default'=> '14',
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','ngo-organization'),
		'type'=> 'number',
		'section'=> 'ngo_organization_social_media',
		'input_attrs' => array(
      'step' => 1,
			'min'  => 0,
			'max'  => 30,
        ),
	));

	//HOME slider
	$wp_customize->add_section( 'ngo_organization_slider_section' , array(
    	'title'      => __( 'Slider Section', 'ngo-organization' ),
    	'priority' => 3,
		'panel' => 'ngo_organization_panel_id'
	) );
    $wp_customize->add_setting( 'ngo_organization_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Slider', 'ngo-organization' ),
		'section'     => 'ngo_organization_slider_section',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_slider_arrows',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'ngo_organization_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'ngo_organization_customize_partial_ngo_organization_slider_arrows',
	) );
	for ( $ngo_organization_count = 1; $ngo_organization_count <= 4; $ngo_organization_count++ ) {

		$wp_customize->add_setting( 'ngo_organization_slider_page' . $ngo_organization_count, array(
			'default'           => '',
			'sanitize_callback' => 'ngo_organization_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'ngo_organization_slider_page' . $ngo_organization_count, array(
			'label'    => __( 'Select Slide Image Page', 'ngo-organization' ),
			'section'  => 'ngo_organization_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'ngo_organization_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'ngo-organization' ),
		'section'     => 'ngo_organization_slider_section',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_slider_button',
	) ) );
	$wp_customize->add_setting('ngo_organization_slider_content_layout',array(
        'default' => 'CENTER-ALIGN',
        'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
	$wp_customize->add_control('ngo_organization_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'ngo-organization'),
        'section' => 'ngo_organization_slider_section',
        'choices' => array(
            'CENTER-ALIGN' => __('CENTER-ALIGN','ngo-organization'),
            'LEFT-ALIGN' => __('LEFT-ALIGN','ngo-organization'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','ngo-organization'),
        ),
	) );

	//OUR FUNDS
	$wp_customize->add_section( 'ngo_organization_our_fund_section' , array(
    	'title'      => __( 'Our Funds Section', 'ngo-organization' ),
    	'priority' => 3,
		'panel' => 'ngo_organization_panel_id'
	) );
    $wp_customize->add_setting( 'ngo_organization_our_fund_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_our_fund_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Our Funds Section', 'ngo-organization' ),
		'section'     => 'ngo_organization_our_fund_section',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_our_fund_show_hide',
	) ) );
	$ngo_organization_categories = get_categories();
	$cats = array();
	$i = 0;
	$ngo_organization_offer_cat[]= 'select';
	foreach($ngo_organization_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$ngo_organization_offer_cat[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('ngo_organization_our_fund_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'ngo_organization_sanitize_choices',
	));
	$wp_customize->add_control('ngo_organization_our_fund_section_category',array(
		'type'    => 'select',
		'choices' => $ngo_organization_offer_cat,
		'label' => __('Select Category','ngo-organization'),
		'section' => 'ngo_organization_our_fund_section',
	));

	//Footer
	$wp_customize->add_section('ngo_organization_footer_section',array(
		'title'	=> __('Footer Text','ngo-organization'),
		'description'	=> __('Add copyright text.','ngo-organization'),
		'panel' => 'ngo_organization_panel_id',
		'priority' => 4,
	));
	$wp_customize->add_setting('ngo_organization_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ngo_organization_footer_text',array(
		'label'	=> __('Copyright Text','ngo-organization'),
		'section'	=> 'ngo_organization_footer_section',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('ngo_organization_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_footer_columns',array(
		'label'	=> __('Footer Widget Columns','ngo-organization'),
		'section'	=> 'ngo_organization_footer_section',
		'setting'	=> 'ngo_organization_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'ngo_organization_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ngo_organization_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'ngo-organization'),
			'description' => __('It will change the complete footer widget backgorund color.', 'ngo-organization'),
			'section' => 'ngo_organization_footer_section',
			'settings' => 'ngo_organization_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('ngo_organization_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'ngo_organization_footer_widget_image',array(
      'label' => __('Footer Widget Background Image','ngo-organization'),
    '  section' => 'ngo_organization_footer_section'
	)));
	$wp_customize->add_setting( 'ngo_organization_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to Header', 'ngo-organization' ),
		'section'     => 'ngo_organization_footer_section',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_return_to_header',
	) ) );
	$wp_customize->add_setting('ngo_organization_scroll_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new NGO_Organization_Icon_Changer(
        $wp_customize,'ngo_organization_scroll_top_icon',array(
		'label'	=> __('Phone Icon','ngo-organization'),
		'transport' => 'refresh',
		'section'	=> 'ngo_organization_footer_section',
		'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('ngo_organization_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
	$wp_customize->add_control('ngo_organization_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'ngo-organization'),
        'description'   => __('This option work for scroll to top', 'ngo-organization'),
        'section' => 'ngo_organization_footer_section',
        'choices' => array(
            'Right' => __('Right','ngo-organization'),
            'Left' => __('Left','ngo-organization'),
            'Center' => __('Center','ngo-organization')
        ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'ngo_organization_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'ngo_organization_customize_partial_blogdescription',
	) );
    $wp_customize->add_setting( 'ngo_organization_site_title_text', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'ngo-organization' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_site_title_text',
	) ) );

	//Mobile Seetings
	$wp_customize->add_section('ngo_organization_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'ngo-organization'),
		'priority' => 5,
		'panel' => 'ngo_organization_panel_id'
	) );
	$wp_customize->add_setting( 'ngo_organization_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'ngo-organization' ),
		'section'     => 'ngo_organization_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'ngo_organization_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'ngo-organization' ),
		'section'     => 'ngo_organization_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_slider_buttom_mob',
	) ) );

	// SITE IDENTITY logo site title size
	$wp_customize->add_setting('ngo_organization_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','ngo-organization'),
		'section'	=> 'title_tagline',
		'setting'	=> 'ngo_organization_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	));
    $wp_customize->add_setting( 'ngo_organization_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Tagline', 'ngo-organization' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_site_tagline_text',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('ngo_organization_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','ngo-organization'),
		'section'	=> 'title_tagline',
		'setting'	=> 'ngo_organization_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
    $wp_customize->add_setting('ngo_organization_logo_width',array(
		'default' => 100,
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','ngo-organization'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
	$wp_customize->add_setting('ngo_organization_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'ngo_organization_sanitize_choices'
	));
    $wp_customize->add_control('ngo_organization_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'ngo-organization'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'ngo-organization'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','ngo-organization'),
            'Same Line' => __('Same Line','ngo-organization')
        ),
	) );

	//WooCommerce
	$wp_customize->add_setting('ngo_organization_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_per_columns',array(
		'label'	=> __('Product Per Row','ngo-organization'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('ngo_organization_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'ngo_organization_sanitize_number_absint'
	));
	$wp_customize->add_control('ngo_organization_product_per_page',array(
		'label'	=> __('Product Per Page','ngo-organization'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
    $wp_customize->add_setting( 'ngo_organization_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'ngo-organization' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'ngo_organization_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_single_product_sidebar', array(
	 	'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'ngo-organization' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'ngo_organization_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ngo_organization_sanitize_checkbox',
	) );
	$wp_customize->add_control( new NGO_Organization_Toggle_Control( $wp_customize, 'ngo_organization_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'ngo-organization' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'ngo_organization_related_product',
	) ) );
}
add_action( 'customize_register', 'ngo_organization_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since NGO Organization 1.0
 * @see ngo_organization_customize_register()
 *
 * @return void
 */
function ngo_organization_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since NGO Organization 1.0
 * @see ngo_organization_customize_register()
 *
 * @return void
 */
function ngo_organization_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'NGO_ORGANIZATION_PRO_THEME_NAME' ) ) {
	define( 'NGO_ORGANIZATION_PRO_THEME_NAME', esc_html__( 'NGO Organization Pro ', 'ngo-organization' ));
}
if ( ! defined( 'NGO_ORGANIZATION_PRO_THEME_URL' ) ) {
	define( 'NGO_ORGANIZATION_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/ngo-organization-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class NGO_Organization_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'NGO_Organization_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new NGO_Organization_Customize_Section_Pro(
				$manager,
				'ngo_organization_section_pro',
				array(
					'priority'   => 9,
					'title'    => NGO_ORGANIZATION_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'ngo-organization' ),
					'pro_url'  => esc_url( NGO_ORGANIZATION_PRO_THEME_URL, 'ngo-organization' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new NGO_Organization_Customize_Section_Pro(
				$manager,
				'ngo_organization_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'ngo-organization' ),
					'pro_text' => esc_html__( 'Click Here', 'ngo-organization' ),
					'pro_url'  => esc_url( NGO_ORGANIZATION_DOCS_URL, 'ngo-organization'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ngo-organization-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ngo-organization-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
NGO_Organization_Customize::get_instance();
