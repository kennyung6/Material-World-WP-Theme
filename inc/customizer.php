<?php
/**
 * wpmaterialdesign Theme Customizer
 *
 * @package wpmaterialdesign
 */



/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function wpmaterialdesign_customize_register( $wp_customize ) {

	function get_categories_select() {
	 $teh_cats = get_categories();
	    $results;
	    $count = count($teh_cats);
	    for ($i=0; $i < $count; $i++) {
	      if (isset($teh_cats[$i]))
	        $results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	      else
	        $count++;
	    }
	  return $results;
	}

	function get_metas_keys() {
		
		global $post;
		var_dump(get_post_custom_keys($post->ID));
		return $meta_values;

	}

	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_setting( 'wpmaterialdesign_theme_options' )->transport = 'postMessage';

	$wp_customize->add_section( 'wpmaterialdesign_extra_options', array(
		'title'		=>	__( '[MW] Theme extra options', 'wpmaterialdesign' ),
		'priority'	=>	35,
	));

	$wp_customize->add_section( 'wpmaterialdesign_template_header', array(
		'title'		=>	__( '[MW] Theme header', 'wpmaterialdesign' ),
		'priority'	=>	35,
	));

	$wp_customize->add_section( 'wpmaterialdesign_template_parts', array(
		'title'		=>	__( '[MW] Theme content', 'wpmaterialdesign' ),
		'priority'	=>	35,
	));

	$wp_customize->add_section( 'wpmaterialdesign_footer', array(
		'title'		=>	__( '[MW] Theme footer', 'wpmaterialdesign' ),
		'priority'	=>	35,
	));

	

	/* ---------------------------------------------------- */
	/* EXTRA OPTIONS										*/
	/* ---------------------------------------------------- */

	/* Site Identity    									*/
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_branding_letter_spacing]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_header_branding_letter_spacing', array(
		'label'		=>	__( 'Branding letters spacing', 'wpmaterialdesign' ),
		'section'	=>	'title_tagline',
		'settings'	=>	'wpmaterialdesign_theme_options[header_branding_letter_spacing]',
		'type'		=>	'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 5,
	        'step'  => 0.1,
	        'class' => 'test-class test',
	        'style' => 'color: #0a0; width:100%',
	    ),
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_branding_align]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_branding_align', array(
		'label'		=>	__( 'Branding align left/center', 'wpmaterialdesign' ),
		'section'	=>	'title_tagline',
		'settings'	=>	'wpmaterialdesign_theme_options[header_branding_align]',
		'type'		=>	'checkbox',
	));


	/* Colors 	        									*/
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[color_scheme]', array(
		'default'		=>	'color_schema_teal',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'color_scheme', array(
		'label'		=>	__( 'Color Scheme', 'wpmaterialdesign' ),
		'section'	=>	'colors',
		'settings'	=>	'wpmaterialdesign_theme_options[color_scheme]',
		'type'		=>	'radio',
		'choices'	=>	array(
			'color_schema_gray_blue'	=>	'Gray blue',
			'color_schema_pink'			=>	'Pink',
			'color_schema_indigo'		=>	'Indigo',
			'color_schema_teal'			=>	'Teal',
			'color_schema_deep_purple'	=>	'Deep purple',
			'color_schema_brown'		=>	'Brown',
		),
	));
	/* ---------------------------------------------------- */





	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[site_margins]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_site_margins', array(
		'label'		=>	__( 'Global margins (container)', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_extra_options',
		'settings'	=>	'wpmaterialdesign_theme_options[site_margins]',
		'type'		=>	'checkbox',
	));
	
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[horizontal_margins]', array(
		'default'		=>	35,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize	->	add_control( 'wpmaterialdesign_horizontal_margins', array(
		'label'			=>	__( 'Horizontal margins', 'wpmaterialdesign' ),
		'section'		=>	'wpmaterialdesign_extra_options',
		'settings'		=>	'wpmaterialdesign_theme_options[horizontal_margins]',
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
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[shadows]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_shadows', array(
		'label'		=>	__( 'Shadows', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_extra_options',
		'settings'	=>	'wpmaterialdesign_theme_options[shadows]',
		'type'		=>	'checkbox',
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[lines]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_lines', array(
		'label'		=>	__( 'Lines', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_extra_options',
		'settings'	=>	'wpmaterialdesign_theme_options[lines]',
		'type'		=>	'checkbox',
	));
	
	/* ---------------------------------------------------- */
	/* HEADER												*/
	/* ---------------------------------------------------- */

	/* ---------------------------------------------------- */

	
	

	/* NAVBAR */
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_nav_disable]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_disable', array(
		'label'		=>	__( 'Disable navbar', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_header',
		'settings'	=>	'wpmaterialdesign_theme_options[header_nav_disable]',
		'type'		=>	'checkbox',
	));
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_nav_top]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_header_nav_top', array(
		'label'		=>	__( 'Nav top margin corector', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_header',
		'settings'	=>	'wpmaterialdesign_theme_options[header_nav_top]',
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
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_nav_bottom]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize	->	add_control( 'wpmaterialdesign_header_nav_bottom', array(
		'label'			=>	__( 'Nav bottom margin corector', 'wpmaterialdesign' ),
		'section'		=>	'wpmaterialdesign_template_header',
		'settings'		=>	'wpmaterialdesign_theme_options[header_nav_bottom]',
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
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_nav_align]', array(
		'default'		=>	'left',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_align', array(
		'label'		=>	__( 'Nav top margin corector', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_header',
		'settings'	=>	'wpmaterialdesign_theme_options[header_nav_align]',
		'type'		=>	'radio',
		'choices'	=>	array(
			'left'		=>	'Left',
			'center'	=>	'Center',
			'right'		=>	'Right',
		),
	));

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_nav_slice_by_left_sidebar]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_slice_by_left_sidebar', array(
		'label'		=>	__( 'Slice header by left sidebar', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_header',
		'settings'	=>	'wpmaterialdesign_theme_options[header_nav_slice_by_left_sidebar]',
		'type'		=>	'checkbox',
	));

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[header_nav_transparent]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'header_nav_transparent', array(
		'label'		=>	__( 'Nav background transparent', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_header',
		'settings'	=>	'wpmaterialdesign_theme_options[header_nav_transparent]',
		'type'		=>	'checkbox',
	));

	/* ---------------------------------------------------- */
	/* MAIN													*/
	/* ---------------------------------------------------- */




	/* ---------------------------------------------------- */
	/* CONTENT											*/
	/* ---------------------------------------------------- */

	
	/* ---------------------------------------------------- */


	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[loop_template_part]', array(
		'default'		=>	'content',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_select_template', array(
		'label'		=>	__( 'Template part (with loop)', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_parts',
		'settings'	=>	'wpmaterialdesign_theme_options[loop_template_part]',
		'type'		=>	'select',
		'choices'	=>	array(
			'content'	=>	'Original content',
			'tpl-row'	=>	'Template row',
			'tpl-promo1-left'	=>	'Tpl Promo1 left',
			'tpl-one-third1'	=>	'Tpl third column 1',
			
		),
	));	

	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[tiled_margins]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_tiled_margins', array(
		'label'		=>	__( 'Template part box', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_parts',
		'settings'	=>	'wpmaterialdesign_theme_options[tiled_margins]',
		'type'		=>	'checkbox',
	));

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[template-part-box-margins]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_template-part-box-margins', array(
		'label'		=>	__( 'Template part margins', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_parts',
		'settings'	=>	'wpmaterialdesign_theme_options[template-part-box-margins]',
		'type'		=>	'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 10,
	        'step'  => 0.05,
	        'class' => 'test-class test',
	        'style' => 'color: #0a0; width:100%',
	    ),
	));

	/* Left sidebar */
	/* ---------------------------------------------------- */

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[left-sidebar-percentage]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_left-sidebar-percentage', array(
		'label'		=>	__( 'Left sidebar percentage', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_parts',
		'settings'	=>	'wpmaterialdesign_theme_options[left-sidebar-percentage]',
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

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[sidebar_left_align]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'sidebar_left_align', array(
		'label'		=>	__( 'Left sidebar align left/center', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_parts',
		'settings'	=>	'wpmaterialdesign_theme_options[sidebar_left_align]',
		'type'		=>	'checkbox',
	));

	/* ---------------------------------------------------- */
//global $post;

//var_dump(is_main_query());

//global $wp_query;
//var_dump($wp_query);



//var_dump(get_post_custom_keys($post->ID));

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[template_part_mata1_key]', array(
		'default'		=>	'content',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_template_part_mata1_key', array(
		'label'		=>	__( 'Template part meta1 key', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_template_parts',
		'settings'	=>	'wpmaterialdesign_theme_options[template_part_mata1_key]',
		'type'		=>	'select',
    	'choices' => get_categories_select()
	));	


	/* ---------------------------------------------------- */
	/* Footer											*/
	/* ---------------------------------------------------- */

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[footer_description_first]', array(
		'default'		=>	'content',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_footer_description_first', array(
		'label'		=>	__( 'Footer description', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_footer',
		'settings'	=>	'wpmaterialdesign_theme_options[footer_description_first]'		
	));	

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[footer_description_second]', array(
		'default'		=>	'content',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_footer_description_second', array(
		'label'		=>	__( 'Footer description', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_footer',
		'settings'	=>	'wpmaterialdesign_theme_options[footer_description_second]'		
	));	
	/* ---------------------------------------------------- */
	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[footer_align]', array(
		'default'		=>	'left',
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'footer_align', array(
		'label'		=>	__( 'Footer text align', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_footer',
		'settings'	=>	'wpmaterialdesign_theme_options[footer_align]',
		'type'		=>	'radio',
		'choices'	=>	array(
			'left'		=>	'Left',
			'center'	=>	'Center',
			'right'		=>	'Right',
		),
	));
	/* ---------------------------------------------------- */

	$wp_customize->add_setting( 'wpmaterialdesign_theme_options[footer_top_margin]', array(
		'default'		=>	0,
		'type'			=>	'option',
		'capability'	=>	'edit_theme_options',
	));
	$wp_customize->add_control( 'wpmaterialdesign_footer_top_margin', array(
		'label'		=>	__( 'Footer top margin', 'wpmaterialdesign' ),
		'section'	=>	'wpmaterialdesign_footer',
		'settings'	=>	'wpmaterialdesign_theme_options[footer_top_margin]',
		'type'		=>	'range',
		'input_attrs' => array(
	        'min'   => 0,
	        'max'   => 80,
	        'step'  => 5,
	        'class' => 'test-class test',
	        'style' => 'color: #0a0; width:100%',
	    ),
	));




}
add_action( 'customize_register', 'wpmaterialdesign_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wpmaterialdesign_customize_preview_js() {
	wp_enqueue_script( 'wpmaterialdesign_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wpmaterialdesign_customize_preview_js' );


