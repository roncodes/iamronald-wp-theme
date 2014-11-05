<?php
/*
Template Name: Blog
*/
$current_page = (get_query_var('paged')) ? get_query_var('paged') : 1; // get current page number
$args = array(
	'posts_per_page' => get_option('posts_per_page'), // the value from Settings > Reading by default
	'paged'          => $current_page // current page
);
query_posts( $args );
 
$wp_query->is_archive = true;
$wp_query->is_home = false;

get_header(); ?>

	<div id="content" class="site-content">

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
				?>

			<?php endwhile; ?>

			<?php iamronald_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #content -->

<?php get_footer(); ?>

