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
			"param_name"	=> "customize_size",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> "all",
			"value"			=> array( esc_html_x( 'Customize Size', 'backend', 'ogo' ) => true ),
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
			"value"				=> "35px",
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
			"value"				=> "20px 0px 0px 0px",
		),
        array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Text Size', 'backend', 'ogo' ),
			"param_name"		=> "text_size",
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
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Shape Background', 'backend', 'ogo' ),
			"param_name"		=> "shape_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> THIRD_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icon Color', 'backend', 'ogo' ),
			"param_name"		=> "icon_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> '#fff',
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Number Color', 'backend', 'ogo' ),
			"param_name"		=> "number_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Number Background', 'backend', 'ogo' ),
			"param_name"		=> "number_background",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "title_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Text Color', 'backend', 'ogo' ),
			"param_name"		=> "text_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Line Color', 'backend', 'ogo' ),
			"param_name"		=> "line_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> SECONDARY_COLOR,
		)
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
				"heading"		=> esc_html_x( 'Style', 'backend', 'ogo' ),
				"param_name"	=> "style",
				"value"			=> array(
					'Square'		=> 'square',
					'Round' 		=> 'round',
					'Triangle' 		=> 'triangle',
				)
			),
			array(
                'type' 			=> 'param_group',
                'heading' 		=> esc_html_x( 'Values', 'backend', 'ogo' ),
                'param_name' 	=> 'values',
                'params' => array(
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( 'Icon library', 'backend', 'ogo' ),
						"param_name"	=> "icon_lib",
						"description"	=> esc_html_x( 'Select icon library', 'backend', 'ogo' ),
						"value"			=> array(
							'Font Awesome' 	=> 'fontawesome',
							'Open Iconic'	=> 'openiconic',
							'Typicons' 		=> 'typicons',
							'Entypo' 		=> 'entypo',
							'Linecons' 		=> 'linecons',
							'Mono Social' 	=> 'monosocial',
							'RB Flaticons' => 'rb_flaticons',
							'RB SVG' 		=> 'rb_svg'
						)
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_fontawesome',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'fontawesome'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_openiconic',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'type'			=> 'openiconic',
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'openiconic'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_typicons',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'type'			=> 'typicons',
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'typicons'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_entypo',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'type'			=> 'entypo',
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'entypo'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_linecons',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'type'			=> 'linecons',
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'linecons'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_monosocial',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'type'			=> 'monosocial',
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'monosocial'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "iconpicker",
						"heading"		=> esc_html_x( 'Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_rb_flaticons',
						"value"			=> '',
						"settings"		=> array(
							'emptyIcon'		=> true,
							'type'			=> 'rb_flaticons',
							'iconsPerPage'	=> 4000
						),
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'rb_flaticons'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"			=> "rb_svg",
						"heading"		=> esc_html_x( 'SVG Icon', 'backend', 'ogo' ),
						"param_name"	=> 'icon_rb_svg',
						"dependency"	=> array(
							'element'	=> 'icon_lib',
							'value'		=> 'rb_svg'
						),
						"description"	=> esc_html_x( 'Select icon from library', 'backend', 'ogo' ),
					),
					array(
						"type"				=> "textfield",
						"heading"			=> esc_html_x( 'Number', 'backend', 'ogo' ),
						"param_name"		=> "number",
						"edit_field_class" 	=> "vc_col-xs-3",
					),
					array(
						"type"				=> "textarea",
						"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
						"param_name"		=> "title",
						"edit_field_class" 	=> "vc_col-xs-9",
                        'admin_label' 		=> true,
					),
					array(
						"type"				=> "textarea",
						"heading"			=> esc_html_x( 'Description', 'backend', 'ogo' ),
						"param_name"		=> "description",
					),
					array(
						"type"				=> "checkbox",
						"param_name"		=> "active",
						"description"		=> esc_html_x( 'Please, mark it only once.', 'backend', 'ogo' ),
						"value"				=> array( esc_html_x( 'Active', 'backend', 'ogo' ) => true ),
					),
                ),
				'value' 		=> array(),
            ),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Extra class name', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'backend', 'ogo' ),
				"param_name"		=> "el_class",
				"value"				=> ""
			)
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
		"name"				=> esc_html_x( 'RB Roadmap', 'backend', 'ogo' ),
		"base"				=> "rb_sc_roadmap",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Roadmap extends WPBakeryShortCode {
	    }
	}
?>