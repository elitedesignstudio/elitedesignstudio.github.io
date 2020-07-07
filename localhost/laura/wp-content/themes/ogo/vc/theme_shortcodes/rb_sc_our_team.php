<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$styles = array(
		array(
			"type"			=> "css_editor",
			"param_name"	=> "custom_styles",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"responsive"	=> "all",
		),
		array(
			"type"				=> "dropdown",
			"heading"			=> esc_html_x( 'Style', 'backend', 'ogo' ),
			"param_name"		=> "style",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"value"				=> array(
				esc_html_x( 'Triangle', 'backend', 'ogo' )	=> 'triangle',
				esc_html_x( 'Square', 'backend', 'ogo' )		=> 'square',
			),
			'std'				=> get_theme_mod('rb_staff_style')
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Meta Background', 'backend', 'ogo' ),
			"param_name"		=> "meta_background",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "titles_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Links Color', 'backend', 'ogo' ),
			"param_name"		=> "links_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icons Color', 'backend', 'ogo' ),
			"param_name"		=> "socials_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> THIRD_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Icons Background', 'backend', 'ogo' ),
			"param_name"		=> "socials_bg",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Hover Background', 'backend', 'ogo' ),
			"param_name"		=> "background_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> rb_Hex2RGBA( THIRD_COLOR, '0.8' ),
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Carousel Dots', 'backend', 'ogo' ),
			"param_name"		=> "carousel_dots",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> "#E5E5E5",
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Carousel Active Dot', 'backend', 'ogo' ),
			"param_name"		=> "carousel_active_dot",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> SECONDARY_COLOR,
		),
	);

	/* -----> GET TAXONOMIES <----- */
	$post_type = "rb_staff";
	$taxonomies = $titles_arr = array();
	$taxes = get_object_taxonomies ( 'rb_staff', 'object' );
	$avail_taxes = array(
		esc_html_x( 'None', 'backend', 'ogo' )	=> '',
		esc_html_x( 'Titles', 'backend', 'ogo' )	=> 'title',
	);

	$staff_hide_meta = get_theme_mod('rb_staff_hide_meta') ? get_theme_mod('rb_staff_hide_meta') : array();

	foreach( $taxes as $tax => $tax_obj ){
		$tax_name = isset( $tax_obj->labels->name ) && !empty( $tax_obj->labels->name ) ? $tax_obj->labels->name : $tax;
		$avail_taxes[$tax_name] = $tax;
	}
	array_push( $taxonomies, array(
		"type"			=> "dropdown",
		"heading"		=> esc_html__( 'Filter by', 'ogo' ),
		"param_name"	=> "tax",
		"value"			=> $avail_taxes
	));
	foreach ( $avail_taxes as $tax_name => $tax ) {
		if ($tax == 'title'){
			global $wpdb;

			$results = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type LIKE %s and post_status = 'publish'", $post_type ) );

		    foreach( $results as $index => $post ) {
		    	$post_title = $post->post_title;
		        $titles_arr[$post_title] = $post->ID;
		    }
			array_push( $taxonomies, array(
				"type"				=> "rb_dropdown",
				"multiple"			=> "true",
				"heading"			=> esc_html_x( 'Titles', 'backend', 'ogo' ),
				"param_name"		=> "titles",
				'edit_field_class'	=> 'inside-box vc_col-xs-12',
				"dependency"		=> array(
					"element"	=> "tax",
					"value"		=> 'title'
				),
				"value"				=> $titles_arr
			));		
		} else {
			$terms = get_terms( $tax );
			$avail_terms = array(
				''				=> ''
			);
			if ( !is_a( $terms, 'WP_Error' ) ){
				foreach ( $terms as $term ) {
					$avail_terms[$term->name] = $term->slug;
				}
			}
			array_push( $taxonomies, array(
				"type"			=> "rb_dropdown",
				"multiple"		=> "true",
				"heading"		=> $tax_name,
				"param_name"	=> "{$tax}_terms",
				"dependency"	=> array(
					"element"	=> "tax",
					"value"		=> $tax
				),
				"value"			=> $avail_terms
			));				
		}
	}

	$params = rb_ext_merge_arrs( array(
		/* -----> GENERAL TAB <----- */
		$taxonomies,
		array(
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Order By', 'backend', 'ogo' ),
				"param_name"		=> "orderby",
				"value"				=> array(
					esc_html_x( 'Date', 'backend', 'ogo' )		=> 'date',
					esc_html_x( 'Order ID', 'backend', 'ogo' )	=> 'menu_order',
					esc_html_x( 'Title', 'backend', 'ogo' )		=> 'title',
				),
				'std'				=> get_theme_mod('rb_staff_order_by')
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Order', 'backend', 'ogo' ),
				"param_name"		=> "order",
				"value"				=> array(
					esc_html_x( 'ASC', 'backend', 'ogo' )		=> 'ASC',
					esc_html_x( 'DESC', 'backend', 'ogo' )	=> 'DESC',
				),
				'std'				=> get_theme_mod('rb_staff_order')
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Columns', 'backend', 'ogo' ),
				"param_name"		=> "columns",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> array(
					esc_html_x( '2', 'backend', 'ogo' )		=> '2',
					esc_html_x( '3', 'backend', 'ogo' )		=> '3',
					esc_html_x( '4', 'backend', 'ogo' )		=> '4',
				),
				"std"				=> get_theme_mod('rb_staff_columns')
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Items to Show', 'backend', 'ogo' ),
				"description"		=> esc_html_x( 'Enter "-1" to show all posts', 'backend', 'ogo' ),
				"param_name"		=> "total_items_count",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> "-1"
			),
			array(
				"type"				=> "textfield",
				"heading"			=> esc_html_x( 'Items per Page', 'backend', 'ogo' ),
				"param_name"		=> "items_pp",
				"edit_field_class" 	=> "vc_col-xs-4",
				"value"				=> get_theme_mod('rb_staff_items_pp'),
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
				'type'				=> 'checkbox',
				'param_name'		=> 'carousel',
				'value'				=> array(
					esc_html_x( 'Carousel', 'backend', 'ogo' ) => true
				)
			),
			array(
				'type'				=> 'checkbox',
				'param_name'		=> 'hide_meta',
				'value'				=> array(
					esc_html_x( 'Hide Meta Data', 'backend', 'ogo' ) => true
				)
			),
			array(
				'type'			=> 'rb_dropdown',
				'multiple'		=> "true",
				'heading'		=> esc_html_x( 'Hide', 'backend', 'ogo' ),
				'param_name'	=> 'team_hide_meta',
				'dependency'	=> array(
					'element'	=> 'hide_meta',
					'not_empty'	=> true
				),
				'value'			=> array(
					esc_html_x( 'None', 'backend', 'ogo' )					=> '',
					esc_html_x( 'Name', 'backend', 'ogo' )					=> 'name',
					esc_html_x( 'Position', 'backend', 'ogo' )				=> 'position',
					esc_html_x( 'Department', 'backend', 'ogo' )				=> 'department',
					esc_html_x( 'Socials', 'backend', 'ogo' )					=> 'socials',
				),
				'std'			=> implode(',', $staff_hide_meta)
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
		"name"				=> esc_html_x( 'RB Our Team', 'backend', 'ogo' ),
		"base"				=> "rb_sc_our_team",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Our_Team extends WPBakeryShortCode {
	    }
	}
?>