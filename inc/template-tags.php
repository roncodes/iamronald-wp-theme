<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Iamronald
 */

if ( ! function_exists( 'iamronald_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function iamronald_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'iamronald' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'iamronald' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'iamronald' ) ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'iamronald_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function iamronald_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'iamronald' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span>&nbsp;%title', 'Previous post link', 'iamronald' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title&nbsp;<span class="meta-nav">&rarr;</span>', 'Next post link',     'iamronald' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'iamronald_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function iamronald_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	$update_string = '';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$update_string = 'last updated <span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><time class="updated" datetime="%3$s">%4$s</time></a></span> ';
		$update_string = sprintf( $update_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$cats = get_the_category();
	$categories = array();
	foreach($cats as $cat) { 
		$categories[] = '<span><a href="' . esc_url( get_category_link($cat->term_id) ) . '" rel="category tag">' . $cat->name . '</a></span>';
	}

	$posted_on = sprintf(
		_x( 'posted on %s', 'post date', 'iamronald' ),
		'<span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span> ' . $update_string
	);

	$byline = sprintf(
		_x( 'by %s', 'post author', 'iamronald' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$posted_in = sprintf(
		_x( 'in %s', 'post category', 'iamronald' ),
		implode(', ', $categories) . ' ' 
	);

	$with_num_comments = sprintf(
		_x( 'with %s', 'number of replies', 'iamronald' ),
		'<span><a href="' . esc_url( get_comments_link() ) . '" rel="comments">' . iamronald_get_comments_number() . '</a></span> '
	);

	echo $byline . $posted_on . $posted_in . $with_num_comments;

}
endif;

if ( ! function_exists( 'iamronald_get_comments_number' ) ) :
/**
 * Returns the total number of comments, Trackbacks, and Pingbacks for the current post.
 */
function iamronald_get_comments_number($zero = 'No Replies', $one = '1 Reply', $more = '% Replies') {
	$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
	if ( comments_open() ) {
		if ( $num_comments == 0 ) {
			return __($zero);
		} elseif ( $num_comments > 1 ) {
			return __(str_replace('%', $num_comments, $more));
		} else {
			return __($one);
		}
	} else {
		return  __('No Comments Allowed');
	}
}
endif;

if ( ! function_exists( 'iamronald_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function iamronald_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'iamronald' ) );
		if ( $categories_list && iamronald_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'iamronald' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'iamronald' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'iamronald' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a reply', 'iamronald' ), __( '1 Reply', 'iamronald' ), __( '% Replies', 'iamronald' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'iamronald' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'iamronald_comment' ) ) :
/**
 * Comment Style
 */
function iamronald_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);
	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<article class="clearfix" itemprop="comment" itemscope="itemscope" itemtype="http://schema.org/UserComments">
			<?php echo get_avatar($comment, 64); ?>	        
	        <div class="comment-author">
				<p class="vcard" itemprop="creator" itemscope="itemscope" itemtype="http://schema.org/Person">
				<?php printf( __( '<cite class="fn" itemprop="name">%s</cite>' ), get_comment_author_link() ); ?>
				<?php printf( __('<time itemprop="commentTime" datetime="2014-06-13T20:43:42+00:00">%1$s at %2$s</time>'), get_comment_date(),  get_comment_time() ); ?>
				<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>		            					</p>
			</div>
			<div class="comment-content" itemprop="commentText">
				<?php comment_text(); ?>
			</div>
		</article>
	</<?php echo $tag ?>>
	<?
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function iamronald_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'iamronald_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'iamronald_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so iamronald_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so iamronald_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in iamronald_categorized_blog.
 */
function iamronald_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'iamronald_categories' );
}
add_action( 'edit_category', 'iamronald_category_transient_flusher' );
add_action( 'save_post',     'iamronald_category_transient_flusher' );
