<?php
/**
 * NGO Organization functions and definitions
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

function ngo_organization_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'ngo-organization-featured-image', 2000, 1200, true );
	add_image_size( 'ngo-organization-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'ngo-organization' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', ngo_organization_fonts_url() ) );
}
add_action( 'after_setup_theme', 'ngo_organization_setup' );

/**
 * Register custom fonts.
 */
function ngo_organization_fonts_url(){
	$ngo_organization_font_url = '';
	$ngo_organization_font_family = array();
	$ngo_organization_font_family[] = 'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$ngo_organization_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$ngo_organization_font_family[] = 'Manrope:wght@200;300;400;500;600;700;800';
	$ngo_organization_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';

	$ngo_organization_query_args = array(
		'family'	=> rawurlencode(implode('|',$ngo_organization_font_family)),
	);
	$ngo_organization_font_url = add_query_arg($ngo_organization_query_args,'//fonts.googleapis.com/css');
	return $ngo_organization_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $ngo_organization_font_url ) );
}

/**
 * Register widget area.
 */
function ngo_organization_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'ngo-organization' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'ngo-organization' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'ngo-organization' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ngo-organization' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ngo-organization' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ngo-organization' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ngo-organization' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'ngo-organization' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'ngo_organization_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ngo_organization_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ngo-organization-fonts', ngo_organization_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'ngo-organization-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'ngo-organization-style',$ngo_organization_tp_theme_css );
	wp_enqueue_style( 'ngo-organization-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'ngo-organization-style',$ngo_organization_tp_theme_css );
    wp_style_add_data('ngo-organization-style', 'rtl', 'replace');
	// owl-carousel
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Theme block stylesheet.
	wp_enqueue_style( 'ngo-organization-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'ngo-organization-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );
	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );
	wp_enqueue_script( 'ngo-organization-custom-scripts', get_template_directory_uri() . '/assets/js/ngo-organization-custom.js', array('jquery'), true);

	wp_enqueue_script( 'ngo-organization-focus-nav', get_template_directory_uri() . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ngo_organization_scripts' );

//Admin Enqueue for Admin
function ngo_organization_admin_enqueue_scripts(){
	wp_enqueue_style('ngo-organization-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'ngo-organization-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/custom.js', array('jquery'), true);
	wp_enqueue_script( 'ngo-organization-admin-script', get_template_directory_uri() . '/assets/js/ngo-organization-admin.js', array( 'jquery' ), '', true );

    wp_localize_script( 'ngo-organization-admin-script', 'ngo_organization_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'ngo_organization_admin_enqueue_scripts' );

/*radio button sanitization*/
function ngo_organization_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Sanitize Sortable control.
function ngo_organization_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

// Category count 
function display_post_category_count() {
    $category = get_the_category();
    $category_count = ($category) ? count($category) : 0;
    $category_text = ($category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $category_count . ' ' . $category_text;
}

//Post Tag Function
function custom_tags_filter($tag_list) {
    // Replace the comma (,) with an empty string
    $tag_list = str_replace(', ', '', $tag_list);

    return $tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $tags = get_the_tags();

    if ($tags) {
        $tags_output = '<div class="post_tag">Tags: ';

        $first_tag = reset($tags);

        foreach ($tags as $tag) {
            $tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $first_tag) {
                $tags_output .= ' ';
            }
        }

        $tags_output .= '</div>';

        echo $tags_output;
    }
}
function ngo_organization_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'ngo_organization_loop_columns');
if (!function_exists('ngo_organization_loop_columns')) {
	function ngo_organization_loop_columns() {
		$columns = get_theme_mod( 'ngo_organization_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'ngo_organization_per_page', 20 );
function ngo_organization_per_page( $cols ) {
  	$cols = get_theme_mod( 'ngo_organization_product_per_page', 9 );
	return $cols;
}

function ngo_organization_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function ngo_organization_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function ngo_organization_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function ngo_organization_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function ngo_organization_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','ngo_organization_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Load Custom Toggle
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );
/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );

/**
 * Logo Custamization.
 */

define('NGO_ORGANIZATION_CREDIT',__('https://www.themespride.com/themes/free-ngo-wordpress-theme/','ngo-organization') );
if ( ! function_exists( 'ngo_organization_credit' ) ) {
	function ngo_organization_credit(){
		echo "<a href=".esc_url(NGO_ORGANIZATION_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('ngo_organization_footer_text',__('NGO Organization WordPress Theme','ngo-organization')))."</a>";
	}
}


add_action( 'wp_ajax_ngo_organization_dismissed_notice_handler', 'ngo_organization_ajax_notice_handler' );

function ngo_organization_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function ngo_organization_activation_notice() { 

    if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="ngo-organization-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="ngo-organization-getting-started-notice clearfix">
            <div class="ngo-organization-theme-notice-content">
                <h2 class="ngo-organization-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'ngo-organization' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'ngo-organization')) ?></p>

                <a class="ngo-organization-btn-get-started button button-primary button-hero ngo-organization-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=ngo-organization-about' )); ?>" ><?php esc_html_e( 'Get started', 'ngo-organization' ) ?></a><span class="ngo-organization-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

}

add_action( 'admin_notices', 'ngo_organization_activation_notice' );

add_action('after_switch_theme', 'ngo_organization_setup_options');
function ngo_organization_setup_options () {
    update_option('dismissed-get_started', FALSE );
}


function ngo_organization_logo_width(){

	$ngo_organization_logo_width   = get_theme_mod( 'ngo_organization_logo_width', 200 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $ngo_organization_logo_width ); ?>px;
		    max-width: 200%;
	}
	<?php echo "</style>";
}

add_action( 'wp_head', 'ngo_organization_logo_width' );

// offer Meta
function ngo_organization_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Donation Funding Meta Feilds', 'ngo-organization' ), 'ngo_organization_meta_callback_our_funds', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'ngo_organization_bn_custom_meta_offer');
}

function ngo_organization_meta_callback_our_funds( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'ngo_organization_our_funds_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $ngo_organization_goal_amount = get_post_meta( $post->ID, 'ngo_organization_goal_amount', true );
    $ngo_organization_raise_amount = get_post_meta( $post->ID, 'ngo_organization_raise_amount', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Goal Amount', 'ngo-organization' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="ngo_organization_goal_amount" id="ngo_organization_goal_amount" value="<?php echo esc_attr($ngo_organization_goal_amount); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Raise Amount', 'ngo-organization' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="ngo_organization_raise_amount" id="ngo_organization_raise_amount" value="<?php echo esc_attr($ngo_organization_raise_amount); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function ngo_organization_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['ngo_organization_our_funds_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['ngo_organization_our_funds_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save Goal Amount
    if( isset( $_POST[ 'ngo_organization_goal_amount' ] ) ) {
        update_post_meta( $post_id, 'ngo_organization_goal_amount', strip_tags( wp_unslash( $_POST[ 'ngo_organization_goal_amount' ]) ) );
    }
    // Save Raise amount
    if( isset( $_POST[ 'ngo_organization_raise_amount' ] ) ) {
        update_post_meta( $post_id, 'ngo_organization_raise_amount', strip_tags( wp_unslash( $_POST[ 'ngo_organization_raise_amount' ]) ) );
    }
}
add_action( 'save_post', 'ngo_organization_bn_metadesig_save' );
