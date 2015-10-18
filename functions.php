<?php
/**
 * wpmice functions and definitions
 *
 * @package wpmice
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'wpmice_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wpmice_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on wpmice, use a find and replace
	 * to change 'wpmice' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'wpmice', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'wpmice' ),
	) );

	// Enable support for Post Formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wpmice_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Enable support for HTML5 markup.
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
		'caption',
	) );
}
endif; // wpmice_setup
add_action( 'after_setup_theme', 'wpmice_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpmice_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Left sidebar', 'wpmice' ),
		'id'            => 'left-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
	register_sidebar( array(
		'name'          => __( 'Main sidebar', 'wpmice' ),
		'id'            => 'main-sidebar',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'wpmice_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function wpmice_scripts() {

	
	global $wpmice_theme_settings;

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
	//wp_enqueue_style( 'custom', get_template_directory_uri() . '/bootstrap/css/custom.min.css');

	/* load color sheme */
	
	//echo $wpmice_theme_settings['color_scheme'];
	wp_enqueue_style( $wpmice_theme_settings['color_scheme'], get_template_directory_uri() . '/bootstrap/css/'.$wpmice_theme_settings['color_scheme'].'.css');

	/* load shadows */
	if($wpmice_theme_settings['shadows']){
		wp_enqueue_style( 'shadows', get_template_directory_uri() . '/bootstrap/css/color_schema_shadows.css');
	}

	/* load lines */
	if($wpmice_theme_settings['lines']){
		wp_enqueue_style( 'lines', get_template_directory_uri() . '/bootstrap/css/color_schema_lines.css');
	}

	/* load tiled margins */
	if($wpmice_theme_settings['tiled_margins']){
		wp_enqueue_style( 'tiled_margins', get_template_directory_uri() . '/bootstrap/css/color_schema_tiled_margins.css');
	}
	
	if ( is_active_sidebar( 'left-sidebar' ) ){
		wp_enqueue_style( 'sidebar', get_template_directory_uri() . '/bootstrap/css/sidebar.css');
	}



	//wp_enqueue_style( $wpmice_theme_settings['color_scheme'], get_template_directory_uri() . '/bootstrap/css/'.$wpmice_theme_settings['color_scheme'].'.css');

	//wp_enqueue_style( 'roboto', get_template_directory_uri() . '/bootstrap/css/roboto.min.css');

	//wp_enqueue_style( 'material', get_template_directory_uri() . '/bootstrap/css/material.min.css');

	//wp_enqueue_style( 'ripples', get_template_directory_uri() . '/bootstrap/css/ripples.min.css');

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );
	
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/bootstrap/js/custom.js', array(), '', true );

	wp_enqueue_style( 'wpmice-style', get_stylesheet_uri() );
	

	//wp_enqueue_script( 'wpmice-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	//wp_enqueue_script( 'wpmice-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );


	//wp_enqueue_script( 'ripples', get_template_directory_uri() . '/js/ripples.min.js', array(), '', true );

	//wp_enqueue_script( 'material', get_template_directory_uri() . '/js/material.min.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	
}
add_action( 'wp_enqueue_scripts', 'wpmice_scripts');

function get_theme_options(){	
	global $wpmice_theme_settings;
	$wpmice_theme_settings = get_option( 'wpmice_theme_options' );

	// Add specific CSS class by filter
	if( @$wpmice_theme_settings['site_margins'] != 0	){ 
		add_filter( 'body_class', 'my_class_names' );
		function my_class_names( $classes ) {
			// add 'class-name' to the $classes array
			$classes[] = 'container';
			// return the $classes array
			return $classes;
		}
	}
	
/*	global $wpmice_theme_settings;
	$wpmice_theme_settings = get_option( 'wpmice_theme_options' );
	var_dump('generate_css > ',$wpmice_theme_settings);
	$css_dir = get_stylesheet_directory() . '/'; // Shorten code, save 1 call
	ob_start(); // Capture all output (output buffering)
	require($css_dir . 'custom_style.php'); // Generate CSS
	$css = ob_get_clean(); // Get generated CSS (output buffering)
	file_put_contents($css_dir . 'custom_style.css', $css, LOCK_EX); // Save it*/
}
add_action('wp', 'get_theme_options');
	

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
/**
 * Load bootstrap_navmenu_walker
 */
require get_template_directory() . '/inc/bootstrap_navmenu_walker.php';


function new_excerpt_length($length) {
	return 10;
}
add_filter('excerpt_length', 'new_excerpt_length');

/* Custom css */




function tcx_customizer_css() {
    require get_template_directory() . '/custom_css.php';
    if( $wpmice_theme_settings["left_sidebar_pinned"] == ''){
    	$wpmice_theme_settings["left_sidebar_pinned"] = 0;
    }
}
add_action( 'wp_head', 'tcx_customizer_css' );



