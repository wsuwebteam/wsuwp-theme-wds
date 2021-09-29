<?php namespace WSUWP\Theme\WDS;


class Block_Footer_Global extends Block {

	protected static $block_name    = 'wsuwp/footer-global';
	protected static $default_attrs = array(
		'show' => array(
			'default' => true,
			'setting' => 'wsuwp_wds_component_footer_global_show',
		),
		'style' => array(
			'default' => false,
			'setting' => 'wsuwp_wds_component_footer_global_style',
		),
	);

	protected static function render( $attrs, $content = '' ) {

		$base_class = 'wsu-footer-global';

		$wrapper_classes = array( $base_class );

		if ( static::is_set( $attrs, 'style' ) ) {

			$wrapper_classes[] = $base_class . '--' . $attrs[ 'style' ];

		}

		ob_start();

		include __DIR__ . '/templates/default.php';

		$block_html = ob_get_clean();

		return $block_html;

	}


	public static function customizer( $wp_customize, $panel ) {

		$section_id = $panel . '_component_footer_global';

		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => __( 'Global Footer' ),
				'description' => __( 'Edit Global Footer Settings' ),
				'panel'       => $panel,
				'priority'    => 160,
				'capability'  => 'edit_theme_options',
			)
		);

		$wp_customize->add_setting(
			'wsuwp_wds_component_footer_global_style',
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);

		$wp_customize->add_control(
			'wsuwp_wds_component_footer_global_style_control',
			array(
				'settings'    => 'wsuwp_wds_component_footer_global_style',
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Footer Style' ),
				'description' => __( 'Change global footer style.' ),
				'choices'     => array(
					'default' => 'Default',
					'light'    => 'light',
				),
			)
		);

	}
}
