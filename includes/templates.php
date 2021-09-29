<?php namespace WSUWP\Theme\WDS;


class Template {


	protected static $template_defaults = array(
		'page' => array(
			'hero_style'      => '',
			'hero_position'   => 'before',
			'show_title'      => true,
			'show_publish_date' => false,
			'show_byline'     => false,
			'show_share'     => true,
			'show_categories' => false,
			'show_tags'       => false,
			'show_footer'     => true,
		),
		'post' => array(
			'hero_style'      => 'figure',
			'hero_position'   => 'before',
			'show_title'      => true,
			'show_publish_date' => true,
			'show_byline'     => true,
			'show_share'      => true,
			'show_categories' => true,
			'show_tags'       => true,
			'show_footer'     => true,
		),
		'single' => array(
			'hero_style'        => 'figure',
			'hero_position'     => 'before',
			'show_title'        => true,
			'show_publish_date' => true,
			'show_byline'       => true,
			'show_share'        => true,
			'show_categories'   => true,
			'show_tags'         => true,
			'show_footer'       => true,
		),
	);


	public static function render( $slug, $name = '', $args = array() ) {

		ob_start();

		get_template_part( $slug, $name, $args );

		$html = ob_get_clean();

		echo do_blocks( $html );

	}


	public static function get_option( $option, $post_type = false, $template = false ) {

		$prefix = 'wsu_wds_template';

		if ( $post_type ) {

			$post_type_key   = "{$prefix}_{$post_type}_{$option}";
			$post_type_value = get_theme_mod( $post_type_key, '' );

			if ( '' !== $post_type_value ) {

				return $post_type_value;

			}
		}

		if ( $template ) {

			$template_key   = "{$prefix}_{$template}_{$option}";
			$template_value = get_theme_mod( $template_key, '' );

			if ( '' !== $post_type_value ) {

				return $post_type_value;

			}
		}

		return ( '' !== self::get_default( $option, $post_type ) ) ? self::get_default( $option, $post_type ) : self::get_default( $option, $template );
	}


	public static function get_default( $option, $post_type, $template = false ) {

		if ( $post_type && isset( self::$template_defaults[ $post_type ][ $option ] ) ) {

			return self::$template_defaults[ $post_type ][ $option ];


		} elseif ( $template && isset( self::$template_defaults[ $template ][ $option ] ) ) {

			return self::$template_defaults[ $template ][ $option ];

		} else {

			return '';

		}

	}


}
