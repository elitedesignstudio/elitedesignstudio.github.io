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
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Text color', 'backend', 'ogo' ),
				"param_name"		=> "text_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"value"				=> PRIMARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Meta color', 'backend', 'ogo' ),
				"param_name"		=> "meta_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"value"				=> PRIMARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Meta Background', 'backend', 'ogo' ),
				"param_name"		=> "meta_background",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"value"				=> SECONDARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Carousel Dots Color', 'backend', 'ogo' ),
				"param_name"		=> "dots_color",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"value"				=> PRIMARY_COLOR,
			),
			array(
				"type"				=> "colorpicker",
				"heading"			=> esc_html_x( 'Carousel Active Dot', 'backend', 'ogo' ),
				"param_name"		=> "active_dot",
				"edit_field_class" 	=> "vc_col-xs-6",
				"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
				"value"				=> SECONDARY_COLOR,
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
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Aligning', 'backend', 'ogo' ),
				"param_name"		=> "aligning",
				"value"				=> array(
					esc_html_x( 'Left', 'backend', 'ogo' )		=> 'left',
					esc_html_x( 'Right', 'backend', 'ogo' )		=> 'right',
				)
			),
			array(
				"type"				=> "checkbox",
				"param_name"		=> "autoplay",
				"value"				=> array( esc_html_x( 'Autoplay', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Autoplay Speed', 'backend', 'ogo' ),
				"param_name"		=> "autoplay_speed",
				"edit_field_class" 	=> "vc_col-xs-6",
				"dependency"		=> array(
					"element"	=> "autoplay",
					"not_empty"	=> true
				),
				"value"				=> "3000"
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Main Shape', 'backend', 'ogo' ),
				"param_name"		=> "main_shape",
				"edit_field_class" 	=> "vc_col-xs-6",
				"value"				=> array(
					esc_html_x( 'Round', 'backend', 'ogo' )		=> 'round',
					esc_html_x( 'Square', 'backend', 'ogo' )	=> 'square',
					esc_html_x( 'Triangle', 'backend', 'ogo' )	=> 'triangle',
				)
			),
			array(
                'type' 			=> 'param_group',
                'heading' 		=> esc_html_x( 'Testimonials', 'backend', 'ogo' ),
                'param_name' 	=> 'values',
                'params' 		=> array(
                	array(
						"type"				=> "attach_image",
						"heading"			=> esc_html_x( 'Image', 'RB_VC_Image', 'ogo' ),
						"param_name"		=> "image",
					),
                	array(
						"type"				=> "textfield",
						"admin_label"		=> true,
						"heading"			=> esc_html_x( 'Name', 'backend', 'ogo' ),
						"param_name"		=> "name",
						"edit_field_class" 	=> "vc_col-xs-6",
						"value"				=> ""
					),
					array(
						"type"				=> "textfield",
						"admin_label"		=> true,
						"heading"			=> esc_html_x( 'Position', 'backend', 'ogo' ),
						"param_name"		=> "position",
						"edit_field_class" 	=> "vc_col-xs-6",
						"value"				=> ""
					),
					array(
						"type"				=> "textarea",
						"heading"			=> esc_html_x( 'Content', 'backend', 'ogo' ),
						"param_name"		=> "description",
						"value"				=> ""
					),
                ),
                "value"			=> "",
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
		"name"				=> esc_html_x( 'RB Testimonials', 'backend', 'ogo' ),
		"base"				=> "rb_sc_testimonials",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Testimonials extends WPBakeryShortCode {
	    }
	}
?>