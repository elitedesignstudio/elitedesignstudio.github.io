<?php

function rb_setup_metaboxes(){

    // Sidebar properties for metaboxes
    $all_sidebars = array();
    $sidebars = get_theme_mod('theme_sidebars');
    $choosen_sidebar = rb_get_metabox('page_sidebar');

    foreach( $sidebars as $k => $v ){
        $all_sidebars[$k] = $v;
    }

    // Staff Taxonomies for metaboxes
    $departments = $positions = array();

    $terms = get_terms( array(
        'taxonomy'      => 'rb_staff_member_department',
        'hide_empty'    => false
    ) );

    foreach( $terms as $term ){
        $term = (array)$term;

        $departments[$term['name']] = $term['name'];
    }

    $terms = get_terms( array(
        'taxonomy'      => 'rb_staff_member_position',
        'hide_empty'    => false
    ) );

    foreach( $terms as $term ){
        $term = (array)$term;
        $positions[$term['name']] = $term['name'];
    }

    // Custom metaboxes properties
    $metaboxes = array(
        /* ----------> Post Metaboxes <---------- */
        'format_gallery' => array(
            'type'          => 'gallery',
            'title'         => esc_html_x('Choose Gallery', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'gallery'
            )
        ),
        'format_link_title' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Link Title', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'link'
            )
        ),
        'format_link_url' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Link Url', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'link'
            )
        ),
        'format_quote' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Quote', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'quote'
            )
        ),
        'format_quote_author' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Quote Author', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'quote'
            )
        ),
        'format_video' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Video URL', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'video'
            )
        ),
        'format_audio' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Audio URL', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'side',
            'priority'      => 'high',
            'dependency'    => array(
                'field'         => 'post_format',
                'operator'      => '==',
                'value'         => 'audio'
            )
        ),
        'related_blog_posts' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Related Shortcode', 'backend', 'ogo'),
            'description'   => esc_html_x('To create a custom related posts layout please generate the needed shortcode using Blog module and insert the generated shortcode into this field. Or type in "none" to disable related posts.', 'backend', 'ogo'),
            'screen'        => 'post',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        /* ----------> Common Metaboxes <---------- */
        'page_sidebar' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Select Sidebar', 'backend', 'ogo'),
            'screen'        => array('page', 'post', 'product', 'rb_staff', 'rb_portfolio'),
            'context'       => 'side',
            'priority'      => 'low',
            'input_attr'    => array_merge(
                array(
                    'default'   => esc_html_x('Default', 'backend', 'ogo'),
                    'none'      => esc_html_x('None', 'backend', 'ogo'),
                ),
                $all_sidebars
            )
        ),
        'sidebar_pos' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Sidebar Position', 'backend', 'ogo'),
            'screen'        => array('page', 'post', 'product', 'rb_staff', 'rb_portfolio'),
            'context'       => 'side',
            'priority'      => 'low',
            'input_attr'    => array(
                'default'       => esc_html_x('Default', 'backend', 'ogo'),
                'left'          => esc_html_x('Left', 'backend', 'ogo'),
                'right'         => esc_html_x('Right', 'backend', 'ogo'),
            )
        ),
        'title_image' => array(
            'type'          => 'image',
            'title'         => esc_html_x('Header Image', 'backend', 'ogo'),
            'screen'        => array('post', 'page', 'product', 'rb_staff', 'rb_portfolio'),
            'context'       => 'side',
            'priority'      => 'low'
        ),
        'title_interactive_image' => array(
            'type'          => 'image',
            'title'         => esc_html_x('Header Interactive Image', 'backend', 'ogo'),
            'screen'        => array('post', 'page', 'product', 'rb_staff', 'rb_portfolio'),
            'context'       => 'side',
            'priority'      => 'low'
        ),
        'title_interactive_remove' => array(
            'type'          => 'checkbox',
            'title'         => esc_html_x('Remove Interactive Image', 'backend', 'ogo'),
            'screen'        => array('post', 'page', 'product', 'rb_staff', 'rb_portfolio'),
            'context'       => 'side',
            'priority'      => 'low'
        ),
        /* ----------> Shop Metaboxes <---------- */
        'product_slides_count' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Slides to show in product gallery', 'backend', 'ogo'),
            'screen'        => 'product',
            'context'       => 'side',
            'priority'      => 'low'
        ),
        /* ----------> Page Metaboxes <---------- */
        'slider_shortcode' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Main Slider Shortcode', 'backend', 'ogo'),
            'screen'        => 'page',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        /* ----------> Staff Metaboxes <---------- */
        'staff_experience' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Experience', 'backend', 'ogo'),
            'screen'        => 'rb_staff',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        'staff_email' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Email', 'backend', 'ogo'),
            'screen'        => 'rb_staff',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        'staff_phone' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Phone Number', 'backend', 'ogo'),
            'screen'        => 'rb_staff',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        'staff_biography' => array(
            'type'          => 'textarea',
            'title'         => esc_html_x('Biography', 'backend', 'ogo'),
            'screen'        => 'rb_staff',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        'staff_socials' => array(
            'type'          => 'repeater',
            'title'         => esc_html_x('Socials', 'backend', 'ogo'),
            'screen'        => 'rb_staff',
            'context'       => 'normal',
            'priority'      => 'high',
            'button'        => esc_html_x('Add new social network', 'backend', 'ogo'),
            'fields'        => array(
                'social_title' => array(
                    'type'  => 'text',
                    'title' => esc_html_x('Social account title', 'backend', 'ogo'),
                ),
                'social_url' => array(
                    'type'  => 'text',
                    'title' => esc_html_x('Social account URL', 'backend', 'ogo'),
                ),
                'social_icon' => array(
                    'type'  => 'icon',
                    'title' => esc_html_x('Social account Icon', 'backend', 'ogo'),
                ),
            )
        ),
        /* ----------> Portfolio Metaboxes <---------- */
        'portfolio_type' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Portfolio Type', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'side',
            'priority'      => 'high',
            'input_attr'    => array(
                'small_images'  => esc_html_x('Small Images', 'backend', 'ogo'),
                'small_slider'  => esc_html_x('Small Slider', 'backend', 'ogo'),
                'large_images'  => esc_html_x('Large Images', 'backend', 'ogo'),
                'large_slider'  => esc_html_x('Large Slider', 'backend', 'ogo'),
                'gallery'       => esc_html_x('Gallery', 'backend', 'ogo'),
                'small_masonry' => esc_html_x('Small Masonry', 'backend', 'ogo'),
                'large_masonry' => esc_html_x('Large Masonry', 'backend', 'ogo'),
                'custom_layout' => esc_html_x('Custom Layout', 'backend', 'ogo'),
            )
        ),
        'portfolio_gallery_template' => array(
            'type'          => 'radio',
            'title'         => esc_html_x('Gallery Template', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'side',
            'priority'      => 'high',
            'format'        => 'image',
            'input_attr'    => array(
                'grid_1'        => 'grid_1.png',
                'grid_2'        => 'grid_2.png',
                'grid_3'        => 'grid_3.png',
                'grid_4'        => 'grid_4.png',
                'grid_5'        => 'grid_5.png',
                'grid_6'        => 'grid_6.png',
                'grid_7'        => 'grid_7.png',
            ),
            'dependency'    => array(
                'field'         => 'portfolio_type',
                'operator'      => '==',
                'value'         => 'custom_layout'
            )
        ),
        'portfolio_gallery' => array(
            'type'          => 'gallery',
            'title'         => esc_html_x('Gallery', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'side',
            'priority'      => 'high',
        ),
        'portfolio_client' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Client', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'side',
            'priority'      => 'high'
        ),
        'portfolio_author' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Author', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'side',
            'priority'      => 'high'
        ),
        'portfolio_masonry_width' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Masonry Width', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'normal',
            'description'   => esc_html_x('This option is used in the Isotope Portfolio Layout only. The image will take the selected number of columns and will be displayed accordingly.', 'backend', 'ogo'),
            'priority'      => 'high',
            'input_attr'    => array(
                '1' => esc_html_x('One', 'backend', 'ogo'),
                '2' => esc_html_x('Two', 'backend', 'ogo'),
                '3' => esc_html_x('Three', 'backend', 'ogo'),
                '4' => esc_html_x('Four', 'backend', 'ogo'),
                '5' => esc_html_x('Five', 'backend', 'ogo'),
                '6' => esc_html_x('Six', 'backend', 'ogo'),
            )
        ),
        'portfolio_masonry_height' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Masonry Height', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'normal',
            'description'   => esc_html_x('This option is used in the Isotope Portfolio Layout only. The image will take the selected number of lines and will be displayed accordingly.', 'backend', 'ogo'),
            'priority'      => 'high',
            'input_attr'    => array(
                '1' => esc_html_x('One', 'backend', 'ogo'),
                '2' => esc_html_x('Two', 'backend', 'ogo'),
                '3' => esc_html_x('Three', 'backend', 'ogo'),
                '4' => esc_html_x('Four', 'backend', 'ogo'),
                '5' => esc_html_x('Five', 'backend', 'ogo'),
                '6' => esc_html_x('Six', 'backend', 'ogo'),
            )
        ),
        'related_portfolio_posts' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Related Shortcode', 'backend', 'ogo'),
            'description'   => esc_html_x('To create a custom related portfolio layout please generate the needed shortcode using Portfolio module and insert the generated shortcode into this field. Or type in "none" to disable related portfolio posts.', 'backend', 'ogo'),
            'screen'        => 'rb_portfolio',
            'context'       => 'normal',
            'priority'      => 'high'
        ),
        /* ----------> Header Metaboxes <---------- */
        'header_absolute' => array(
            'type'          => 'checkbox',
            'title'         => esc_html_x('Menu and logo overlays title area and homepage slider', 'backend', 'odo'),
            'description'   => esc_html_x('This option will force the menu and logo sections to overlay the title area. It is useful when using transparent menu.', 'backend', 'odo'),
            'screen'        => 'rb-tmpl-header',
            'context'       => 'side',
            'priority'      => 'low'
        ),
        /* ----------> Megamenu Metaboxes <---------- */
        'megamenu_width' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Megamenu Width', 'backend', 'ogo'),
            'screen'        => 'rb-megamenu',
            'context'       => 'side',
            'priority'      => 'low',
            'input_attr'    => array(
                'content_width'     => esc_html_x('Content Width', 'backend', 'ogo'),
                'full_width'        => esc_html_x('Full Width', 'backend', 'ogo'),
                'custom_width'      => esc_html_x('Custom Width', 'backend', 'ogo'),
            )
        ),
        'megamenu_custom_width' => array(
            'type'          => 'text',
            'title'         => esc_html_x('Megamenu Custom Width', 'backend', 'ogo'),
            'description'   => esc_html_x('Please, enter value with unit ( px / % / vw )', 'backend', 'ogo'),
            'screen'        => 'rb-megamenu',
            'context'       => 'side',
            'priority'      => 'low',
            'dependency'    => array(
                'field'         => 'megamenu_width',
                'operator'      => '==',
                'value'         => 'custom_width'
            ),
        ),
        'megamenu_position' => array(
            'type'          => 'select',
            'title'         => esc_html_x('Megamenu Position', 'backend', 'ogo'),
            'screen'        => 'rb-megamenu',
            'context'       => 'side',
            'priority'      => 'low',
            'dependency'    => array(
                'field'         => 'megamenu_width',
                'operator'      => '==',
                'value'         => 'content_width'
            ),
            'input_attr'    => array(
                'depend'        => esc_html_x('Depend By Parent', 'backend', 'ogo'),
                'center'        => esc_html_x('Always Center', 'backend', 'ogo'),
                'shifted'       => esc_html_x('Shifted to the edge', 'backend', 'ogo'),
            )
        ),
    );

    return $metaboxes;
}

?>