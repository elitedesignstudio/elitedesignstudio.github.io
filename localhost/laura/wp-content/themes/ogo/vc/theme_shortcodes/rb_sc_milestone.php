<?php
	/* -----> ICONS PROPERTIES <----- */
	$icons = rb_ext_icon_vc_sc_config_params();

	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = array(
		array(
			"type"			=> "css_editor",
			"param_name"	=> "custom_styles",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> 'all'
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
			"dependency"	=> array(
				"element"		=> "customize_align",
				"not_empty"		=> true
			),
			"value"			=> array(
				esc_html_x( "Left", 'backend', 'ogo' ) 	=> 'left',
				esc_html_x( "Center", 'backend', 'ogo' ) 	=> 'center',
				esc_html_x( "Right", 'backend', 'ogo' ) 	=> 'right',
			),
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "customize_size",
			"group"			=> esc_html_x( "Styling", "backend", 'ogo' ),
			"responsive"	=> "all",
			"value"			=> array( esc_html_x( 'Customize Sizes', "backend", 'ogo' ) => true ),
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Icon Shape Size', "backend", 'ogo' ),
			"param_name"		=> "icon_shape_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "80px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Icon Size', "backend", 'ogo' ),
			"param_name"		=> "icon_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "50px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Count Size', "backend", 'ogo' ),
			"param_name"		=> "count_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "100px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Count Margins', "backend", 'ogo' ),
			"param_name"		=> "count_margins",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "0px 0px 0px 0px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Size', "backend", 'ogo' ),
			"param_name"		=> "title_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "35px"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icon Shape Gradient 1', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "icon_shape_gradient_1",
			"value"				=> "#025ea8"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icon Shape Gradient 2', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "icon_shape_gradient_2",
			"value"				=> "#02b3a3"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icon Gradient 1', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "icon_gradient_1",
			"value"				=> "#fff"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icon Gradient 2', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "icon_gradient_2",
			"value"				=> "#fff"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Numbers Gradient 1', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "number_gradient_1",
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Numbers Gradient 2', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "number_gradient_2",
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "title_color",
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Divider Color', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "divider_color",
			"value"				=> SECONDARY_COLOR
		),
	);

	/* -----> RESPONSIVE STYLING TABS PROPERTIES <----- */
	$styles_landscape = $styles_portrait = $styles_mobile = $styles;

	$styles_landscape = rb_responsive_styles($styles_landscape, 'landscape', rb_landscape_group_name());
	$styles_portrait = rb_responsive_styles($styles_portrait, 'portrait', rb_tablet_group_name());
	$styles_mobile = rb_responsive_styles($styles_mobile, 'mobile', rb_mobile_group_name());

	$params = rb_ext_merge_arrs( array(
		/* -----> GENERAL TAB <----- */
		$icons,
		array(
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Icon Shape', 'backend', 'ogo' ),
				"param_name"		=> "icon_shape",
				"value"				=> array(
					esc_html_x( "None", 'backend', 'ogo' ) 		=> 'none',
					esc_html_x( "Round", 'backend', 'ogo' ) 		=> 'round',
					esc_html_x( "Triangle", 'backend', 'ogo' ) 	=> 'triangle',
					esc_html_x( "Square", 'backend', 'ogo' ) 		=> 'square',
				),
			),
			array(
				"type"				=> "textarea",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"param_name"		=> "title",
				"value"				=> ""
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Count', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "count",
				"value"				=> "50"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Extra Symbol', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "symbol",
				"value"				=> "%"
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
		"name"				=> esc_html_x( 'RB Milestone', 'backend', 'ogo' ),
		"base"				=> "rb_sc_milestone",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Milestone extends WPBakeryShortCode {
	    }
	}
?>