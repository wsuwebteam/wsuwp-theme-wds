<?php namespace WSUWP\Theme\WDS;


class Block_Article_Title extends Block {

	protected static $block_name    = 'wsuwp/article-content';
	protected static $default_attrs = array(
		'tag' => array(
			'default' => 'h1',
		),
		'className' => array(
			'default' => '',
		),
		'removeLink' => array(
			'default' => '',
		),
		'link' => array(
			'default' => '',
		),
	);

	protected static function render( $attrs, $content = '' ) {

		self::parse_block_attrs( $attrs );

		$wrapper_classes = self::get_wrapper_classes( $attrs );

		ob_start();

		include __DIR__ . '/templates/default.php';

		$block_html = ob_get_clean();

		return $block_html;

	}


	protected static function get_wrapper_classes( $attrs ) {

		$classes = array();

		if ( ! empty( $attrs['className'] ) ) {

			$classes[] = $attrs['className'];

		}

		return $classes;

	}


	protected static function parse_block_attrs( &$attrs ) {

		if ( 'h1' === $attrs['tag'] ) {

			$attrs['removeLink'] = true;

		}

		if ( empty( $attrs['removeLink'] ) && empty( $attrs['link'] ) ) {

			$attrs['link'] = get_the_permalink();

		}

	}


	public static function customizer( $wp_customize, $panel ) {

		/*$section_id = $panel . '_component_header_global';

		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => __( 'Global Header' ),
				'description' => __( 'Edit Global Header Settings' ),
				'panel'       => $panel,
				'priority'    => 160,
				'capability'  => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_header_global_style',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_header_global_showMenu',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_header_global_style_control',
			array(
				'settings'    => 'wsuwp_wds_component_header_global_style',
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Header Style' ),
				'description' => __( 'Change global header style.' ),
				'choices'     => array(
					'default' => 'Default',
					'dark'    => 'Dark',
				),
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_header_global_show_menu_control',
			array(
				'settings'    => 'wsuwp_wds_component_header_global_showMenu',
				'type'        => 'checkbox',
				'section'     => $section_id,
				'label'       => __( 'Hide Menu' ),
				'description' => __( 'Hide menu icon on mobile' ),
			)
		); */

	}
}
