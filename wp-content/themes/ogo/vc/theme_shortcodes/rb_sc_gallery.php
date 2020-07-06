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
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Text Color', 'backend', 'ogo' ),
			"param_name"		=> "text_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> '#fff',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Overlay Gradient 1', 'backend', 'ogo' ),
			"param_name"		=> "overlay_gradient_1",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> 'rgba(255,175,0, .75)',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Overlay Gradient 2', 'backend', 'ogo' ),
			"param_name"		=> "overlay_gradient_2",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> 'rgba(255,104,73, .75)',
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
				"type"			=> "dropdown",
				"heading"		=> esc_html_x( 'Columns', 'RB_VC_Button', 'ogo' ),
				"param_name"	=> "columns",
				"value"			=> array(
					esc_html_x( 'Two', 'RB_VC_Button', 'ogo' )		=> '2',
					esc_html_x( 'Three', 'RB_VC_Button', 'ogo' )		=> '3',
					esc_html_x( 'Four', 'RB_VC_Button', 'ogo' )		=> '4',
				),
				"std"			=> '3'
			),
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html_x( 'Max Thumbnail Size', 'backend', 'ogo' ),
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
                'type' 			=> 'param_group',
                'heading' 		=> esc_html_x( 'Images', 'backend', 'ogo' ),
                'param_name' 	=> 'values',
                'params' 		=> array(
					array(
						"type"				=> "attach_image",
						"heading"			=> esc_html_x( 'Image', 'backend', 'ogo' ),
						"param_name"		=> "image",
						"value"				=> ""
					),
					array(
						"type"				=> "textfield",
						"admin_label"		=> true,
						"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
						"param_name"		=> "title",
						"edit_field_class" 	=> "vc_col-xs-6",
						"value"				=> ""
					),
					array(
						"type"				=> "textfield",
						"heading"			=> esc_html_x( 'Subtitle', 'backend', 'ogo' ),
						"param_name"		=> "subtitle",
						"edit_field_class" 	=> "vc_col-xs-6",
						"value"				=> ""
					),
                ),
                "value"			=> "",
            ),
            array(
				"type"			=> "dropdown",
				"heading"		=> esc_html_x( 'Link to:', 'RB_VC_Button', 'ogo' ),
				"param_name"	=> "url",
				"value"			=> array(
					esc_html_x( 'None', 'RB_VC_Button', 'ogo' )				=> 'none',
					esc_html_x( 'Media File', 'RB_VC_Button', 'ogo' )		=> 'media',
					esc_html_x( 'Attachment Page', 'RB_VC_Button', 'ogo' )	=> 'attachment',
				),
				"std"			=> 'none'
			),
            array(
				"type"			=> "checkbox",
				"param_name"	=> "enable_masonry",
				"value"			=> array( esc_html_x( 'Enable Masonry', 'backend', 'ogo' ) => true ),
				"std"			=> '1'
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
		"name"				=> esc_html_x( 'RB Gallery', 'backend', 'ogo' ),
		"base"				=> "rb_sc_gallery",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",		
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Gallery extends WPBakeryShortCode {
	    }
	}
?>