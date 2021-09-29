<?php namespace WSUWP\Theme\WDS;


class Customizer_Template {

	protected $title = 'Site Navigation Options';
	protected $section_id = 'wsu_wds_template_section';
	protected $desc = 'Edit Site Navigation Settings';

	public function __construct( $wp_customize, $panel = false ) {

		$this->add_customizer( $wp_customize, $panel );

	}


	protected function add_customizer( $wp_customize, $panel = false ) {

		$prefix = 'wsu_wds_template';

		$post_types = get_post_types(
			array(
				'publicly_queryable' => true,
			),
			'objects'
		);

		$templates = array(
			'page' => array(
				'label'       => 'Page',
				'base'        => 'single',
				'has_archive' => false,
			),
		);

		foreach ( $post_types as $post_type ) {

			$templates[ $post_type->name ] = array(
				'label'    => $post_type->label,
				'base'     => 'single',
			);

		}

		foreach ( $templates as $template_slug => $template_args ) {

			$template_label = $template_args['label'];
			$template_base = $template_args['base'];

			$section_id = "wsu_wds_template_{$template_slug}_section";

			$wp_customize->add_section(
				$section_id,
				array(
					'title'       => "{$template_label} Template",
					'description' => 'test',
					'capability'  => 'edit_theme_options',
					'panel'       => $panel,
					'priority'    => 2,
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_hero_style",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'hero_style', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_hero_position",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'hero_position', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_show_title",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'show_title', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_show_publish_date",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'show_publish_date', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_show_share",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'show_share', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_show_byline",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'show_byline', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_show_categories",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'show_categories', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_setting(
				"{$prefix}_{$template_slug}_show_tags",
				array(
					'capability' => 'edit_theme_options',
					'default'    => Template::get_default( 'show_tags', $template_slug, $template_base ),
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_hero_style_control",
				array(
					'settings'    => "{$prefix}_{$template_slug}_hero_style",
					'type'        => 'select',
					'section'     => $section_id,
					'label'       => __( 'Hero Banner Style' ),
					'choices'     => array(
						'hero'   => 'Hero',
						'figure' => 'Figure',
						''       => 'None',
					),
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_hero_position_control",
				array(
					'settings'    => "{$prefix}_{$template_slug}_hero_position",
					'type'        => 'select',
					'section'     => $section_id,
					'label'       => __( 'Hero Banner Position' ),
					'choices'     => array(
						'before'   => 'Before Title',
						'after'    => 'After Title',
					),
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_show_title_control",
				array(
					'settings'    => "{$prefix}_{$template_slug}_show_title",
					'type'        => 'checkbox',
					'section'     => $section_id,
					'label'       => 'Show Title',
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_show_publish_date_control",
				array(
					'settings'    => "{$prefix}_{$template_slug}_show_publish_date",
					'type'        => 'checkbox',
					'section'     => $section_id,
					'label'       => 'Show Publish Date',
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_show_share_control",
				array(
					'settings'    => "{$prefix}_{$template_slug}_show_share",
					'type'        => 'checkbox',
					'section'     => $section_id,
					'label'       => 'Show Social Share',
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_show_byline",
				array(
					'settings'    => "{$prefix}_{$template_slug}_show_byline",
					'type'        => 'checkbox',
					'section'     => $section_id,
					'label'       => 'Show Author',
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_show_categories",
				array(
					'settings'    => "{$prefix}_{$template_slug}_show_categories",
					'type'        => 'checkbox',
					'section'     => $section_id,
					'label'       => 'Show Categories',
				)
			);

			$wp_customize->add_control(
				"{$prefix}_{$template_slug}_show_tags",
				array(
					'settings'    => "{$prefix}_{$template_slug}_show_tags",
					'type'        => 'checkbox',
					'section'     => $section_id,
					'label'       => 'Show Tags',
				)
			);

		}

		/*$wp_customize->add_setting(
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
					'vertical' => 'Vertical',
					''         => 'None',
				),
			)
		);*/

	}

}