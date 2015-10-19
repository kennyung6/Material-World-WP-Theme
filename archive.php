<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package wpmaterialdesign
 */

get_header(); ?>

	<?php if ( is_active_sidebar( 'left-sidebar' ) ) :  ?>
		<div id="sidebar-left">
			<ul id="sidebar">
				<?php dynamic_sidebar( 'left-sidebar' ); ?>
			</ul>
		</div>
	<?php endif; ?>


	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'wpmaterialdesign' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'wpmaterialdesign' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'wpmaterialdesign' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'wpmaterialdesign' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'wpmaterialdesign' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'wpmaterialdesign' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'wpmaterialdesign' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'wpmaterialdesign');

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'wpmaterialdesign');

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'wpmaterialdesign' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'wpmaterialdesign' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'wpmaterialdesign' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'wpmaterialdesign' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'wpmaterialdesign' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'wpmaterialdesign' );

						else :
							_e( 'Archives', 'wpmaterialdesign' );

						endif;
					?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'layouts/'.$wpmaterialdesign_theme_settings['loop_template_part'] , get_post_format() );
				?>

			<?php endwhile; ?>

			<?php wpmaterialdesign_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'layouts/'.'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->


<?php get_footer(); ?>
