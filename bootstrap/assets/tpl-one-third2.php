<?php
/**
 * @package wpmaterialdesign
 */
?>
<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
<div class="post-wraper col-md-4"  >
	<div style="position:absolute; width:100%; height:200px; background:url(<?php echo $url; ?>); background-size: cover; margin:0px -15px">&nbsp;</div>
	<div style="height:200px"></div>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="top-article-decorator" style="height:30px"></div>
		<header class="entry-header">
			
			<?php if ( 'post' == get_post_type() ) : ?>

				<?php
					/* translators: used between list items, there is a space after the comma */
					$categories_list = get_the_category_list( __( ', ', 'wpmaterialdesign' ) );
					if ( $categories_list && wpmaterialdesign_categorized_blog() ) :
				?>
				<span class="cat-links">
					<?php printf( __( '%1$s', 'wpmaterialdesign' ), $categories_list ); ?>
				</span>
				<?php endif; // End if categories ?>

			<?php endif; ?>

			<?php the_title( sprintf( '<h1 class="entry-title" style="font-size:22px; overflow: hidden; max-height: 48px;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

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
				

				
			<?php endif; // End if 'post' == get_post_type() ?>

			<!-- <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wpmaterialdesign' ), __( '1 Comment', 'wpmaterialdesign' ), __( '% Comments', 'wpmaterialdesign' ) ); ?></span>
			<?php endif; ?> -->
			<?php echo '<div class="continue-reading"><a class="btn" href="'.esc_url( get_permalink()  ).'">'.__( 'Continue reading', 'wpmaterialdesign' ).'</a></div>'; ?>
			
			<?php edit_post_link( __( 'Edit', 'wpmaterialdesign' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

</div>