<?php
/**
 * @package wpmice
 */
?>
<div class="post-wraper row tpl-table-row">
	
	<div class="col-md-5">
		<div class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title tpl-table-row-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		</div>
		<?php the_excerpt( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'wpmice' ) ); ?>
	</div>

	<div class="col-md-4">
		
		<div class="tpl-table-row-metas-top">
			<?php
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( __( ', ', 'wpmice' ) );
			if ( $categories_list && wpmice_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'In %1$s', 'wpmice' ), $categories_list ); ?>
			</span>
			<?php endif; // End if categories ?>
		</div>

		<div>
				<?php
					/* translators: used between list items, there is a space after the comma */
					$tags_list = get_the_tag_list( '', __( ', ', 'wpmice' ) );
					if ( $tags_list ) :
				?>
				<span class="tags-links">
					<?php printf( __( 'Tagged %1$s', 'wpmice' ), $tags_list ); ?>
				</span>
				<?php endif; // End if $tags_list ?>
		</div>

	</div>

	<div class="col-md-3">	
		<div class="tpl-table-row-metas-top">
			Location:
		</div>
		<div>
			Budget:
		</div>
	</div>	
	
		
	
	
</div>