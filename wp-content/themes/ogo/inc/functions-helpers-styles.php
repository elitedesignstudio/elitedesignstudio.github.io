<?php
defined( 'ABSPATH' ) or die();

// Theme style constants
define( 'PRIMARY_COLOR', '#353535' );
define( 'SECONDARY_COLOR', '#FFEB00' );
define( 'THIRD_COLOR', '#00B9A2' );
define( 'RB_BACKGROUND_COLOR', '#fff' );
const OGO_FONTS = array( 'menu', 'titles', 'body' );
$GLOBALS['palette'] = array( '#fff', '#000', PRIMARY_COLOR, SECONDARY_COLOR, THIRD_COLOR );
if( !isset( $content_width ) ) $content_width = 1170;

if( get_theme_mod('primary_color') ){ 
	if( get_theme_mod('primary_color') != PRIMARY_COLOR ){
		$GLOBALS['palette'][] = get_theme_mod('primary_color');
	}
}
if( get_theme_mod('secondary_color') ){ 
	if( get_theme_mod('secondary_color') != SECONDARY_COLOR ){
		$GLOBALS['palette'][] = get_theme_mod('secondary_color');
	}
}
if( get_theme_mod('third_color') ){ 
	if( get_theme_mod('third_color') != THIRD_COLOR ){
		$GLOBALS['palette'][] = get_theme_mod('third_color');
	}
}

/**
 * Add an selector with the attributes into the
 * inline styles data
 *
 * @param   string  $selector    The style selector
 * @param   array   $attributes  The style attributes
 *
 * @return  void
 */
function ogo__define_style( $selector, array $attributes ) {
	global $_theme_styles_definition;

	if ( ! is_array( $_theme_styles_definition ) ) $_theme_styles_definition = array();
	if ( ! isset( $_theme_styles_definition[$selector] ) ) $_theme_styles_definition[$selector] = array();

	$_theme_styles_definition[$selector] = array_merge(
		$_theme_styles_definition[$selector], $attributes
	);
}

/**
 * Generate the CSS from the inline styles data and
 * return it
 *
 * @return  string
 */
function ogo__styles() {
	global $_theme_styles_definition;

	if ( ! is_array( $_theme_styles_definition ) ) $_theme_styles_definition = array();

	$result = array();

	// Loop through each item to build the
	// inline styles
	foreach ( $_theme_styles_definition as $selector => $attributes ) {
		$selector = trim($selector);
		$selector = preg_replace('/\s+/', ' ', $selector);
		$attributes_content = array();

		foreach ( $attributes as $name => $value ) {
			if ( ! empty( $value ) ) {
				$attributes_content[] = sprintf( '%s: %s', $name, $value );
			}
		}

		if ( ! empty( $attributes_content ) ) {
			$result[] = sprintf( '%s { %s; }', $selector, join( ";", $attributes_content ) );
		}
	}

	$result = str_replace('start-responsive { desktop: start; }', '@media screen and (min-width: 1367px), screen and (min-width: 1200px) and (any-hover: hover), screen and (min-width: 1200px) and (min--moz-device-pixel-ratio:0), screen and (min-width: 1200px) and (-ms-high-contrast: none), screen and (min-width: 1200px) and (-ms-high-contrast: active){', $result);
	$result = str_replace('end-responsive { desktop: end; }', '}', $result);

	return join( "\r\n", $result );
}


function ogo__scheme_styles() {
	global $wp_filesystem;

	if( empty( $wp_filesystem ) ) {
		require_once( ABSPATH .'/wp-admin/includes/file.php' );
		WP_Filesystem();
	}
	$file = OGO__PATH . 'assets/css/theme_colors.css';

	if ( $wp_filesystem && $wp_filesystem->exists($file) ) {
		$content = $wp_filesystem->get_contents($file);
	} else {
		echo '<p class="wp_error">WP_Filesystem() can`t start</p>';
		return false;
	}

	get_theme_mod('primary_color') ? $primary = get_theme_mod('primary_color') : $primary = PRIMARY_COLOR;
	get_theme_mod('secondary_color') ? $secondary = get_theme_mod('secondary_color') : $secondary = SECONDARY_COLOR;
	get_theme_mod('third_color') ? $third = get_theme_mod('third_color') : $third = THIRD_COLOR;
	get_theme_mod('background') ? $background = get_theme_mod('background') : $background = RB_BACKGROUND_COLOR;

	$colors = array(
		'primary' 					=> $primary,
		'secondary'					=> $secondary,
		'third'						=> $third,
		'background'				=> $background,
	);

	$content = str_replace("}\n", "}", $content);
	$content = str_replace("{\n", "{", $content);

	return preg_replace_callback( '/@@([a-zA-Z0-9\-_]+)/i', function( $matches ) use( $colors ) {
		return isset( $colors[ $matches[1] ] ) ? $colors[ $matches[1] ] : '#000';
	}, $content );
}

function rb__vc_styles( $styles ) {
    if( !empty( $styles ) ){
    	$styles = trim($styles);
    	$styles = preg_replace('/\s+/', ' ', $styles);
    	$styles = preg_replace('/\*background.+?(?=;);/', '', $styles);

    	wp_register_style( 'rb-footer', false );
        wp_enqueue_style( 'rb-footer' );
        wp_add_inline_style( 'rb-footer', $styles );      
    }
}


/**
 * Generate an array for declare typography styles.
 *
 * @param   array   $options  Typography options
 * @param   string  $unit     Unit for font-size
 *
 * @return  array
 */
function ogo__typography_styles() {
	$fonts_to_load = array();
	$family_to_load = '?family=';

	foreach( OGO_FONTS as $font ){
		if( get_theme_mod($font.'_font_family') ){
			$family = esc_html( get_theme_mod($font.'_font_family') );
			$family = explode(',', $family);
			$family = $family[0];
		}
		if( get_theme_mod($font.'_font_weight') ){
			$font_weight = get_theme_mod($font.'_font_weight');

			if( is_array($font_weight) ){
				$weight = implode(',', $font_weight);
			} else {
				$weight = get_theme_mod($font.'_font_weight');
			}
		}
		if( get_theme_mod($font.'_font_subset') ){
			if( is_array(get_theme_mod($font.'_font_subset')) ){
				$subset = implode(',', get_theme_mod($font.'_font_subset'));
			} else {
				$subset = get_theme_mod($font.'_font_subset');
			}
		}

		if( empty($fonts_to_load['subsets']) ){
			$fonts_to_load['subsets'] = $subset;	
		} else {
			$fonts_to_load['subsets'] .= ','.$subset;
		}
		$fonts_to_load['subsets'] = implode(',', array_unique(explode(',', $fonts_to_load['subsets'])));

		if( array_key_exists($family, $fonts_to_load) ){
			$new_weights = $fonts_to_load[$family]['weight'].','.$weight;
			$new_weights = implode(',', array_unique(explode(',', $new_weights)));

			$fonts_to_load[$family]['weight'] = $new_weights;
		} else {
			$fonts_to_load[$family]['weight'] = $weight;
		}
	}

	foreach( $fonts_to_load as $key => $font_settings ){
		if( $key != 'subsets' ){
			$family_to_load .= str_replace(' ', '+', $key).':'.$font_settings['weight'].'|';
		}
	}

	$subsets_to_load = $fonts_to_load['subsets'] == 'latin' ? '' : '&amp;subset='.$fonts_to_load['subsets'];

	$fonts = $family_to_load.$subsets_to_load;
	$fonts = empty($subsets_to_load) ? rtrim($fonts, '|') : str_replace('|&', '&', $fonts);

	wp_enqueue_style( 'ogo-fonts', '//fonts.googleapis.com/css'. $fonts );
}


/**
 * Generate attributes for the background options
 *
 * @param   array   $options  Background options
 * @return  array
 */
function ogo__background_styles( $options ) {
	$styles = array();

	if ( ! empty( $options['color'] ) ) {
		$styles['background-color'] = $options['color'];
	}

	if ( ! empty( $options['image'] ) && ! empty( $options['image']['url'] ) ) {
		// Update the custom position offset
		if ( $options['position'] == 'custom' ) {
			$options['position'] = "{$options['x']} {$options['y']}";
		}

		// Custom background size
		if ( $options['size'] == 'fit-width' ) $options['size'] = '100% auto';
		elseif ( $options['size'] == 'fit-height' ) $options['size'] = 'auto 100%';
		elseif ( $options['size'] == 'stretch' ) $options['size'] = '100% 100%';

		$styles['background-image'] = sprintf( 'url(%s)', $options['image']['url'] );

		if ( ! empty( $options['position'] ) ) {
			$styles['background-position'] = $options['position'];
		}
		if ( ! empty( $options['repeat'] ) ) {
			$styles['background-repeat'] = $options['repeat'];
		}
		if ( ! empty( $options['size'] ) ) {
			$styles['background-size'] = $options['size'];

			if ( $options['size'] == 'custom' ) {
				$styles['background-size'] = "{$options['width']} {$options['height']}";
			}
		}
		if ( ! empty( $options['attachment'] ) ) {
			$styles['background-attachment'] = $options['attachment'];
		}
	}

	return $styles;
}


/**
 * Generate attributes for the border options
 *
 * @param   array   $options  The border options
 * @return  array
 */
function ogo__border_styles( $options ) {
	if ( isset( $options['simplify'] ) && $options['simplify'] == true ) {
		return array(
			'border' => sprintf( '%s %s %s',
				$options['all']['size'],
				$options['all']['style'],
				$options['all']['color']
			)
		);
	}

	$properties = array();
	foreach ( array( 'top', 'right', 'bottom', 'left' ) as $border_side ) {
		$properties["border-{$border_side}"] = sprintf( '%s %s %s',
			$options[ $border_side ]['size'],
			$options[ $border_side ]['style'],
			$options[ $border_side ]['color']
		);
	}

	return $properties;
}


/**
 * The helper function to convert color from
 * hex format to RGB with alpha
 *
 * @param   string  $color  The hex color
 * @param   float   $alpha  The alpha value
 *
 * @return  string
 */
function ogo__color_to_rgba( $color, $alpha ) {
	if ( strpos( $color, '#' ) !== false )
		$color = str_replace( '#', '', $color );

	if ( strlen( $color ) == 3 ) {
		$r = hexdec( substr( $color, 0, 1 ) . substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ) . substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ) . substr( $color, 2, 1 ) );
	}
	else {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	}

	return sprintf( 'rgba(%d, %d, %d, %f)', $r, $g, $b, $alpha );
}
