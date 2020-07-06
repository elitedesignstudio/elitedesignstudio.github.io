<?php 
	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = array(
		array(
			"type"			=> "css_editor",
			"param_name"	=> "custom_styles",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> 'all',
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "customize_align",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> "all",
			"value"			=> array( esc_html_x( 'Customize Alignment', 'backend', 'ogo' ) => true ),
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html_x( 'Alignment', 'backend', 'ogo' ),
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"param_name"	=> "alignment",
			"responsive"	=> "all",
			"dependency"		=> array(
				"element"	=> "customize_align",
				"not_empty"	=> true
			),
			"value"			=> array(
				esc_html_x( "Left", 'backend', 'ogo' ) => 'left',
				esc_html_x( "Center", 'backend', 'ogo' ) => 'center',
				esc_html_x( "Right", 'backend', 'ogo' ) => 'right',
			),
		),
	);

	/* -----> RESPONSIVE STYLING TABS PROPERTIES <----- */
	$styles_landscape = $styles_portrait = $styles_mobile = $styles;

	$styles_landscape = rb_responsive_styles($styles_landscape, 'landscape', rb_landscape_group_name());
	$styles_portrait = rb_responsive_styles($styles_portrait, 'portrait', rb_tablet_group_name());
	$styles_mobile = rb_responsive_styles($styles_mobile, 'mobile', rb_mobile_group_name());

	$params = rb_ext_merge_arrs( array(
		/* -----> GENERAL TAB <----- */
		array(
			array(
				"type"				=> "attach_image",
				"heading"			=> esc_html_x( 'Logotype', 'backend', 'ogo' ),
				"param_name"		=> "image",
				"description"		=> esc_html_x( 'If empty, logotype will be taken from customizer.', 'backend', 'ogo' ),
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "retina",
				"value"				=> array( esc_html_x( 'Retina', 'backend', 'ogo' ) => true ),
				"std"				=> "1"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Width', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'Dimensions override retina settings.', 'backend', 'ogo' ),
				"param_name"		=> "width",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> ""
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Height', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'Dimensions override retina settings.', 'backend', 'ogo' ),
				"param_name"		=> "height",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> ""
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Extra class name', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'backend', 'ogo' ),
				"param_name"		=> "el_class",
				"value"				=> ""
			),
		),
		/* -----> STYLING TAB <----- */
		$styles,
		/* -----> TABLET LANDSCAPE TAB <----- */
		$styles_landscape,
		/* -----> TABLET PORTRAIT TAB <----- */
		$styles_portrait,
		/* -----> MOBILE TAB <----- */
		$styles_mobile
	));

	/* -----> MODULE DECLARATION <----- */
	vc_map( array(
		"name"				=> esc_html_x( 'RB Logotype', 'backend', 'ogo' ),
		"base"				=> "rb_sc_logo",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",		
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Logo extends WPBakeryShortCode {
	    }
	}
?>