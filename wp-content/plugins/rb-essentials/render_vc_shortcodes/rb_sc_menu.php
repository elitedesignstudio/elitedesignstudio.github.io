<?php

function rb_vc_shortcode_sc_menu ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		'menu'						=> 'none',
		'el_class'					=> '',
		/* -----> STYLING TAB <----- */
		'color'						=> get_theme_mod('menu_font_color'),
		'hover_color'				=> get_theme_mod('menu_accent_font_color'),
 	);
 	$responsive_vars = array(
 		/* -----> RESPONSIVE TABS <----- */
 		'all' => array(
 			'custom_styles'		=> '',
 			'customize_align'	=> false,
			'alignment'			=> 'flex-start',
 		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$id = uniqid( "rb_menu_" );

	/* -----> Visual Composer Responsive styles <----- */
	list( $vc_desktop_class, $vc_landscape_class, $vc_portrait_class, $vc_mobile_class ) = vc_responsive_styles($atts);

	preg_match("/(?<=\{).+?(?=\})/", $vc_desktop_class, $vc_desktop_styles); 
	$vc_desktop_styles = implode($vc_desktop_styles);

	preg_match("/(?<=\{).+?(?=\})/", $vc_landscape_class, $vc_landscape_styles);
	$vc_landscape_styles = implode($vc_landscape_styles);

	preg_match("/(?<=\{).+?(?=\})/", $vc_portrait_class, $vc_portrait_styles);
	$vc_portrait_styles = implode($vc_portrait_styles);

	preg_match("/(?<=\{).+?(?=\})/", $vc_mobile_class, $vc_mobile_styles);
	$vc_mobile_styles = implode($vc_mobile_styles);

	/* -----> Customize default styles <----- */
	if( !empty($vc_desktop_styles) ){
		$styles .= "
			#".$id."{
				".$vc_desktop_styles.";
			}
		";
	}
	if( $customize_align ){
		$styles .= "
			#".$id." > ul{
				-webkit-justify-content: ".esc_attr($alignment).";
				justify-content: ".esc_attr($alignment).";
			}
		";	
	}
	if( !empty($color) ){
		$styles .= "
			#".$id." > .menu > .menu-item > a{
				color: ".esc_attr($color).";
			}
		";
	}
	if( !empty($hover_color) ){
		// Uncomment this for changing active/parent menu item color
		// $styles .= "
		// 	#".$id." > .menu > .menu-item.current-menu-item > a,
		// 	#".$id." > .menu > .menu-item.current-item-parent > a{
		// 		color: ".esc_attr($hover_color).";
		// 	}
		// ";
		$styles .= "
			#".$id." > .menu > .menu-item > a:before{
				background-color: ".esc_attr($hover_color).";
			}
		";
		// Uncomment this for changing active/parent menu item color on hover
		// $styles .= "
		// 	@media 
		// 		screen and (min-width: 1367px), /*Disable this styles for iPad Pro 1024-1366*/
		// 		screen and (min-width: 1200px) and (any-hover: hover), /*Check, is device a desktop (Not working on IE & FireFox)*/
		// 		screen and (min-width: 1200px) and (min--moz-device-pixel-ratio:0), /*Check, is device a desktop with firefox*/
		// 		screen and (min-width: 1200px) and (-ms-high-contrast: none), /*Check, is device a desktop with IE 10 or above*/
		// 		screen and (min-width: 1200px) and (-ms-high-contrast: active) /*Check, is device a desktop with IE 10 or above*/
		// 	{
		// 		#".$id." > .menu > .menu-item:hover > a{
		// 			color: ".esc_attr($hover_color).";
		// 		}
		// 	}
		// ";
	}
	/* -----> End of default styles <----- */

	/* -----> Customize landscape styles <----- */
	if( 
		!empty($vc_landscape_styles) || 
		$customize_align_landscape 
	){
		$styles .= "
			@media 
				screen and (max-width: 1199px),
				screen and (max-width: 1366px) and (any-hover: none)
			{
		";

			if( !empty($vc_landscape_styles) ){
				$styles .= "
					.".$id."{
						".$vc_landscape_styles.";
					}
				";
			}
			if( $customize_align_landscape ){
				$styles .= "
					#".$id." > ul{
						-webkit-justify-content: ".esc_attr($alignment_landscape).";
						justify-content: ".esc_attr($alignment_landscape).";
					}
				";	
			}

		$styles .= "
			}
		";
	}
	/* -----> End of landscape styles <----- */

	/* -----> Customize portrait styles <----- */
	if( 
		!empty($vc_portrait_styles) || 
		$customize_align_portrait 
	){
		$styles .= "
			@media screen and (max-width: 991px){
		";

			if( !empty($vc_portrait_styles) ){
				$styles .= "
					.".$id."{
						".$vc_portrait_styles.";
					}
				";
			}
			if( $customize_align_portrait ){
				$styles .= "
					#".$id." > ul{
						-webkit-justify-content: ".esc_attr($alignment_portrait).";
						justify-content: ".esc_attr($alignment_portrait).";
					}
				";	
			}

		$styles .= "
			}
		";
	}
	/* -----> End of portrait styles <----- */

	/* -----> Customize mobile styles <----- */
	if( 
		!empty($vc_mobile_styles) || 
		$customize_align_mobile 
	){
		$styles .= "
			@media screen and (max-width: 767px){
		";

			if( !empty($vc_mobile_styles) ){
				$styles .= "
					.".$id."{
						".$vc_mobile_styles.";
					}
				";
			}
			if( $customize_align_mobile ){
				$styles .= "
					#".$id." > ul{
						-webkit-justify-content: ".esc_attr($alignment_mobile).";
						justify-content: ".esc_attr($alignment_mobile).";
					}
				";	
			}

		$styles .= "
			}
		";
	}
	/* -----> End of mobile styles <----- */

	rb__vc_styles($styles);
	
	/* -----> Divider module output <----- */
	$out .= "<div id='".$id."' class='menu-main-container header_menu rb_menu_module". ( !empty($el_class) ? " $el_class" : "" ) ."'>";

		ob_start();
			wp_nav_menu( array(
				'menu'  			=> $menu,
				'container'       	=> false,
				'menu_class'      	=> 'menu '.$menu.'-menu',
				'fallback_cb'     	=> false,
				'items_wrap'      	=> '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           	=> 0
			));
		$out .= ob_get_clean();
	$out .= "</div>";

	return $out;
}
add_shortcode( 'rb_sc_menu', 'rb_vc_shortcode_sc_menu' );

?>