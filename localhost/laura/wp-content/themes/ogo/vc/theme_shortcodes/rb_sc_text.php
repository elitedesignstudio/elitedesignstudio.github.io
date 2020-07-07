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
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Button Style', 'backend', 'ogo' ),
			"param_name"		=> "button_type",
			"edit_field_class" 	=> "vc_col-xs-4",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array(
				esc_html_x( "Default", 'backend', 'ogo' ) 		=> 'default',
				esc_html_x( "Dashed", 'backend', 'ogo' ) 			=> 'dashed',
			),
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Title Style', 'backend', 'ogo' ),
			"param_name"		=> "title_type",
			"edit_field_class" 	=> "vc_col-xs-4",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array(
				esc_html_x( "Default", 'backend', 'ogo' ) 		=> 'default',
				esc_html_x( "With Shadow", 'backend', 'ogo' ) 	=> 'shadow',
			),
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Shadow', 'backend', 'ogo' ),
			"param_name"		=> "title_shadow",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"dependency"		=> array(
				"element"	=> "title_type",
				"value"		=> array( 'shadow' )
			),
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Sub-Title Style', 'backend', 'ogo' ),
			"param_name"		=> "subtitle_type",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array(
				esc_html_x( "Default", 'backend', 'ogo' ) 		=> 'default',
				esc_html_x( "Aside", 'backend', 'ogo' ) 			=> 'aside',
				esc_html_x( "Border Divider", 'backend', 'ogo' ) 	=> 'border_divider',
				esc_html_x( "Dashed Divider", 'backend', 'ogo' )	=> 'dashed_divider',
			),
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
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> 'all',
			"value"			=> array( esc_html_x( 'Customize Sizes', 'backend', 'ogo' ) => true ),
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Subtitle Size', 'backend', 'ogo' ),
			"param_name"		=> "subtitle_size",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "22px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Subtitle Line-Height', 'backend', 'ogo' ),
			"param_name"		=> "subtitle_lh",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "22px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Size', 'backend', 'ogo' ),
			"param_name"		=> "title_size",
			"edit_field_class" 	=> "vc_col-xs-4",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "60px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Line-Height', 'backend', 'ogo' ),
			"param_name"		=> "title_lh",
			"edit_field_class" 	=> "vc_col-xs-4",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "1.18em",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Margin', 'backend', 'ogo' ),
			"param_name"		=> "title_margin",
			"edit_field_class" 	=> "vc_col-xs-4",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "0px 0px 32px 0px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Content Size', 'backend', 'ogo' ),
			"param_name"		=> "content_size",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "19px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Content Line-Height', 'backend', 'ogo' ),
			"param_name"		=> "content_lh",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "34px",
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Button Size', 'backend', 'ogo' ),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"param_name"		=> "button_size",
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"		=> "customize_size",
				"not_empty"		=> true
			),
			"value"				=> array(
				esc_html_x( "Small", 'backend', 'ogo' ) 	=> 'small',
				esc_html_x( "Medium", 'backend', 'ogo' ) 	=> 'medium',
				esc_html_x( "Large", 'backend', 'ogo' ) 	=> 'large',
			),
			"std"				=> "medium"
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Button Margin Top', 'backend', 'ogo' ),
			"param_name"		=> "button_margin",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"value"				=> "50px",
		),
		array(
			"type"			=> "checkbox",
			"param_name"	=> "customize_colors",
			"std"			=> "1",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"			=> array( esc_html_x( 'Customize Colors', 'backend', 'ogo' ) => true ),
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "custom_title_color",
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
			"heading"			=> esc_html_x( 'Subtitle Color', 'backend', 'ogo' ),
			"param_name"		=> "custom_subtitle_color",
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
			"heading"			=> esc_html_x( 'Font Color', 'backend', 'ogo' ),
			"param_name"		=> "custom_font_color",
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
			"heading"			=> esc_html_x( 'Font Color Hover', 'backend', 'ogo' ),
			"param_name"		=> "custom_font_color_hover",
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
			"heading"			=> esc_html_x( 'List Markers Color', 'backend', 'ogo' ),
			"param_name"		=> "custom_font_list_markers",
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
			"heading"			=> esc_html_x( 'Subtitle Attachment', 'backend', 'ogo' ),
			"param_name"		=> "custom_attachment_color",
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
		array(
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Subtitle', 'backend', 'ogo' ),
				"param_name"		=> "subtitle",
				"value"				=> "",
				"admin_label"		=> true,
			),
			array(
				"type"				=> "textarea",
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"param_name"		=> "title",
				"value"				=> "",
				"edit_field_class" 	=> "vc_col-xs-6",
				"admin_label"		=> true,
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Title HTML Tag', 'backend', 'ogo' ),
				"param_name"		=> "title_tag",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> array(
					esc_html_x( "Default - (H3)", 'backend', 'ogo' ) 	=> 'h3',
					esc_html_x( "H1", 'backend', 'ogo' ) 				=> 'h1',
					esc_html_x( "H2", 'backend', 'ogo' ) 				=> 'h2',
					esc_html_x( "H3", 'backend', 'ogo' ) 				=> 'h3',
					esc_html_x( "H4", 'backend', 'ogo' ) 				=> 'h4',
					esc_html_x( "H5", 'backend', 'ogo' ) 				=> 'h5',
					esc_html_x( "H6", 'backend', 'ogo' ) 				=> 'h6',
				),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Button Title', 'backend', 'ogo' ),
				"param_name"		=> "button_title",
				"value"				=> "",
				"edit_field_class" 	=> "vc_col-xs-6",
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Button URL', 'backend', 'ogo' ),
				"param_name"		=> "button_url",
				"value"				=> "#",
				"edit_field_class" 	=> "vc_col-xs-6",
			),
			array(
				"type"				=> "textarea_html",
				"heading"			=> esc_html_x( 'Text', 'backend', 'ogo' ),
				"param_name"		=> "content",
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
		"name"				=> esc_html_x( 'RB Text', 'backend', 'ogo' ),
		"base"				=> "rb_sc_text",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",		
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Text extends WPBakeryShortCode {
	    }
	}
?>