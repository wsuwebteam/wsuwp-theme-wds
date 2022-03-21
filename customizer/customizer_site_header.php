<?php namespace WSUWP\Theme\WDS;


class Customizer_Site_Header {

	protected $title = 'Site Header Options';
	protected $section_id = 'wsu_sote_header_section';
	protected $desc = 'Edit Site Header Settings';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix = 'wsu_wds_site_header';

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
			"{$prefix}_home_hide",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_subtitle_hide",
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
			"wsu_wds[site][title_link]",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			"wsu_wds[site][subtitle_link]",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_hide_control",
			array(
				'settings'    => "{$prefix}_hide",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Hide Site Header' ),
			)
		);

		$wp_customize->add_control(
			"{$prefix}_home_hide_control",
			array(
				'settings'    => "{$prefix}_home_hide",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Hide Site Header on Homepage' ),
			)
		);

		$wp_customize->add_control(
			"{$prefix}_subtitle_hide_control",
			array(
				'settings'    => "{$prefix}_subtitle_hide",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Hide Subtitle' ),
			)
		);

		$wp_customize->add_control(
			"{$prefix}_style_control",
			array(
				'settings'    => "{$prefix}_style",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Header Style' ),
				'description' => __( 'Change header style.' ),
				'choices'     => array(
					''        => 'Default',
					'dark'    => 'Dark',
				),
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_site_title_link_control',
			array(
				'label'    => 'Custom Site Title Link',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[site][title_link]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_site_subtitle_link_control',
			array(
				'label'    => 'Custom Site Subtitle Link',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[site][subtitle_link]',
				'type'     => 'text',
			)
		);

	}

}