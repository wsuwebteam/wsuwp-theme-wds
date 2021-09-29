<?php namespace WSUWP\Theme\WDS;


class Customizer_Contact {

	protected $title = 'Contact Information';
	protected $section_id = 'wsu_contact_options';
	protected $desc = 'Edit Contact Information';

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
			'wsu_wds[contact][name]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => get_bloginfo( 'name' ),
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][address1]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][address2]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][city]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][state]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][zip]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][phone]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[contact][email]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);


		$wp_customize->add_control( 
			'wsu_wds_contact_name_control',
			array(
				'label'    => 'Contact Title',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][name]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_address1_control',
			array(
				'label'    => 'Address Line 1',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][address1]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_address2_control',
			array(
				'label'    => 'Address Line 2',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][address2]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_city_control',
			array(
				'label'    => 'City',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][city]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_state_control',
			array(
				'label'    => 'State',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][state]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_zip_control',
			array(
				'label'    => 'Zip Code',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][zip]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_phone_control',
			array(
				'label'    => 'Phone',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][phone]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_contact_email_control',
			array(
				'label'    => 'Email',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[contact][email]',
				'type'     => 'text',
			)
		);

	}


}
