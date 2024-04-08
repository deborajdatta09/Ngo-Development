<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

get_header(); ?>

<div class="container">
	<main id="tp_content" role="main">
		<div id="primary" class="content-area">
			<section class="error-404 not-found">
				<h1 class="page-title text-center pt-3"><?php esc_html_e( 'Oops! We are sorry! That page can&rsquo;t be found.', 'ngo-organization' ); ?></h1>
				<div class="page-content text-center">
					<p class="py-3"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'ngo-organization' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
	</main>
</div>

<?php get_footer();