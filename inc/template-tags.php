<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ngo_organization_categorized_blog() {
	$ngo_organization_category_count = get_transient( 'ngo_organization_categories' );

	if ( false === $ngo_organization_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$ngo_organization_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$ngo_organization_category_count = count( $ngo_organization_categories );

		set_transient( 'ngo_organization_categories', $ngo_organization_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $ngo_organization_category_count > 1;
}

if ( ! function_exists( 'ngo_organization_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since NGO Organization
 */
function ngo_organization_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in ngo_organization_categorized_blog.
 */
function ngo_organization_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ngo_organization_categories' );
}
add_action( 'edit_category', 'ngo_organization_category_transient_flusher' );
add_action( 'save_post',     'ngo_organization_category_transient_flusher' );
