<?php

/**
 * Wrapper for Plugin Function
 * for Elementor
 */
if ( ! function_exists( 'arts_get_document_option' ) ) {

	function arts_get_document_option( $option, $post_id = null ) {

		if ( did_action( 'elementor/loaded' ) && function_exists( 'arts_elementor_get_document_option' ) ) {
			return arts_elementor_get_document_option( $option, $post_id );
		}

	}
}

/**
 * Check if the current post/page
 * is built using Elementor
 *
 * @param string $post_id
 * @return bool
 */
function arts_is_built_with_elementor( $post_id = null ) {

	if ( ! class_exists( '\Elementor\Plugin' ) ) {
		return false;
	}

	if ( $post_id == null ) {
		$post_id = get_the_ID();
	}

	if ( is_singular() && \Elementor\Plugin::$instance->db->is_built_with_elementor( $post_id ) ) {
		return true;
	}

	return false;

}

/**
 * Check if Elementor editor
 * is active
 *
 * @return bool
 */
function arts_is_elementor_editor_active() {
	if (class_exists( '\Elementor\Plugin' ) && \Elementor\Plugin::$instance->preview->is_preview_mode()) {
		return true;
	}
	return false;
}
