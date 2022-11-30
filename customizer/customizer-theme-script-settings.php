<?php namespace WSUWP\Theme\WDS;


class Customizer_Theme_Script_Settings extends Theme_Customizer {

	protected $section_title = 'Scripts & Styles Settings';
	protected $section_id = 'wsu_theme_script_settings';
	protected $option_slug = 'script_settings';
	protected $panel_type = 'settings';


    protected function add_controls( $args = array() ) {

        $this->wp_customize->add_setting(
			$this->get_option_id( 'outline_style' ),
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
				'type'       => 'option',
			)
		);

        $this->wp_customize->add_control(
			$this->get_option_id_slug( 'outline_style' ) . '_control',
			array(
				'settings'    => $this->get_option_id( 'outline_style' ),
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Add Heading Outline CSS',
			)
		);

	}
	
}
