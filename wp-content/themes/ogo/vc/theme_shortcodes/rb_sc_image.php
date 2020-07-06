<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = rb_ext_merge_arrs( array(
		array(
			array(
				"type"			=> "css_editor",
				"param_name"	=> "custom_styles",
				"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"responsive"	=> 'all'
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Image Hover Effect', 'backend', 'ogo' ),
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
				"std"			=> 'center',
			),
		)
	));

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
				"heading"			=> esc_html_x( 'Image', 'backend', 'ogo' ),
				"param_name"		=> "image",
			),
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html_x( 'Max Image Size', 'backend', 'ogo' ),
				'param_name'		=> 'thumb_size',
				'value'				=> array(
					esc_html_x( 'Full', 'backend', 'ogo' )				=> 'full',
					esc_html_x( 'Large (1024px)', 'backend', 'ogo' )		=> 'large',
					esc_html_x( 'Medium (570px)', 'backend', 'ogo' )		=> 'medium-custom',
					esc_html_x( 'Medium (300px)', 'backend', 'ogo' )		=> 'medium',
					esc_html_x( 'Thumbnail (15px)', 'backend', 'ogo' )	=> 'thumbnail',
				)
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html_x( 'Choose Mask', 'backend', 'ogo' ),
				"param_name"	=> "mask_preset",
				"value"			=> array(
					esc_html_x( "No Mask", 'backend', 'ogo' ) 					=> '',
					esc_html_x( "Triangle Mask One", 'backend', 'ogo' ) 		=> 'mask_1',
					esc_html_x( "Triangle Mask Two", 'backend', 'ogo' )			=> 'mask_2',
					esc_html_x( "Triangle Mask Three", 'backend', 'ogo' )		=> 'mask_3',
					esc_html_x( "Square Mask", 'backend', 'ogo' )				=> 'mask_4',
					esc_html_x( "Custom", 'backend', 'ogo' )					=> 'custom',
				)
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> esc_html_x( 'Mask', 'backend', 'ogo' ),
				"param_name"		=> "custom_mask",
				"dependency"		=> array(
					"element"	=> "mask_preset",
					"value"		=> "custom"
				),
			),
			array(
				"type"				=> "textarea",
				"heading"			=> esc_html_x( 'Tooltip', 'backend', 'ogo' ),
				"param_name"		=> "tooltip",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> ""
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Tooltip Title', 'backend', 'ogo' ),
				"param_name"		=> "tooltip_title_color",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "tooltip",
					"not_empty"	=> true
				),
				"value"				=> PRIMARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Tooltip Dot', 'backend', 'ogo' ),
				"param_name"		=> "tooltip_dot_color",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "tooltip",
					"not_empty"	=> true
				),
				"value"				=> THIRD_COLOR,
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "add_shadow",
				"dependency"	=> array(
					"element"		=> "mask_preset",
					"value"			=> array( "mask_1", "mask_2", "mask_3", "mask_4" )
				),
				"value"			=> array( esc_html_x( 'Add Shadow', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Top Shift', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'Value with units', 'backend', 'ogo' ),
				"param_name"		=> "top_shift",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "add_shadow",
					"not_empty"	=> true
				),
				"value"				=> "0px"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Left Shift', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'Value with units', 'backend', 'ogo' ),
				"param_name"		=> "left_shift",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "add_shadow",
					"not_empty"	=> true
				),
				"value"				=> "0px"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Rotate', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'Degrees', 'backend', 'ogo' ),
				"param_name"		=> "shadow_rotate",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "add_shadow",
					"not_empty"	=> true
				),
				"value"				=> "0"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Scale', 'backend', 'ogo' ),
				"param_name"		=> "shadow_scale",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "add_shadow",
					"not_empty"	=> true
				),
				"value"				=> "1.0"
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Shadow Type', 'backend', 'ogo' ),
				"param_name"		=> "shadow_type",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "add_shadow",
					"not_empty"	=> true
				),
				"value"				=> array(
					esc_html_x( "Color", 'backend', 'ogo' ) 		=> 'color',
					esc_html_x( "Dashes", 'backend', 'ogo' ) 		=> 'dashes',
				)
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Shadow Color', 'backend', 'ogo' ),
				"param_name"		=> "shadow_color",
				"edit_field_class" 	=> "vc_col-xs-4",
				"dependency"		=> array(
					"element"	=> "add_shadow",
					"not_empty"	=> true
				),
				"value"				=> SECONDARY_COLOR,
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
		"name"				=> esc_html_x( 'RB Image', 'backend', 'ogo' ),
		"base"				=> "rb_sc_image",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Image extends WPBakeryShortCode {
	    }
	}
?>