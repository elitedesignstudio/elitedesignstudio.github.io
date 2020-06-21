<?php

$priority = 1;

Kirki::add_field(
	'arts',
	[
		'type'     => 'switch',
		'settings' => 'enable_ajax',
		'label'    => esc_html__( 'Enable Seamless AJAX Transitions', 'rubenz' ),
		'section'  => 'ajax_transitions',
		'default'  => false,
		'priority' => $priority++,
	]
);

/**
 * AJAX Loading Spinner
 */
Kirki::add_field(
	'arts',
	array(
		'type'            => 'generic',
		'label'           => esc_html__( 'AJAX Loading Spinner', 'rubenz' ),
		'settings'        => 'ajax_generic_heading' . $priority,
		'section'         => 'ajax_transitions',
		'priority'        => $priority++,
		'choices'         => array(
			'element' => 'span',
		),
		'active_callback' => array(
			array(
				'setting'  => 'enable_ajax',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'checkbox',
		'settings'        => 'enable_spinner_desktop',
		'label'           => esc_html__( 'Enable on desktops', 'rubenz' ),
		'section'         => 'ajax_transitions',
		'default'         => false,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_ajax',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'checkbox',
		'settings'        => 'enable_spinner_mobile',
		'label'           => esc_html__( 'Enable on mobiles', 'rubenz' ),
		'section'         => 'ajax_transitions',
		'default'         => true,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_ajax',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts',
	array(
		'type'     => 'generic',
		'settings' => 'ajax_transitions_generic_divider' . $priority,
		'section'  => 'ajax_transitions',
		'priority' => $priority++,
		'choices'  => array(
			'element' => 'hr',
		),
	)
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'textarea',
		'settings'        => 'ajax_prevent_rules',
		'label'           => esc_html__( 'Prevent elements from being AJAX triggered', 'rubenz' ),
		'description'     => esc_html__( 'jQuery selectors. Example: [data-elementor-open-lightbox], .myPreventClass', 'rubenz' ),
		'section'         => 'ajax_transitions',
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_ajax',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'textarea',
		'settings'        => 'custom_js_init',
		'label'           => esc_html__( 'Custom JavaScript code', 'rubenz' ),
		'description'     => esc_html__( 'The code inserted below will be executed after each AJAX transition. This may be useful for compatibility with 3rd party scripts.', 'rubenz' ),
		'section'         => 'ajax_transitions',
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_ajax',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
