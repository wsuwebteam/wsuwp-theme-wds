<?php namespace WSUWP\Theme\WDS;


class Customizer_Theme_General_Options extends Theme_Customizer {

	protected $section_title = 'Theme Options';
	protected $section_id = 'wsu_theme_general_options';
	protected $option_slug = 'theme_options';
	protected $panel_type = 'theme';
	protected $priority   = 1;


    protected function add_controls( $args = array() ) {

        $this->wp_customize->add_setting(
			$this->get_option_id( 'site_header' ),
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
				'type'       => 'option',
			)
		);

        $this->wp_customize->add_control(
			$this->get_option_id_slug( 'site_header' ) . '_control',
			array(
				'settings'    => $this->get_option_id( 'site_header' ),
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Site Header',
			)
		);

		$this->wp_customize->add_control(
			$this->get_option_id_slug( 'site_header' ) . '_control',
			array(
				'settings'    => $this->get_option_id( 'site_header' ),
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => 'Header',
				'description' => 'Change header style.',
				'choices'     => array(
					''              => 'None',
					'header_system' => 'System Header',
					'header_campus' => 'Campus Header',
				),
			)
		);

	}

}