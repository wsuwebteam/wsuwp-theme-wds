<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Header_Global extends Block {

	protected static $block_name    = 'wsuwp/header-global';
	protected static $default_attrs = array(
		'className' => '',
        'show'      => true,
		'style'     => 'default',
		'hideMenu'  => false,
	);


	public static function render( $attrs, $content = '' ) {

		$wrapper_classes = 'wsu-header-global';

		static::add_class( $wrapper_classes, '', 'className', $attrs );
		static::add_class( $wrapper_classes, 'wsu-header-global--', 'style', $attrs );
        static::add_class( $wrapper_classes, 'wsu-header-global--', 'hideMenu', $attrs, 'navless' );

		ob_start();

		include __DIR__ . '/templates/default.php';

		return ob_get_clean();

	}


    public static function customizer( $wp_customize, $panel ) {

        $customizer_prefix = static::get_customizer_prefix();

		$section_id = "{$customizer_prefix}_section";

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
			"{$customizer_prefix}_style",
			array(
				'capability' => 'edit_theme_options',
				'default'    => 'default',
			)
		);

		$wp_customize->add_setting(
			"{$customizer_prefix}_hideMenu",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_control(
			"{$customizer_prefix}_style_control",
			array(
				'settings'    => "{$customizer_prefix}_style",
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
			"{$customizer_prefix}_hideMenu_control",
			array(
				'settings'    => "{$customizer_prefix}_hideMenu",
				'type'        => 'checkbox',
				'section'     => $section_id,
				'label'       => __( 'Hide Menu' ),
				'description' => __( 'Hide menu icon on mobile' ),
			)
		);

	}

}