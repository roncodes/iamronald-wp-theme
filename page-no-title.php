<?php
/**
 * Template Name: Page w/ No Title
 *
 * @package Iamronald
 */

get_header(); ?>

	<div id="content" class="site-content">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'no-title' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_footer(); ?>