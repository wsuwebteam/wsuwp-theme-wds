<?php namespace WSUWP\Theme\WDS;


class Block_Header_Site extends Block {

	protected static $block_name    = 'wsuwp/header-site';
	protected static $default_attrs = array(
		'hide' => array(
			'default' => false,
			'setting' => 'wsuwp_wds_component_header_site_hide',
		),
		'hideOnHome' => array(
			'default' => false,
			'setting' => 'wsuwp_wds_component_header_site_hideOnHome',
		),
		'style' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_header_site_style',
		),
		'hideMenu' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_header_site_hideMenu',
		),
		'hideSubtitle' => array(
			'default' => false,
			'setting' => 'wsuwp_wds_component_header_site_hideSubtitle',
		),
	);

	protected static function render( $attrs, $content = '' ) {

		if ( ! self::should_hide( $attrs ) ) {

			$wrapper_classes = array( 'wsu-header-site' );

			static::add_modifier_classes( $wrapper_classes, 'wsu-header-site', $attrs, array( 'style' ) );

			ob_start();

			include __DIR__ . '/templates/default.php';

			$block_html = ob_get_clean();

			return $block_html;

		} else {

			return '';

		}

	}


	public static function customizer( $wp_customize, $panel ) {

		$section_id = $panel . '_component_header_site';

		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => __( 'Site Header' ),
				'description' => __( 'Edit Site Header Settings' ),
				'panel'       => $panel,
				'priority'    => 160,
				'capability'  => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_header_site_style',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_header_site_hide',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_header_site_hideOnHome',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_header_site_hideSubtitle',
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_header_site_hide_control',
			array(
				'settings'    => 'wsuwp_wds_component_header_site_hide',
				'type'        => 'checkbox',
				'section'     => $section_id,
				'label'       => __( 'Hide Site Header' ),
				'description' => __( 'Do not show site header' ),
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_header_site_hideOnHome_control',
			array(
				'settings'    => 'wsuwp_wds_component_header_site_hideOnHome',
				'type'        => 'checkbox',
				'section'     => $section_id,
				'label'       => __( 'Hide on Homepage' ),
				'description' => __( 'Do not show site header on homepage' ),
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_header_site_style_control',
			array(
				'settings'    => 'wsuwp_wds_component_header_site_style',
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Header Style' ),
				'description' => __( 'Change site header style.' ),
				'choices'     => array(
					'default' => 'Default',
					'dark'    => 'Dark',
				),
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_header_site_hideSubtitle_control',
			array(
				'settings'    => 'wsuwp_wds_component_header_site_hideSubtitle',
				'type'        => 'checkbox',
				'section'     => $section_id,
				'label'       => __( 'Hide Subtitle' ),
				'description' => __( 'Do not show subtitle above site title' ),
			)
		);

	}


	protected static function should_hide( $attrs ) {

		if ( is_front_page() && ! empty( $atts['hideOnHome'] ) ) {

			return true;

		} else if ( ! empty( $attrs['hide'] ) ) {

			return true;

		}

		return false;
		
	}
}
