<?php namespace WSUWP\Theme\WDS;


class Customizer_Global_Header {

	protected $title = 'Global Header Options';
	protected $section_id = 'wsu_global_header_section';
	protected $desc = 'Edit Global Header Settings';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix = 'wsu_wds_global_header';

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
			"{$prefix}_apply_link",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_give_link",
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

		$wp_customize->add_setting(
			'wsu_wds[site_info][campus]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'wsu',
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_campus_control",
			array(
				'settings'    => 'wsu_wds[site_info][campus]',
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => 'Campus Title',
				'description' => 'Change global header campus title.',
				'choices'     => array(
					'wsu'     => 'Washington State University',
					'global'  => 'WSU Global Campus',
					'spokane' => 'WSU Spokane',
					'everett' => 'WSU Everett',
				),
			)
		);

		if ( Customizer::is_authorized_user() ) {

			$wp_customize->add_control(
				"{$prefix}_hide_control",
				array(
					'settings'    => "{$prefix}_hide",
					'type'        => 'checkbox',
					'section'     => $this->section_id,
					'label'       => __( 'Hide Global Header' ),
					'description' => __( 'Hide global header' ),
				)
			);

		}


		$wp_customize->add_control(
			"{$prefix}_style_control",
			array(
				'settings'    => "{$prefix}_style",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Header Style' ),
				'description' => __( 'Change global header style.' ),
				'choices'     => array(
					''        => 'Default',
					'dark'    => 'Dark',
				),
			)
		);

		$wp_customize->add_control( 
			"{$prefix}_give_link_control",
			array(
				'label'    => 'Give Link',
				'section'  => $this->section_id,
				'settings' => "{$prefix}_give_link",
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			"{$prefix}_apply_link_control",
			array(
				'label'    => 'Apply Link',
				'section'  => $this->section_id,
				'settings' => "{$prefix}_apply_link",
				'type'     => 'text',
			)
		);

	}

}