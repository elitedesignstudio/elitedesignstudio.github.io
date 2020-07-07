<?php
    
    // Get typography props
    $ogo_typography_control = array();
    if( function_exists('ogo_typography_control') ){
        $ogo_typography_control = array_merge(
            ogo_typography_control( 'titles', 'Yeseva One', array('400'), 'latin', '#353535', false, false ),
            ogo_typography_control( 'body', 'Montserrat', array('regular', '500', '700'), 'latin', '#353535', '16px', '1.75em' )
        );
    }

    // Set default sidebars
    $default_sidebars = array(
        'blog_sidebar'          => esc_html_x('Blog', 'customizer', 'ogo'),
        'blog_single_sidebar'   => esc_html_x('Blog Single', 'customizer', 'ogo'),
        'custom_sidebar'        => esc_html_x('Custom Sidebar', 'customizer', 'ogo'),
    );
    if( class_exists('WooCommerce') ){
        $default_sidebars['woocommerce'] = esc_html_x('WooCommerce', 'customizer', 'ogo');
        $default_sidebars['woocommerce_single'] = esc_html_x('WooCommerce Product', 'customizer', 'ogo');
    }

	return array(
		'colors' => array(
            'title'     => esc_html_x('Theme Colors', 'customizer', 'ogo'),
            'layout'    => array(
                'primary_color' => array(
                    'type'              => 'alpha-color',
                    'label'             => esc_html_x('Theme Color', 'customizer', 'ogo'),
                    'default'           => PRIMARY_COLOR,
                    'sanitize_callback' => 'wp_strip_all_tags'
                ),
                'secondary_color' => array(
                    'type'              => 'alpha-color',
                    'label'             => esc_html_x('Second Color', 'customizer', 'ogo'),
                    'default'           => SECONDARY_COLOR,
                    'sanitize_callback' => 'wp_strip_all_tags'
                ),
                'third_color' => array(
                    'type'              => 'alpha-color',
                    'label'             => esc_html_x('Third Color', 'customizer', 'ogo'),
                    'default'           => THIRD_COLOR,
                    'sanitize_callback' => 'wp_strip_all_tags'
                ),
            )
        ),
        'typography' => array(
            'title'     => esc_html_x('Typography', 'customizer', 'ogo'),
            'layout'    => array_merge(
                $ogo_typography_control,
                array(
                    'g_fonts_api' => array(
                        'type'          => 'custom-text',
                        'label'         => esc_html_x('Google Fonts Api Key', 'customizer', 'ogo'),
                        'transport'     => 'postMessage',
                        'function'      => 'ogo_update_fonts',
                        'description'   => esc_html_x('Enter Your Api Key and press Enter', 'customizer', 'ogo'),
                        'input_attrs'   => array(
                            'success'   => esc_html_x('Google Fonts updated. Please refresh the page to see the changes', 'customizer', 'ogo'),
                            'error'     => esc_html_x('Wrong API Key or Resource is unavailable', 'customizer', 'ogo')
                        )
                    )
                )
            )
        ),
        'blog_layout' => array(
            'title'     => esc_html_x('Blog Layout', 'customizer', 'ogo'),
            'layout'    => array(
                'blog_view' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Blog layout', 'customizer', 'ogo'),
                    'default'   => 'large',
                    'choices'   => array(
                        'large'     => esc_html_x('Large', 'customizer', 'ogo'),
                        'grid'      => esc_html_x('Grid', 'customizer', 'ogo'),
                        'masonry'   => esc_html_x('Masonry', 'customizer', 'ogo'),
                    )
                ),
                'blog_columns' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Blog Columns', 'customizer', 'ogo'),
                    'default'   => '2',
                    'choices'   => array(
                        '2' => esc_html_x('2 Columns', 'customizer', 'ogo'),
                        '3' => esc_html_x('3 Columns', 'customizer', 'ogo'),
                        '4' => esc_html_x('4 Columns', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'blog_view',
                        'operator'  => '!=',
                        'value'     => 'large'
                    )
                ),
                'blog_chars_count' => array(
                    'type'          => 'number',
                    'label'         => esc_html_x('Crop content', 'customizer', 'ogo'),
                    'default'       => '-1',
                    'description'   => esc_html_x('"-1" to SHOW whole content | empty or "0" to HIDE content', 'customizer', 'ogo'),
                    'input_attrs'   => array(
                        'min'   => '-1'
                    )
                ),
                'blog_read_more' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Read More Button Title', 'customizer', 'ogo'),
                    'default'       => 'Read More',
                ),
                'blog_sidebar' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Select sidebar', 'customizer', 'ogo'),
                    'default'       => 'blog_sidebar',
                    'choices'       => array_merge( 
                        array(
                            'none'  => esc_html_x('None', 'customizer', 'ogo'),
                        ),
                        is_array(get_theme_mod('theme_sidebars')) ? get_theme_mod('theme_sidebars') : array()
                    ),
                ),
                'blog_sidebar_position' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Sidebar Position', 'customizer', 'ogo'),
                    'default'   => 'right',
                    'choices'   => array(
                        'right' => esc_html_x('Right', 'customizer', 'ogo'),
                        'left'  => esc_html_x('Left', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'blog_sidebar',
                        'operator'  => '!=',
                        'value'     => 'none'
                    )
                ),
                'blog_single_sidebar' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Select Single sidebar', 'customizer', 'ogo'),
                    'default'       => 'blog_single_sidebar',
                    'choices'       => array_merge( 
                        array(
                            'none'  => esc_html_x('None', 'customizer', 'ogo'),
                        ),
                        is_array(get_theme_mod('theme_sidebars')) ? get_theme_mod('theme_sidebars') : array()
                    ),
                ),
                'blog_single_sidebar_position' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Sidebar Single Position', 'customizer', 'ogo'),
                    'default'   => 'right',
                    'choices'   => array(
                        'right' => esc_html_x('Right', 'customizer', 'ogo'),
                        'left'  => esc_html_x('Left', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'blog_single_sidebar',
                        'operator'  => '!=',
                        'value'     => 'none'
                    )
                ),
                'blog_related' => array(
                    'default'   => false,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Show Related', 'customizer', 'ogo'),
                    'separator' => 'line-top'
                ),
                'blog_related_cropp' => array(
                    'default'   => false,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Cropped Images', 'customizer', 'ogo'),
                ),
                'blog_related_title' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Title', 'customizer', 'ogo'),
                    'default'       => 'Related Posts',
                    'dependency'    => array(
                        'control'   => 'blog_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'blog_related_columns' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Related Columns', 'customizer', 'ogo'),
                    'default'   => '3',
                    'choices'   => array(
                        '2' => esc_html_x('2 Columns', 'customizer', 'ogo'),
                        '3' => esc_html_x('3 Columns', 'customizer', 'ogo'),
                        '4' => esc_html_x('4 Columns', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'blog_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'blog_related_items' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Related Items', 'customizer', 'ogo'),
                    'default'       => '3',
                    'dependency'    => array(
                        'control'   => 'blog_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'blog_related_pick' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Pick From', 'customizer', 'ogo'),
                    'default'       => 'category',
                    'choices'       => array(
                        'category'      => esc_html_x( 'Same Categories', 'customizer', 'ogo' ),
                        'tags'          => esc_html_x( 'Same Tags', 'customizer', 'ogo' ),
                        'random'        => esc_html_x('Random', 'customizer', 'ogo'),
                        'latest'        => esc_html_x( 'Latest', 'customizer', 'ogo' ),
                    ),
                    'dependency'    => array(
                        'control'   => 'blog_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'blog_related_text_length' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Text Lenght', 'customizer', 'ogo'),
                    'default'       => '90',
                    'dependency'    => array(
                        'control'   => 'blog_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'blog_related_hide' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Hide', 'customizer', 'ogo'),
                    'default'       => 'none',
                    'choices'       => array(
                        'none'          => esc_html_x('None', 'customizer', 'ogo'),
                        'title'         => esc_html_x( 'Title', 'customizer', 'ogo' ),
                        'cats'          => esc_html_x( 'Categories', 'customizer', 'ogo' ),
                        'author'        => esc_html_x( 'Author', 'customizer', 'ogo' ),
                        'date'          => esc_html_x( 'Date', 'customizer', 'ogo' ),
                        'comments'      => esc_html_x( 'Comments', 'customizer', 'ogo' ),
                        'meta'          => esc_html_x( 'All Meta', 'customizer', 'ogo' ),
                        'featured'      => esc_html_x( 'Featured', 'customizer', 'ogo' ),
                        'read_more'     => esc_html_x( 'Read More', 'customizer', 'ogo' ),
                        'excerpt'       => esc_html_x( 'Excerpt', 'customizer', 'ogo' ),
                    ),
                    'input_attrs'   => array(
                        'multiple'      => true
                    ),
                    'dependency'    => array(
                        'control'       => 'blog_related',
                        'operator'      => '==',
                        'value'         => 'true'
                    )
                ),
                'blog_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Blog', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'blog_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Blog', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'blog_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Blog', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
                'blog_single_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Blog Single', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'blog_single_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Blog Single', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'blog_single_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Blog Single', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
            )
        ),
        'page_layout' => array(
            'title'     => esc_html_x('Page Layout', 'customizer', 'ogo'),
            'layout'    => array(
                'page_sidebar' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Select sidebar', 'customizer', 'ogo'),
                    'default'       => 'none',
                    'choices'       => array_merge( 
                        array(
                            'none'  => esc_html_x('None', 'customizer', 'ogo'),
                        ),
                        is_array(get_theme_mod('theme_sidebars')) ? get_theme_mod('theme_sidebars') : array() 
                    ),
                ),
                'page_sidebar_position' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Sidebar Position', 'customizer', 'ogo'),
                    'default'   => 'right',
                    'choices'   => array(
                        'right' => esc_html_x('Right', 'customizer', 'ogo'),
                        'left'  => esc_html_x('Left', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'page_sidebar',
                        'operator'  => '!=',
                        'value'     => 'none'
                    )
                ),
            )
        ),
        'portfolio_layout' => array(
            'title'     => esc_html_x('Portfolio Layout', 'customizer', 'ogo'),
            'layout'    => array(
                'rb_portfolio_layout' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Layout', 'customizer', 'ogo'),
                    'default'       => 'grid',
                    'choices'       => array(
                        'grid'              => esc_html_x( 'Grid', 'customizer', 'ogo' ),
                        'masonry'           => esc_html_x( 'Masonry', 'customizer', 'ogo' ),
                        'pinterest'         => esc_html_x( 'Pinterest', 'customizer', 'ogo' ),
                        'asymmetric'        => esc_html_x( 'Asymmetric', 'customizer', 'ogo' ),
                        'carousel'          => esc_html_x( 'Carousel', 'customizer', 'ogo' ),
                        'carousel_wide'     => esc_html_x( 'Carousel Wide', 'customizer', 'ogo' ),
                        'motion_category'   => esc_html_x( 'Motion Category', 'customizer', 'ogo' ),
                    )
                ),
                'rb_portfolio_hover' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Hover', 'customizer', 'ogo'),
                    'default'       => 'overlay',
                    'choices'       => array(
                        'overlay'       => esc_html_x( 'Overlay', 'customizer', 'ogo' ),
                        'slide_bottom'  => esc_html_x( 'Slide From Bottom', 'customizer', 'ogo' ),
                        'slide_left'    => esc_html_x( 'Slide From Left', 'customizer', 'ogo' ),
                        'swipe_right'   => esc_html_x( 'Swipe Right', 'customizer', 'ogo' ),
                    )
                ),
                'rb_portfolio_orderby' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Order By', 'customizer', 'ogo'),
                    'default'       => 'date',
                    'choices'       => array(
                        'date'          => esc_html_x( 'Date', 'customizer', 'ogo' ),
                        'menu_order'    => esc_html_x( 'Order ID', 'customizer', 'ogo' ),
                        'title'         => esc_html_x( 'Title', 'customizer', 'ogo' ),
                    )
                ),
                'rb_portfolio_order' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Order', 'customizer', 'ogo'),
                    'default'       => 'DESC',
                    'choices'       => array(
                        'ASC'   => esc_html_x( 'ASC', 'customizer', 'ogo' ),
                        'DESC'  => esc_html_x( 'DESC', 'customizer', 'ogo' ),
                    )
                ),
                'rb_portfolio_columns' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Columns', 'customizer', 'ogo'),
                    'default'       => '4',
                    'choices'       => array(
                        '2' => esc_html_x( '2', 'customizer', 'ogo' ),
                        '3' => esc_html_x( '3', 'customizer', 'ogo' ),
                        '4' => esc_html_x( '4', 'customizer', 'ogo' ),
                        '5' => esc_html_x( '5', 'customizer', 'ogo' ),
                        '6' => esc_html_x( '6', 'customizer', 'ogo' ),
                    )
                ),
                'rb_portfolio_items_pp' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Items per Page', 'customizer', 'ogo'),
                    'default'       => '9',
                ),
                'rb_portfolio_square_img' => array(
                    'default'   => true,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Square Images', 'customizer', 'ogo'),
                ),
                'rb_portfolio_no_spacing' => array(
                    'default'   => false,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Disable Spacings', 'customizer', 'ogo'),
                ),
                'rb_portfolio_pagination' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Pagination', 'customizer', 'ogo'),
                    'default'       => 'standart',
                    'choices'       => array(
                        'standart'      => esc_html_x( 'Standard', 'customizer', 'ogo' ),
                        'load_more'     => esc_html_x( 'Load More', 'customizer', 'ogo' ),
                    )
                ),
                'rb_portfolio_hide_meta' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Hide', 'customizer', 'ogo'),
                    'default'       => '',
                    'choices'       => array(
                        ''              => esc_html_x( 'None', 'backend', 'ogo' ),
                        'title'         => esc_html_x( 'Title', 'backend', 'ogo' ),
                        'categories'    => esc_html_x( 'Categories', 'backend', 'ogo' ),
                        'tags'          => esc_html_x( 'Tags', 'backend', 'ogo' ),
                    )
                ),
                'rb_portfolio_slug' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Slug', 'customizer', 'ogo'),
                    'default'       => 'Portfolio',
                ),
                'rb_portfolio_single_slug' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Single Slug', 'customizer', 'ogo'),
                    'default'       => 'Portfolio Single',
                ),
                'rb_portfolio_related' => array(
                    'default'   => false,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Show Related', 'customizer', 'ogo'),
                    'separator' => 'line-top'
                ),
                'rb_portfolio_related_title' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Title', 'customizer', 'ogo'),
                    'default'       => 'Related Projects',
                    'dependency'    => array(
                        'control'   => 'rb_portfolio_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'rb_portfolio_related_hover' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Related Hover', 'customizer', 'ogo'),
                    'default'       => 'overlay',
                    'choices'       => array(
                        'overlay'       => esc_html_x( 'Overlay', 'customizer', 'ogo' ),
                        'slide_bottom'  => esc_html_x( 'Slide From Bottom', 'customizer', 'ogo' ),
                        'slide_left'    => esc_html_x( 'Slide From Left', 'customizer', 'ogo' ),
                        'swipe_right'   => esc_html_x( 'Swipe Right', 'customizer', 'ogo' ),
                    ),
                    'dependency'    => array(
                        'control'   => 'rb_portfolio_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'rb_portfolio_related_columns' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Related Columns', 'customizer', 'ogo'),
                    'default'   => '4',
                    'choices'   => array(
                        '2' => esc_html_x('2 Columns', 'customizer', 'ogo'),
                        '3' => esc_html_x('3 Columns', 'customizer', 'ogo'),
                        '4' => esc_html_x('4 Columns', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'rb_portfolio_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'rb_portfolio_related_items' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Related Items', 'customizer', 'ogo'),
                    'default'       => '4',
                    'dependency'    => array(
                        'control'   => 'rb_portfolio_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'rb_portfolio_related_pick' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Pick From', 'customizer', 'ogo'),
                    'default'       => 'category',
                    'choices'       => array(
                        'category'      => esc_html_x( 'Same Categories', 'customizer', 'ogo' ),
                        'tags'          => esc_html_x( 'Same Tags', 'customizer', 'ogo' ),
                        'random'        => esc_html_x( 'Random', 'customizer', 'ogo' ),
                        'latest'        => esc_html_x( 'Latest', 'customizer', 'ogo' ),
                    ),
                    'dependency'    => array(
                        'control'   => 'rb_portfolio_related',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
                'rb_portfolio_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Portfolio', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'rb_portfolio_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Portfolio', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'rb_portfolio_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Portfolio', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
                'rb_portfolio_single_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Portfolio Single', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'rb_portfolio_single_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Portfolio Single', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'rb_portfolio_single_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Portfolio Single', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
            ),
        ),
        'staff_layout' => array(
            'title'     => esc_html_x('Our Team Layout', 'customizer', 'ogo'),
            'layout'    => array(
                'rb_staff_style' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Style', 'customizer', 'ogo'),
                    'default'       => 'triangle',
                    'choices'       => array(
                        'triangle'      => esc_html_x('Triangle', 'customizer', 'ogo'),
                        'square'        => esc_html_x('Square', 'customizer', 'ogo'),
                    )
                ),
                'rb_staff_order_by' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Order by', 'customizer', 'ogo'),
                    'default'       => 'date',
                    'choices'       => array(
                        'date'          => esc_html_x('Date', 'customizer', 'ogo'),
                        'menu_order'    => esc_html_x('Order ID', 'customizer', 'ogo'),
                        'title'         => esc_html_x('Title', 'customizer', 'ogo'),
                    )
                ),
                'rb_staff_order' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Order', 'customizer', 'ogo'),
                    'default'       => 'ASC',
                    'choices'       => array(
                        'ASC'   => esc_html_x('ASC', 'customizer', 'ogo'),
                        'DESC'  => esc_html_x('DESC', 'customizer', 'ogo'),
                    )
                ),
                'rb_staff_columns' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Columns', 'customizer', 'ogo'),
                    'default'       => '3',
                    'choices'       => array(
                        '2' => esc_html_x('2', 'customizer', 'ogo'),
                        '3' => esc_html_x('3', 'customizer', 'ogo'),
                        '4' => esc_html_x('4', 'customizer', 'ogo'),
                    )
                ),
                'rb_staff_items_pp' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Items per Page', 'customizer', 'ogo'),
                    'default'       => '9',
                ),
                'rb_staff_hide_meta' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Hide', 'customizer', 'ogo'),
                    'default'       => '',
                    'choices'       => array(
                        ''              => esc_html_x( 'None', 'customizer', 'ogo' ),
                        'name'          => esc_html_x( 'Name', 'customizer', 'ogo' ),
                        'position'      => esc_html_x( 'Position', 'customizer', 'ogo' ),
                        'department'    => esc_html_x( 'Department', 'customizer', 'ogo' ),
                        'socials'       => esc_html_x( 'Socials', 'customizer', 'ogo' ),
                    ),
                    'input_attrs'   => array(
                        'multiple'      => true
                    )
                ),
                'rb_staff_sidebar' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Select sidebar', 'customizer', 'ogo'),
                    'default'       => 'none',
                    'choices'       => array_merge( 
                        array(
                            'none'  => esc_html_x('None', 'customizer', 'ogo'),
                        ),
                        is_array(get_theme_mod('theme_sidebars')) ? get_theme_mod('theme_sidebars') : array() 
                    ),
                ),
                'rb_staff_sidebar_position' => array(
                    'type'      => 'radio',
                    'label'     => esc_html_x('Sidebar Position', 'customizer', 'ogo'),
                    'default'   => 'right',
                    'choices'   => array(
                        'right' => esc_html_x('Right', 'customizer', 'ogo'),
                        'left'  => esc_html_x('Left', 'customizer', 'ogo'),
                    ),
                    'dependency'    => array(
                        'control'   => 'rb_staff_sidebar',
                        'operator'  => '!=',
                        'value'     => 'none'
                    )
                ),
                'rb_staff_slug' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Slug', 'customizer', 'ogo'),
                    'default'       => 'Our Team',
                ),
                'rb_staff_single_accent_background' => array(
                    'type'          => 'wp_image',
                    'label'         => esc_html_x('Single Accent Background', 'customizer', 'ogo'),
                ),
                'rb_staff_single_slug' => array(
                    'type'          => 'text',
                    'label'         => esc_html_x('Single Slug', 'customizer', 'ogo'),
                    'default'       => 'Our Team Single',
                ),
                'rb_staff_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Staff', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'rb_staff_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Staff', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'rb_staff_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Staff', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
                'rb_staff_single_custom_header' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Header Template for Staff Single', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'separator'     => 'line-top',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Custom Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_headers
                ),
                'rb_staff_single_custom_sticky_header' => array(
                    'type'           => 'select',
                    'label'          => esc_html_x('Sticky Template for Staff Single', 'customizer', 'ogo'),
                    'default'        => 'inherit',
                    'choices'        => array(
                        'inherit'       => esc_html_x('Inherit from Sticky Header', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_sticky_headers
                ),
                'rb_staff_single_custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Footer Template for Staff Single', 'customizer', 'ogo'),
                    'default'       => 'inherit',
                    'choices'       => array(
                        'inherit'       => esc_html_x('Inherit from Footer Appearance', 'customizer', 'ogo'),
                        'default'       => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers
                ),
            )
        ),
        'sidebars' => array(
            'title'     => esc_html_x('Sidebars', 'customizer', 'ogo'),
            'layout'    => array(
                'theme_sidebars' => array(
                    'type'          => 'repeater',
                    'label'         => esc_html_x('Sidebars', 'customizer', 'ogo'),
                    'add_label'     => esc_html_x('Add New', 'customizer', 'ogo'),
                    'save_label'    => esc_html_x('Apply', 'customizer', 'ogo'),
                    'default'       => $default_sidebars,
                ),
            )
        ),
        'site_layout' => array(
            'title'     => esc_html_x('Site Layout', 'customizer', 'ogo'),
            'layout'    => array(
                'sticky_sidebars' => array(
                    'default'   => false,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Sticky Sidebars', 'customizer', 'ogo'),
                ),
                'boxed_layout' => array(
                    'default'   => false,
                    'type'      => 'checkbox',
                    'label'     => esc_html_x('Apply Boxed Layout', 'customizer', 'ogo'),
                ),
                'boxed_bg_color' => array(
                    'type'              => 'alpha-color',
                    'label'             => esc_html_x('Content Background', 'customizer', 'ogo'),
                    'default'           => '#fff',
                    'sanitize_callback' => 'wp_strip_all_tags',
                    'live_preview'      => array(
                        'trigger_class'     => 'body[data-boxed="true"] .site.wrap',
                        'style_to_change'   => 'background-color',
                    ),
                    'dependency'    => array(
                        'control'   => 'boxed_layout',
                        'operator'  => '==',
                        'value'     => 'true'
                    )
                ),
            )
        ),
        'sidebars' => array(
            'title'     => esc_html_x('Sidebars', 'customizer', 'ogo'),
            'layout'    => array(
                'theme_sidebars' => array(
                    'type'          => 'repeater',
                    'label'         => esc_html_x('Sidebars', 'customizer', 'ogo'),
                    'add_label'     => esc_html_x('Add New', 'customizer', 'ogo'),
                    'save_label'    => esc_html_x('Apply', 'customizer', 'ogo'),
                    'default'       => $default_sidebars,
                ),
            )
        ),
        'purchase_code' => array(
            'title'     => esc_html_x('Purchase Code', 'customizer', 'ogo'),
            'layout'    => array(
                'envato_purchase_code_ogo' => array(
                    'type'          => 'text',
                    'setting_type'  => 'option',
                    'label'         => esc_html_x('Please enter your purchase code', 'customizer', 'ogo'),
                    'default'       => '',
                ),
            )
        ),
	);
?>