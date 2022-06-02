<?php namespace WSUWP\Theme\WDS;

$wp_customize->add_setting(
	"wsu_wds[template_{$context}][query_order]",
	array(
		'capability' => 'edit_theme_options',
		'default'    => '',
		'type'       => 'option',
	)
);

$wp_customize->add_control(
	"wsu_wds_template_{$context}_query_order_control",
	array(
		'label'    => 'Query Order',
		'section'  => $this->section_id,
		'settings' => "wsu_wds[template_{$context}][query_order]",
		'type'     => 'select',
		'choices'  => array(
			''      => 'Publish Date',
			'title' => 'Title',
		),
	)
);

$wp_customize->add_setting(
	"wsu_wds[template_{$context}][query_sort]",
	array(
		'capability' => 'edit_theme_options',
		'default'    => '',
		'type'       => 'option',
	)
);

$wp_customize->add_control(
	"wsu_wds_template_{$context}_query_sort_control",
	array(
		'label'    => 'Query Sort',
		'section'  => $this->section_id,
		'settings' => "wsu_wds[template_{$context}][query_sort]",
		'type'     => 'select',
		'choices'  => array(
			''    => 'Descending',
			'ASC' => 'Ascending',
		),
	)
);
