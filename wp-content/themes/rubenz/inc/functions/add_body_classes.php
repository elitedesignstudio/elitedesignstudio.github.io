<?php

/**
 * Add additional classes for <body>
 */
add_filter( 'body_class', 'arts_add_body_classes' );
function arts_add_body_classes( $classes ) {

	$body_classes = array(
		arts_get_document_option( 'page_main_color_theme' ),
		'cursor-progress',
	);

	$classes = array_merge( $classes, $body_classes );

	return $classes;

}
