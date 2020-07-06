<?php

function rb_vc_shortcode_sc_image ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"image"							=> "",
		"thumb_size"					=> "",
		"mask_preset"					=> "",
		"custom_mask"					=> "",
		"tooltip"						=> "",
		"tooltip_title_color"			=> PRIMARY_COLOR,
		"tooltip_dot_color"				=> THIRD_COLOR,
		"add_shadow"					=> false,
		"top_shift"						=> "0px",
		"left_shift"					=> "0px",
		"shadow_rotate"					=> "0",
		"shadow_scale"					=> "1.0",
		"shadow_type"					=> "color",
		"shadow_color"					=> SECONDARY_COLOR,
		"el_class"						=> "",
		/* -----> STYLING TAB <----- */
		"bg_hover"						=> "no_hover",
		"max_tilt"						=> "10",
		"perspective"					=> "1000",
		"scale"							=> "1",
		"speed"							=> "300",
	);

	$responsive_vars = array(
		"all" => array(
			"custom_styles"		=> "",
			"customize_align"	=> false,
			"alignment"			=> "center",
		),
	);
	$responsive_vars = add_bg_properties($responsive_vars); //Add custom background properties to responsive vars array

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$id = uniqid( "rb_image_" );
	$image_alt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);
	$image_size = $thumb_size != 'medium-custom' ? $thumb_size : array( '570', '570' );
	$image = !empty($image) ? wp_get_attachment_image_src($image, $image_size)[0] : '';
	if( !empty($mask_preset) && $mask_preset != 'custom' ){
		$mask = get_template_directory_uri() . '/assets/img/'.esc_attr($mask_preset).'.svg';
	} else {
		$mask = !empty($custom_mask) ? wp_get_attachment_image_src($custom_mask, 'full')[0] : '';
	}

	$shadow = $shadow_type == 'dashes' ? get_template_directory_uri() . '/assets/img/'.esc_attr($mask_preset).'_shadow.svg' : $mask;

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
				".$vc_desktop_styles."
			}
		";
	}
	if( $customize_align ){
		$styles .= "
			#".$id."{
				text-align: ".esc_attr($alignment).";
			}
		";
	}
	if( !empty($mask) ){
		$styles .= "
			#".$id." .main_image{
				-webkit-mask-image: url(".esc_url($mask).");
			}
		";	
	}
	if( !empty($tooltip) ){
		if( !empty($tooltip_title_color) ){
			$styles .= "
				#".$id." .image_tooltip{
					color: ".esc_attr($tooltip_title_color).";
				}
			";
		}
		if( !empty($tooltip_dot_color) ){
			$styles .= "
				#".$id." .image_tooltip:before{
					background-color: ".esc_attr($tooltip_dot_color).";
				}
			";
		}
	}
	if( $add_shadow ){
		$styles .= "
			#".$id.":before{
				display: block;
			}
		";
		if( !empty($top_shift) ){
			$styles .= "
				#".$id.":before{
					margin-top: ".esc_attr($top_shift).";
				}
			";
		}
		if( !empty($left_shift) ){
			$styles .= "
				#".$id.":before{
					margin-left: ".esc_attr($left_shift).";
				}
			";
		}

		$transform = "translateZ(-45px)";
		if( !empty($shadow_rotate) ){
			$transform .= " rotate(".(int)esc_attr($shadow_rotate)."deg)";
		}
		if( !empty($shadow_scale) ){
			$transform .= " scale(".esc_attr($shadow_scale).")";
		}
		if( !empty($shadow_scale) || !empty($shadow_rotate) ){
			$styles .= "
				#".$id.":before{
					top: 0; left: 0;
					-webkit-transform: ".$transform.";
					-ms-transform: ".$transform.";
					transform: ".$transform.";
				}
			";
		}

		if( !empty($shadow) ){
			$styles .= "
				#".$id.":before{
					-webkit-mask-image: url(".esc_url($shadow).");
				}
			";	
		}
		if( !empty($shadow_color) ){
			$styles .= "
				#".$id.":before{
					background-color: ".esc_attr($shadow_color).";
				}
			";
		}
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
					#".$id."{
						".$vc_landscape_styles.";
					}
				";
			}
			if( $customize_align_landscape ){
				$styles .= "
					#".$id."{
						text-align: ".esc_attr($alignment_landscape).";
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
					#".$id."{
						".$vc_portrait_styles.";
					}
				";
			}
			if( $customize_align_portrait ){
				$styles .= "
					#".$id."{
						text-align: ".esc_attr($alignment_portrait).";
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
					#".$id."{
						".$vc_mobile_styles.";
					}
				";
			}
			if( $customize_align_mobile ){
				$styles .= "
					#".$id."{
						text-align: ".esc_attr($alignment_mobile).";
					}
				";
			}

		$styles .= "
			}
		";
	}
	/* -----> End of mobile styles <----- */

	rb__vc_styles($styles);

	$module_classes = " background_".$bg_hover;

	$module_atts = "";
	if( $bg_hover == '3d' ){
		$module_atts .= !empty($max_tilt) ? ' data-max_tilt='.$max_tilt.'' : 'data-max_tilt="10"';
		$module_atts .= !empty($perspective) ? ' data-perspective='.$perspective.'' : 'data-perspective="1000"';
		$module_atts .= !empty($scale) ? ' data-scale='.$scale.'' : 'data-scale="1"';
		$module_atts .= !empty($speed) ? ' data-speed='.$speed.'' : 'data-speed="300"';
	}

	if( !empty($el_class) ){
		$module_classes .= " ".esc_attr($el_class);
	}

	/* -----> Image module output <----- */
	if( !empty($image) ){

		$out .= "<div id='".$id."' class='rb_image_module".$module_classes."' ".esc_attr($module_atts).">";

			if( !empty($tooltip) ){
				$out .= "<span class='h3 image_tooltip'>".$tooltip."</span>";
			}

			$out .= '<div class="main_image">';

				$out .= '<img src="'.$image.'" alt="'.esc_attr($image_alt).'" />';
			$out .= '</div>';

		$out .= "</div>";
	}

	return $out;
}
add_shortcode( 'rb_sc_image', 'rb_vc_shortcode_sc_image' );

?>