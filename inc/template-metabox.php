<?php

/**
 * Calls the class on the post edit screen.
 */
function call_someClass() {
    new someClass();
}

if ( is_admin() ) {
    add_action( 'load-post.php', 'call_someClass' );
    add_action( 'load-post-new.php', 'call_someClass' );
}

/** 
 * The Class.
 */
class someClass {

	/**
	 * Hook into the appropriate actions when the class is constructed.
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save' ) );
	}

	/**
	 * Adds the meta box container.
	 */
	public function add_meta_box( $post_type ) {
            $post_types = array('post');     //limit meta box to certain post types
            if ( in_array( $post_type, $post_types )) {
		add_meta_box(
			'some_meta_box_name'
			,__( 'Template part with loop - display options', 'wpmaterialdesign_textdomain' )
			,array( $this, 'render_meta_box_content' )
			,$post_type
			,'advanced'
			,'high'
		);
            }
	}

	/**
	 * Save the meta when the post is saved.
	 *
	 * @param int $post_id The ID of the post being saved.
	 */
	public function save( $post_id ) {
	
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['wpmaterialdesign_inner_custom_box_nonce'] ) )
			return $post_id;

		$nonce = $_POST['wpmaterialdesign_inner_custom_box_nonce'];

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'wpmaterialdesign_inner_custom_box' ) )
			return $post_id;

		// If this is an autosave, our form has not been submitted,
                //     so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
			return $post_id;

		// Check the user's permissions.
		if ( 'page' == $_POST['post_type'] ) {

			if ( ! current_user_can( 'edit_page', $post_id ) )
				return $post_id;
	
		} else {

			if ( ! current_user_can( 'edit_post', $post_id ) )
				return $post_id;
		}

		/* OK, its safe for us to save the data now. */

		// Sanitize the user input.
		//$mydata = sanitize_text_field( $_POST['wpmaterialdesign_template_part_field'] );
		//$mydata = sanitize_option( $_POST['wpmaterialdesign_template_part_field'] );

		$mydata =  $_POST['wpmaterialdesign_template_part_field'] ;

		// Update the meta field.
		update_post_meta( $post_id, '_wpmaterialdesign_template_part_key', $mydata );
	}


	/**
	 * Render Meta Box content.
	 *
	 * @param WP_Post $post The post object.
	 */
	public function render_meta_box_content( $post ) {		
	
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'wpmaterialdesign_inner_custom_box', 'wpmaterialdesign_inner_custom_box_nonce' );

		// Use get_post_meta to retrieve an existing value from the database.
		$value = get_post_meta( $post->ID, '_wpmaterialdesign_template_part_key', true );
		//$value = array_merge($schema,(array)$value);
		$value = (array)$value;



		function check_req($key,$value){
			if($key==$value){
				return 'checked';
			}
		}

		// Display the form, using the current value.
		echo '<div style="float:left; width:45%">';
		echo '<label for="wpmaterialdesign_template_part_field" style="line-height:30px"><b>';
		_e( 'Select template', 'wpmaterialdesign_textdomain' );
		echo '</b></label><br/> ';
		//echo '<input type="text" id="wpmaterialdesign_template_part_field" name="wpmaterialdesign_template_part_field"';
        //echo ' value="' . esc_attr( $value ) . '" size="25" />';
        echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">Original content</label><input type="radio" name="wpmaterialdesign_template_part_field[template]" value="" '.check_req(@$value['template'],'').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">Promo1 left</label><input type="radio" name="wpmaterialdesign_template_part_field[template]" value="promo1-left" '.check_req(@$value['template'],'promo1-left').'></div>';

        echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">Column1 one/third</label><input type="radio" name="wpmaterialdesign_template_part_field[template]" value="one-third1" '.check_req(@$value['template'],'one-third1').'></div>';

		echo '</div>';

		echo '<div style="float:left; width:45%">';

        echo '<label for="wpmaterialdesign_template_part_field" style="line-height:30px"><b>';
		_e( 'Template display properties', 'wpmaterialdesign_textdomain' );
		echo '</b></label><br/> ';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove title</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_title]" value="true" '.check_req(@$value['properties']['remove_title'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove link from title</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_link_title]" value="true" '.check_req(@$value['properties']['remove_link_title'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove excerpt</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_excerpt]" value="true" '.check_req(@$value['properties']['remove_excerpt'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove date</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_date]" value="true" '.check_req(@$value['properties']['remove_date'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove categories</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_categories]" value="true" '.check_req(@$value['properties']['remove_categories'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove tags</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_tags]" value="true" '.check_req(@$value['properties']['remove_tags'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove read more</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_read_more]" value="true" '.check_req(@$value['properties']['remove_read_more'],'true').'></div>';

		echo '<div style="margin-bottom:5px"><label style="width:150px; display:block; float:left; ">remove decorator</label><input type="checkbox" name="wpmaterialdesign_template_part_field[properties][remove_decorator]" value="true" '.check_req(@$value['properties']['remove_decorator'],'true').'></div>';
	
		echo '</div>';

		echo '<br style="clear:both">';

	}
}