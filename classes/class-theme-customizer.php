<?php namespace WSUWP\Theme\WDS;


class Theme_Customizer {

	protected $options_panel  = 'wds_theme_options_panel';
	protected $settings_panel = 'wds_settings_panel';
	protected $section_title = '';
	protected $section_id = false;
	protected $option_slug;
	protected $panel_type = 'theme';
	protected $wp_customize = false;
	protected $permissions = 'edit_theme_options';
	protected $priority = 10;


	public function __construct( $wp_customize ) {

		$this->wp_customize = $wp_customize;

	}


	public function add_customizer( $args = array() ) {

		if ( $this->section_id ) {

		}

		$this->wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => $this->section_title,
				'description' => '',
				'capability'  => $this->permissions,
				'panel'       => $this->get_panel(),
				'priority'    => $this->priority,
			)
		);


		$this->add_controls( $args );

	}


	protected function add_controls( $args = array() ) {

	}


	protected function get_panel() {

		switch ( $this->panel_type ) {
			case 'theme':
				return $this->options_panel;
			case 'settings':
				return $this->settings_panel;
		}

	}


	protected function get_option_id( $setting ) {

		return 'wsu_wds[' . $this->option_slug . '][' . $setting . ']';

	}

	protected function get_option_id_slug( $setting ) {

		$option_id = $this->get_option_id( $setting );

		return str_replace( array( '[', ']' ), '_', $option_id );
		
	}

}