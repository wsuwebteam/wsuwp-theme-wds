<?php namespace WSUWP\Theme\WDS;

$wp_customize->add_setting(
	"{$prefix}_{$context}_show_publish_date",
	array(
		'capability' => 'edit_theme_options',
		'default'    => true,
	)
);

$wp_customize->add_control(
	"{$prefix}_{$context}_show_publish_date_control",
	array(
		'settings'    => "{$prefix}_{$context}_show_publish_date",
		'type'        => 'checkbox',
		'section'     => $this->section_id,
		'label'       => 'Show Publish Date',
	)
);
