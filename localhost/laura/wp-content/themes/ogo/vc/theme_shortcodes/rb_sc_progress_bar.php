<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = array(
		array(
			"type"			=> "css_editor",
			"param_name"	=> "custom_styles",
			"group"			=> esc_html_x( "Styling", 'RB_VC_Gallery', 'ogo' ),
			"responsive"	=> 'all',
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
				"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
				"param_name"		=> "title",
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Percents', 'backend', 'ogo' ),
				"param_name"		=> "percents",
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
				"param_name"		=> "title_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> PRIMARY_COLOR
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Percents Color', 'backend', 'ogo' ),
				"param_name"		=> "percents_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> THIRD_COLOR
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Gradient Color 1', 'backend', 'ogo' ),
				"param_name"		=> "gradient_color_1",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> THIRD_COLOR
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Gradient Color 2', 'backend', 'ogo' ),
				"param_name"		=> "gradient_color_2",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> THIRD_COLOR
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Bar Background', 'backend', 'ogo' ),
				"param_name"		=> "bar_bg_color",
				"value"				=> "#FFF9BB"
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
		"name"				=> esc_html_x( 'RB Progress Bar', 'backend', 'ogo' ),
		"base"				=> "rb_sc_progress_bar",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",		
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Progress_Bar extends WPBakeryShortCode {
	    }
	}
?>