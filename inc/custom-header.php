<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

function ngo_organization_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'ngo_organization_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'  		     => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'ngo_organization_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'ngo_organization_custom_header_setup' );

if ( ! function_exists( 'ngo_organization_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'ngo_organization_header_style' );
function ngo_organization_header_style() {
	if ( get_header_image() ) :
	$ngo_organization_custom_css = "
        .top-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: cover !important;
		}";
	   	wp_add_inline_style( 'ngo-organization-style', $ngo_organization_custom_css );
	endif;
}
endif;
