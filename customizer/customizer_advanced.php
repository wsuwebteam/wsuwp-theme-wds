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

		$wp_customize->add_setting(
			'wsu_wds[scripts][syndicate]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[scripts][jquery]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[scripts][bootstrap]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[template][width]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_template_width_control",
			array(
				'settings'    => 'wsu_wds[template][width]',
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Content Width' ),
				'description' => __( 'Change content width.' ),
				'choices'     => array(
					''        => 'Default (1200px)',
					'wide'    => 'Wide (1400px)',
					'xwide'   => 'xWide (1600px)',
				),
			)
		);


		$wp_customize->add_control(
			'wsu_wds_scripts_syndicate_control',
			array(
				'settings' => 'wsu_wds[scripts][syndicate]',
				'type'     => 'checkbox',
				'section'  => $this->section_id,
				'label'    => __( 'Include WSU Content Syndicate CSS (People, Events, and Feed)' ),
			)
		);

		$wp_customize->add_control(
			'wsu_wds_scripts_jquery_control',
			array(
				'settings' => 'wsu_wds[scripts][jquery]',
				'type'     => 'checkbox',
				'section'  => $this->section_id,
				'label'    => __( 'Include jQuery' ),
			)
		);

		$wp_customize->add_control(
			'wsu_wds_scripts_bootstrap_control',
			array(
				'settings' => 'wsu_wds[scripts][bootstrap]',
				'type'     => 'checkbox',
				'section'  => $this->section_id,
				'label'    => __( 'Include Bootstrap Icons' ),
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