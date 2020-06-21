<?php

$priority = 1;

Kirki::add_section(
	'portfolio',
	array(
		'title'    => esc_html__( 'Portfolio', 'rubenz' ),
		'priority' => $priority ++,
		'icon'     => 'dashicons-art',
	)
);

Kirki::add_field(
	'arts', [
		'type'     => 'switch',
		'settings' => 'enable_custom_portfolio_slug',
		'label'    => esc_html__( 'Enable custom portfolio slug', 'rubenz' ),
		'section'  => 'portfolio',
		'default'  => true,
		'priority' => $priority++,
	]
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'text',
		'settings'        => 'portfolio_slug',
		'label'           => esc_html__( 'Portfolio Slug', 'rubenz' ),
		'description'     => sprintf(
			'%1$s <a href="%2$s" target="_blank">%3$s</a> %4$s',
			esc_html__( 'Note: you will need to', 'rubenz' ),
			admin_url( 'options-permalink.php' ),
			esc_html__( 'update your permalinks', 'rubenz' ),
			esc_html__( 'each time you change the slug.', 'rubenz' )
		),
		'section'         => 'portfolio',
		'default'         => esc_html__( 'portfolio', 'rubenz' ),
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_custom_portfolio_slug',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts', [
		'type'     => 'switch',
		'settings' => 'enable_portfolio_nav',
		'label'    => esc_html__( 'Show prev / next portfolio navigation on portfolio item pages', 'rubenz' ),
		'section'  => 'portfolio',
		'default'  => true,
		'priority' => $priority++,
	]
);

Kirki::add_field(
	'arts', [
		'type'            => 'checkbox',
		'settings'        => 'enable_portfolio_loop',
		'label'           => esc_html__( 'Loop the portfolio navigation', 'rubenz' ),
		'section'         => 'portfolio',
		'default'         => true,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_portfolio_nav',
				'operator' => '==',
				'value'    => true,
			),
		),
	]
);

Kirki::add_field(
	'arts', [
		'type'            => 'checkbox',
		'settings'        => 'enable_portfolio_next_first_mobile',
		'label'           => esc_html__( 'Position "next" portfolio item before "previous" on mobile', 'rubenz' ),
		'section'         => 'portfolio',
		'default'         => false,
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_portfolio_nav',
				'operator' => '==',
				'value'    => true,
			),
		),
	]
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'text',
		'settings'        => 'portfolio_nav_prev_title',
		'label'           => esc_html__( '"Previous" label', 'rubenz' ),
		'section'         => 'portfolio',
		'default'         => esc_html__( 'Prev', 'rubenz' ),
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_portfolio_nav',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);

Kirki::add_field(
	'arts',
	array(
		'type'            => 'text',
		'settings'        => 'portfolio_nav_next_title',
		'label'           => esc_html__( '"Next" label', 'rubenz' ),
		'section'         => 'portfolio',
		'default'         => esc_html__( 'Next', 'rubenz' ),
		'priority'        => $priority++,
		'active_callback' => array(
			array(
				'setting'  => 'enable_portfolio_nav',
				'operator' => '==',
				'value'    => true,
			),
		),
	)
);
