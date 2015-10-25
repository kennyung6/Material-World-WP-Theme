<?php
/**
 * @package wpmaterialdesign
 */
?>
<?php
	$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
	global $template_meta;
	if ( ($template_meta['uniq_counter'] % 3) == 0 ) {
		$first = 'first-tpl-child';
	}	
?>
<div class="post-wraper col-md-4 tpl-three bg underline <?php echo $first; ?>"  >
	<div style="position:absolute; width:100%; height:200px; background:url(<?php echo $url; ?>); background-size: cover; margin:0px -15px">&nbsp;</div>
	<div style="height:200px"></div>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php 
			if (@$template_meta['properties']['remove_decorator'] != true){ 
				?>
					<div class="top-article-decorator" style="height:30px"></div>
				<?php 
			} 
		?>
		<header class="entry-header">
			
			<?php if ( 'post' == get_post_type() ) : 
				
				wpmaterialdesign_cat_list();

			endif; ?>

			<?php the_title( sprintf( '<h1 class="entry-title" style="font-size:22px; overflow: hidden; max-height: 48px;"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php wpmaterialdesign_excerpt(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpmaterialdesign' ) ); ?>
			<?php wpmaterialdesign_excerpt(); ?>
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
			<?php wpmaterialdesign_read_more(); ?>
			
			<?php edit_post_link( __( 'Edit', 'wpmaterialdesign' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

</div>