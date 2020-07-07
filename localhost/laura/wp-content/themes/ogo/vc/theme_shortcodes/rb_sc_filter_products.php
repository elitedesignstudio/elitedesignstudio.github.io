<?php
	/* -----> STYLING TAB PROPERTIES <----- */
	$styles =  array(
		array(
			"type"			=> "css_editor",
			"param_name"	=> "custom_styles",
			"group"			=> esc_html_x( "Styling", 'backend', 'ogo' )
		)
	);

	/* -----> GET PRODUCT CATEGORIES <----- */
	$args = array(
	    'taxonomy'     => 'product_cat',
	    'orderby'      => 'name',
	    'hide_empty'   => 0
	);

	$all_categories = get_categories( $args );
	$category_array['None'] = 'none';

	foreach( $all_categories as $cat ){
		if( $cat->category_parent == 0 ){
			$category_array[$cat->name] = $cat->slug;
		}       
	}

	$params = rb_ext_merge_arrs( array(
		/* -----> GENERAL TAB <----- */
		array(
			array(
                'type' 			=> 'param_group',
                'heading' 		=> esc_html_x( 'Values', 'backend', 'ogo' ),
                'param_name' 	=> 'values',
                'params' 		=> array(
					array(
						"type"			=> "textfield",
						"admin_label"	=> true,
						"heading"		=> esc_html_x( 'Title', 'backend', 'ogo' ),
						"param_name"	=> "title",
						"value"			=> ""
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( 'Columns', 'backend', 'ogo' ),
						"param_name"	=> "columns",
						"value"			=> array(
							esc_html_x( '1', 'backend', 'ogo' ) => '1',
							esc_html_x( '2', 'backend', 'ogo' ) => '2',
							esc_html_x( '3', 'backend', 'ogo' ) => '3',
							esc_html_x( '4', 'backend', 'ogo' ) => '4',
						),
						"std"			=> '4',
					),
					array(
						"type"			=> "textfield",
						"heading"		=> esc_html_x( 'Quantity', 'backend', 'ogo' ),
						"param_name"	=> "quantity",
						"value"			=> "",
					),
					array(
						"type"			=> "dropdown",
						"heading"		=> esc_html_x( 'Filter by category', 'backend', 'ogo' ),
						"param_name"	=> "category",
						"value"			=> $category_array
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
		$styles
	));

	/* -----> MODULE DECLARATION <----- */
	vc_map( array(
		"name"				=> esc_html_x( 'RB Filter Products', 'backend', 'ogo' ),
		"base"				=> "rb_sc_filter_products",
		"category"			=> "By RB",
		"icon" 				=> "rb_icon",
		"weight"			=> 80,
		"params"			=> $params
	));

	if ( class_exists( 'WPBakeryShortCode' ) ) {
	    class WPBakeryShortCode_RB_Sc_Filter_Products extends WPBakeryShortCode {
	    }
	}
?>