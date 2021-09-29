<?php namespace WSUWP\Theme\WDS;


class Customizer_Global_Footer {

	protected $title = 'Global Footer Options';
	protected $section_id = 'wsu_global_footer_section';
	protected $desc = 'Edit Global Footer Settings';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix = 'wsu_wds_global_footer';

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => $this->title,
				'description' => $this->desc,
				'capability'  => 'edit_theme_options',
				'panel'       => $panel,
				'priority'    => 2,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_hide",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_style",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_hide_control",
			array(
				'settings'    => "{$prefix}_hide",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Hide Global Footer' ),
				'description' => __( 'Hide global footer' ),
			)
		);

		$wp_customize->add_control(
			"{$prefix}_style_control",
			array(
				'settings'    => "{$prefix}_style",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Footer Style' ),
				'description' => __( 'Change global footer style.' ),
				'choices'     => array(
					''        => 'Default',
					'light'    => 'Light',
				),
			)
		);

	}

}