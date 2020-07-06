<?php

function rb_vc_shortcode_sc_pricing_plan ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		"title"							=> "",
		"currency"						=> "$",
		"price"							=> "49",
		"price_desc"					=> "",
		"values"						=> "",
		"button_title"					=> "",
		"button_url"					=> "#",
		"highlighted"					=> false,
		"highlight_label"				=> "",
		"el_class"						=> "",
		/* -----> STYLING TAB <----- */
		"background_color"				=> "#D4F4F1",
		"header_background"				=> THIRD_COLOR,
		"ribbon_color"					=> PRIMARY_COLOR,
		"ribbon_background"				=> SECONDARY_COLOR,
		"title_color"					=> SECONDARY_COLOR,
		"divider_color"					=> SECONDARY_COLOR,
		"price_color"					=> "#fff",
		"icons_color"					=> rb_Hex2RGBA( PRIMARY_COLOR, '0.3' ),
		"text_color"					=> rb_Hex2RGBA( PRIMARY_COLOR, '0.5' ),
		"button_title_color"			=> SECONDARY_COLOR,
		"button_hover_title"			=> SECONDARY_COLOR,
		"button_main_bg"				=> PRIMARY_COLOR,
		"button_rear_bg"				=> SECONDARY_COLOR,
	);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Parse values array <----- */
	$values = (array)vc_param_group_parse_atts($values);

	/* -----> Variables declaration <----- */
	$out = $styles = "";
	$id = uniqid( "rb_pricing_plan_" );
	$content = apply_filters( "the_content", $content );

	/* -----> Customize default styles <----- */
	if( !empty($background_color) ){
		$styles .= "
			#".$id."{
				background-color: ".esc_attr($background_color).";
			}
		";
	}
	if( !empty($header_background) ){
		$styles .= "
			#".$id." .pricing-header:before{
				background-color: ".esc_attr($header_background).";
			}
		";
	}
	if( !empty($ribbon_color) ){
		$styles .= "
			#".$id." .hightlight{
				color: ".esc_attr($ribbon_color).";
			}
		";
	}
	if( !empty($ribbon_background) ){
		$styles .= "
			#".$id." .hightlight{
				background-color: ".esc_attr($ribbon_background).";
			}
		";
	}
	if( !empty($title_color) ){
		$styles .= "
			#".$id." .pricing-header h3{
				color: ".esc_attr($title_color).";
			}
		";
	}
	if( !empty($divider_color) ){
		$styles .= "
			#".$id." .pricing-header .pricing_plan_divider{
				background-color: ".esc_attr($divider_color).";
			}
		";
	}
	if( !empty($price_color) ){
		$styles .= "
			#".$id." .pricing-header .price_wrapper{
				color: ".esc_attr($price_color).";
			}
		";
	}
	if( !empty($icons_color) ){
		$styles .= "
			#".$id." .content-wrapper i{
				color: ".esc_attr($icons_color).";
			}
		";
	}
	if( !empty($text_color) ){
		$styles .= "
			#".$id." .content-wrapper{
				color: ".esc_attr($text_color).";
			}
		";
	}
	if( !empty($button_title_color) ){
		$styles .= "
			#".$id." .pricing_plan_button{
				color: ".esc_attr($button_title_color).";
			}
		";
	}
	if( !empty($button_main_bg) ){
		$styles .= "
			#".$id." .pricing_plan_button{
				background-color: ".esc_attr($button_main_bg).";
			}
		";
	}
	if( !empty($button_rear_bg) ){
		$styles .= "
			#".$id." .pricing_plan_button:after{
				background-color: ".esc_attr($button_rear_bg).";
			}
		";
	}
	if( !empty($button_hover_title) ) {
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
				#".$id." .pricing_plan_button:hover{
					color: ".esc_attr($button_hover_title).";	
				}
			";

		$styles .="
			}
		";
	}
	/* -----> End of default styles <----- */

	rb__vc_styles($styles);

	$module_classes = 'rb_pricing_plan_module';
	$module_classes .= $highlighted ? ' highlighted' : '';
	$module_classes .= !empty($el_class) ? ' '.esc_attr($el_class) : '';

	/* -----> Filter Products module output <----- */
	$out .= "<div id='".$id."' class='".$module_classes."'>";
		if( $highlighted && !empty($highlight_label) ){
			$out .= "<span class='hightlight'>".esc_html($highlight_label)."</span>";
		}

		$out .= "<div class='pricing-header'>";
			if( !empty($title) ){
				$out .= "<h3>".esc_html($title)."</h3>";
				$out .= "<span class='pricing_plan_divider'></span>";
			}
			if( !empty($price) ){
				$out .= "<div class='price_wrapper'>";
					if( !empty($currency) ){
						$out .= "<i>".esc_html($currency)."</i>";
					}
					$out .= "<span>".esc_html($price)."</span>";
					if( !empty($price_desc) ){
						$out .= "<p>".$price_desc."</p>";
					}
				$out .= "</div>";
			}
		$out .= "</div>";

		if( !empty($values) ){
			$out .= "<div class='content-wrapper'>";
				foreach ($values as $value){
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

					$out .= $icon_output;
					$out .= "<p class='content-item-title'>".$value['title']."</p>";
				}
			$out .= "</div>";
		}

		if( !empty($button_title) && !empty($button_url) ){
			$out .= "<div class='rb_button_wrapper'>";
				$out .= "<a href='".esc_url($button_url)."' class='rb_button medium pricing_plan_button'>";
					$out .= esc_html($button_title);
				$out .= "</a>";
			$out .= "</div>";
		}
	$out .= "</div>";

	return $out;
}
add_shortcode( 'rb_sc_pricing_plan', 'rb_vc_shortcode_sc_pricing_plan' );

?>