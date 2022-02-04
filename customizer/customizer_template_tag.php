<?php namespace WSUWP\Theme\WDS;


class Customizer_Template_Tag {

	protected $section_id = 'wsu_wds_template_tag';
	protected $desc = 'Edit Homepost Section';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix   = 'wsu_wds_template';

		$sidebars = Sidebars::get_sidebars();
		$sidebars['none'] = 'None';

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => 'Tag Archive Template',
				'description' => '',
				'capability'  => 'edit_theme_options',
				'panel'       => $panel,
				'priority'    => 2,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_tag_show_sidebar",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'sidebar_post',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_tag_show_breadcrumbs",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_tag_show_sidebar_control",
			array(
				'settings'    => "{$prefix}_tag_show_sidebar",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Display Sidebar' ),
				'choices'     => $sidebars,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_tag_show_breadcrumbs_control",
			array(
				'settings'    => "{$prefix}_tag_show_breadcrumbs",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Breadcrumbs (if activated)',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_tag_show_title_control",
			array(
				'settings'    => "{$prefix}_tag_show_title",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Title',
			)
		);

	}

}
