<?php
    return array(
        'woo_general' => array(
            'title'     => esc_html_x('General', 'customizer', 'ogo'),
            'layout'    => array(
                'woo_cart' => array(
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Show Cart', 'customizer', 'ogo'),
                    'default'   => true
                ),
                'woocommerce_mini_cart' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Mini Cart View', 'customizer', 'ogo'),
                    'default'   => 'sidebar-view',
                    'choices'   => array(
                        'popup-view' => esc_html_x('Popup', 'customizer', 'ogo'),
                        'sidebar-view'  => esc_html_x('Sidebar', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'woo_cart',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'woo_archive_cols' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Shop Columns', 'customizer', 'ogo'),
                    'default'   => '3',
                    'choices'   => array(
                        '2' => esc_html_x('2 Columns', 'customizer', 'ogo'),
                        '3' => esc_html_x('3 Columns', 'customizer', 'ogo'),
                        '4' => esc_html_x('4 Columns', 'customizer', 'ogo'),
                    )
                ),
                'woo_archive_count' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Show Products per Page', 'customizer', 'ogo'),
                    'default'       => '9',
                    'input_attrs'   => array(
                        'min'   => '2'
                    )
                ),
                'woo_tag_lifetime' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Lifetime of the "New" badge', 'customizer', 'ogo'),
                    'description'   => esc_html_x('In days', 'customizer', 'ogo'),
                    'default'       => '14'
                ),
                'woo_pagination' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Pagination Type', 'customizer', 'ogo'),
                    'default'   => 'default',
                    'choices'   => array(
                        'default'   => esc_html_x('Default', 'customizer', 'ogo'),
                        'click'     => esc_html_x('Load More on Click', 'customizer', 'ogo'),
                        'scroll'    => esc_html_x('Load More on Scroll', 'customizer', 'ogo'),
                    )
                ),
                'woo_slug' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Slug', 'customizer', 'ogo'),
                    'default'       => 'Shop',
                ),
                'woo_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for WooCommerce', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'woo_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for WooCommerce', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'woo_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for WooCommerce', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
            )
        ),
        'woo_sidebar' => array(
            'title'     => esc_html_x('Sidebar', 'customizer', 'ogo'),
            'layout'    => array(
                'woocommerce_sidebar' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Shop Sidebar', 'customizer', 'ogo'),
                    'default'       => 'woocommerce',
                    'choices'       => array_merge( 
                        array(
                            'none'  => esc_html_x('None', 'customizer', 'ogo'),
                        ),
                        is_array(get_theme_mod('theme_sidebars')) ? get_theme_mod('theme_sidebars') : array()
                    ),
                ),
                'woocommerce_sidebar_position' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Shop Sidebar Position', 'customizer', 'ogo'),
                    'default'   => 'left',
                    'choices'   => array(
                        'right' => esc_html_x('Right', 'customizer', 'ogo'),
                        'left'  => esc_html_x('Left', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'woocommerce_sidebar',
                        'operator'  => '!=',
                        'value'     => 'none'
                    )
                ),
                'woocommerce_single_sidebar' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Product Details Sidebar', 'customizer', 'ogo'),
                    'default'       => 'woocommerce_single',
                    'choices'       => array_merge( 
                        array(
                            'none'  => esc_html_x('None', 'customizer', 'ogo'),
                        ),
                        is_array(get_theme_mod('theme_sidebars')) ? get_theme_mod('theme_sidebars') : array()
                    ),
                ),
                'woocommerce_single_sidebar_position' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Product Details Sidebar Position', 'customizer', 'ogo'),
                    'default'   => 'right',
                    'choices'   => array(
                        'right' => esc_html_x('Right', 'customizer', 'ogo'),
                        'left'  => esc_html_x('Left', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'woocommerce_single_sidebar',
                        'operator'  => '!=',
                        'value'     => 'none'
                    )
                ),
            )
        ),
        'woo_single' => array(
            'title'     => esc_html_x('Product Details', 'customizer', 'ogo'),
            'layout'    => array(
                'woo_gallery_thumbnails_count' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Quantity of visible gallery thumbnails', 'customizer', 'ogo'),
                    'default'       => '6',
                    'input_attrs'   => array(
                        'min'   => '2'
                    )
                ),
                'woo_related_cols' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Related Columns', 'customizer', 'ogo'),
                    'default'   => '3',
                    'choices'   => array(
                        '2' => esc_html_x('2 Columns', 'customizer', 'ogo'),
                        '3' => esc_html_x('3 Columns', 'customizer', 'ogo'),
                        '4' => esc_html_x('4 Columns', 'customizer', 'ogo'),
                    )
                ),
                'woo_related_count' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Related Products per Page', 'customizer', 'ogo'),
                    'default'       => '6'
                ),
                'related_products_carousel' => array(
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Enable related carousel', 'customizer', 'ogo'),
                    'default'   => true
                ),
                'related_products_slides_to_scroll' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Slides to scroll', 'customizer', 'ogo'),
                    'default'       => '1',
                    'dependency'    => array(
                        'control'   => 'related_products_carousel',
                        'operator'  => '==',
                        'value'     => 'true'
                    ),
                ),
                'related_products_autoplay_speed' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Autoplay speed', 'customizer', 'ogo'),
                    'description'   => esc_html_x('Delay in seconds. Enter "0" to disable autoplay', 'customizer', 'ogo'),
                    'default'       => '3',
                    'input_attrs'   => array(
                        'min'   => '0'
                    ),
                    'dependency'    => array(
                        'control'   => 'related_products_carousel',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'woo_single_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Product', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'woo_single_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Product', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'woo_single_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Product', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
            )
        ),
    );
?>