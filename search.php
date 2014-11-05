<?php
/**
 * The template for displaying search results pages.
 *
 * @package Iamronald
 */

get_header(); ?>

	<div id="content" class="site-content">

		<?php if ( have_posts() ) : ?>

			<header class="entry-header" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
				<h1 class="entry-title" itemprop="headline">
					<?php printf( __( 'Search Results for: %s', 'iamronald' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php iamronald_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

	</div><!-- #content -->

<?php get_footer(); ?>
