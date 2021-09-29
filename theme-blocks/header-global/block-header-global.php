<?php namespace WSUWP\Theme\WDS;


class Block_Header_Global extends Block {

	protected static $block_name    = 'wsuwp/header-global';
	protected static $default_attrs = array(
		'show' => array(
			'default' => true,
			'setting' => 'wsuwp_wds_component_header_global_show',
		),
		'style' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_header_global_style',
		),
		'showMenu' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_header_global_showMenu',
		),
	);

	protected static function render( $attrs, $content = '' ) {

		$base_class = 'wsu-header-global';

		$wrapper_classes = self::get_wrapper_classes( $attrs );

		ob_start();

		include __DIR__ . '/templates/default.php';

		$block_html = ob_get_clean();

		return $block_html;

	}


	protected static function get_wrapper_classes( $attrs ) {

		$base_class = 'wsu-header-global';

		$wrapper_classes = array( $base_class );

		if ( static::is_set( $attrs, 'style' ) ) {

			$wrapper_classes[] = $base_class . '--' . $attrs[ 'style' ];

		}

		if ( static::is_set( $attrs, 'showMenu' ) ) {

			$wrapper_classes[] = $base_class . '--navless';

		}

		return $wrapper_classes;

	}


	public static function customizer( $wp_customize, $panel ) {

		$section_id = $panel . '_component_header_global';

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
		);

	}
}
