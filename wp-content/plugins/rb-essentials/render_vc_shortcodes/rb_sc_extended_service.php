<?php
function rb_vc_shortcode_sc_extended_service ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"icon_lib"						=> "FontAwesome",
		"icon_shape"					=> "none",
		"shape_rotation"				=> "0",
		"title"							=> "",
		"title_tag"						=> "h3",
		"button_title"					=> "",
		"button_url"					=> "",
		"button_type"					=> "default",
		"button_size"					=> "medium",
		"add_divider"					=> false,
		"el_class"						=> "",
		/* -----> STYLING TAB <----- */
		"bg_hover"						=> "no_hover",
		"max_tilt"						=> "10",
		"perspective"					=> "1000",
		"scale"							=> "1",
		"speed"							=> "300",
		"customize_colors"				=> true,
		"shape_gradient_1"				=> "#1C5ECE",
		"shape_gradient_2"				=> "#1C5ECE",
		"icon_color"					=> "#fff",
		"title_color"					=> SECONDARY_COLOR,
		"divider_color"					=> "#fff",
		"text_color"					=> "#707070",
		"text_color_hover"				=> PRIMARY_COLOR,
		"btn_title"						=> SECONDARY_COLOR,
		"btn_title_hover"				=> SECONDARY_COLOR,
		"btn_main_bg"					=> PRIMARY_COLOR,
		"btn_rear_bg"					=> SECONDARY_COLOR,
	);

	$responsive_vars = array(
		"all" => array(
			"custom_styles"		=> "",
			"customize_size"	=> false,
			"title_size"		=> "35px",
			"title_lh"			=> "41px",
			"text_size"			=> "16px",
			"text_lh"			=> "28px",
		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$icon = esc_attr(rb_ext_vc_sc_get_icon($atts));
	$content = apply_filters( "the_content", $content );
	$id = uniqid( "rb_extended_service_" );

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
	if( $customize_size ){
		if( !empty($icon_size) ){
			$styles .= "
				#".$id." .extended_service_icon_wrapper i,
				#".$id." .extended_service_icon_wrapper i:before{
					font-size: ".(int)esc_attr($icon_size)."px;
				}
				#".$id." .extended_service_icon_wrapper i.svg{
					width: ".(int)esc_attr($icon_size)."px !important;
					height: ".(int)esc_attr($icon_size)."px !important;
				}
			";
		}
		if( !empty($title_size) ){
			$styles .= "
				#".$id." .extended_service_title{
					font-size: ".(int)esc_attr($title_size)."px;
				}
			";
		}
		if( !empty($title_lh) ){
			$styles .= "
				#".$id." .extended_service_title{
					line-height: ".(int)esc_attr($title_lh)."px;
				}
			";
		}
		if( !empty($text_size) ){
			$styles .= "
				#".$id." .content_wrapper{
					font-size: ".(int)esc_attr($text_size)."px;
				}
			";
		}
		if( !empty($text_lh) ){
			$styles .= "
				#".$id." .content_wrapper{
					line-height: ".(int)esc_attr($text_lh)."px;
				}
			";
		}
	}
	if( $customize_colors ){
		if( !empty($icon_color) ){
			$styles .= "
				#".$id." .extended_service_icon_wrapper i,
				#".$id." .extended_service_icon_wrapper i:before{
					color: ".esc_attr($icon_color).";
				}
			";
		}
		if( !empty($title_color) ){
			$styles .= "
				#".$id." .extended_service_title{
					color: ".esc_attr($title_color).";
				}
			";
		}
		if( !empty($divider_color) ){
			$styles .= "
				#".$id." .extended_service_divider{
					background-color: ".esc_attr($divider_color).";
				}
			";	
		}
		if( !empty($text_color) ){
			$styles .= "
				#".$id." .content_wrapper,
				#".$id." .content_wrapper > a{
					color: ".esc_attr($text_color).";
				}
			";
		}
		if( !empty($text_color_hover) ){
			$styles .= "
				#".$id." .content_wrapper > a:hover{
					color: ".esc_attr($text_color_hover).";
				}
			";
		}
		if( !empty($btn_title) ){
			$styles .= "
				#".$id." .rb_button_wrapper .rb_button{
					color: ".esc_attr($btn_title).";	
				}
			";
		}
		if( !empty($btn_main_bg) ){
			$styles .= "
				#".$id." .rb_button_wrapper:not(.simple) .rb_button{
					background-color: ".esc_attr($btn_main_bg).";	
				}
				#".$id." .rb_button_wrapper.simple .rb_button:before{
					background-color: ".esc_attr($btn_main_bg).";	
				}
			";	
		}
		if( !empty($btn_rear_bg) ){
			$styles .= "
				#".$id." .rb_button_wrapper .rb_button:after{
					background-color: ".esc_attr($btn_rear_bg).";	
				}
			";
		}
		if( !empty($btn_title_hover) ) {
			$styles .= "
				@media 
					screen and (min-width: 1367px),
					screen and (min-width: 1200px) and (any-hover: hover),
					screen and (min-width: 1200px) and (min--moz-device-pixel-ratio:0),
					screen and (min-width: 1200px) and (-ms-high-contrast: none),
					screen and (min-width: 1200px) and (-ms-high-contrast: active)
				{
			";

				$styles .= "
					#".$id." .rb_button_wrapper .rb_button:hover{
						color: ".esc_attr($btn_title_hover).";	
					}
				";

			$styles .="
				}
			";
		}
	}
	/* -----> End of default styles <----- */

	/* -----> Customize landscape styles <----- */
	if( 
		!empty($vc_landscape_styles) ||
		$customize_size_landscape 
	){
		$styles .= "
			@media 
				screen and (max-width: 1199px), /*Check, is device a tablet*/
				screen and (max-width: 1366px) and (any-hover: none) /*Enable this styles for iPad Pro 1024-1366*/
			{
		";

			if( !empty($vc_landscape_styles) ){
				$styles .= "
					#".$id."{
						".$vc_landscape_styles."
					}
				";
			}
			if( $customize_size_landscape ){
				if( !empty($icon_size_landscape) ){
					$styles .= "
						#".$id." .extended_service_icon_wrapper i,
						#".$id." .extended_service_icon_wrapper i:before{
							font-size: ".(int)esc_attr($icon_size_landscape)."px;
						}
						#".$id." .extended_service_icon_wrapper i.svg{
							width: ".(int)esc_attr($icon_size_landscape)."px !important;
							height: ".(int)esc_attr($icon_size_landscape)."px !important;
						}
					";
				}
				if( !empty($title_size_landscape) ){
					$styles .= "
						#".$id." .extended_service_title{
							font-size: ".(int)esc_attr($title_size_landscape)."px;
						}
					";
				}
				if( !empty($title_lh_landscape) ){
					$styles .= "
						#".$id." .extended_service_title{
							line-height: ".(int)esc_attr($title_lh_landscape)."px;
						}
					";
				}
				if( !empty($text_size_landscape) ){
					$styles .= "
						#".$id." .content_wrapper{
							font-size: ".(int)esc_attr($text_size_landscape)."px;
						}
					";
				}
				if( !empty($text_lh_landscape) ){
					$styles .= "
						#".$id." .content_wrapper{
							line-height: ".(int)esc_attr($text_lh_landscape)."px;
						}
					";
				}
			}

		$styles .= "
			}
		";
	}
	/* -----> End of landscape styles <----- */

	/* -----> Customize portrait styles <----- */
	if( 
		!empty($vc_portrait_styles) ||
		$customize_size_portrait 
	){
		$styles .= "
			@media screen and (max-width: 991px){
		";

			if( !empty($vc_portrait_styles) ){
				$styles .= "
					#".$id."{
						".$vc_portrait_styles."
					}
				";
			}
			if( $customize_size_portrait ){
				if( !empty($icon_size_portrait) ){
					$styles .= "
						#".$id." .extended_service_icon_wrapper i,
						#".$id." .extended_service_icon_wrapper i:before{
							font-size: ".(int)esc_attr($icon_size_portrait)."px;
						}
						#".$id." .extended_service_icon_wrapper i.svg{
							width: ".(int)esc_attr($icon_size_portrait)."px !important;
							height: ".(int)esc_attr($icon_size_portrait)."px !important;
						}
					";
				}
				if( !empty($title_size_portrait) ){
					$styles .= "
						#".$id." .extended_service_title{
							font-size: ".(int)esc_attr($title_size_portrait)."px;
						}
					";
				}
				if( !empty($title_lh_portrait) ){
					$styles .= "
						#".$id." .extended_service_title{
							line-height: ".(int)esc_attr($title_lh_portrait)."px;
						}
					";
				}
				if( !empty($text_size_portrait) ){
					$styles .= "
						#".$id." .content_wrapper{
							font-size: ".(int)esc_attr($text_size_portrait)."px;
						}
					";
				}
				if( !empty($text_lh_portrait) ){
					$styles .= "
						#".$id." .content_wrapper{
							line-height: ".(int)esc_attr($text_lh_portrait)."px;
						}
					";
				}
			}

		$styles .= "
			}
		";
	}
	/* -----> End of portrait styles <----- */

	/* -----> Customize mobile styles <----- */
	if( 
		!empty($vc_mobile_styles) ||
		$customize_size_mobile 
	){
		$styles .= "
			@media screen and (max-width: 767px){
		";

			if( !empty($vc_mobile_styles) ){
				$styles .= "
					#".$id."{
						".$vc_mobile_styles."
					}
				";
			}
			if( $customize_size_mobile ){
				if( !empty($icon_size_mobile) ){
					$styles .= "
						#".$id." .extended_service_icon_wrapper i,
						#".$id." .extended_service_icon_wrapper i:before{
							font-size: ".(int)esc_attr($icon_size_mobile)."px;
						}
						#".$id." .extended_service_icon_wrapper i.svg{
							width: ".(int)esc_attr($icon_size_mobile)."px !important;
							height: ".(int)esc_attr($icon_size_mobile)."px !important;
						}
					";
				}
				if( !empty($title_size_mobile) ){
					$styles .= "
						#".$id." .extended_service_title{
							font-size: ".(int)esc_attr($title_size_mobile)."px;
						}
					";
				}
				if( !empty($title_lh_mobile) ){
					$styles .= "
						#".$id." .extended_service_title{
							line-height: ".(int)esc_attr($title_lh_mobile)."px;
						}
					";
				}
				if( !empty($text_size_mobile) ){
					$styles .= "
						#".$id." .content_wrapper{
							font-size: ".(int)esc_attr($text_size_mobile)."px;
						}
					";
				}
				if( !empty($text_lh_mobile) ){
					$styles .= "
						#".$id." .content_wrapper{
							line-height: ".(int)esc_attr($text_lh_mobile)."px;
						}
					";
				}
			}

		$styles .= "
			}
		";
	}
	/* -----> End of mobile styles <----- */ 

	rb__vc_styles($styles);

	$icon_output = '';

	$module_classes = 'rb_extended_service_module';
	$module_classes .= ' shape_'.esc_attr($icon_shape);
	$module_classes .= ' '.esc_attr($el_class);

	$icon_classes = " extended_service_icon_wrapper";
	$icon_classes .= " background_".$bg_hover;

	$icon_atts = "data-rotate=".(int)esc_attr($shape_rotation)."";
	if( $bg_hover == '3d' ){
		$icon_atts .= !empty($max_tilt) ? ' data-max_tilt='.$max_tilt.'' : 'data-max_tilt="10"';
		$icon_atts .= !empty($perspective) ? ' data-perspective='.$perspective.'' : 'data-perspective="1000"';
		$icon_atts .= !empty($scale) ? ' data-scale='.$scale.'' : 'data-scale="1"';
		$icon_atts .= !empty($speed) ? ' data-speed='.$speed.'' : 'data-speed="300"';
	}

	$gradient = uniqid('gradient_');
	$overlay_gradient = uniqid('gradient_');

	/* -----> Getting Icon <----- */
	if( !empty($icon_lib) ){
		if( $icon_lib == 'rb_svg' ){
			$icon = "icon_".$icon_lib;
			$svg_icon = json_decode(str_replace("``", "\"", $atts[$icon]), true);
			$upload_dir = wp_upload_dir();
			$this_folder = $upload_dir['basedir'] . '/rb-svgicons/' . md5($svg_icon['collection']) . '/';	

			$icon_output .= "<i class='svg' style='width:".$svg_icon['width']."px; height:".$svg_icon['height']."px;'>";
				$icon_output .= file_get_contents($this_folder . $svg_icon['name']);
			$icon_output .= "</i>";
		} else {
			if( !empty($icon) ){
				$icon_output .= '<i class="'.esc_attr($icon).'"></i>';
			}
		}
	}

	/* -----> Filter Products module output <----- */
	$out .= "<div id='".$id."' class='".$module_classes."'>";
		if( !empty($icon) ){
			$out .= "<div class='".$icon_classes."' ".$icon_atts.">";
				if( $icon_shape != 'none' ){
					$out .= '<svg class="extended_services_shape" style="width:100px; height:100px;" xmlns="http://www.w3.org/2000/svg">';
						$out .= '<defs>
									<linearGradient id="'.esc_attr($gradient).'" x1="0%" y1="0%" x2="0%" y2="100%">
										<stop offset="0%" style="stop-color:'.esc_attr($shape_gradient_1).'; stop-opacity:1" />
										<stop offset="100%" style="stop-color:'.esc_attr($shape_gradient_2).'; stop-opacity:1" />
									</linearGradient>
								</defs>';
						if( $icon_shape == 'round' ){
							$out .= '<circle cx="50" cy="50" r="50" fill="url(#'.esc_attr($gradient).')" />';
						} else if( $icon_shape == 'square' ){
							$out .= '<path d="M99.92,51.71c.52,13.43-1.66,26.21-7.1,32.94-12.76,15.76-61.7,20.92-77.47,8.17S-5.57,31.12,7.19,15.35,68.88-5.57,84.65,7.18c6.28,5.09,10.8,15.93,13.33,28.1C99.09,40.62,99.91,51.43,99.92,51.71Z" fill="url(#'.esc_attr($gradient).')" />';
						} else if( $icon_shape == 'triangle' ){
							$out .= '<path d="M75.4,16.7L96.7,57c10,18.9-4,41.6-25.1,40.9l-45.1-1.5C5.5,95.8-7,72.2,4.2,54L28,15.1C39.1-3.1,65.5-2.2,75.4,16.7z" fill="url(#'.esc_attr($gradient).')"/>';
						}
					$out .= '</svg>';

					$out .= '<svg class="extended_services_overlay" style="width:100px; height:100px;" xmlns="http://www.w3.org/2000/svg">';
						$out .= '<defs>
									<linearGradient id="'.esc_attr($overlay_gradient).'" x1="0%" y1="0%" x2="0%" y2="100%">
										<stop offset="0%" style="stop-color:'.esc_attr($shape_gradient_1).'; stop-opacity:1" />
										<stop offset="100%" style="stop-color:'.esc_attr($shape_gradient_2).'; stop-opacity:1" />
									</linearGradient>
								</defs>';
						if( $icon_shape == 'square' ){
							$out .= '<path d="M99.92,51.71c.52,13.43-1.66,26.21-7.1,32.94-12.76,15.76-61.7,20.92-77.47,8.17S-5.57,31.12,7.19,15.35,68.88-5.57,84.65,7.18c6.28,5.09,10.8,15.93,13.33,28.1C99.09,40.62,99.91,51.43,99.92,51.71Z" fill="url(#'.esc_attr($overlay_gradient).')" />';
						} else if( $icon_shape == 'triangle' ){
							$out .= '<path d="M75.4,16.7L96.7,57c10,18.9-4,41.6-25.1,40.9l-45.1-1.5C5.5,95.8-7,72.2,4.2,54L28,15.1C39.1-3.1,65.5-2.2,75.4,16.7z" fill="url(#'.esc_attr($overlay_gradient).')"/>';
						}
					$out .= '</svg>';
				}
				$out .= $icon_output;
				if( $add_divider ){
					$out .= '<span class="extended_service_divider"></span>';
				}
				if( !empty($title) ){
					$out .= '<'.$title_tag.' class="extended_service_title">';
						$out .= esc_html($title);
					$out .= '</'.$title_tag.'>';
				}
			$out .= "</div>";
		}
		$out .= '<div class="extended_service_content_wrapper">';
			if( !empty($content) ){
				$out .= "<div class='content_wrapper'>";
					$out .= $content;
				$out .= "</div>";
			}
			if( !empty($button_title) ){
				$out .= "<div class='rb_button_wrapper extended_service-button ".esc_attr($button_type)."'>";
					$out .= "<a class='rb_button ".esc_attr($button_size)."' href='".(!empty($url) ? $url : '#')."'>";
						$out .= esc_html($button_title);
						$out .= $button_type == 'dashed' ? '<span class="dashes"></span>' : '';
					$out .= "</a>";
				$out .= "</div>";
			}
		$out .= '</div>';

	$out .= '</div>';

	return $out;
}
add_shortcode( 'rb_sc_extended_service', 'rb_vc_shortcode_sc_extended_service' );

?>