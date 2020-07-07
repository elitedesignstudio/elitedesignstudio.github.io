<?php
function rb_vc_shortcode_sc_service ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"icon_lib"						=> "FontAwesome",
		"icon_img"						=> "icon",
		"style"							=> "icon_top",
		"image"							=> "",
		"icon_shape"					=> "none",
		"shape_rotation"				=> "0",
		"title"							=> "",
		"title_tag"						=> "h3",
		"title_number"					=> "",
		"title_number_shift"			=> "0px",
		"button_title"					=> "",
		"button_url"					=> "",
		"button_type"					=> "default",
		"button_size"					=> "medium",
		"add_divider"					=> false,
		"divider_pos"					=> "top",
		"el_class"						=> "",
		/* -----> STYLING TAB <----- */
		"customize_colors"				=> true,
		"shape_gradient_1"				=> SECONDARY_COLOR,
		"shape_gradient_2"				=> SECONDARY_COLOR,
		"icon_color"					=> PRIMARY_COLOR,
		"title_color"					=> PRIMARY_COLOR,
		"divider_color"					=> SECONDARY_COLOR,
		"title_number_color"			=> rb_Hex2RGBA(SECONDARY_COLOR, '0.8'),
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
			"customize_align"	=> false,
			"module_alignment"	=> "left",
			"customize_size"	=> false,
			"shape_size"		=> "100px",
			"icon_size"			=> "60px",
			"title_size"		=> "35px",
			"title_lh"			=> "41px",
			"text_size"			=> "16px",
			"text_lh"			=> "28px",
			"title_margins"		=> "0px 0px 0px 0px",
		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$icon = esc_attr(rb_ext_vc_sc_get_icon($atts));
	$image_alt = get_post_meta($image, '_wp_attachment_image_alt', TRUE);
	$image = !empty($image) ? wp_get_attachment_image_src($image, 'full')[0] : '';

	$title = wp_kses( $title, array(
		"b"			=> array(),
		"strong"	=> array(),
		"mark"		=> array(),
		"br"		=> array()
	));

	$content = apply_filters( "the_content", $content );
	// Remove empty <p> && <p></p> tags
	$content = preg_replace('/<p[^>]*><\\/p[^>]*>/', '', $content); 
	$content = preg_replace('/<p[^>]*>$/', '', $content); 

	$first_p = substr($content, 0, 4);
	if( $first_p == '</p>' ){
		$content = substr($content, 5);
	}

	$last_p = substr($content, -4, -1);
	if( $last_p == '<p>' ){
		$content = substr($content, 0, -4);
	}
	
	$id = uniqid( "rb_service_" );

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
				text-align: ".$module_alignment.";
			}
		";
	}
	if( !empty($shape_rotation) && $shape_rotation != 0 ){
		$styles .= "
			#".$id." .service_icon_wrapper > svg{
				-webkit-transform: rotate(".(int)esc_attr($shape_rotation)."deg);
				-ms-transform: rotate(".(int)esc_attr($shape_rotation)."deg);
				transform: rotate(".(int)esc_attr($shape_rotation)."deg);
			}
		";	
	}
	if( $customize_size ){
		if( !empty($icon_size) ){
			$styles .= "
				#".$id." .service_icon_wrapper i,
				#".$id." .service_icon_wrapper i:before{
					font-size: ".(int)esc_attr($icon_size)."px;
				}
				#".$id." .service_icon_wrapper i.svg{
					width: ".(int)esc_attr($icon_size)."px !important;
					height: ".(int)esc_attr($icon_size)."px !important;
				}
			";
		}
		if( !empty($shape_size) ){
			$styles .= "
				#".$id." .service_icon_wrapper > svg{
					width: ".(int)$shape_size."px !important;
					height: ".(int)$shape_size."px !important;
				}
				#".$id." .service_icon_wrapper > svg path,
				#".$id." .service_icon_wrapper > svg circle{
					-webkit-transform: scale(".( (int)$shape_size / 100 ).");
					transform: scale(".( (int)$shape_size / 100 ).");
				}
				#".$id." .service_icon_wrapper > svg rect{
					-webkit-transform: scale(".( (int)$shape_size / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
					transform: scale(".( (int)$shape_size / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
				}
			";
		}
		if( !empty($title_size) ){
			$styles .= "
				#".$id." .service_title{
					font-size: ".(int)esc_attr($title_size)."px;
				}
			";
		}
		if( !empty($title_lh) ){
			$styles .= "
				#".$id." .service_title{
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
		if( !empty($title_margins) ){
			$styles .= "
				#".$id." .service_title{
					margin: ".esc_attr($title_margins).";
				}
			";
		}
	}
	if( $customize_colors ){
		if( !empty($icon_color) ){
			$styles .= "
				#".$id." .service_icon_wrapper i,
				#".$id." .service_icon_wrapper i:before{
					color: ".esc_attr($icon_color).";
				}
			";
		}
		if( !empty($title_color) ){
			$styles .= "
				#".$id." .service_title{
					color: ".esc_attr($title_color).";
				}
			";
		}
		if( !empty($divider_color) ){
			$styles .= "
				#".$id." .service_divider{
					background-color: ".esc_attr($divider_color).";
				}
			";	
		}
		if( !empty($title_number_color) ){
			$styles .= "
				#".$id.".big_numbers .service_title > span{
					color: ".esc_attr($title_number_color).";
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
		$customize_size_landscape || 
		$customize_align_landscape 
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
			if( $customize_align_landscape ){
				$styles .= "
					#".$id."{
						text-align: ".$module_alignment_landscape.";
					}
				";
			}
			if( $customize_size_landscape ){
				if( !empty($icon_size_landscape) ){
					$styles .= "
						#".$id." .service_icon_wrapper i,
						#".$id." .service_icon_wrapper i:before{
							font-size: ".(int)esc_attr($icon_size_landscape)."px;
						}
						#".$id." .service_icon_wrapper i.svg{
							width: ".(int)esc_attr($icon_size_landscape)."px !important;
							height: ".(int)esc_attr($icon_size_landscape)."px !important;
						}
					";
				}
				if( !empty($shape_size_landscape) ){
					$styles .= "
						#".$id." .service_icon_wrapper > svg{
							width: ".(int)$shape_size_landscape."px !important;
							height: ".(int)$shape_size_landscape."px !important;
						}
						#".$id." .service_icon_wrapper > svg path,
						#".$id." .service_icon_wrapper > svg circle{
							-webkit-transform: scale(".( (int)$shape_size_landscape / 100 ).");
							transform: scale(".( (int)$shape_size_landscape / 100 ).");
						}
						#".$id." .service_icon_wrapper > svg rect{
							-webkit-transform: scale(".( (int)$shape_size_landscape / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
							transform: scale(".( (int)$shape_size_landscape / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
						}
					";
				}
				if( !empty($title_size_landscape) ){
					$styles .= "
						#".$id." .service_title{
							font-size: ".(int)esc_attr($title_size_landscape)."px;
						}
					";
				}
				if( !empty($title_lh_landscape) ){
					$styles .= "
						#".$id." .service_title{
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
				if( !empty($title_margins_landscape) ){
					$styles .= "
						#".$id." .service_title{
							margin: ".esc_attr($title_margins_landscape).";
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
		$customize_size_portrait || 
		$customize_align_portrait
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
			if( $customize_align_portrait ){
				$styles .= "
					#".$id."{
						text-align: ".$module_alignment_portrait.";
					}
				";
			}
			if( $customize_size_portrait ){
				if( !empty($icon_size_portrait) ){
					$styles .= "
						#".$id." .service_icon_wrapper i,
						#".$id." .service_icon_wrapper i:before{
							font-size: ".(int)esc_attr($icon_size_portrait)."px;
						}
						#".$id." .service_icon_wrapper i.svg{
							width: ".(int)esc_attr($icon_size_portrait)."px !important;
							height: ".(int)esc_attr($icon_size_portrait)."px !important;
						}
					";
				}
				if( !empty($shape_size_portrait) ){
					$styles .= "
						#".$id." .service_icon_wrapper > svg{
							width: ".(int)$shape_size_portrait."px !important;
							height: ".(int)$shape_size_portrait."px !important;
						}
						#".$id." .service_icon_wrapper > svg path,
						#".$id." .service_icon_wrapper > svg circle{
							-webkit-transform: scale(".( (int)$shape_size_portrait / 100 ).");
							transform: scale(".( (int)$shape_size_portrait / 100 ).");
						}
						#".$id." .service_icon_wrapper > svg rect{
							-webkit-transform: scale(".( (int)$shape_size_portrait / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
							transform: scale(".( (int)$shape_size_portrait / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
						}
					";
				}
				if( !empty($title_size_portrait) ){
					$styles .= "
						#".$id." .service_title{
							font-size: ".(int)esc_attr($title_size_portrait)."px;
						}
					";
				}
				if( !empty($title_lh_portrait) ){
					$styles .= "
						#".$id." .service_title{
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
				if( !empty($title_margins_portrait) ){
					$styles .= "
						#".$id." .service_title{
							margin: ".esc_attr($title_margins_portrait).";
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
		$customize_size_mobile || 
		$customize_align_mobile 
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
			if( $customize_align_mobile ){
				$styles .= "
					#".$id.",
					#".$id." ul{
						text-align: ".$module_alignment_mobile.";
					}
				";
			}
			if( $customize_size_mobile ){
				if( !empty($icon_size_mobile) ){
					$styles .= "
						#".$id." .service_icon_wrapper i,
						#".$id." .service_icon_wrapper i:before{
							font-size: ".(int)esc_attr($icon_size_mobile)."px;
						}
						#".$id." .service_icon_wrapper i.svg{
							width: ".(int)esc_attr($icon_size_mobile)."px !important;
							height: ".(int)esc_attr($icon_size_mobile)."px !important;
						}
					";
				}
				if( !empty($shape_size_mobile) ){
					$styles .= "
						#".$id." .service_icon_wrapper > svg{
							width: ".(int)$shape_size_mobile."px !important;
							height: ".(int)$shape_size_mobile."px !important;
						}
						#".$id." .service_icon_wrapper > svg path,
						#".$id." .service_icon_wrapper > svg circle{
							-webkit-transform: scale(".( (int)$shape_size_mobile / 100 ).");
							transform: scale(".( (int)$shape_size_mobile / 100 ).");
						}
						#".$id." .service_icon_wrapper > svg rect{
							-webkit-transform: scale(".( (int)$shape_size_mobile / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
							transform: scale(".( (int)$shape_size_mobile / 100 ).") matrix(0.7071, -0.7071, 0.7071, 0.7071, -20.7107, 50);
						}
					";
				}
				if( !empty($title_size_mobile) ){
					$styles .= "
						#".$id." .service_title{
							font-size: ".(int)esc_attr($title_size_mobile)."px;
						}
					";
				}
				if( !empty($title_lh_mobile) ){
					$styles .= "
						#".$id." .service_title{
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
				if( !empty($title_margins_mobile) ){
					$styles .= "
						#".$id." .service_title{
							margin: ".esc_attr($title_margins_mobile).";
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

	$module_classes = 'rb_service_module';
	$module_classes .= ' style_'.esc_attr($style);
	$module_classes .= ' shape_'.esc_attr($icon_shape);
	$module_classes .= $add_divider ? ' divider_'.esc_attr($divider_pos) : '';
	$module_classes .= !empty($title_number) ? ' big_numbers' : '';

	$module_classes .= ' align_'.esc_attr($module_alignment);
	$module_classes .= $customize_align_landscape ? ' landscape_align_'.esc_attr($module_alignment_landscape) : '';
	$module_classes .= $customize_align_portrait ? ' portrait_align_'.esc_attr($module_alignment_portrait) : '';
	$module_classes .= $customize_align_mobile ? ' mobile_align_'.esc_attr($module_alignment_mobile) : '';

	$module_classes .= ' '.esc_attr($el_class);

	$gradient = uniqid('gradient_');

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
		if( $icon_img == 'icon' && !empty($icon) ){
			$out .= "<div class='service_icon_wrapper'>";
				if( $icon_shape != 'none' ){
					$out .= '<svg style="width:100px; height:100px;" xmlns="http://www.w3.org/2000/svg">';
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
				}
				$out .= $icon_output;
			$out .= "</div>";
		} else if( $icon_img == 'image' && !empty($image) ){
			$out .= "<div class='service_image_wrapper'>";
				$out .= "<img src='".esc_url($image)."' alt='".esc_attr($image_alt)."' />";
			$out .= "</div>";
		}
		$out .= '<div class="service_content_wrapper">';
			if( !empty($title) ){
				$out .= '<'.$title_tag.' class="service_title">';
					$out .= !empty($title_number) ? '<span>'.esc_html($title_number).'</span>' : '';
					$out .= $title;
				$out .= '</'.$title_tag.'>';
			}
			if( $add_divider && $divider_pos == 'top' ){
				$out .= '<span class="service_divider"></span>';
			}
			if( !empty($content) ){
				$out .= "<div class='content_wrapper'>";
					if( $add_divider && $divider_pos == 'side' ){
						$out .= '<span class="service_divider"></span>';
					}
					$out .= $content;
				$out .= "</div>";
			}
			if( !empty($button_title) ){
				$out .= "<div class='rb_button_wrapper service-button ".esc_attr($button_type)."'>";
					$out .= "<a class='rb_button ".esc_attr($button_size)."' href='".(!empty($button_url) ? $button_url : '#')."'>";
						$out .= esc_html($button_title);
						$out .= $button_type == 'dashed' ? '<span class="dashes"></span>' : '';
					$out .= "</a>";
				$out .= "</div>";
			}
		$out .= '</div>';

	$out .= '</div>';

	return $out;
}
add_shortcode( 'rb_sc_service', 'rb_vc_shortcode_sc_service' );

?>