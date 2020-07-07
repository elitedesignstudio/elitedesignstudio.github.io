<?php
	/* -----> ICONS PROPERTIES <----- */
	$icons = rb_ext_icon_vc_sc_config_params( 'icon_img', 'icon' );

	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = array(
		array(
			"type"			=> "css_editor",
			"param_name"	=> "custom_styles",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> 'all'
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Hover Effect', 'backend', 'ogo' ),
			"param_name"		=> "bg_hover",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array(
				esc_html_x( 'No Hover', 'backend', 'ogo' )		=> 'no_hover',
				esc_html_x( '3D', 'backend', 'ogo' )				=> '3d',
			),
			"std"				=> 'no_hover'
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Sensivity', "backend", 'ogo' ),
			"param_name"		=> "max_tilt",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "bg_hover",
				"value"		=> array('3d'),
			),
			"value"				=> "10"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Perspective', "backend", 'ogo' ),
			"param_name"		=> "perspective",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "bg_hover",
				"value"		=> array('3d'),
			),
			"value"				=> "1000"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Scale', "backend", 'ogo' ),
			"param_name"		=> "scale",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "bg_hover",
				"value"		=> array('3d'),
			),
			"value"				=> "1"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Speed', "backend", 'ogo' ),
			"description"		=> esc_html_x( 'Speed of the enter/exit transition', "backend", 'ogo' ),
			"param_name"		=> "speed",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "bg_hover",
				"value"		=> array('3d'),
			),
			"value"				=> "300"
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
			"heading"			=> esc_html_x( 'Icon Size', "backend", 'ogo' ),
			"param_name"		=> "icon_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "60px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Size', "backend", 'ogo' ),
			"param_name"		=> "title_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "35px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Line-Height', "backend", 'ogo' ),
			"param_name"		=> "title_lh",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "41px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Text Size', "backend", 'ogo' ),
			"param_name"		=> "text_size",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "16px"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Text Line-Height', "backend", 'ogo' ),
			"param_name"		=> "text_lh",
			"group"				=> esc_html_x( "Styling", "backend", 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"responsive"		=> "all",
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "28px"
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "customize_colors",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"			=> array( esc_html_x( 'Customize Colors', 'backend', 'ogo' ) => true ),
			"std"			=> '1'
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Shape Gradient 1', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "shape_gradient_1",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> "#1C5ECE"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Shape Gradient 2', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "shape_gradient_2",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> "#1C5ECE"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icon Color', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "icon_color",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> "#fff"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "title_color",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> "#fff"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Divider Color', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"param_name"		=> "divider_color",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Text Color', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "text_color",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> '#707070'
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Text Color Hover', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"param_name"		=> "text_color_hover",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Title Color', 'backend', 'ogo' ),
			"param_name"		=> "btn_title",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Title Hover', 'backend', 'ogo' ),
			"param_name"		=> "btn_title_hover",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Main Background', 'backend', 'ogo' ),
			"param_name"		=> "btn_main_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Rear Background', 'backend', 'ogo' ),
			"param_name"		=> "btn_rear_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "customize_colors",
				"not_empty"	=> true
			),
			"value"				=> SECONDARY_COLOR,
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
				"edit_field_class" 	=> "vc_col-xs-6",
				"dependency"		=> array(
					"element"	=> "icon_img",
					"value"		=> 'icon'
				),
				"value"				=> array(
					esc_html_x( "None", 'backend', 'ogo' ) 		=> 'none',
					esc_html_x( "Round", 'backend', 'ogo' ) 		=> 'round',
					esc_html_x( "Square", 'backend', 'ogo' ) 		=> 'square',
					esc_html_x( "Triangle", 'backend', 'ogo' ) 	=> 'triangle',
				),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Shape Rotation (degrees)', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "shape_rotation",
				"dependency"		=> array(
					"element"	=> "icon_img",
					"value"		=> 'icon'
				),
				"value"				=> "0"
			),
			array(
				"type"				=> "textfield",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "title",
				"value"				=> ""
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Title HTML Tag', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "title_tag",
				"value"				=> array(
					esc_html_x( "Default - (H3)", 'backend', 'ogo' ) 	=> 'h3',
					esc_html_x( "H1", 'backend', 'ogo' ) 				=> 'h1',
					esc_html_x( "H2", 'backend', 'ogo' ) 				=> 'h2',
					esc_html_x( "H4", 'backend', 'ogo' ) 				=> 'h4',
					esc_html_x( "H5", 'backend', 'ogo' ) 				=> 'h5',
					esc_html_x( "H6", 'backend', 'ogo' ) 				=> 'h6',
				),
			),
			array(
				"type"				=> "textfield",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Button Title', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "button_title",
				"value"				=> ""
			),
			array(
				"type"				=> "textfield",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Url', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "button_url",
				"dependency"		=> array(
					"element"	=> "button_title",
					"not_empty"	=> true
				),
				"value"				=> ""
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Button Style', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "button_type",
				"dependency"		=> array(
					"element"	=> "button_title",
					"not_empty"	=> true
				),
				"value"				=> array(
					esc_html_x( "Default", 'backend', 'ogo' ) 	=> 'default',
					esc_html_x( "Dashed", 'backend', 'ogo' ) 		=> 'dashed',
					esc_html_x( "Simple", 'backend', 'ogo' ) 		=> 'simple',
				),
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Button Size', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "button_size",
				"dependency"		=> array(
					"element"	=> "button_title",
					"not_empty"	=> true
				),
				"value"				=> array(
					esc_html_x( "Small", 'backend', 'ogo' ) 		=> 'small',
					esc_html_x( "Medium", 'backend', 'ogo' ) 		=> 'medium',
					esc_html_x( "Large", 'backend', 'ogo' ) 		=> 'large',
				),
				"std"				=> "medium"
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "add_divider",
				"value"				=> array( esc_html_x( 'Add Divider', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"				=> "textarea_html",
				"heading"			=> esc_html_x( 'Content', 'backend', 'ogo' ),
				"param_name"		=> "content"
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
		"name"				=> esc_html_x( 'RB Extended Service', 'backend', 'ogo' ),
		"base"				=> "rb_sc_extended_service",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Extended_Service extends WPBakeryShortCode {
	    }
	}
?>