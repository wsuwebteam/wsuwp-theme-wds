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
				'name'          => 'Category Sidebar',
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

		register_sidebar(
			array(
				'name'          => 'Footer Widgets',
				'id'            => 'footer_widgets',
				'description'   => 'Widgets in this area will be shown in the site footer.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			)
		);

		if ( WDS_Options::get( 'widget_areas', 'footer_top', false ) ) {

			register_sidebar(
				array(
					'name'          => 'Footer Top Widgets',
					'id'            => 'footer_top_widgets',
					'description'   => 'Widgets in this area will be shown at the top of the site footer.',
					'before_widget' => '',
					'after_widget'  => '',
					'before_title'  => '<h2>',
					'after_title'   => '</h2>',
				)
			);

		}

	}


	public static function get_sidebars( $format = 'select') {

		global $wp_registered_sidebars;

		$sidebars = array();

		if ( 'select' === $format ) {

			foreach ( $wp_registered_sidebars as $id => $sidebar ) {

				$sidebars[ $id ] = $sidebar['name'];
			}

			return $sidebars;

		}

	}


}

Sidebars::init();
