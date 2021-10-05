<?php namespace WSUWP\Theme\WDS;


class Customizer_Advanced {

	protected $title = 'WDS Advanced Options';
	protected $section_id = 'wsu_advanced_options';
	protected $desc = 'Edit advanced settings';

	public function __construct( $wp_customize ) {

		$this->add_customizer( $wp_customize );

	}


	protected function add_customizer( $wp_customize ) {

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => $this->title,
				'description' => $this->desc,
				'capability'  => 'edit_theme_options',
			)
		);


		$wp_customize->add_setting(
			'wsu_wds_version',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '2.x',
			)
		);

		$wp_customize->add_control(
			'wsu_wds_version_control',
			array(
				'settings'    => 'wsu_wds_version',
				'type'        => 'text',
				'section'     => $this->section_id,
				'label'       => 'Version of WDS CSS & JS',
			)
		);

	}


}