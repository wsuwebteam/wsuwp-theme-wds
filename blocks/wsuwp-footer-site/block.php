<?php namespace WSUWP\Theme\WDS;

class Block_WSUWP_Footer_Site extends Block {

	protected static $block_name    = 'wsuwp/footer-site';
	protected static $default_attrs = array(
		'className' => '',
        'hide'      => false,
		'style'     => 'default',
		'title'     => '',
	);


	public static function render( $attrs, $content = '' ) {

		if ( ! static::is_set( $attrs, 'hide' ) ) {

			self::set_attrs( $attrs );

			$wrapper_classes = 'wsu-footer-site';

			static::add_class( $wrapper_classes, '', 'className', $attrs );
			static::add_class( $wrapper_classes, 'wsu-footer-site--', 'style', $attrs );

			ob_start();

			include __DIR__ . '/templates/default.php';

			return ob_get_clean();

		} else {

			return '';
		}

	}


	protected static function set_attrs( &$attrs ) {

		$attrs['title'] = ( static::is_set( $attrs, 'title' ) ) ? $attrs['title'] : WDS_Options::get( 'site_footer', 'title' );
		$attrs['caption'] = ( static::is_set( $attrs, 'caption' ) ) ? $attrs['caption'] : WDS_Options::get( 'site_footer', 'caption' );

	}


    public static function customizer( $wp_customize, $panel ) {

        $customizer_prefix = static::get_customizer_prefix();

		$section_id = "{$customizer_prefix}_section";

		$wp_customize->add_section(
			$section_id,
			array(
				'title'       => __( 'Site Footer' ),
				'description' => __( 'Edit Site Footer Settings' ),
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
			"{$customizer_prefix}_hide",
			array(
				'capability' => 'edit_theme_options',
				'default'    => false,
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[site_footer][title]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_setting(
			'wsu_wds[site_footer][caption]',
			array(
				'capability' => 'edit_theme_options',
				'default'    => '',
				'type'       => 'option',
			)
		);

		$wp_customize->add_control(
			"{$customizer_prefix}_style_control",
			array(
				'settings'    => "{$customizer_prefix}_style",
				'type'        => 'select',
				'section'     => $section_id,
				'label'       => __( 'Style' ),
				'description' => __( 'Change global header style.' ),
				'choices'     => array(
					'default' => 'Default',
					'white'   => 'White',
					'dark'    => 'dark',
				),
			)
		);

		$wp_customize->add_control(
			"{$customizer_prefix}_hide_control",
			array(
				'settings'    => "{$customizer_prefix}_hide",
				'type'        => 'checkbox',
				'section'     => $section_id,
				'label'       => __( 'Hide' ),
				'description' => __( 'Hide menu icon on mobile' ),
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_site_footer_title_control',
			array(
				'label'    => 'Footer Title',
				'section'  => $section_id,
				'settings' => 'wsu_wds[site_footer][title]',
				'type'     => 'text',
			)
		);

		$wp_customize->add_control( 
			'wsu_wds_site_footer_caption_control',
			array(
				'label'    => 'Footer Caption',
				'section'  => $section_id,
				'settings' => 'wsu_wds[site_footer][caption]',
				'type'     => 'textarea',
			)
		);

	}

}