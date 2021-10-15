<?php namespace WSUWP\Theme\WDS;


class Block_Article_Hero extends Block {

	protected static $block_name    = 'wsuwp/article-hero';
	protected static $default_attrs = array(
		'style' => array(
			'default' => 'default',
			'setting' => 'wsuwp_wds_component_article_hero_style',
		),
		'className' => array(
			'default' => '',
			'setting' => 'wsuwp_wds_component_article_hero_className',
		),
		'imageId' => array(
			'default' => '',
		),
		'imageSrc' => array(
			'default' => '',
			'setting' => 'wsuwp_wds_component_article_hero_imageSrc',
		),
		'imageAlt' => array(
			'default' => '',
			'setting' => 'wsuwp_wds_component_article_hero_imageAlt',
		),
		'imageCaption' => array(
			'default' => '',
			'setting' => 'wsuwp_wds_component_article_hero_imageCaption',
		),
		'imageRatio' => array(
			'default' => '',
			'setting' => 'wsuwp_wds_component_article_hero_imageRatio',
		),
	);

	protected static function render( $attrs, $content = '' ) {

		self::set_image_attrs( $attrs );

		ob_start();

		if ( ! empty( $attrs['imageSrc'] ) ) {

			switch ( $attrs['style'] ) {

				case 'figure':
					include __DIR__ . '/templates/figure.php';
					break;

				default:	
					include __DIR__ . '/templates/default.php';
					break;
			}

		}

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


	protected static function set_image_attrs( &$attrs ) {

		if ( empty( $attrs['imageSrc'] ) && has_post_thumbnail() ) {

			$attrs['imageId']      = get_post_thumbnail_id();

			$image_array = wp_get_attachment_image_src( $attrs['imageId'], 'full' );

			$attrs['imageSrc']     = $image_array[0];
			$attrs['imageSrcset']  = wp_get_attachment_image_srcset( $attrs['imageId'], 'full' );
			$attrs['imageSizes']   = wp_get_attachment_image_sizes( $$attrs['imageId'], 'full' );
			$attrs['imageAlt']     = get_post_meta( $attrs['imageId'], '_wp_attachment_image_alt', true);
			$attrs['imageCaption'] = wp_get_attachment_caption( $attrs['imageId'] );

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
