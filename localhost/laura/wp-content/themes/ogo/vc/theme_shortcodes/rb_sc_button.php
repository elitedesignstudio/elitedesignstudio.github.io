<?php
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
			"heading"		=> esc_html_x( 'Aligning', 'backend', 'ogo' ),
			"param_name"	=> "aligning",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> "all",
			"dependency"	=> array(
				"element"		=> "customize_align",
				"not_empty"		=> true
			),
			"value"			=> array(
				esc_html_x( 'Left', 'backend', 'ogo' )	=> 'left',
				esc_html_x( 'Center', 'backend', 'ogo' )	=> 'center',
				esc_html_x( 'Right', 'backend', 'ogo' )	=> 'right',
			)
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html_x( 'Button Size', 'backend', 'ogo' ),
			"param_name"	=> "btn_size",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"			=> array(
				esc_html_x( 'Large', 'backend', 'ogo' )		=> 'large',
				esc_html_x( 'Medium', 'backend', 'ogo' )		=> 'medium',
				esc_html_x( 'Small', 'backend', 'ogo' )		=> 'small',
			)
		),
		array(
			"type"			=> "dropdown",
			"heading"		=> esc_html_x( 'Button Style', 'backend', 'ogo' ),
			"param_name"	=> "btn_style",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"			=> array(
				esc_html_x( 'Default', 'backend', 'ogo' )		=> 'default',
				esc_html_x( 'Dashed', 'backend', 'ogo' )		=> 'dashed_default',
				esc_html_x( 'Custom', 'backend', 'ogo' )		=> 'custom',
			),
			"std"			=> 'default'
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Style', 'backend', 'ogo' ),
			"param_name"		=> "btn_custom_style",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"dependency"		=> array(
				"element"	=> "btn_style",
				"value"		=> "custom"
			),
			"value"				=> array(
				esc_html_x( 'Default', 'backend', 'ogo' )	=> 'default',
				esc_html_x( 'Dashed', 'backend', 'ogo' )	=> 'dashed',
			),
			"std"				=> 'custom_filled'
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "btn_font_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"dependency"		=> array(
				"element"	=> "btn_style",
				"value"		=> "custom"
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Hover Color', 'backend', 'ogo' ),
			"param_name"		=> "btn_font_color_hover",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "btn_style",
				"value"		=> "custom"
			),
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Main Background', 'backend', 'ogo' ),
			"param_name"		=> "main_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"dependency"		=> array(
				"element"	=> "btn_style",
				"value"		=> "custom"
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Rear Background', 'backend', 'ogo' ),
			"param_name"		=> "rear_background",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"dependency"		=> array(
				"element"	=> "btn_style",
				"value"		=> "custom"
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> SECONDARY_COLOR
		),
	);

	/* -----> RESPONSIVE STYLING TABS PROPERTIES <----- */
	$styles_landscape = $styles_portrait = $styles_mobile = $styles;

	$styles_landscape =  rb_responsive_styles($styles_landscape, 'landscape', rb_landscape_group_name());
	$styles_portrait =  rb_responsive_styles($styles_portrait, 'portrait', rb_tablet_group_name());
	$styles_mobile =  rb_responsive_styles($styles_mobile, 'mobile', rb_mobile_group_name());

	$params = rb_ext_merge_arrs( array(
		/* -----> GENERAL TAB <----- */
		array(
			array(
				"type"				=> "textfield",
				"admin_label"		=> true,
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"param_name"		=> "title",
				"value"				=> "Click Me!"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Link', 'backend', 'ogo' ),
				"edit_field_class" 	=> "vc_col-xs-6",
				"param_name"		=> "url",
				"value"				=> "#"
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "new_tab",
				"value"				=> array( esc_html_x( 'Open in New Tab', 'backend', 'ogo' ) => true ),
				"std"				=> "1"
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
	vc_map( array(
		"name"				=> esc_html_x( 'RB Button', 'backend', 'ogo' ),
		"base"				=> "rb_sc_button",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Button extends WPBakeryShortCode {
	    }
	}
?>