<?php namespace WSUWP\Theme\WDS;


class Customizer_Site_Footer {

	protected $title = 'Site Footer Options';
	protected $section_id = 'wsu_sote_footer_section';
	protected $desc = 'Edit Site Footer Settings';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix = 'wsu_wds_site_footer';

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
			"{$prefix}_heading",
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_caption",
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
			'wsu_wds[widget_areas][footer_top]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_hide_control",
			array(
				'settings'    => "{$prefix}_hide",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Hide Site Footer' ),
			)
		);

		$wp_customize->add_control(
			"{$prefix}_style_control",
			array(
				'settings'    => "{$prefix}_style",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Footer Style' ),
				'choices'     => array(
					''        => 'Default',
					'dark'    => 'Dark',
					'white'   => 'Light',
				),
			)
		);

		$wp_customize->add_control( 
			"{$prefix}_heading_control",
			array(
				'label'    => 'Footer Heading',
				'section'  => $this->section_id,
				'settings' => "{$prefix}_heading",
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			"{$prefix}_caption_control",
			array(
				'label'    => 'Footer Caption',
				'section'  => $this->section_id,
				'settings' => "{$prefix}_caption",
				'type'     => 'textarea',
			)
		);

		$wp_customize->add_control(
			'wsu_wds_widget_areas_footer_top_control',
			array(
				'settings'    => 'wsu_wds[widget_areas][footer_top]',
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => __( 'Add Footer Top Widget Area' ),
			)
		);

	}

}