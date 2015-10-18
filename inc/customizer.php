<?php
/**
 * wpmice Theme Customizer
 *
 * @package wpmice
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wpmice_customize_register( $wp_customize ) {
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'wpmice_theme_options' )->transport = 'postMessage';

	$wp_customize->add_section( 'wpmice_extra_options', array(
		'title'		=>	__( '[MW] Theme extra options', 'wpmice' ),
		'priority'	=>	35,
	));

	$wp_customize->add_section( 'wpmice_template_header', array(
		'title'		=>	__( '[MW] Theme header', 'wpmice' ),
		'priority'	=>	35,
	));

	$wp_customize->add_section( 'wpmice_template_parts', array(
		'title'		=>	__( '[MW] Theme content', 'wpmice' ),
		'priority'	=>	35,
	));

	

	/* ---------------------------------------------------- */
	/* EXTRA OPTIONS										*/
	/* ---------------------------------------------------- */

	$wp_customize->add_setting( 'wpmice_theme_options[site_margins]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_site_margins', array(
		'label'		=>	__( 'Global margins (container)', 'wpmice' ),
		'section'	=>	'wpmice_extra_options',
		'settings'	=>	'wpmice_theme_options[site_margins]',
		'type'		=>	'checkbox',
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[color_scheme]', array(
		'default'		=>	'color_schema_teal',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'color_scheme', array(
		'label'		=>	__( 'Color Scheme', 'wpmice' ),
		'section'	=>	'wpmice_extra_options',
		'settings'	=>	'wpmice_theme_options[color_scheme]',
		'type'		=>	'radio',
		'choices'	=>	array(
			'color_schema_gray_blue'	=>	'Gray blue',
			'color_schema_pink'			=>	'Pink',
			'color_schema_indigo'		=>	'Indigo',
			'color_schema_teal'			=>	'Teal',
		),
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[horizontal_margins]', array(
		'default'		=>	35,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize	->	add_control( 'wpmice_horizontal_margins', array(
		'label'			=>	__( 'Horizontal margins', 'wpmice' ),
		'section'		=>	'wpmice_extra_options',
		'settings'		=>	'wpmice_theme_options[horizontal_margins]',
		'type'			=>	'range',
		'input_attrs'	=>	array(
			'min'			=>	0,
			'max'			=>	100,
			'step'			=>	5,
			'class'			=>	'test-class test',
			'style'			=>	'color: #0a0; width:100%',
	    ),
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[shadows]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_shadows', array(
		'label'		=>	__( 'Shadows', 'wpmice' ),
		'section'	=>	'wpmice_extra_options',
		'settings'	=>	'wpmice_theme_options[shadows]',
		'type'		=>	'checkbox',
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[lines]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_lines', array(
		'label'		=>	__( 'Lines', 'wpmice' ),
		'section'	=>	'wpmice_extra_options',
		'settings'	=>	'wpmice_theme_options[lines]',
		'type'		=>	'checkbox',
	));
	
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[tiled_margins]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_tiled_margins', array(
		'label'		=>	__( 'Tiled margins', 'wpmice' ),
		'section'	=>	'wpmice_extra_options',
		'settings'	=>	'wpmice_theme_options[tiled_margins]',
		'type'		=>	'checkbox',
	));

	/* ---------------------------------------------------- */
	/* HEADER												*/
	/* ---------------------------------------------------- */

	/* ---------------------------------------------------- */

	$wp_customize->add_setting( 'wpmice_theme_options[header_branding_align]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_branding_align', array(
		'label'		=>	__( 'Branding align left/center', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_branding_align]',
		'type'		=>	'checkbox',
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_branding_letter_spacing]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_header_branding_letter_spacing', array(
		'label'		=>	__( 'Branding letters spacing', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_branding_letter_spacing]',
		'type'		=>	'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 5,
	        'step'  => 0.1,
	        'class' => 'test-class test',
	        'style' => 'color: #0a0; width:100%',
	    ),
	));

	/* NAVBAR */
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_nav_disable]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_disable', array(
		'label'		=>	__( 'Disable navbar', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_nav_disable]',
		'type'		=>	'checkbox',
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_nav_top]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_header_nav_top', array(
		'label'		=>	__( 'Nav top margin corector', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_nav_top]',
		'type'		=>	'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 100,
	        'step'  => 1,
	        'class' => 'test-class test',
	        'style' => 'color: #0a0; width:100%',
	    ),
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_nav_bottom]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize	->	add_control( 'wpmice_header_nav_bottom', array(
		'label'			=>	__( 'Nav bottom margin corector', 'wpmice' ),
		'section'		=>	'wpmice_template_header',
		'settings'		=>	'wpmice_theme_options[header_nav_bottom]',
		'type'			=>	'range',
		'input_attrs'	=>	array(
			'min'			=>	0,
			'max'			=>	100,
			'step'			=>	1,
			'class'			=>	'test-class test',
			'style'			=>	'color: #0a0; width:100%',
	    ),
	));
	
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_nav_align]', array(
		'default'		=>	'left',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_align', array(
		'label'		=>	__( 'Nav top margin corector', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_nav_align]',
		'type'		=>	'radio',
		'choices'	=>	array(
			'left'		=>	'Left',
			'center'	=>	'Center',
			'right'		=>	'Right',
		),
	));

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_nav_slice_by_left_sidebar]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_slice_by_left_sidebar', array(
		'label'		=>	__( 'Slice header by left sidebar', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_nav_slice_by_left_sidebar]',
		'type'		=>	'checkbox',
	));

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[header_nav_transparent]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_transparent', array(
		'label'		=>	__( 'Nav background transparent', 'wpmice' ),
		'section'	=>	'wpmice_template_header',
		'settings'	=>	'wpmice_theme_options[header_nav_transparent]',
		'type'		=>	'checkbox',
	));

	/* ---------------------------------------------------- */
	/* MAIN													*/
	/* ---------------------------------------------------- */




	/* ---------------------------------------------------- */
	/* CONTENT											*/
	/* ---------------------------------------------------- */

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[left-sidebar-percentage]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_left-sidebar-percentage', array(
		'label'		=>	__( 'Left sidebar percentage', 'wpmice' ),
		'section'	=>	'wpmice_template_parts',
		'settings'	=>	'wpmice_theme_options[left-sidebar-percentage]',
		'type'		=>	'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 50,
	        'step'  => 5,
	        'class' => 'test-class test',
	        'style' => 'color: #0a0; width:100%',
	    ),
	));
	/* ---------------------------------------------------- */

	$wp_customize->add_setting( 'wpmice_theme_options[loop_template_part]', array(
		'default'		=>	'content',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmice_select_template', array(
		'label'		=>	__( 'Color Scheme', 'wpmice' ),
		'section'	=>	'wpmice_template_parts',
		'settings'	=>	'wpmice_theme_options[loop_template_part]',
		'type'		=>	'radio',
		'choices'	=>	array(
			'content'	=>	'Original content',
			'tpl-row'	=>	'Template row',
			
		),
	));	

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmice_theme_options[sidebar_left_align]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'sidebar_left_align', array(
		'label'		=>	__( 'Left sidebar align left/center', 'wpmice' ),
		'section'	=>	'wpmice_template_parts',
		'settings'	=>	'wpmice_theme_options[sidebar_left_align]',
		'type'		=>	'checkbox',
	));


}
add_action( 'customize_register', 'wpmice_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wpmice_customize_preview_js() {
	wp_enqueue_script( 'wpmice_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wpmice_customize_preview_js' );
