<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpmaterialdesign
 */
	
	get_header(); 

	

	?>
	
	<div id="sidebar-left">		
	<?php if ( is_active_sidebar( 'left-sidebar' ) ) :  ?>
			<ul id="sidebar">
				<?php dynamic_sidebar( 'left-sidebar' ); ?>
			</ul>
	<?php endif; ?>
	</div>


	<div id="primary" class="content-area">

		<div id="main-sidebar">
			<ul id="main-sidebar">
				<?php dynamic_sidebar( 'main-sidebar' ); ?>
			</ul>
		</div>

		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>			

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						$template = $wpmaterialdesign_theme_settings['loop_template_part'];
						$template_terms = wp_get_post_terms( $post->ID, 'template_part', array() );
						if(@$template_terms[0]->slug){
							$template = 'tpl-'.$template_terms[0]->slug;
						}
						get_template_part( 'layouts/'.$template , get_post_format() );
					?>
				<?php endwhile; ?>

				<?php wpmaterialdesign_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'layouts/'.'content', 'none' ); ?>

			<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
