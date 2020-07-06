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
			"type"				=> "checkbox",
			"param_name"		=> "share_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array( esc_html_x( 'Extend Background to Previous Row', 'backend', 'ogo' ) => true ),
		),
		array(
			"type"				=> "checkbox",
			"param_name"		=> "custom_gradient",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array( esc_html_x( 'Custom Gradient', 'backend', 'ogo' ) => true ),
		),
		array(
			"type"				=> "textarea",
			"heading"			=> esc_html_x( 'Custom Gradient CSS', 'backend', 'ogo' ),
			"description"		=> esc_html_x( 'Please, enter css code of custom gradient', 'backend', 'ogo' ),
			"param_name"		=> "custom_gradient_css",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"dependency"		=> array(
				"element"	=> "custom_gradient",
				"not_empty"	=> true
			),
			"value"				=> ""
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Backgroung Gradient 1', 'backend', 'ogo' ),
			"param_name"		=> "bg_gradient_1",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> '#1fc5b6',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Backgroung Gradient 2', 'backend', 'ogo' ),
			"param_name"		=> "bg_gradient_2",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> '#296ad4',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Categories Background', 'backend', 'ogo' ),
			"param_name"		=> "cats_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> '#fff',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Categories Color', 'backend', 'ogo' ),
			"param_name"		=> "cats_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "title_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> '#fff',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Meta Color', 'backend', 'ogo' ),
			"param_name"		=> "meta_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> 'rgba(255,255,255, .8)',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Divider Color', 'backend', 'ogo' ),
			"param_name"		=> "divider_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> '#fff',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Breadcrumbs Color', 'backend', 'ogo' ),
			"param_name"		=> "breadcrumbs_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> 'rgba(255,255,255, .8)',
		),
		array(
			"type"				=> "checkbox",
			"param_name"		=> "customize_size",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"value"				=> array( esc_html_x( 'Customize Sizes', 'backend', 'ogo' ) => true ),
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Categories Size', 'backend', 'ogo' ),
			"param_name"		=> "category_size",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "17px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Size', 'backend', 'ogo' ),
			"param_name"		=> "title_size",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "70px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Title Margins', 'backend', 'ogo' ),
			"param_name"		=> "title_margins",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "0px 0px 0px 0px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Meta Size', 'backend', 'ogo' ),
			"param_name"		=> "meta_size",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "16px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Divider Margins', 'backend', 'ogo' ),
			"param_name"		=> "divider_margins",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "0px 0px 0px 0px",
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Breadcrumbs Size', 'backend', 'ogo' ),
			"param_name"		=> "breadcrumbs_size",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"		=> 'all',
			"dependency"		=> array(
				"element"	=> "customize_size",
				"not_empty"	=> true
			),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "17px",
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
				"type"				=> "checkbox",
				"param_name"		=> "show_mask",
				"value"				=> array( esc_html_x( 'Show Mask', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> esc_html_x( 'SVG Mask', 'backend', 'ogo' ),
				"param_name"		=> "mask",
				"edit_field_class" 	=> "vc_col-xs-6",
				"dependency"		=> array(
					"element"	=> "show_mask",
					"not_empty"	=> true
				),
				"value"				=> ""
			),
			array(
				"type" 				=> "dropdown",
				"heading" 			=> esc_html__("Mask Start Pos", 'ogo'),
				"param_name" 		=> "mask_start",
				"edit_field_class" 	=> "vc_col-xs-6",
				"dependency"		=> array(
					"element"	=> "show_mask",
					"not_empty"	=> true
				),
				"value" 			=> array(
					esc_html__("Top Left", 'ogo') 		=> "top_left",
					esc_html__("Top Center", 'ogo') 		=> "top_center",
					esc_html__("Top Right", 'ogo') 		=> "top_right",
					esc_html__("Right Center", 'ogo') 	=> "right_center",
					esc_html__("Bottom Right", 'ogo') 	=> "bottom_right",
					esc_html__("Bottom Center", 'ogo')	=> "bottom_center",
					esc_html__("Bottom Left", 'ogo') 		=> "bottom_left",
					esc_html__("Left Center", 'ogo') 		=> "left_center",
				),
			),
			array(
				"type"				=> "attach_image",
				"heading"			=> esc_html_x( 'Interactive Image', 'backend', 'ogo' ),
				"param_name"		=> "interactive_img",
				"value"				=> ""
			),
			array(
				"type" 				=> "rb_dropdown",
				"heading" 			=> esc_html__("Hide", 'ogo'),
				"multiple"			=> "true",
				"param_name" 		=> "hide_fields",
				"value" 			=> array(
					esc_html__("None", 'ogo') 		=> "none",
					esc_html__("Categories", 'ogo') 	=> "cats",
					esc_html__("Title", 'ogo') 		=> "title",
					esc_html__("Meta", 'ogo') 		=> "meta",
					esc_html__("Divider", 'ogo') 		=> "divider",
					esc_html__("Breadcrumbs", 'ogo')	=> "breadcrumbs",
				),
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "mouse_anim",
				"value"				=> array( esc_html_x( 'Mouse Move Animation', 'backend', 'ogo' ) => true ),
				"std"				=> "1"
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "scroll_anim",
				"value"				=> array( esc_html_x( 'Scroll Animation', 'backend', 'ogo' ) => true ),
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

	/* -----> MODULE DECLARATION <----- */
	vc_map( array(
		"name"				=> esc_html_x( 'RB Title Area', 'backend', 'ogo' ),
		"base"				=> "rb_sc_title_area",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",		
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Title_Area extends WPBakeryShortCode {
	    }
	}
?>