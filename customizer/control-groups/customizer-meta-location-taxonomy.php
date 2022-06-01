<?php namespace WSUWP\Theme\WDS;

$wp_customize->add_setting(
	"wsu_wds[template_{$context}][post_meta_location_taxonomy]",
	array(
		'capability' => 'edit_theme_options',
		'default'    => false,
		'type'       => 'option',
	)
);

$wp_customize->add_control(
	"wsu_wds_template_{$context}_post_meta_location_taxonomy_control",
	array(
		'settings'    => "wsu_wds[template_{$context}][post_meta_location_taxonomy]",
		'type'        => 'checkbox',
		'section'     => $this->section_id,
		'label'       => 'Show Locations Taxnomomy',
	)
);
