<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = array(
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Background Color', 'backend', 'ogo' ),
			"param_name"		=> "background_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> "#D4F4F1"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Header Background', 'backend', 'ogo' ),
			"param_name"		=> "header_background",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> THIRD_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Ribbon Color', 'backend', 'ogo' ),
			"param_name"		=> "ribbon_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"	=> array(
				'element'	=> 'highlighted',
				'not_empty'	=> true
			),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Ribbon Background', 'backend', 'ogo' ),
			"param_name"		=> "ribbon_background",
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"	=> array(
				'element'	=> 'highlighted',
				'not_empty'	=> true
			),
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "title_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Divider Color', 'backend', 'ogo' ),
			"param_name"		=> "divider_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Price Color', 'backend', 'ogo' ),
			"param_name"		=> "price_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> "#fff"
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icons Color', 'backend', 'ogo' ),
			"param_name"		=> "icons_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> rb_Hex2RGBA( PRIMARY_COLOR, '0.3' )
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Text Color', 'backend', 'ogo' ),
			"param_name"		=> "text_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> rb_Hex2RGBA( PRIMARY_COLOR, '0.5' )
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Title', 'backend', 'ogo' ),
			"param_name"		=> "button_title_color",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Hover Title', 'backend', 'ogo' ),
			"param_name"		=> "button_hover_title",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> SECONDARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Main Background', 'backend', 'ogo' ),
			"param_name"		=> "button_main_bg",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> PRIMARY_COLOR
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Button Rear Background', 'backend', 'ogo' ),
			"param_name"		=> "button_rear_bg",
			"edit_field_class" 	=> "vc_col-xs-6",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> SECONDARY_COLOR
		),
	);
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
				"heading"			=> esc_html_x( 'Currency', 'backend', 'ogo' ),
				"param_name"		=> "currency",
				"edit_field_class" 	=> "vc_col-xs-4",
				"default"			=> "$"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Price', 'backend', 'ogo' ),
				"param_name"		=> "price",
				"edit_field_class" 	=> "vc_col-xs-4",
				"default"			=> "49"
			),
			array(
				"type"				=> "textarea",
				"heading"			=> esc_html_x( 'Price Description', 'backend', 'ogo' ),
				"param_name"		=> "price_desc",
				"edit_field_class" 	=> "vc_col-xs-4",
				"default"			=> ""
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
						"heading"			=> esc_html_x( 'Title', 'backend', 'ogo' ),
						"param_name"		=> "title",
                        'admin_label' 		=> true,
					),
                ),
				'value' 		=> array(),
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
				"type"				=> "checkbox",
				"param_name"		=> "highlighted",
				"value"				=> array( esc_html_x( 'Highlighted', 'backend', 'ogo' ) => true ),
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Highlight Label', 'backend', 'ogo' ),
				"param_name"		=> "highlight_label",
				"default"			=> "Popular",
				"dependency"		=> array(
					"element"	=> "highlighted",
					"not_empty"	=> true
				),
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
		$styles
	));

	/* -----> MODULE DECLARATION <----- */
	vc_map( array(
		"name"				=> esc_html_x( 'RB Pricing Plan', 'backend', 'ogo' ),
		"base"				=> "rb_sc_pricing_plan",
		'category'			=> "By RB",
		"icon"     			=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Pricing_Plan extends WPBakeryShortCode {
	    }
	}

?>