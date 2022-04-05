<?php namespace WSUWP\Theme\WDS;


class Template {


	public static function init() {

		add_filter( 'wsu_wds_template_show_title', array( __CLASS__, 'show_title' ) );

		add_action( 'after_setup_theme', array( __CLASS__, 'add_theme_filters' ), 99 );

		self::add_pagination_filters();

	}


	public static function add_theme_filters() {

		add_filter( 'document_title_parts', array( __CLASS__, 'filter_document_title_parts' ), 9999 );

		add_filter( 'document_title_separator', array( __CLASS__, 'filter_title_separator' ), 9999  );

	}

	public static function filter_title_separator( $sep ) {

		return '|';

	}


	public static function filter_document_title_parts( $title_parts ) {

		if ( is_array( $title_parts ) ) {

			$title_parts['network'] = ' Washington State University';

			if ( ! empty( $title_parts['tagline'] ) ) {

				unset( $title_parts['tagline'] );

			}
		}

		return $title_parts;

	}


	public static function add_pagination_filters() {

		add_filter(
			'previous_posts_link_attributes',
			function() {
				return 'class="wsu-pagination__previous wsu-button wsu-button--style-outline" aria-label="Go to Previous Page"';
			}
		);
		add_filter(
			'next_posts_link_attributes',
			function() {
				return 'class="wsu-pagination__next wsu-button wsu-button--style-outline"  aria-label="Go to Next Page"';
			}
		);

	}


	public static function show_title( $show_title ) {

		if ( is_singular() && in_the_loop() ) {

			$post_content = get_the_content();

			$has_title = array(
				'<h1',
				'tag":"h1"',
				'wsuwp/pagetitle',
				'Tag":"h1"',
			);

			foreach ( $has_title as $search_string ) {

				if ( false !== strpos( $post_content, $search_string  ) ) {

					return false;

				}
			}
		}

		return $show_title;

	}


	public static function get_sidebar( $customizer_key, $default_value ) {

		$sidebar = get_theme_mod( $customizer_key, $default_value );

		return ( $sidebar && is_active_sidebar( $sidebar ) ) ? $sidebar : false;

	}


	public static function should_title( $post_content = false ) {

		if ( ! $post_content && is_singular() && in_the_loop() ) {

			$post_content = get_the_content();

		}

		$has_title = array(
			'<h1',
			'tag":"h1"',
			'wsuwp/pagetitle',
			'Tag":"h1"',
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
