<?php

function rb_vc_shortcode_sc_grouped_image ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"style"						=> "square",
		"values"					=> "",
		"el_class"					=> "",
		/* -----> STYLING TAB <----- */
		"custom_styles"				=> "",
		"shape_bg"					=> THIRD_COLOR,
		"shape_bg_hover"			=> THIRD_COLOR,
		"icon_color"				=> '#fff',
		"icon_color_hover"			=> '#fff',
		"title_color"				=> PRIMARY_COLOR,
		"description_color"			=> PRIMARY_COLOR,
		"dots_color"				=> PRIMARY_COLOR,
		"line_color"				=> 'rgba(0,0,0,.2)',
	);

	$responsive_vars = array(
		"all" => array(
			"custom_styles"		=> "",
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
	$id = uniqid( "rb_grouped_image_" );

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
	if( !empty($shape_bg) ){
		$styles .= "
			#".$id." .rb_grouped_image_item .grouped_image_icon_wrapper > svg{
				fill: ".esc_attr($shape_bg).";
			}
		";
	}
	if( !empty($icon_color) ){
		$styles .= "
			#".$id." .rb_grouped_image_item .grouped_image_icon_wrapper i{
				color: ".esc_attr($icon_color).";
			}
			#".$id." .rb_grouped_image_item .grouped_image_icon_wrapper i > svg{
				fill: ".esc_attr($icon_color).";
			}
		";
	}
	if( !empty($title_color) ){
		$styles .= "
			#".$id." .rb_grouped_image_item .grouped_image_content_wrapper .grouped_image_title{
				color: ".esc_attr($title_color).";
			}
		";
	}
	if( !empty($description_color) ){
		$styles .= "
			#".$id." .rb_grouped_image_item .grouped_image_content_wrapper .grouped_image_description{
				color: ".esc_attr($description_color).";
			}
		";
	}
	if( !empty($dots_color) ){
		$styles .= "
			#".$id." .rb_grouped_image_item .grouped_image_icon_wrapper .grouped_image_connection{
				background-color: ".esc_attr($dots_color).";
			}
		";
	}
	if( !empty($line_color) ){
		$styles .= "
			#".$id." .rb_grouped_image_item .grouped_image_icon_wrapper:before{
				background-color: ".esc_attr($line_color).";
			}
		";
	}
	if( 
		!empty($shape_bg_hover) ||
		!empty($icon_color_hover)
	){
		$styles .= "
			@media 
				screen and (min-width: 1367px),
				screen and (min-width: 1200px) and (any-hover: hover),
				screen and (min-width: 1200px) and (min--moz-device-pixel-ratio:0),
				screen and (min-width: 1200px) and (-ms-high-contrast: none),
				screen and (min-width: 1200px) and (-ms-high-contrast: active)
			{
		";

			if( !empty($shape_bg_hover) ){
				$styles .= "
					#".$id." .rb_grouped_image_item:hover .grouped_image_icon_wrapper > svg{
						fill: ".esc_attr($shape_bg_hover).";
					}
				";
			}
			if( !empty($icon_color_hover) ){
				$styles .= "
					#".$id."{
						color: ".esc_attr($icon_color_hover).";
					}
				";
			}

		$styles .="
			}
		";
	}
 	/* -----> End of default styles <----- */

 	/* -----> Customize landscape styles <----- */
	if( !empty($vc_landscape_styles) ){
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
				$styles .= "#".$id."{
					".$vc_portrait_styles."
				}";
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
				$styles .= "#".$id."{
					".$vc_mobile_styles."
				}";
			}

		$styles .= " 
			}
		";
	}
	/* -----> End of mobile styles <----- */

	rb__vc_styles($styles);

 	/* -----> Grouped Image classes <----- */

 	$module_classes = ' rb_grouped_image_module';
 	$module_classes .= ' style_'.esc_attr($style);
 	$module_classes .= !empty($el_class) ? ' '.esc_attr($el_class) : '';

	/* -----> Grouped Image module output <----- */
	$out .= "<div id='".$id."' class='".$module_classes."'>";
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

			/* -----> Grouped Image Item <----- */
			$value['angle'] = empty($value['angle']) ? '0' : (int)esc_attr($value['angle']);
			$rotation = '-webkit-transform: rotate('.$value['angle'].'deg); -ms-transform: rotate('.$value['angle'].'deg); transform: rotate('.$value['angle'].'deg);';

			$out .= "<div class='rb_grouped_image_item".(isset($value['active']) ? ' active' : '')."'>";
				$out .= "<div class='grouped_image_icon_wrapper'>";
					$out .= '<svg style="width:166px; height:166px; '.(isset($rotation) ? $rotation : '').'" xmlns="http://www.w3.org/2000/svg">';
						if( $style == 'round' ){
							$out .= '<circle cx="83" cy="83" r="83" />';
						} else if( $style == 'triangle' ){
							$out .= '<path d="M42.5,160.57A42.49,42.49,0,0,1,5.7,96.83L46.2,26.68a42.5,42.5,0,0,1,73.6,0l40.51,70.15a42.5,42.5,0,0,1-36.8,63.74Z"/>';
						} else if( $style == 'square' ){
							$out .= '<path d="M165.87,85.84c.86,22.29-2.76,43.51-11.79,54.68C132.9,166.68,51.66,175.25,25.49,154.08S-9.24,51.66,11.94,25.48,114.34-9.24,140.52,11.92c10.43,8.45,17.93,26.45,22.13,46.65C164.49,67.43,165.85,85.38,165.87,85.84Z"/>';
						}
					$out .= '</svg>';

					$out .= $icon_output;

					$out .= "<span class='grouped_image_connection'></span>";
				$out .= "</div>";

				$out .= "<div class='grouped_image_content_wrapper'>";
					if( !empty($value['title']) ){
						$out .= "<p class='grouped_image_title'>".esc_html($value['title'])."</p>";
					}
					if( !empty($value['description']) ){
						$description = wp_kses( $value['description'], array(
							"b"			=> array(),
							"strong"	=> array(),
							"mark"		=> array(),
							"br"		=> array()
						));

						$out .= "<p class='grouped_image_description'>".$description."</p>";
					}
				$out .= "</div>";
			$out .= "</div>";
		}

	$out .= "</div>";

	
	return $out;
}
add_shortcode( 'rb_sc_grouped_image', 'rb_vc_shortcode_sc_grouped_image' );

?>