<?php namespace WSUWP\Theme\WDS;


class Customizer_Site_Navigation {

	protected $title = 'Site Navigation Options';
	protected $section_id = 'wsu_site_navigation_section';
	protected $desc = 'Edit Site Navigation Settings';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix = 'wsu_wds_site_navigation';

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
			"{$prefix}_style",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'vertical',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_style_control",
			array(
				'settings'    => "{$prefix}_style",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Navigation Style' ),
				'description' => __( 'Change navigation style.' ),
				'choices'     => array(
					'vertical'   => 'Vertical',
					'horizontal' => 'Horizontal',
					''           => 'None',
				),
			)
		);

	}

}