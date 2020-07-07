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
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
			"param_name"		=> "title_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Meta Color', 'backend', 'ogo' ),
			"param_name"		=> "meta_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> PRIMARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Divider Color', 'backend', 'ogo' ),
			"param_name"		=> "divider_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> SECONDARY_COLOR,
		),
		array(
			"type"				=> "colorpicker",
			"heading"			=> esc_html_x( 'Background Color', 'backend', 'ogo' ),
			"param_name"		=> "background_color",
			"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
			"edit_field_class" 	=> "vc_col-xs-6",
			"value"				=> rb_Hex2RGBA( SECONDARY_COLOR, '0.96' )
		),
	);

	/* -----> GET TAXONOMIES <----- */
	$post_type = "rb_portfolio";
	$taxonomies = $titles_arr = array();
	$taxes = get_object_taxonomies ( 'rb_portfolio', 'object' );
	$avail_taxes = array(
		esc_html_x( 'None', 'backend', 'ogo' )	=> '',
		esc_html_x( 'Titles', 'backend', 'ogo' )	=> 'title',
	);
	$portfolio_hide_meta = get_theme_mod('rb_portfolio_hide_meta') ? get_theme_mod('rb_portfolio_hide_meta') : array();

	foreach( $taxes as $tax => $tax_obj ){
		$tax_name = isset( $tax_obj->labels->name ) && !empty( $tax_obj->labels->name ) ? $tax_obj->labels->name : $tax;
		$avail_taxes[$tax_name] = $tax;
	}
	array_push( $taxonomies, array(
		"type"			=> "dropdown",
		"heading"		=> esc_html__( 'Filter by', 'ogo' ),
		"param_name"	=> "tax",
		"description"	=> esc_html_x( 'Filter by titles is not applicable when Motion Category Layout used.', 'backend', 'ogo' ),
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
		array(
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Layout', 'backend', 'ogo' ),
				"param_name"		=> "layout",
				"value"				=> array(
					esc_html_x( 'Grid', 'backend', 'ogo' )					=> 'grid',
					esc_html_x( 'Grid with Filter', 'backend', 'ogo' )		=> 'grid_filter',
					esc_html_x( 'Masonry', 'backend', 'ogo' )				=> 'masonry',
					esc_html_x( 'Pinterest', 'backend', 'ogo' )				=> 'pinterest',
					esc_html_x( 'Asymmetric', 'backend', 'ogo' )			=> 'asymmetric',
					esc_html_x( 'Carousel', 'backend', 'ogo' )				=> 'carousel',
					esc_html_x( 'Carousel Wide', 'backend', 'ogo' )			=> 'carousel_wide',
					esc_html_x( 'Motion Category', 'backend', 'ogo' )		=> 'motion_category',
				),
				"std"				=> get_theme_mod('rb_portfolio_layout')
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Hover', 'backend', 'ogo' ),
				"param_name"		=> "hover",
				"value"				=> array(
					esc_html_x( 'Overlay', 'backend', 'ogo' )				=> 'overlay',
					esc_html_x( 'Slide From Bottom', 'backend', 'ogo' )		=> 'slide_bottom',
					esc_html_x( 'Slide From Left', 'backend', 'ogo' )		=> 'slide_left',
					esc_html_x( 'Swipe Right', 'backend', 'ogo' )			=> 'swipe_right',
				),
				'dependency'	=> array(
					'element'		=> 'layout',
					'value'			=> array( "grid", "grid_filter", "masonry", "pinterest", "asymmetric", "carousel", "motion_category" )
				),
				"std"			=> get_theme_mod('rb_portfolio_hover')
			),
		),
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
				'std'				=> get_theme_mod('rb_portfolio_orderby')
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Order', 'backend', 'ogo' ),
				"param_name"		=> "order",
				"value"				=> array(
					esc_html_x( 'ASC', 'backend', 'ogo' )		=> 'ASC',
					esc_html_x( 'DESC', 'backend', 'ogo' )	=> 'DESC',
				),
				'std'				=> get_theme_mod('rb_portfolio_order')
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
					esc_html_x( '5', 'backend', 'ogo' )		=> '5',
					esc_html_x( '6', 'backend', 'ogo' )		=> '6',
				),
				'dependency'	=> array(
					'element'	=> 'layout',
					'value'		=> array( "grid", "grid_filter", "masonry", "pinterest", "carousel" )
				),
				"std"				=> get_theme_mod('rb_portfolio_columns')
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
				"value"				=> "-1",
				'dependency'		=> array(
					'element'	=> 'layout',
					'value'		=> array( "grid", "grid_filter", "masonry", "pinterest", "asymmetric" )
				),
				"std"				=> get_theme_mod('rb_portfolio_items_pp')
			),
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html_x( 'Max Image Size', 'backend', 'ogo' ),
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
				'param_name'		=> 'infinite_carousel',
				'dependency'		=> array(
					'element'	=> 'layout',
					'value'		=> "carousel"
				),
				'value'				=> array(
					esc_html_x( 'Infitine Carousel', 'backend', 'ogo' ) => true
				),
			),
			array(
				'type'				=> 'checkbox',
				'param_name'		=> 'square_img',
				'value'				=> array(
					esc_html_x( 'Square Images', 'backend', 'ogo' ) => true
				),
				'std'				=> get_theme_mod('rb_portfolio_square_img')
			),
			array(
				'type'				=> 'checkbox',
				'param_name'		=> 'no_spacing',
				'value'				=> array(
					esc_html_x( 'Disable Spacings', 'backend', 'ogo' ) => true
				),
				'dependency'	=> array(
					'element'	=> 'layout',
					'value'		=> array( "grid", "grid_filter", "masonry", "pinterest" )
				),
				'std'				=> get_theme_mod('rb_portfolio_no_spacing')
			),
			array(
				"type"				=> "dropdown",
				"heading"			=> esc_html_x( 'Pagination', 'backend', 'ogo' ),
				"param_name"		=> "pagination",
				"value"				=> array(
					esc_html_x( 'Standart', 'backend', 'ogo' )		=> 'standart',
					esc_html_x( 'Load More', 'backend', 'ogo' )		=> 'load_more',
				),
				'dependency'		=> array(
					'element'	=> 'layout',
					'value'		=> array( "grid", "grid_filter", "masonry", "pinterest", "asymmetric" )
				),
				"std"				=> get_theme_mod('rb_portfolio_pagination')
			),
			array(
				'type'				=> 'checkbox',
				'param_name'		=> 'hide_meta',
				'value'				=> array(
					esc_html_x( 'Hide Meta Data', 'backend', 'ogo' ) => true
				),
				'std'				=> '1'
			),
			array(
				'type'			=> 'rb_dropdown',
				'multiple'		=> "true",
				'heading'		=> esc_html_x( 'Hide', 'backend', 'ogo' ),
				'param_name'	=> 'portfolio_hide_meta',
				'dependency'	=> array(
					'element'	=> 'hide_meta',
					'not_empty'	=> true
				),
				'value'			=> array(
					esc_html_x( 'None', 'backend', 'ogo' )					=> '',
					esc_html_x( 'Title', 'backend', 'ogo' )					=> 'title',
					esc_html_x( 'Categories', 'backend', 'ogo' )				=> 'categories',
					esc_html_x( 'Tags', 'backend', 'ogo' )					=> 'tags',
				),
				'std'			=> implode(',', $portfolio_hide_meta)
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
		"name"				=> esc_html_x( 'RB Portfolio', 'backend', 'ogo' ),
		"base"				=> "rb_sc_portfolio",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Portfolio extends WPBakeryShortCode {
	    }
	}
?>