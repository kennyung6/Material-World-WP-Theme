<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpmice
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<header id="masthead" class="site-header header-wraper" role="banner">

		<div class="row site-header-main">	
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>
		</div>

		<?php 
			/* Header nav position corector */
			global $wpmice_theme_settings;
			if( @$wpmice_theme_settings['header_nav_disable'] != 1 ){ 
		?>
		<div class="row site-header-nav" >
			<nav class="bs-component" role="navigation">
		        <?php
		            wp_nav_menu( array(
		                'menu'              => 'primary',
		                'theme_location'    => 'primary',
		                'depth'             => 2,
		                'container'         => 'ul',
		                'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
		                'menu_class'        => 'nav nav-tabs',
		                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		                'walker'            => new wp_bootstrap_navwalker())
		            );
		        ?>
			</nav>
		</div>
		<?php } ?>

		<div id="left-sidebar-menu-button" style="position:absolute; top:3px; font-size:22px; padding:5px 10px; cursor:pointer; z-index:3000">=</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content flexbox-container">

