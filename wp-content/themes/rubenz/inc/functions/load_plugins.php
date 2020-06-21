<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Rubenz for publication on ThemeForest
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once ARTS_THEME_PATH . '/inc/classes/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'arts_register_required_plugins' );
function arts_register_required_plugins() {

	$source = ARTS_THEME_PLUGINS_REMOTE_SOURCE ? 'https://artemsemkin.com/wp-content/themes/' . ARTS_THEME_SLUG . '/plugins' : ARTS_THEME_PATH . '/plugins';
	$source = trailingslashit( $source );

	$source_common_plugins = ARTS_THEME_PLUGINS_REMOTE_SOURCE ? 'https://artemsemkin.com/common-plugins' : ARTS_THEME_PATH . '/plugins';
	$source_common_plugins = trailingslashit( $source_common_plugins );

	$dev_plugins = array();

	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		array(
			'name'     => esc_html__( 'Advanced Custom Fields PRO', 'rubenz' ),
			'slug'     => 'advanced-custom-fields-pro',
			'source'   => esc_url( $source_common_plugins . 'advanced-custom-fields-pro.zip' ),
			'required' => true,
			'version'  => '5.8.0',
		),

		array(
			'name'     => esc_html__( 'Rubenz Core', 'rubenz' ),
			'slug'     => 'rubenz-core',
			'source'   => esc_url( $source . 'rubenz-core.zip' ),
			'required' => true,
			'version'  => '1.3.2',
		),

		array(
			'name'     => esc_html__( 'Contact Form 7', 'rubenz' ),
			'slug'     => 'contact-form-7',
			'required' => false,
		),

		array(
			'name'     => esc_html__( 'Elementor', 'rubenz' ),
			'slug'     => 'elementor',
			'required' => true,
		),

		array(
			'name'   => esc_html__( 'Envato Market', 'rubenz' ),
			'slug'   => 'envato-market',
			'source' => ARTS_THEME_PLUGINS_REMOTE_SOURCE ? esc_url( 'https://envato.github.io/wp-envato-market/dist/envato-market.zip' ) : esc_url( ARTS_THEME_PATH . '/plugins/' . 'envato-market.zip' ),
		),
		'required' => false,

		array(
			'name'     => esc_html__( 'Kirki', 'rubenz' ),
			'slug'     => 'kirki',
			'required' => true,
		),

		array(
			'name'     => esc_html__( 'Intuitive Custom Post Order', 'rubenz' ),
			'slug'     => 'intuitive-custom-post-order',
			'required' => false,
		),

	);

	$plugins = array_merge( $plugins, $dev_plugins );

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 */
	$config = array(
		'id'           => 'rubenz',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
