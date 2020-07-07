<?php

function rb_vc_shortcode_sc_roadmap ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"style"						=> "square",
		"values"					=> "",
		"el_class"					=> "",
		/* -----> STYLING TAB <----- */
		"custom_styles"				=> "",
		"shape_bg"					=> THIRD_COLOR,
		"icon_color"				=> '#fff',
		"number_color"				=> PRIMARY_COLOR,
		"number_background"			=> SECONDARY_COLOR,
		"title_color"				=> PRIMARY_COLOR,
		"text_color"				=> PRIMARY_COLOR,
		"line_color"				=> SECONDARY_COLOR,
	);

	$responsive_vars = array(
		"all" => array(
			"custom_styles"		=> "",
			"customize_size"	=> false,
			"title_size"		=> "35px",
			"title_margins"		=> "20px 0px 0px 0px",
			"text_size"			=> "16px",
		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Parse values array <----- */
	$values = (array)vc_param_group_parse_atts($values);

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$id = uniqid( "rb_roadmap_" );

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
		if( !empty($shape_size) ){
			$scale = (int)$shape_size / 100;

			$styles .= "
				#".$id." .roadmap_icon_wrapper{
					width: ".(int)$shape_size."px;
					height: ".(int)$shape_size."px;
				}
				#".$id." .roadmap_icon_wrapper > svg{
					-webkit-transform: scale(".$scale.");
				    -ms-transform: scale(".$scale.");
				    transform: scale(".$scale.");
				}
			";
		}
		if( !empty($title_size) ){
			$styles .= "
				#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
					font-size: ".(int)$title_size."px;
				}
			";
		}
		if( !empty($title_margins) ){
			$styles .= "
				#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
					margin: ".$title_margins.";
				}
			";
		}
		if( !empty($text_size) ){
			$styles .= "
				#".$id." .roadmap_description{
					font-size: ".(int)$text_size."px;
					line-height: ".((int)$text_size * 1.75)."px;
				}
			";
		}
	}
	if( !empty($shape_bg) ){
		$styles .= "
			#".$id." .rb_roadmap_item .roadmap_icon_wrapper > svg{
				fill: ".$shape_bg.";
			}
		";

		if( array_key_exists('active', array_merge(...$values)) ){
			$styles .= "
				#".$id." .rb_roadmap_item .roadmap_icon_wrapper .roadmap_divider{
					background-color: ".esc_attr($shape_bg).";
				}
			";			
		}
	}
	if( !empty($icon_color) ){
		$styles .= "
			#".$id." .rb_roadmap_item .roadmap_icon_wrapper i{
				color: ".$icon_color.";
			}
			#".$id." .rb_roadmap_item .roadmap_icon_wrapper i svg{
				fill: ".$icon_color.";
			}
		";
	}
	if( !empty($number_color) ){
		$styles .= "
			#".$id." .rb_roadmap_item .roadmap_icon_wrapper .number{
				color: ".$number_color.";
			}
		";
	}
	if( !empty($number_background) ){
		$styles .= "
			#".$id." .rb_roadmap_item .roadmap_icon_wrapper .number{
				background-color: ".$number_background.";
			}
		";
	}
	if( !empty($title_color) ){
		$styles .= "
			#".$id." .roadmap_content_wrapper .roadmap_title{
				color: ".$title_color.";
			}
		";
	}
	if( !empty($text_color) ){
		$styles .= "
			#".$id." .roadmap_content_wrapper .roadmap_description{
				color: ".$text_color.";
			}
		";
	}
	if( !empty($line_color) ){
		if( array_key_exists('active', array_merge(...$values)) ){
			$styles .= "
				#".$id." .rb_roadmap_item.active .roadmap_icon_wrapper .roadmap_divider,
				#".$id." .rb_roadmap_item.active ~ .rb_roadmap_item .roadmap_icon_wrapper .roadmap_divider{
						background-color: ".esc_attr($line_color).";
				}
			";			
		} else {
			$styles .= "
				#".$id." .rb_roadmap_item .roadmap_icon_wrapper .roadmap_divider{
					background-color: ".esc_attr($line_color).";
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
			{";

				if( !empty($vc_landscape_styles) ){
					$styles .= "#".$id."{
						".$vc_landscape_styles."
					}";
				}
				if( $customize_size_landscape ){
					if( !empty($title_size_landscape) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
								font-size: ".(int)$title_size_landscape."px;
							}
						";
					}
					if( !empty($title_margins_landscape) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
								margin: ".$title_margins_landscape.";
							}
						";
					}
					if( !empty($number_size_landscape) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .number{
								font-size: ".(int)$number_size_landscape."px;
								line-height: ".(int)$number_size_landscape."px;
							}
						";
					}
					if( !empty($text_size_landscape) ){
						$styles .= "
							#".$id." .roadmap_description{
								font-size: ".(int)$text_size_landscape."px;
								line-height: ".((int)$text_size_landscape * 1.5)."px;
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
					$styles .= "#".$id."{
						".$vc_portrait_styles."
					}";
				}
				if( $customize_size_portrait ){
					if( !empty($title_size_portrait) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
								font-size: ".(int)$title_size_portrait."px;
							}
						";
					}
					if( !empty($title_margins_portrait) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
								margin: ".$title_margins_portrait.";
							}
						";
					}
					if( !empty($number_size_portrait) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .number{
								font-size: ".(int)$number_size_portrait."px;
								line-height: ".(int)$number_size_portrait."px;
							}
						";
					}
					if( !empty($text_size_portrait) ){
						$styles .= "
							#".$id." .roadmap_description{
								font-size: ".(int)$text_size_portrait."px;
								line-height: ".((int)$text_size_portrait * 1.5)."px;
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
					$styles .= "#".$id."{
						".$vc_mobile_styles."
					}";
				}
				if( $customize_size_mobile ){
					if( !empty($title_size_mobile) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
								font-size: ".(int)$title_size_mobile."px;
							}
						";
					}
					if( !empty($title_margins_mobile) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .roadmap_title{
								margin: ".$title_margins_mobile.";
							}
						";
					}
					if( !empty($number_size_mobile) ){
						$styles .= "
							#".$id." .rb_roadmap_item .roadmap_content_wrapper .number{
								font-size: ".(int)$number_size_mobile."px;
								line-height: ".(int)$number_size_mobile."px;
							}
						";
					}
					if( !empty($text_size_mobile) ){
						$styles .= "
							#".$id." .roadmap_description{
								font-size: ".(int)$text_size_mobile."px;
								line-height: ".((int)$text_size_mobile * 1.5)."px;
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

 	/* -----> Roadmap classes <----- */

 	$extra_classes = 'style_'.esc_attr($style);

	/* -----> Roadmap module output <----- */
	$out .= "<div id='".$id."' class='rb_roadmap_module ".$extra_classes." ".esc_attr($el_class)."'>";

		foreach ($values as $value) {
			/* -----> Getting Icon <----- */
			$icon_output = '';

			if( !empty($value['icon_lib']) ){
				if( $value['icon_lib'] == 'rb_svg' ){
					$icon = "icon_".$value['icon_lib'];
					$svg_icon = json_decode(str_replace("``", "\"", $value[$icon]), true);
					$upload_dir = wp_upload_dir();
					$this_folder = $upload_dir['basedir'] . '/rb-svgicons/' . md5($svg_icon['collection']) . '/';

					$icon_output .= "<i class='svg' style='width:".$svg_icon['width']."px; height:".$svg_icon['height']."px;'>";
						$icon_output .= file_get_contents($this_folder . $svg_icon['name']);
					$icon_output .= "</i>";
				} else {
					$icon = array_keys($value)[1];

					if( !empty($value[$icon]) ){
						$icon_output .= '<i class="'.esc_attr($value[$icon]).'"></i>';
					}
				}
			}

			/* -----> Roadmap Item <----- */
			$out .= "<div class='rb_roadmap_item".(isset($value['active']) ? ' active' : '')."'>";
				$out .= "<div class='roadmap_icon_wrapper'>";
					$out .= '<svg style="width:100px; height:100px;" xmlns="http://www.w3.org/2000/svg">';
						if( $style == 'round' ){
							$out .= '<circle cx="50" cy="50" r="50" />';
						} else if( $style == 'triangle' ){
							$out .= '<path d="M75.4,16.7L96.7,57c10,18.9-4,41.6-25.1,40.9l-45.1-1.5C5.5,95.8-7,72.2,4.2,54L28,15.1C39.1-3.1,65.5-2.2,75.4,16.7z" />';
						} else if( $style == 'square' ){
							$out .= '<path d="M99.92,51.71c.52,13.43-1.66,26.21-7.1,32.94-12.76,15.76-61.7,20.92-77.47,8.17S-5.57,31.12,7.19,15.35,68.88-5.57,84.65,7.18c6.28,5.09,10.8,15.93,13.33,28.1C99.09,40.62,99.91,51.43,99.92,51.71Z" />';
						}
					$out .= '</svg>';

					$out .= $icon_output;

					$out .= "<span class='roadmap_divider'></span>";

					if( !empty($value['number']) ){
						$out .= "<span class='number title_ff'>".esc_html($value['number'])."</span>";
					}
				$out .= "</div>";

				$out .= "<div class='roadmap_content_wrapper'>";
					if( !empty($value['title']) ){
						$out .= "<p class='h3 roadmap_title'>".esc_html($value['title'])."</p>";
					}
					if( !empty($value['description']) ){
						$description = wp_kses( $value['description'], array(
							"b"			=> array(),
							"strong"	=> array(),
							"mark"		=> array(),
							"br"		=> array()
						));

						$out .= "<p class='roadmap_description'>".$description."</p>";
					}
				$out .= "</div>";
			$out .= "</div>";
		}

	$out .= "</div>";

	
	return $out;
}
add_shortcode( 'rb_sc_roadmap', 'rb_vc_shortcode_sc_roadmap' );

?>