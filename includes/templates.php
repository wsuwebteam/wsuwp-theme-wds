<?php namespace WSUWP\Theme\WDS;


class Template {


	protected static $template_defaults = array(
		'home' => array(
			'unsupported'       => array( 'hero' ),
			'hero_style'        => 'none',
			'hero_position'     => 'before',
			'show_title'        => true,
			'show_publish_date' => false,
			'show_byline'       => false,
			'show_share'        => false,
			'show_categories'   => false,
			'show_tags'         => false,
			'show_footer'       => false,
		),
		'page' => array(
			'unsupported'     => array( 'hero' ),
			'hero_style'      => 'none',
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


	public static function init() {

		add_filter( 'wsu_wds_template_option', array( __CLASS__, 'filter_template_option' ), 10, 3 );

	}


	public static function filter_template_option( $option_value, $option, $template ) {

		if ( '' === self::get_default( $option, false, $template ) ) {

			return $option_value;

		} else {

			return self::get_option( $option, false, $template );

		}

	}


	public static function render( $slug, $name = '', $args = array() ) {

		ob_start();

		get_template_part( $slug, $name, $args );

		$html = ob_get_clean();

		echo do_blocks( $html );

	}


	public static function get_option( $option, $post_type = false, $template = false ) {

		if ( ! $post_type ) {

			$post_type = get_post_type();

		}

		$prefix = 'wsu_wds_template';

		if ( is_home() || is_front_page() ) {

			$template = $post_type;

			$post_type = 'home';

		}

		if ( 'show_title' === $option && ! self::should_title() ) {

			return false;

		}

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


	public static function should_title( $post_content = false ) {

		if ( ! $post_content && is_singular() && in_the_loop() ) {

			$post_content = do_blocks( get_the_content() );

		}

		if ( false !== strpos( $post_content, '<h1' ) || false !== strpos( $post_content, 'tag":"h1"' ) ) {

			return false;

		}

		return true;

	}


}

Template::init();
