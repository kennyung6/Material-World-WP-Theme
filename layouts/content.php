<?php
/**
 * @package wpmaterialdesign
 */
?>
<?php
 $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
 global $template_meta;
 $first = $template_meta['first'];
?>
<div class="row" ></div>
<div class="post-wraper row tpl-content bg underline <?php echo $first; ?>" style="background-image:url(<?php echo $url; ?>); background-size: cover;"; >
	
	<div class="col-md-12" style="background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAIAAAACCAYAAABytg0kAAAAE0lEQVQIW2P8////ZgYgYIQyfABSfQevbIAjrwAAAABJRU5ErkJggg==) repeat;">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
		<?php 
			
			if (@$template_meta['properties']['remove_decorator'] != true){ 
				?>
					<div class="top-article-decorator"></div>
				<?php 
			} 
		?>
		
		<header class="entry-header">
			
			<?php if ( 'post' == get_post_type() ) : ?>
				<div class="entry-meta">
					<?php wpmaterialdesign_posted_on(); ?>
				</div><!-- .entry-meta -->
			<?php endif; ?>

			<?php wpmaterialdesign_title(); ?>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			
			<div class="entry-summary">
				<?php wpmaterialdesign_excerpt(); ?>
			</div><!-- .entry-summary -->
		
		<?php else : ?>
		
			<div class="entry-content">			
				<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpmaterialdesign' ) ); 
					wpmaterialdesign_excerpt();
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'wpmaterialdesign' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-footer">
			<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search 
				
				wpmaterialdesign_cat_list( __( 'In', 'wpmaterialdesign' ) );
				wpmaterialdesign_tags_list();
	
			endif; // End if 'post' == get_post_type() ?>

			<!-- <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'wpmaterialdesign' ), __( '1 Comment', 'wpmaterialdesign' ), __( '% Comments', 'wpmaterialdesign' ) ); ?></span>
			<?php endif; ?> -->

			<?php wpmaterialdesign_read_more();  ?>
			
			<?php edit_post_link( __( 'Edit', 'wpmaterialdesign' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->
	</div>
</div>