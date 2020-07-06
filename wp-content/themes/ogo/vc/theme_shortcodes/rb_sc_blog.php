<?php

/* -----> STYLING TAB PROPERTIES <----- */
$styles = array(
	array(
		"type"			=> "css_editor",
		"param_name"	=> "custom_styles",
		"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"responsive"	=> "all"
	),
	array(
		"type"			=> "checkbox",
		"param_name"	=> "hover_animate",
		"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"value"			=> array( esc_html_x( 'Animate on Hover', 'backend', 'ogo' ) => true ),
		"dependency"	=> array(
			"element"	=> "layout",
			"value"		=> array( "2","3","4" )
		),
	),
	array(
		"type"			=> "checkbox",
		"param_name"	=> "customize_size",
		"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"value"			=> array( esc_html_x( 'Customize Sizes', 'backend', 'ogo' ) => true ),
	),
	array(
		"type"				=> "textfield",
		"heading"			=> esc_html_x( "Title Size", 'backend', 'ogo' ),
		"param_name"		=> "title_size",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> "24px",
		"dependency"		=> array(
			"element"	=> "customize_size",
			"not_empty"	=> true
		),
	),
	array(
		"type"				=> "textfield",
		"heading"			=> esc_html_x( "Title Line Height", 'backend', 'ogo' ),
		"param_name"		=> "title_lh",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> "31px",
		"dependency"		=> array(
			"element"	=> "customize_size",
			"not_empty"	=> true
		),
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Background Color', 'backend', 'ogo' ),
		"param_name"		=> "background_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"value"				=> "#fff"
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Title Color', 'backend', 'ogo' ),
		"param_name"		=> "title_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> PRIMARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Text Color', 'backend', 'ogo' ),
		"param_name"		=> "text_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> rb_Hex2RGBA( PRIMARY_COLOR, '0.8' )
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Accent Color', 'backend', 'ogo' ),
		"param_name"		=> "accent_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> SECONDARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Meta Color', 'backend', 'ogo' ),
		"param_name"		=> "meta_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> PRIMARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Date Color', 'backend', 'ogo' ),
		"param_name"		=> "date_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> PRIMARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Date Gradient 1', 'backend', 'ogo' ),
		"param_name"		=> "date_gradient_1",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> SECONDARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Date Gradient 2', 'backend', 'ogo' ),
		"param_name"		=> "date_gradient_2",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> SECONDARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Active Dot', 'backend', 'ogo' ),
		"param_name"		=> "active_dot",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"dependency"		=> array(
			"element"	=> "enable_carousel",
			"not_empty"	=> true
		),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> SECONDARY_COLOR
	),
	array(
		"type"				=> "colorpicker",
		"heading"			=> esc_html_x( 'Arrows Color', 'backend', 'ogo' ),
		"param_name"		=> "arrows_color",
		"group"				=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"dependency"		=> array(
			"element"	=> "enable_carousel",
			"not_empty"	=> true
		),
		"edit_field_class" 	=> "vc_col-xs-6",
		"value"				=> PRIMARY_COLOR
	),
	array(
		"type"			=> "dropdown",
		"heading"		=> esc_html_x( 'Button Style', 'backend', 'ogo' ),
		"param_name"	=> "btn_style",
		"group"			=> esc_html_x( "Styling", 'backend', 'ogo' ),
		"value"			=> array(
			esc_html_x( 'Simple', 'backend', 'ogo' )		=> 'simple',
			esc_html_x( 'Default', 'backend', 'ogo' )		=> 'default',
			esc_html_x( 'Dashed', 'backend', 'ogo' )		=> 'dashed_default',
			esc_html_x( 'Custom', 'backend', 'ogo' )		=> 'custom',
		),
		"std"			=> 'simple'
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
			esc_html_x( 'Simple', 'backend', 'ogo' )	=> 'simple',
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
		"value"				=> SECONDARY_COLOR
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

/* -----> GET TAXONOMIES <----- */
$post_type = "post";
$taxonomies = array();

$taxes = get_object_taxonomies ( $post_type, 'object' );
$avail_taxes = array(
	esc_html_x( 'None', 'backend', 'ogo' )	=> '',
	esc_html_x( 'Titles', 'backend', 'ogo' )	=> 'title',
);

foreach ( $taxes as $tax => $tax_obj ){
	$tax_name = isset( $tax_obj->labels->name ) && !empty( $tax_obj->labels->name ) ? $tax_obj->labels->name : $tax;
	$avail_taxes[$tax_name] = $tax;
}

array_push( $taxonomies, array(
	"type"				=> "dropdown",
	"heading"			=> esc_html_x( 'Filter by', 'backend', 'ogo' ),
	"param_name"		=> "post_tax",
	"value"				=> $avail_taxes
));

foreach ( $avail_taxes as $tax_name => $tax ) {
	if ($tax == 'title'){
		global $wpdb;
		$results = $wpdb->get_results( $wpdb->prepare( "SELECT ID, post_title FROM {$wpdb->posts} WHERE post_type LIKE %s and post_status = 'publish'", $post_type ) );
		$titles_arr = array(
			esc_html_x('None', 'backend', 'ogo') => ''
		);
	    foreach( $results as $index => $post ) {
	    	$post_title = $post->post_title;
	        $titles_arr[$post_title] =  $post->ID;
	    }
		array_push( $taxonomies, array(
			"type"				=> "rb_dropdown",
			"multiple"			=> "true",
			"heading"			=> esc_html_x( 'Titles', 'backend', 'ogo' ),
			"param_name"		=> "titles",
			'edit_field_class'	=> 'inside-box vc_col-xs-12',
			"dependency"		=> array(
				"element"	=> "post_tax",
				"value"		=> 'title'
			),
			"value"				=> $titles_arr
		));		
	} else {
		$terms = get_terms( $tax );
		$avail_terms = array(
			esc_html_x('None', 'backend', 'ogo') => ''
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
			"param_name"	=> "{$post_type}_{$tax}_terms",
			"dependency"	=> array(
				"element"	=> "post_tax",
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
			'type'				=> 'dropdown',
			'heading'			=> esc_html_x( 'Order by', 'backend', 'ogo' ),
			'param_name'		=> 'orderby',
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "post_tax",
				"value"		=> array( "title","category","post_tag","post_format", )
			),
			'value'				=> array(
				esc_html_x( 'Date', 'backend', 'ogo' ) 	=> 'date',
				esc_html_x( 'Title', 'backend', 'ogo' ) 	=> 'title',
			),
		),
		array(
			'type'				=> 'dropdown',
			'heading'			=> esc_html_x( 'Order', 'backend', 'ogo' ),
			'param_name'		=> 'order',
			"edit_field_class" 	=> "vc_col-xs-6",
			"dependency"		=> array(
				"element"	=> "post_tax",
				"value"		=> array( "title","category","post_tag","post_format", )
			),
			'value'				=> array(
				esc_html_x( 'DESC', 'backend', 'ogo' ) 	=> 'DESC',
				esc_html_x( 'ASC', 'backend', 'ogo' ) 	=> 'ASC',
			),
		),
		array(
			'type'				=> 'dropdown',
			'heading'			=> esc_html_x( 'Layout', 'backend', 'ogo' ),
			'param_name'		=> 'layout',
			'value'				=> array(
				esc_html_x( 'Large Image', 'backend', 'ogo' ) 	=> 'large',
				esc_html_x( 'Small Image', 'backend', 'ogo' ) 	=> 'small',
				esc_html_x( 'Two Columns', 'backend', 'ogo' ) 	=> '2',
				esc_html_x( 'Three Columns', 'backend', 'ogo' ) => '3',
				esc_html_x( 'Four Columns', 'backend', 'ogo' ) 	=> '4',
				esc_html_x( 'Checkerboard', 'backend', 'ogo' ) 	=> 'checkerboard',
			)
		),
		array(
			'type'				=> 'checkbox',
			'param_name'		=> 'enable_masonry',
			"dependency"		=> array(
				"element"	=> "layout",
				"value"		=> array( "2", "3", "4" )
			),
			'value'				=> array(
				esc_html_x( 'Masonry', 'backend', 'ogo' ) => true
			),
		),
		array(
			'type'				=> 'checkbox',
			'param_name'		=> 'enable_carousel',
			"dependency"		=> array(
				"element"	=> "layout",
				"value"		=> array("small", "2", "3", "4")
			),
			'value'				=> array(
				esc_html_x( 'Carousel', 'backend', 'ogo' ) => true
			),
		),
		array(
			'type'				=> 'checkbox',
			'param_name'		=> 'post_hide_meta_override',
			'value'				=> array(
				esc_html_x( 'Hide Meta Data', 'backend', 'ogo' ) => true
			)
		),
		array(
			'type'			=> 'rb_dropdown',
			'multiple'		=> "true",
			'heading'		=> esc_html_x( 'Hide', 'backend', 'ogo' ),
			'param_name'	=> 'post_hide_meta',
			'dependency'	=> array(
				'element'	=> 'post_hide_meta_override',
				'not_empty'	=> true
			),
			'value'			=> array(
				esc_html_x( 'None', 'backend', 'ogo' )				=> '',
				esc_html_x( 'Title', 'backend', 'ogo' )				=> 'title',
				esc_html_x( 'Categories', 'backend', 'ogo' )		=> 'cats',
				esc_html_x( 'Author', 'backend', 'ogo' )			=> 'author',
				esc_html_x( 'Date', 'backend', 'ogo' )				=> 'date',
				esc_html_x( 'Comments', 'backend', 'ogo' )			=> 'comments',
				esc_html_x( 'All Meta', 'customizer', 'ogo' )		=> 'meta',
				esc_html_x( 'Featured', 'backend', 'ogo' )			=> 'featured',
				esc_html_x( 'Read More', 'backend', 'ogo' )			=> 'read_more',
				esc_html_x( 'Excerpt', 'backend', 'ogo' )			=> 'excerpt',	
			)
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Items to display', 'backend', 'ogo' ),
			"description"		=> esc_html_x( 'Enter "-1" to show all posts', 'backend', 'ogo' ),
			"param_name"		=> "total_items_count",
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> '-1'
		),
		array(
			"type"				=> "textfield",
			"heading"			=> esc_html_x( 'Items per Page', 'backend', 'ogo' ),
			"param_name"		=> "items_pp",
			"edit_field_class" 	=> "vc_col-xs-4",
			"value"				=> "9",
		),
		array(
			'type'				=> 'textfield',
			'heading'			=> esc_html_x( 'Content Character Limit', 'backend', 'ogo' ),
			'param_name'		=> 'chars_count',
			"edit_field_class" 	=> "vc_col-xs-4",
			'value'				=> get_theme_mod('blog_chars_count'),
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html_x( 'More button caption', 'backend', 'ogo' ),
			"param_name"	=> "more_btn_text",
			"value"			=> get_theme_mod('blog_read_more'),
		),
		array(
			"type"			=> "textfield",
			"heading"		=> esc_html_x( 'Extra class name', 'backend', 'ogo' ),
			"description"	=> esc_html_x( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'backend', 'ogo' ),
			"param_name"	=> "el_class",
			"value"			=> ""
		),
	),
	$styles,
));

vc_map( array(
	"name"				=> esc_html_x( 'RB Blog', 'backend', 'ogo' ),
	"base"				=> "rb_sc_blog",
	'category'			=> "By RB",
	"weight"			=> 80,
	"icon"     			=> "rb_icon",		
	"params"			=> $params
));

if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_RB_Sc_Blog extends WPBakeryShortCode {
    }
}

?>