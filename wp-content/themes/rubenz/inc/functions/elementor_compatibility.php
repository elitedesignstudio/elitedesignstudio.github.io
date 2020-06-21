<?php

/**
 * Elementor Pro AJAX compatibility
 * Enforce widgets assets to load on all the pages
 */
add_action( 'elementor_pro/init', 'arts_enqueue_elementor_pro_widgets_assets' );
function arts_enqueue_elementor_pro_widgets_assets() {

	$enable_ajax = get_theme_mod( 'enable_ajax', false );

	if ( $enable_ajax ) {

		// JS assets
		add_action(
			'elementor/frontend/before_enqueue_scripts', function() {
				wp_enqueue_script( 'elementor-gallery' ); // Elementor Gallery
			}
		);

		// CSS assets
		add_action(
			'elementor/frontend/before_enqueue_styles', function() {
				wp_enqueue_style( 'elementor-gallery' ); // Elementor Gallery
			}
		);

	}

}

/**
 * Remove Elementor welcome splash screen
 * on the initial plugin activation
 * This prevents some issues when Merlin wizard
 * installs and activates the required plugins
 */
add_action( 'init', 'arts_remove_elementor_welcome_screen' );
function arts_remove_elementor_welcome_screen() {
	delete_transient( 'elementor_activation_redirect' );
}
