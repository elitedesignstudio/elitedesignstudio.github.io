<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$params = rb_ext_merge_arrs( array(
		/* -----> GENERAL TAB <----- */
		array(
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Style', 'backend', 'ogo' ),
				"param_name"		=> "style",
				"value"				=> array(
					esc_html_x( 'Info', 'backend', 'ogo' )		=> 'info',
					esc_html_x( 'Success', 'backend', 'ogo' )		=> 'success',
					esc_html_x( 'Warning', 'backend', 'ogo' )		=> 'warning',
					esc_html_x( 'Error', 'backend', 'ogo' )		=> 'error',
				),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"param_name"		=> "title",
			),
			array(
				"type"				=> "textarea",
				"heading"			=> esc_html_x( 'Description', 'backend', 'ogo' ),
				"param_name"		=> "description",
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "closable",
				"value"				=> array( esc_html_x( 'Closable', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Extra class name', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'backend', 'ogo' ),
				"param_name"		=> "el_class",
				"value"				=> ""
			),
		),
	));

	/* -----> MODULE DECLARATION <----- */
	vc_map( array(
		"name"				=> esc_html_x( 'RB Info Box', 'backend', 'ogo' ),
		"base"				=> "rb_sc_info_box",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",		
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Info_Box extends WPBakeryShortCode {
	    }
	}
?>