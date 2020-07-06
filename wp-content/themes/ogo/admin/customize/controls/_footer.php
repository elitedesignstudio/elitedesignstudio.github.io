<?php
	return array(
        'footer_section' => array(
            'title'     => esc_html_x('Footer Appearance', 'customizer', 'ogo'),
            'layout'    => array(
                'sticky_footer' => array(
                    'type'          => 'checkbox',
                    'label'         => esc_html_x('Sticky Footer', 'customizer', 'ogo'),
                    'default'       => false,
                ),
                'copyright_background' => array(
                    'type'              => 'alpha-color',
                    'label'             => esc_html_x('Background Color', 'customizer', 'ogo'),
                    'default'           => "#fff",
                    'sanitize_callback' => 'wp_strip_all_tags',
                    'live_preview'      => array(
                        'trigger_class'     => '.site-footer',
                        'style_to_change'   => 'background-color',
                    )
                ),
                'footer_logotype' => array(
                    'type'          => 'wp_image',
                    'label'         => esc_html_x('Logo', 'customizer', 'ogo'),
                    'description'   => esc_html_x('To get a retina logo please upload a double-size image and set the image dimentions to fit the actual logo size', 'customizer', 'ogo'),
                ),
                'footer_logo_dimensions' => array(
                    'type'          => 'multiple_input',
                    'label'         => esc_html_x('Dimensions', 'customizer', 'ogo'),
                    'choices'       => array(
                        'width'  => array( 
                            'placeholder' => esc_html_x('Width', 'customizer', 'ogo'), 
                            'value' => 64 
                        ),
                        'height' => array( 
                            'placeholder' => esc_html_x('Height', 'customizer', 'ogo'), 
                            'value' => 0
                        ),
                    )
                ),
                'footer_logo_margins' => array(
                    'type'          => 'multiple_input',
                    'label'         => esc_html_x('Spacings', 'customizer', 'ogo'),
                    'choices'       => array(
                        'top'  => array( 
                            'placeholder' => esc_html_x('Top (px or %)', 'customizer', 'ogo'), 
                        ),
                        'right' => array( 
                            'placeholder' => esc_html_x('Right (px or %)', 'customizer', 'ogo'), 
                        ),
                        'bottom' => array( 
                            'placeholder' => esc_html_x('Bottom (px or %)', 'customizer', 'ogo'), 
                        ),
                        'left' => array( 
                            'placeholder' => esc_html_x('Left (px or %)', 'customizer', 'ogo'), 
                        ),
                    )
                ),
                'copyright_text' => array(
                    'type'      => 'text',
                    'label'     => esc_html_x('Copyrights Notice', 'customizer', 'ogo'),
                    'default'   => "Coyright © OGO 2019 — All rights reserved.",
                    'separator' => "line"
                ),
                'custom_footer' => array(
                    'type'          => 'select',
                    'label'         => esc_html_x('Custom Footer Template', 'customizer', 'ogo'),
                    'default'       => 'default',
                    'choices'       => array(
                        'default'   => esc_html_x('Default', 'customizer', 'ogo'),
                    ) + $custom_footers,
                    'description'   => esc_html_x('All settings above are applied for default footer template only', 'customizer', 'ogo')
                ),
            )
        ),
	)
?>