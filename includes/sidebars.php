<?php namespace WSUWP\Theme\WDS;


class Sidebars {

	public static function init() {

		add_action( 'widgets_init', array( __CLASS__, 'register_sidebars' ) );

	}

	public static function register_sidebars() {

		register_sidebar(
			array(
				'name'          => 'Post Sidebar',
				'id'            => 'sidebar_post',
				'description'   => 'Widgets in this area will be shown on all posts.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => 'Page Sidebar',
				'id'            => 'sidebar_page',
				'description'   => 'Widgets in this area will be shown on all pages.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => 'Catebory Sidebar',
				'id'            => 'sidebar_category',
				'description'   => 'Widgets in this area will be shown on all category list pages.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => 'Tag Sidebar',
				'id'            => 'sidebar_tag',
				'description'   => 'Widgets in this area will be shown on all tag list pages.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => 'Search Sidebar',
				'id'            => 'sidebar_search',
				'description'   => 'Widgets in this area will be shown on the search page.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => 'Archive Sidebar',
				'id'            => 'sidebar_archive',
				'description'   => 'Widgets in this area will be shown on all archive pages.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

	}


	public static function has() {

		$sidebar_id = self::get_sidebar_id();

		return is_active_sidebar( $sidebar_id );

	}


	public static function get_sidebar_id() {

		$context = self::get_context();

		return 'sidebar_' . $context;

	}


	protected static function get_context() {

		if ( is_singular() ) {

			return get_post_type();

		} elseif ( is_category() ) {

			return 'category';

		} elseif ( is_tag() ) {

			return 'tag';

		} elseif ( is_archive() ) {

			return 'archive';

		} elseif ( is_search() ) {

			return 'search';

		}

		return '';

	}

}

Sidebars::init();
