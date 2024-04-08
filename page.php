<?php
/**
 * The template for displaying all pages
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

get_header(); ?>


	<main id="tp_content" role="main">
		<div class="container">
			<div id="primary" class="content-area">
				<?php $ngo_organization_sidebar_layout = get_theme_mod( 'ngo_organization_sidebar_page_layout','right');
			    if($ngo_organization_sidebar_layout == 'left'){ ?>
			        <div class="row">
			          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			          	<div class="col-md-8 col-sm-8 left-sidebar">
			           		<?php while ( have_posts() ) : the_post();

									the_content();

									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'ngo-organization' ),
										'after'  => '</div>',
									) );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								endwhile; // End of the loop.
							?>
			          	</div>
			        </div>
			        <div class="clearfix"></div>
			    <?php }else if($ngo_organization_sidebar_layout == 'right'){ ?>
			        <div class="row">
			          	<div class="col-md-8 col-sm-8 right-sidebar">
				            <?php while ( have_posts() ) : the_post();

							
									the_content();

									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'ngo-organization' ),
										'after'  => '</div>',
									) );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php get_sidebar(); ?></div>
			        </div>
			    <?php }else if($ngo_organization_sidebar_layout == 'full'){ ?>
			        <div class="full">
			            <?php while ( have_posts() ) : the_post();

						
									the_content();

									wp_link_pages( array(
										'before' => '<div class="page-links">' . __( 'Pages:', 'ngo-organization' ),
										'after'  => '</div>',
									) );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							endwhile; // End of the loop.
						?>
			      	</div>
				<?php }?>
			</div>
		</div>
	</main>


<?php get_footer();