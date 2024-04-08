<?php
/**
 * Template Name: Custom Home Page
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'ngo_organization_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'ngo_organization_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/our-funds' ); ?>
	<?php do_action( 'ngo_organization_after_our-funds' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'ngo_organization_after_home_content' ); ?>
</main>

<?php get_footer();
