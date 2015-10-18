<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package wpmice
 */

if ( ! function_exists( 'wpmice_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function wpmice_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">

			<?php
				global $wp_query;

				$big = 999999999; // need an unlikely integer

				$pages = paginate_links( array(
			        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			        'format' => '?paged=%#%',
			        'current' => max( 1, get_query_var('paged') ),
			        'total' => $wp_query->max_num_pages,
			        'type'  => 'array',
			    ) );
			    if( is_array( $pages ) ) {
			        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		        	echo '<div class="pagination-wrap"><ul class="pagination">';
			        foreach ( $pages as $page ) {
			                echo "<li>$page</li>";
			        }
			       	echo '</ul></div>';
			    }
			?>

	<!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wpmice_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function wpmice_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'wpmice' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', _x( '<span class="meta-nav">&larr;</span> %title', 'Previous post link', 'wpmice' ) );
				next_post_link(     '<div class="nav-next">%link</div>',     _x( '%title <span class="meta-nav">&rarr;</span>', 'Next post link',     'wpmice' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wpmice_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wpmice_posted_on() {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string .= '<time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	printf( __( '<span class="posted-on">%1$s</span><span class="byline"> by %2$s</span>', 'wpmice' ),
		sprintf( '<a href="%1$s" rel="bookmark">%2$s</a>',
			esc_url( get_permalink() ),
			$time_string
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		)
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wpmice_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wpmice_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wpmice_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wpmice_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wpmice_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in wpmice_categorized_blog.
 */
function wpmice_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'wpmice_categories' );
}
add_action( 'edit_category', 'wpmice_category_transient_flusher' );
add_action( 'save_post',     'wpmice_category_transient_flusher' );
