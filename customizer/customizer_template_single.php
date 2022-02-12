<?php namespace WSUWP\Theme\WDS;


class Customizer_Template_Single {

	protected $section_id = 'wsu_wds_template_single';
	protected $desc = 'Edit Homepage Section';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix   = 'wsu_wds_template';

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => 'Custom Post Type Template',
				'description' => '',
				'capability'  => 'edit_theme_options',
				'panel'       => $panel,
				'priority'    => 2,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_breadcrumbs",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_title",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_publish_date",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_share",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_byline",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_categories",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_single_show_tags",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_breadcrumbs_control",
			array(
				'settings'    => "{$prefix}_single_show_breadcrumbs",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Breadcrumbs',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_title_control",
			array(
				'settings'    => "{$prefix}_single_show_title",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Title',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_publish_date_control",
			array(
				'settings'    => "{$prefix}_single_show_publish_date",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Publish Date',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_share_control",
			array(
				'settings'    => "{$prefix}_single_show_share",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Social Share',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_byline",
			array(
				'settings'    => "{$prefix}_single_show_byline",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Author',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_categories",
			array(
				'settings'    => "{$prefix}_single_show_categories",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Categories',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_single_show_tags",
			array(
				'settings'    => "{$prefix}_single_show_tags",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Tags',
			)
		);

	}

}
