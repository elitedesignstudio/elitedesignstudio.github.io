<?php

/**
 * Enqueue Theme CSS Files
 */
add_action( 'wp_enqueue_scripts', 'arts_enqueue_styles', 20 );
function arts_enqueue_styles() {

	$typography_primary   = get_theme_mod( 'font_primary' );
	$typography_secondary = get_theme_mod( 'font_secondary' );
	$enable_smooth_scroll = get_theme_mod( 'enable_smooth_scroll', false );
	$enable_cf_7_modals   = get_theme_mod( 'enable_cf_7_modals', true );

	wp_enqueue_style( 'bootstrap-reboot', ARTS_THEME_URL . '/css/bootstrap-reboot.min.css', array(), '4.1.2' );
	wp_enqueue_style( 'bootstrap-grid', ARTS_THEME_URL . '/css/bootstrap-grid.min.css', array(), '4.1.2' );
	wp_enqueue_style( 'font-awesome', ARTS_THEME_URL . '/css/font-awesome.min.css', array(), '4.7.0' );
	wp_enqueue_style( 'swiper', ARTS_THEME_URL . '/css/swiper.min.css', array(), '4.4.1' );
	wp_enqueue_style( 'magnific-popup', ARTS_THEME_URL . '/css/magnific-popup.css', array(), '1.1.0' );
	wp_enqueue_style( 'rubenz-main-style', ARTS_THEME_URL . '/css/main.css', array(), ARTS_THEME_VERSION );
	wp_enqueue_style( 'rubenz-theme-style', ARTS_THEME_URL . '/style.css', array(), ARTS_THEME_VERSION );

	// fallback font if fonts are not set
	if ( ! class_exists( 'Kirki' ) || ! $typography_primary || ! $typography_secondary ) {

		wp_enqueue_style( 'rubenz-fonts', '//fonts.googleapis.com/css?family=Oswald:500%7CPoppins:200,300,300i,400,400i,600,600i%7CMaterial+Icons', array(), ARTS_THEME_VERSION );

		$css = "
		:root {
			--font-primary: 'Poppins', sans-serif;
			--font-secondary: 'Oswald', sans-serif;
		}
		";

		wp_add_inline_style( 'rubenz-main-style', trim( $css ) );

	} else { // load only material icons

		wp_enqueue_style( 'rubenz-fonts', '//fonts.googleapis.com/css?family=Material+Icons', array(), ARTS_THEME_VERSION );

	}

	// hide default Contact Form 7 response boxes if custom modals are enabled
	if ( $enable_cf_7_modals ) {
		wp_enqueue_script( 'bootstrap-modal', ARTS_THEME_URL . '/js/bootstrap-modal.js', array( 'jquery', 'bootstrap-util' ), '4.1.3', true );
		wp_enqueue_script( 'bootstrap-util', ARTS_THEME_URL . '/js/bootstrap-util.js', array( 'jquery' ), '4.1.3', true );
		wp_add_inline_style( 'contact-form-7', '.wpcf7-mail-sent-ok { display: none !important; } .wpcf7-mail-sent-ng { display: none !important; }' );
	}

}

/**
 * Enqueue Modernizr & Polyfills
 */
add_action( 'wp_enqueue_scripts', 'arts_enqueue_polyfills', 20 );
function arts_enqueue_polyfills() {

	wp_enqueue_script( 'outdated-browser-rework', ARTS_THEME_URL . '/js/outdated-browser-rework.min.js', array(), '1.1.0', false );
	wp_enqueue_script( 'modernizr', ARTS_THEME_URL . '/js/modernizr.custom.js', array(), '3.6.0', false );
	wp_enqueue_script( 'fontface-observer', ARTS_THEME_URL . '/js/fontfaceobserver.standalone.js', array(), '2.1.0', false );

	$outdated_browser_init_string = 'try{outdatedBrowserRework({browserSupport:{"Chrome":57,"Edge":39,"Safari":10,"Mobile Safari":10,"Firefox":true,"Opera":true,"Vivaldi":true,"Yandex":true,IE:false},requireChromeOnAndroid:false,isUnknownBrowserOK:true})}catch(err){};';

		wp_add_inline_script( 'outdated-browser-rework', $outdated_browser_init_string );

}

/**
 * Enqueue Theme JS Files
 */
add_action( 'wp_enqueue_scripts', 'arts_enqueue_scripts', 50 );
function arts_enqueue_scripts() {

	if ( is_singular() && comments_open() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'imagesloaded' );

	wp_enqueue_script( 'animation-gsap', ARTS_THEME_URL . '/js/animation.gsap.min.js', array( 'scrollmagic', 'tweenmax' ), '2.0.5', true );
	wp_enqueue_script( 'barba', ARTS_THEME_URL . '/js/barba.umd.js', array( 'jquery' ), '2.0.0', true );
	wp_enqueue_script( 'drawsvg-plugin', ARTS_THEME_URL . '/js/DrawSVGPlugin.min.js', array( 'tweenmax' ), '0.2.0', true );
	wp_enqueue_script( 'edge-easing', ARTS_THEME_URL . '/js/edgeEasing.min.js', array( 'jquery', 'smooth-scrollbar' ), '8.5.1', true );
	wp_enqueue_script( 'isotope', ARTS_THEME_URL . '/js/isotope.pkgd.min.js', array( 'jquery' ), '3.0.6', true );
	wp_enqueue_script( 'jquery-lazy', ARTS_THEME_URL . '/js/jquery.lazy.min.js', array( 'jquery' ), '1.7.10', true );
	wp_enqueue_script( 'jquery-lazy-plugins', ARTS_THEME_URL . '/js/jquery.lazy.plugins.min.js', array( 'jquery', 'jquery-lazy' ), '1.7.10', true );
	wp_enqueue_script( 'jquery-magnific-popup', ARTS_THEME_URL . '/js/jquery.magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
	wp_enqueue_script( 'jquery-scrollmagic', ARTS_THEME_URL . '/js/jquery.ScrollMagic.min.js', array( 'scrollmagic' ), '2.0.5', true );
	wp_enqueue_script( 'swiper', ARTS_THEME_URL . '/js/swiper.min.js', array( 'jquery' ), '4.4.1', true );
	wp_enqueue_script( 'lockscroll', ARTS_THEME_URL . '/js/lockscroll.js', array( 'smooth-scrollbar' ), '1.0.0', true );
	wp_enqueue_script( 'scrollmagic', ARTS_THEME_URL . '/js/ScrollMagic.min.js', array(), '2.0.5', true );
	wp_enqueue_script( 'smooth-scrollbar', ARTS_THEME_URL . '/js/smooth-scrollbar.js', array( 'jquery' ), '8.5.1', true );
	wp_enqueue_script( 'split-text', ARTS_THEME_URL . '/js/SplitText.min.js', array( 'tweenmax' ), '3.2.4', true );
	wp_enqueue_script( 'tweenmax', ARTS_THEME_URL . '/js/TweenMax.min.js', array(), '2.1.2', true );
	wp_enqueue_script( 'rubenz-components', ARTS_THEME_URL . '/js/components.js', array( 'modernizr', 'jquery', 'barba', 'masonry', 'isotope', 'imagesloaded', 'swiper' ), ARTS_THEME_VERSION, true );

	/**
	 * Enqueue Elementor Frontend Editor Script
	 */
	if ( arts_is_elementor_editor_active() ) {
		wp_enqueue_script( 'rubenz-elementor-preview', ARTS_THEME_URL . '/js/elementor-preview.js', array( 'elementor-frontend', 'elementor-inline-editor' ), ARTS_THEME_VERSION, true );
	}

}

/**
 * Localize Theme Options
 */
add_action( 'wp_enqueue_scripts', 'arts_localize_data', 60 );
function arts_localize_data() {

	$typography_primary             = get_theme_mod( 'font_primary', array( 'font-family' => 'Poppins' ) );
	$typography_secondary           = get_theme_mod( 'font_secondary', array( 'font-family' => 'Oswald' ) );
	$ajax_prevent_rules             = get_theme_mod( 'ajax_prevent_rules' );
	$smooth_scroll_damping          = get_theme_mod( 'smooth_scroll_damping', 0.06 );
	$smooth_scroll_render_by_pixels = get_theme_mod( 'smooth_scroll_render_by_pixels', true );
	$smooth_scroll_plugin_easing    = get_theme_mod( 'smooth_scroll_plugin_easing', false );
	$custom_js_init                 = get_theme_mod( 'custom_js_init' );
	$enable_cf_7_modals             = get_theme_mod( 'enable_cf_7_modals', true );
	$enable_fix_mobile_vh           = get_theme_mod( 'enable_fix_mobile_vh', true );
	$enable_fix_mobile_vh_update    = get_theme_mod( 'enable_fix_mobile_vh_update', true );

	wp_localize_script(
		'rubenz-components', 'theme', array(
			'themeURL'           => esc_js( ARTS_THEME_URL ),
			'fonts'              => array( $typography_primary['font-family'], $typography_secondary['font-family'] ),
			'customPreventRules' => esc_js( $ajax_prevent_rules ),
			'smoothScroll'       => array(
				'damping'             => esc_js( $smooth_scroll_damping ),
				'renderByPixels'      => esc_js( $smooth_scroll_render_by_pixels ),
				'continuousScrolling' => $smooth_scroll_plugin_easing ? false : true,
				'plugins'             => array(
					'edgeEasing' => esc_js( $smooth_scroll_plugin_easing ),
				),
			),
			'contactForm7'       => array(
				'customModals' => esc_js( $enable_cf_7_modals ),
			),
			'customJSInit'       => $custom_js_init,
			'mobileBarFix'       => array(
				'enabled' => esc_js( $enable_fix_mobile_vh ),
				'update'  => esc_js( $enable_fix_mobile_vh_update ),
			),
		)
	);

	$css = "
		:root {
			--font-primary: {$typography_primary['font-family']};
			--font-secondary: {$typography_secondary['font-family']};
		}
	";
	wp_add_inline_style( 'rubenz-main-style', trim( $css ) );

}

/**
 * Enqueue Customizer Live Preview Script
 */
add_action( 'customize_preview_init', 'arts_customize_preview_script' );
function arts_customize_preview_script() {
	wp_enqueue_script( 'rubenz-customizer-preview', ARTS_THEME_URL . '/js/customizer.js', array(), ARTS_THEME_VERSION, true );
}

/**
 * Exclude certain JS from the aggregation
 * function of Autoptimize plugin
 */
add_filter( 'autoptimize_filter_js_exclude', 'arts_ao_override_jsexclude', 30, 1 );
/**
 * JS optimization exclude strings, as configured in admin page.
 *
 * @param $exclude: comma-seperated list of exclude strings
 * @return: comma-seperated list of exclude strings
 */
function arts_ao_override_jsexclude( $exclude ) {
	return $exclude . ', outdated-browser-rework';
}
