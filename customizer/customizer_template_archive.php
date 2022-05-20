<?php namespace WSUWP\Theme\WDS;


class Customizer_Template_Archive {

	protected $section_id = 'wsu_wds_template_archive';
	protected $desc = 'Edit Homepost Section';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix  = 'wsu_wds_template';
		$context = 'post_archive';


		$sidebars = Sidebars::get_sidebars();
		$sidebars['none'] = 'None';

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => 'Post Archive Template',
				'description' => '',
				'capability'  => 'edit_theme_options',
				'panel'       => $panel,
				'priority'    => 2,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_post_archive_sidebar_active",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_post_archive_pagination",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_post_archive_show_sidebar",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'sidebar_post',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_post_archive_breadcrumbs",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_post_archive_breadcrumbs_control",
			array(
				'settings'    => "{$prefix}_post_archive_breadcrumbs",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Breadcrumbs (if activated)',
			)
		);

		include __DIR__ . '/control-groups/customizer-published-date-group.php';
		include __DIR__ . '/control-groups/customizer-byline-group.php';

		$wp_customize->add_control(
			"{$prefix}_post_archive_pagination_control",
			array(
				'settings'    => "{$prefix}_post_archive_pagination",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Pagination',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_post_archive_sidebar_active_control",
			array(
				'settings'    => "{$prefix}_post_archive_sidebar_active",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Sidebar',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_post_archive_sidebar_active",
			array(
				'settings'    => "{$prefix}_post_archive_show_sidebar",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Display Sidebar' ),
				'choices'     => $sidebars,
			)
		);

		

		$wp_customize->add_control(
			"{$prefix}_post_archive_show_title_control",
			array(
				'settings'    => "{$prefix}_post_archive_show_title",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Title',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_{$context}_post_meta_location_taxonomy_show",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_{$context}_post_meta_location_taxonomy_show_control",
			array(
				'settings'    => "{$prefix}_{$context}_post_meta_location_taxonomy_show",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Locations Taxnomomy',
			)
		);

	}

}
