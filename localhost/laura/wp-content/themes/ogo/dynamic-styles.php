<?php
defined( 'ABSPATH' ) or die();

// Logo Margins
if( get_theme_mod('logo_margins') ){
	$logo_margins = get_theme_mod('logo_margins');
	foreach( $logo_margins as $key => $value ){
		ogo__define_style('.site_logotype', array(
			'margin-'.$key => $value
		));
	}
}
if( get_theme_mod('footer_logo_margins') ){
	$footer_logo_margins = get_theme_mod('footer_logo_margins');
	foreach( $footer_logo_margins as $key => $value ){
		ogo__define_style('.footer-logo', array(
			'margin-'.$key => $value
		));
	}
}


/*
----> Boxed styles
*/
ogo__define_style('body[data-boxed="true"] .site.wrap', array(
	'background-color' => esc_attr(get_theme_mod('boxed_bg_color', '#fff'))
));


/*
----> Copyrights styles
*/
ogo__define_style('.site-footer', array(
	'background-color' => esc_attr(get_theme_mod('copyright_background', '#fff'))
));


/*
----> Typography styles
*/
foreach( OGO_FONTS as $font ){
	$family = 'sans-serif';
	$color = esc_html(get_theme_mod($font.'_font_color', '#000'));
	$size = esc_html(get_theme_mod($font.'_font_size', '18px'));
	$height = esc_html(get_theme_mod($font.'_font_height', 'initial'));

	if( get_theme_mod($font.'_font_family') ){
		$family = esc_html( get_theme_mod($font.'_font_family') );
		$family = explode(',', $family);
		$family = $family[0];
	}

	if( $font == 'body' ){
		ogo__define_style( 'body, select', array(
			'font-family' 	=> $family,
			'color'			=> $color,
			'font-size'		=> $size,
			'line-height'	=> $height,
		) );
		ogo__define_style( '.widget_nav_menu .widgettitle', array(
			'font-family' 	=> $family,
		) );
	} else if( $font == 'menu' ){
		ogo__define_style( '.menu-main-container.header_menu', array(
			'font-family' 	=> $family,
			'font-size'		=> $size,
			'line-height'	=> $height,
		) );
	} else if( $font == 'titles' ){
		ogo__define_style( '
				h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6,
				.rb-widget caption,
				.vc_pie_chart_value
			', array(
				'font-family' 	=> $family,
				'color'			=> $color,
			)
		);
		ogo__define_style( '
				.title_ff,
				ul.products li.product .price,
				body.wpb-js-composer .vc_tta-title-text,
				.woocommerce-tabs .tabs li a
			', array(
				'font-family' 	=> $family,
			)
		);
	}
}

/*
----> Top Bar styles
*/
if( get_theme_mod('top_bar_spacings') ){
	$top_bar_paddings = get_theme_mod('top_bar_spacings');
	foreach( $top_bar_paddings as $key => $value ){
		ogo__define_style('.site-header .top-bar-box', array(
			'padding-'.$key => $value
		));
	}
}
ogo__define_style('.top-bar-box', array(
	'background-color' => esc_attr(get_theme_mod('top_bar_bg_color', '#262838'))
));
ogo__define_style('
	.top-bar-box .container > * > a,
	.header_icons > .mini-cart > a,
	.wishlist_products_counter_number,
	.rb_compare_count,
	.woo_mini-count > span', array(
		'color' => esc_attr(get_theme_mod('top_bar_font_color', 'rgba(255,255,255,.7)'))
	)
);


/*
----> Title styles
*/
if( get_theme_mod('title_area_spacings') ){
	$title_paddings = get_theme_mod('title_area_spacings');
	foreach( $title_paddings as $key => $value ){

		ogo__define_style('.page_title_container', array(
			'padding-'.$key => $value
		));
	}
}
if( get_theme_mod('mobile_title_area_spacings') ){
	$mobile_title_paddings = get_theme_mod('mobile_title_area_spacings');
	foreach( $mobile_title_paddings as $key => $value ){

		ogo__define_style('.site-header-mobile .page_title_container', array(
			'padding-'.$key => $value
		));
	}
}
ogo__define_style('body:not(.single) .page_title_container .page_title_customizer_size', array( 
	'font-size' => esc_attr(get_theme_mod('title_archive_font_size'))
));
ogo__define_style('body.single .page_title_container .page_title_customizer_size', array( 
	'font-size' => esc_attr(get_theme_mod('title_single_font_size'))
));
ogo__define_style('.page_title_container', array( 
	'background' => '-webkit-linear-gradient(-6deg, '.esc_attr(get_theme_mod('title_background_gradient_2', '#296AD4')).', '.esc_attr(get_theme_mod('title_background_gradient_1', '#1FC5B6')).');',
	'background' => 'linear-gradient(-6deg, '.esc_attr(get_theme_mod('title_background_gradient_2', '#296AD4')).', '.esc_attr(get_theme_mod('title_background_gradient_1', '#1FC5B6')).');'
));
ogo__define_style('.page_title_container .single_post_categories', array( 
	'background-color' => esc_attr(get_theme_mod('title_categories_bg'))
));
ogo__define_style('.page_title_container .single_post_categories a', array( 
	'color' => esc_attr(get_theme_mod('title_categories_color'))
));
ogo__define_style('.page_title_container .page_title_customizer_size .page_title', array( 
	'color' => esc_attr(get_theme_mod('title_title_color'))
));
ogo__define_style('.page_title_container .single_post_meta a', array( 
	'color' => esc_attr(get_theme_mod('title_meta_color'))
));
ogo__define_style('.page_title_container .single_post_meta a:not(:last-child):after', array( 
	'background-color' => esc_attr(get_theme_mod('title_meta_color'))
));
ogo__define_style('.page_title_container .title_divider', array( 
	'background-color' => esc_attr(get_theme_mod("title_divider_color"))
));
ogo__define_style('
	.page_title_container .woocommerce-breadcrumb *, 
	.page_title_container .bread-crumbs *', array( 
		'color' => esc_attr(get_theme_mod('title_breadcrumbs_color'))
	)
);


/*
----> Sticky styles
*/
if( get_theme_mod('sticky_spacings') ){
	$sticky_paddings = get_theme_mod('sticky_spacings');
	foreach( $sticky_paddings as $key => $value ){
		ogo__define_style('
			.site-sticky:not(.sticky-mobile) .menu-main-container.header_menu > ul > .menu-item > a,
			.rb_sticky_template .menu-main-container.header_menu > ul > .menu-item > a', array(
				'padding-'.$key => $value
			)
		);
	}
}

ogo__define_style('.site-sticky', array(
	'background-color' => esc_attr(get_theme_mod('sticky_background', RB_BACKGROUND_COLOR))
));
ogo__define_style('.site-sticky.shadow', array(
	'-webkit-box-shadow' => '0 0 15px 5px '.esc_attr(get_theme_mod('sticky_shadow_color', 'rgba(16,1,148, 0.05)')),
	'-moz-box-shadow' => '0 0 15px 5px '.esc_attr(get_theme_mod('sticky_shadow_color', 'rgba(16,1,148, 0.05)')),
	'box-shadow' => '0 0 15px 5px '.esc_attr(get_theme_mod('sticky_shadow_color', 'rgba(16,1,148, 0.05)'))
));
ogo__define_style('.site-sticky .menu-main-container.header_menu > .menu > .menu-item > a', array( 
	'color' => esc_attr(get_theme_mod('sticky_font_color', PRIMARY_COLOR)) 
));
// Uncomment this for changing active/parent sticky menu item color
// ogo__define_style('
// 	.site-sticky .menu-main-container.header_menu > .menu > .menu-item.current-menu-item > a,
// 	.site-sticky .menu-main-container.header_menu > .menu > .menu-item.current-item-parent > a', array(
// 		'color' => esc_attr(get_theme_mod('sticky_accent_font_color', SECONDARY_COLOR))
// 	)
// );
ogo__define_style('
	.site-sticky .menu-main-container.header_menu > .menu > .menu-item > a:before', array(
		'background-color' => esc_attr(get_theme_mod('sticky_accent_font_color', SECONDARY_COLOR))
	)
);


/*
----> Menu styles
*/
if( get_theme_mod('menu_spacings') ){
	$menu_paddings = get_theme_mod('menu_spacings');
	foreach( $menu_paddings as $key => $value ){
		ogo__define_style('.menu-main-container.header_menu > ul > .menu-item > a', array(
			'padding-'.$key => $value
		));
	}
}
ogo__define_style('
	.menu-main-container.header_menu > .menu > .menu-item > a, 
	.search-trigger', array( 
		'color' => esc_attr(get_theme_mod('menu_font_color', PRIMARY_COLOR)) 
	)
);
// Uncomment this for changing active/parent menu item color
// ogo__define_style('
// 	.menu-main-container.header_menu > .menu > .menu-item.current-menu-item > a,
// 	.menu-main-container.header_menu > .menu > .menu-item.current-item-parent > a', array(
// 		'color' => esc_attr(get_theme_mod('menu_accent_font_color', SECONDARY_COLOR))
// 	)
// );
ogo__define_style('
	.menu-main-container.header_menu > .menu > .menu-item > a:before', array(
		'background-color' => esc_attr(get_theme_mod('menu_accent_font_color', SECONDARY_COLOR))
	)
);
ogo__define_style('
	.menu-main-container.header_menu .sub-menu a', array(
		'color' => esc_attr(get_theme_mod('submenu_font_color', PRIMARY_COLOR))
	)
);
ogo__define_style('
	.menu-main-container.header_menu .sub-menu li.current-menu-item,
	.menu-main-container.header_menu .sub-menu li.current-menu-ancestor', array(
		'background-color' => esc_attr(get_theme_mod('submenu_font_color_hover', SECONDARY_COLOR))
	)
);
ogo__define_style('
	.menu-main-container.header_menu .sub-menu li > a:before,
	.menu-main-container.header_menu .menu-item-object-rb-megamenu .sub-menu .rb_megamenu_item .widgettitle:before', array(
		'background-color' => esc_attr(get_theme_mod('submenu_font_color_hover', SECONDARY_COLOR))
	)
);


/*
----> Mobile menu styles
*/
if( get_theme_mod('mobile_menu_spacings') ){
	$mobile_menu_paddings = get_theme_mod('mobile_menu_spacings');
	foreach( $mobile_menu_paddings as $key => $value ){
		ogo__define_style('.site-header-mobile .top-bar-box, .sticky-mobile', array(
			'padding-'.$key => $value
		));
	}
}
ogo__define_style('
	.site-header-mobile .top-bar-box,
	.site-sticky.sticky-mobile', array( 
		'background-color' => esc_attr(get_theme_mod('mobile_topbar_bg', "#fff"))
	)
);
ogo__define_style('
	.site-header-mobile .menu-trigger span,
	.site-sticky.sticky-mobile .menu-trigger span', array( 
		'background-color' => esc_attr(get_theme_mod('mobile_icons_color', PRIMARY_COLOR))
	)
);
ogo__define_style('
	.site-header-mobile .top-bar-box .container .mini-cart > a, 
	.site-sticky.sticky-mobile .container .mini-cart > a', array( 
		'color' => esc_attr(get_theme_mod('mobile_icons_color', PRIMARY_COLOR))
	)
);
ogo__define_style('
	.site-header-mobile .menu-box .menu-main-container > ul .menu-item a,
	.site-header-mobile .menu-box .rb_megamenu_item .rb_column_wrapper .widgettitle', array( 
		'color' => esc_attr(get_theme_mod('mobile_menu_font_color', PRIMARY_COLOR)) 
	)
);
ogo__define_style('
	.site-header-mobile .sub-menu-trigger:before,
	.site-header-mobile .menu-box .menu-main-container > ul .current-menu-item > a,
	.site-header-mobile .menu-box .menu-main-container > ul .current-item-parent > a', array( 
		'color' => esc_attr(get_theme_mod('mobile_accent_font_color', SECONDARY_COLOR)) 
	)
);


/*
----> Responsive styles
*/
ogo__define_style('start-responsive', array(
	'desktop' => 'start'
));
// Default Menu
// Add this into function below for changing active/parent menu item color on hover
// .menu-main-container.header_menu > .menu > .menu-item:hover > a,
ogo__define_style('
	.search-trigger:hover', array(
		'color' => esc_attr(get_theme_mod('menu_accent_font_color', THIRD_COLOR))
	)
);
ogo__define_style('
	.menu-main-container.header_menu > ul .sub-menu li:not(.rb_megamenu_item):hover', array(
		'background-color' => esc_attr(get_theme_mod('submenu_font_color_hover', SECONDARY_COLOR))
	)
);
// Sticky Menu
// Add this into function below for changing active/parent menu item color on hover
// .site-sticky .menu-main-container.header_menu > .menu > .menu-item:hover > a,
ogo__define_style('
	.site-sticky .search-trigger:hover', array(
		'color' => esc_attr(get_theme_mod('sticky_accent_font_color', SECONDARY_COLOR))
	)
);
// Top Bar Icons
ogo__define_style('
	.top-bar-box .container > * > a:hover,
	.header_icons > .mini-cart > a:hover', array(
		'color' => esc_attr(get_theme_mod('top_bar_font_color_hover', '#fff'))
	)
);
ogo__define_style('end-responsive', array(
	'desktop' => 'end'
));