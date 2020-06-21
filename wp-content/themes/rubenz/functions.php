<?php

/**
 * Theme Constants
 */
$theme = wp_get_theme();

define( 'ARTS_THEME_SLUG', 'rubenz' );
define( 'ARTS_THEME_PATH', get_template_directory() );
define( 'ARTS_THEME_URL', get_template_directory_uri() );
define( 'ARTS_THEME_PLUGINS_REMOTE_SOURCE', true );
define( 'ARTS_THEME_VERSION', $theme->get( 'Version' ) );
define( 'ARTS_THEME_DEV', false );

/**
 * ACF Fields
 */
require_once ARTS_THEME_PATH . '/inc/functions/acf.php';

/**
 * ACF Helper Functions
 */
require_once ARTS_THEME_PATH . '/inc/functions/acf_helpers.php';

/**
 * Add additional classes for <body>
 */
require_once ARTS_THEME_PATH . '/inc/functions/add_body_classes.php';

/**
 * Add a Pingback Url to Posts
 */
require_once ARTS_THEME_PATH . '/inc/functions/add_pingback_url.php';

/**
 * Change Custom Post Type Slug from Customizer
 */
require_once ARTS_THEME_PATH . '/inc/functions/change_cpt_slug.php';

/**
 * Comments Form
 */
require_once ARTS_THEME_PATH . '/inc/functions/comments.php';

/**
* Allow to upload some custom files
*/
require_once ARTS_THEME_PATH . '/inc/functions/custom_mime_types.php';

/**
 * Custom & Adobe Typekit fonts support
 */
require_once ARTS_THEME_PATH . '/inc/functions/fonts.php';

/**
 * Customizer
 */
require_once ARTS_THEME_PATH . '/inc/customizer/customizer.php';

/**
 * Check If Footer Has Active Sidebars
 */
require_once ARTS_THEME_PATH . '/inc/functions/footer_has_active_sidebars.php';

/**
 * Elementor Helper Functions
 */
require_once ARTS_THEME_PATH . '/inc/functions/elementor_helpers.php';

/**
* Elementor Compatibility Functions
*/
require_once ARTS_THEME_PATH . '/inc/functions/elementor_compatibility.php';

/**
 * Frontend Styles & Scripts
 */
require_once ARTS_THEME_PATH . '/inc/functions/frontend.php';

/**
 * Get Post Author
 */
require_once ARTS_THEME_PATH . '/inc/functions/get_post_author.php';

/**
 * Load Required Plugins
 */
require_once ARTS_THEME_PATH . '/inc/functions/load_plugins.php';

/**
 * Merlin WP
 * Load only if One Click Demo Import plugin
 * is not activated
 */
if ( ! class_exists( 'OCDI_Plugin' ) ) {
	require_once ARTS_THEME_PATH . '/inc/merlin/vendor/autoload.php';
	require_once ARTS_THEME_PATH . '/inc/merlin/class-merlin.php';
	require_once ARTS_THEME_PATH . '/inc/merlin/merlin-config.php';
}
require_once ARTS_THEME_PATH . '/inc/merlin/merlin-filters.php';

/**
 * Nav Menu
 */
require_once ARTS_THEME_PATH . '/inc/functions/nav.php';

/**
 * Pagination for Posts
 */
require_once ARTS_THEME_PATH . '/inc/functions/pagination.php';

/**
 * Password Form for Protected Posts
 */
require_once ARTS_THEME_PATH . '/inc/functions/password_form.php';

/**
 * Theme Support Features
 */
require_once ARTS_THEME_PATH . '/inc/functions/theme_support.php';

/**
 * Widget Areas
 */
require_once ARTS_THEME_PATH . '/inc/functions/widget_areas.php';

/**
 * Wrap Post Count in Widgets (categories, archives) into <span> Tag
 */
require_once ARTS_THEME_PATH . '/inc/functions/wrap_count.php';

/**
 * WP Contact Form 7: Don't Wrap Form Fields Into </p>
 */
require_once ARTS_THEME_PATH . '/inc/functions/wpcf7.php';

