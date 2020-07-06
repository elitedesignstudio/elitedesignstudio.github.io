<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$background_properties = rb_module_background_props();

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
			)
		),
		$background_properties,
		array(
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_colors",
				"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"value"			=> array( esc_html_x( 'Customize Colors', 'backend', 'ogo' ) => true ),
				"std"			=> '1'
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Text color', 'backend', 'ogo' ),
				"param_name"		=> "text_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"dependency"		=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"				=> "#fff",
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Divider color', 'backend', 'ogo' ),
				"param_name"		=> "divider_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"dependency"		=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"				=> SECONDARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Button Title', 'backend', 'ogo' ),
				"param_name"		=> "button_title_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"dependency"		=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"				=> SECONDARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Button Hover Title', 'backend', 'ogo' ),
				"param_name"		=> "button_title_hover",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"dependency"		=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"				=> SECONDARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Button Main Background', 'backend', 'ogo' ),
				"param_name"		=> "button_main_bg",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"dependency"		=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"				=> PRIMARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Button Rear Background', 'backend', 'ogo' ),
				"param_name"		=> "button_rear_bg",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"dependency"		=> array(
					"element"	=> "customize_colors",
					"not_empty"	=> true
				),
				"value"				=> SECONDARY_COLOR,
			),
			array(
				"type"			=> "checkbox",
				"param_name"	=> "customize_size",
				"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"responsive"	=> "all",
				"value"			=> array( esc_html_x( 'Customize Sizes', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"			=> "dropdown",
				"heading"		=> esc_html_x( 'Button Size', 'backend', 'ogo' ),
				"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"param_name"	=> "button_size",
				"dependency"	=> array(
					"element"		=> "customize_size",
					"not_empty"		=> true
				),
				"value"			=> array(
					esc_html_x( "Small", 'backend', 'ogo' ) 	=> 'small',
					esc_html_x( "Medium", 'backend', 'ogo' ) 	=> 'medium',
					esc_html_x( "Large", 'backend', 'ogo' ) 	=> 'large',
				),
				"std"			=> "medium"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Title Size', 'backend', 'ogo' ),
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"param_name"		=> "title_size",
				"edit_field_class" 	=> "vc_col-xs-6",
				"responsive"		=> "all",
				"dependency"		=> array(
					"element"	=> "customize_size",
					"not_empty"	=> true
				),
				"value"				=> "30px"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Title Line-Height', 'backend', 'ogo' ),
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"param_name"		=> "title_lh",
				"edit_field_class" 	=> "vc_col-xs-6",
				"responsive"		=> "all",
				"dependency"		=> array(
					"element"	=> "customize_size",
					"not_empty"	=> true
				),
				"value"				=> "36px"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Description Size', 'backend', 'ogo' ),
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"param_name"		=> "desc_size",
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
				"heading"			=> esc_html_x( 'Description Line-Height', 'backend', 'ogo' ),
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"param_name"		=> "desc_lh",
				"edit_field_class" 	=> "vc_col-xs-6",
				"responsive"		=> "all",
				"dependency"		=> array(
					"element"	=> "customize_size",
					"not_empty"	=> true
				),
				"value"				=> "26px"
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
				"heading"		=> esc_html_x( 'Text Alignment', 'backend', 'ogo' ),
				"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"param_name"	=> "module_alignment",
				"responsive"	=> "all",
				"dependency"		=> array(
					"element"	=> "customize_align",
					"not_empty"	=> true
				),
				"value"			=> array(
					esc_html_x( "Left", 'backend', 'ogo' ) 	=> 'left',
					esc_html_x( "Center", 'backend', 'ogo' ) 	=> 'center',
					esc_html_x( "Right", 'backend', 'ogo' ) 	=> 'right',
				),
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
				"type"				=> "textarea",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"param_name"		=> "title",
				"value"				=> ""
			),
			array(
				"type"				=> "textarea",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Description', 'backend', 'ogo' ),
				"param_name"		=> "description",
				"value"				=> ""
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Button Title', 'backend', 'ogo' ),
				"param_name"		=> "button_title",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> ""
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Banner Url', 'backend', 'ogo' ),
				"param_name"		=> "banner_url",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> "#"
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Button Position', 'backend', 'ogo' ),
				"param_name"		=> "button_pos",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> array(
					esc_html_x( 'Default', 'backend', 'ogo' )		=> 'default',
					esc_html_x( 'Floated', 'backend', 'ogo' )		=> 'floated',
				)
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "new_tab",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> array( esc_html_x( 'Open Link in New Tab', 'backend', 'ogo' ) => true ),
				"std"				=> '1'
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
		"name"				=> esc_html_x( 'RB Banner', 'backend', 'ogo' ),
		"base"				=> "rb_sc_banners",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Banners extends WPBakeryShortCode {
	    }
	}
?>