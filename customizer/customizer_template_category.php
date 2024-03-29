<?php namespace WSUWP\Theme\WDS;


class Customizer_Template_Category {

	protected $section_id = 'wsu_wds_template_category';
	protected $desc = 'Edit Homepost Section';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix   = 'wsu_wds_template';

		$sidebars = Sidebars::get_sidebars();
		$sidebars['none'] = 'None';

		$context = 'category';

		$wp_customize->add_section(
			$this->section_id,
			array(
				'title'       => 'Category Archive Template',
				'description' => '',
				'capability'  => 'edit_theme_options',
				'panel'       => $panel,
				'priority'    => 2,
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_category_show_sidebar",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'sidebar_post',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_category_show_breadcrumbs",
			array(
				'capability' => 'edit_theme_options',
				'default'    => true,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_category_show_sidebar_control",
			array(
				'settings'    => "{$prefix}_category_show_sidebar",
				'type'        => 'select',
				'section'     => $this->section_id,
				'label'       => __( 'Display Sidebar' ),
				'choices'     => $sidebars,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_category_show_breadcrumbs_control",
			array(
				'settings'    => "{$prefix}_category_show_breadcrumbs",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Breadcrumbs (if activated)',
			)
		);

		$wp_customize->add_control(
			"{$prefix}_category_show_title_control",
			array(
				'settings'    => "{$prefix}_category_show_title",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Title',
			)
		);

		$wp_customize->add_setting(
			"{$prefix}_{$context}_show_description",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			"{$prefix}_{$context}_show_description_control",
			array(
				'settings'    => "{$prefix}_{$context}_show_description",
				'type'        => 'checkbox',
				'section'     => $this->section_id,
				'label'       => 'Show Description',
			)
		);

		$wp_customize->add_setting( 
			"{$prefix}_{$context}_format", 
			array( 
				'capability' => 'edit_theme_options', 
				'default'    => 'index', 
			) 
		); 
 
		$wp_customize->add_control( 
			"{$prefix}_{$context}_format_control", 
			array( 
				'settings'    => "{$prefix}_{$context}_format", 
				'type'        => 'select', 
				'section'     => $this->section_id, 
				'label'       => __( 'Display Format/Layout' ), 
				'choices'     => array( 
					'index' => 'Excerpts', 
					'full-post'  => 'Full Post', 
				) 
			) 
		); 

		include __DIR__ . '/control-groups/customizer-query-order.php';
		include __DIR__ . '/control-groups/customizer-meta-location-taxonomy.php'; 

	}

}
