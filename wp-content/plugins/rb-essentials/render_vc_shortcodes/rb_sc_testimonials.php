<?php

function rb_vc_shortcode_sc_testimonials ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"aligning"						=> "left",
		"autoplay"						=> false,
		"autoplay_speed"				=> "3000",
		"main_shape"					=> "round",
		"thumbs_shape"					=> "round",
		"values"						=> "",
		"el_class"						=> "",
		/* -----> STYLING TAB <----- */
		"customize_colors"				=> true,
		"text_color"					=> PRIMARY_COLOR,
		"meta_color"					=> PRIMARY_COLOR,
		"meta_background"				=> SECONDARY_COLOR,
		"dots_color"					=> PRIMARY_COLOR,
		"active_dot"					=> SECONDARY_COLOR,
	);

	$responsive_vars = array(
		"all" => array(
			"custom_styles"		=> "",
		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$values = (array)vc_param_group_parse_atts($values);
	$id = uniqid( "rb_testimonials_" );

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
	if( !empty($text_color) ){
		$styles .= "
			#".$id." .testimonial_desc{
				color: ".esc_attr($text_color).";
			}
		";
	}
	if( !empty($meta_color) ){
		$styles .= "
			#".$id." .testimonial .responding_info{
				color: ".esc_attr($meta_color).";
			}
		";
	}
	if( !empty($meta_background) ){
		$styles .= "
			#".$id." .testimonial .responding_info > *{
				background-color: ".esc_attr($meta_background).";
			}
		";
	}
	if( !empty($dots_color) ){
		$styles .= "
			#".$id." .slick-dots li button{
				border-color: ".esc_attr($dots_color).";
			}
		";
	}
	if( !empty($active_dot) ){
		$styles .= "
			#".$id." .slick-dots li.slick-active button{
				border-color: ".esc_attr($active_dot).";
			}
			#".$id." .slick-dots li:after{
				background-color: ".esc_attr($active_dot).";
			}
		";
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

			if( !empty($vc_landscape_styles) ){
				$styles .= "
					#".$id."{
						".$vc_landscape_styles.";
					}
				";
			}

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

			if( !empty($vc_portrait_styles) ){
				$styles .= "
					#".$id."{
						".$vc_portrait_styles.";
					}
				";
			}

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

			if( !empty($vc_mobile_styles) ){
				$styles .= "
					#".$id."{
						".$vc_mobile_styles.";
					}
				";
			}

		$styles .= "
			}
		";
	}
	/* -----> End of mobile styles <----- */

	rb__vc_styles($styles);

	$module_classes = "rb_testimonials_module rb_carousel_wrapper";
	$module_classes .= " align_".$aligning;
	$module_classes .= !empty($el_class) ? " ".esc_attr($el_class) : '';

	$module_atts = 'data-columns="1"';
	$module_atts .= ' data-pagination="on" data-draggable="on" data-infinite="on"';
	$module_atts .= $autoplay ? ' data-autoplay="on"' : '';
	$module_atts .= $autoplay && !empty($autoplay_speed) ? ' data-autoplay-speed="'.esc_attr($autoplay_speed).'"' : '';

	/* -----> Banner module output <----- */
	$out .= "<div id='".$id."' class='".$module_classes."' ".$module_atts.">";
		$out .= "<div class='rb_carousel'>";

			foreach ($values as $value) {
				$out .= "<div class='testimonial'>";
					if( !empty($value['image']) ){
						$image_alt = get_post_meta($value['image'], '_wp_attachment_image_alt', TRUE);
						$image = !empty($value['image']) ? wp_get_attachment_image_src($value['image'], array('450', '450'))[0] : '';

						$out .= "<div class='image_wrapper ".esc_attr($main_shape)."'>";
							$out .= "<img src='".esc_url($image)."' alt='".esc_attr($image_alt)."' />";
						$out .= "</div>";
					}
					$out .= "<div class='testimonial_text'>";
						if( !empty($value['description']) ){
							$out .= "<p class='h3 testimonial_desc'>".esc_html($value['description'])."</p>";
						}
						$out .= "<div class='responding_info'>";
							if( !empty($value['name']) ){
								$out .= "<p class='testimonial_name'>".esc_html($value['name'])."</p>";
							}
							if( !empty($value['position']) ){
								$out .= "<p class='testimonial_pos'>".esc_html($value['position'])."</p>";
							}
						$out .= "</div>";
					$out .= "</div>";
				$out .= "</div>";
			}

		$out .= "</div>";
	$out .= "</div>";

	return $out;
}
add_shortcode( 'rb_sc_testimonials', 'rb_vc_shortcode_sc_testimonials' );

?>