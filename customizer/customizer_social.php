<?php namespace WSUWP\Theme\WDS;


class Customizer_Social {

	protected $title = 'Social Options';
	protected $section_id = 'wsu_social_options';
	protected $desc = 'Edit Social Settings';

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
			'wsu_wds[social][twitter]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[social][facebook]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[social][instagram]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[social][linkedin]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[social][pintrest]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_social_twitter_control',
			array(
				'label'    => 'Twitter URL',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[social][twitter]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_social_facebook_control',
			array(
				'label'    => 'Facebook URL',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[social][facebook]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_social_linkedin_control',
			array(
				'label'    => 'Linkedin URL',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[social][linkedin]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_social_instagram_control',
			array(
				'label'    => 'Instagram URL',
				'section'  => $this->section_id,
				'settings' => 'wsu_wds[social][instagram]',
				'type'     => 'text',
			)
		);

	}


}
