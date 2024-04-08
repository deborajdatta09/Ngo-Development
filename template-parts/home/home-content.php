<?php
/**
 * Template part for displaying home page content
 *
 * @package NGO Organization
 * @subpackage ngo_organization
 */

?>

<div id="main-content" class="container">
  	<?php while ( have_posts() ) : the_post(); ?>
  		<?php the_content(); ?>
  	<?php endwhile; // end of the loop. ?>
</div>