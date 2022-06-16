<?php namespace WSUWP\Theme\WDS;


class Template {


	public static function init() {

		add_filter( 'wsu_wds_template_show_title', array( __CLASS__, 'show_title' ) );

		add_filter( 'wsu_wds_template', array( __CLASS__, 'filter_wsu_wds_template' ), 10, 3 );

		add_action( 'after_setup_theme', array( __CLASS__, 'add_theme_filters' ), 99 );

		add_action( 'pre_get_posts', array( __CLASS__, 'wsu_template_query_order' ), 1 );

		self::add_pagination_filters();

	}


	public static function wsu_template_query_order( $query ) {

		if ( ! is_admin() && $query->is_main_query() ) {

			$context = Context::get();

			$context = str_replace( '-', '_', $context );

			if ( $context ) {

				$option_key = "template_{$context}";

				$query_order = WDS_Options::get( $option_key, 'query_order', '' );
				$query_sort = WDS_Options::get( $option_key, 'query_sort', '' );

				if ( ! empty( $query_order ) ) {

					$query->set( 'orderby', $query_order );

				}

				if ( ! empty( $query_sort ) ) {

					$query->set( 'order', $query_sort );

				}
			}
		}

	}


	public static function add_theme_filters() {

		add_filter( 'document_title_parts', array( __CLASS__, 'filter_document_title_parts' ), 9999 );

		add_filter( 'document_title_separator', array( __CLASS__, 'filter_title_separator' ), 9999  );

	}

	public static function filter_title_separator( $sep ) {

		return '|';

	}


	public static function get_template_part( $template, $slug = '', $context = false, $args = array() ) {

		$context       = ( ! $context ) ? $slug : $context;
		$template      = apply_filters( 'wsu_wds_template', $template, $context, $args );
		$slug          = apply_filters( 'wsu_wds_template_slug', $slug, $template, $context, $args );

		if ( ! empty( $template ) ) {

			$args['context'] = $context;

			get_template_part( $template, $slug, $args );

		}

	}


	public static function filter_wsu_wds_template( $template, $context, $args = array() ) {

		$context = str_replace( '-', '_', $context );
		$prefix  = "wsu_wds_template_{$context}";

		switch ( $template ) {

			case 'template-parts/sidebar':
				$template = ( ! empty( get_theme_mod( "{$prefix}_sidebar_active", true ) ) ) ? $template : '';
				break;
			case 'template-parts/taxonomy-description':
				$template = ( ! empty( get_theme_mod( "{$prefix}_show_description", false ) ) ) ? $template : '';
				break;
			case 'template-component/component-pagination':
				$template = ( ! empty( get_theme_mod( "{$prefix}_pagination", true ) ) ) ? $template : '';
				break;
			case 'template-component/component-breadcrumb':
				$template = ( ! empty( get_theme_mod( "{$prefix}_breadcrumbs", true ) ) ) ? $template : '';
				break;
			case 'template-component/component-post-published-date':
				$template = ( ! empty( get_theme_mod( "{$prefix}_show_publish_date", true ) ) ) ? $template : '';
				break;
			case 'template-component/component-post-published-date':
				$template = ( ! empty( get_theme_mod( "{$prefix}_show_publish_date", true ) ) ) ? $template : '';
				break;
			case 'template-component/component-post-published-by':
				$template = ( ! empty( get_theme_mod( "{$prefix}_show_byline", true ) ) ) ? $template : '';
				break;

		}

		return $template;

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
