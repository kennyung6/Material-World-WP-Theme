<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package wpmaterialdesign
 */

get_header(); ?>

	<div id="sidebar-left">		
	<?php if ( is_active_sidebar( 'left-sidebar' ) ) :  ?>
			<ul id="sidebar">
				<?php dynamic_sidebar( 'left-sidebar' ); ?>
			</ul>
	<?php endif; ?>
	</div>
	<div id="primary" class="content-area container">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'wpmaterialdesign' ); ?></h1>
				</header><!-- .page-header -->

				
			</section><!-- .error-404 -->
			<article>
				<div class="entry-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wpmaterialdesign' ); ?></p>

					<?php get_search_form(); ?>

					<?php
						/* translators: %1$s: smiley */
						//$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'wpmaterialdesign' ), convert_smilies( ':)' ) ) . '</p>';
						//the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$archive_content" );
					?>

				</div><!-- .page-content -->
			</article>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php if ( is_active_sidebar( 'right-sidebar' ) ) :  ?>
		<div id="sidebar-right">
			<ul id="sidebar">
				<?php dynamic_sidebar( 'right-sidebar' ); ?>
			</ul>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>
