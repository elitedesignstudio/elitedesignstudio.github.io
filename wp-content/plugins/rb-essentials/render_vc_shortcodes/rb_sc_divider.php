<?php

function rb_vc_shortcode_sc_divider ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		'style'						=> 'default',
		'el_class'					=> '',
		/* -----> STYLING TAB <----- */
		'color'						=> SECONDARY_COLOR,
 	);
 	$responsive_vars = array(
 		/* -----> RESPONSIVE TABS <----- */
 		'all' => array(
 			'custom_styles'		=> '',
 		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$id = uniqid( "rb_divider_" );

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
	if( !empty($color) ){
		if( $style == 'dashed' || $style == 'dots' ){
			$styles .= "
				#".$id." .rb_divider{
					background-image: -webkit-linear-gradient(left, ".esc_attr($color).", ".esc_attr($color)." 50%, transparent 50%, transparent 100%);
					background-image: -o-linear-gradient(left, ".esc_attr($color).", ".esc_attr($color)." 50%, transparent 50%, transparent 100%);
					background-image: linear-gradient(to right, ".esc_attr($color).", ".esc_attr($color)." 50%, transparent 50%, transparent 100%);
				}
			";
		} else {
			$styles .= "
				#".$id." .rb_divider{
					background-color: ".esc_attr($color).";
				}
			";
		}
	}
	/* -----> End of default styles <----- */

	/* -----> Customize landscape styles <----- */
	if( !empty($vc_landscape_styles) ){
		$styles .= "
			@media 
				screen and (max-width: 1199px),
				screen and (max-width: 1366px) and (any-hover: none)
			{
		";

			$styles .= "
				#".$id."{
					".$vc_landscape_styles.";
				}
			";

		$styles .= "
			}
		";
	}
	/* -----> End of landscape styles <----- */

	/* -----> Customize portrait styles <----- */
	if( !empty($vc_portrait_styles) ){
		$styles .= "
			@media screen and (max-width: 991px){
		";

			$styles .= "
				#".$id."{
					".$vc_portrait_styles.";
				}
			";

		$styles .= "
			}
		";
	}
	/* -----> End of portrait styles <----- */

	/* -----> Customize mobile styles <----- */
	if( !empty($vc_mobile_styles) ){
		$styles .= "
			@media screen and (max-width: 767px){
		";

			$styles .= "
				#".$id."{
					".$vc_mobile_styles.";
				}
			";

		$styles .= "
			}
		";
	}
	/* -----> End of mobile styles <----- */
	
	rb__vc_styles($styles);

	$module_classes = 'rb_divider_wrapper';
	$module_classes .= ' '.esc_attr($style);
	$module_classes .= !empty($el_class) ? ' '.esc_attr($el_class) : '';
	
	/* -----> Divider module output <----- */
	$out .= "<div id='".$id."' class='".$module_classes."'>";
		$out .= "<div class='rb_divider'></div>";
	$out .= "</div>";

	return $out;
}
add_shortcode( 'rb_sc_divider', 'rb_vc_shortcode_sc_divider' );

?>