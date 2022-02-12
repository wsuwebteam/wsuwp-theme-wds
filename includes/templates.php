<?php namespace WSUWP\Theme\WDS;


class Template {


	public static function init() {

		add_filter( 'wsu_wds_template_show_title', array( __CLASS__, 'show_title' ) );

		self::add_pagination_filters();

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
