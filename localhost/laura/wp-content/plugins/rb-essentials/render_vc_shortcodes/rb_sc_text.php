<?php

function rb_vc_shortcode_sc_text ( $atts = array(), $content = "" ){
	$defaults = array(
		/* -----> GENERAL TAB <----- */
		'subtitle'					=> '',
		'title'						=> '',
		'title_tag'					=> 'h3',
		'button_title'				=> '',
		'button_url'				=> '#',
		'el_class'					=> '',
		/* -----> STYLING TAB <----- */
		'button_type'				=> 'default',
		'title_type'				=> 'default',
		'title_shadow'				=> SECONDARY_COLOR,
		'subtitle_type'				=> 'default',
		'button_size'				=> 'medium',
		'customize_colors'			=> true,
		'custom_title_color'		=> PRIMARY_COLOR,
		'custom_subtitle_color'		=> PRIMARY_COLOR,
		'custom_font_color'			=> PRIMARY_COLOR,
		'custom_font_color_hover'	=> SECONDARY_COLOR,
		'custom_font_list_markers'	=> SECONDARY_COLOR,
		'custom_attachment_color'	=> SECONDARY_COLOR,
		'btn_title'					=> SECONDARY_COLOR,
		'btn_title_hover'			=> SECONDARY_COLOR,
		'btn_main_bg'				=> PRIMARY_COLOR,
		'btn_rear_bg'				=> SECONDARY_COLOR,
 	);
 	$responsive_vars = array(
 		/* -----> RESPONSIVE TABS <----- */
 		'all' => array(
 			'custom_styles'		=> '',
 			'customize_align'	=> false,
 			'module_alignment'	=> 'left',
 			'customize_size' 	=> false,
			'subtitle_size'		=> '22px',
			'subtitle_lh'		=> '22px',
			'title_size'		=> '60px',
			'title_lh'			=> '1.18em',
			'title_margin'		=> '0px 0px 32px 0px',
			'content_size'		=> '19px',
			'content_lh'		=> '34px',
			'button_margin'		=> '50px',
 		),
	);

	$responsive_defaults = add_responsive_suffix($responsive_vars);
	$defaults = array_merge($defaults, $responsive_defaults);

	$proc_atts = shortcode_atts( $defaults, $atts );
	extract( $proc_atts );

	/* -----> Variables declaration <----- */
	$out = $styles = $vc_desktop_class = $vc_landscape_class = $vc_portrait_class = $vc_mobile_class = "";
	$id = uniqid( "rb_textmodule_" );
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
			.".$id."{
				".$vc_desktop_styles.";
			}
		";
	}
	if( $customize_align ){
		$styles .= "
			.".$id."{
				text-align: ".$module_alignment.";
			}
		";
	}
	if( $title_type == 'shadow' ){
		if( !empty($title_shadow) ){
			$styles .= "
				.".$id." .rb_textmodule_title{
					text-shadow: 5px 5px 0 ".esc_attr($title_shadow).";
				}
			";
		}
	}
	if( $customize_colors ){
		if( !empty($custom_title_color) ){
			$styles .= "
				.".$id." .rb_textmodule_title,
				.".$id." .rb_textmodule_button.simple{
					color: ".esc_attr($custom_title_color).";
				}
			";
		}
		if( !empty($custom_subtitle_color) ){
			$styles .= "
				.".$id." .rb_textmodule_subtitle{
					color: ".esc_attr($custom_subtitle_color).";
				}
			";
		}
		if( !empty($custom_font_color) ){
			$styles .= "
				.".$id."{
					color: ".esc_attr($custom_font_color).";
				}
				.rb_footer_template .".$id." a{
					color: ".esc_attr($custom_font_color).";
				}
			";
		}
		if( !empty($custom_font_color_hover) ) {
			$styles .= "
				@media 
					screen and (min-width: 1367px),
					screen and (min-width: 1200px) and (any-hover: hover),
					screen and (min-width: 1200px) and (min--moz-device-pixel-ratio:0),
					screen and (min-width: 1200px) and (-ms-high-contrast: none),
					screen and (min-width: 1200px) and (-ms-high-contrast: active)
				{
			";

				if( !empty($custom_font_color_hover) ){
					$styles .= "
						.".$id." .rb_textmodule_content_wrapper a:hover{
							color: ".esc_attr($custom_font_color_hover).";
						}
					";
				}

			$styles .="
				}
			";
		}
		if( !empty($custom_font_list_markers) ){
			$styles .= "
				.".$id." .rb_textmodule_content_wrapper ul li:before{
					background-color: ".esc_attr($custom_font_list_markers).";
				}
			";
		}
		if( !empty($custom_attachment_color) ){
			$styles .= "
				.".$id.".subtitle_aside .subtitle-wrapper p:before,
				.".$id.".subtitle_dashed_divider .rb_textmodule_subtitle .dashed_divider,
				.".$id.".subtitle_border_divider .rb_textmodule_subtitle:after{
					background-color: ".esc_attr($custom_attachment_color).";
				}
			";
		}
		if( !empty($btn_title) ){
			$styles .= "
				.".$id." .rb_button_wrapper .rb_button{
					color: ".esc_attr($btn_title).";	
				}
			";
		}
		if( !empty($btn_main_bg) ){
			$styles .= "
				.".$id." .rb_button_wrapper .rb_button{
					background-color: ".esc_attr($btn_main_bg).";	
				}
			";	
		}
		if( !empty($btn_rear_bg) ){
			if( $button_type == 'default' ){
				$styles .= "
					.".$id." .rb_button_wrapper .rb_button:after{
						background-color: ".esc_attr($btn_rear_bg).";	
					}
				";
			} else {
				$styles .= "
					.".$id." .rb_button_wrapper .rb_button .dashes:after{
						background-image: -webkit-linear-gradient(left, ".esc_attr($btn_rear_bg).", ".esc_attr($btn_rear_bg)." 15%, transparent 15%, transparent 100%);
						background-image: -o-linear-gradient(left, ".esc_attr($btn_rear_bg).", ".esc_attr($btn_rear_bg)." 15%, transparent 15%, transparent 100%);
						background-image: linear-gradient(to right, ".esc_attr($btn_rear_bg).", ".esc_attr($btn_rear_bg)." 15%, transparent 15%, transparent 100%);
					}
				";
			}
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
					.".$id." .rb_button_wrapper .rb_button:hover{
						color: ".esc_attr($btn_title_hover).";	
					}
				";

			$styles .="
				}
			";
		}
	}
	if( $customize_size ){
		if( !empty($subtitle_size) ){
			$styles .= "
				.".$id." .rb_textmodule_subtitle{
					font-size: ".esc_attr($subtitle_size).";
				}
			";
		}
		if( !empty($subtitle_lh) ){
			$styles .= "
				.".$id." .rb_textmodule_subtitle{
					line-height: ".esc_attr($subtitle_lh).";
				}
			";
		}
		if( !empty($title_size) ){
			$styles .= "
				.".$id." .rb_textmodule_title{
					font-size: ".esc_attr($title_size).";
				}
			";
		}
		if( !empty($title_lh) ){
			$styles .= "
				.".$id." .rb_textmodule_title{
					line-height: ".esc_attr($title_lh).";
				}
			";
		}
		if( !empty($title_margin) ){
			$styles .= "
				.".$id." .rb_textmodule_title{
					margin: ".esc_attr($title_margin).";
				}
			";
		}
		if( !empty($content_size) ){
			$styles .= "
				.".$id." .rb_textmodule_content_wrapper{
					font-size: ".esc_attr($content_size).";
				}
			";
		}
		if( !empty($content_lh) ){
			$styles .= "
				.".$id." .rb_textmodule_content_wrapper{
					line-height: ".esc_attr($content_lh).";
				}
			";
		}
		if( !empty($button_margin) ){
			$styles .= "
				.".$id." .rb_button_wrapper{
					margin-top: ".(int)esc_attr($button_margin)."px;
				}
			";
		}
	}
	/* -----> End of default styles <----- */

	/* -----> Customize landscape styles <----- */
	if( 
		!empty($vc_landscape_styles) || 
		$customize_align_landscape || 
		$customize_size_landscape 
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
					.".$id."{
						text-align: ".$module_alignment_landscape.";
					}
				";
			}
			if( $customize_size_landscape ){
				if( !empty($title_size_landscape) ){
					$styles .= "
						.".$id." .rb_textmodule_title{
							font-size: ".(int)esc_attr($title_size_landscape)."px;
						}
					";
				}
				if( !empty($subtitle_size_landscape) ){
					$styles .= "
						.".$id." .rb_textmodule_subtitle{
							font-size: ".(int)esc_attr($subtitle_size_landscape)."px;
						}
					";
				}
				if( !empty($title_margin_landscape) ){
					$styles .= "
						.".$id." .rb_textmodule_title{
							margin: ".esc_attr($title_margin_landscape).";
						}
					";
				}
				if( !empty($button_margin_landscape) ){
					$styles .= "
						.".$id." .rb_button_wrapper{
							margin-top: ".(int)esc_attr($button_margin_landscape)."px;
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
		$customize_align_portrait || 
		$customize_size_portrait 
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
					.".$id."{
						text-align: ".$module_alignment_portrait.";
					}
				";
			}
			if( $customize_size_portrait ){
				if( !empty($title_size_portrait) ){
					$styles .= "
						.".$id." .rb_textmodule_title{
							font-size: ".(int)esc_attr($title_size_portrait)."px;
						}
					";
				}
				if( !empty($subtitle_size_portrait) ){
					$styles .= "
						.".$id." .rb_textmodule_subtitle{
							font-size: ".(int)esc_attr($subtitle_size_portrait)."px;
						}
					";
				}
				if( !empty($title_margin_portrait) ){
					$styles .= "
						.".$id." .rb_textmodule_title{
							margin: ".esc_attr($title_margin_portrait).";
						}
					";
				}
				if( !empty($button_margin_portrait) ){
					$styles .= "
						.".$id." .rb_button_wrapper{
							margin-top: ".(int)esc_attr($button_margin_portrait)."px;
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
		$customize_align_mobile || 
		$customize_size_mobile 
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
					.".$id."{
						text-align: ".$module_alignment_mobile.";
					}
				";
			}
			if( $customize_size_mobile ){
				if( !empty($title_size_mobile) ){
					$styles .= "
						.".$id." .rb_textmodule_title{
							font-size: ".(int)esc_attr($title_size_mobile)."px;
						}
					";
				}
				if( !empty($subtitle_size_mobile) ){
					$styles .= "
						.".$id." .rb_textmodule_subtitle{
							font-size: ".(int)esc_attr($subtitle_size_mobile)."px;
						}
					";
				}
				if( !empty($title_margin_mobile) ){
					$styles .= "
						.".$id." .rb_textmodule_title{
							margin: ".esc_attr($title_margin_mobile).";
						}
					";
				}
				if( !empty($button_margin_mobile) ){
					$styles .= "
						.".$id." .rb_button_wrapper{
							margin-top: ".(int)esc_attr($button_margin_mobile)."px;
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

	$module_classes = $id.' rb_textmodule';
	$module_classes .= ' subtitle_'.esc_attr($subtitle_type);

	$module_classes .= ' align_'.esc_attr($module_alignment);
	$module_classes .= $customize_align_landscape ? ' landscape_align_'.esc_attr($module_alignment_landscape) : '';
	$module_classes .= $customize_align_portrait ? ' portrait_align_'.esc_attr($module_alignment_portrait) : '';
	$module_classes .= $customize_align_mobile ? ' mobile_align_'.esc_attr($module_alignment_mobile) : '';
	
	$module_classes .= !empty($el_class) ? ' '.esc_attr($el_class) : '';

	$button_classes = $customize_size ? ' '.esc_attr($button_size) : ' medium'; 

	/* -----> Text module output <----- */
	if ( !empty($title) || !empty($subtitle) || !empty($content) ){
		$out .= "<div class='".$module_classes."'>"; //ID in class, coz slick-slider rewrite ID.

			if( !empty($subtitle) ){
				if( $subtitle_type == 'aside' ){
					$out .= "<div class='subtitle-wrapper'>";
						$out .= "<p class='rb_textmodule_subtitle'>". esc_html( $subtitle ) ."</p>";
					$out .= "</div>";

					$out .= "<div class='main-text-wrapper'>";
				} else if( $subtitle_type == 'dashed_divider' ) {
					$out .= "<p class='rb_textmodule_subtitle'>";
						$out .= esc_html( $subtitle );
						$out .= "<span class='dashed_divider'></span>";
					$out .= "</p>";
				} else {
					$out .= "<p class='rb_textmodule_subtitle'>". esc_html( $subtitle ) ."</p>";
				}
			}

			if( !empty($title) ){
				$out .= "<".$title_tag." class='rb_textmodule_title'>";
					$out .= $title;
				$out .= "</".$title_tag.">";
			}
			if( !empty($content) ){
				$out .= "<div class='rb_textmodule_content_wrapper'>";
					$out .= $content;
				$out .= "</div>";
			}
			if( !empty($button_title) ){
				$out .= "<div class='rb_button_wrapper ".esc_attr($button_type)."'>";
					$out .= "<a href='".esc_url($button_url)."' class='rb_textmodule_button rb_button".$button_classes."'>";
						$out .= esc_html($button_title);
						$out .= $button_type == 'dashed' ? '<span class="dashes"></span>' : '';
					$out .= "</a>";
				$out .= "</div>";
			}

			if( !empty($subtitle) && $subtitle_type == 'aside' ){
				$out .= "</div>";
			}

		$out .= "</div>";
	}

	return $out;
}
add_shortcode( 'rb_sc_text', 'rb_vc_shortcode_sc_text' );

?>