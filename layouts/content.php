<?php
/**
 * @package wpmaterialdesign
 */
?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<div class="row" ></div>
<div class="post-wraper row" style="background-image:url(<?php echo $url; ?>); background-size: cover;"; >
	
	<div class="col-md-12" style="background-color: rgba(255,255,255,0.5);">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="top-article-decorator"></div>
		<header class="entry-header">
			
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="entry-meta">
				<?php wpmaterialdesign_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpmaterialdesign' ) ); ?>
			<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpmaterialdesign' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'wpmaterialdesign' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-footer">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'wpmaterialdesign' ) );
					if ( $categories_list && wpmaterialdesign_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( 'In %1$s', 'wpmaterialdesign' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'wpmaterialdesign' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'wpmaterialdesign' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
			<?php endif; // End if 'post' == get_post_type() ?>

			<!-- <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wpmaterialdesign' ), __( '1 Comment', 'wpmaterialdesign' ), __( '% Comments', 'wpmaterialdesign' ) ); ?></span>
			<?php endif; ?> -->
			<?php echo '<div class="continue-reading"><a class="btn" href="'.esc_url( get_permalink()  ).'">'.__( 'Continue reading', 'wpmaterialdesign' ).'</a></div>'; ?>
			
			<?php edit_post_link( __( 'Edit', 'wpmaterialdesign' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
	</div>
</div>