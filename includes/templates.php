<?php namespace WSUWP\Theme\WDS;


class Template {


	protected static $template_defaults = array(
		'home' => array(
			'unsupported'       => array( 'hero' ),
			'show_title'        => true,
			'show_publish_date' => false,
			'show_byline'       => false,
			'show_share'        => false,
			'show_categories'   => false,
			'show_tags'         => false,
			'show_footer'       => false,
			'sidebar'           => 'none',
		),
		'page' => array(
			'unsupported'       => array( 'hero' ),
			'show_title'        => true,
			'show_publish_date' => false,
			'show_byline'       => false,
			'show_share'        => false,
			'show_categories'   => false,
			'show_tags'         => false,
			'show_footer'       => true,
			'sidebar'           => 'none',
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
			'sidebar'         => 'sidebar_post',
		),
		'single' => array(
			'show_title'        => true,
			'show_publish_date' => false,
			'show_byline'       => false,
			'show_share'        => false,
			'show_categories'   => false,
			'show_tags'         => false,
			'show_footer'       => true,
			'sidebar'           => 'none',
		),
		'archive' => array(
			'show_title'        => true,
			'show_publish_date' => true,
			'show_byline'       => true,
			'show_share'        => true,
			'show_categories'   => true,
			'show_tags'         => true,
			'show_footer'       => true,
			'sidebar'           => 'none',
		),
		'post_archive' => array(
			'show_title'        => true,
			'show_publish_date' => true,
			'show_byline'       => true,
			'show_share'        => true,
			'show_categories'   => true,
			'show_tags'         => true,
			'show_footer'       => true,
			'sidebar'           => 'post',
		),
	);


	public static function init() {

		add_filter( 'wsu_wds_template_option', array( __CLASS__, 'filter_template_option' ), 10, 3 );

	}


	public static function get_sidebar( $context = false ) {

		$prefix   = 'wsu_wds_template';

		$context = self::get_context( $context );

		$sidebar = self::get_option( 'sidebar', $context );

		return $sidebar;

	}

	public static function get_context( $context = false, $context_default = false ) {

		if ( ! $context ) {

			if ( is_singular() ) {

				return get_post_type();
	
			} elseif ( is_category() ) {
	
				return 'category';
	
			} elseif ( is_tag() ) {
	
				return 'tag';
	
			} elseif ( is_post_type_archive( 'post' ) ) {
	
				$post_type = get_post_type();
	
				return "{$post_type}_archive";
	
			} elseif ( is_archive() ) {
	
				return 'archive';
	
			} elseif ( is_search() ) {
	
				return 'search';
	
			}

		} elseif ( $context && array_key_exists( $context, self::$template_defaults ) ) {

			return $context;

		} elseif ( $context_default && array_key_exists( $context_default, self::$template_defaults ) ) {

			return $context_default;

		}

		return 'post_archive';

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


	public static function get_option( $option, $context = false, $context_default = false, $default = false ) {

		$context = self::get_context( $context, $context_default );

		if ( ! array_key_exists( $context, self::$template_defaults ) ) {

			if ( $context_default ) {

				$context = $context_default;

			} else {

				$context = ( is_singular() ) ? 'single' : 'archive';

			}
		}

		$prefix = 'wsu_wds_template';

		if ( 'show_title' === $option && ! self::should_title() ) {

			return false;

		}

		$context_key = "{$prefix}_{$context}_{$option}";

		$default_value = ( false !== $default ) ? $default : self::get_default( $option, $context );

		$option_value = get_theme_mod( $context_key, $default_value );

		return $option_value;

	}


	public static function get_default( $option, $context = false, $context_default = false ) {

		$context = self::get_context( $context, $context_default );

		return ( isset( self::$template_defaults[ $context ][ $option ] ) ) ? self::$template_defaults[ $context ][ $option ] : '';

	}


	public static function has_option( $option, $context = false, $context_default = false  ) {

		$context = self::get_context( $context, $context_default );

		return ( isset( self::$template_defaults[ $context ][ $option ] ) ) ? true : false;

	}


	public static function should_title( $post_content = false ) {

		if ( ! $post_content && is_singular() && in_the_loop() ) {

			$post_content = get_the_content();

		}

		$has_title = array(
			'<h1',
			'tag":"h1"',
			'wsuwp/pagetitle',
		);

		foreach ( $has_title as $search_string ) {

			if ( false !== strpos( $post_content, $search_string  ) ) {

				return false;
	
			}
		}


		return true;

	}


}

Template::init();
